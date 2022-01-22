<?php

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$lang = $this->uri->segment(1);
		$this->AdminLang = "ar";
		$this->lang->load('static', 'ar');
		/*
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
		}
		*/
	}
	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */
	public function upload_image($file_name)
	{
		$config['upload_path'] = IMAGEPATH;
		$config['allowed_types'] = '*';
		$config['overwrite'] = true;
		$config['max_size'] = '1000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
		$config['encrypt_name'] = true;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload($file_name)) {
			return false;
			// return  $this->upload->display_errors();
		} else {
			$datafile = $this->upload->data();
			$this->thumb($datafile);
			return $datafile['file_name'];
		}
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
	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */
	function index()
	{
		if ($this->session->has_userdata('is_logged_in') == 1) {
			//  redirect('Dashboard');
		}
		$data['metadiscription'] = $data['metakeyword'] = $data['title'] = lang('login');
		$this->load->view('backend/login', $data);
	}

	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */
	public function checkLogin()
	{
		$this->load->model('system_management/User_model');
		$user_name = $this->input->post('user_username');
		$pass = setPass($this->input->post('password'));
		$userdata = $this->User_model->as_array()->get_by(["user_username" => $user_name, "password" => $pass]);

		if ($userdata) {
			$userdata['is_logged_in'] = true;
			$this->session->set_userdata($userdata);
			$this->User_model->update($userdata["user_id"], ["last_login" => time(), "is_login" => 1]);
			redirect('Dashboard');
		} else {
			$data['metadiscription'] = $data['metakeyword'] = $data['title'] = lang('login');
			$data['response'] = lang('correct_message');
			$this->load->view('backend/login', $data);
		}
	}
	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */
	public function logout()
	{
		$this->load->model('system_management/User_model');
		$this->User_model->update($_SESSION["user_id"], ["is_login" => 0]);
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}
	/**
	 *  ============================================================
	 *
	 *  ------------------------------------------------------------
	 *
	 *  ============================================================
	 */

	public function registerAgent()
	{
		$this->lang->load('static', 'en');
		$this->load->view('backend/users/register');
	} // createRegisterAgent

	public function createRegisterAgent()
	{
		if ($this->input->post('create')) {
			$logo = $this->upload_image("logo");
			$this->load->model('market/Products_partners_model');
			$this->load->model('market/Products_partners_trans_model');
			$Pdata["logo"] = $logo;
			$partner_id = $this->Products_partners_model->insert($Pdata);
			//----------
			$Ar_data["partner_id"] = $partner_id;
			$Ar_data["lang"] = 'ar';
			$Ar_data["title"] = $this->input->post('name_ar');
			$this->Products_partners_trans_model->insert($Ar_data);
			$En_data["partner_id"] = $partner_id;
			$En_data["lang"] = 'en';
			$En_data["title"] = $this->input->post('name_en');
			$this->Products_partners_trans_model->insert($En_data);
			//-----------
			//----------------------------------------
			$this->load->model('system_management/User_model');
			$Idata["user_username"] = $this->input->post('user_username');
			$Idata["name"] = $this->input->post('name_ar');
			$Idata["email"] = $this->input->post('email');
			$Idata["image"] = $logo;
			$Idata["password"] = setPass($this->input->post('password'));
			$Idata["user_type"] = 'agent';
			$Idata["is_confirm"] = 'new';
			$Idata["partner_id"] = $partner_id;
			$id = $this->User_model->insert($Idata);
			$this->Products_partners_model->update($partner_id, ["created_by" => $id]);
			//==========================================
			$userdata = $this->User_model->as_array()->get($id);
			$userdata['is_logged_in'] = true;
			$this->session->set_userdata($userdata);
			$this->User_model->update($userdata["user_id"], ["last_login" => time(), "is_login" => 1]);
			redirect('Dashboard');
		}
	}


}

?>
