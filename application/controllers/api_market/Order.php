<?php
require APPPATH . 'libraries/ApiFunctions.php';

class Order extends ApiFunctions
{

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

	public function create_post()
	{
		$validAuth = $this->verifyRequest();
		$user = $validAuth->msg;
		$code = $validAuth->code;
		if ($validAuth->status == false) {
			return $this->set_response(['data' => $user], $code);
		}
		//-----------------------------------------
		$_POST = json_decode(file_get_contents("php://input"), true);
		$this->form_validation->set_rules('address', '', "required");
		$this->form_validation->set_rules('address_lat', '', "required|numeric");
		$this->form_validation->set_rules('address_long', '', "required|numeric");
		$this->form_validation->set_rules('delivery_date', '', "required|valid_date[d-m-y,-]");
		$this->form_validation->set_rules('delivery_time', '', "required|numeric");
		$this->form_validation->set_rules('payment_type', '', "required|in_list[paypal,cash]");
		$this->form_validation->set_rules('total_cost', '', "required|numeric");
		$this->form_validation->set_rules('shop_id', '', "required|numeric");
		$this->form_validation->set_rules('orders_details[]', '', "required");
		foreach ($this->post("orders_details") as $key => $post) {
			$this->form_validation->set_rules('orders_details[' . $key . '][product_id]', '', "required|valid_product_id|numeric");
			$this->form_validation->set_rules('orders_details[' . $key . '][amount]', '', "required|numeric");
			$this->form_validation->set_rules('orders_details[' . $key . '][cost]', '', "required|numeric");
			$this->form_validation->set_rules('orders_details[' . $key . '][have_offer]', '', "required|in_list[on,off]");
			$this->form_validation->set_rules('orders_details[' . $key . '][old_price]', '', "required|numeric");
			$this->form_validation->set_rules('orders_details[' . $key . '][offer_type]', '', "required|in_list[per,value]");
			$this->form_validation->set_rules('orders_details[' . $key . '][offer_value]', '', "required");
			$this->form_validation->set_rules('orders_details[' . $key . '][partner_id]', '', "required|valid_partner_id");
		}
		if ($this->form_validation->run() == FALSE) {
			return $this->validResponse();
		}
		//---------------------------------------------------------------
		$this->load->model('market/Orders_model');
		$this->load->model('market/Orders_details_model');
		$this->load->model('market/Orders_details_offers_model');
		$this->load->model('market/Orders_market_partner_model');
		$data["user_id"] = $user->user_id;
		$data["address"] = $this->post("address");
		$data["address_lat"] = $this->post("address_lat");
		$data["address_long"] = $this->post("address_long");
		$data["delivery_date"] = strtotime($this->post("delivery_date"));
		$data["delivery_time"] = $this->post("delivery_time");
		$data["payment_type"] = $this->post("payment_type");
		$data["total_cost"] = $this->post("total_cost");
		$data["shop_id"] = $this->post("shop_id");
		$order_id = $this->Orders_model->insert($data);
		//--------------
		$orders_details = $this->post("orders_details");
		$market_orders_partner = [] ;
		foreach ($orders_details as $post) {
			$Idata["order_id"] = $order_id;
			$Idata["product_id"] = $post["product_id"];
			$Idata["amount"] = $post["amount"];
			$Idata["cost"] = $post["cost"];
			$Idata["partner_id"] = $post["partner_id"];
			$details_id = $this->Orders_details_model->insert($Idata);
			if ($post["have_offer"] == "on") {
				$offer["details_id"] = $details_id;
				$offer["offer_type"] = $post['offer_type'];
				$offer["offer_value"] = $post['offer_value'];
				$offer["old_price"] = $post['old_price'];
				$this->Orders_details_offers_model->insert($offer);
			}
			//-------------------------------------
			if(isset($market_orders_partner[$post["partner_id"]])){
				$market_orders_partner[$post["partner_id"]] ["cost"] += $post["cost"];
			}
			else{
				$market_orders_partner[$post["partner_id"]] =
					[
						"order_id"=>$order_id,
						"partner_id"=>$post["partner_id"],
						"cost"=>$post["cost"],
						"user_id"=>$user->user_id
					];
			}
		}
		//--------------
		if(!empty($market_orders_partner)){
             foreach ($market_orders_partner as $oneOrder){
             	 $this->Orders_market_partner_model->insert($oneOrder);
			 }
		}
		//--------------
		$this->Orders_model->after_get = ['getShop'] ;
		$json["msg"] = "success reservation with num =".$order_id ;
		$json["id"]  = $order_id;
        $json["order"] = $this->Orders_model->get($order_id);
		$json["payment_link"] = base_url() . "market-buy/" . $order_id;
		$json["sucess_link"] = base_url() . 'market-paypal/success';
		$json["error_link"] = base_url() . 'market-paypal/cancel';
		$json["order_details"] = $this->Orders_details_model->get_many_by(["order_id"=>$order_id]);
		//-------------
		return $this->okResponse($json);
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
		$where = ["user_id" => $user->user_id];
		$this->load->model('market/Orders_model');
		if ($this->get("type")) {
			if ($this->get("type") == "current") {
				$where["order_status !="] = "old";
			}
			elseif ($this->get("type") == "previous"){
				$where["order_status"] = "old";
			}
		}
		$this->Orders_model->after_get = ['getShop'] ;
		$pagination = ($this->get("pagination"))? $this->get("pagination"):"off";
		if ($pagination == "on") {
			$page = $this->pages("user_id","market_orders",$where,[],"");
			$json["meta"] = $page->meta ;
			$json["data"] = $this->Orders_model->limit($page->start,$page->end)->get_many_by($where);
			$this->okResponse($json);
		}
		$json["data"] = $this->Orders_model->get_many_by($where);
		$this->okResponse($json);
	}

	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */

	public function one_get(){
		$order_id = ($this->get("order_id"))? $this->get("order_id"):"0";
		$this->load->model('market/Orders_model');
		$this->load->model('market/Orders_details_model');
		$this->Orders_model->after_get = ['getShop'] ;
		$json["order"] = $this->Orders_model->get($order_id);
		$json["order_details"] = $this->Orders_details_model->get_many_by(["order_id"=>$order_id]);
		return $this->okResponse($json);
	}

} // END CLASS
?>
