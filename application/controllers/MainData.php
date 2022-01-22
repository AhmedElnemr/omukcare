<?php
class MainData extends MY_Controller{
    private $folder = "main_data";
    private $con    = "main-setting";
    public function __construct(){
        parent::__construct();
        $this->load->helper('html');
        $this->load->model('system_management/Setting_model','Cmodel');
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

        /*
        $data["data_table"] = $this->Cmodel->get_all();
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'المركز الاعلامى';
        $data["my_footer"] = ['table'];
        $data['subview'] = $this->folder.'/all';
        $this->load->view('layout/admin', $data);
        */
    }

    public  function add(){

        $data["op"] = 'INSERT';
        $data["form"] = $this->con.'/create';
        $data["settings"] = $this->Cmodel->order_by('order_num',"ASC")->get_many_by(["available"=>1,"page_link"=>"main_data"]);
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = lang('basic_information');
        $data["my_footer"] = ["upload","valid","date"];
        $data['subview'] = $this->folder.'/one';
        $this->load->view('layout/admin', $data);
    }

    public  function edit($id){

        /*
        $data["op"] = 'UPDTATE';
        $data["form"] = $this->con.'/update/'.$id;
        $data["out"] = $this->Cmodel->as_array()->get($id);
        $data['metadiscription'] = $data['metakeyword'] = $data['title'] = lang('basic_information');
        $data["my_footer"] = ["upload","valid","date"];
        $data['subview'] = $this->folder.'/one';
        $this->load->view('layout/admin', $data);
        */
    }

    public  function create(){

        if ($this->input->post('INSERT') == "INSERT") {
            $Idata = $this->input->post('Pdata');

            foreach ($Idata as $key=>$value){
                $Udata["value"] = $value ;
                $where["fild_key"] =$key;
                $this->Cmodel->update_by($where,$Udata);
            }
            $logo = $this->upload_image("logo");
            $Udata["value"] = $logo;
            $where["fild_key"] = "logo";
            $this->Cmodel->update_by($where,$Udata);
            //----------------------------------------------
            $this->message('s');
			if(isset($_SERVER['HTTP_REFERER'])){
				$previos_path = str_replace(base_url(), "", $_SERVER['HTTP_REFERER']);
				redirect($previos_path,'refresh');
			}
			else{
				redirect($this->con."/add",'refresh');
			}
            // redirect($this->con."/add", 'refresh');
        }

    }

    public  function update($id){
        /*
        if ($this->input->post('UPDTATE') == "UPDTATE") {
            $Idata = $this->input->post('Pdata');
            $logo = $this->upload_image("logo");
            if (!empty($logo)) {
                $Idata["logo"] = $logo;
            }
            //$Idata["date"] = strtotime($Idata["date"]) ;
            $id = $this->Cmodel->update($id,$Idata);
            //----------------------------------------------
            $this->message('i');
            redirect( $this->con."/add", 'refresh');
        }
          */
    }


    public  function delete($id){
        /*
        $this->Cmodel->delete($id);
        $this->message('e');
        redirect($this->con, 'refresh');
        */
    }

	public  function about(){

		$data["op"] = 'INSERT';
		$data["form"] = $this->con.'/create';
		$data["settings"] = $this->Cmodel->order_by('order_num',"ASC")->get_many_by(["available"=>1,"page_link"=>"about_data"]);
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'عنـا';
		$data["my_footer"] = ["upload","valid","date"];
		$data['subview'] = $this->folder.'/one';
		$this->load->view('layout/admin', $data);
	}

	public  function terms(){

			$data["op"] = 'INSERT';
			$data["form"] = $this->con.'/create';
			$data["settings"] = $this->Cmodel->order_by('order_num',"ASC")->get_many_by(["available"=>1,"page_link"=>"terms_data"]);
			$data['metadiscription'] = $data['metakeyword'] = $data['title'] = 'شروط و أحكام التطبيق';
			$data["my_footer"] = ["upload","valid","date"];
			$data['subview'] = $this->folder.'/one';
			$this->load->view('layout/admin', $data);
		}



} //END CLASS
?>
