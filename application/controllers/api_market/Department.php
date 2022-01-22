<?php
require APPPATH . 'libraries/ApiFunctions.php';

class Department extends ApiFunctions{

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

	public function main_get(){
		$header  = $this->validateHeader();
		if($header->status == false){
			return	$this->validResponse($this->msg_header);
		}
		$this->load->model('market/Departments_model');
		$where = ["level"=>1];
		$pagination = ($this->get("pagination"))? $this->get("pagination"):"off";
		if ($pagination == "on") {
			$page = $this->pages("id","departments",$where,[],"");
			$json["meta"] = $page->meta ;
			$json["data"] = $this->Departments_model->limit($page->start, $page->end)->get_many_by($where);
		} else {
			$json["data"] = $this->Departments_model->get_many_by($where);
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

	public function sub_get(){
		$header  = $this->validateHeader();
		if($header->status == false){
			return	$this->validResponse($this->msg_header);
		}
		$this->load->model('market/Departments_model');
		$where = ["level"=>2];
		$pagination = ($this->get("pagination"))? $this->get("pagination"):"off";
		if ($pagination == "on") {
			$page = $this->pages("id","departments",$where,[],"");
			$json["meta"] = $page->meta ;
			$json["data"] = $this->Departments_model->limit($page->start, $page->end)->get_many_by($where);
		} else {
			$json["data"] = $this->Departments_model->get_many_by($where);
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
	public function getSubByMain_get(){
		$header  = $this->validateHeader();
		if($header->status == false){
			return	$this->validResponse($this->msg_header);
		}
		$this->load->model('market/Departments_model');
		$main = ($this->get("main_cat_id"))? $this->get("main_cat_id"):"0";
		$where = ["level"=>2,"perant_id"=>$main];
		$pagination = ($this->get("pagination"))? $this->get("pagination"):"off";
		if ($pagination == "on") {
			$page = $this->pages("id","departments",$where,[],"");
			$json["meta"] = $page->meta ;
			$json["data"] = $this->Departments_model->limit($page->start, $page->end)->get_many_by($where);
		} else {
			$json["data"] = $this->Departments_model->get_many_by($where);
		}
		return $this->okResponse($json);
	}




} // END CLASS
?>
