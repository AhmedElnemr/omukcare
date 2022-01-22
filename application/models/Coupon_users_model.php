<?php
/**
 * Created by PhpStorm.
 * User: win 7
 * Date: 11/11/2019
 * Time: 9:09 PM
 */
class Coupon_users_model extends MY_Model {
	public $_table = 'coupons_users';
	public $primary_key = 'id';

	public $belongs_to = [
		'client' => ['model' => 'Registrations_model',"primary_key"=>'user_id'],
		'coupon' => ['model' => 'Coupon_model',"primary_key"=>'coupon_id'],
	];

	public $translate_to = [];

	public $before_create = array( 'timestamps_in' );

	protected function timestamps_in($row)
	{
		$row['created_at'] = time();
		return $row;
	}

} // END CLASS
