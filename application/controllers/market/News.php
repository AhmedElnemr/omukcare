<?php
class News extends MY_Controller{
	private $folder = "app_news";
	private $con    = "app-news";
	public function __construct(){
		parent::__construct();
		$this->load->model('market/News_model','Cmodel');
		$this->load->model('market/News_trans_model',"Tmodel");
	}

	public  function index(){

		$data["data_table"] = $this->Cmodel->get_all();
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'الاخبار ';
		$data["my_footer"] = ['table'];
		$data['subview'] = $this->folder.'/all';
		$this->load->view('layout/admin', $data);
	}

	public  function add(){

		$data["op"] = 'INSERT';
		$data["form"] = $this->con.'/create';
		$data["out"] = $this->Cmodel->getById(0);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'الاخبار ';
		$data["my_footer"] = ["upload","valid","date"];
		$data['subview'] = $this->folder.'/one';
		$this->load->view('layout/admin', $data);
	}

	public  function edit($id){

		$data["op"] = 'UPDTATE';
		$data["form"] = $this->con.'/update/'.$id;
		$data["out"] =  $this->Cmodel->getById($id);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'الاخبار ';
		$data["my_footer"] = ["upload","valid","date"];
		$data['subview'] = $this->folder.'/one';
		$this->load->view('layout/admin', $data);
	}

	public  function create(){

		if ($this->input->post('INSERT') == "INSERT") {
			$Idata = $this->input->post('Tdata');
			$Idata["news_date"] = strtotime($Idata["news_date"]) ;
			$Idata["image"] = $this->upload_image("image");
			$id = $this->Cmodel->insert($Idata);
			//========================================
			$Tdata = $this->input->post('Pdata');
			foreach ($Tdata as $key=>$val){
				$data["news_id"] = $id;
				$data["lang"] = $key;
				$data["title"] = $val['title'];
				$data["content"] =trim( $val['content']);
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
			$Idata["news_date"] = strtotime($Idata["news_date"]) ;
			//-----------------------
			$image = $this->upload_image("image");
			if (!empty($image)) {
				$Idata["image"] = $image;
			}
			$this->Cmodel->update($id,$Idata);
			$this->Tmodel->delete_by(["news_id"=>$id]);
			$Tdata = $this->input->post('Pdata');
			foreach ($Tdata as $key=>$val){
				$data["news_id"] = $id;
				$data["lang"] = $key;
				$data["title"] = $val['title'];
				$data["content"] =trim( $val['content']);
				$this->Tmodel->insert($data);
			}
			//----------------------------------------------
			$this->message('i');
			redirect( $this->con, 'refresh');
		}

	}

	public  function delete($id){
		$this->Cmodel->delete($id);
		$this->Tmodel->delete_by(["news_id"=>$id]);
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
		$data["data_table"] = $this->Cmodel->only_deleted()->get_many_by(["level"=>1]);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = ' الاخبار المحذوفة ';
		$data["my_footer"] = ['table'];
		$data['subview'] = $this->folder.'/deleted';
		$this->load->view('layout/admin', $data);
	}


} //END CLASS
?>
