<?php
require APPPATH . 'libraries/ApiFunctions.php';

class Favourite extends ApiFunctions
{

	public $withArr = ['product', 'campany', 'country', 'partner', 'main_dep', 'sub_dep'];

	public function index()
	{
		$this->set_response(array("data" => "404 page not found"),
			REST_Controller::HTTP_NOT_FOUND); // CREATED (400) being the HTTP response code
	}

	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */
	public function action_post()
	{
		$validAuth = $this->verifyRequest();
		$user = $validAuth->msg;
		$code = $validAuth->code;
		if ($validAuth->status == false) {
			return $this->set_response(['data' => $user], $code);
		}
		//---------------------------------
		$this->form_validation->set_rules('product_id', '', "required|valid_product_id");
		if ($this->form_validation->run() == FALSE) {
			return $this->validResponse();
		}
		//---------------------------------
		$this->load->model('market/Favourite_model');
		$where = ["user_id" => $user->user_id, "product_id" => $this->post("product_id")];
		$find = $this->Favourite_model->get_by($where);

		if (empty($find) && $find == null) {
			$this->Favourite_model->insert($where);
		} else {
			$this->Favourite_model->delete_by($where);
		}
		//---------------------------------
		return $this->okResponse(["msg" => "sucess action "]);
	}


	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */
	public function my_get()
	{
		$validAuth = $this->verifyRequest();
		$user = $validAuth->msg;
		$code = $validAuth->code;
		if ($validAuth->status == false) {
			return $this->set_response(['data' => $user], $code);
		}
		$pagination = ($this->get("pagination")) ? $this->get("pagination") : "off";

		$this->load->model('market/Favourite_model');
		$this->load->model('market/Products_prices_model');
		$where = ["user_id" => $user->user_id];
		$favourite = $this->Favourite_model->get_ids_by("product_id", $where);
		$json["data"] = [];
		if ($pagination == "on") {
			$page = $this->pages("product_id", "products_prices", [],$favourite , "");
			$json["meta"] = $page->meta;
			if(!empty($favourite)) {
				$json["data"] = $this->Products_prices_model->with_meny($this->withArr)
					->limit($page->start, $page->end)
					->get_many_in('product_id', $favourite);
			}

		} else {
			if(!empty($favourite)) {
				$json["data"] = $this->Products_prices_model->with_meny($this->withArr)
					->get_many_in('product_id', $favourite);
			}
		}
		return $this->okResponse($json);
	}


} // END CLASS
?>
