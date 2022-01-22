<?php
function sendGCM($tokens, $msg){
    // API access key from Google API's Console
    $fields = array
    (
        'registration_ids' => $tokens,
        'data' => $msg
    );
    $headers = array
    (
        'Authorization: key=' . FIREBASETOKEN,
        'Content-Type: application/json'
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    curl_close($ch);
    return json_decode($result);
}

function sendGCMIOS($tokens, $msg , $not ,$sound = "default"){
    // API access key from Google API's Console
    // prep the bundle
    $not['sound'] = $sound ;
    $fields = array
    (
        'registration_ids' => $tokens,
        'sound' => $sound,
        'notification'=> $not ,
        'data' => $msg
    );
    $headers = array
    (
        'Authorization: key=' . FIREBASETOKEN,
        'Content-Type: application/json'
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    curl_close($ch);
    if (is_array($result)) {
        return json_decode($result);
    }
    else {
        return (["error"=>$result,"tokens"=>$fields["registration_ids"]]);
    }
}

function sendNote($tokens, $tokensIOS ,$msg , $not ,$sound = "default"){
    $not_android = "no android tokens ";
    $not_ios = "no ios tokens ";
    if (!empty($tokens)) {
        $not_android = sendGCM($tokens ,$msg );
    }
    if (!empty($tokensIOS)) {
        $not_ios = sendGCMIOS($tokensIOS, $msg, $not,$sound);
    }
    return ["android"=>$not_android,"ios"=>$not_ios ,"data"=>$msg,"notification"=>$not];
}

function getFireBaseTokens($where_in_arr = false ,$type = false){
    $CI =&get_instance();
    $CI->db->select('phone_token');
    $CI->db->from("fire_base_tokens");
    if ($where_in_arr != false) {
        $CI->db->where_in("user_id_fk", $where_in_arr);
    }
    if ($type != false) {
        $CI->db->where("software_type", $type);
    }
    $query = $CI->db->get();
    if ($query->num_rows() > 0) {
        foreach($query->result() as $row){
            $data[]= $row->phone_token;
        }
        return $data;
    }
    return [];
}

function getById($select,$table ,$condition ){
    $CI =&get_instance();
    $CI->db->select($select);
    $CI->db->from($table);
    $CI->db->where($condition);
    $query = $CI->db->get();
    if ($query->num_rows() > 0) {
        $data = $query->row_array();
        return $data;
    }
    return false;
}

function testJson($to){
    $data = ["ids"=>$to];
    return json_encode($data);
}
/**
 *  ==========================================================================
 *
 *  -----  FIRE BASE NOTE TO PROVIDER WITH NEW ORDER
 *
 *  ==========================================================================
 */

 function newOrder($from ,$to ,$order ){
     $one = getById("name , logo , phone ","registrations",array("user_id"=>$from));
     $tokens = getFireBaseTokens($to, 2);
     $tokensIOS = getFireBaseTokens($to, 1);
     //---------------------------------
     $msg = ['from_user'=>$from ,'from_name'=>$one["name"] ,'from_image'=>$one["logo"],
             'to_many_users'=> testJson($to) ,
             'order_id'=> $order , 'notification_type' => "new_order"
         ];
     $not = ["title"=>$one["name"], "body" => 'لديك طلب جديد'];
     //---------------------------------
     return sendNote($tokens , $tokensIOS , $msg,$not);
 }
/**
 *  ==========================================================================
 *
 *  -----  FIRE BASE NOTE TO PROVIDER WITH REFRESH NOTIFICATIONS AND TO CLIENT ORDER ACCEPT
 *
 *  ==========================================================================
 */
 function refrshNot($to){
     $tokens = getFireBaseTokens($to, 2);
     $tokensIOS = getFireBaseTokens($to, 1);
     //---------------------------------
     $msg = ['to_many_users'=> testJson($to) , 'notification_type' => "refresh_note"];
     $not = ["title"=>"home care", "body" => 'تم قبول الطلب من شخص اخر'];
     //---------------------------------
     return sendNote($tokens , $tokensIOS , $msg,$not);
 }

 function orderAccepted($from ,$to ,$order){
     $one = getById("name , logo , phone ","registrations",array("user_id"=>$from));
     $tokens = getFireBaseTokens($to, 2);
     $tokensIOS = getFireBaseTokens($to, 1);
     //---------------------------------
     $msg = ['from_user'=>$from ,'from_name'=>$one["name"] ,'from_image'=>$one["logo"],
         'to_many_users'=> testJson($to) ,
         'order_id'=> $order , 'notification_type' => "order_accept"
     ];
     $not = ["title"=>$one["name"], "body" => 'تم قبول طلبك'];
     //---------------------------------
     return sendNote($tokens , $tokensIOS , $msg,$not);
 }


/**
 *  ==========================================================================
 *
 *  -----  FIRE BASE NOTE TO CLIENT  ORDER BLOCKED NO PROVIDER ACCEPT ORDER
 *
 *  ==========================================================================
 */

function orderBlocked($from ,$to ,$order){
    $one = getById("name , logo , phone ","registrations",array("user_id"=>$from));
    $tokens = getFireBaseTokens($to, 2);
    $tokensIOS = getFireBaseTokens($to, 1);
    //---------------------------------
    $msg = ['from_user'=>$from ,'from_name'=>$one["name"] ,'from_image'=>$one["logo"],
        'to_many_users'=> testJson($to) ,
        'order_id'=> $order , 'notification_type' => "order_blocked"
    ];
    $not = ["title"=>$one["name"], "body" => "تم تعليق الطلب لم يتم قبول الطلب "];
    //---------------------------------
    return sendNote($tokens , $tokensIOS , $msg,$not);
}

/**
 *  ==========================================================================
 *
 *  ----- FIRE BASE NOTE TO PROVIDER WITH REFRESH NOTIFICATIONS AS CLIENT CANCEL THE ORDER IN PENDDIG CASE
 *  ----- FIRE BASE NOTE TO PROVIDER WITH REFRESH NOTIFICATIONS AS CLIENT CANCEL THE ORDER IN ORDER_ACCEPT CASE
 *
 *  ==========================================================================
 */

function orderCancelInStart($from ,$to ,$order){
    $one = getById("name , logo , phone ","registrations",array("user_id"=>$from));
    $tokens = getFireBaseTokens($to, 2);
    $tokensIOS = getFireBaseTokens($to, 1);
    //---------------------------------
    $msg = ['from_user'=>$from ,'from_name'=>$one["name"] ,'from_image'=>$one["logo"],
        'to_many_users'=> testJson($to) ,
        'order_id'=> $order , 'notification_type' => "client_order_cancel"
    ];
    $not = ["title"=>$one["name"], "body" => "تم الغاء الطلب من العميل"];
    //---------------------------------
    return sendNote($tokens , $tokensIOS , $msg,$not);
}
/**
 *  ==========================================================================
 *
 *  -----  FIRE BASE NOTE TO ClINT ORDER CANCEL FROM PROVIDER
 *
 *  ==========================================================================
 */
function orderCancelProvider($from ,$to ,$order){
    $one = getById("name , logo , phone ","registrations",array("user_id"=>$from));
    $tokens = getFireBaseTokens($to, 2);
    $tokensIOS = getFireBaseTokens($to, 1);
    //---------------------------------
    $msg = ['from_user'=>$from ,'from_name'=>$one["name"] ,'from_image'=>$one["logo"],
        'to_many_users'=> testJson($to) ,
        'order_id'=> $order , 'notification_type' => "provider_order_cancel"
    ];
    $not = ["title"=>$one["name"], "body" => "تم الغاء الطلب من مقدم الخدمة"];
    //---------------------------------
    return sendNote($tokens , $tokensIOS , $msg,$not);
}
/**
 *  ==========================================================================
 *
 *  -----  FIRE BASE NOTE TO CLINT RATE PROVIDER
 *
 *  ==========================================================================
 */
function rateProvider($from ,$to ,$order){
    $one = getById("name , logo , phone ","registrations",array("user_id"=>$from));
    $tokens = getFireBaseTokens($to, 2);
    $tokensIOS = getFireBaseTokens($to, 1);
    //---------------------------------
    $msg = ['from_user'=>$from ,'from_name'=>$one["name"] ,'from_image'=>$one["logo"],
        'to_many_users'=> testJson($to) ,
        'order_id'=> $order , 'notification_type' => "rate_provider"
    ];
    $not = ["title"=>$one["name"], "body" => "تم انهاء الطلب قم بالتقييم"];
    //---------------------------------
    return sendNote($tokens , $tokensIOS , $msg,$not);
}

/**
 *  ==========================================================================
 *
 *  -----  FIRE BASE NOTE TO PROVIDER HAVE RATER
 *
 *  ==========================================================================
 */
function haveRating($from ,$to ,$order){
    $one = getById("name , logo , phone ","registrations",array("user_id"=>$from));
    $tokens = getFireBaseTokens($to, 2);
    $tokensIOS = getFireBaseTokens($to, 1);
    //---------------------------------
    $msg = ['from_user'=>$from ,'from_name'=>$one["name"] ,'from_image'=>$one["logo"],
        'to_many_users'=> testJson($to) ,
        'order_id'=> $order , 'notification_type' => "have_rating"
    ];
    $not = ["title"=>$one["name"], "body" => "تم التقييم"];
    //---------------------------------
    return sendNote($tokens , $tokensIOS , $msg,$not);
}



?>