<?php
class SubDep extends MY_Controller{
	private $folder = "app_sub_dep";
	private $con    = "app-sub-dep";
	public function __construct(){
		parent::__construct();
		$this->load->model('market/Departments_model','Cmodel');
		$this->load->model('market/Departments_trans_model',"Tmodel");
	}

	public  function index(){

		$data["data_table"] = $this->Cmodel->get_many_by(["level"=>2]);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'الأقسام الفرعية ';
		$data["my_footer"] = ['table'];
		$data['subview'] = $this->folder.'/all';
		$this->load->view('layout/admin', $data);
	}

	public  function add(){

		$data["op"] = 'INSERT';
		$data["form"] = $this->con.'/create';
		$data["out"] = $this->Cmodel->getById(0);
		$data["main"] = $this->Cmodel->with_trans()->get_many_by(["level"=>1]);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'الأقسام الفرعية ';
		$data["my_footer"] = ["upload","valid","date"];
		$data['subview'] = $this->folder.'/one';
		$this->load->view('layout/admin', $data);
	}

	public  function edit($id){

		$data["op"] = 'UPDTATE';
		$data["form"] = $this->con.'/update/'.$id;
		$data["out"] =  $this->Cmodel->getById($id);
		$data["main"] = $this->Cmodel->get_many_by(["level"=>1]);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'الأقسام الفرعية ';
		$data["my_footer"] = ["upload","valid","date"];
		$data['subview'] = $this->folder.'/one';
		$this->load->view('layout/admin', $data);
	}

	public  function create(){

		if ($this->input->post('INSERT') == "INSERT") {
			$Idata = $this->input->post('Tdata');
			$Idata["image"] = $this->upload_image("image");
		//	$Idata["icon"]  = $this->upload_image("icon");
			$Idata["created_by"]  = $_SESSION["user_id"];
			$Idata["level"]  = 2;
			$id = $this->Cmodel->insert($Idata);
			//========================================
			$Tdata = $this->input->post('Pdata');
			foreach ($Tdata as $key=>$val){
				$data["department_id"] = $id;
				$data["lang"] = $key;
				$data["title"] = $val['title'];
				//$data["content"] = $val['content'];
				$this->Tmodel->insert($data);
			}
			//----------------------------------------------
			$this->message('s');
			redirect($this->con, 'refresh');

		}

	}

	public  function update($id){

		if ($this->input->post('UPDTATE') == "UPDTATE") {
			$Idata = $this->input->post('Tdata');
			$Idata["updated_by"]  = $_SESSION["user_id"];
			//-----------------------
			$image = $this->upload_image("image");
			if (!empty($image)) {
				$Idata["image"] = $image;
			}
			/*$icon = $this->upload_image("icon");
			if (!empty($icon)) {
				$Idata["icon"] = $icon;
			}*/
			//-----------------------
			if(!empty($Idata)){
				$this->Cmodel->update($id,$Idata);
			}
			$this->Tmodel->delete_by(["department_id"=>$id]);
			$Tdata = $this->input->post('Pdata');
			foreach ($Tdata as $key=>$val){
				$data["department_id"] = $id;
				$data["lang"] = $key;
				$data["title"] = $val['title'];
				//$data["content"] = $val['content'];
				$this->Tmodel->insert($data);
			}
			//----------------------------------------------
			$this->message('i');
			redirect( $this->con, 'refresh');
		}

	}

	public  function delete($id){
		$this->Cmodel->delete($id);
		//$this->Tmodel->delete_by(["department_id"=>$id]);
		$this->message('e');
		redirect($this->con, 'refresh');
	}

	public function undeleted($id){
		$Idata['deleted'] = 0 ;
		$this->Cmodel->update($id,$Idata);
		$this->message('i');
		redirect( $this->con.'/deleted', 'refresh');
	}

	public function deleted(){
		$data["data_table"] = $this->Cmodel->with_trans()->only_deleted()->get_many_by(["level"=>2]);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = ' الأقسام الفرعية المحذوفة ';
		$data["my_footer"] = ['table'];
		$data['subview'] = $this->folder.'/deleted';
		$this->load->view('layout/admin', $data);
	}


} //END CLASS
?>
