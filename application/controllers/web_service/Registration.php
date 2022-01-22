<?php
require APPPATH . 'libraries/REST_Controller.php';

class Registration extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('system_management/Model_web_service');
        $this->load->helper('utility');
        $this->load->helper(['jwt', 'authorization']);
        $this->msg_header = "device-lang in header is required and must be one of [ ar , en , es]";
    }

    private function validateHeader(){
        $CI =&get_instance();
        $headers = $CI->input->request_headers();
        if (array_key_exists("device-lang",$headers)
            && !empty($headers['device-lang'])
            && in_array($headers['device-lang'],array("ar","en","es") )
        ) {
            $device_lang = $headers['device-lang'];
            return (object)["status"=>true,"lang"=>$device_lang] ;
        }
        else{
            return (object)["status"=>false,"lang"=>"ar"] ;
        }
    }

    private function test($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    private function test_j($data){
        $this->set_response($data,
            REST_Controller::HTTP_OK); // CREATED (422)
    }

    private function validResponse($msg = false){
        if ($msg == false) {
            $data["errors"] = get_string($this->validation_errors());
        }
        else {
            $data["errors"] = $msg ;
        }
        $this->set_response($data,
            REST_Controller::HTTP_UNPROCESSABLE_ENTITY); // CREATED (422)
    }

    private function okResponse($output ){
        $this->set_response($output,
            REST_Controller::HTTP_OK); // CREATED (200)
    }

    private function verifyRequest(){
        // Get all the headers
        $headers = $this->input->request_headers();
        // Extract the token
        if (!isset($headers['Authorization'])) {
            return  (object) array("status"=>false ,
                "msg"=> "Authorization is required in header " ,
                "code"=>parent::HTTP_UNPROCESSABLE_ENTITY);
        }
        $token = $headers['Authorization'];
        // Use try-catch
        // JWT library throws exception if the token is not valid
        try {
            // Validate the token
            // Successfull validation will return the decoded user data else returns false
            $data = AUTHORIZATION::validateToken($token);
            if ($data === false) {
                return (object)array("status" => false,
                    "msg" => 'Unauthorized Access!',
                    "code" => parent::HTTP_UNAUTHORIZED);
            }
            else {
                return (object)array("status" => true,
                    "msg" => $data,
                    "code" => parent::HTTP_OK);
            }
        }
        catch (Exception $e) {
            // Token is invalid
            // Send the unathorized access message
            return (object)array("status" => false,
                "msg" => 'server error!',
                "code" => parent::HTTP_OK);
        }
    }

    public function index(){
        $this->set_response(array("data"=>"404 page not found"),
            REST_Controller::HTTP_NOT_FOUND); // CREATED (400) being the HTTP response code
    }
    /**
     *  ==========================================================================
     *
     *  ---------------------------------      -----------------------------------
     *
     *  ==========================================================================
     */

    public  function login_post(){
        $header  = $this->validateHeader();
        if($header->status == false){
            $this->validResponse($this->msg_header);
        }
        else {
            $this->form_validation->set_rules('phone_code', '', "required|numeric");
            $this->form_validation->set_rules('phone', '', "required|numeric");
            $this->form_validation->set_rules('password', '', "required");
            if ($this->form_validation->run() == FALSE) {
                $this->validResponse();
            }
            else{
                $this->load->model('Registrations_model');
                $where = ["phone_code"=>$this->post("phone_code") ,
                          "phone"=>$this->post("phone"),
                          "password"=>setPass($this->post("password"))
                    ];
                $user  = $this->Registrations_model->trans($header->lang)->get_by($where);
                if(!empty($user) &&  $user!= null){
                    if ($user->available == 1) {
                        $this->Registrations_model->update($user->user_id, ["is_login" => 1]);// Create a token
                        $token = AUTHORIZATION::generateToken($user);
                        $user->token  = $token;
                        $this->okResponse($user);
                    }
                    else{
                        $data["errors"] = " user is blocked by admin   ";
                        $this->set_response($data,
                            REST_Controller::HTTP_NOT_ACCEPTABLE);// CREATED (401)
                    }
                }
                else{
                    $data["errors"] = " correct phone or password  " ;
                    $this->set_response($data,
                        REST_Controller::HTTP_NOT_FOUND); // CREATED (401)
                }
            }// else form
        }// else header
    }

    /**
     *  ==========================================================================
     *
     *  ---------------------------------      -----------------------------------
     *
     *  ==========================================================================
     */
    public  function userRegister_post(){
        $this->form_validation->set_rules('name', '', "required");
        $this->form_validation->set_rules('phone_code', '', "required|numeric");
        $this->form_validation->set_rules('phone', '', "required|numeric");
        $this->form_validation->set_rules('password', '', "required");
        $this->form_validation->set_rules('email', '', "required|valid_email|is_unique[registrations.email]");
        $this->form_validation->set_rules('gender', '', "required|numeric|in_list[1,2]");
        $this->form_validation->set_rules('soft_type', '', "required|numeric|in_list[1,2]");
        if ($this->form_validation->run() == FALSE) {
            $this->validResponse();
        }
        else{
            $Idata["name"] = $this->post("name");
            $Idata["phone_code"] = $this->post("phone_code");
            $Idata["phone"] = $this->post("phone");
            $Idata["password"] = setPass($this->post("password"));
            $Idata["email"] = $this->post("email");
            $Idata["gender"] = $this->post("gender");
            $Idata["soft_type"] = $this->post("soft_type");
			$Idata["advertiser_code"] = $this->post("advertiser_code");
            $Idata["user_type"] =1;
            $Idata["is_login"] =1;
            $Idata["logo"] = uploadFile("logo");
			$Idata["user_code"] = generateRandomString(10);
            $this->load->model('Registrations_model');
            $user_id  = $this->Registrations_model->insert($Idata);
            $user  = $this->Registrations_model->get($user_id);
            $token = AUTHORIZATION::generateToken($user);
            $user->token  = $token;
            $this->okResponse($user);
        }
    }


    /**
     *  ==========================================================================
     *
     *  ---------------------------------      -----------------------------------
     *
     *  ==========================================================================
     */
    public  function providerRegister_post(){
        $this->form_validation->set_rules('name', '', "required");
        $this->form_validation->set_rules('phone_code', '', "required|numeric");
        $this->form_validation->set_rules('phone', '', "required|numeric");
        $this->form_validation->set_rules('password', '', "required");
        $this->form_validation->set_rules('email', '', "required|valid_email|is_unique[registrations.email]");
        $this->form_validation->set_rules('gender', '', "required|numeric|in_list[1,2]");
        $this->form_validation->set_rules('soft_type', '', "required|numeric|in_list[1,2]");
        $this->form_validation->set_rules('department', '', "required|numeric|valid_service_id");
        $this->form_validation->set_rules('exper', '', "required");
        $this->form_validation->set_rules('about', '', "required");
		$this->form_validation->set_rules('area_id', '', "required|valid_area_id");
		//---------------------------------
        if ($this->post("specialty_id")) {
			$this->form_validation->set_rules('specialty_id', '', "valid_specialty_id");
		}
		//-------------------------------
		if ($this->form_validation->run() == FALSE) {
            $this->validResponse();
        }
        else{
            $Idata["name"] = $this->post("name");
            $Idata["phone_code"] = $this->post("phone_code");
            $Idata["phone"] = $this->post("phone");
            $Idata["password"] = setPass($this->post("password"));
            $Idata["email"] = $this->post("email");
            $Idata["gender"] = $this->post("gender");
            $Idata["soft_type"] = $this->post("soft_type");
            $Idata["service_id"] = $this->post("department");
            $Idata["exper"] = $this->post("exper");
            $Idata["about"] = $this->post("about");
            $Idata["specialty_id"] = $this->post("specialty_id");
            $Idata["area_id"] = $this->post("area_id");
            $Idata["advertiser_code"] = $this->post("advertiser_code");
            $Idata["user_type"] = 2;
            $Idata["be_provider"] = 0;
            $Idata["is_login"] = 1;
            $Idata["user_code"] = generateRandomString(10);
            $Idata["logo"] = uploadFile("logo");
            $this->load->model('Registrations_model');
            $user_id  = $this->Registrations_model->insert($Idata);
            $user  = $this->Registrations_model->trans('ar')->get($user_id);
            $token = AUTHORIZATION::generateToken($user);
            $user->token  = $token;
            $this->okResponse($user);
        }
    }

    /**
     *  ==========================================================================
     *
     *  ---------------------------------      -----------------------------------
     *
     *  ==========================================================================
     */
    public function logout_get(){
        $validAuth = $this->verifyRequest();
        $user = $validAuth->msg ;
        $code = $validAuth->code ;
        if ($validAuth->status == false) {
            $this->set_response(['data'=>$user], $code);
        }
        else {
            $this->load->model('Registrations_model');
            $this->Registrations_model->update($user->user_id, ["is_login" => 0]);
            if ($this->get("firebase_token")) {
                $token = $this->get("firebase_token");
                $this->load->model('system_management/Fire_base_tokens_model');
                $this->Fire_base_tokens_model->delete_by(["phone_token"=>$token ]);
            }
            $this->okResponse(array("data" => "success logout "));

        }
    }


    /**
     *  ==========================================================================
     *
     *  ---------------------------------      -----------------------------------
     *
     *  ==========================================================================
     */

    public  function profile_get(){
        $validAuth = $this->verifyRequest();
        $user = $validAuth->msg ;
        $code = $validAuth->code ;
        if ($validAuth->status == false) {
            $this->set_response(['data'=>$user], $code);
        }
        else {
            $header  = $this->validateHeader();
            if($header->status == false){
                $this->validResponse($this->msg_header);
            }
            else {
                $this->load->model('Registrations_model');
                $user  = $this->Registrations_model->trans($header->lang)->get($user->user_id);
                $token = AUTHORIZATION::generateToken($user);
                $user->token  = $token;
                $this->okResponse($user);
            }// es 2
        } // es 1
    }

    public function userProfile_get(){

        $header  = $this->validateHeader();
        if($header->status == false){
            $this->validResponse($this->msg_header);
        }
        else {
            if($this->get("user_id")){
                $id =$this->get("user_id");
                $this->load->model('Registrations_model');
                $user  = $this->Registrations_model->trans($header->lang)->get($id);
                if (isset($user) && !empty($user)) {
                    $token = AUTHORIZATION::generateToken($user);
                    $user->token = $token;
                    $this->okResponse($user);
                }
                else{
                    $this->set_response(['error'=>'user_id not found'],
                        parent::HTTP_NOT_FOUND);
                }//esin
            }
            else{
                $this->set_response(['error'=>'user_id is required'],
                        parent::HTTP_UNPROCESSABLE_ENTITY);
            } // es 3
        }// es 2
    }



    /**
     *  ==========================================================================
     *
     *  ---------------------------------      -----------------------------------
     *
     *  ==========================================================================
     */
    public  function profileUser_post(){
        $validAuth = $this->verifyRequest();
        $user = $validAuth->msg ;
        $code = $validAuth->code ;
        if ($validAuth->status == false ) {
            $this->set_response(['data'=>$user], $code);
        }
        else {
            $header  = $this->validateHeader();
            if($header->status == false){
                $this->validResponse($this->msg_header);
            }
            else {

                $this->form_validation->set_rules('name', '', "required");
                $this->form_validation->set_rules('phone_code', '', "required|numeric");
                $this->form_validation->set_rules('phone', '', "required|numeric");
                $this->form_validation->set_rules('email', '', "required|valid_email");
                $this->form_validation->set_rules('gender', '', "required|numeric|in_list[1,2]");
                if ($this->form_validation->run() == FALSE) {
                    $this->validResponse();
                } else {
                    $Idata["name"] = $this->post("name");
                    $Idata["phone_code"] = $this->post("phone_code");
                    $Idata["phone"] = $this->post("phone");
                    if ($this->post("password")) {
                        $Idata["password"] = setPass($this->post("password"));
                    }
                    $Idata["email"] = $this->post("email");
                    $Idata["gender"] = $this->post("gender");
                    $logo = uploadFile("logo");
                    if (!empty($logo)) {
                        $Idata["logo"] = $logo;
                    }
                    $this->load->model('Registrations_model');
                    $this->Registrations_model->update($user->user_id, $Idata);
                    $user = $this->Registrations_model->trans($header->lang)->get($user->user_id);
                    $token = AUTHORIZATION::generateToken($user);
                    $user->token = $token;
                    $this->okResponse($user);
                } // valid
            } // lang
        } // auth
    }

    /**
     *  ==========================================================================
     *
     *  ---------------------------------      -----------------------------------
     *
     *  ==========================================================================
     */

    public  function profileProvider_post(){
        $validAuth = $this->verifyRequest();
        $user = $validAuth->msg ;
        $code = $validAuth->code ;
        if ($validAuth->status == false ) {
            $this->set_response(['data'=>$user], $code);
        }
        else {
            $header = $this->validateHeader();
            if ($header->status == false) {
                $this->validResponse($this->msg_header);
            }
            else {
                $this->form_validation->set_rules('name', '', "required");
                $this->form_validation->set_rules('phone_code', '', "required|numeric");
                $this->form_validation->set_rules('phone', '', "required|numeric");
                //W$this->form_validation->set_rules('password', '', "required");
                $this->form_validation->set_rules('email', '', "required|valid_email");
                $this->form_validation->set_rules('gender', '', "required|numeric|in_list[1,2]");
                $this->form_validation->set_rules('department', '', "required|numeric|valid_service_id");
                $this->form_validation->set_rules('exper', '', "required");
                $this->form_validation->set_rules('about', '', "required");
                //---------------------------------
				if ($this->post("specialty_id")) {
					$this->form_validation->set_rules('specialty_id', '', "valid_specialty_id");
				}
				if ($this->post("area_id")) {
					$this->form_validation->set_rules('area_id', '', "valid_area_id");
				}
				//-------------------------------
                if ($this->form_validation->run() == FALSE) {
                    $this->validResponse();
                }
                else {
                    $Idata["name"] = $this->post("name");
                    $Idata["phone_code"] = $this->post("phone_code");
                    $Idata["phone"] = $this->post("phone");
                    if ($this->post("password")) {
                        $Idata["password"] = setPass($this->post("password"));
                    }
                    $Idata["email"] = $this->post("email");
                    $Idata["gender"] = $this->post("gender");
                    $Idata["service_id"] = $this->post("department");
                    $Idata["exper"] = $this->post("exper");
                    $Idata["about"] = $this->post("about");
                    $logo = uploadFile("logo");
                    if (!empty($logo)) {
                        $Idata["logo"] = $logo;
                    }
					if ($this->post("specialty_id")) {
						$Idata["specialty_id"] = $this->post("specialty_id");
					}
					if ($this->post("area_id")) {
						$Idata["area_id"] = $this->post("area_id");
					}
					$this->load->model('Registrations_model');
                    $this->Registrations_model->update($user->user_id, $Idata);
                    $user = $this->Registrations_model->trans($header->lang)->get($user->user_id);
                    $token = AUTHORIZATION::generateToken($user);
                    $user->token = $token;
                    $this->okResponse($user);
                } // valid
            } // lang
        }// auth
    }

    /**
     *  ==========================================================================
     *
     *  ---------------------------------      -----------------------------------
     *
     *  ==========================================================================
     */
    public function beActive_post(){
        $validAuth = $this->verifyRequest();
        $user = $validAuth->msg ;
        $code = $validAuth->code ;
        if ($validAuth->status == false ) {
            $this->set_response(['data'=>$user], $code);
        }
        else {
            $header = $this->validateHeader();
            if ($header->status == false) {
                $this->validResponse($this->msg_header);
            }
            else {
                $this->form_validation->set_rules('is_active', '', "required|numeric|in_list[1,0]");
                if ($this->form_validation->run() == FALSE) {
                    $this->validResponse();
                }
                else {
                    $this->load->model('Registrations_model');
                    $Idata["is_active"] = $this->post("is_active");
                    $this->Registrations_model->update($user->user_id, $Idata);
                    $user = $this->Registrations_model->trans($header->lang)->get($user->user_id);
                    $token = AUTHORIZATION::generateToken($user);
                    $user->token = $token;
                    $this->okResponse($user);
                }
            }
        }
    }

    /**
     *  ==========================================================================
     *
     *  ---------------------------------      -----------------------------------
     *
     *  ==========================================================================
     */

    public  function myRating_get(){
        $validAuth = $this->verifyRequest();
        $user = $validAuth->msg ;
        $code = $validAuth->code ;
        if ($validAuth->status == false) {
         return   $this->set_response(['data'=>$user], $code);
        }
         //===================================
		$header  = $this->validateHeader();
		if($header->status == false){
		 return	$this->validResponse($this->msg_header);
		}
		//===================================
		$this->load->model('Ratings_model');
		$json["user_rate"] = $this->Model_web_service->getRate($user->user_id);
		$where = ["to_id"=>$user->user_id] ;
		//--------------------
		$page = (($this->get('page'))) ? $this->get('page') - 1 : 0;
		$limitPerPage = (($this->get('limit_per_page'))) ? $this->get('limit_per_page') : 20;
		$total = $this->Model_web_service->getRecordCount("id", "ratings", $where);
		$lastPage = ceil($total / $limitPerPage);
		$currentPage = ($page == 0) ? 1 : $this->get('page');
		$json["meta"] = ["current_page" => (int)$currentPage, "last_page" => $lastPage, "total" => $total];
		//--------------------
		$json["data"] = $this->Ratings_model->with_meny(["from_user"])
			->limit($limitPerPage, $limitPerPage * $page)
			->get_many_by($where);
		return $this->okResponse($json);
		//===================================
    }


} // END CLASS
?>
