<?php
class Model_visit extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
        $this->main_table = "";
        $this->pr_key = "";
        // available  publisher   created_at  updated_at
    }       //   http://unicafresh.es
    //  $this->db->join('users', 'users.usrID = users_profiles.usrpID',"left");
    //  $this->db->where('display_id',$id)->count_all("bookdetails");
    //    return $this->db->insert_id();
    //    $this->db->join('people AS a', 'dept.supervisor = a.people_id', 'left');
    //    $this->db->join('people AS b', 'dept.head = b.people_id', 'left');
    // $this->db->set('field', 'field+1', FALSE);

    /**
     *  ==========================================================================
     *
     *  ---------------------------------   Visitor  ------------------------
     *
     *  ==========================================================================
     */
    public function insertVisitor($day_date, $type){
        $this->db->select('id');
        $this->db->from("visitors");
        $this->db->where("day_date", strtotime($day_date));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row_array();
            $this->updateVisitor($data["id"],$type);
            return $data["id"];
        }
        $data["day_date"] = strtotime($day_date);
        $data["day_string"] = date("Y-m-d", strtotime($day_date));
        $data[$type] = 1;
        $this->db->insert("visitors", $data);
        return $this->db->insert_id();
    }

    public function updateVisitor($id, $type){
        $this->db->where("id", $id);
        $this->db->set($type, $type . '+1', FALSE);
        $this->db->update("visitors");
    }

    public function searchDate($day_date){
        $this->db->select('id');
        $this->db->from("visitors");
        $this->db->where("day_date", strtotime($day_date));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row_array();
            return $data["id"];
        }
        return 0;
    }


} //END CLASS