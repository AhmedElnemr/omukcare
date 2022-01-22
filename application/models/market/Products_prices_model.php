<?php
include_once(APPPATH.'core/New_model.php');
class Products_prices_model extends New_model {
	public function __construct(){
		parent:: __construct();
		$this->load->model("market/Favourite_model");
	}
	//=======================================
	public $_table = 'products_prices';
	public $primary_key = 'id';
	public $_trans_table ='';
	public $trans_lang = [];
	public $trans_key = '';
	public $after_get = ['getFavorite'];
	public $before_create = [];
	public $before_update = [];
	public $belongs_to = [
		'product' => ['model' => 'market/Products_model',"primary_key"=>'product_id' ],
		'campany' => ['model' => 'market/Products_campanies_model',"primary_key"=>'campany_id' ],
		'country' => ['model' => 'market/Countries_model',"primary_key"=>'country_id' ],
		'partner' => ['model' => 'market/Products_partners_model',"primary_key"=>'partner_id' ],
		'main_dep' => ['model' => 'market/Departments_model',"primary_key"=>'main_dep_id' ],
		'sub_dep' => ['model' => 'market/Departments_model',"primary_key"=>'sub_dep_id' ],
		'other_image' => ['model' => 'market/Products_images_model',"primary_key"=>'product_id' ],
		'shop' => ['model' => 'market/Prices_countries_model',"primary_key"=>'shop_id' ],
	];
	//=======================================
	protected  function getFavorite($row){
		if (!empty($row)) {
			if (is_object($row)) {
				if (isset($row->product_id)) {
					$row->favourite = $this->favourite($row->product_id);
				} else {
					$row->favourite = null;
				}
			} else {
				if ( isset($row['product_id'])) {
					$row["favourite"] = $this->favourite($row['product_id']);
				} else {
					$row["favourite"] = null;
				}
			}
			return $row;
		}
	}
	public function favourite($producr){
		$user =  0 ;
		if(isset($_SESSION["web_user"]->user_id)){
			$user = $_SESSION["web_user"]->user_id ;
		}
		if($this->input->get('user_id')){
			$user = $this->input->get('user_id') ;
		}
		return $this->Favourite_model->get_by(["user_id"=>$user,"product_id"=>$producr]);
	}
	//=======================================
	/*
    protected $soft_delete = TRUE;
	public $has_many = ['subs' => [ 'model' => 'Branchs_images_model','primary_key' => 'main_id' ]];
	*/
} // END CLASS
