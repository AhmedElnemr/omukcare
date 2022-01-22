<?php

class Order extends MY_Controller
{
	private $folder = "app_orders";
	private $con = "app-orders";

	public function __construct()
	{
		parent::__construct();
		$this->load->model('market/Orders_market_partner_model');
		$this->load->model('market/Orders_model');
	}

	public function index()
	{
		//$wherePrtner = ($_SESSION["user_type"] == "admin")? ["partner_id !="=> 0]:["partner_id"=>$_SESSION["partner_id"]];
		$wherePrtner = ["partner_id"=>$_SESSION["partner_id"],"order_status"=>"new"];
		$withArr = ['order','client'];
		$data["data_table"] = $this->Orders_market_partner_model->with_meny($withArr)->get_many_by($wherePrtner);
		$data["type"] = "new";
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'طلباتى  الجديدة ';
		$data["my_footer"] = ['table'];
		$data['subview'] = $this->folder . '/all';
		$this->load->view('layout/admin', $data);
	}

	public function indexLoad()
	{
		$type = ($this->input->get("type"))? $this->input->get("type"):"all";
		$from_date = ($this->input->get("from_date"))? $this->input->get("from_date"):"all";
		$to_date = ($this->input->get("to_date"))? $this->input->get("to_date"):"all";
		$wherePrtner = ["partner_id"=>$_SESSION["partner_id"],"order_status"=>$type];
		if($from_date != "all" && !empty($from_date)){
			$wherePrtner["created_at >="] = $from_date ;
		}
		if($to_date != "all" && !empty($to_date)){
			$wherePrtner["created_at <="] = $to_date ;
		}
		$withArr = ['order','client'];
		$data["data_table"] = $this->Orders_market_partner_model->with_meny($withArr)->get_many_by($wherePrtner);
		$data["type"] = $type;
		//$this->test();
		$this->load->view('backend/app_orders/all_table', $data);
	}


	public function old(){
		//$wherePrtner = ($_SESSION["user_type"] == "admin")? ["partner_id !="=> 0]:["partner_id"=>$_SESSION["partner_id"]];
		$wherePrtner = ["partner_id"=>$_SESSION["partner_id"],"order_status"=>"old"];
		$withArr = ['order','client'];
		$data["data_table"] = $this->Orders_market_partner_model->with_meny($withArr)->get_many_by($wherePrtner);
		//$this->tt_j($data);
		$data["type"] = "old";
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'طلباتى  السابقة ';
		$data["my_footer"] = ['table'];
		$data['subview'] = $this->folder . '/all';
		$this->load->view('layout/admin', $data);
	}

	public function add()
	{

		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'طلباتى   ';
		$data["my_footer"] = ["upload", "valid", 'multi_upload'];
		$data['subview'] = $this->folder . '/one';
		$this->load->view('layout/admin', $data);
	}

	public function edit($id)
	{

		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'طلباتى   ';
		$data["my_footer"] = ["upload", "valid", 'multi_upload'];
		$data['subview'] = $this->folder . '/one';
		$this->load->view('layout/admin', $data);
	}

	public function create()
	{

		if ($this->input->post('INSERT') == "INSERT") {
			//========================================
			$this->message('s');
			redirect($this->con, 'refresh');
		}

	}

	public function update($id)
	{

		if ($this->input->post('UPDTATE') == "UPDTATE") {
			$this->message('i');
			redirect($this->con, 'refresh');
		}

	}

	public function makeOld($id,$order_id)
	{
		$this->Orders_market_partner_model->update($id ,["order_status"=>"old"]);
        $count = $this->Orders_market_partner_model->count_by(["order_id"=>$order_id,"order_status !="=>"old"]);
        if($count == 0 ){
			$this->Orders_model->update($order_id ,["order_status"=>"ready"]);
		}
		$this->message('i');
		redirect($this->con, 'refresh');

	}

	public function delete($id)
	{
		$this->Cmodel->delete($id);
		$this->message('e');
		redirect($this->con, 'refresh');
	}

	public function one($order_id,$id){
		$this->load->model('market/Orders_model');
		$this->load->model('market/Orders_details_model');
		$data["main_order"] = $this->Orders_model->with("client")->get($order_id);
		$partner_order = $data["partner_order"] = $this->Orders_market_partner_model->get($order_id);
		$data["order_details"] = $this->Orders_details_model->get_many_by(["order_id"=>$order_id,"partner_id"=>$partner_order->partner_id]);
		$this->load->view("backend/".$this->folder .'/one', $data);
	}
	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */

	public function main()
	{
		$type = ($this->input->get("type"))? $this->input->get("type"):"all";
		if(!in_array($type,["new",'old','ready'])){
			redirect("Page404", 'refresh');
		}
		$where   = ["order_status"=>$type];
		$withArr = ['client'];
		$data["data_table"] = $this->Orders_model->with_meny($withArr)->get_many_by($where);
		//$this->tt_j($data);
		$data["type"] = $type;
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'طلبات التطبيق ';
		$data["my_footer"] = ['table'];
		$data['subview'] = $this->folder . '/all_main';
		$this->load->view('layout/admin', $data);
	}
	
	public function mainLoad()
	{
		$type = ($this->input->get("type"))? $this->input->get("type"):"all";
		$from_date = ($this->input->get("from_date"))? $this->input->get("from_date"):"all";
		$to_date = ($this->input->get("to_date"))? $this->input->get("to_date"):"all";
		$where   = ["order_status"=>$type];
		if($from_date != "all" && !empty($from_date)){
		  $where["created_at >="] = $from_date ;
		}
        if($to_date != "all" && !empty($to_date)){
		  $where["created_at <="] = $to_date ;
		}
		$withArr = ['client'];
		$data["data_table"] = $this->Orders_model->with_meny($withArr)->get_many_by($where);
		$data["type"] = $type;

		$this->load->view('backend/app_orders/main_table', $data);
	}
	public function oneMain($id){
		$this->load->model('market/Orders_model');
		$this->load->model('market/Orders_details_model');
		$data["main"]= true ;
		$data["main_order"] = $this->Orders_model->with("client")->get($id);
		$data["order_details"] = $this->Orders_details_model->with("partner")->get_many_by(["order_id"=>$id]);
		$this->load->view("backend/".$this->folder .'/one', $data);
	}
	public function makeOldMain($id)
	{
		$this->Orders_model->update($id ,["order_status"=>"old"]);
		$this->message('i');
		redirect($this->con, 'refresh');

	}

} //END CLASS
?>
