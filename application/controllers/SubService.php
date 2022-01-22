<?php
class SubService extends MY_Controller{
    private $folder = "sub_service";
    private $con    = "admin-sub-service";
    public function __construct(){
        parent::__construct();
        $this->load->model('Services_model','Cmodel');
        $this->load->model('Services_trans_model');
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

        $data["data_table"] = $this->Cmodel->trans('en')->get_many_by(["perant_id !="=>0]);
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'الخدمات الفرعية';
        $data["my_footer"] = ['table'];
        $data['subview'] = $this->folder.'/all';
        $this->load->view('layout/admin', $data);
    }

    public  function add(){

        $data["op"] = 'INSERT';
        $data["form"] = $this->con.'/create';
        $data["out"] = $this->Cmodel->getById(0);
        $data["service"] = $this->Cmodel->trans('ar')->get_many_by(["perant_id"=>0]);
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'الخدمات الفرعية';
        $data["my_footer"] = ["upload","valid","date"];
        $data['subview'] = $this->folder.'/one';
        $this->load->view('layout/admin', $data);
    }

    public  function edit($id){

        $data["op"] = 'UPDTATE';
        $data["form"] = $this->con.'/update/'.$id;
        $data["out"] =  $this->Cmodel->getById($id);
        $data["service"] = $this->Cmodel->trans('ar')->get_many_by(["perant_id"=>0]);
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'الخدمات الفرعية';
        $data["my_footer"] = ["upload","valid","date"];
        $data['subview'] = $this->folder.'/one';
        $this->load->view('layout/admin', $data);
    }

    public  function create(){

        if ($this->input->post('INSERT') == "INSERT") {

            //$logo = $this->upload_image("logo");
            //$Idata["logo"] = $logo;
            $Idata = $this->input->post('Tdata');
            $id = $this->Cmodel->insert($Idata);
            $Tdata = $this->input->post('Pdata');
            foreach ($Tdata as $key=>$val){
                $data["service_id_fk"] = $id;
                $data["lang"] = $key;
                $data["title"] = $val['title'];
                $data["content"] = $val['content'];
                $this->Services_trans_model->insert($data);
            }
            //----------------------------------------------
            $this->message('s');
            redirect($this->con."/add", 'refresh');

        }

    }

    public  function update($id){

        if ($this->input->post('UPDTATE') == "UPDTATE") {
            $Idata = $this->input->post('Tdata');
            /*
            $logo = $this->upload_image("logo");
            if (!empty($logo)) {
                $Idata["logo"] = $logo;

            }
            */
            $this->Cmodel->update($id,$Idata);
            $this->Services_trans_model->delete_by(["service_id_fk"=>$id]);
            $Tdata = $this->input->post('Pdata');
            foreach ($Tdata as $key=>$val){
                $data["service_id_fk"] = $id;
                $data["lang"] = $key;
                $data["title"] = $val['title'];
                $data["content"] = $val['content'];
                $this->Services_trans_model->insert($data);
            }
            //----------------------------------------------
            $this->message('i');
            redirect( $this->con, 'refresh');
        }

    }


    public  function delete($id){

        $this->Cmodel->delete($id);
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
		$data["data_table"] = $this->Cmodel->trans('en')->only_deleted()->get_many_by(["perant_id !="=>0]);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = ' الخدمات الفرعية المحذوفة ';
		$data["my_footer"] = ['table'];
		$data['subview'] = $this->folder.'/deleted';
		$this->load->view('layout/admin', $data);
	}
	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */

	public function prices($id,$perant_id){
		$this->load->model('Areas_model');
		$this->load->model('Specialties_model');
		$this->load->model('Services_prices_model');
		$result = $data['result'] = $this->Services_prices_model->getAll($id);
		if(!empty($result)){
			$data["action"] = "UPDATE";
		}
		else{
			$data["action"] = "INSERT";
		}
		//$this->tt_j($result);
		$data["form"] = $this->con.'/sortPrices/'.$id;
		$out = $data["out"] =  $this->Cmodel->getById($id);
		$data["area"] = $this->Areas_model->get_all();
		$data["specialties"] = $this->Specialties_model->get_many_by(["service_id"=>$perant_id]);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = ' أسعار : '.$out["ar"]["title"];
		$data["my_footer"] = ['valid'];
		$data['subview'] = $this->folder.'/prices';
		$this->load->view('layout/admin', $data);
	}

	public function sortPrices($id){
		$this->load->model('Services_prices_model');
		$area_id = $this->input->post('area_id');
		$specialty_id = $this->input->post('specialty_id');
		$price = $this->input->post('price');
		//$this->tt_j($_POST);
		if ($this->input->post('action') == "INSERT") {
			foreach ($area_id as $key => $val) {
				$data["service_id"] = $id;
				$data["area_id"] = $area_id[$key];
				$data["specialty_id"] = $specialty_id[$key];
				$data["price"] = $price[$key];
				$this->Services_prices_model->insert($data);
			}
		}
		elseif ($this->input->post('action') == "UPDATE"){
			$ids = $this->input->post('ids');
			foreach ($ids as $key => $val) {
				$data["area_id"] = $area_id[$key];
				$data["specialty_id"] = $specialty_id[$key];
				$data["price"] = $price[$key];
				$this->Services_prices_model->update($val,$data);
			}
		}
		$this->message('i');
		redirect( $this->con, 'refresh');
	}

} //END CLASS
?>
