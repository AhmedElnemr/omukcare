<?php
/**
 * Created by PhpStorm.
 * User: win 7
 * Date: 11/3/2019
 * Time: 2:31 PM
 */
class Specialties_model extends MY_Model {
    public $_table = 'specialties';
    public $primary_key = 'id';
    protected $soft_delete = TRUE;

    /* public $belongs_to = [
         'activity' => array( 'model' => 'Company_activities_model',"primary_key"=>'activity_id_fk' )
         ];
    */

   // public $has_many = ['subs' => array( 'model' => 'News_images_model','primary_key' => 'main_id' )];

    public $translate_to = [
        'words' => array(
            'model' => 'Specialties_trans_model',
            'primary_key_fild'=>'specialty_id',
            "primary_key"=>'id',
            "language_fild"=>"lang" ),
    ];

    public $before_create = array( 'timestamps_in' );
    public $before_update = array( 'timestamps_up' );

    protected function timestamps_in($row)
    {
        $row['created_at'] = $row['updated_at'] =  time();
        return $row;
    }
    protected function timestamps_up($row)
    {
        $row['updated_at'] =  time();
        return $row;
    }


    public  function getById($id){
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where($this->primary_key ,$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row_array();
        }
        else{
            $data = $this->get_filds();
        }
        $data["ar"] = $this->getServisTrans($id,"ar");
        $data["en"] = $this->getServisTrans($id,"en");
        $data["es"] = $this->getServisTrans($id,"es");
        return $data ;
    }

    public  function getServisTrans($id,$lang){
        $this->db->select('title , content');
        $this->db->from('specialties_trans');
        $this->db->where('specialty_id',$id);
        $this->db->where('lang',$lang);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row_array();
            return $data;
        }
        return ["title"=>"","content"=>""];
    }


    /**
     *  ============================================================
     *
     *  ------------------------------------------------------------
     *
     *  ============================================================
     */


    public $after_get = array( 'getTrans' );

    protected  function getTrans($row){
        if (!empty($row)) {
            $lang = getLocalize();
            if (is_object($row)) {
                if (isset($row->service_id)) {
                    $row->trans = $this->get_trans_object("specialties_trans", ["lang" => $lang, "specialty_id" => $row->id]);
                } else {
                    $row->trans = $this->get_trans_object("specialties_trans", ["lang" => $lang, "specialty_id" => 0]);
                }
            } else {
                if (isset($row['service_id'])) {
                    $row["trans"] = $this->get_trans_object("specialties_trans", ["lang" => $lang, "specialty_id" => $row['id']]);
                } else {
                    $row["trans"] = $this->get_trans_object("specialties_trans", ["lang" => $lang, "specialty_id" => 0]);
                }
            }
            return $row;
        }
    }


} // END CLASS



?>
