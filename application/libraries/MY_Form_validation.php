<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation
{
	/*
	public $errors = array();

	public $errorFlag = true;

	public function __construct(){
		// Do something with $params
		$this->CI =& get_instance();
		$this->CI->load->library('google_maps');
	}

	public function islatLong($lat, $long){
		$this->setValid($lat);
		$this->setValid($long);
		$lat  = $_POST[$lat];
		$long = $_POST[$long];
		$lat_long = $lat.",".$long;
		$this->errorFlag = $this->CI->google_maps->is_lat_long($lat_long);
		array_push($this->errors," lat and long exact");
	}
	public function setValid($post ,$type = "required"){
	   // $postValue = $this->CI->input->post($post);
		if (isset($_POST[$post]) && !empty($_POST[$post])) {
			$this->errorFlag = true ;
		}else{
			$this->errorFlag = false;
			array_push($this->errors,$post." is required");
		}
		if ($type == "time"){
			$this->isTimestamp($post);
		}
	}

	public function isTimestamp($post){
		$timestamp  = $_POST[$post];
		if (ctype_digit($timestamp) && strtotime(date('Y-m-d H:i:s', $timestamp)) === (int)$timestamp) {
			$this->errorFlag = true;
		} else {
			array_push($this->errors,$post." is not timestamp ");
			$this->errorFlag = false;
		}
	}
	*/
	function __construct()
	{
		parent::__construct();
	}

	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------  Basics    ----------------------
	 *
	 *  ==========================================================================
	 */

	/**
	 * @desc Validates a date format
	 * @params format,delimiter
	 * e.g. d/m/y,/ or y-m-d,-
	 */
	function valid_date($str, $params)
	{
		// setup
		$CI =& get_instance();
		$params = explode(',', $params);
		$delimiter = $params[1];
		$date_parts = explode($delimiter, $params[0]);
		// get the index (0, 1 or 2) for each part
		$di = $this->valid_date_part_index($date_parts, 'd');
		$mi = $this->valid_date_part_index($date_parts, 'm');
		$yi = $this->valid_date_part_index($date_parts, 'y');
		// regex setup
		$dre = "(0?1|0?2|0?3|0?4|0?5|0?6|0?7|0?8|0?9|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26|27|28|29|30|31)";
		$mre = "(0?1|0?2|0?3|0?4|0?5|0?6|0?7|0?8|0?9|10|11|12)";
		$yre = "([0-9]{4})";
		$red = '' . $delimiter; // escape delimiter for regex
		$rex = "/^[0]{$red}[1]{$red}[2]/";
		// do replacements at correct positions
		$rex = str_replace("[{$di}]", $dre, $rex);
		$rex = str_replace("[{$mi}]", $mre, $rex);
		$rex = str_replace("[{$yi}]", $yre, $rex);
		if (preg_match($rex, $str, $matches)) {
			// skip 0 as it contains full match, check the date is logically valid
			if (checkdate($matches[$mi + 1], $matches[$di + 1], $matches[$yi + 1])) {
				return true;
			} else {
				// match but logically invalid
				$CI->form_validation->set_message('valid_date', "The date is invalid.");
				return false;
			}
		}
		// no match
		$CI->form_validation->set_message('valid_date', "The date " . $str . " format is invalid. Use {$params[0]}");
		return false;
	}

	function valid_date_part_index($parts, $search)
	{
		for ($i = 0; $i <= count($parts); $i++) {
			if ($parts[$i] == $search) {
				return $i;
			}
		}
	}

	public function valid_user_id($id)
	{
		$CI =& get_instance();
		$CI->db->select('user_id');
		$CI->db->from("registrations");
		$CI->db->where("user_id", $id);
		$query = $CI->db->get();
		if ($query->num_rows() > 0) {
			return true;
		}
		$CI->form_validation->set_message('valid_user_id', "The usr id :" . $id . "  is incorrect ");
		return false;
	}

	public function valid_phone($inString)
	{
		$CI =& get_instance();
		$find = "+";
		$pos = strpos($inString, $find);
		if ($pos === false) {
			//  echo "The string '$findme' was not found in the string '$mystring'";
			return true;
		} else {
			$CI->form_validation->set_message('valid_phone', "The phone must be without `+` ");
			return false;
			//  echo "The string '$findme' was found in the string '$mystring'";
			//  echo " and exists at position $pos";
		}
	}

	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------  App Addtion     ----------------------
	 *
	 *  ==========================================================================
	 */
	public function valid_service_id($id)
	{
		$CI =& get_instance();
		$CI->db->select('service_id');
		$CI->db->from("services");
		$CI->db->where("service_id", $id);
		$query = $CI->db->get();
		if ($query->num_rows() > 0) {
			return true;
		}
		$CI->form_validation->set_message('valid_service_id', "The service_id :" . $id . "  is incorrect ");
		return false;
	}

	public function valid_order_id($id)
	{
		$CI =& get_instance();
		$CI->db->select('order_id');
		$CI->db->from("all_orders");
		$CI->db->where("order_id", $id);
		$query = $CI->db->get();
		if ($query->num_rows() > 0) {
			return true;
		}
		$CI->form_validation->set_message('valid_order_id', "The order_id :" . $id . "  is incorrect ");
		return false;
	}

	public function valid_notification_id($id)
	{
		$CI =& get_instance();
		$CI->db->select('notification_id');
		$CI->db->from("notifications");
		$CI->db->where("notification_id", $id);
		$query = $CI->db->get();
		if ($query->num_rows() > 0) {
			return true;
		}
		$CI->form_validation->set_message('valid_notification_id', "The notification_id :" . $id . "  is incorrect ");
		return false;
	}

	public function valid_product_id($id)
	{
		$CI =& get_instance();
		$CI->db->select('id');
		$CI->db->from("products");
		$CI->db->where("id", $id);
		$query = $CI->db->get();
		if ($query->num_rows() > 0) {
			return true;
		}
		$CI->form_validation->set_message('valid_product_id', "The product_id :" . $id . "  is incorrect ");
		return false;
	}

	public function valid_market_notification_id($id)
	{
		$CI =& get_instance();
		$CI->db->select('notification_id');
		$CI->db->from("market_notifications");
		$CI->db->where("notification_id", $id);
		$query = $CI->db->get();
		if ($query->num_rows() > 0) {
			return true;
		}
		$CI->form_validation->set_message('valid_market_notification_id', "The notification_id :" . $id . "  is incorrect ");
		return false;
	}

	public function valid_specialty_id($id)
	{
		$CI =& get_instance();
		$CI->db->select('id');
		$CI->db->from("specialties");
		$CI->db->where("id", $id);
		$query = $CI->db->get();
		if ($query->num_rows() > 0) {
			return true;
		}
		$CI->form_validation->set_message('valid_specialty_id', "The specialty_id :" . $id . "  is incorrect ");
		return false;
	}

	public function valid_area_id($id)
	{
		$CI =& get_instance();
		$CI->db->select('area_id');
		$CI->db->from("areas");
		$CI->db->where("area_id", $id);
		$query = $CI->db->get();
		if ($query->num_rows() > 0) {
			return true;
		}
		$CI->form_validation->set_message('valid_area_id', "The area_id :" . $id . "  is incorrect ");
		return false;
	}

	public function valid_partner_id($id)
	{
		$CI =& get_instance();
		$CI->db->select('id');
		$CI->db->from("partners");
		$CI->db->where("id", $id);
		$query = $CI->db->get();
		if ($query->num_rows() > 0) {
			return true;
		}
		$CI->form_validation->set_message('valid_partner_id', "The partner_id :" . $id . "  is incorrect ");
		return false;
	}

	public function valid_email_db($id)
	{
		$CI =& get_instance();
		$CI->db->select('user_id');
		$CI->db->from("registrations");
		$CI->db->where("email", $id);
		$query = $CI->db->get();
		if ($query->num_rows() > 0) {
			return true;
		}
		$CI->form_validation->set_message('valid_email_db', "The usr email :" . $id . "  is incorrect ");
		return false;
	}


} // end claas
?>
