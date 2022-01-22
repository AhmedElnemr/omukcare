<?php
/**
 * Created by PhpStorm.
 * User: win 7
 * Date: 11/3/2019
 * Time: 2:31 PM
 */
class Services_prices_model extends MY_Model {
	public $_table = 'services_prices';
	public $primary_key = 'id';

	public function getAll($id){
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where("service_id",$id);
		$query = $this->db->get();
		$data = [] ;
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row){
				$data[$row->area_id][$row->specialty_id] = $row ;
			}
		}
		return $data ;
	}




} // END CLASS




?>
