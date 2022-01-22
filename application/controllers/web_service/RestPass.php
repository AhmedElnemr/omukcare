<?php
require APPPATH . 'libraries/REST_Controller.php';

class RestPass extends REST_Controller{

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

	private function sendEmail($data,$to){
		//Load email library
		$emailConfig = [
			'protocol' => 'mail','smtp_port' => 25,
			'mailtype' => 'html','validate' => true,'charset' => 'utf-8'
		];
		//------------------------------------
		$from = ['email' => 'info@daystar-mea.com','name' => 'Daystar-mea.com'];
		$to = [$to];
		$subject = 'Restore password';
		$message = $this->load->view('frontend/requires/message_email', $data, true);
		//------------------------------------
		$this->load->library('email', $emailConfig);
		$this->email->set_newline("\r\n");
		$this->email->from($from['email']);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->set_mailtype("html");
		// Ready to send email and check whether the email was successfully sent
		if (!$this->email->send()) {
			// Raise error message
			return ["msg"=>show_error($this->email->print_debugger()) , "code"=>false];
			// return 0;
		} else {
			// Show success notification or other things here
			return ["msg"=>'Success to send email',"code"=>true];
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
    public function sendRestCode_post(){
		$this->form_validation->set_rules('email', '', "required|valid_email|valid_email_db");
		if ($this->form_validation->run() == FALSE) {
			$data["errors"] = get_string($this->validation_errors());
			return 	$this->set_response($data,REST_Controller::HTTP_NOT_FOUND); // CREATED (200)
		}
		$where["email"] = $this->post("email");
		$this->load->model('Registrations_model');
		$user  = $this->Registrations_model->get_by($where);
		$code = sprintf('%06u',rand(0,999999) );
		$Udata["rest_code"] = $code ;
		$this->Registrations_model->update($user->user_id,$Udata);
		$email_response  = $this->sendEmail($Udata,$user->email);
		return $this->okResponse(["msg"=>"success send code = ".$code , "email_response"=>$email_response]);
	}


	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */
	public function confirmCode_post(){
		$this->form_validation->set_rules('email', '', "required|valid_email");
		$this->form_validation->set_rules('code', '', "required");
		if ($this->form_validation->run() == FALSE) {
			return $this->validResponse();
		}
		$where["email"] = $this->post("email");
		$where["rest_code"] = $this->post("code");
		$this->load->model('Registrations_model');
		$user  = $this->Registrations_model->get_by($where);
		if(!empty($user)){
			$token = AUTHORIZATION::generateToken($user);
			$user->token  = $token;
			return $this->okResponse($user);
		}
		return $this->set_response(["error" => "cdoe or email correct "],
			REST_Controller::HTTP_UNAUTHORIZED); // CREATED (422)
	}

    /**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */
	public function restPassword_post(){
		$this->form_validation->set_rules('user_id', '', "required|valid_user_id");
		$this->form_validation->set_rules('password', '', "required");
		if ($this->form_validation->run() == FALSE) {
			return $this->validResponse();
		}
		$this->load->model('Registrations_model');
		$user_id = $this->post("user_id") ;
		$Udata["password"] = setPass($this->post("password"));
		$this->Registrations_model->update($user_id,$Udata);
		$user  = $this->Registrations_model->get($user_id);
		$token = AUTHORIZATION::generateToken($user);
		$user->token  = $token;
		return $this->okResponse($user);
	}





} // END CLASS
?>
