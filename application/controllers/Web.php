<?php

class Web extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		//--------------------------------------------------------
		$this->load->model('system_management/Setting_model');
		$this->setting = $this->Setting_model->getSettings();
		//--------------------------------------------------------
		$lang = $this->uri->segment(1);
		if (in_array($lang, array("ar", "en", "es"))) {
			$this->webLang = $lang;
			if ($lang == "ar") {
				$this->lang->load('static', 'ar');
				delete_cookie("last_lang");
				set_cookie('last_lang', "ar", time() + 86400 * 30);
			} elseif ($lang == "en") {
				$this->lang->load('static', 'en');
				delete_cookie("last_lang");
				set_cookie('last_lang', "en", time() + 86400 * 30);
			} else {
				$this->lang->load('static', 'es');
				delete_cookie("last_lang");
				set_cookie('last_lang', "es", time() + 86400 * 30);
			}
		} else {
			$cookeLang = $this->input->cookie('last_lang');
			if (isset($cookeLang)) {
				$this->webLang = $cookeLang;
				$this->lang->load('static', $cookeLang);
			} else {
				$this->webLang = LOCAL_LANG;
				$this->lang->load('static', LOCAL_LANG);
				set_cookie('last_lang', LOCAL_LANG, time() + 86400 * 30);
			}
		}
		//-------------------------------------------------------
		//-------------------------------------------------------
		$cookeLastVisit = $this->input->cookie('last_visit');
		if (isset($cookeLastVisit)) {
			delete_cookie("last_visit");
			set_cookie('last_visit', strtotime(date("Y-m-d")), time() + 86400 * 30);
		} else {
			set_cookie('last_visit', strtotime(date("Y-m-d")), time() + 86400 * 30);
			$this->load->model('Model_visit');
			$this->Model_visit->insertVisitor(date("Y-m-d"), "web_count");
		}


	}

	private function test($data = array())
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		die;
	}

	private function test_j($data = array())
	{
		header('Content-Type: application/json');
		echo json_encode($data);
		die;
	}

	private function setPaging($controller, $total_records, $limit_per_page)
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url() . $controller;
		$config['total_rows'] = $total_records;
		$config['per_page'] = $limit_per_page;
		$config["uri_segment"] = 3;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = false;
		$config['reuse_query_string'] = true;
		$config['full_tag_open'] = '<ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul>';
		$config['num_links'] = 5;
		$config['page_query_string'] = true;
		//$config['query_string_segment'] = 'your_string';
		$config['full_tag_open'] = '<ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul>';

		$config['page_query_string'] = true;

		$config['prev_link'] = '&lt;السابق  '; // السابق
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['next_link'] = 'التالي &gt;';  // التالى
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}

	/*
	private function sendEmail($data,$from,$to){
		//Load email library
		$emailConfig = array(
			'protocol' => 'mail',
			'smtp_port' => 25,
			'mailtype' => 'html',
			'validate' => true,
			'charset' => 'utf-8'
		);
		//------------------------------------
		$from = array(
			'email' => $from,
			'name' => 'موقع شركــــــــــة ماوان الزراعــيــــــــة'
		);
		$to = array($to);
		$subject = ' شركــــــــــة ماوان الزراعــيــــــــة';
		$message = $this->load->view('frontend/requires/message_email', $data, true);
		//------------------------------------
		$this->load->library('email', $emailConfig);
		$this->email->set_newline("\r\n");
		$this->email->from($from['email']);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->set_mailtype("html");
		// Ready to send email and check whether the email was successfully sent
		if (!$this->email->send()) {
			// Raise error message
			return show_error($this->email->print_debugger());
			// return 0;
		} else {
			// Show success notification or other things here
			return 'Success to send email';
		}
	}
	*/

	public function getSubService($id)
	{
		$this->load->model('Services_model');
		//$data['main'] = $this->Services_model->get($id);
		$data['dataTable'] = $this->Services_model->get_many_by(["perant_id" => $id]);
		$this->load->view('frontend/load_sub', $data);
	}

	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */

	public function index()
	{
		$this->load->model('Slider_model');
		$this->load->model('Services_model');
		// $this->test_j($this->setting);
		$data["slider"] = $this->Slider_model->get_many_by(["type"=>'web']);
		$data["services"] = $this->Services_model->get_many_by(["perant_id" => 0]);
		//==================================================
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = lang("home");
		$data["page_name"] = "home";
		$data['subview'] = 'home';
		$data['myFiles'] = ['home'];
		$this->load->view('layout/web', $data);
	}

	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */

	public function about()
	{
		$data["banner"] = ["title" => lang("about_us")];
		//==================================================
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = lang("about_us");
		$data['subview'] = 'about';
		$data["page_name"] = "about";
		$this->load->view('layout/web', $data);
	}

	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */

	public function parteners()
	{
		$this->load->model('Partners_model');
		$this->load->model('Slider_model');
		$data["all_parteners"] = $this->Partners_model->get_all();
		$bannerText = $this->Slider_model->get_by(["link"=>"parteners"]);
		$data["banner"] = ["title" => lang("Parteners"),"text"=>$bannerText];
		//==================================================
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = lang("Parteners");
		$data['subview'] = 'parteners';
		$data["page_name"] = "Trading";
		$this->load->view('layout/web', $data);
	}

	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */

	public function suppliers()
	{
		$this->load->model('Suppliers_model');
		$data["all_suppliers"] = $this->Suppliers_model->get_all();
		$data["banner"] = ["title" => lang("Suppliers")];
		//==================================================
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = lang("Suppliers");
		$data['subview'] = 'suppliers';
		$data['myFiles'] = ['suppliers'];
		$data["page_name"] = "Trading";
		$this->load->view('layout/web', $data);
	}

	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */

	public function homeCare()
	{
		$this->load->model('Services_model');
		$this->load->model('Slider_model');
		$data["services"] = $this->Services_model->get_many_by(["perant_id" => 0]);
		//==================================================
		$bannerText = $this->Slider_model->get_by(["link"=>"home-care"]);
		$data["banner"] = ["title" => lang("home_care"),"text"=>$bannerText];
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = lang("home_care");
		$data['subview'] = 'home_care';
		$data["page_name"] = "home-care";
		// $data['myFiles'] = ['home'];
		$this->load->view('layout/web', $data);
	}

	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */

	public function medicalTourism()
	{
		$this->load->model('Medical_tourism_model');
		$this->load->model('Slider_model');
		$data["services"] = $this->Medical_tourism_model->with('subs')->get_all();
		$bannerText = $this->Slider_model->get_by(["link"=>"medical-tourism"]);
		//$this->test_j($data["services"]);
		//==================================================
		$data["banner"] = ["title" => lang("medical_tourism"),"text"=>$bannerText];
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = lang("medical_tourism");
		$data['subview'] = 'medical_tourism';
		$data["page_name"] = "medical-tourism";
		$data['myFiles'] = ['medical_tourism'];
		$this->load->view('layout/web', $data);
	}

	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */

	public function contactUs()
	{
		$this->load->model('system_management/Contacts_model');
		//==================================================
		$data["banner"] = ["title" => lang("contact_us")];
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = lang("contact_us");
		$data['subview'] = 'contact_us';
		$data["page_name"] = "contact-us";
		$data['myFiles'] = ['medical_tourism'];
		$this->load->view('layout/web', $data);
	}

	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */

	public function makeOrder($id)
	{
		if(isset($_SESSION["web_user"])){
			$this->load->model('Services_model');
			$this->load->model('Areas_model');
			$this->load->model('Specialties_model');
			$data["area"] = $this->Areas_model->get_all();
			$data["service"] = $this->Services_model->get($id);
			$main = $data["service"]->perant_id ;
			$data["specialization"] = $this->Specialties_model->get_many_by(["service_id"=>$main]);
			//==================================================
			$this->load->library('google_maps');
			$config = array();
			$config['zoom'] = "auto";
			$marker = array();
			$marker['draggable'] = true;
			$marker['ondragend'] = '$("#lat").val(event.latLng.lat());$("#lng").val(event.latLng.lng());';
			$config['center'] = '30.043489,31.235291';//'auto';
			$config['onboundschanged'] = '  if (!centreGot) {
                                                var mapCentre = map.getCenter();
                                                marker_0.setOptions({
                                                    position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
                                                });
                                                $("#lat").val(mapCentre.lat());
                                                $("#lng").val(mapCentre.lng());
                                            }
                                            centreGot = true;';
			$config['geocodeCaching'] = TRUE;
			$marker['title'] = 'أنت هنا .. من فضلك قم بسحب العلامة ووضعها على المكان الصحيح';
			$this->google_maps->initialize($config);
			$this->google_maps->add_marker($marker);
			$data['maps'] = $this->google_maps->create_map();
			//==================================================
			$data["banner"] = ["title" => lang("Make_Order")];
			$data['metadiscription'] = $data['metakeyword'] = $data['title'] = lang("Make_Order");
			$data['subview'] = 'make_order';
			$data["page_name"] = "home-care";
			$data['myFiles'] = ['make_order'];
			$this->load->view('layout/web', $data);
		}
		else{
			redirect("web-login", 'refresh');
		}
	}

	public function orderDetails($id){
		if(isset($_SESSION["web_user"])){
			$this->load->model('Order_model');
			$data["order"] = $this->Order_model->with_meny(["client", "provider", "sub_service"])
				                   ->trans($this->webLang)->get($id);
			//==================================================
			$this->load->library('google_maps');
			$marker = $config = [];
			$config['zoom'] = "16";
			$marker['draggable'] = false;
			$marker['position'] = $data["order"]->google_lat.','.$data["order"]->google_long;//'auto';
			$config['center'] = $data["order"]->google_lat.','.$data["order"]->google_long;//'auto';
			$config['geocodeCaching'] = TRUE;
			$this->google_maps->initialize($config);
			$this->google_maps->add_marker($marker);
			$data['maps'] = $this->google_maps->create_map();
			//==================================================
			//$this->test_j($data["order"]);
			$data["banner"] = ["title" => lang("Make_Order")];
			$data['metadiscription'] = $data['metakeyword'] = $data['title'] = lang("Make_Order");
			$data['subview'] = 'order_detals';
			$data["page_name"] = "home-care";
			$data['myFiles'] = ['make_order'];
			$this->load->view('layout/web', $data);
		}
		else{
			redirect("web-login", 'refresh');
		}
	}

	public function createOrder()
	{
		$this->form_validation->set_rules('Pdata[main_service_id]', '', "required|numeric|valid_service_id");
		$this->form_validation->set_rules('Pdata[sub_service_id]', '', "required|numeric|valid_service_id");
		$this->form_validation->set_rules('order_date_time', '', "required");
		$this->form_validation->set_rules('Pdata[age]', '', "required|numeric");
		$this->form_validation->set_rules('Pdata[gender]', '', "required|numeric|in_list[1,2,3]");
		$this->form_validation->set_rules('Pdata[address]', '', "required");
		$this->form_validation->set_rules('Pdata[google_lat]', '', "required|numeric");
		$this->form_validation->set_rules('Pdata[google_long]', '', "required|numeric");
		$this->form_validation->set_rules('Pdata[phone]', '', "required|valid_phone");
		$this->form_validation->set_rules('Pdata[other_phone]', '', "valid_phone");
		$this->form_validation->set_rules('Pdata[payment]', '', "required|numeric|in_list[1,2,3,4]");
		$this->form_validation->set_rules('Pdata[desc]', '', "required");
		$this->form_validation->set_rules('Pdata[price]', '', "required|numeric");
		$this->form_validation->set_rules('Pdata[num_times]', '', "required|numeric");
		$this->form_validation->set_rules('Pdata[num_patients]', '', "required|numeric");
		if ($this->form_validation->run() == FALSE) {

			redirect("home-care");
			//$this->validResponse();
		//	tt_j(validation_errors());
			//$this->makeOrder($this->input->post('Pdata[main_service_id]'));
		}
		else {
			$this->load->model('Order_model');
			$Idata = $this->input->post("Pdata");
			$Idata["user_id"] = $_SESSION["web_user"]->user_id;
			$Idata["desc"] = trim($Idata["desc"]);
			$Idata["order_status"] = ($Idata['payment'] != 3)? ORDER_START : ORDER_WAT_PAY;
			//---------------------
			$times = explode(" ", $this->input->post("order_date_time"));
			$Idata["order_date"] = strtotime($times[0]);
			$Idata["order_time"] = strtotime($this->input->post("order_date_time"));
			//---------------------
			$order_id = $this->Order_model->insert($Idata);
			$Idata["order_id"] = $order_id;
			//------------------------------------
			$providers = $this->Order_model->sendOrderToProviders($Idata);
			//------------------------------------
			/*
			if ($providers["status"]  == true) {
				$this->set_response(["data" => " sucess order id = " . $order_id,"note"=>$providers["not"]], parent::HTTP_OK);// CREATED
			}
			else{
				$this->set_response(["data" => " sucess order id = " . $order_id], parent::HTTP_CONFLICT);// CREATED
			}
			*/
			$_SESSION['sweet'] = true ;
			if ($Idata['payment'] != 3) {
				redirect("profile/".$_SESSION["web_user"]->user_id, 'refresh');
			}
			else {
				redirect("buy/".$order_id, 'refresh');
			}
		} // form
	}


	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */

	public  function buy($id){
		$this->load->library('paypal_lib');
		// Set variables for paypal form
		$returnURL = base_url().'paypal/success';
		$cancelURL = base_url().'paypal/cancel';
		$notifyURL = base_url().'paypal/ipn';

		// Get product data from the database
		//$product = $this->product->getRows($id);
		$this->load->model('Order_model');
		// Get current user ID from the session
		$order =  $this->Order_model->with_meny(["client", "provider", "sub_service"])->get($id);
		//$this->test_j($order);

		$userID = $order->user_id;
        $item_name = (isset($order->sub_service->trans->title)) ? $order->sub_service->trans->title :"Service" ;
		// Add fields to paypal form
		$this->paypal_lib->add_field('return', $returnURL);
		$this->paypal_lib->add_field('cancel_return', $cancelURL);
		$this->paypal_lib->add_field('notify_url', $notifyURL);
		$this->paypal_lib->add_field('item_name',$item_name );
		$this->paypal_lib->add_field('custom', $userID);
		$this->paypal_lib->add_field('item_number',  $order->order_id);
		$this->paypal_lib->add_field('amount', $order->price);

		// Render paypal form
		$this->paypal_lib->paypal_auto_form();

	}

	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */


	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */

	public function login(){
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = lang("login");
		$this->load->view('frontend/login', $data);
	}

	public function logout(){
		unset($_SESSION["web_user"]);
		redirect("home", 'refresh');
	}

	public function authLogin(){

		//$this->form_validation->set_rules('phone_code', '', "required|numeric");
		$this->form_validation->set_rules('phone', '', "required|numeric");
		$this->form_validation->set_rules('password', '', "required");
		if ($this->form_validation->run() == FALSE) {
			redirect('web-login');
			//$this->validResponse();
		}
		else{
			$this->load->model('Registrations_model');
			$phone = $this->input->post("phone");
			if(strlen($phone) == 11){
				$phone = substr($phone,1,10);
			}
			$where = ["phone"=>$phone,"password"=>setPass($this->input->post("password"))];
			$user  = $this->Registrations_model->trans($this->webLang)->get_by($where);
			if(!empty($user) &&  $user!= null){
				if ($user->available == 1) {
					$this->Registrations_model->update($user->user_id, ["is_login" => 1]);// Create a token
					$_SESSION["web_user"] = $this->Registrations_model->get($user->user_id);
					redirect("profile/" . $user->user_id, 'refresh');
				}
				else{
					redirect("web-login", 'refresh');
				}
			}
			else{
				redirect("web-login", 'refresh');
			}
		}
	}

	public function register(){
		$this->load->model('Services_model');
		$this->load->model('Areas_model');
		$data["area"] = $this->Areas_model->get_all();
		$data["service"] = $this->Services_model->get_many_by(["perant_id" => 0]);
		//==================================================
		$this->load->library('google_maps');
		$config = array();
		$config['zoom'] = "auto";
		$marker = array();
		$marker['draggable'] = true;
		$marker['ondragend'] = '$("#lat").val(event.latLng.lat());$("#lng").val(event.latLng.lng());';
		$config['center'] = '30.043489,31.235291';//'auto';
		$config['onboundschanged'] = '  if (!centreGot) {
                                                var mapCentre = map.getCenter();
                                                marker_0.setOptions({
                                                    position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
                                                });
                                                $("#lat").val(mapCentre.lat());
                                                $("#lng").val(mapCentre.lng());
                                            }
                                            centreGot = true;';
		$config['geocodeCaching'] = TRUE;
		$marker['title'] = 'أنت هنا .. من فضلك قم بسحب العلامة ووضعها على المكان الصحيح';
		$this->google_maps->initialize($config);
		$this->google_maps->add_marker($marker);
		$data['maps'] = $this->google_maps->create_map();
		//==================================================
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = lang("register");
		$this->load->view('frontend/register', $data);
	}

	public function specialization($id){
		$this->load->model('Specialties_model');
		$data["specialization"] = $this->Specialties_model->get_many_by(["service_id"=>$id]);
		$this->load->view('frontend/specialization', $data);
	}

	public function userRegister(){
		$this->form_validation->set_rules('Pdata[name]', '', "required");
		/*$this->form_validation->set_rules('Pdata[phone_code]', '', "required|numeric");*/
		$this->form_validation->set_rules('Pdata[phone]', '', "required|numeric");
		$this->form_validation->set_rules('Pdata[password]', '', "required");
		$this->form_validation->set_rules('Pdata[email]', '', "required|valid_email|is_unique[registrations.email]");
		$this->form_validation->set_rules('Pdata[gender]', '', "required|numeric|in_list[1,2]");
		if ($this->form_validation->run() == FALSE) {
			//redirect('register');
             $this->test_j(validation_errors());
			//$this->validResponse();
		}
		else {
			$this->load->model('Registrations_model');
			$Idata = $this->input->post("Pdata");
			$full_number = getPhone($Idata["full_number"]);
			unset($Idata["full_number"]);
			$Idata["phone"] = $full_number["number"];
			$Idata["phone_code"] = $full_number['code'];
			$Idata["password"] = setPass($Idata["password"]);
			$Idata["soft_type"] = 3;
			$Idata["user_type"] = 1;
			$Idata["is_login"] = 1;
			$Idata["signup_by"] = 'web';
			$Idata["logo"] = uploadFile("logo");
			$Idata["user_code"] = generateRandomString(10);
			$user_id = $this->Registrations_model->insert($Idata);
			$_SESSION["web_user"] = $this->Registrations_model->get($user_id);
			redirect("profile/" . $user_id, 'refresh');
		}
	}

	public function providerRegister(){
	$this->form_validation->set_rules('Pdata[name]', '', "required");
	/*$this->form_validation->set_rules('Pdata[phone_code]', '', "required|numeric");*/
	$this->form_validation->set_rules('Pdata[phone]', '', "required|numeric");
	$this->form_validation->set_rules('Pdata[password]', '', "required");
	$this->form_validation->set_rules('Pdata[email]', '', "required|valid_email|is_unique[registrations.email]");
	$this->form_validation->set_rules('Pdata[gender]', '', "required|numeric|in_list[1,2]");
	$this->form_validation->set_rules('Pdata[service_id]', '', "required|numeric|valid_service_id");
	$this->form_validation->set_rules('Pdata[area_id]', '', "required|numeric|valid_area_id");
	$this->form_validation->set_rules('Pdata[exper]', '', "required");
	$this->form_validation->set_rules('Pdata[about]', '', "required");

	if ($this->form_validation->run() == FALSE) {
		redirect('register');
		//	$this->validResponse();
		//$this->test_j($_POST);
	}
	else{
		//$this->test_j($_POST);
		$this->load->model('Registrations_model');
		$Idata = $this->input->post("Pdata");
		$full_number = getPhone($Idata["full_number"]);
		unset($Idata["full_number"]);
		$Idata["phone"] = $full_number["number"];
		$Idata["phone_code"] = $full_number['code'];
		$Idata["password"] = setPass($Idata["password"]);
		$Idata["user_type"] = 2;
		$Idata["be_provider"] = 0;
		$Idata["is_login"] = 1;
		$Idata["signup_by"] = 'web';
		$Idata["logo"] = uploadFile("logo");
		$Idata["user_code"] = generateRandomString(10);
		$user_id = $this->Registrations_model->insert($Idata);
		$_SESSION["web_user"] = $this->Registrations_model->get($user_id);
		redirect("profile/" . $user_id, 'refresh');
	}
}

	public function profile($user_id){
		if(isset($_SESSION["web_user"])){
			$this->load->model('Registrations_model');
			$this->load->model('Notifications_model');
			$this->load->model('Order_model');
			$user = $data["user"]= $this->Registrations_model->trans($this->webLang)->get($user_id);
		  // $this->test_j($user_id);
			//--------------------
			if ($user->user_type == 1 ) {
				$InArray = [ADMIN_USER, USER_USER, PROVIDER_USER];
				$whereOrder = ["user_id"=>$user->user_id];
			}
			elseif ($user->user_type == 2){
				$InArray = [ADMIN_PROVIDER, USER_PROVIDER, PROVIDER_PROVIDER];
				$whereOrder = ["provider_id"=>$user->user_id];
			}
			$data["notes"] = $this->Notifications_model->with('from_user')->trans($this->webLang)
				                  ->order_by("notification_id","DESC")
				                  ->get_many_by_in(["to_user_id"=>$user->user_id],'notification_type',$InArray);
			//--------------------
			$data["orders"] = $this->Order_model->with_meny(["client", "provider", "service"])
				                                ->trans($this->webLang)->get_many_by($whereOrder);
			//======================================
			$data["banner"] = ["title" => lang("my_profile")];
			$data['metadiscription'] = $data['metakeyword'] = $data['title'] = lang("my_profile");
			$data['subview'] = 'profile';
			$data["page_name"] = "home-care";
			$data['myFiles'] = ['make_order'];
			$this->load->view('layout/web', $data);
		}
	    else{
			redirect("Page404", 'refresh');
		}
	}

	public function updateProfile($user_id){
		$this->load->model('Registrations_model');
		$Idata = $this->input->post("Pdata");
		if (isset($Idata["password"])) {
			$Idata["password"] = setPass($Idata["password"]);
		}
		$user_id = $this->Registrations_model->update($user_id,$Idata);
		$_SESSION["web_user"] = $this->Registrations_model->get($user_id);
		redirect("profile/" . $user_id, 'refresh');
	}

	public function acceptOrder($order_id , $note_id,$from){
		$this->load->helper(['utility','note']);
		$this->load->model('Order_model');
		$Udata["order_status"] = ORDER_ACCEPT ;
		$Udata["provider_id"] = $_SESSION["web_user"]->user_id ;
		$this->Order_model->update($order_id, $Udata);
		$this->load->model('Notifications_model');
		$providers = $this->Notifications_model->get_ids_by("to_user_id",["from_user_id"=>$from ,"process_id_fk"=>$order_id]);
		$this->Notifications_model->delete_by(
			["from_user_id"=>$from ,"process_id_fk"=>$order_id,"action_type"=>ACTION_ACCEPT_REFUSE]
		);
		//----------------------------
		//  FIRE BASE NOTE TO PROVIDER WITH REFRESH NOTIFICATIONS AND TO CLIENT ORDER ACCEPT
		$not_1    = refrshNot($providers);
		$not_2    = orderAccepted($_SESSION["web_user"]->user_id,[$from],$order_id);
		//----------------------------
		redirect("profile/" . $_SESSION["web_user"]->user_id, 'refresh');
	}

	public function refuseOrder($order_id,$note_id,$from){
		$user = $_SESSION["web_user"];
		$this->load->model('Notifications_model');
		$this->Notifications_model->delete($note_id);
		$providers  = $this->Notifications_model->count_by(
			["from_user_id"=>$from ,"process_id_fk"=>$order_id ,"action_type"=>ACTION_ACCEPT_REFUSE]
		);
		if($providers <= 0){
			$this->load->model('Order_model');
			$Udata["order_status"] = ORDER_BLOCKED ;
			$this->Order_model->update($order_id, $Udata);
			//----------------------------
			//  FIRE BASE NOTE TO CLIENT  ORDER BLOCKED NO PROVIDER ACCEPT ORDER
			$not = orderBlocked($user->user_id,[$from],$order_id);
			//----------------------------
		}
		redirect("profile/" . $user->user_id, 'refresh');
	}

	public function clientEndOrder($order_id,$notification_id,$to){
		$this->load->model('Order_model');
		$this->load->model('Notifications_model');
		$this->load->model('Ratings_model');
	    $user = $_SESSION["web_user"];
		$from = $user->user_id ;
		//$order = $this->Order_model->get($order_id);
		$this->Order_model->update($order_id,['order_status'=> ORDER_END_ALL]);
		$this->Model_web_service->upadeteRate($to,3);
		$this->Notifications_model->delete($notification_id);
		//---------------------------
		$rate["order_id"] = $order_id ;
		$rate["from_id"] = $from ;
		$rate["to_id"] = $to ;
		$rate["rate_num"] = 3 ;
		$rate["rate_comment"] = 'good' ;
		$this->Ratings_model->insert($rate);
		//---------------------------
		$note['process_id_fk'] = $order_id;
		$note['from_user_id'] = $from;
		$note['to_user_id'] = $to;
		$note['notification_type'] = USER_PROVIDER;
		$note['action_type'] = ACTION_NOTHING;
		$note['notification_msg_id'] = HAVE_RATING;
		$this->Notifications_model->insert($note);
		//----------------------------
		//  FIRE BASE NOTE TO PROVIDER HAVE RATER
		$not = haveRating($from,[$to],$order_id);
		//----------------------------
		redirect("profile/" . $user->user_id, 'refresh');
	}
















}// END CLASS 
