<?php
/**
 * Created by PhpStorm.
 * User: win 7
 * Date: 11/3/2019
 * Time: 2:31 PM
 */
class Services_model extends MY_Model {
    public $_table = 'services';
    public $primary_key = 'service_id';
    protected $soft_delete = TRUE;

     public $has_many = [
         'specialties' => [ 'model' => 'Specialties_model',"primary_key"=>'service_id' ]
         ];


   // public $has_many = ['subs' => array( 'model' => 'News_images_model','primary_key' => 'main_id' )];

    public $translate_to = [
        'words' => array(
            'model' => 'Services_trans_model',
            'primary_key_fild'=>'service_id_fk',
            "primary_key"=>'service_id',
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

    public function getServices($where = [],$limit, $start,$lang){
		$this->load->model('Specialties_model');

        $this->db->select('*');
        $this->db->from($this->_table);
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get();
        $this->db->limit($limit, $start);
        $data  = [];
        if ($query->num_rows() > 0) {
             $data = $query->result(); $i = 0 ;
             foreach ($query->result() as $row){
                $data[$i]->words = $this->getMainTrans(["service_id_fk"=>$row->service_id,"lang"=>$lang]) ;
                $data[$i]->sub = $this->trans($lang)->get_many_by(["perant_id"=>$row->service_id]) ;
				$data[$i]->other_details = (isset($row->other_details) && !empty(($row->other_details)))? json_decode($row->other_details):null;
                $data[$i]->specialties = $this->Specialties_model->get_many_by(['service_id'=>$row->service_id]);
				 $i++;
            }
        }
        return $data ;
    }

    public function getMainTrans($Conditions_arr){
        $this->db->select('*');
        $this->db->from('services_trans');
        $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        $this->load->model('Services_trans_model');
        return (object) $this->Services_trans_model->get_filds();
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
        $this->db->from('services_trans');
        $this->db->where('service_id_fk',$id);
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
                    $row->trans = $this->get_trans_object("services_trans", ["lang" => $lang, "service_id_fk" => $row->service_id]);
                } else {
                    $row->trans = $this->get_trans_object("services_trans", ["lang" => $lang, "service_id_fk" => 0]);
                }
                //======================================
				$row->other_details = (isset($row->other_details) && !empty(($row->other_details)))? json_decode($row->other_details):null;
                //======================================
            } else {
                if (isset($row['service_id'])) {
                    $row["trans"] = $this->get_trans_object("services_trans", ["lang" => $lang, "service_id_fk" => $row['service_id']]);
                } else {
                    $row["trans"] = $this->get_trans_object("services_trans", ["lang" => $lang, "service_id_fk" => 0]);
                }
				//======================================
				$row['other_details'] = (isset($row['other_details']) && !empty(($row['other_details'])))? json_decode($row['other_details']):null;
				//======================================
            }
            return $row;
        }
    }


} // END CLASS



?>
