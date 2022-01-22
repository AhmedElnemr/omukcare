<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Paypal extends CI_Controller{

	function  __construct(){
		parent::__construct();

		// Load paypal library & product model
		$this->load->library('paypal_lib');
		//$this->load->model('product');
	}

	private function test_j($data = array())
	{
		header('Content-Type: application/json');
		echo json_encode($data);
		die;
	}


	function success(){
		// Get the transaction data
		$paypalInfo = $this->input->post();
       // $this->test_j($paypalInfo);
		$data['item_name']      = $paypalInfo['item_name'];
		$id = $data['item_number']    = $paypalInfo['item_number'];
		$data['txn_id']         = $paypalInfo["txn_id"];
		$data['payment_amt']    = $paypalInfo["payment_gross"];
		$data['currency_code']  = $paypalInfo["mc_currency"];
		$data['status']         = $paypalInfo["payment_status"];

		$this->load->model('Order_model');
		// Get current user ID from the session
		$data['order'] =  $this->Order_model->with_meny(["client", "provider", "sub_service"])->get($id);
		//$this->test_j($order);

		// Pass the transaction data to view
		$this->load->view('paypal/success', $data);

	}

	function cancel(){
		// Load payment failed view
		$this->load->view('paypal/cancel');
	}

	function ipn(){
		// Paypal posts the transaction data
		$paypalInfo = $this->input->post();

		if(!empty($paypalInfo)){
			// Validate and get the ipn response
			$ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);

			// Check whether the transaction is valid
			if($ipnCheck){
				$this->load->model('Order_model');
				// Insert the transaction data in the database
				$data['user_id'] = $paypalInfo["custom"];
				$data['order_id'] = $paypalInfo["item_number"];
				$data['txn_id'] = $paypalInfo["txn_id"];
				$data['payment_gross'] = $paypalInfo["mc_gross"];
				$data['currency_code'] = $paypalInfo["mc_currency"];
				$data['payer_email'] = $paypalInfo["payer_email"];
				$data['payment_status'] = $paypalInfo["payment_status"];
				$data['date'] = time();

				$this->Order_model->insertTransaction($data);
			    $this->Order_model->update($data['order_id'],["order_status"=>0]);

			}
		}
	}
}
