<?php
/**
 * Created by PhpStorm.
 * User: win 7
 * Date: 11/11/2019
 * Time: 9:09 PM
 */
class Commissions_model extends MY_Model {
	public $_table = 'commissions';
	public $primary_key = 'id';
	public $belongs_to = [
		'to_user_date' => ['model' => 'Registrations_model',"primary_key"=>'to_user' ],
		'from_user_date' => [ 'model' => 'Registrations_model',"primary_key"=>'from_user']
	];
	public $translate_to = [];
	public $before_create = [];

	/*

	public $soft_delete = TRUE;
	public $belongs_to = [
		 'activity' => array( 'model' => 'Company_activities_model',"primary_key"=>'activity_id_fk' )
		 ];

	public $has_many = ['subs' => array( 'model' => 'Branchs_images_model','primary_key' => 'main_id' )];

	public $before_create = array( 'timestamps_in' );
	public $before_update = array( 'timestamps_up' );

	protected function timestamps_in($row)
	{
		$row['created_at'] = $row['updated_at'] =  date('Y-m-d H:i:s');
		return $row;
	}
	protected function timestamps_up($row)
	{
		$row['updated_at'] =  date('Y-m-d H:i:s');
		return $row;
	}
	*/




} // END CLASS
