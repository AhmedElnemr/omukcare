<?php
function calculate_from_time($time_from)
{
    $year = date('Y');
    $prev_month = date('m') - 1;
    if ($prev_month == 0) {
        $prev_month = 12;
        $year = $year - 1;
    }
    $prev_month_days = cal_days_in_month(CAL_GREGORIAN, $prev_month, $year);
    $result = 0;
    $dif = abs(time() - $time_from);
    //--------------------------------------
    $result = date("d/m/Y", $time_from);
    if ($dif < (60 * 60 * 24 * $prev_month_days)) {
        $result = lang("since")." : " . ceil($dif / (60 * 60 * 24)) ." ". lang('days');
    }
    if ($dif < (60 * 60 * 24)) {
        $result = lang("since")." : " . ceil($dif / (60 * 60)) ." ". lang('hours');
    }
    if ($dif < (60 * 60)) {
        $result = lang("since")." : " . ceil($dif / 60) ." ". lang('minuts');
    }
    if ($dif < 60) {
        $result = lang("since")." : " . $dif ." ". lang('second');
    }
    //-------------------------------------- 
    return $result;
}

//==========================================================================
function getLocalize(){
	$CI =&get_instance();
    $headers = $CI->input->request_headers();
	$get = $CI->input->get();
	$lang = $CI->uri->segment(1);
	$cookeLang  = $CI->input->cookie('last_lang');
	$lagArr = ["ar", "en","es"];
	if (array_key_exists("lang", $headers) &&  in_array($headers['lang'], $lagArr))
	{
		return $headers['lang'];
	}
	elseif (array_key_exists("device-lang", $headers) && in_array($headers['device-lang'],$lagArr ))
	{
		return $headers['device-lang'];
	}
	elseif(in_array($lang,$lagArr)){
		return  $lang ;
	}
	elseif(isset($get['lang'])){
		return $get['lang'];
	}
	elseif(isset($GLOBALS['globalLang'])){
		return $GLOBALS['globalLang'];
	}
	elseif(isset($cookeLang)){
		return $cookeLang;
	}
	else {
		return LOCAL_LANG;
	}
    //================================================
    /*if (array_key_exists("lang",$headers)
        && !empty($headers['lang'])
        && in_array($headers['lang'],array("ar","en","es") )
    ) {
        return  $headers['lang'] ;
    }
    else{
        $lang = $CI->uri->segment(1);
        if(in_array($lang,array("ar","en","es"))){
            return  $lang ;
        }
        else{
            $cookeLang  = $CI->input->cookie('last_lang');
            if(isset($cookeLang)){
                return $cookeLang;
            }
            else{
              return  LOCAL_LANG;
            }
        }
    }*/
}
//==========================================================================
function generateRandomString($length = 10)
{
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}
//==========================================================================
function getPhone($fullNumber){
	$code = "";
	$fullNumber = str_replace("0020","",$fullNumber);
	$fullNumber = str_replace("+20","",$fullNumber);
	$code = "0020";
	/*$fullNumber = str_replace("00966","",$fullNumber);
	$fullNumber = str_replace("+966","",$fullNumber);
	$code = "00966";*/
	return ["number"=>$fullNumber,"code"=>$code];
}
function tt($data){
	echo "<pre>";
	print_r($data);
	echo "</pre>";
	die;
}
function tt_r($data){
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}
function tt_j($data = []){
	header('Content-Type: application/json');
	echo json_encode($data);
	die;

}

//==========================================================================
function setPass($pass){
    // $CI =& get_instance();
   return  sha1(md5($pass));
  // return  password_hash($pass, PASSWORD_BCRYPT);
}
//==========================================================================
function multi_dimention_array_sort($my_array, $key, $sort_type)
{
    $sortArray = array();
    foreach ($my_array as $person) {
        foreach ($person as $key => $value) {
            if (!isset($sortArray[$key])) {
                $sortArray[$key] = array();
            }
            $sortArray[$key][] = $value;
        }
    }
    $orderby = $key; //change this to whatever key you want from the array   SORT_ASC   SORT_DESC
    if ($sort_type == "DESC") {
        array_multisort($sortArray[$orderby], SORT_DESC, $my_array);
    } else {
        array_multisort($sortArray[$orderby], SORT_ASC, $my_array);
    }
    return $my_array;
}
//==========================================================================
//==========================================================================
function array_from_to($start, $end, $my_array)
{
    $from_to = array();
    if ($end > sizeof($my_array)) {
        $end = sizeof($my_array);
    }
    for ($x = $start; $x < $end; $x++) {
        $from_to[] = $my_array[$x];
    }
    return $from_to;
}

