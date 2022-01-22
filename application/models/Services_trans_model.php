<?php
/**
 * Created by PhpStorm.
 * User: win 7
 * Date: 11/3/2019
 * Time: 2:31 PM
 */
class Services_trans_model extends MY_Model {
    public $_table = 'services_trans';
    public $primary_key = 'id';

    public $before_create = array( 'timestamps_in' );
    protected function timestamps_in($row)
    {
        $row['created_at'] = $row['updated_at'] =  time();
        return $row;
    }

    public $before_update = array( 'timestamps_up' );
    protected function timestamps_up($row)
    {
        $row['updated_at'] =  time();
        return $row;
    }


} // END CLASS




?>