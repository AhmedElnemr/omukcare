<?php
/**
 * Created by PhpStorm.
 * User: win 7
 * Date: 11/3/2019
 * Time: 9:49 PM
 */
function setHtml($type,$name,$value,$valid){
    $out = '';
    $isValid = ($valid == true)? 'data-validation="required"':'';
    switch ($type) {
        case "text":
            $out = '<input type="text" name="Pdata['.$name.']" value="'.$value.'" class="form-control m-input "  '.$isValid.'>';
            break;
        case "tag":
            $out = '<input type="text" name="Pdata['.$name.']" value="'.$value.'" class="form-control m-input "  '.$isValid.'>';
            break;
        case "area":
            $out = '<textarea name="Pdata['.$name.']" class="form-control" data-provide="markdown"
                          rows="10" '.$isValid.'>'.$value.'</textarea>';
            break;
        case "img":
            $out = '<input type="file" id="input-file-now-custom-1" name="'.$name.'" class="dropify" '.$isValid.'
                           data-default-file="'.base_url() . IMAGEPATH .$value.'"/>';
            break;
        case "social":
            $out = '<div class="input-group m-input-group">
						<div class="input-group-prepend">
						 <span class="input-group-text">@</span>
						</div>
						<input type="text" name="Pdata['.$name.']" value="'.$value.'" class="form-control m-input" '.$isValid.'  
						  aria-describedby="basic-addon1">
												</div>';
            break;
        default:
    }
    return $out;
}

/**
 *  ============================================================
 *
 *  ------------------------------------------------------------
 *
 *  ============================================================
 */
/*
    if(isset($types)){
    echo   makeSelect('Pdata[type]',$types , 'id_definition' ,'ar_title',$out["type"]);
    }
    else{
     echo   makeSelect('Pdata[type]',[] , 'id_definition' ,'ar_title',$out["type"]);
    }
 *
 */
function makeSelect($post , $data ,$value ,$text ,$search ,$valid = true){

    $requ = ($valid == true)? 'data-validation="required" aria-required="true"':"";
    $out  ='<select name="'.$post.'" class="form-control m-input" '.$requ.' >';
    $out .= ' <option value="">اختر </option>';
    if(!empty($data)){
        foreach ($data as $row):
            $sel = ($row->$value == $search)? "selected":"";
            $out .= ' <option value="'.$row->$value.'" '.$sel.'>'.$row->$text.' </option>';
        endforeach;
    }
    else{
        $out .= ' <option value="">لا يوجد بيانات  </option>';
    }
    $out .= '</select>';
    return $out ;
}