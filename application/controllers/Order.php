<?php
class Order extends MY_Controller{
	private $folder = "orders";
	private $con    = "admin-orders";
	public function __construct(){
		parent::__construct();
		$this->load->model('Order_model','Cmodel');
		//  redirect("Page404", 'refresh');
		/*
		 $main_iamge = $this->upload_image("");
			$Idata[""] = $main_iamge;
			$filesCount = $_FILES["images"]['size'][0];
			if ($filesCount != "0" || $filesCount != 0) {
				$imgs = $this->upload_muli_image("images");
				$this->Model_salon->add_images($id, $imgs);
			}

		 $main_iamge = $this->upload_image("");
			if (!empty($main_iamge)) {
				$Idata[""] = $main_iamge;
			}

		 */
	}

	public  function index(){

		$data["data_table"] = $this->Cmodel->with_meny(['client','provider' ,'sub_service'])
			                        ->get_many_field('order_status',[ORDER_WAT_PAY,ORDER_START,ORDER_BLOCKED]);
		//$this->tt_j($data["data_table"]);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'الطلبات';
		$data["my_footer"] = ['table'];
		$data['subview'] = $this->folder.'/new';
		$this->load->view('layout/admin', $data);
	}

	public  function add(){

		$data["op"] = 'INSERT';
		$data["form"] = $this->con.'/create';
		$data["out"] = $this->Cmodel->get_filds();
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'الطلبات';
		$data["my_footer"] = ["upload","valid","date"];
		$data['subview'] = $this->folder.'/one';
		$this->load->view('layout/admin', $data);
	}

	public  function edit($id){

		$data["op"] = 'UPDTATE';
		$data["form"] = $this->con.'/update/'.$id;
		$data["out"] = $this->Cmodel->as_array()->get($id);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'الطلبات';
		$data["my_footer"] = ["upload","valid","date"];
		$data['subview'] = $this->folder.'/one';
		$this->load->view('layout/admin', $data);
	}

	public  function create(){

		if ($this->input->post('INSERT') == "INSERT") {
			$Idata = $this->input->post('Pdata');
			$logo = $this->upload_image("logo");
			$Idata["logo"] = $logo;
			//$Idata["date"] = strtotime($Idata["date"]) ;
			$id = $this->Cmodel->insert($Idata);
			//----------------------------------------------
			$this->message('s');
			redirect($this->con."/add", 'refresh');
		}

	}

	public  function update($id){

		if ($this->input->post('UPDTATE') == "UPDTATE") {
			$Idata = $this->input->post('Pdata');
			$logo = $this->upload_image("logo");
			if (!empty($logo)) {
				$Idata["logo"] = $logo;
			}
			//$Idata["date"] = strtotime($Idata["date"]) ;
			$id = $this->Cmodel->update($id,$Idata);
			//----------------------------------------------
			$this->message('i');
			redirect( $this->con, 'refresh');
		}

	}

	public  function delete($id){

		$this->Cmodel->delete($id);
		$this->message('e');
		//redirect($this->con, 'refresh');
		if(isset($_SERVER['HTTP_REFERER'])){
			$previos_path = str_replace(base_url(), "", $_SERVER['HTTP_REFERER']);
			redirect($previos_path,'refresh');
		}
		else{
			redirect($this->con,'refresh');
		}
	}



	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */
	public  function ordersNew(){
		$data["data_table"] = $this->Cmodel->with_meny(['client','provider' ,'sub_service'])
			->get_many_field('order_status',[ORDER_WAT_PAY,ORDER_START,ORDER_BLOCKED]);
		//$this->tt_j($data["data_table"]);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = '  الطلبات الجديدة';
		$data["my_footer"] = ['table'];
		$data['subview'] = $this->folder.'/new';
		$this->load->view('layout/admin', $data);
	}

