<?php

class Product extends MY_Controller
{
	private $folder = "app_products";
	private $con = "app-products";

	public function __construct()
	{
		parent::__construct();
		$this->load->model('market/Products_model', 'Cmodel');
		$this->load->model('market/Products_trans_model', "Tmodel");
	}

	public function index()
	{
		//$wherePrtner = ($_SESSION["user_type"] == "admin")? ["partner_id !="=> 0]:["partner_id"=>$_SESSION["partner_id"]];
		$wherePrtner = ["partner_id"=>$_SESSION["partner_id"]];
		$withArr = ['sub_dep','main_dep','campany'];
		$data["data_table"] = $this->Cmodel->with_meny($withArr)->get_many_by($wherePrtner);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'المنتجات  ';
		$data["my_footer"] = ['table'];
		$data['subview'] = $this->folder . '/all';
		$this->load->view('layout/admin', $data);
	}

	public function add()
	{
		$this->load->model('market/Departments_model');
		$this->load->model('market/Products_partners_model');
		$this->load->model('market/Countries_model');
		$this->load->model('market/Products_campanies_model');
		$this->load->model('market/Prices_countries_model');
		$wherePrtner = ($_SESSION["user_type"] == "admin")? ["id !="=> 0]:["id"=>$_SESSION["partner_id"]];
		$data["partners"] = $this->Products_partners_model->get_many_by($wherePrtner);
		$data["op"] = 'INSERT';
		$data["form"] = $this->con . '/create';
		$data["out"] = $this->Cmodel->getById(0);
		$data["Departments"] = $this->Departments_model->get_many_by(["level" => 2]);
		$data["Countries"] = $this->Countries_model->get_all();
		$data["campanies"] = $this->Products_campanies_model->get_all();
		$data["prices"] = $this->Prices_countries_model->with('country')->get_all();
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'المنتجات  ';
		$data["my_footer"] = ["upload", "valid", 'multi_upload'];
		$data['subview'] = $this->folder . '/one';
		$this->load->view('layout/admin', $data);
	}

	public function edit($id)
	{
		$this->load->model('market/Departments_model');
		$this->load->model('market/Products_partners_model');
		$this->load->model('market/Countries_model');
		$this->load->model('market/Products_campanies_model');
		$this->load->model('market/Prices_countries_model');
		$this->load->model('market/Products_prices_model');
		$this->load->model('market/Products_images_model');
		$data["op"] = 'UPDTATE';
		$data["form"] = $this->con . '/update/' . $id;
		$data["out"] = $this->Cmodel->getById($id);
		$data["Departments"] = $this->Departments_model->get_many_by(["level" => 2]);
		$data["product_prices"] = $this->Products_prices_model->get_many_by(["product_id" => $id]);
		$data["photos"] = $this->Products_images_model->get_many_by(["product_id" => $id]);
		$wherePrtner = ($_SESSION["user_type"] == "admin")? ["id !="=> 0]:["id"=>$_SESSION["partner_id"]];
		$data["partners"] = $this->Products_partners_model->get_many_by($wherePrtner);
		$data["Countries"] = $this->Countries_model->get_all();
		$data["campanies"] = $this->Products_campanies_model->get_all();
		$data["prices"] = $this->Prices_countries_model->with('country')->get_all();
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'المنتجات  ';
		$data["my_footer"] = ["upload", "valid", 'multi_upload'];
		$data['subview'] = $this->folder . '/one';
		$this->load->view('layout/admin', $data);
	}

	public function create()
	{

		if ($this->input->post('INSERT') == "INSERT") {
			$this->load->model('market/Products_prices_model');
			$this->load->model('market/Products_lang_model');
			$this->load->model('market/Products_images_model');
			//=======================================
			$Idata = $this->input->post('Tdata');
			$dep  = explode("-", $Idata["sub_dep_id"] );
			$Idata['sub_dep_id'] = $dep[0];
			$Idata['main_dep_id'] = $dep[1];
			$Idata["image"] = $this->upload_image("image");
			$Idata["license_image"] = $this->upload_image("license_image");
			$Idata["created_by"] = $_SESSION["user_id"];
			$id = $this->Cmodel->insert($Idata);
			//========================================
			$filesCount = $_FILES["images"]['size'][0];
			if ($filesCount != "0" || $filesCount != 0) {
				$imgs = $this->upload_muli_image("images");
				foreach ($imgs as $key => $img) {
					$imgData["product_id"] = $id;
					$imgData["image"] = $img;
					$this->Products_images_model->insert($imgData);
				}
			}
			//========================================
			$Tdata = $this->input->post('Pdata');
			foreach ($Tdata as $key => $val) {
				$data["product_id"] = $id;
				$data["lang"] = $key;
				$data["title"] = $val['title'];
				$data["content"] = trim($val['content']);
				$this->Tmodel->insert($data);
			}
			//========================================
			$lang_id = $this->input->post('lang_id');
			$price = $this->input->post('price');
			foreach ($lang_id as $key => $val) {
				$L["product_id"] = $id;
				$L["shop_id"] = $val;
				$this->Products_lang_model->insert($L);
				//-------------------------------------
				$P["product_id"] = $id;
				$P["shop_id"] = $val;
				$P["price"] = $price[$key];
				$P["old_price"] = $price[$key];
				$P["sub_dep_id"] = $Idata['sub_dep_id'];
				$P["main_dep_id"] = $Idata['main_dep_id'];
				$P["campany_id"] = $Idata['campany_id'];
				$P["country_id"] = $Idata['country_id'];
				$P["partner_id"] = $Idata['partner_id'];
				$this->Products_prices_model->insert($P);
			}
			//========================================
			$this->message('s');
			redirect($this->con, 'refresh');
		}

	}

