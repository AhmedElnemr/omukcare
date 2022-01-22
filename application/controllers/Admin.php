<?php
class Admin extends MY_Controller{
    private $folder = "users";
    private $con    = "admin-users";
    public function __construct(){
        parent::__construct();
        $this->load->model('system_management/User_model','Cmodel');
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

        $data["data_table"] = $this->Cmodel->get_many_by(["is_developer"=>0,"is_confirm"=>"yes"]);
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'مستخدمى لوحة التحكم';
        $data["my_footer"] = ['table'];
        $data['subview'] = $this->folder.'/all';
        $this->load->view('layout/admin', $data);
    }


	public  function register(){

		$data["data_table"] = $this->Cmodel->get_many_by(["is_developer"=>0,"is_confirm"=>"new"]);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'طلبات تسجيل الوكلاء المرفوضة ';
		$data["my_footer"] = ['table'];

		$data['subview'] = $this->folder.'/all_register';
		$this->load->view('layout/admin', $data);
	}

	public  function registerRefuse(){

		$data["data_table"] = $this->Cmodel->get_many_by(["is_developer"=>0,"is_confirm"=>"no"]);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'مستخدمى لوحة التحكم';
		$data["refuse"] = true;
		$data["my_footer"] = ['table'];
		$data['subview'] = $this->folder.'/all_register';
		$this->load->view('layout/admin', $data);
	}

    public  function add(){

        $data["op"] = 'INSERT';
        $data["form"] = $this->con.'/create';
        $data["out"] = $this->Cmodel->get_filds();
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'مستخدمى لوحة التحكم';
        $data["my_footer"] = ["upload","valid","date"];
        $data['subview'] = $this->folder.'/one';
        $this->load->view('layout/admin', $data);
    }

    public  function edit($id){

        $data["op"] = 'UPDTATE';
        $data["form"] = $this->con.'/update/'.$id;
        $data["out"] = $this->Cmodel->as_array()->get($id);
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'مستخدمى لوحة التحكم';
        $data["my_footer"] = ["upload","valid","date"];
        $data['subview'] = $this->folder.'/one';
        $this->load->view('layout/admin', $data);
    }

    public  function create(){

        if ($this->input->post('INSERT') == "INSERT") {
            $Idata = $this->input->post('Pdata');
            $image = $this->upload_image("image");
            $Idata["image"] = $image;
            $Idata["password"] = setPass($Idata['password']);
            //$Idata["date"] = strtotime($Idata["date"]) ;
            $id = $this->Cmodel->insert($Idata);
            //----------------------------------------------
            $this->message('s');
            redirect($this->con."/add", 'refresh');
        }

    }

    public  function update($id){

        if ($this->input->post('UPDTATE') == "UPDTATE") {
           // $this->test_r($_FILES);
           // $this->test($_POST);

            $Idata = $this->input->post('Pdata');
            $image = $this->upload_image("image");
            if (!empty($image)) {
                $Idata["image"] = $image;
            }
            if (!empty($Idata['password'])) {
                $Idata["password"] = setPass($Idata['password']);
               // $this->test($Idata["password"]);
            }

            $this->Cmodel->update($id,$Idata);
            if ($id == $_SESSION['user_id']) {
                $keys = array_keys($Idata);
                foreach ($keys as $key => $value) {
                    $_SESSION[$value] = $Idata[$value];
                }
            }
            //----------------------------------------------
            $this->message('i');
			if ($_SESSION["user_type"] == "admin") {
				redirect($this->con, 'refresh');
			}
			else {
				redirect($this->con."/edit/".$_SESSION["user_id"], 'refresh');
			}
		}

    }

    public function updateStatus($id,$status){

		$this->Cmodel->update($id,["is_confirm"=>$status]);
		$this->message('i');
		redirect( $this->con."/register", 'refresh');
	}

    public  function delete($id){

        $this->Cmodel->delete($id);
        $this->message('e');
        redirect($this->con, 'refresh');
    }



} //END CLASS
?>
