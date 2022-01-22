<?php
class Areas_model extends MY_Model {
    public $_table = 'areas';
    public $primary_key = 'area_id';
    protected $soft_delete = TRUE;

    public $after_get = array( 'getTrans' );

    protected  function getTrans($row){
        if (!empty($row)) {
            $lang = getLocalize();
            if (is_object($row)) {
                if (isset($row->area_id)) {
                    $row->word = $this->get_trans_object("areas_trans", ["lang" => $lang, "area_id" => $row->area_id]);
                } else {
                    $row->word = $this->get_trans_object("areas_trans", ["lang" => $lang, "area_id" => 0]);;
                }
            } else {
                if (isset($row['area_id'])) {
                    $row["word"] = $this->get_trans_object("areas_trans", ["lang" => $lang, "area_id" => $row['area_id']]);
                } else {
                    $row["word"] = $this->get_trans_object("areas_trans", ["lang" => $lang, "area_id" => 0]);
                }
            }
            return $row;
        }
    }

	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */

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
		return $data ;
	}

	public  function getSubTrans($id,$lang){
		$this->db->select('title');
		$this->db->from('areas_trans');
		$this->db->where('area_id',$id);
		$this->db->where('lang',$lang);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data = $query->row_array();
			return $data;
		}
		return ["title"=>""];
	}



} // END CLASS
