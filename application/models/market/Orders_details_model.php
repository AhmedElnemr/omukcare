<?php
include_once(APPPATH.'core/New_model.php');
class Orders_details_model extends New_model {
	public function __construct(){
		parent:: __construct();
		$this->load->model("market/Products_model");
	}
	//=======================================
	public $_table = 'market_orders_details';
	public $primary_key = 'id';
	public $_trans_table ='';
	public $trans_lang = [];
	public $trans_key = '';
	public $after_get = ['getProduct'];
	public $belongs_to = [
		'order' => ['model' => 'market/Orders_model',"primary_key"=>'order_id' ],
		'partner' => ['model' => 'market/Products_partners_model',"primary_key"=>'partner_id' ],
		/*'offer' => ['model' => 'market/Orders_details_offers_model',"primary_key"=>'id' ]*/
	];
	//=======================================
	/*
	protected $soft_delete = TRUE;
    public $before_create = ['created_at'];
	public $before_update = ['updated_at'];
	public $belongs_to = [
		'activity' => ['model' => 'Company_activities_model',"primary_key"=>'activity_id_fk' ]
	];
	public $has_many = ['subs' => [ 'model' => 'Branchs_images_model','primary_key' => 'main_id' ]];
	*/
	protected  function getProduct($row){
		if (!empty($row)) {
			$lang = getLocalize();
			if (is_object($row)) {
				if (isset($row->product_id)) {
					$row->product = $this->Products_model
						             ->with_meny(["campany","country","partner","main_dep","sub_dep"])
						             ->get($row->product_id);
				} else {
					$row->product = null;
				}
			} else {
				if (isset($row['product_id'])) {
					$row["product"] = $this->Products_model
						               ->with_meny(["campany","country","partner","main_dep","sub_dep"])
						               ->get($row['product_id']);
				} else {
					$row["product"] = null;
				}
			}
			return $row;
		}
	}
} // END CLASS
