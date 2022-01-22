<?php
include_once(APPPATH.'core/New_model.php');
class Orders_model extends New_model {
	public function __construct(){
		parent:: __construct();
        $this->load->model('market/Prices_countries_model');
	}
	//=======================================
	public $_table = 'market_orders';
	public $primary_key = 'id';
	public $_trans_table ='';
	public $trans_lang = [];
	public $trans_key = '';
	public $after_get = [];
	public $before_create = ['created_at'];
	public $before_update = ['updated_at'];
	//=======================================
	public $belongs_to = [
		'client' => ['model' => 'Registrations_model',"primary_key"=>'user_id' ]
	];
	/*
	protected $soft_delete = TRUE;
    public $before_create = ['created_at'];
	public $before_update = ['updated_at'];
	public $belongs_to = [
		'activity' => ['model' => 'Company_activities_model',"primary_key"=>'activity_id_fk' ]
	];
	public $has_many = ['subs' => [ 'model' => 'Branchs_images_model','primary_key' => 'main_id' ]];
	*/
	//=======================================
	protected  function getShop($row){
		if (!empty($row)) {
			if (is_object($row)) {
				if (isset($row->shop_id)) {
					$row->shop = $this->shopData($row->shop_id);
				} else {
					$row->shop = null;
				}
			} else {
				if ( isset($row['shop_id'])) {
					$row["shop"] = $this->shopData($row['shop_id']);
				} else {
					$row["shop"] = null;
				}
			}
			return $row;
		}
	}

	public function shopData($shop_id){
		return $this->Prices_countries_model->with('country')->get($shop_id);
	}
	//=======================================




} // END CLASS
