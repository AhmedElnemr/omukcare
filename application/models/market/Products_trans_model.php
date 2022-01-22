<?php
include_once(APPPATH.'core/New_model.php');
class Products_trans_model extends New_model {
	//=======================================
	public $_table = 'products_trans';
	public $primary_key = 'id';
	public $_trans_table ='';
	public $trans_lang = [];
	public $trans_key = '';
	public $after_get = [];

	public $before_create = [];
	public $before_update = [];
	//=======================================
	/*
    protected $soft_delete = TRUE;

	public $belongs_to = [
		'activity' => ['model' => 'Company_activities_model',"primary_key"=>'activity_id_fk' ]
	];

	public $has_many = ['subs' => [ 'model' => 'Branchs_images_model','primary_key' => 'main_id' ]];
	*/
	public function getByName($name,$shop_id ,$limit = false , $start = false){
		$this->db->select($this->_table.'.product_id');
		$this->db->from($this->_table);
		$this->db->join("products_lang", 'products_lang.product_id = '.$this->_table.'.product_id',"left");
		$this->db->where("products_lang.shop_id",$shop_id);
		$this->db->where("title LIKE '%".$name."%' OR content LIKE '%".$name."%' ");
		if ($limit != false && $start != false) {
			$this->db->limit($limit, $start);
		}
		$query = $this->db->get();
		$data = [];
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row){
				$data[] = $row->product_id ;
			}
		}
		return $data ;
	}


} // END CLASS
