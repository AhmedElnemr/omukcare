<?php class MY_Controller extends CI_Controller{
    public   function __construct(){
        parent::__construct();
           if($this->session->userdata('is_logged_in')==0){
                   redirect('login');
              }
        $this->AdminLang = "ar" ;
        $this->lang->load('static', 'ar');
       /* $lang = $this->uri->segment(1);
        if(in_array($lang,array("ar","en"))){
            $this->AdminLang = $lang ;
            if ($lang == "ar") {
                $this->lang->load('static', 'ar');
                delete_cookie("last_lang");
                set_cookie('last_lang',"ar",time()+86400*30);
            }else{
                $this->lang->load('static', 'en');
                delete_cookie("last_lang");
                set_cookie('last_lang',"en",time()+86400*30);
            }
        }
        else{
            $cookeLang  = $this->input->cookie('last_lang');
            if(isset($cookeLang)){
                $this->AdminLang = $cookeLang;
                $this->lang->load('static', $cookeLang);
            }
            else{
                $this->AdminLang = 'ar' ;
                $this->lang->load('static', 'ar');
                set_cookie('last_lang',"ar",time()+86400*30);
            }
        }*/
    }
    public  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
     public  function test_r($data=array()){
         echo "<pre>";
         print_r($data);
         echo "</pre>";
     }
     public  function tt_j($data=array()){
		 header('Content-Type: application/json');
		 echo json_encode($data);
		 die;
	 }

    public  function thumb($data){
        $config['image_library'] = 'gd2';
        $config['source_image'] =$data['full_path'];
        $config['new_image'] = THUMBPATH.$data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker']='';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
    public  function upload_image($file_name){
        $config['upload_path'] = IMAGEPATH;
        $config['allowed_types'] = '*';
        $config['overwrite'] = true;
        $config['max_size']    = '1000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
          return  false;
         // return  $this->upload->display_errors();
        }else{
            $datafile = $this->upload->data();
            $this->thumb($datafile);
           return  $datafile['file_name'];
        }
     }
    public  function upload_file($file_name){
        $config['upload_path'] = FILESPATHS;
        $config['allowed_types'] = '*';
        $config['overwrite'] = true;
        $config['max_size']    = '1000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
        $config['overwrite'] = true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }

     public function message($type, $text = false )
     {

         if ($type == 'success' || $type == 's') {
             $text = ($text != false)? $text:"تمت الاضافة بنجاح";
             return $this->session->set_flashdata('message', '<div class="alert alert-success alert-rounded">
                                                              <i class="ti-user"></i>  ' . $text . '.
                                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                              <span aria-hidden="true">×</span> </button>
                                                             </div>');
         } elseif ($type == 'wiring' || $type == 'w') {
             $text = ($text != false)? $text:"تمت العمليه بنجاح ";
             return $this->session->set_flashdata('message', '<div class="alert alert-warning  alert-rounded">
                                                              <i class="ti-user"></i>  ' . $text . '.
                                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                              <span aria-hidden="true">×</span> </button>
                                                             </div>');
         } elseif ($type == 'error' || $type == 'e') {
             $text = ($text != false)? $text:"تم الحذف بنجاح";
             return $this->session->set_flashdata('message', '<div class="alert alert-danger  alert-rounded">
                                                              <i class="ti-user"></i>  ' . $text . '.
                                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                              <span aria-hidden="true">×</span> </button>
                                                             </div>');
         }elseif ($type == 'info' || $type == 'i') {
             $text = ($text != false)? $text:"تم التعديل بنجاح ";
             return $this->session->set_flashdata('message', '<div class="alert alert-info  alert-rounded">
                                                              <i class="ti-user"></i>  ' . $text . '.
                                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                              <span aria-hidden="true">×</span> </button>
                                                             </div>');
         }
     }

     //=====================================================================
     public function  upload_muli_image($input_name ,$folder="images"){
         $filesCount = count($_FILES[$input_name]['name']);
         for($i = 0; $i < $filesCount; $i++){
             $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
             $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
             $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
             $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
             $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
             $all_img[]=$this->upload_image("userFile",$folder);
         }
         return $all_img;
     }
/**
 *  =================================================================
 * 
 *  -----------------------------------------------------------------
 * 
 *  =================================================================
 */


 } // end class 

?>