	public function reply($id){
		$this->load->model('Registrations_model');
		$data["op"] = 'UPDTATE';
		$data["form"] = $this->con.'/doReply';
		$one = $data["one"]= $this->Cmodel->with_meny(['client','provider' ,'sub_service','area'])->get($id);
		$where = ['user_type'=>2,"be_provider"=>1,"service_id"=>$one->main_service_id];
		$data['providers'] = $this->Registrations_model->get_many_by(['user_type'=>2,"be_provider"=>1]);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'إعده توجيه الطلب ';
		$data["my_footer"] = ['valid'];
		$data['subview'] = $this->folder.'/reply';
		$this->load->view('layout/admin', $data);
	}

	public function doReply(){
		if ($this->input->post('UPDTATE') == "UPDTATE") {
			$this->load->model("Notifications_model");
			$Idata = $this->input->post('Pdata');
			$Idata["order_status"] = ORDER_ACCEPT;
			$id = $this->input->post('id');
			$this->Cmodel->update($id,$Idata);
			$this->Notifications_model->delete_by(["process_id_fk"=>$id]);
			$order = $this->Cmodel->get($id);
			 // ------------------
			$note["process_id_fk"] = $id;
			$note["from_user_id"] = $order->user_id;
			$note["to_user_id"] = $order->provider_id;
			$note["notification_type"] = ADMIN_USER;
			$note["action_type"] = ACTION_NOTHING;
			$note["notification_msg_id"] = NEW_ORDER;
			$this->Notifications_model->insert($note);
			//----------------------------------------------
			$this->message('i');
			redirect( $this->con.'/new', 'refresh');
		}
	}

	public  function ordersCurrent(){

		$data["data_table"] = $this->Cmodel->with_meny(['client','provider' ,'sub_service'])
			                       ->get_many_field('order_status',[ORDER_ACCEPT]);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'الطلبات الحالية';
		$data["my_footer"] = ['table'];
		$data['subview'] = $this->folder.'/current';
		$this->load->view('layout/admin', $data);
	}

	public  function ordersOld(){

		$data["data_table"] = $this->Cmodel->with_meny(['client','provider' ,'sub_service'])
			->get_many_field('order_status',[ORDER_END,ORDER_END_ALL]);
		//$this->tt_j($data["data_table"]);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'الطلبات السابقة ';
		$data["my_footer"] = ['table'];
		$data['subview'] = $this->folder.'/old';
		$this->load->view('layout/admin', $data);
	}

	public function order($id){
	   $data["one"]= $this->Cmodel->with_meny(['client','provider' ,'sub_service'])->get($id);
		$this->load->view('backend/'.$this->folder.'/order_detals', $data);
	}

	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */

	public function clientOrders(){
		$this->load->model('Registrations_model');
		$data['clients'] = $this->Registrations_model->get_many_by(['user_type'=>1]);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'طلبات عميل  ';
		$data["my_footer"] = ['table'];
		$data['subview'] = $this->folder.'/client_order';
		$this->load->view('layout/admin', $data);
	}
	public function getClientOrders($id){
		$data["data_table"] = $this->Cmodel->with_meny(['client','provider' ,'sub_service'])
			                    ->get_many_by(["user_id"=>$id]);
		//$this->tt_j([$data,$this->db->last_query()]);
		$this->load->view('backend/orders/client_order_load', $data);
	}

	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */

	public function providerOrders(){
		$this->load->model('Registrations_model');
		$data['clients'] = $this->Registrations_model->get_many_by(['user_type'=>2,"be_provider"=>1]);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'طلبات مقدم خدمة  ';
		$data["my_footer"] = ['table'];
		$data['subview'] = $this->folder.'/provider_order';
		$this->load->view('layout/admin', $data);
	}
	public function getProviderOrders($id){
		$data["data_table"] = $this->Cmodel->with_meny(['client','provider' ,'sub_service'])
			                    ->get_many_by(["provider_id"=>$id]);
		//$this->tt_j([$data,$this->db->last_query()]);
		$this->load->view('backend/orders/provider_order_load', $data);
	}


} //END CLASS
?>