//==========================================================================
function validateLatitude($lat) {
    return preg_match('/^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,6})?))$/', $lat);
}
/**
 * Validates a given longitude $long
 *
 * @param float|int|string $long Longitude
 * @return bool `true` if $long is valid, `false` if not
 */
function validateLongitude($long) {
    return preg_match('/^(\+|-)?(?:180(?:(?:\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,6})?))$/', $long);
}
//==========================================================================
function google_distance($lat1, $lon1, $lat2, $lon2, $unit)
{
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);
    if ($unit == "K") {       //  Kilometers
        return sprintf("%.2f",$miles * 1.609344,2);
    } else if ($unit == "N") {     //  Nautical Miles
        return sprintf("%.2f",$miles * 0.8684 ,2);
    } else {    // Miles
        return sprintf("%.2f",$miles,2);
    }
}

//===========================================================================
function array_sort_by_column(&$arr, $col, $dir = SORT_ASC)
{
    $sort_col = array();
    foreach ($arr as $key => $row) {
        $sort_col[$key] = $row->{$col};
    }

    array_multisort($sort_col, $dir, $arr);
}

//===========================================================================
function limit_array($arr, $limit)
{
    $sort_col = array();
    $x = 0;
    foreach ($arr as $row) {
        if ($x == $limit) {
            break;
        } else {
            $sort_col[] = $row;
            $x++;
        }
    }
    return $sort_col;
}

/*
function GetDrivingDistance($lat1, $lat2, $long1, $long2)
{
    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat1.",".$long1."&destinations=".$lat2.",".$long2."&mode=driving&language=pl-PL";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    $response_a = json_decode($response, true);
    $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
    $time = $response_a['rows'][0]['elements'][0]['duration']['text'];
    //return array('distance' => $dist, 'time' => $time);
     return  $dist;
}*/
//==========================================================================
function thumb($data, $folder)
{
    $CI =& get_instance();
    $config['image_library'] = 'gd2';
    $config['source_image'] = $data['full_path'];
    $config['new_image'] = 'uploads/' . $folder . '/thumbs/' . $data['file_name'];
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['thumb_marker'] = '';
    $config['width'] = 275;
    $config['height'] = 250;
    $CI->load->library('image_lib', $config);
    $CI->image_lib->resize();
}

function upload_file($file_name)
{
    $CI =& get_instance();
    $config['upload_path'] = 'uploads/files';
    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|
                                    MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|video/mp4|video/MP4|MP4|mp4|doc|docx|txt|rar|tar.gz|zip';
    $config['max_size'] = '1000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
    $config['overwrite'] = true;
    $config['remove_spaces'] = TRUE;
    $config['encrypt_name'] = true;
    $CI->load->library('upload', $config);
    if (!$CI->upload->do_upload($file_name)) {
        return $CI->upload->display_errors();
        // return  0;
    } else {
        $datafile = $CI->upload->data();
        return $datafile['file_name'];
    }
}

//=========================================================================    
function uploadFile($file_name, $folder_name = "images")
{  
    // uploads/images
    $CI =& get_instance();
    $config['upload_path'] = 'uploads/' . $folder_name;
    // $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|m4a|M4A|AMR|amr|
    //                             MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|video/mp4|video/MP4|MP4|mp4|doc|docx|txt|rar|tar.gz|zip';
    $config['allowed_types'] = '*';
    $config['max_size'] = '1000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
    $config['overwrite'] = true;
    $config['remove_spaces'] = TRUE;
    //   $video_name = rand(1,1450);
    //$config['file_name'] = $video_name;
    $config['encrypt_name'] = true;
    $CI->load->library('upload', $config);
    if (!$CI->upload->do_upload($file_name)) {
        //  return   $CI->upload->display_errors();
        return 0;
    } else {
        $datafile = $CI->upload->data();
        return $datafile['file_name'];
    }
}

