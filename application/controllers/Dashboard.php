<?php
  class Dashboard extends MY_Controller{
        public   function __construct(){
            parent::__construct();
        }
    /**
      *  =========================================================================
      *
      *  -------------------------------------------------------------------------
      *
      *  =========================================================================
    */
      public function index(){
          $this->load->model('Registrations_model');
          $this->load->model('Model_admin_home');
          $this->load->model('Order_model');

          $day = date("Y-m-d",time());
          $last = date('d-m-Y', strtotime('last day of this month'));
          $frist = date('d-m-Y', strtotime('first day of this month'));
          $data['month_visit'] = $this->Model_admin_home->getCountVisit(array("day_date >=" => strtotime($frist), "day_date <=" => strtotime($last)));
          $data['daly_visit'] = $this->Model_admin_home->getCountVisit(array("day_date >="=>strtotime($day),"day_date <"=>strtotime($day)+86400));
          $data['total_visit'] = $this->Model_admin_home->getCountVisit(["id != "=>0]);
          $data['arMonth'] = [
          	  "January" => "يناير", "February" => "فبراير", "March" => "مارس",
			  "April" => "ابريل", "May" => "مايو", "June" => "يونيو", "July" => "يوليو",
			  "August" => "اغسطس", "September" => "سبتمبر", "October" => "اكتوبر",
			  "November" => "نوفمبر", "December" => "ديسمبر"
		  ];
          //-----------------------------------
          $data["orders"] = $this->Order_model->count_all();
		  $data["orders_new"] = $this->Model_admin_home->getCountOrders([ORDER_WAT_PAY,ORDER_START,ORDER_BLOCKED]);
		  $data["orders_current"] = $this->Model_admin_home->getCountOrders([ORDER_ACCEPT]);
		  $data["orders_old"] = $this->Model_admin_home->getCountOrders([ORDER_END,ORDER_END_ALL]);
		  $data["orders_cancel"] = $this->Model_admin_home->getCountOrders([ORDER_CANCEL,ORDER_DELETE]);
          $data["providers"] = $this->Registrations_model->count_by(["user_type"=>2]);
          $data["client"]  = $this->Registrations_model->count_by(["user_type"=>1]);
          $data["orders_com"]  = $this->Model_admin_home->getCountOrdersCom();
          //$data["client"]  = $this->Order_model->count_by();
          //$data["users"]   = $this->Registrations_model->limit(6)->order_by("user_id","DESC")->get_all();
          //----------------------------------
          $data['subview'] = 'home';
          $data["my_footer"] = ['Counters'];
          $this->load->view('layout/admin_basic', $data);
      }

      public function statistics(){ //  Dashboard/statistics
          $this->load->model('Model_admin_home');
          if ($this->input->post('search') == "search_visit_day") {
              $day = $this->input->post('searchDate');
              $con_day=array("day_date >="=>strtotime($day),"day_date <"=>strtotime($day)+86400);
              echo $this->Model_admin_home->getCountVisit($con_day);
          }
          elseif ($this->input->post('search') == "search_visit_month"){
              $month = $this->input->post('searchMonth');
              $last = date('d-m-Y', strtotime('last day of '.$month));
              $frist = date('d-m-Y', strtotime('first day of '.$month));
              $arr = array("day_date >=" => strtotime($frist), "day_date <" => strtotime($last)+86400);
              echo $this->Model_admin_home->getCountVisit($arr);
          }
      }

      /**
       *  =========================================================================
       *
       *  -------------------------------------------------------------------------
       *
       *  =========================================================================
       */

      public  function mainData(){
          $this->load->model('system_management/Setting_model');
          $data["settings"] = $this->Setting_model->get_many_by(["available"=>1,"page_link"=>"main_data"]);
          $data['metadiscription'] = $data['metakeyword'] = $data['title'] = lang('basic_information');
          $data['subview'] = 'main_data/main_data';
          $this->load->view('layout/admin', $data);
      }


  }// END CLASS
?>
