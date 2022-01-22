<?php
class MainService extends MY_Controller{
    private $folder = "main_service";
    private $con    = "admin-main-service";
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

        $data["data_table"] = $this->Cmodel->trans('ar')->get_many_by(["perant_id"=>0]);
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'الخدمات الرئيسية';
        $data["my_footer"] = ['table'];
        $data['subview'] = $this->folder.'/all';
        $this->load->view('layout/admin', $data);
    }

    public  function add(){

        $data["op"] = 'INSERT';
        $data["form"] = $this->con.'/create';
        $data["out"] = $this->Cmodel->getById(0);
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'الخدمات الرئيسية';
        $data["my_footer"] = ["upload","valid","date"];
        $data['subview'] = $this->folder.'/one';
        $this->load->view('layout/admin', $data);
    }

    public  function edit($id){

        $data["op"] = 'UPDTATE';
        $data["form"] = $this->con.'/update/'.$id;
        $data["out"] =  $this->Cmodel->getById($id);
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'الخدمات الرئيسية';
        $data["my_footer"] = ["upload","valid","date"];
        $data['subview'] = $this->folder.'/one';
        $this->load->view('layout/admin', $data);
    }

    public  function create(){

        if ($this->input->post('INSERT') == "INSERT") {

            $logo = $this->upload_image("logo");
            $Idata["logo"] = $logo;
            $web_logo = $this->upload_image("web_logo");
            $Idata["web_logo"] = $web_logo;
            $id = $this->Cmodel->insert($Idata);
            $Tdata = $this->input->post('Pdata');
            foreach ($Tdata as $key=>$val){
                $data["service_id_fk"] = $id;
                $data["lang"] = $key;
                $data["title"] = $val['title'];
                $this->Services_trans_model->insert($data);
            }
            //----------------------------------------------
            $this->message('s');
            redirect($this->con."/add", 'refresh');

        }

    }

    public  function update($id){

        if ($this->input->post('UPDTATE') == "UPDTATE") {
            $logo = $this->upload_image("logo");
            $web_logo = $this->upload_image("web_logo");
			$Idata = [] ;
            if (!empty($logo)) {
                $Idata["logo"] = $logo;
            }
            if (!empty($web_logo)) {
                $Idata["web_logo"] = $web_logo;
            }
            //-------------------------------
			if (!empty($Idata)) {
				$this->Cmodel->update($id, $Idata);
			}
			$this->Services_trans_model->delete_by(["service_id_fk"=>$id]);
            $Tdata = $this->input->post('Pdata');
            foreach ($Tdata as $key=>$val){
                $data["service_id_fk"] = $id;
                $data["lang"] = $key;
                $data["title"] = $val['title'];
                $this->Services_trans_model->insert($data);
            }
            //----------------------------------------------
            $this->message('i');
            redirect( $this->con, 'refresh');
        }

    }


    public  function delete($id){

        $this->Cmodel->delete($id);
        $this->Cmodel->delete_by(['perant_id'=>$id]);
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
		$data["data_table"] = $this->Cmodel->trans('en')->only_deleted()->get_many_by(["perant_id"=>0]);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = ' الخدمات الرئيسية المحذوفة ';
		$data["my_footer"] = ['table'];
		$data['subview'] = $this->folder.'/deleted';
		$this->load->view('layout/admin', $data);
	}


} //END CLASS
?>
