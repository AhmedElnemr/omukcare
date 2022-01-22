<?php
require APPPATH . 'libraries/ApiFunctions.php';
//require APPPATH . 'libraries/REST_Controller.php';
class Setting extends ApiFunctions{

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

	public function slider_get(){
		$this->load->model('Slider_model');
		$json["data"] = $this->Slider_model->get_many_by(['type'=>'app']);
		return $this->okResponse($json);
	}

	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */
	public function prices_countries_get(){
		$this->load->model('market/Prices_countries_model');
		$json["data"] = $this->Prices_countries_model->with('country')->get_all();
		return $this->okResponse($json);
	}
	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */
	public function show_get(){
		$this->load->model('system_management/Setting_model');
		$where = ['available'=>'1'] ;
		$where_in = ['main_data','market_data'];
		$json['settings'] = $this->Setting_model->getSettings($where,$where_in);
		$this->okResponse($json);
	}


} // END CLASS
?>
