<?php
/**
 * Created by PhpStorm.
 * User: win 7
 * Date: 11/5/2019
 * Time: 11:27 PM
 */
class Cities_model extends MY_Model {
    public $_table = 'cities';
    public $primary_key = 'id_city';
    public $belongs_to = [
        'country' => array( 'model' => 'Countries_model',"primary_key"=>'country_id' )
    ];
    protected $soft_delete = TRUE;

} // END CLASS