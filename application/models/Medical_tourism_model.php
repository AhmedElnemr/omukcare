<?php
class Medical_tourism_model extends MY_Model {
    public $_table = 'medical_tourism';
    public $primary_key = 'id';
    protected $soft_delete = TRUE;


    public $has_many = ['subs' => [ 'model' => 'Places_model','primary_key' => 'medical_tourism_id' ]];

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

    public $after_get = array( 'getTrans' );

    protected  function getTrans($row){
        if (!empty($row)) {
            $lang = getLocalize();
            if (is_object($row)) {
                if (isset($row->id)) {
                    $row->word = $this->get_trans_object("medical_tourism_trans", ["lang" => $lang, "medical_tourism_id" => $row->id]);
                } else {
                    $row->word = $this->get_trans_object("medical_tourism_trans", ["lang" => $lang, "medical_tourism_id" => 0]);
                }
            } else {
                if (isset($row['id'])) {
                    $row["word"] = $this->get_trans_object("medical_tourism_trans", ["lang" => $lang, "medical_tourism_id" => $row['id']]);
                } else {
                    $row["word"] = $this->get_trans_object("medical_tourism_trans", ["lang" => $lang, "medical_tourism_id" => 0]);
                }
            }
            return $row;
        }
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
        $data["ar"] = $this->getSubTrans($id,"ar");
        $data["en"] = $this->getSubTrans($id,"en");
        $data["es"] = $this->getSubTrans($id,"es");
        return $data ;
    }

    public  function getSubTrans($id,$lang){
        $this->db->select('title , content');
        $this->db->from('medical_tourism_trans');
        $this->db->where('medical_tourism_id',$id);
        $this->db->where('lang',$lang);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row_array();
            return $data;
        }
        return ["title"=>"","content"=>""];
    }

} // END CLASS