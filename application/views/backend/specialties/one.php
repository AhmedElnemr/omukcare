<?php if($op == 'UPDTATE' ):
    $out['input']='UPDTATE';
    $out['input_title']='تعديل ';
else:
    $out['input']='INSERT';
    $out['input_title']='حفظ ';
endif?>

<?=form_open_multipart($form,["class"=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']);?>
<div class="m-portlet__body">
    <div class="form-group m-form__group row">
        <div class="col-lg-6">
            <label class="">الخدمة    :</label>
            <select name="Tdata[service_id]" class="form-control m-input" data-validation="required" aria-required="true">
                <option value="">اختر </option>
             <?php
             if(isset($service) &&  !empty($service)){
                 foreach ($service as $row):
                     $sel = ($row->service_id == $out['service_id'])? "selected":"";
                     echo ' <option value="'.$row->service_id.'" '.$sel.'>'.$row->words->title.' </option>';
                 endforeach;
             }
             else{
                 echo ' <option value="">لا يوجد بيانات  </option>';
             }
             ?>
            </select>
        </div>

    </div>
    <div class="form-group m-form__group row">
        <div class="col-lg-4">
            <label>اسم التخصص  (ar):</label>
            <input type="text" name="Pdata[ar][title]" value="<?= $out["ar"]["title"] ?>"
                   class="form-control m-input"
                   data-validation="required">
        </div>
        <div class="col-lg-4">
            <label>اسم التخصص  (en):</label>
            <input type="text" name="Pdata[en][title]" value="<?= $out["en"]["title"] ?>"
                   class="form-control m-input"
                   data-validation="required">
        </div>
        <div class="col-lg-4">
            <label>اسم التخصص  (es):</label>
            <input type="text" name="Pdata[es][title]" value="<?= $out["es"]["title"] ?>"
                   class="form-control m-input"
                   data-validation="required">
        </div>
    </div>

    <!--<div class="form-group m-form__group row">
        <div class="col-lg-4">
            <label>تفاصيل التخصص  (ar):</label>
            <textarea name="Pdata[ar][content]" class="form-control" rows="5" data-validation="required">
                <?/*= $out["ar"]["content"] */?>
            </textarea>
        </div>
        <div class="col-lg-4">
            <label>تفاصيل التخصص  (en):</label>
            <textarea name="Pdata[en][content]" class="form-control" rows="5" data-validation="required">
                <?/*= $out["en"]["content"] */?>
            </textarea>
        </div>
        <div class="col-lg-4">
            <label>تفاصيل التخصص  (es):</label>
            <textarea name="Pdata[es][content]" class="form-control" rows="5" data-validation="required">
                <?/*= $out["es"]["content"] */?>
            </textarea>
        </div>
    </div>-->

</div>

<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
    <div class="m-form__actions m-form__actions--solid">
        <div class="row">
            <div class="col-lg-6">
                <button type="submit" name="<?= $out['input']?>" value="<?= $out['input']?>"
                        class="btn btn-primary">
                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?= $out['input_title']?>
                </button>
                <!--     <button type="reset" class="btn btn-secondary">Cancel</button>-->
            </div>
            <div class="col-lg-6 m--align-right">
                <!--  <button type="reset" class="btn btn-danger">Delete</button>-->
            </div>
        </div>
    </div>
</div>
<?= form_close()?>



