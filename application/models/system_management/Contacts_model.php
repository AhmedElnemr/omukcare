<?php
/**
 * Created by PhpStorm.
 * User: win 7
 * Date: 11/11/2019
 * Time: 9:09 PM
 */
class Contacts_model extends MY_Model {
    public $_table = 'contacts';
    public $primary_key = 'id';
    /*
    protected $soft_delete = TRUE;
    protected $soft_delete_key = 'available';
    */
    /* public $belongs_to = [
         'activity' => array( 'model' => 'Company_activities_model',"primary_key"=>'activity_id_fk' )
         ];
    */

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

} // END CLASS