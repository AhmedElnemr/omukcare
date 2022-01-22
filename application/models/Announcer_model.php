<?php
/**
 * Created by PhpStorm.
 * User: win 7
 * Date: 16/01/2022
 * Time: 9:09 PM
 */
class Announcer_model extends MY_Model {
	public $_table = 'announcer';
	public $primary_key = 'id';
	public $soft_delete = TRUE;

	public $belongs_to = [];

	public $translate_to = [];

	public $before_create = array( 'timestamps_in' );

	protected function timestamps_in($row)
	{
		$row['created_at'] = time();
		return $row;
	}

} // END CLASS
