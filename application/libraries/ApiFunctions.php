<?php
require APPPATH . 'libraries/REST_Controller.php';

abstract class ApiFunctions extends REST_Controller {

	public function __construct(){
		parent::__construct();
		// $this->load->helper('note');
		$this->load->model('system_management/Model_web_service');
		$this->load->helper('utility');
		$this->load->helper(['jwt', 'authorization']);
		$this->msg_header = "device-lang in header is required and must be one of [ ar , en  , es]";
	}

	public function validateHeader(){
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

	public function test($data){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}

	public function test_j($data){
		$this->set_response($data,
			REST_Controller::HTTP_OK); // CREATED (422)
	}

	public function validResponse($msg = false){
		if ($msg == false) {
			$data["errors"] = get_string($this->validation_errors());
		}
		else {
			$data["errors"] = $msg ;
		}
		$this->set_response($data,
			REST_Controller::HTTP_UNPROCESSABLE_ENTITY); // CREATED (422)
	}

	public function okResponse($output ){
		$this->set_response($output,
			REST_Controller::HTTP_OK); // CREATED (200)
	}

	public function verifyRequest(){
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

	public function pages($sel, $table, $where ,$whereIn ,$key){
		//--------------------
		$page = (($this->get('page'))) ? $this->get('page') - 1 : 0;
		$limitPerPage = (($this->get('limit_per_page'))) ? $this->get('limit_per_page') : 20;
		$total = $this->Model_web_service->getRecordCount($sel, $table, $where,$whereIn ,$key);
		$lastPage = ceil($total / $limitPerPage);
		$currentPage = ($page == 0) ? 1 : $this->get('page');
		$meta = ["current_page" => (int)$currentPage, "last_page" => $lastPage, "total" => $total];
		//--------------------
		return (object)["meta"=>$meta,"start"=>$limitPerPage,"end"=>$limitPerPage * $page];
	}
}
