<?php
include_once(APPPATH.'core/New_model.php');
class Orders_market_partner_model extends New_model {
	public function __construct(){
		parent:: __construct();
		//$this->load->model("market/Products_model");
	}
	//=======================================
	public $_table = 'market_orders_partner';
	public $primary_key = 'id';
	public $_trans_table ='';
	public $trans_lang = [];
	public $trans_key = '';
	public $after_get = [];
	public $belongs_to = [
		'order' => ['model' => 'market/Orders_model',"primary_key"=>'order_id' ],
		'client' => ['model' => 'Registrations_model',"primary_key"=>'user_id' ]
	];
    public $before_create = ['created_at'];
    public $before_update = ['updated_at'];
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
} // END CLASS
