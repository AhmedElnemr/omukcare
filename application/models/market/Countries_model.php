<?php
include_once(APPPATH.'core/New_model.php');
class Countries_model extends New_model {
	//=======================================
	public $_table = 'countries';
	public $primary_key = 'id_country';
	public $_trans_table ='countries_trans';
	public $trans_lang = ['ar','en','es'];
	public $trans_key = 'country_id';
	public $after_get = ['getTrans'];
	protected $soft_delete = TRUE;
	public $before_create = ['created_at'];
	public $before_update = ['updated_at'];
	//=======================================
	/*


	public $belongs_to = [
		'activity' => ['model' => 'Company_activities_model',"primary_key"=>'activity_id_fk' ]
	];

	public $has_many = ['subs' => [ 'model' => 'Branchs_images_model','primary_key' => 'main_id' ]];



	*/
} // END CLASS
