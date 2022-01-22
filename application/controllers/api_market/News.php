<?php
require APPPATH . 'libraries/ApiFunctions.php';
//require APPPATH . 'libraries/REST_Controller.php';
class News extends ApiFunctions{

	public function index(){
		$this->set_response(array("data"=>"404 page not found"),
			REST_Controller::HTTP_NOT_FOUND); // CREATED (400) being the HTTP response code
	}

	public function all_get(){
		$header  = $this->validateHeader();
		if($header->status == false){
			return	$this->validResponse($this->msg_header);
		}
		$this->load->model('market/News_model');
		$where = [];
		$pagination = ($this->get("pagination"))? $this->get("pagination"):"off";
		if ($pagination == "on") {
			$page = $this->pages("id","news",$where,[],"");
			$json["meta"] = $page->meta ;
			$json["data"] = $this->News_model->limit($page->start, $page->end)->get_all();
		} else {
			$json["data"] = $this->News_model->get_all();
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
	public function one_get(){
		$header  = $this->validateHeader();
		if($header->status == false){
			return	$this->validResponse($this->msg_header);
		}
		$this->load->model('market/News_model');
		$id = ($this->get("id"))? $this->get("id"):"0";
		$json["data"] = $this->News_model->get($id);
		return $this->okResponse($json);
	}



	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */




} // END CLASS
?>
