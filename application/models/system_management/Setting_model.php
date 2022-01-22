<?php
/**
 * Created by PhpStorm.
 * User: win 7
 * Date: 11/3/2019
 * Time: 2:31 PM
 */
class Setting_model extends MY_Model {
    public $_table = 'forms_setting';
    public $primary_key = 'id';


    public function getSettings($where = [] , $page_link_arr = [] ){
        $this->db->select(' fild_key, value');
        $this->db->from($this->_table);
		if (!empty($where)) {
			$this->db->where($where);
		}
		else {
			$this->db->where(["available" => 1]);
		}
		if (!empty($page_link_arr)) {
			$this->db->where_in("page_link",$page_link_arr);
		}
		$query = $this->db->get();
        $data = [];
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data[$row->fild_key] = $row->value ;
            }
        }
        return (object)$data ;
    }
} // END CLASS



?>
