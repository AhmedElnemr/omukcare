<?php
class Model_admin_home extends CI_Model{
    public function __construct(){
        parent:: __construct();
    }
    //==============================================
    public function getCountWhere($select,$table,$Conditions_arr){
        $this->db->select($select);
        $this->db->from($table);
        $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return 0;
    }

    //==============================================
    public function getCountVisit($Conditions_arr){
        $this->db->select("web_count");
        $this->db->from("visitors");
        $this->db->where($Conditions_arr);
        $query = $this->db->get();
        $total = 0 ;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $total += $row->web_count;
            }

        }
        return $total;
    }

    /**
     *  ============================================================
     *
     *  ------------------------------------------------------------
     *
     *  ============================================================
     */
	public function getCountOrdersCom($Conditions_arr = []){
		$this->db->select("commission_app");
		$this->db->from("all_orders");
		if (!empty($Conditions_arr)) {
			$this->db->where($Conditions_arr);
		}
		$query = $this->db->get();
		$total = 0 ;
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row){
				$total += $row->commission_app;
			}

		}
		return $total;
	}

	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */
	public function getCountOrders($Conditions_arr){
		$this->db->select("order_id");
		$this->db->from("all_orders");
		$this->db->where_in("order_status",$Conditions_arr);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		}
		return 0;
	}

}//END CLASS


