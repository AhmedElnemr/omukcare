<?php
include_once(APPPATH.'core/New_model.php');
class News_trans_model extends MY_Model {
	//=======================================
	public $_table = 'news_trans';
	public $primary_key = 'id';
	public $_trans_table ='';
	public $trans_lang = [];
	public $trans_key = '';

	//=======================================
	/*
     protected $soft_delete = TRUE;

	public $belongs_to = [
		'activity' => ['model' => 'Company_activities_model',"primary_key"=>'activity_id_fk' ]
	];

	public $has_many = ['subs' => [ 'model' => 'Branchs_images_model','primary_key' => 'main_id' ]];

	public $before_create = ['created_at' ];
	*/
} // END CLASS
