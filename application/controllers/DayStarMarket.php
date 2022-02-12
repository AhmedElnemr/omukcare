<?php

class DayStarMarket extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		//--------------------------------------------------------
		$this->load->model('system_management/Setting_model');
		$this->setting = $this->Setting_model->getSettings();

		$this->load->model('market/Departments_model');
		$this->departments = $this->Departments_model->get_many_by(["level"=>2]);
		//--------------------------------------------------------
		$lang = $this->uri->segment(1);
		if (in_array($lang, array("ar", "en", "es"))) {
			$this->webLang = $lang;
			if ($lang == "ar") {
				$this->lang->load('static', 'ar');
				delete_cookie("last_lang");
				set_cookie('last_lang', "ar", time() + 86400 * 30);
			} elseif ($lang == "en") {
				$this->lang->load('static', 'en');
				delete_cookie("last_lang");
				set_cookie('last_lang', "en", time() + 86400 * 30);
			} else {
				$this->lang->load('static', 'es');
				delete_cookie("last_lang");
				set_cookie('last_lang', "es", time() + 86400 * 30);
			}
		} else {
			$cookeLang = $this->input->cookie('last_lang');
			if (isset($cookeLang)) {
				$this->webLang = $cookeLang;
				$this->lang->load('static', $cookeLang);
			} else {
				$this->webLang = LOCAL_LANG;
				$this->lang->load('static', LOCAL_LANG);
				set_cookie('last_lang', LOCAL_LANG, time() + 86400 * 30);
			}
		}
		//-------------------------------------------------------
		//-------------------------------------------------------
		$cookeLastVisit = $this->input->cookie('last_visit');
		if (isset($cookeLastVisit)) {
			delete_cookie("last_visit");
			set_cookie('last_visit', strtotime(date("Y-m-d")), time() + 86400 * 30);
		} else {
			set_cookie('last_visit', strtotime(date("Y-m-d")), time() + 86400 * 30);
			$this->load->model('Model_visit');
			$this->Model_visit->insertVisitor(date("Y-m-d"), "web_count");
		}


	}

	private function test($data = array())
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		die;
	}

	private function test_j($data = array())
	{
		header('Content-Type: application/json');
		echo json_encode($data);
		die;
	}

	private function setPaging($controller, $total_records, $limit_per_page)
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url() . $controller;
		$config['total_rows'] = $total_records;
		$config['per_page'] = $limit_per_page;
		$config["uri_segment"] = 3;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = false;
		$config['reuse_query_string'] = true;
		$config['full_tag_open'] = '<ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul>';
		$config['num_links'] = 5;
		$config['page_query_string'] = true;
		//$config['query_string_segment'] = 'your_string';
		$config['full_tag_open'] = '<ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul>';

		$config['page_query_string'] = true;

		$config['prev_link'] = '&lt;السابق  '; // السابق
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['next_link'] = 'التالي &gt;';  // التالى
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}

	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */
	public function index()
	{
		$this->load->model('market/Departments_model');
        $data["departments"] = $this->Departments_model->with('sub')->get_many_by(["level"=>1]);
       // $this->test_j($data);
		//==================================================
		$data["banner"] = ["title" => lang("market")];
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = lang("market");
		$data["page_name"] = "market";
		$data['subview'] = 'market/category';
		$data['myFiles'] = ["market"];
		//$this->test_j($data);
		$this->load->view('layout/web', $data);
	}

	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */
	private  function getShopingId(){
		$this->load->model('market/Countries_model');
		$this->load->model('market/Prices_countries_model');
		$shop_id = 0 ;
		$defaultShop = $this->Prices_countries_model->get_by(["is_first"=>"yes"]);
		if(!empty($defaultShop)){
			$shop_id = $defaultShop->shop_id;
		}
		$shopping = $this->input->get("shopping") ;
		if(isset($shopping)){
			$country = $this->Countries_model->get_by(["iso_two"=>$shopping]);
			if(isset($country->id_country)){
				$countryPrice = $this->Prices_countries_model->get_by(["country_id"=>$country->id_country]);
				if(isset($countryPrice->shop_id)){
					$shop_id = $countryPrice->shop_id ;
				}
			}
		}
          return $shop_id ;
	}

	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */

	public function products($id){

		$this->load->model('market/Products_prices_model');
		$this->load->model('market/Departments_model');
		$shop_id = $this->getShopingId();
		//==================================================
		$where = ["sub_dep_id"=>$id , "shop_id"=>$shop_id];
		$with = ['product','other_image'] ;
		$data["products"] = $this->Products_prices_model->with_meny($with)->get_many_by($where);
		$data["departments"] = $this->Departments_model->get_many_by(["level"=>2]);
		//==================================================
		$data["banner"] = ["title" => lang("market")];
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = lang("market");
		$data["page_name"] = "market";
		$data['subview'] = 'market/products';
		$data['myFiles'] = ["market"];
		$this->load->view('layout/web', $data);
	}


	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */
     public function getProductById($id){
		 $this->load->model('market/Products_prices_model');
		 $with = ['product'] ;
		 $data["product"] = $this->Products_prices_model->with_meny($with)->get($id);
		 $this->load->view('frontend/market/one_product', $data);
	 }



	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */
	public function singleProduct($id){
		$this->load->model('market/Products_prices_model');
		$this->load->model('market/Products_images_model');
		$with = ['product','main_dep','partner','country','campany','sub_dep'] ;
		$product  = $data["product"] = $this->Products_prices_model->with_meny($with)->get($id);
		//$this->test_j($product);
		//==================================================
		$where = ["id !=" =>$id ,"sub_dep_id"=>$product->sub_dep_id ,"shop_id"=>$product->shop_id] ;
		$data["other"] = $this->Products_prices_model->with_meny(["product"])->get_many_by($where);
		$data['gallary'] = $this->Products_images_model->get_many_by(["product_id"=>$product->product_id]);
		//==================================================
		//$this->test_j($data["other"]);
		$data["banner"] = ["title" => lang("market")];
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = lang("market");
		$data["page_name"] = "market";
		$data['subview'] = 'market/single_product';
		$data['myFiles'] = ["market"];
		$this->load->view('layout/web', $data);
	}

	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */

	public function myFavourite(){
		if(isset($_SESSION["web_user"])){
			$this->load->model('market/Favourite_model');
			$this->load->model('market/Products_prices_model');
			$where = ["user_id" => $_SESSION["web_user"]->user_id];
			$favourite = $this->Favourite_model->get_ids_by("product_id", $where);
			if(!empty($favourite)) {
				$data["poroducts"] = $this->Products_prices_model->with_meny(["product"])
					->get_many_in('product_id', $favourite);
			}
			//==================================================
			$data["banner"] = ["title" => lang("market")];
			$data['metadiscription'] = $data['metakeyword'] = $data['title'] = lang("market");
			$data["page_name"] = "market";
			$data['subview'] = 'market/favourite';
			$data['myFiles'] = ["market"];
			$this->load->view('layout/web', $data);
		}
		else{
			redirect("Page404", 'refresh');
		}
	}

	public function removeFromFavourite($id){
		$this->load->model('market/Favourite_model');
		$where = ["user_id" => $_SESSION["web_user"]->user_id, "product_id" => $id];
		$this->Favourite_model->delete_by($where);
		redirect("my-Favourite", 'refresh');
	}

	public function actionToFavourite($id){
		if (isset($_SESSION["web_user"]->user_id)) {
			$this->load->model('market/Favourite_model');
			$where = ["user_id" => $_SESSION["web_user"]->user_id, "product_id" => $id];
			$find = $this->Favourite_model->get_by($where);
			if (isset($find->id)) {
				$this->Favourite_model->delete_by($where);
			} else {
				$this->Favourite_model->insert($where);
			}
			echo lang('successfully');
		}
		else {
			echo lang('login first');
		}
		//redirect("my-Favourite", 'refresh');
	}
	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */

	public function cart(){
		//==================================================
		$data["banner"] = ["title" => lang("market")];
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = lang("market");
		$data["page_name"] = "market";
		$data['subview'] = 'market/cart';
		$data['myFiles'] = ["market"];
		$this->load->view('layout/web', $data);
	}

	public function checkout()
	{

		//==================================================
		$this->load->library('google_maps');
		$config = array();
		$config['zoom'] = "auto";
		$marker = array();
		$marker['draggable'] = true;
		$marker['ondragend'] = '$("#lat").val(event.latLng.lat());$("#lng").val(event.latLng.lng());';
		$config['center'] = '30.043489,31.235291';//'auto';
		$config['onboundschanged'] = '  if (!centreGot) {
                                                var mapCentre = map.getCenter();
                                                marker_0.setOptions({
                                                    position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
                                                });
                                                $("#lat").val(mapCentre.lat());
                                                $("#lng").val(mapCentre.lng());
                                            }
                                            centreGot = true;';
		$config['geocodeCaching'] = TRUE;
		$marker['title'] = 'أنت هنا .. من فضلك قم بسحب العلامة ووضعها على المكان الصحيح';
		$this->google_maps->initialize($config);
		$this->google_maps->add_marker($marker);
		$data['maps'] = $this->google_maps->create_map();
		//==================================================
		$data["banner"] = ["title" => lang("market")];
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = lang("market");
		$data["page_name"] = "market";
		$data['subview'] = 'market/checkout';
		$data['myFiles'] = ["market",'make_order'];
		$this->load->view('layout/web', $data);
	}

    public function createMarketOrder(){
		  if($this->input->post('INSERT')){
             //$this->test_j($_POST);
		  	 $this->load->model('market/Orders_model');
             $this->load->model('market/Orders_details_model');
             $this->load->model('market/Orders_details_offers_model');
			 //-----------------------
             $times = explode(" ", $this->input->post("order_date_time"));
			 $user =  $_SESSION["web_user"]->user_id ;
			 //-----------------------
             $order["user_id"] = $user;
             $order["order_status"] = 'new';
			 $order["delivery_date"]  = strtotime($times[0]);
			 $order["delivery_time"]= strtotime($this->input->post("order_date_time"));
             $order["payment_type"] = $this->input->post('payment_type');
             $order["total_cost"] = $this->input->post('total_cost');
             //$order["shop_id"] = $this->input->post('address');
             $order["address"] = $this->input->post('address');
             $order["address_lat"] = $this->input->post('address_lat');
             $order["address_long"] = $this->input->post('address_long');
             $order["created_by"] = $user;
             $order_id = $this->Orders_model->insert($order);
             //-------------------------
             $product = $this->input->post('product_id');
             $amount = $this->input->post('amount');
             $cost = $this->input->post('cost');
             $offer_type = $this->input->post('offer_type');
             $offer_value = $this->input->post('offer_value');
             $old_price = $this->input->post('old_price');
             $have_offer = $this->input->post('have_offer');
             //$partner_id = $this->input->post('partner_id');
             if(isset($product) && !empty($product)){
				 foreach ($product as $key=>$value){
					 $order_details['order_id'] = $order_id;
					 $order_details['product_id'] = $value;
					 $order_details['amount'] = $amount[$key];
					 $order_details['cost'] = $cost[$key];
					 $order_details_id = $this->Orders_details_model->insert($order_details);
					 if($have_offer[$key] == "on"){
						 $orders_details_offers['details_id'] = $order_details_id;
						 $orders_details_offers['offer_type'] = $offer_type[$key];
						 $orders_details_offers['offer_value'] = $offer_value[$key];
						 $orders_details_offers['old_price'] = $old_price[$key];
						 $this->Orders_details_offers_model->insert($orders_details_offers);
					 }
				 }
			 }
			  //-------------------------
			  $_SESSION['sweet'] = "success_market_order";
             $this->test($_SESSION);
			  redirect("profile/".$user, 'refresh');
		  }
	}





}// END CLASS
