<?php
class Accounts extends MY_Controller{
	private $folder = "accounts";
	private $con    = "admin-accounts";
	public function __construct(){
		parent::__construct();
		$this->load->model('Accounts_model','Cmodel');
	}

	public  function index(){
		redirect("Page404", 'refresh');
	}

	public  function cashing(){
		$data["data_table"] = $this->Cmodel->with('user')->get_many_by(["type"=>'cashing']);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'سندات  صرف  ';
		$data["my_footer"] = ['table'];
		$data["addLink"] =  $this->con.'/addCashing';
		$data['subview'] = $this->folder.'/all_cashing';
		$this->load->view('layout/admin', $data);
	}

	public  function addCashing(){
		$this->load->model('Registrations_model');
		$data["op"] = 'INSERT';
		$data["form"] = $this->con.'/create';
		$data["out"] = $this->Cmodel->getById(0);
		$data['providers'] = $this->Registrations_model->get_many_by(['user_type'=>2,"be_provider"=>1]);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'إضافة سند صرف  ';
		$data["my_footer"] = ["upload","valid","date"];
		$data['subview'] = $this->folder.'/cashing';
		$this->load->view('layout/admin', $data);
	}

	public  function editCashing($id){
		$this->load->model('Registrations_model');
		$data["op"] = 'UPDTATE';
		$data["form"] = $this->con.'/update/'.$id;
		$data["out"] =  $this->Cmodel->getById($id);
		$data['providers'] = $this->Registrations_model->get_many_by(['user_type'=>2,"be_provider"=>1]);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'تعديل السسند  ';
		$data["my_footer"] = ["upload","valid","date"];
		$data['subview'] = $this->folder.'/cashing';
		$this->load->view('layout/admin', $data);
	}

	//======================================================================

	public  function exchange(){
		$data["data_table"] = $this->Cmodel->with('user')->get_many_by(["type"=>'exchange']);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'سندات  القبض  ';
		$data["my_footer"] = ['table'];
		$data["addLink"] =  $this->con.'/addExchange';
		$data['subview'] = $this->folder.'/all_exchange';
		$this->load->view('layout/admin', $data);
	}

	public  function addExchange(){
		$this->load->model('Registrations_model');
		$data["op"] = 'INSERT';
		$data["form"] = $this->con.'/create';
		$data["out"] = $this->Cmodel->getById(0);
		$data['providers'] = $this->Registrations_model->get_many_by(['user_type'=>2,"be_provider"=>1]);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'إضافة سند قبض ';
		$data["my_footer"] = ["upload","valid","date"];
		$data['subview'] = $this->folder.'/exchange';
		$this->load->view('layout/admin', $data);
	}

	public  function editExchange($id){
		$this->load->model('Registrations_model');
		$data["op"] = 'UPDTATE';
		$data["form"] = $this->con.'/update/'.$id;
		$data["out"] =  $this->Cmodel->getById($id);
		$data['providers'] = $this->Registrations_model->get_many_by(['user_type'=>2,"be_provider"=>1]);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'تعديل السند  ';
		$data["my_footer"] = ["upload","valid","date"];
		$data['subview'] = $this->folder.'/exchange';
		$this->load->view('layout/admin', $data);
	}

	//======================================================================

	public  function create(){
		if ($this->input->post('INSERT') == "INSERT") {
			$Idata = $this->input->post('Tdata');
			$Idata["date"] = strtotime($Idata["date"]);
			$Idata["image"] = $this->upload_image("image");
			$Idata["created_by"] = $_SESSION["user_id"];
			$Idata["created_at"] = time();
			$id = $this->Cmodel->insert($Idata);
			//----------------------------------------------
			$this->message('s');
			if($Idata['type'] == 'cashing'){
				redirect($this->con."/cashing",'refresh');
			}
			else{
				redirect($this->con."/exchange",'refresh');
			}
		}
	}

	public  function update($id){

		if ($this->input->post('UPDTATE') == "UPDTATE") {
			$Idata = $this->input->post('Tdata');
			$Idata["date"] = strtotime($Idata["date"]);
			$Idata["updated_by"] = $_SESSION["user_id"];
			$Idata["updated_at"] = time();
			$main_iamge = $this->upload_image("image");
			if (!empty($main_iamge)) {
				$Idata["image"] = $main_iamge;
			}
			$this->Cmodel->update($id,$Idata);
			//----------------------------------------------
			$this->message('i');
			if($Idata['type'] == 'cashing'){
				redirect($this->con."/cashing",'refresh');
			}
			else{
				redirect($this->con."/exchange",'refresh');
			}
		}

	}

	public  function delete($id){
		$this->Cmodel->delete($id);
		$this->message('e');
		if($this->input->get("type") == "cashing"){
			redirect($this->con."/cashing",'refresh');
		}
		else{
			redirect($this->con."/exchange",'refresh');
		}
	}

	//======================================================================
	public function statement(){

		$this->load->model('Registrations_model');
		$data['provider'] = $this->Registrations_model->get_many_by(['user_type'=>2,"be_provider"=>1]);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'كشف الحساب  ';
		$data["my_footer"] = ['date'];
		$data['subview'] = $this->folder.'/statement';
		$this->load->view('layout/admin', $data);
	}

	public function statementLoad(){
		$where = ["user_id"=>$this->input->get("user_id")];
		if($this->input->get("from_date") && !empty($this->input->get("from_date"))){
			$where ["date >="]= strtotime($this->input->get("from_date"));
		}
		if($this->input->get("to_date") && !empty($this->input->get("to_date"))){
			$where ["date <="]= strtotime($this->input->get("to_date"));
		}
		$data["data_table"] = $this->Cmodel->order_by("date","ASC")->get_many_by($where);
		$this->load->view("backend/".$this->folder.'/statement_load', $data);
	}





} //END CLASS
?>
