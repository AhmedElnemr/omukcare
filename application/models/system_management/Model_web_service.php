<?php
class Model_web_service extends CI_Model{
    public function __construct(){
        parent:: __construct();
    }

    public function ahmed($data){
        $this->db->insert("post_tester_web",$data);
    }

    public function insert($table ,$data){ // Model_web_service->insert($table ,$data)
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }

    public function update($table,$condtion ,$data){ // Model_web_service->update($table,$condtion ,$data)
        $this->db->where($condtion);
        $this->db->update($table ,$data);
    }

    public function selectAll($table){
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return array();
    }

    public function getAll($select,$table){
        $this->db->select($select);
        $this->db->from($table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return array();
    }

    public function getById($select,$table ,$condition ){ // Model_web_service->getById($select,$table ,$condition)
        $this->db->select($select);
        $this->db->from($table);
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row_array();
            return $data;
        }
        return false;
    }

    public function getRecordCount($select,$table,$condition,$whreIn = array(),$whreInFild = "") {
        $this->db->select($select);
        if(!empty($condition)){
            $this->db->where($condition);
        }
        if(!empty($whreIn)){
            $this->db->where_in($whreInFild,$whreIn);
        }
        $this->db->from($table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return 0;
    }

    public function getFildValue($table ,$fild , $condition ){
        $this->db->select($fild);
        $this->db->from($table);
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row_array();
            return $data[$fild];
        }
        return 0;
    }

    public function deleteByArray($table ,$Conditions_arr){
        $this->db->where($Conditions_arr);
        $this->db->delete($table);
    }

    public function getField($table){
        $query = $this->db->query("select * from ".$table);
        $field_array = $query->list_fields();
        foreach ($field_array as $key=>$value){
            $out[$value]='0';
        }
        return $out;
    }

    /**
     *  ==========================================================================
     *
     *  ---------------------------------   Visitor  ------------------------
     *
     *  ==========================================================================
     */
    public  function  insertVisitor($day_date ,$type){
        $data["day_date"] = strtotime($day_date);
        $data["day_string"] = date("Y-m-d",strtotime($day_date));
        $data[$type] = 1 ;
        $this->db->insert("visitors",$data);
        return $this->db->insert_id();
    }
    public  function  updateVisitor($id ,$type){
        $this->db->where("id" ,$id);
        $this->db->set($type, $type.'+1', FALSE);
        $this->db->update("visitors");
    }
    public  function  searchDate($day_date){
        $this->db->select('id');
        $this->db->from("visitors");
        $this->db->where("day_date" ,strtotime($day_date));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row_array();
            return $data["id"];
        }
        return 0;
    }

    /**
     *  ==========================================================================
     *
     *  ---------------------------------   update rate  ------------------------
     *
     *  ==========================================================================
     */
    public function upadeteRate($id ,$val){
        $this->db->where("user_id" ,$id);
        $this->db->set('rating_person_count', 'rating_person_count+1', FALSE);
        $this->db->set('rating_num_count', 'rating_num_count+'.$val, FALSE);
        $this->db->update("registrations");
    }

	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------   update rate  ------------------------
	 *
	 *  ==========================================================================
	 */
	public  function  getRate($id){
		$this->db->select('rate_num');
		$this->db->from("ratings");
		$this->db->where("to_id" ,$id);
		$query = $this->db->get();
		$total = 0 ;
		$user  = 0 ;
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row){
				$total += $row->rate_num ;
				$user++;
			}
		}
		if($user > 0){
			return (double)($total/$user);
		}
		return 0;
	}



}// END CLASS  
?>
