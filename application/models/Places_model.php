<?php
class Places_model extends MY_Model {
    public $_table = 'places';
    public $primary_key = 'id';
    protected $soft_delete = TRUE;

    public $belongs_to = [
        'medical_tourism' => ['model' => 'Medical_tourism_model',"primary_key"=>'medical_tourism_id' ]
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

    public $after_get = array( 'getTrans' );

    protected  function getTrans($row){
        if (!empty($row)) {
            $lang = getLocalize();
            if (is_object($row)) {
                if (isset($row->id)) {
                    $row->word = $this->get_trans_object("places_trans", ["lang" => $lang, "place_id" => $row->id]);
                } else {
                    $row->word = $this->get_trans_object("places_trans", ["lang" => $lang, "place_id" => 0]);
                }
            } else {
                if (isset($row['id'])) {
                    $row["word"] = $this->get_trans_object("places_trans", ["lang" => $lang, "place_id" => $row['id']]);
                } else {
                    $row["word"] = $this->get_trans_object("places_trans", ["lang" => $lang, "place_id" => 0]);
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
        $this->db->select('title , content , address');
        $this->db->from('places_trans');
        $this->db->where('place_id',$id);
        $this->db->where('lang',$lang);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row_array();
            return $data;
        }
        return ["title"=>"","content"=>"","address"=>""];
    }

} // END CLASS

