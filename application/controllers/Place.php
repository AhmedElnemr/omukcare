<?php
class Place extends MY_Controller{
    private $folder = "places";
    private $con    = "admin-place";
    public function __construct(){
        parent::__construct();
        $this->load->model('Places_model','Cmodel');
        $this->load->model('Places_trans_model');
        $this->load->model('Medical_tourism_model');
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

        $data["data_table"] = $this->Cmodel->with("medical_tourism")->get_all();
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'أماكن السياحة العلاجية ';
        $data["my_footer"] = ['table'];
        $data['subview'] = $this->folder.'/all';
        $this->load->view('layout/admin', $data);
    }

    public  function add(){

        $data["op"] = 'INSERT';
        $data["form"] = $this->con.'/create';
        $data["out"] = $this->Cmodel->getById(0);
        $data["medical_tourism"] = $this->Medical_tourism_model->get_all();
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'أماكن السياحة العلاجية ';
        $data["my_footer"] = ["upload","valid","date"];
        $data['subview'] = $this->folder.'/one';
        $this->load->view('layout/admin', $data);
    }

    public  function edit($id){

        $data["op"] = 'UPDTATE';
        $data["form"] = $this->con.'/update/'.$id;
        $data["out"] =  $this->Cmodel->getById($id);
        $data["medical_tourism"] = $this->Medical_tourism_model->get_all();
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'أماكن السياحة العلاجية ';
        $data["my_footer"] = ["upload","valid","date"];
        $data['subview'] = $this->folder.'/one';
        $this->load->view('layout/admin', $data);
    }

    public  function create(){

        if ($this->input->post('INSERT') == "INSERT") {

            $Idata = $this->input->post('Tdata');
            $logo = $this->upload_image("image");
            $Idata["image"] = $logo;
            $id = $this->Cmodel->insert($Idata);
            //========================================
            $Tdata = $this->input->post('Pdata');
            foreach ($Tdata as $key=>$val){
                $data["place_id"] = $id;
                $data["lang"] = $key;
                $data["title"] = $val['title'];
                $data["address"] = $val['address'];
                $data["content"] = $val['content'];
                $this->Places_trans_model->insert($data);
            }
            //----------------------------------------------
            $this->message('s');
            redirect($this->con."/add", 'refresh');

        }

    }

    public  function update($id){

        if ($this->input->post('UPDTATE') == "UPDTATE") {
            $Idata = $this->input->post('Tdata');
            $main_iamge = $this->upload_image("image");
            if (!empty($main_iamge)) {
                $Idata["image"] = $main_iamge;
            }
            $this->Cmodel->update($id,$Idata);
            $this->Places_trans_model->delete_by(["place_id"=>$id]);
            $Tdata = $this->input->post('Pdata');
            foreach ($Tdata as $key=>$val){
                $data["place_id"] = $id;
                $data["lang"] = $key;
                $data["title"] = $val['title'];
                $data["address"] = $val['address'];
                $data["content"] = $val['content'];
                $this->Places_trans_model->insert($data);
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



} //END CLASS
?>