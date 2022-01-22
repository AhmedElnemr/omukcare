<?php
require APPPATH . 'libraries/ApiFunctions.php';

class Notification extends ApiFunctions{

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
	public function my_get(){
		$validAuth = $this->verifyRequest();
		$user = $validAuth->msg ;
		$code = $validAuth->code ;
		if ($validAuth->status == false) {
			return	$this->set_response(['data'=>$user], $code);
		}
		//---------------------------------------------
		$this->load->model('market/Notifications_model');
		$where = ["to_user_id" => $user->user_id];
		$pagination = ($this->get("pagination"))? $this->get("pagination"):"off";
		if ($pagination == "on") {
			$page = $this->pages("to_user_id","market_notifications",$where,[],"");
			$json["meta"] = $page->meta ;
			$json["data"] = $this->Notifications_model->limit($page->start,$page->end)->get_many_by($where);
		}
		else {
			$json["data"] = $this->Notifications_model->get_many_by($where);
		}
		return $this->okResponse($json);
	}

	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */
	public function delete_post(){
		$validAuth = $this->verifyRequest();
		$user = $validAuth->msg ;
		$code = $validAuth->code ;
		if ($validAuth->status == false) {
			return	$this->set_response(['data'=>$user], $code);
		}
		//---------------------------------------------
		$this->form_validation->set_rules('notification_id', '', "required|numeric|valid_market_notification_id");
		if ($this->form_validation->run() == FALSE) {
			return	$this->validResponse();
		}
		$this->load->model('market/Notifications_model');
		$this->Notifications_model->delete($this->post('notification_id'));
		return $this->okResponse(['msg'=>"success delete"]);
	}

	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */
	public function unreadNote_get(){
		$validAuth = $this->verifyRequest();
		$user = $validAuth->msg ;
		$code = $validAuth->code ;
		if ($validAuth->status == false) {
			return  $this->set_response(['data'=>$user], $code);
		}
		//==================================================================
		$this->load->model('market/Notifications_model');
		$where = ["to_user_id"=>$user->user_id,"is_read"=>0];
		$json['count'] = $this->Notifications_model->count_by($where);
		return  $this->okResponse($json);
	}

	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */
	public function readNote_get(){
		$validAuth = $this->verifyRequest();
		$user = $validAuth->msg ;
		$code = $validAuth->code ;
		if ($validAuth->status == false) {
			return  $this->set_response(['data'=>$user], $code);
		}
		//==================================================================
		$this->load->model('market/Notifications_model');
		$where = ["to_user_id"=>$user->user_id,"is_read"=>0];
		$json['read'] = $this->Notifications_model->update_by($where,["is_read"=>1]);
		return  $this->okResponse($json);
	}





} // END CLASS
?>
