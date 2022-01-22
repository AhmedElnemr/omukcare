<?php
/**
 * Created by PhpStorm.
 * User: win 7
 * Date: 11/2/2019
 * Time: 1:52 PM
 */
class User_model extends MY_Model {
    public $_table = 'users';
    public $primary_key = 'user_id';

    public $before_create = array( 'timestamps_in' );
    protected function timestamps_in($row)
    {
        $row['created_at'] = $row['updated_at'] =  date('Y-m-d H:i:s');
        return $row;
    }

    public $before_update = array( 'timestamps_up' );
    protected function timestamps_up($row)
    {
        $row['updated_at'] =  date('Y-m-d H:i:s');
        return $row;
    }
} // END CLASS
?>