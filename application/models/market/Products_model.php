<?php
include_once(APPPATH.'core/New_model.php');
class Products_model extends New_model {

	//=======================================
	public $_table = 'products';
	public $primary_key = 'id';
	public $_trans_table ='products_trans';
	public $trans_lang = ['ar','en','es'];
	public $trans_key = 'product_id';
	public $after_get = ['getTrans'];
	protected $soft_delete = TRUE;
	public $before_create = ['created_at'];
	public $before_update = ['updated_at'];
	public $belongs_to = [
		'campany' => ['model' => 'market/Products_campanies_model',"primary_key"=>'campany_id' ],
		'country' => ['model' => 'market/Countries_model',"primary_key"=>'country_id' ],
		'partner' => ['model' => 'market/Products_partners_model',"primary_key"=>'partner_id' ],
		'main_dep' => ['model' => 'market/Departments_model',"primary_key"=>'main_dep_id' ],
		'sub_dep' => ['model' => 'market/Departments_model',"primary_key"=>'sub_dep_id' ]
	];
	public $has_many = ['gallary' => [ 'model' => 'market/Products_images_model','primary_key' => 'product_id' ]];
	//=======================================


	/*


	public $belongs_to = [
		'activity' => ['model' => 'Company_activities_model',"primary_key"=>'activity_id_fk' ]
	];

	public $has_many = ['subs' => [ 'model' => 'Branchs_images_model','primary_key' => 'main_id' ]];



	*/
} // END CLASS
