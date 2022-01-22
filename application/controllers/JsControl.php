<?php
class JsControl extends CI_Controller{
    public function __construct(){
        parent::__construct();
      
        $this->load->model('Model_js_control');
    }
    public function index(){
      
        if ($this->input->post('city_id_fk')) {
            $city_id = $this->input->post('city_id_fk');
            $all_district =$this->Difined_model->select_search_key("sa_neighborhoods","city_id_fk",$city_id);
            if(isset($all_district) && !empty($all_district) && $all_district!=null){
                foreach ($all_district as $one_district):
                    echo ' <option  value="'.$one_district->id_neighborhood.'">';
                    echo $one_district->ar_neighborhood.'</option>';
                endforeach;
            }else{
                echo ' <option  value=""> لا يوجد أحياء مضافة  </option>';
            }
        }elseif ($this->input->post('unique_field') ){
            $field = $this->input->post('field_name');
            $table = $this->input->post('table');
            $value = $this->input->post('value');
            echo $this->Model_js_control->check_unique($table,$field,$value);
        }
    }
    //==================================================================================================================



}// end class 
?>