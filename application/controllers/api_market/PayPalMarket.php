<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PayPalMarket extends CI_Controller{
	function  __construct(){
		parent::__construct();
		// Load paypal library & product model
		$this->load->library('paypal_lib');
		//$this->load->model('product');
	}

	public  function buy($id){
		$this->load->library('paypal_lib');
		// Set variables for paypal form
		$returnURL = base_url().'paypal/success';
		$cancelURL = base_url().'paypal/cancel';
		$notifyURL = base_url().'paypal/ipn';
		// Get product data from the database
		$this->load->model('market/Orders_model');
		$this->load->model('market/Orders_details_model');
		// Get current user ID from the session
		$order =  $this->Orders_model->get($id);
		$userID = $order->user_id;
		$item_name = 'طلب جديد ' ;
		// Add fields to paypal form
		$this->paypal_lib->add_field('return', $returnURL);
		$this->paypal_lib->add_field('cancel_return', $cancelURL);
		$this->paypal_lib->add_field('notify_url', $notifyURL);
		$this->paypal_lib->add_field('item_name',$item_name );
		$this->paypal_lib->add_field('custom', $userID);
		$this->paypal_lib->add_field('item_number',  $order->id);
		$this->paypal_lib->add_field('amount', $order->total_cost);
		// Render paypal form
		$this->paypal_lib->paypal_auto_form();
	}

	function success(){
		// Get the transaction data
		$paypalInfo = $this->input->post();
		$data['item_name']      = $paypalInfo['item_name'];
		$order_id = $data['item_number']    = $paypalInfo['item_number'];
		$data['txn_id']         = $paypalInfo["txn_id"];
		$data['payment_amt']    = $paypalInfo["payment_gross"];
		$data['currency_code']  = $paypalInfo["mc_currency"];
		$data['status']         = $paypalInfo["payment_status"];
		$this->load->model('market/Orders_model');
		$this->load->model('market/Orders_details_model');
		// Get current user ID from the session
		$data["order"] = $this->Orders_model->with("client")->get($order_id);
		$data["order_details"] = $this->Orders_details_model->get_many_by(["order_id"=>$order_id]);
		// Pass the transaction data to view
		$this->load->view('frontend/market/paypal/success', $data);
	}

	function cancel(){
		// Load payment failed view
		$this->load->view('frontend/market/paypal/cancel');
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
			}
		}
	}
}
