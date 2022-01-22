<?php
include_once(APPPATH.'core/New_model.php');
class Prices_countries_model extends New_model {
	//=======================================
	public $_table = 'prices_countries';
	public $primary_key = 'shop_id';
	public $_trans_table ='';
	public $trans_lang = [];
	public $trans_key = '';
	public $after_get = [];
	protected $soft_delete = TRUE;
	public $before_create = ['created_at'];
	public $before_update = ['updated_at'];
	public $belongs_to = [
		'country' => ['model' => 'market/Countries_model',"primary_key"=>'country_id' ]
	];
	//=======================================
	/*


	public $belongs_to = [
		'activity' => ['model' => 'Company_activities_model',"primary_key"=>'activity_id_fk' ]
	];

	public $has_many = ['subs' => [ 'model' => 'Branchs_images_model','primary_key' => 'main_id' ]];



	*/
} // END CLASS
