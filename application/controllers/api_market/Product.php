<?php
require APPPATH . 'libraries/ApiFunctions.php';

class Product extends ApiFunctions
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
	public function all_get()
	{
		$header = $this->validateHeader();
		if ($header->status == false) {
			return $this->validResponse($this->msg_header);
		}
		$this->load->model('market/Products_prices_model');

		$shop_id = ($this->get("shop_id")) ? $this->get("shop_id") : "0";
		//--------------------------------------
		$this->load->model('market/Prices_countries_model');
		$json["shoping_data"] = $this->Prices_countries_model->with('country')->get($shop_id);
		//--------------------------------------
		$where = ["shop_id" => $shop_id];
		$pagination = ($this->get("pagination")) ? $this->get("pagination") : "off";
		if ($pagination == "on") {
			$page = $this->pages("id", "products_prices", $where, [], "");
			$json["meta"] = $page->meta;
			$json["data"] = $this->Products_prices_model->with_meny($this->withArr)
				->limit($page->start, $page->end)->get_many_by($where);
		} else {
			$json["data"] = $this->Products_prices_model->with_meny($this->withArr)
				->get_many_by($where);
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

	public function productsBySubDep_get()
	{
		$header = $this->validateHeader();
		if ($header->status == false) {
			return $this->validResponse($this->msg_header);
		}
		$this->load->model('market/Products_prices_model');
		$shop_id = ($this->get("shop_id")) ? $this->get("shop_id") : "0";
		//--------------------------------------
		$this->load->model('market/Prices_countries_model');
		$json["shoping_data"] = $this->Prices_countries_model->with('country')->get($shop_id);
		//--------------------------------------
		$sub_dep_id = ($this->get("sub_dep_id")) ? $this->get("sub_dep_id") : "0";
		$where = ["shop_id" => $shop_id, 'sub_dep_id' => $sub_dep_id];
		$pagination = ($this->get("pagination")) ? $this->get("pagination") : "off";
		if ($pagination == "on") {
			$page = $this->pages("id", "products_prices", $where, [], "");
			$json["meta"] = $page->meta;
			$json["data"] = $this->Products_prices_model->with_meny($this->withArr)
				->limit($page->start, $page->end)->get_many_by($where);
		} else {
			$json["data"] = $this->Products_prices_model->with_meny($this->withArr)
				->get_many_by($where);
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
	public function offers_get()
	{
		$header = $this->validateHeader();
		if ($header->status == false) {
			return $this->validResponse($this->msg_header);
		}
		$this->load->model('market/Products_prices_model');
		$shop_id = ($this->get("shop_id")) ? $this->get("shop_id") : "0";
		//--------------------------------------
		$this->load->model('market/Prices_countries_model');
		$json["shoping_data"] = $this->Prices_countries_model->with('country')->get($shop_id);
		//--------------------------------------
		$where = ["shop_id" => $shop_id, 'have_offer' => "on"];
		$pagination = ($this->get("pagination")) ? $this->get("pagination") : "off";
		if ($pagination == "on") {
			$page = $this->pages("id", "products_prices", $where, [], "");
			$json["meta"] = $page->meta;
			$json["data"] = $this->Products_prices_model->with_meny($this->withArr)
				->limit($page->start, $page->end)->get_many_by($where);
		} else {
			$json["data"] = $this->Products_prices_model->with_meny($this->withArr)
				->get_many_by($where);
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
	public function mostSell_get()
	{
		$header = $this->validateHeader();
		if ($header->status == false) {
			return $this->validResponse($this->msg_header);
		}
		$this->load->model('market/Products_prices_model');
		$shop_id = ($this->get("shop_id")) ? $this->get("shop_id") : "0";
		//--------------------------------------
		$this->load->model('market/Prices_countries_model');
		$json["shoping_data"] = $this->Prices_countries_model->with('country')->get($shop_id);
		//--------------------------------------
		$where = ["shop_id" => $shop_id];
		$pagination = ($this->get("pagination")) ? $this->get("pagination") : "off";
		if ($pagination == "on") {
			$page = $this->pages("id", "products_prices", $where, [], "");
			$json["meta"] = $page->meta;
			$json["data"] = $this->Products_prices_model->with_meny($this->withArr)
				->limit($page->start, $page->end)->order_by("sell_count", "DESC")->get_many_by($where);
		} else {
			$json["data"] = $this->Products_prices_model->with_meny($this->withArr)
				->order_by("sell_count", "DESC")->get_many_by($where);
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
	public function one_get()
	{
		$header = $this->validateHeader();
		if ($header->status == false) {
			return $this->validResponse($this->msg_header);
		}
		$this->load->model('market/Products_prices_model');
		$shop_id = ($this->get("shop_id")) ? $this->get("shop_id") : "0";
		//--------------------------------------
		$this->load->model('market/Prices_countries_model');
		$json["shoping_data"] = $this->Prices_countries_model->with('country')->get($shop_id);
		//--------------------------------------
		$product_id = ($this->get("product_id")) ? $this->get("product_id") : "0";
		$where = ["shop_id" => $shop_id, 'product_id' => $product_id];
		$json["data"] = $this->Products_prices_model->with_meny($this->withArr)->get_by($where);
		return $this->okResponse($json);
	}

	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */
	public function searchName_get()
	{
		$pagination = ($this->get("pagination")) ? $this->get("pagination") : "off";
		$name = ($this->get("name")) ? $this->get("name") : "off";
		$shop_id = ($this->get("shop_id")) ? $this->get("shop_id") : "0";
		//--------------------------------------
		$this->load->model('market/Prices_countries_model');
		$json["shoping_data"] = $this->Prices_countries_model->with('country')->get($shop_id);
		//--------------------------------------
		$this->load->model('market/Products_prices_model');
		$this->load->model('market/Products_trans_model');
		$ids = $this->Products_trans_model->getByName($name, $shop_id);
		if ($pagination == "on") {
			$page = (($this->get('page'))) ? $this->get('page') - 1 : 0;
			$limitPerPage = (($this->get('limit_per_page'))) ? $this->get('limit_per_page') : 20;
			$total = sizeof($ids);
			$currentPage = ($page == 0) ? 1 : $this->get('page');
			$lastPage = ceil($total / $limitPerPage);
			$json['meta'] = ["current_page" => (int)$currentPage, "last_page" => $lastPage, "total" => $total];
			$ids = $this->Products_trans_model->getByName($name, $shop_id , $limitPerPage, $limitPerPage * $page  ) ;
		}
		if (!empty($ids)) {
			$json["data"] = $this->Products_prices_model->with_meny($this->withArr)->get_many_by_in([], "product_id", $ids);
		} else {
			$json["data"] = [] ;
		}
		return $this->okResponse($json);


	}


} // END CLASS
?>
