<?php
require APPPATH . 'libraries/REST_Controller.php';

class Order extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('system_management/Model_web_service');
		$this->load->helper(['utility', 'note', 'jwt', 'authorization']);
		$this->msg_header = "device-lang in header is required and must be one of [ ar , en  , es]";
	}

	private function validateHeader()
	{
		$CI =& get_instance();
		$headers = $CI->input->request_headers();
		if (array_key_exists("device-lang", $headers)
			&& !empty($headers['device-lang'])
			&& in_array($headers['device-lang'], array("ar", "en", "es"))
		) {
			$device_lang = $headers['device-lang'];
			return (object)["status" => true, "lang" => $device_lang];
		} else {
			return (object)["status" => false, "lang" => "ar"];
		}
	}

	private function test($data)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}

	private function test_j($data)
	{
		$this->set_response($data,
			REST_Controller::HTTP_OK); // CREATED (422)
	}

	private function validResponse($msg = false)
	{
		if ($msg == false) {
			$data["errors"] = get_string($this->validation_errors());
		} else {
			$data["errors"] = $msg;
		}
		$this->set_response($data,
			REST_Controller::HTTP_UNPROCESSABLE_ENTITY); // CREATED (422)
	}

	private function okResponse($output)
	{
		$this->set_response($output,
			REST_Controller::HTTP_OK); // CREATED (200)
	}

	private function verifyRequest()
	{
		// Get all the headers
		$headers = $this->input->request_headers();
		// Extract the token
		if (!isset($headers['Authorization'])) {
			return (object)array("status" => false,
				"msg" => "Authorization is required in header ",
				"code" => parent::HTTP_UNPROCESSABLE_ENTITY);
		}
		$token = $headers['Authorization'];
		// Use try-catch
		// JWT library throws exception if the token is not valid
		try {
			// Validate the token
			// Successfull validation will return the decoded user data else returns false
			$data = AUTHORIZATION::validateToken($token);
			if ($data === false) {
				return (object)array("status" => false,
					"msg" => 'Unauthorized Access!',
					"code" => parent::HTTP_UNAUTHORIZED);
			} else {
				return (object)array("status" => true,
					"msg" => $data,
					"code" => parent::HTTP_OK);
			}
		} catch (Exception $e) {
			// Token is invalid
			// Send the unathorized access message
			return (object)array("status" => false,
				"msg" => 'server error!',
				"code" => parent::HTTP_OK);
		}
	}

	public function index()
	{
		$this->set_response(array("data" => "404 page not found"),
			REST_Controller::HTTP_NOT_FOUND); // CREATED (400) being the HTTP response code
	}

	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */

	public function create_post()
	{
		$validAuth = $this->verifyRequest();
		$user = $validAuth->msg;
		$code = $validAuth->code;
		if ($validAuth->status == false) {
			return $this->set_response(['data' => $user], $code);
		}
		//---------------------------------------
		$header = $this->validateHeader();
		if ($header->status == false) {
			return $this->validResponse($this->msg_header);
		}
		//---------------------------------------
		$this->form_validation->set_rules('main_service_id', '', "required|numeric|valid_service_id");
		$this->form_validation->set_rules('sub_service_id', '', "required|numeric|valid_service_id");
		$this->form_validation->set_rules('area_id', '', "required|valid_area_id");
		$this->form_validation->set_rules('order_date', '', "required|valid_date[d-m-y,-]");
		$this->form_validation->set_rules('order_time', '', "required");
		$this->form_validation->set_rules('age', '', "required|numeric");
		$this->form_validation->set_rules('gender', '', "required|numeric|in_list[1,2,3]");
		//$this->form_validation->set_rules('address', '', "required");
		$this->form_validation->set_rules('google_lat', '', "required|numeric");
		$this->form_validation->set_rules('google_long', '', "required|numeric");
		$this->form_validation->set_rules('phone', '', "required|valid_phone");
		//$this->form_validation->set_rules('other_phone', '', "valid_phone");
		$this->form_validation->set_rules('payment', '', "required|numeric|in_list[1,2,3,4]");
		//$this->form_validation->set_rules('desc', '', "valid_phone");
		$this->form_validation->set_rules('price', '', "required|numeric");
		$this->form_validation->set_rules('num_times', '', "required|numeric");
		$this->form_validation->set_rules('num_patients', '', "required|numeric");
		//$this->form_validation->set_rules('specialty_id', '', "required|numeric");
		if ($this->form_validation->run() == FALSE) {
			return $this->validResponse();
		}
		//---------------------------------------
		$Idata["user_id"] = $user->user_id;
		$Idata["order_status"] = ($this->post('payment') != "3") ? ORDER_START : ORDER_WAT_PAY;
		$Idata["main_service_id"] = $this->post("main_service_id");
		$Idata["sub_service_id"] = $this->post("sub_service_id");
		$specialty_id = $this->post("specialty_id");
		if (isset($specialty_id)) {
			$Idata["specialty_id"] = $this->post("specialty_id");
		}
		$Idata["order_date"] = strtotime($this->post("order_date"));
		$Idata["order_time"] = $this->post("order_time");
		$Idata["age"] = $this->post("age");
		$Idata["area_id"] = $this->post("area_id");
		$Idata["gender"] = $this->post("gender");
		$Idata["address"] = ($this->post("address")) ? $this->post("address") : "--";
		$Idata["other_details"] = ($this->post("other_details")) ? $this->post("other_details") : null;
		$Idata["google_lat"] = $this->post("google_lat");
		$Idata["google_long"] = $this->post("google_long");
		$Idata["phone"] = $this->post("phone");
		$Idata["other_phone"] = ($this->post("other_phone")) ? $this->post("other_phone") : "--";
		$Idata["payment"] = $this->post("payment");
		$Idata["desc"] = ($this->post("desc")) ? $this->post("desc") : "--";
		$Idata["price"] = $this->post("price");
		$Idata["num_times"] = $this->post("num_times");
		$Idata["num_patients"] = $this->post("num_patients");
		$Idata["coupon_discount"] = $this->post("coupon_discount");
		$Idata["coupon_id"] = $this->post("coupon_id");
		$this->load->model('Order_model');
		$order_id = $this->Order_model->insert($Idata);
		$Idata["order_id"] = $order_id;
		//------------------------------------
		$providers = $this->Order_model->sendOrderToProviders($Idata);
		//------------------------------------
		if($this->post("coupon_id")){
			$this->load->model('Coupon_model');
			$couponObj = $this->Coupon_model->get($this->post("coupon_id"));
			if (isset($couponObj->id)) {
				$this->load->model('Coupon_users_model');
				$this->Coupon_users_model->insert([
					"user_id" => $user->user_id,
					"type" => $couponObj->type,
					"value" => $couponObj->value,
					"coupon_id" => $couponObj->id,
				]);
			}
		}
		//------------------------------------
		if ($providers["status"] == true) {
			$json = ["data" => " sucess order id = " . $order_id,
				"id" => $order_id,
				"payment_link" => base_url() . "buy/" . $order_id,
				"sucess_link" => base_url() . 'paypal/success',
				"error_link" => base_url() . 'paypal/cancel',
				"note" => $providers["not"]
			];
			return $this->set_response($json, parent::HTTP_OK);// CREATED
		}
		//---------------------------------------
		$json = ["data" => " sucess order id = " . $order_id,
			"id" => $order_id,
			"note" => "there are no providers ",
			"payment_link" => base_url() . "buy/" . $order_id,
			"sucess_link" => base_url() . 'paypal/success',
			"error_link" => base_url() . 'paypal/cancel'
		];
		return $this->set_response($json, parent::HTTP_CONFLICT);// CREATED
		//---------------------------------------
	}


	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */

	public function notifications_get()
	{
		$validAuth = $this->verifyRequest();
		$user = $validAuth->msg;
		$code = $validAuth->code;
		if ($validAuth->status == false) {
			$this->set_response(['data' => $user], $code);
		} else {
			$header = $this->validateHeader();
			if ($header->status == false) {
				$this->validResponse($this->msg_header);
			} else {
				$this->load->model('Notifications_model');
				$page = (($this->get('page'))) ? $this->get('page') - 1 : 0;
				$limitPerPage = (($this->get('limit_per_page'))) ? $this->get('limit_per_page') : 20;
				$where = ["to_user_id" => $user->user_id];
				if ($user->user_type == 1) {
					$InArray = [ADMIN_USER, USER_USER, PROVIDER_USER];
				} elseif ($user->user_type == 2) {
					$InArray = [ADMIN_PROVIDER, USER_PROVIDER, PROVIDER_PROVIDER];
				}
				//--------------------
				$total = $this->Model_web_service
					->getRecordCount("notification_type", "notifications", $where, $InArray, 'notification_type');
				$lastPage = ceil($total / $limitPerPage);
				$currentPage = ($page == 0) ? 1 : $this->get('page');
				$json["meta"] = ["current_page" => (int)$currentPage, "last_page" => $lastPage, "total" => $total];
				//--------------------
				$json["data"] = $this->Notifications_model
					->with('from_user')->trans($header->lang)->limit($limitPerPage, $limitPerPage * $page)
					->order_by("notification_id", "DESC")->get_many_by_in($where, 'notification_type', $InArray);
				$this->okResponse($json);
			} // LANG
		} // USER
	}


	public function countNotifications_get()
	{
		$validAuth = $this->verifyRequest();
		$user = $validAuth->msg;
		$code = $validAuth->code;
		if ($validAuth->status == false) {
			$this->set_response(['data' => $user], $code);
		} else {
			$this->load->model('Notifications_model');
			$json["unread_counter"] = $this->Notifications_model->count_by(["is_read" => 0, "to_user_id" => $user->user_id]);
			$this->okResponse($json);
		} // USER
	}

	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */

	public function acceptOrder_post()
	{
		$validAuth = $this->verifyRequest();
		$user = $validAuth->msg;
		$code = $validAuth->code;
		if ($validAuth->status == false) {
			$this->set_response(['data' => $user], $code);
		} else {
			$header = $this->validateHeader();
			if ($header->status == false) {
				$this->validResponse($this->msg_header);
			} else {
				$this->form_validation->set_rules('process_id_fk', '', "required|numeric|valid_order_id");
				$this->form_validation->set_rules('notification_id', '', "required|numeric|valid_notification_id");
				$this->form_validation->set_rules('from_user_id', '', "required|numeric|valid_user_id");
				if ($this->form_validation->run() == FALSE) {
					$this->validResponse();
				} else {
					$this->load->model('Order_model');
					$order_id = $this->post('process_id_fk');
					$note_id = $this->post('notification_id');
					$from = $this->post('from_user_id');
					$Udata["order_status"] = ORDER_ACCEPT;
					$Udata["provider_id"] = $user->user_id;
					$this->Order_model->update($order_id, $Udata);

					$this->load->model('Notifications_model');
					$providers = $this->Notifications_model->get_ids_by("to_user_id", ["from_user_id" => $from, "process_id_fk" => $order_id]);
					$this->Notifications_model->delete_by(
						["from_user_id" => $from, "process_id_fk" => $order_id, "action_type" => ACTION_ACCEPT_REFUSE]
					);
					//----------------------------
					//  FIRE BASE NOTE TO PROVIDER WITH REFRESH NOTIFICATIONS AND TO CLIENT ORDER ACCEPT
					$not_1 = refrshNot($providers);
					$not_2 = orderAccepted($user->user_id, [$from], $order_id);
					//----------------------------
					$this->okResponse(["msg" => 'success accept'/*,"not_1"=>$not_1,"not_2"=>$not_2*/]);
				} // valid
			}// lang
		} // auth
	}

	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */

	public function refuseOrder_post()
	{
		$validAuth = $this->verifyRequest();
		$user = $validAuth->msg;
		$code = $validAuth->code;
		if ($validAuth->status == false) {
			$this->set_response(['data' => $user], $code);
		} else {
			$header = $this->validateHeader();
			if ($header->status == false) {
				$this->validResponse($this->msg_header);
			} else {
				$this->form_validation->set_rules('process_id_fk', '', "required|numeric|valid_order_id");
				$this->form_validation->set_rules('notification_id', '', "required|numeric|valid_notification_id");
				$this->form_validation->set_rules('from_user_id', '', "required|numeric|valid_user_id");
				if ($this->form_validation->run() == FALSE) {
					$this->validResponse();
				} else {
					$order_id = $this->post('process_id_fk');
					$note_id = $this->post('notification_id');
					$from = $this->post('from_user_id');

					$this->load->model('Notifications_model');
					$this->Notifications_model->delete($note_id);
					$providers = $this->Notifications_model->count_by(
						["from_user_id" => $from, "process_id_fk" => $order_id, "action_type" => ACTION_ACCEPT_REFUSE]
					);

					if ($providers <= 0) {
						$this->load->model('Order_model');
						$Udata["order_status"] = ORDER_BLOCKED;
						$this->Order_model->update($order_id, $Udata);
						//----------------------------
						//  FIRE BASE NOTE TO CLIENT  ORDER BLOCKED NO PROVIDER ACCEPT ORDER
						$not = orderBlocked($user->user_id, [$from], $order_id);
						//----------------------------
					}
					$this->okResponse(["msg" => 'success refuse']);
				} // valid
			}// lang
		} // auth
	}


	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */

	public function clintOrders_get()
	{
		$validAuth = $this->verifyRequest();
		$user = $validAuth->msg;
		$code = $validAuth->code;
		if ($validAuth->status == false) {
			$this->set_response(['data' => $user], $code);
		} else {
			$header = $this->validateHeader();
			if ($header->status == false) {
				$this->validResponse($this->msg_header);
			} else {
				if ($user->user_type == 1) {
					$type = $this->get("type");
					if (isset($type) && in_array($type, ["pending", 'accepted', 'previous'])) {
						$this->load->model('Order_model');
						$where = ["user_id" => $user->user_id];
						switch ($type) {
							case "pending":
								$where["order_status"] = ORDER_START;
								break;
							case 'accepted':
								$where["order_status"] = ORDER_ACCEPT;
								break;
							case 'previous':
								$where["order_status >="] = ORDER_END;
								$where["order_status <="] = ORDER_END_ALL;
								break;
						}
						//--------------------
						$page = (($this->get('page'))) ? $this->get('page') - 1 : 0;
						$limitPerPage = (($this->get('limit_per_page'))) ? $this->get('limit_per_page') : 20;
						$total = $this->Model_web_service->getRecordCount("order_status", "all_orders", $where);
						$lastPage = ceil($total / $limitPerPage);
						$currentPage = ($page == 0) ? 1 : $this->get('page');
						$json["meta"] = ["current_page" => (int)$currentPage, "last_page" => $lastPage, "total" => $total];
						//--------------------
						$json["data"] = $this->Order_model->with_meny(["client", "provider"])
							->trans($header->lang)->limit($limitPerPage, $limitPerPage * $page)
							->order_by("order_id","DESC")->get_many_by($where);
						$this->okResponse($json);
					} else {
						$this->validResponse(["msg" => 'type is required and in list [ pending ,accepted , previous]']);
					} // get
				} else {
					$this->validResponse(["msg" => 'user not exist']);
				} // user type
			} // lang
		} //  auth
	}


	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */

	public function providerOrders_get()
	{
		$validAuth = $this->verifyRequest();
		$user = $validAuth->msg;
		$code = $validAuth->code;
		if ($validAuth->status == false) {
			$this->set_response(['data' => $user], $code);
		} else {
			$header = $this->validateHeader();
			if ($header->status == false) {
				$this->validResponse($this->msg_header);
			} else {
				if ($user->user_type == 2) {
					$type = $this->get("type");
					if (isset($type) && in_array($type, ['accepted', 'previous'])) {
						$this->load->model('Order_model');
						$where = ["provider_id" => $user->user_id];
						switch ($type) {
							case 'accepted':
								$where["order_status"] = ORDER_ACCEPT;
								break;
							case 'previous':
								$where["order_status >="] = ORDER_END;
								$where["order_status <="] = ORDER_END_ALL;
								break;
						}
						//--------------------
						$page = (($this->get('page'))) ? $this->get('page') - 1 : 0;
						$limitPerPage = (($this->get('limit_per_page'))) ? $this->get('limit_per_page') : 20;
						$total = $this->Model_web_service->getRecordCount("order_status", "all_orders", $where);
						$lastPage = ceil($total / $limitPerPage);
						$currentPage = ($page == 0) ? 1 : $this->get('page');
						$json["meta"] = ["current_page" => (int)$currentPage, "last_page" => $lastPage, "total" => $total];
						//--------------------
						$json["data"] = $this->Order_model->with_meny(["client", "provider", "service"])
							->trans($header->lang)->limit($limitPerPage, $limitPerPage * $page)
							->get_many_by($where);
						$this->okResponse($json);
					} else {
						$this->validResponse(["msg" => 'type is required and in list [ accepted , previous]']);
					}// get
				} else {
					$this->validResponse(["msg" => 'user not exist']);
				} // user type
			} // lang
		} //  auth
	}

	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */
	public function getOrder_get()
	{
		$validAuth = $this->verifyRequest();
		$user = $validAuth->msg;
		$code = $validAuth->code;
		if ($validAuth->status == false) {
			$this->set_response(['data' => $user], $code);
		} else {
			$header = $this->validateHeader();
			if ($header->status == false) {
				$this->validResponse($this->msg_header);
			} else {
				$this->load->model('Order_model');
				$id = $this->get("order_id");
				$json["order"] = $this->Order_model->with_meny(["client", "provider", "service"])
					->trans($header->lang)->get($id);
				if (!empty($json["order"]) && $json["order"] != null) {
					$this->okResponse($json);
				} else {
					$this->validResponse(['error' => "order_id not found "]);
				}
			}// end lang
		} // end auth
	}

	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */
	public function cancelOrder_post()
	{
		$validAuth = $this->verifyRequest();
		$user = $validAuth->msg;
		$code = $validAuth->code;
		if ($validAuth->status == false) {
			return $this->set_response(['data' => $user], $code);
		}
		//==================================
		$header = $this->validateHeader();
		if ($header->status == false) {
			return $this->validResponse($this->msg_header);
		}
		//==================================
		$this->form_validation->set_rules('order_id', '', "required|numeric|valid_order_id");
		if ($this->form_validation->run() == FALSE) {
			return $this->validResponse();
		}
		//==================================
		$order_id = $this->post("order_id");
		$from = $user->user_id;
		$this->load->model('Order_model');
		$this->load->model('Notifications_model');
		$order = $this->Order_model->get($order_id);
		if ($user->user_type == 1) {
			if ($order->order_status == ORDER_START || $order->order_status == ORDER_BLOCKED) {
				$providers = $this->Notifications_model->get_ids_by('to_user_id', ["process_id_fk" => $order_id]);
				$this->Notifications_model->soft_delete = false;
				$this->Notifications_model->delete_by(["process_id_fk" => $order_id]);
				$this->Order_model->soft_delete = false;
				$this->Order_model->delete($order_id);
				//----------------------------
				//  FIRE BASE NOTE TO PROVIDER WITH REFRESH NOTIFICATIONS AS CLIENT CANCEL THE ORDER IN PENDDIG CASE
				$not = orderCancelInStart($user->user_id, $providers, $order_id);
				//----------------------------
			} elseif ($order->order_status == ORDER_ACCEPT) {
				$providers = [$order->provider_id];
				$this->Order_model->update($order_id, ['order_status' => ORDER_CANCEL]);
				//----------------------------
				//  FIRE BASE NOTE TO PROVIDER WITH REFRESH NOTIFICATIONS AS CLIENT CANCEL THE ORDER IN ORDER_ACCEPT CASE
				$not = orderCancelInStart($user->user_id, $providers, $order_id);
				//----------------------------
			}
		} //--------- other type provider -----------------------------
		elseif ($user->user_type == 2) {
			if ($order->order_status == ORDER_ACCEPT) {
				$client = $order->user_id;
				$this->Order_model->update($order_id, ['order_status' => ORDER_DELETE]);
				//----------------------------
				//  FIRE BASE NOTE TO ClINT ORDER CANCEL FROM PROVIDER
				$not = orderCancelProvider($user->user_id, [$client], $order_id);
				//----------------------------
			}
		}
		$this->okResponse(["msg" => "success delete "]);
		//==================================
	}

	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */

	public function providerEndOrder_post()
	{
		$validAuth = $this->verifyRequest();
		$user = $validAuth->msg;
		$code = $validAuth->code;
		if ($validAuth->status == false) {
			return $this->set_response(['data' => $user], $code);
		}
		//-------------
		$header = $this->validateHeader();
		if ($header->status == false) {
			return $this->validResponse($this->msg_header);
		}
		//-------------
		$this->form_validation->set_rules('order_id', '', "required|numeric|valid_order_id");
		$this->form_validation->set_rules('rate_num', '', "required");
		if ($this->form_validation->run() == FALSE) {
			return $this->validResponse();
		}
		//-------------
		$order_id = $this->post("order_id");
		$from = $user->user_id;
		$this->load->model('Order_model');
		$this->load->model('Notifications_model');
		$this->load->model('Ratings_model');
		$order = $this->Order_model->get($order_id);
		$updateOrder =   [
			"commission_app"=>($order->price * ( 1 - COMMISSIONS_APP)),
			"commission_provider" =>($order->price * COMMISSIONS_APP),
			'order_status' => ORDER_END
		];
		$this->Order_model->update($order_id,$updateOrder);
		//---------------------------
		$note['process_id_fk'] = $order_id;
		$note['from_user_id'] = $user->user_id;
		$note['to_user_id'] = $order->user_id;
		$note['notification_type'] = PROVIDER_USER;
		$note['action_type'] = ACTION_RATE_PROVIDER;
		$note['notification_msg_id'] = RATE_PROVIDER;
		$this->Notifications_model->insert($note);
		//----------------------------
		$rate["order_id"] = $order_id;
		$rate["from_id"] = $user->user_id;
		$rate["to_id"] = $order->user_id;
		$rate["rate_num"] = $this->post('rate_num');
		$rate["rate_comment"] = $this->post('rate_comment');
		$this->Ratings_model->insert($rate);
		//$this->Model_web_service->upadeteRate();
		//---------------------------
		//  FIRE BASE NOTE TO CLINT RATE PROVIDER
		$not = rateProvider($from, [$order->user_id], $order_id);
		//----------------------------
		return $this->okResponse(["msg" => "success end  "]);
		//-------------
	}

	/**
	 *  ==========================================================================
	 *
	 *  ---------------------------------      -----------------------------------
	 *
	 *  ==========================================================================
	 */

	public function clientEndOrder_post()
	{
		$validAuth = $this->verifyRequest();
		$user = $validAuth->msg;
		$code = $validAuth->code;
		if ($validAuth->status == false) {
			return $this->set_response(['data' => $user], $code);
		}
		//--------------------
		$header = $this->validateHeader();
		if ($header->status == false) {
			return $this->validResponse($this->msg_header);
		}
		//--------------------
		$this->form_validation->set_rules('from_user_id', '', "required|numeric|valid_user_id");
		$this->form_validation->set_rules('process_id_fk', '', "required|numeric|valid_order_id");
		$this->form_validation->set_rules('notification_id', '', "required|numeric|valid_notification_id");
		$this->form_validation->set_rules('rate_num', '', "required");
		//$this->form_validation->set_rules('rate_comment', '', "");
		if ($this->form_validation->run() == FALSE) {
			return $this->validResponse();
		}
		//--------------------
		$order_id = $this->post("process_id_fk");
		$notification_id = $this->post("notification_id");
		$to = $this->post("from_user_id");
		$from = $user->user_id;
		$this->load->model('Order_model');
		$this->load->model('Notifications_model');
		$this->load->model('Ratings_model');
		$order = $this->Order_model->get($order_id);
		$this->Order_model->update($order_id, ['order_status' => ORDER_END_ALL]);
		$this->Model_web_service->upadeteRate($to, $this->post('rate_num'));
		$this->Notifications_model->delete($notification_id);
		//---------------------------
		$rate["order_id"] = $order_id;
		$rate["from_id"] = $from;
		$rate["to_id"] = $to;
		$rate["rate_num"] = $this->post('rate_num');
		$rate["rate_comment"] = $this->post('rate_comment');
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
		$this->addAccounts($order);
		$this->setUaersCom($order);
		//----------------------------
		//  FIRE BASE NOTE TO PROVIDER HAVE RATER
		$not = haveRating($from, [$to], $order_id);
		//----------------------------
		return $this->okResponse(["msg" => "success end  "]);
		//--------------------
	}

	private function addAccounts($order)
	{
		$this->load->model('Accounts_model');
		$acc["user_id"] = $order->provider_id;
		if ($order->payment == "1") {
			$acc["company"] = ($order->price - $order->commission_provider);
			$acc["provider"] = 0;
			$acc["content"] = "  عمولة التطبيق من الطلب رقم :" . $order->order_id;
			$acc['type'] = 'order_to_company';
		} else {
			$acc["company"] = 0;
			$acc["provider"] = $order->commission_provider;
			$acc["content"] = "  عمولة مقدم الخدمة من الطلب رقم :" . $order->order_id;
			$acc['type'] = 'order_to_provider';
		}
		$acc['date'] =strtotime(date("Y-m-d")) ;
		$acc['order_id'] = $order->order_id;
		$acc['created_by'] = $order->provider_id;
		$acc['created_at'] = time();
		$this->Accounts_model->insert($acc);

	}

	private function setUaersCom($order){
		$this->load->model('Registrations_model');
		$provider = $this->Registrations_model->get($order->provider_id);
		$advertiser = $this->Registrations_model->get_by(["user_code" => $provider->advertiser_code]);
		if (!empty($advertiser)) {
			$this->load->model('Commissions_model');
			$commission["order_id"] = $order->order_id;
			$commission["order_type"] = "doctor";
			$commission["to_user"] = $advertiser->user_id;//$commission['to_user'];
			$commission["from_user"] = $order->user_id;
			$commission["value"] = $order->price * COMMISSIONS_ORDERS;
			$this->Commissions_model->insert($commission);
			//-----------------------------
			$accCom["user_id"] = $advertiser->user_id;
			$accCom["company"] = 0;
			$accCom["provider"] = $order->price * COMMISSIONS_ORDERS;
			$accCom["content"] = "  عمولة ١٪؜  من الطلب رقم :" . $order->order_id;
			$accCom['type'] = 'order_to_provider';
			$accCom['date'] =strtotime(date("Y-m-d")) ;
			$accCom['order_id'] = $order->order_id;
			$accCom['created_by'] = $order->provider_id;
			$accCom['created_at'] = time();
			$this->Accounts_model->insert($accCom);
			//-----------------------------
		}
		//========================================================================
		$user = $this->Registrations_model->get($order->user_id);
		$advertiser = $this->Registrations_model->get_by(["user_code" => $user->advertiser_code]);
		if (!empty($advertiser)) {
			$accCom["user_id"] = $advertiser->user_id;
			$accCom["company"] = 0;
			$accCom["provider"] = $order->price * COMMISSIONS_ORDERS;
			$accCom["content"] = "  عمولة عميل ١٪؜  من الطلب رقم :" . $order->order_id;
			$accCom['type'] = 'order_to_user';
			$accCom['date'] =strtotime(date("Y-m-d")) ;
			$accCom['order_id'] = $order->order_id;
			$accCom['created_by'] = $order->provider_id;
			$accCom['created_at'] = time();
			$this->Accounts_model->insert($accCom);
			//-----------------------------
		}
	}

	private function setAnnouncer($order){
		$this->load->model('Announcer_model');
		$this->load->model('Announcer_accounts_model');
		$user = $this->Registrations_model->get($order->user_id);
		$advertiser = $this->Announcer_model->get_by(["code" => $user->advertiser_code]);
		if (!empty($advertiser)) {
			$accCom["user_id"] = $order->user_id;
			$accCom["announcer_id"] = $advertiser->id;
			$accCom["value"] = ( $order->price * $advertiser->commission ) / 100 ;
			$accCom["content"] = "  عمولة تسويف ".$advertiser->commission."٪؜  من الطلب رقم :" . $order->order_id;
			$accCom['type'] = 'commission';
			$accCom['date'] =strtotime(date("Y-m-d")) ;
			$accCom['order_id'] = $order->order_id;
			$accCom['created_by'] = $order->user_id;
			$accCom['created_at'] = time();
			$this->Announcer_accounts_model->insert($accCom);
			//-----------------------------
		}
	}



	public function coupon_post(){
		/*$validAuth = $this->verifyRequest();
		$user = $validAuth->msg;
		$code = $validAuth->code;
		if ($validAuth->status == false) {
			return $this->set_response(['data' => $user], $code);
		}
		*/
		//--------------------
		$this->form_validation->set_rules('user_id', '', "required|numeric|valid_user_id");
		$this->form_validation->set_rules('code', '', "required");
		if ($this->form_validation->run() == FALSE) {
			return $this->validResponse();
		}
		//--------------------
		$this->load->model('Coupon_model');
		$this->load->model('Coupon_users_model');
        $findCode = $this->Coupon_model->get_by(["code"=>$this->post('code')]);
        if(!empty($findCode) &&  $findCode!= null){
          if($findCode->from_date <= time() && time() <= $findCode->to_date ){
			  $user = $this->Coupon_users_model->get_by(["coupon_id"=>$findCode->id,"user_id"=>$this->post("user_id")]);
			  if (!empty($user) && $user != null) {
				  return $this->okResponse(["msg" => "used before", "data" => null, "code" => 407]);
			  }
			  return $this->okResponse(["msg" => "success end", "data" => $findCode, "code" => 200]);
		  }
			return $this->okResponse(["msg" => "code expired","data"=>null,"code"=>406]);
		}
		return $this->okResponse(["msg" => "code not found","data"=>null,"code"=>404]);
	}

} // END CLASS
?>
