<?php
include_once(APPPATH.'core/New_model.php');
class Products_images_model extends New_model {
	//=======================================
	public $_table = 'products_images';
	public $primary_key = 'id';
	public $_trans_table ='';
	public $trans_lang = [];
	public $trans_key = '';
	public $after_get = [];

	public $before_create = [];
	public $before_update = [];
	//=======================================
	/*
     protected $soft_delete = TRUE;

	public $belongs_to = [
		'activity' => ['model' => 'Company_activities_model',"primary_key"=>'activity_id_fk' ]
	];

	public $has_many = ['subs' => [ 'model' => 'Branchs_images_model','primary_key' => 'main_id' ]];



	*/
} // END CLASS
