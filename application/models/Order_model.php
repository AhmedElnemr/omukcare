<?php
/**
 * Created by PhpStorm.
 * User: win 7
 * Date: 11/11/2019
 * Time: 9:09 PM
 */
class Order_model extends MY_Model {
    public $_table = 'all_orders';
    public $primary_key = 'order_id';
    public $soft_delete = TRUE;

    public $belongs_to = [
        'client' => ['model' => 'Registrations_model',"primary_key"=>'user_id'],
        'provider' => ['model' => 'Registrations_model',"primary_key"=>'provider_id'],
        'sub_service' => ['model' => 'Services_model',"primary_key"=>'sub_service_id'],
		'area'=>['model' => 'Areas_trans_model',"primary_key"=>'area_id'],
    ];

    public $translate_to = [
        'service_titles' => [
			'model' => 'Services_trans_model',
			'primary_key_fild'=>'service_id_fk',
			"primary_key"=>'sub_service_id',
			"language_fild"=>"lang"
		],
    ];

    public $before_create = array( 'timestamps_in' );

    protected function timestamps_in($row)
    {
        $row['created_at'] = time();
        return $row;
    }

    /*
    public $belongs_to = [
         'activity' => array( 'model' => 'Company_activities_model',"primary_key"=>'activity_id_fk' )
         ];

    public $has_many = ['subs' => array( 'model' => 'Branchs_images_model','primary_key' => 'main_id' )];

    public $before_create = array( 'timestamps_in' );
    public $before_update = array( 'timestamps_up' );

    protected function timestamps_in($row)
    {
        $row['created_at'] = $row['updated_at'] =  date('Y-m-d H:i:s');
        return $row;
    }
    protected function timestamps_up($row)
    {
        $row['updated_at'] =  date('Y-m-d H:i:s');
        return $row;
    }



    */

    public function sendOrderToProviders($Idata){
        $this->load->helper('note');

        $this->db->select('user_id');
        $this->db->from('registrations');
        $this->db->where("user_type",2);
        $this->db->where("is_active",1);
        $this->db->where("available",1);
        $this->db->where("be_provider",1);
        $this->db->where("area_id",$Idata['area_id']);
		if (isset($Idata['specialty_id'])) {
			$this->db->where("specialty_id", $Idata['specialty_id']);
		}
		$this->db->where("deleted",0);
        if ($Idata['gender'] == 1 || $Idata['gender'] == 2 ) {
            $this->db->where("gender", $Idata['gender']);
        }
        $this->db->limit(LIMIT_PROVIDERS);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0; $users = [];
            foreach ($query->result() as $row){
                $users[] = $row->user_id ;
                $note[$i]["process_id_fk"] = $Idata["order_id"] ;
                $note[$i]["from_user_id"]  = $Idata["user_id"] ;
                $note[$i]["to_user_id"]  = $row->user_id ;
                $note[$i]["notification_type"]  = USER_PROVIDER ;
                $note[$i]["notification_msg_id"]  = NEW_ORDER ;
                $note[$i]["action_type"]  = ACTION_ACCEPT_REFUSE ;
                $i++;
            }
            $this->load->model('Notifications_model');
            $this->Notifications_model->insert_many($note);
            //---------------------------
            //  FIRE BASE NOTE TO PROVIDER WITH NEW ORDER
            $not  = newOrder($Idata["user_id"],$users,$Idata["order_id"]);
            //---------------------------
            return ["status"=>true , 'not'=>$not] ;
        }
        return ["status"=>false];
    }


	public function insertTransaction($data){
		$insert = $this->db->insert('payments',$data);
		return $insert?true:false;
	}

} // END CLASS