	public function update($id)
	{

		if ($this->input->post('UPDTATE') == "UPDTATE") {
			$this->load->model('market/Products_prices_model');
			$this->load->model('market/Products_lang_model');
			$this->load->model('market/Products_images_model');
			//=======================================
			$Idata = $this->input->post('Tdata');
			$Idata["updated_by"] = $_SESSION["user_id"];
			$dep  = explode("-", $Idata["sub_dep_id"] );
			$Idata['sub_dep_id'] = $dep[0];
			$Idata['main_dep_id'] = $dep[1];
			//-----------------------
			$image = $this->upload_image("image");
			if (!empty($image)) {
				$Idata["image"] = $image;
			}
			$license_image = $this->upload_image("license_image");
			if (!empty($license_image)) {
				$Idata["license_image"] = $license_image;
			}
			$this->Cmodel->update($id, $Idata);
			//========================================
			$filesCount = $_FILES["images"]['size'][0];
			if ($filesCount != "0" || $filesCount != 0) {
				$imgs = $this->upload_muli_image("images");
				foreach ($imgs as $key => $img) {
					$imgData["product_id"] = $id;
					$imgData["image"] = $img;
					$this->Products_images_model->insert($imgData);
				}
			}
			//========================================
			$this->Tmodel->delete_by(["product_id"=>$id]);
			$Tdata = $this->input->post('Pdata');
			foreach ($Tdata as $key => $val) {
				$data["product_id"] = $id;
				$data["lang"] = $key;
				$data["title"] = $val['title'];
				$data["content"] = trim($val['content']);
				$this->Tmodel->insert($data);
			}
			//========================================
			$this->Products_lang_model->delete_by(["product_id"=>$id]);
			$this->Products_prices_model->delete_by(["product_id"=>$id]);
			$lang_id = $this->input->post('lang_id');
			$price = $this->input->post('price');
			foreach ($lang_id as $key => $val) {
				$L["product_id"] = $id;
				$L["shop_id"] = $val;
				$this->Products_lang_model->insert($L);
				//-------------------------------------
				$P["price"] = $price[$key];
				$P["old_price"] = $price[$key];
				$P["product_id"] = $id;
				$P["shop_id"] = $val;
				$P["sub_dep_id"] = $Idata['sub_dep_id'];
				$P["main_dep_id"] = $Idata['main_dep_id'];
				$P["campany_id"] = $Idata['campany_id'];
				$P["country_id"] = $Idata['country_id'];
				$P["partner_id"] = $Idata['partner_id'];
				$this->Products_prices_model->insert($P);
			}
			//========================================
			$this->message('i');
			redirect($this->con, 'refresh');
		}

	}

	public function delete($id)
	{
		$this->Cmodel->delete($id);
		$this->message('e');
		redirect($this->con, 'refresh');
	}

	public function deleteImage($id,$product){
		$this->load->model('market/Products_images_model');
		$this->Products_images_model->delete($id);
		$this->message('e');
		redirect($this->con.'/edit/'.$product, 'refresh');
	}

	public function undeleted($id){
		$Idata['deleted'] = 0 ;
		$this->Cmodel->update($id,$Idata);
		$this->message('i');
		redirect( $this->con.'/deleted', 'refresh');
	}

	public function deleted(){
		$data["data_table"] = $this->Cmodel->with_meny(['sub_dep','main_dep','campany'])
			                               ->only_deleted()->get_all();
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = ' المنتجات المحذوفة ';
		$data["my_footer"] = ['table'];
		$data['subview'] = $this->folder.'/deleted';
		$this->load->view('layout/admin', $data);
	}

	public function offers($id){

		$this->load->model('market/Products_prices_model');
		$this->load->model('market/Countries_model');
		$this->load->model('market/Products_model');
		$product = $this->Products_model->get($id);
		$data["data_table"] = $this->Products_prices_model->with_meny(['shop'])->get_many_by(["product_id"=>$id]);
		$data["form"] = $this->con . '/setOffers/'.$id;
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'عروض منتج : '.$product->word->title;
		$data["my_footer"] = ['table'];
		$data['subview'] = $this->folder.'/offers';
		$this->load->view('layout/admin', $data);

	}

	public function setOffers($id){
		if ($this->input->post('Insert') == "Insert") {
          // $this->tt_j($_POST);
			$this->load->model('market/Products_prices_model');
			$have_offer  = $this->input->post('have_offer') ;
			$offer_type  = $this->input->post('offer_type') ;
			$offer_value  = $this->input->post('offer_value') ;
			$old_price  = $this->input->post('old_price') ;
			$price  = $this->input->post('price') ;
			foreach ($have_offer as $key=>$value){
				$Idata["have_offer"] = $have_offer[$key];
				$Idata["offer_type"] = $offer_type[$key];
				if ($value == "on") {
					$Idata["old_price"] = $price[$key];
					if ($offer_type[$key] == "per") {
						$Idata["price"] = ($price[$key] -  (  ($price[$key] * $offer_value[$key] ) / 100 ) ) ;
					} else {
						$Idata["price"] =  $price[$key] - $offer_value[$key] ;
					}
					$Idata["offer_value"] = $offer_value[$key];
				}
				else{
					$Idata["old_price"] = $old_price[$key];
					$Idata["price"] = $old_price[$key];
					$Idata["offer_value"] = 0;
				}
				$this->Products_prices_model->update($key, $Idata);
			}
			$this->message('i');
			redirect($this->con, 'refresh');
		}
		redirect($this->con, 'refresh');
	}



} //END CLASS
?>