//==========================================================================    
function upload_image($file_name, $folder = "images")
{
    $CI =& get_instance();
    $config['upload_path'] = 'uploads/' . $folder;
    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
    $config['max_size'] = '1000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
    $config['encrypt_name'] = true;
    $CI->load->library('upload', $config);
    if (!$CI->upload->do_upload($file_name)) {
        // return   $CI->upload->display_errors();
        //return "error_image.png";
        return 0;
    } else {
        $datafile = $CI->upload->data();
        thumb($datafile, $folder);
        return $datafile['file_name'];
    }
}

//===========================================================================
function base_uploder($FileName)
{
    $target_dir = "uploads/images/";
    //-------------------------------

    $file_name = $_FILES[$FileName]['name'];
    $file_size = $_FILES[$FileName]['size'];
    $file_tmp = $_FILES[$FileName]['tmp_name'];
    $file_type = $_FILES[$FileName]['type'];
    //$file_ext=strtolower(end(explode('.',$_FILES[$FileName]['name'])));
    move_uploaded_file($file_tmp, $target_dir . $file_name);
    //--------------------------------
}


//============================================================================


function upload_muli_image($input_name, $folder = "images")
{
    $filesCount = count($_FILES[$input_name]['name']);
    for ($i = 0; $i < $filesCount; $i++) {
        $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
        $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
        $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
        $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
        $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
        $all_img[] = upload_image("userFile", $folder);
    }
    return $all_img;
}

//================================================================================
function my_pagination($controller, $total_records, $limit_per_page)
{
    $CI =& get_instance();
    $CI->load->library('pagination');
    $config['base_url'] = base_url() . $controller;
    $config['total_rows'] = $total_records;
    $config['per_page'] = $limit_per_page;
    $config["uri_segment"] = 3;
    $config['num_links'] = 2;
    $config['use_page_numbers'] = TRUE;
    $config['reuse_query_string'] = TRUE;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['num_links'] = 5;
    $config['page_query_string'] = FALSE;
    $config['prev_link'] = '&lt; السابق';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'التالى &gt;';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['first_link'] = FALSE;
    $config['last_link'] = FALSE;
    $CI->pagination->initialize($config);
    return $CI->pagination->create_links();
}

//================================================================================

function clearText($text){
    $clearTxt = str_replace("\n", "", $text);
    $clearTxt = str_replace("\r", "", $clearTxt);
    $clearTxt = str_replace(" \\ ", "", $clearTxt);
    $clearTxt = str_replace(" r ", "", $clearTxt);
    $clearTxt = str_replace(" n ", "", $clearTxt);
    $clearTxt = str_replace("&nbsp;", "", $clearTxt);
    $clearTxt = strip_tags($clearTxt);
    return $clearTxt;
}


function clear_txt($t)
{
    $clearTxt = preg_replace("/(<\/?)(\w+)([^>]*>)/e", "", $t);
    $clearTxt = strip_tags($clearTxt);
    return $clearTxt;
}

function short_text($t, $num)
{
    $clearTxt = preg_replace("/(<\/?)(\w+)([^>]*>)/e", "", $t);
    $clearTxtII = strip_tags($clearTxt);
    $vireb_befor[] = "";
    $clearTxtIII = eregi_replace($vireb_befor, " ", $clearTxtII);
    $clearTxtIIII = eregi_replace("&nbsp;", " ", $clearTxtIII);
    $clearTxtIIII = eregi_replace("&raquo;", " ", $clearTxtIIII);
    $clearTxtIIII = eregi_replace("&laquo;", " ", $clearTxtIIII);
    $clearTxtIIII = eregi_replace("&rlm;", " ", $clearTxtIIII);
    $exploddescriptions = explode(" ", $clearTxtIIII);
    $short = "";
    for ($i = 0; $i < $num; $i++) {
        $short .= $exploddescriptions[$i] . " ";
    }
    return $short;
}

