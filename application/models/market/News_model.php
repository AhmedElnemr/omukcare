<?php
include_once(APPPATH.'core/New_model.php');
class News_model extends New_model {
	//=======================================
	public $_table = 'news';
	public $primary_key = 'id';
	public $_trans_table ='news_trans';
	public $trans_lang = ['ar','en','es'];
	public $trans_key = 'news_id';
	public $after_get = ['getTrans'];
	public $before_create = ['created_at' ];
	public $before_update = ['updated_at' ];
	//=======================================
	/*
protected $soft_delete = TRUE;
public $has_many = [
		'sub' => ['model' => 'Departments_model',"primary_key"=>'perant_id' ]
	];
	public $belongs_to = [
		'activity' => ['model' => 'Company_activities_model',"primary_key"=>'activity_id_fk' ]
	];

	public $has_many = ['subs' => [ 'model' => 'Branchs_images_model','primary_key' => 'main_id' ]];



	*/
} // END CLASS
