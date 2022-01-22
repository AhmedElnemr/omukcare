<?php
class PricesCountries extends MY_Controller{
	private $folder = "app_prices_countries";
	private $con    = "app-prices-countries";
	public function __construct(){
		parent::__construct();
		$this->load->model('market/Prices_countries_model','Cmodel');
		$this->load->model('market/Countries_model');
	}
	public  function index(){
		$data["data_table"] = $this->Cmodel->with('country')->get_all();
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'بلدان التسوق ';
		$data["my_footer"] = ['table'];
		$data['subview'] = $this->folder.'/all';
		$this->load->view('layout/admin', $data);
	}
	public  function add(){
		$data["op"] = 'INSERT';
		$data["form"] = $this->con.'/create';
		$data["out"] = $this->Cmodel->getById(0);
		$data["in"] = $this->Cmodel->getIds("country_id");
		$data["Countries"] = $this->Countries_model->get_all();
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'بلدان التسوق ';
		$data["my_footer"] = ["upload","valid","date"];
		$data['subview'] = $this->folder.'/one';
		$this->load->view('layout/admin', $data);
	}
	public  function edit($id){
		$data["op"] = 'UPDTATE';
		$data["form"] = $this->con.'/update/'.$id;
		$data["out"] =  $this->Cmodel->getById($id);
		$data["in"] = $this->Cmodel->get_ids_by("country_id",["country_id !="=>$data["out"]['country_id']]);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'بلدان التسوق ';
		$data["my_footer"] = ["upload","valid","date"];
		$data['subview'] = $this->folder.'/one';
		$this->load->view('layout/admin', $data);
	}
	public  function create(){
		if ($this->input->post('INSERT') == "INSERT") {
			$Idata = $this->input->post('Tdata');
			$Idata["created_by"] = $_SESSION['user_id'];
			$id = $this->Cmodel->insert($Idata);
			$this->message('s');
			redirect($this->con."/add", 'refresh');
		}
	}
	public  function update($id){
		if ($this->input->post('UPDTATE') == "UPDTATE") {
			$Idata = $this->input->post('Tdata');
			$Idata["updated_by"] = $_SESSION['user_id'];
			$this->Cmodel->update($id,$Idata);
			$this->message('i');
			redirect( $this->con, 'refresh');
		}
	}
	public  function delete($id){
		$this->Cmodel->delete($id);
		$this->message('e');
		redirect($this->con, 'refresh');
	}
} //END CLASS
?>
