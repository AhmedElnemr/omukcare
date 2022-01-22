<?php
class Provider extends MY_Controller{
    private $folder = "providers";
    private $con    = "admin-provider";
    public function __construct(){
        parent::__construct();
        $this->load->model('Registrations_model','Cmodel');
        $this->load->model('Services_model');
        $this->load->model('Areas_model');
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

        $data["data_table"] = $this->Cmodel->with('service_data')->get_many_by(["user_type"=>2,"be_provider"=>1]);
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'مقدمى الخدمات';
        $data["my_footer"] = ['table'];
        $data['subview'] = $this->folder.'/all';
        $this->load->view('layout/admin', $data);
    }

    public  function apply(){
        $data["data_table"] = $this->Cmodel->with('service_data')->get_many_by(["user_type"=>2,"be_provider"=>0]);
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'طلبات التسجيل كمقدم خدمه';
        $data["my_footer"] = ['table'];
        $data['subview'] = $this->folder.'/apply';
        $this->load->view('layout/admin', $data);
    }

    public  function add(){

        $data["op"] = 'INSERT';
        $data["form"] = $this->con.'/create';
        $data["out"] = $this->Cmodel->get_filds();
        $data["service"] = $this->Services_model->get_many_by(["perant_id"=>0]);
        $data["area"] = $this->Areas_model->get_all();
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'مقدمى الخدمات';
        $data["my_footer"] = ["upload","valid","date"];
        $data['subview'] = $this->folder.'/one';
        $this->load->view('layout/admin', $data);
    }

    public  function edit($id){

        $data["op"] = 'UPDTATE';
        $data["form"] = $this->con.'/update/'.$id;
        $data["out"] = $this->Cmodel->as_array()->get($id);
        $data["service"] = $this->Services_model->get_many_by(["perant_id"=>0]);
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'مقدمى الخدمات';
        $data["my_footer"] = ["upload","valid","date"];
        $data['subview'] = $this->folder.'/one';
        $this->load->view('layout/admin', $data);
    }

    public  function create(){

        if ($this->input->post('INSERT') == "INSERT") {
            $Idata = $this->input->post('Pdata');
			if(strlen($Idata["phone"]) == 11){
				$Idata["phone"] = substr($Idata["phone"],1,10);
			}
            $Idata["logo"] = $this->upload_image("logo");
			$Idata["password"] = setPass($Idata['password']);
			$Idata["user_code"] = generateRandomString(10);
            $Idata["user_type"] = 2 ;
            $Idata["be_provider"] = 1 ;
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
			if(strlen($Idata["phone"]) == 11){
				$Idata["phone"] = substr($Idata["phone"],1,10);
			}
            if (!empty($logo)) {
                $Idata["logo"] = $logo;
            }
            if (!empty($Idata['password'])) {
                $Idata["password"] = setPass($Idata['password']);
                // $this->test($Idata["password"]);
            }
            $id = $this->Cmodel->update($id,$Idata);
            //----------------------------------------------
            $this->message('i');
            redirect( $this->con, 'refresh');
        }

    }

    public function approve($state,$id){
        $Idata["be_provider"] = $state ;
        $id = $this->Cmodel->update($id,$Idata);
        if ($state == 1) {
            $this->message('i', 'تم الموافقة');
        }
        else {
            $this->message('e', 'تم الرفض');
        }
        redirect( $this->con."/apply", 'refresh');
    }

    public  function delete($id){
        $this->Cmodel->delete($id);
        $this->message('e');
        redirect($this->con, 'refresh');
    }



} //END CLASS
?>
