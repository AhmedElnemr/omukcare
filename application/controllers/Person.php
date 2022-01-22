<?php
class Person extends MY_Controller{
    private $folder = "persons";
    private $con    = "admin-person";
    public function __construct(){
        parent::__construct();
        $this->load->model('Registrations_model','Cmodel');
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

        $data["data_table"] = $this->Cmodel->get_many_by(["user_type"=>1]);
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'عملاء التطبيق';
        $data["my_footer"] = ['table'];
        $data['subview'] = $this->folder.'/all';
        $this->load->view('layout/admin', $data);
    }

    public  function add(){

        $data["op"] = 'INSERT';
        $data["form"] = $this->con.'/create';
        $data["out"] = $this->Cmodel->get_filds();
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'عملاء التطبيق';
        $data["my_footer"] = ["upload","valid","date"];

        $data['subview'] = $this->folder.'/one';
        $this->load->view('layout/admin', $data);
    }

    public  function edit($id){

        $data["op"] = 'UPDTATE';
        $data["form"] = $this->con.'/update/'.$id;
        $data["out"] = $this->Cmodel->as_array()->get($id);
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'عملاء التطبيق';
        $data["my_footer"] = ["upload","valid","date"];
        $data['subview'] = $this->folder.'/one';
        $this->load->view('layout/admin', $data);
    }

    public  function create(){

        if ($this->input->post('INSERT') == "INSERT") {
            $Idata = $this->input->post('Pdata');
            $Idata["logo"] = $this->upload_image("logo");
			if(strlen($Idata["phone"]) == 11){
				$Idata["phone"] = substr($Idata["phone"],1,10);
			}
			$Idata["user_code"] = generateRandomString(10);
			$Idata["password"] = setPass($Idata['password']);
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
            if (!empty($Idata['password'])) {
                $Idata["password"] = setPass($Idata['password']);
                // $this->test($Idata["password"]);
            }
			if(strlen($Idata["phone"]) == 11){
				$Idata["phone"] = substr($Idata["phone"],1,10);
			}
            $id = $this->Cmodel->update($id,$Idata);
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
