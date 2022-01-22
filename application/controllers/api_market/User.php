<?php
require APPPATH . 'libraries/ApiFunctions.php';
class User extends ApiFunctions{
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
	public function login_post(){
		/*
		$header  = $this->validateHeader();
		if($header->status == false){
		  return $this->validResponse($this->msg_header);
		}
		*/
		//-------------------------------
		$this->form_validation->set_rules('phone_code', '', "required|numeric");
		$this->form_validation->set_rules('phone', '', "required|numeric");
		//$this->form_validation->set_rules('password', '', "required");
		if ($this->form_validation->run() == FALSE) {
			return $this->validResponse();
		}
		//-------------------------------
		$this->load->model('Registrations_model');
		$where = ["phone_code"=>$this->post("phone_code") ,
			"phone"=>$this->post("phone"),
			/*"password"=>setPass($this->post("password"))*/
		];
		$user  = $this->Registrations_model->get_by($where);
		if(!empty($user) &&  $user!= null){
			$this->Registrations_model->update($user->user_id, ["is_login" => 1]);
			$token = AUTHORIZATION::generateToken($user);
			$user->token  = $token;
			//------------
			return $this->okResponse(["user"=>$user]); // CREATED (200)
		}
		//-------------------------------
		$json["errors"] = "correct phone";
		return	$this->set_response($json,REST_Controller::HTTP_NOT_FOUND); // CREATED (404)
		//-------------------------------
	}
	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */
	public function logout_post(){
		$validAuth = $this->verifyRequest();
		$user = $validAuth->msg ;
		$code = $validAuth->code ;
		if ($validAuth->status == false) {
			return  $this->set_response(['data'=>$user], $code);
		}
		//----------------------------
		$this->form_validation->set_rules('firebase_token', '', "required");
		if ($this->form_validation->run() == FALSE) {
			return $this->validResponse();
		}
		//-------------------------------
		$this->load->model('Registrations_model');
		$this->load->model('system_management/Fire_base_tokens_model');
		$this->Registrations_model->update($user->user_id, ["is_login" => 0 ]);
		$token = $this->post("firebase_token");
		$this->Fire_base_tokens_model->delete_by(["phone_token"=>$token ]);
		$this->okResponse(["data" => "success logout "]);
		//----------------------------
	}
	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */
	public function userRegister_post(){
		$this->form_validation->set_rules('name', '', "required");
		$this->form_validation->set_rules('phone_code', '', "required");
		//$this->form_validation->set_rules('password', '', "required");
		$this->form_validation->set_rules('signup_by', '', "required|in_list[web,android,ios,facebook,twitter]");
		if ($this->form_validation->run() == FALSE) {
			return   $this->validResponse(); // CREATED (422)
		}
		$this->form_validation->set_rules('phone', '', "required|numeric|is_unique[registrations.phone]");
		//---------------------------------------
		if ($this->form_validation->run() == FALSE) {
			$json["errors"] = get_string($this->validation_errors());
			return   $this->set_response($json,parent::HTTP_NOT_ACCEPTABLE); // CREATED (406)
		}
		//---------------------------------------
		$this->form_validation->set_rules('email', '', "required|valid_email|is_unique[registrations.email]");
		if ($this->form_validation->run() == FALSE) {
			$json["errors"] = get_string($this->validation_errors());
			return   $this->set_response($json,parent::HTTP_CONFLICT); // CREATED (409)
		}
		//---------------------------------------
		$Idata["name"] = $this->post("name");
		$Idata["phone_code"] = $this->post("phone_code");
		$Idata["phone"] = $this->post("phone");
		if ($this->post("password")) {
			$Idata["password"] = setPass($this->post("password"));
		}
		$Idata["email"] = $this->post("email");
		if ($this->post("signup_by") == "android") {
			$type = 1 ;
		}else{
			$type = 2 ;
		}
		$Idata["soft_type"] = $type;
		$Idata["user_type"] = 1;
		$Idata["signup_by"] = 'market';
		$Idata["is_login"] = 1;
		$Idata["logo"] = uploadFile("logo");
		$Idata["user_code"] = generateRandomString(10);
		$this->load->model('Registrations_model');
		$user_id  = $this->Registrations_model->insert($Idata);
		$user  = $this->Registrations_model->get($user_id);
		$token = AUTHORIZATION::generateToken($user);
		$user->token  = $token;
		return	$this->okResponse(["user"=>$user]);
		//---------------------------------------
	}
	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */
	public function profileUser_post(){
		$validAuth = $this->verifyRequest();
		$user = $validAuth->msg ;
		$code = $validAuth->code ;
		if ($validAuth->status == false ) {
			return   $this->set_response(['data'=>$user], $code);
		}
		//---------------------------------
		/*$header  = $this->validateHeader();
		if($header->status == false){
			return	$this->validResponse($this->msg_header);
		}*/
		$this->load->model('Registrations_model');
		//---------------------------------
		if ($this->post("name")) {
			$this->form_validation->set_rules('name', '', "required");
		}
		if ($this->post("phone_code")) {
			$this->form_validation->set_rules('phone_code', '', "required|numeric");
		}
		if ($this->post("phone")) {
			$this->form_validation->set_rules('phone', '', "required|numeric");
			$where = ["phone"=>$this->post("phone") ,
				"user_id !="=>$user->user_id,
			];
			$userChek  = $this->Registrations_model->get_by($where);
			if(!empty($userChek) &&  $userChek!= null){
				return $this->validResponse('email is unique');
			}
		}
		if ($this->post("email")) {
			$this->form_validation->set_rules('email', '', "required|valid_email");
			$where = ["email"=>$this->post("email") ,
				"user_id !="=>$user->user_id,
			];
			$userChek  = $this->Registrations_model->get_by($where);
			if(!empty($userChek) &&  $userChek!= null){
				return $this->validResponse('email is unique');
			}
		}
		if ($this->form_validation->run() == FALSE) {
			return $this->validResponse();
		}
		//---------------------------------------------
		$Idata = $this->post();
		if ($this->post("password")) {
			$Idata["password"] = setPass($this->post("password"));
		}
		$logo = uploadFile("logo");
		if (!empty($logo)) {
			$Idata["logo"] = $logo;
		}
		$this->Registrations_model->update($user->user_id, $Idata);
		$user = $this->Registrations_model->get($user->user_id);
		$token = AUTHORIZATION::generateToken($user);
		$user->token = $token;
		return $this->okResponse(["user"=>$user]);
		//---------------------------------
	}
	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */
	public function delete_post()
	{
		$this->form_validation->set_rules('phone', '', "required|numeric");
		if ($this->form_validation->run() == FALSE) {
			return $this->validResponse();
		}
		$this->load->model('Registrations_model');
		//$this->load->model('market/Notifications_model');
		$this->Registrations_model->soft_delete = false ;
		$user = $this->Registrations_model->get_by(["phone"=>$this->post('phone')]);
		if(isset($user->user_id)){
			$id = $user->user_id;
			$this->Registrations_model->delete($id);
		//	$this->Notifications_model->delete_by(["to_user_id"=>$id]);
		}
		return $this->okResponse(["msg"=>'success delete user']);
	}


} // END CLASS
?>
