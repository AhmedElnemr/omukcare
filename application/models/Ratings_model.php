<?php
/**
 * Created by PhpStorm.
 * User: win 7
 * Date: 11/11/2019
 * Time: 9:09 PM
 */
class Ratings_model extends MY_Model {
    public $_table = 'ratings';
    public $primary_key = 'id';
    protected $soft_delete = TRUE;

    public $belongs_to = [
        'from_user' => ['model' => 'Registrations_model',"primary_key"=>'from_id' ],
        'to_user' => ['model' => 'Registrations_model',"primary_key"=>'to_id' ]
    ];

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

    /*
    public $belongs_to = [
         'activity' => array( 'model' => 'Company_activities_model',"primary_key"=>'activity_id_fk' )
         ];

    public $has_many = ['subs' => array( 'model' => 'Branchs_images_model','primary_key' => 'main_id' )];

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
    public $translate_to = [
        'words' => array(
            'model' => 'Notifications_trans_model',
            'primary_key_fild'=>'notification_id_fk',
            "primary_key"=>'notification_msg_id',
            "language_fild"=>"lang" ),
    ];

    */

} // END CLASS