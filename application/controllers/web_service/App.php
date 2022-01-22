<?php
require APPPATH . 'libraries/REST_Controller.php';

class App extends REST_Controller{

    public function __construct(){
        parent::__construct();
        // $this->load->helper('note');
        $this->load->model('system_management/Model_web_service');
        $this->load->helper('utility');
        $this->load->helper(['jwt', 'authorization']);
        $this->msg_header = "device-lang in header is required and must be one of [ ar , en  , es]";
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

    public  function testNote_post(){
        $this->load->helper('note');
       //  $not  = newOrder(1,[3,4],1);
       //  $not  = refrshNot([3]);
         $not  = orderAccepted(1,[2,4],1);
        // $not  = orderBlocked(1,[2,4],1);
       //  $not  = orderCancelInStart(1,[3,4],1);
        // $not  = orderCancelProvider(1,[2,4],1);
       // $not  = haveRating(1,[3,4],1);
        //$not  = rateProvider(1,[2,4],1);



        $this->okResponse($not);
    }

    /**
     *  ==========================================================================
     *
     *  ---------------------------------      -----------------------------------
     *
     *  ==========================================================================
     */

    public function setting_get(){
        $this->load->model('system_management/Setting_model');
        $json['settings'] = $this->Setting_model->getSettings();
        $this->okResponse($json);
    }



    public  function updateToken_post(){
        $validAuth = $this->verifyRequest();
        $user = $validAuth->msg ;
        $code = $validAuth->code ;
        if ($validAuth->status == false) {
           return  $this->set_response(['data'=>$user], $code);
        }
        //--------------------------------------------
		/*$header  = $this->validateHeader();
		if($header->status == false){
		 return	$this->validResponse($this->msg_header);
		}*/
		$this->form_validation->set_rules('firebase_token', '', "required");
		$this->form_validation->set_rules('soft_type', '', "required|numeric|in_list[1,2]");
		if ($this->form_validation->run() == FALSE) {
			 return $this->validResponse();
		}
		$this->load->model('system_management/Fire_base_tokens_model');
		$Idata['phone_token'] = $this->post("firebase_token");
		$Idata['software_type'] = $this->post("soft_type");
		$Idata['user_id_fk'] = $user->user_id;
		$this->Fire_base_tokens_model->save($Idata, $Idata);
		$where = ["user_id_fk" => $user->user_id, "software_type" => $this->post("soft_type")];
		$tokens = $this->Fire_base_tokens_model->get_many_by($where);
		return $this->okResponse(["tokens" => $tokens]);
        //--------------------------------------------
    }

    public  function updateLocation_post(){
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
                $this->form_validation->set_rules('google_lat', '', "required");
                $this->form_validation->set_rules('google_long', '', "required");
                if ($this->form_validation->run() == FALSE) {
                    $this->validResponse();
                }
                else{
                    $this->load->model('Registrations_model');
                    $Idata['google_lat'] = $this->post("google_lat");
                    $Idata['google_long'] = $this->post("google_long");
                    $id = $user->user_id;
                    $this->Registrations_model->update($id, $Idata);
                    $user = $this->Registrations_model->get($id);
                    $token = AUTHORIZATION::generateToken($user);
                    $user->token = $token;
                    $this->okResponse($user);
                }// es 3
            }// es 2
        }// es 1
    }

    public function visit_post(){
        $this->form_validation->set_rules('day_date', '', 'trim|required|valid_date[d-m-y,-]');
        $this->form_validation->set_rules('type','','required|in_list[ios,android]');
        if ($this->form_validation->run() == FALSE) {
            $valid = get_string($this->validation_errors());
            $this->set_response(array("data"=>$valid),
                REST_Controller::HTTP_UNPROCESSABLE_ENTITY); // CREATED (422) being the HTTP response code
        }
        else{
            $day_date = $this->input->post("day_date");
            $type = "web_count" ;
            if($this->post("type") == "ios"){
                $type = "ios_count" ;
            }
            elseif ($this->post("type") == "android"){
                $type = "android_count" ;
            }
            $day_id = $this->Model_web_service->searchDate($day_date);
            if($day_id > 0){
                $this->Model_web_service->updateVisitor($day_id,$type);
            }
            else{
                $this->Model_web_service->insertVisitor($day_date,$type);
            }
            $this->set_response(array("data"=>"success visit "),
                REST_Controller::HTTP_OK); // CREATED (200) being the HTTP response code
        }
    }


    /**
     *  ==========================================================================
     *
     *  ---------------------------------      -----------------------------------
     *
     *  ==========================================================================
     */

    public function services_get(){
        $header  = $this->validateHeader();
        if($header->status == false){
            $this->validResponse($this->msg_header);
        }
        else {
            $this->load->model('Services_model');
            $where = ["perant_id" => 0,"deleted"=>0];
            //--------- 3 -------
            $page = (($this->get('page'))) ? $this->get('page') - 1 : 0;
            $total = $this->Model_web_service->getRecordCount("service_id" , "services" ,$where);
            $limitPerPage = 20;
            $lastPage = ceil($total / $limitPerPage);
            $currentPage = ($page == 0) ? 1 : $this->get('page');
            $json['meta'] = array("current_page" => $currentPage, "last_page" => $lastPage, "total" => $total);
            //-----------------------
            $json['services'] = $this->Services_model->getServices($where, $limitPerPage, $limitPerPage * $page ,$header->lang);
            $this->okResponse($json);
        }
    }

    public function mainServices_get($id){
        $header  = $this->validateHeader();
        if($header->status == false){
            $this->validResponse($this->msg_header);
        }
        else {

            $this->load->model('Services_model');
            $this->load->model('Registrations_model');
            $counters = ["service"=> $this->Services_model->count_by('perant_id !=', 0),
                         "users"=> $this->Registrations_model->count_by('user_type', 1),
                         "providers"=> $this->Registrations_model->count_by('user_type', 2)
            ];
            $json['counters'] = $counters;
            //--------------------------------
            $this->load->model('Services_model');
            if ($id == 1) {
                $where = ["perant_id" => 0];
            }
            elseif($id == 2){
                $where = ["perant_id !=" => 0];
            }
            elseif($id == 3){
                $serv = (($this->get('main_service_id'))) ? $this->get('main_service_id'): 0;
                $where = ["perant_id" => $serv];
            }
            //--------- 3 -------
            $page = (($this->get('page'))) ? $this->get('page') - 1 : 0;
            $total = $this->Model_web_service->getRecordCount("service_id" , "services" ,$where);
            $limitPerPage = 20;
            $lastPage = ceil($total / $limitPerPage);
            $currentPage = ($page == 0) ? 1 : $this->get('page');
            $json['meta'] = array("current_page" => $currentPage, "last_page" => $lastPage, "total" => $total);
            //-----------------------
            $json['services'] = $this->Services_model->trans($header->lang)->with('specialties')
                                     ->limit($limitPerPage, $limitPerPage * $page)->order_by("service_order","ASC")
                                     ->get_many_by($where);
            $this->okResponse($json);
        }
    }


    /**
     *  ==========================================================================
     *
     *  ---------------------------------      -----------------------------------
     *
     *  ==========================================================================
     */

    public  function contact_post(){
        $this->load->model('system_management/Contacts_model');
        $data["name"] = $this->post('name');
        $data["email"] = $this->post('email');
        $data["subject"] = $this->post('subject');
        $data["message"] = $this->post('message');
		$this->Contacts_model->insert($data);
		return $this->okResponse(["msg"=>'success send']);
    }

    /**
     *  ==========================================================================
     *
     *  ---------------------------------      -----------------------------------
     *
     *  ==========================================================================
     */
	public function areas_get(){
		$header  = $this->validateHeader();
		if($header->status == false){
			$this->validResponse($this->msg_header);
		}
		else {
			$this->load->model('Areas_model');
			$where = [];
			//--------- 3 -------
			$page = (($this->get('page'))) ? $this->get('page') - 1 : 0;
			$total = $this->Model_web_service->getRecordCount("area_id" , "areas" ,$where);
			$limitPerPage = 20;
			$lastPage = ceil($total / $limitPerPage);
			$currentPage = ($page == 0) ? 1 : $this->get('page');
			$json['meta'] = array("current_page" => $currentPage, "last_page" => $lastPage, "total" => $total);
			//-----------------------
			$json['data'] = $this->Areas_model->get_all($where, $limitPerPage, $limitPerPage * $page ,$header->lang);
			$this->okResponse($json);
		}
	}

	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */
	public function getPrice_post(){
		$this->form_validation->set_rules('specialty_id', '', "required");
		$this->form_validation->set_rules('area_id', '', "required|valid_area_id");
		$this->form_validation->set_rules('sub_service_id', '', "required|numeric|valid_service_id");
		if ($this->form_validation->run() == FALSE) {
			return $this->validResponse();
		}
		//----------------------------------------
		$this->load->model('Services_prices_model');
		$where["service_id"] = $this->post('sub_service_id');
		$where["area_id"] = $this->post('area_id');
		$where["specialty_id"] = $this->post('specialty_id');
		$json["price"] = 0 ;
		$price = $this->Services_prices_model->get_by($where);
		if(!empty($price)){
			$json["price"] = (double)$price->price;
		}
		return $this->okResponse($json);
	}







} // END CLASS
?>
