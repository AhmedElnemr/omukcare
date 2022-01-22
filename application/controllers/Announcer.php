<?php
class Announcer extends MY_Controller{
    private $folder = "announcer";
    private $con    = "admin-announcer";
    public function __construct(){
        parent::__construct();
        $this->load->model('Announcer_model','Cmodel');
        //$this->load->model('Slider_trans_model');
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

        $data["data_table"] = $this->Cmodel->get_all();
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'المسوقين';
        $data["my_footer"] = ['table'];
        $data['subview'] = $this->folder.'/all';
        $this->load->view('layout/admin', $data);
    }

    public  function add(){

        $data["op"] = 'INSERT';
        $data["form"] = $this->con.'/create';
        $data["out"] = $this->Cmodel->get_filds();
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'المسوقين';
        $data["my_footer"] = ["upload","valid","date"];
        $data['subview'] = $this->folder.'/one';
        $this->load->view('layout/admin', $data);
    }

    public  function edit($id){

        $data["op"] = 'UPDTATE';
        $data["form"] = $this->con.'/update/'.$id;
        $data["out"] =  $this->Cmodel->as_array()->get($id);
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'المسوقين';
        $data["my_footer"] = ["upload","valid","date"];
        $data['subview'] = $this->folder.'/one';
        $this->load->view('layout/admin', $data);
    }

    public  function create(){

        if ($this->input->post('INSERT') == "INSERT") {
            $Idata = $this->input->post('Pdata');
            $id = $this->Cmodel->insert($Idata);
            $this->message('s');
            redirect($this->con."/add", 'refresh');
        }

    }

    public  function update($id){

        if ($this->input->post('UPDTATE') == "UPDTATE") {
			$Idata = $this->input->post('Pdata');

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

   /* public function user_coupons(){
		$this->load->model('Coupon_users_model');
		$data["data_table"] = $this->Coupon_users_model->with("coupon")->with("client")->get_all();
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'المسوقين المستخدمة';
		$data["my_footer"] = ['table'];
		$data['subview'] = $this->folder.'/user_coupons';
		$this->load->view('layout/admin', $data);
	}*/


} //END CLASS
?>