function Cleanertext($t)
{
    $clearTxt = preg_replace("/(<\/?)(\w+)([^>]*>)/e", "", $t);
    $clearTxtII = strip_tags($clearTxt);
    $vireb_befor[] = "";
    $clearTxtIII = eregi_replace($vireb_befor, " ", $clearTxtII);
    $clearTxtIIII = eregi_replace("&nbsp;", " ", $clearTxtIII);
    $clearTxtIIII = eregi_replace("&raquo;", " ", $clearTxtIIII);
    $clearTxtIIII = eregi_replace("&laquo;", " ", $clearTxtIIII);
    $clearTxtIIII = eregi_replace("&rlm;", " ", $clearTxtIIII);
    return $clearTxtIIII;
}

function get_arr($var){
    $arr = explode(",", $var);
    return $arr;
}

function creatGetUrl($get){
    $strings = "?";
    $x = 1;
    foreach ($get as $key => $value) {
        $addon = ($x != sizeof($get))? "&":"";
        $strings .= $key . "=".$value.$addon;
        $x++;
    }
    return $strings;
}

function get_string($arr)
{
    $strings = "";
    foreach ($arr as $key => $value) {
        $strings .= $value . ",";
    }
    return $strings;
}

function check_null($text)
{
    if (isset($text) && !empty($text) && $text != null && $text != "" && $text != false) {
        return strip_tags($text);
    } else {
        return "0";
    }
}


//================================================================================


function en_date($d)
{
    if ($d != "") {
        ///$da=date('l d F Y - h:i A', $d);
        $da = gmdate('D, d M Y H:i:s \G\M\T', $d);
    } else {
        $da = '0000-00-00';
    }
    return $da;
}

//================================================================================
function delete_file($dir, $file)
{
    if (is_file($dir . $file)) {
        unlink($dir . $file);
    }
}

//================================================================================

//================================================================================
function check_post($arr_names, $post)
{
    $data = array();
    foreach ($arr_names as $key => $value) {
        if (isset($post[$value]) && !empty($post[$value])) {
            $data[$value] = $post[$value];
        }
    }
    return $data;
}

//================================================================================
function decodeimage($post)
{
    $dir = 'uploads/images/';
    $image_base64 = base64_decode($post);
    $file = uniqid() . '.jpg';
    file_put_contents($dir . $file, $image_base64);
    return $file;
}

function restful($data)
{
    header('Content-type: application/json');
    echo json_encode($data);
}
//==========================================================================
function margeTwoArray($frist,$secound){
    if(!empty($frist) && !empty($secound) ){
        $outData = array_merge($frist,$secound);
    }elseif (!empty($frist) && empty($secound)){
        $outData = $frist;
    }elseif (empty($frist) && !empty($secound) ){
        $outData = $secound;
    }elseif (empty($frist) && empty($secound)){
        $outData = array();
    }
    return $outData;
}
//==========================================================================
function margeThreeArray($frist,$secound,$therd){
    if(!empty($frist) && !empty($secound) && !empty($therd)){
        $outData = array_merge($frist,$secound,$therd);
    }elseif (!empty($frist) && !empty($secound) && empty($therd)){
        $outData = array_merge($frist,$secound);
    }elseif (!empty($frist) && empty($secound) && !empty($therd)){
        $outData = array_merge($frist,$therd);
    }elseif (!empty($frist) && empty($secound) && empty($therd)){
        $outData = $frist;
    }elseif (empty($frist) && !empty($secound) && !empty($therd)){
        $outData = array_merge($secound,$therd);
    }elseif (empty($frist) && !empty($secound) && empty($therd)){
        $outData = $secound;
    }elseif (empty($frist) && empty($secound) && !empty($therd)){
        $outData = $therd;
    }elseif (empty($frist) && empty($secound) && empty($therd)){
        $outData = array();
    }
    return $outData;
}

function margeFourArray($frist,$secound,$therd,$fort){
    $out = margeThreeArray($frist,$secound,$therd);
    return margeTwoArray($out,$fort);
}
//==========================================================================

//================================================================================



