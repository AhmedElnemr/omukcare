<?php
class Model_js_control extends CI_Model{
    public function __construct()
    {
        parent:: __construct();
    }

    /**
     * ===================================================================================================
     *
     *            count all row of table
     * ----------------------------------------
     */
    public function check_unique($table,$fild,$value){
        $this->db->select($fild);
        $this->db->from($table);
        $this->db->where($fild,$value);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return "off";
        }
        return "on";
    }



}//END CLASS

