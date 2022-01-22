<?php
include_once(APPPATH.'core/New_model.php');
class Products_partners_model extends New_model {
	//=======================================
	public $_table = 'products_partners';
	public $primary_key = 'id';
	public $_trans_table ='products_partners_trans';
	public $trans_lang = ['ar','en','es'];
	public $trans_key = 'partner_id';
	public $after_get = ['getTrans'];
	public $before_create = ['created_at'];
	public $before_update = ['updated_at'];
	//=======================================
	/*
	protected $soft_delete = TRUE;
	public $belongs_to = [
		'activity' => ['model' => 'Company_activities_model',"primary_key"=>'activity_id_fk' ]
	];
	public $has_many = ['subs' => [ 'model' => 'Branchs_images_model','primary_key' => 'main_id' ]];
	*/
} // END CLASS
