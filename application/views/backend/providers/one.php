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
        <div class="col-lg-4">
            <label>الاسم :</label>
            <input type="hidden" name="Pdata[user_type]"  value="1">
            <input type="hidden" name="Pdata[phone_code]" value="0020">
            <input type="hidden" name="Pdata[soft_type]" value="4">
            <input type="hidden" name="Pdata[be_provider]" value="1">
            <input type="hidden" name="Pdata[signup_by]" value="admin">
            <input type="text" name="Pdata[name]" value="<?= $out['name'] ?>" class="form-control m-input"
                   data-validation="required">
        </div>
        <div class="col-lg-4">
            <label>الايميل :</label>
            <input type="text" name="Pdata[email]" value="<?= $out['email'] ?>" class="form-control m-input unique-field"
				   field-name="email"   data-db="registrations"
                   data-validation="email">
        </div>
		<div class="col-lg-4">

			<label class="">المنطقة  :</label>
			<select name="Pdata[area_id]" class="form-control m-input"  data-validation="required" aria-required="true">
				<option value="">اختر </option>
				<?php
				if(isset($area) &&  !empty($area)){
					foreach ($area as $row):
						$sel = ($row->area_id == $out['area_id'])? "selected":"";
						echo ' <option value="'.$row->area_id.'" '.$sel.'>'.$row->word->title.' </option>';
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
        <div class="col-lg-6">
            <label>الهاتف :</label>
            <input type="text" name="Pdata[phone]" value="<?= $out['phone'] ?>" class="form-control m-input  unique-field"
				   field-name="phone"   data-db="registrations"
                   data-validation="required">
        </div>
        <div class="col-lg-6">
            <label>النوع :</label>
            <br>
            <input type="radio" name="Pdata[gender]" value="1" <?=($out["gender"] == 1)? "checked":"";?>  data-validation="required" id=""> ذكر
            <input type="radio" name="Pdata[gender]" value="2" <?=($out["gender"] == 2)? "checked":"";?>  data-validation="required" id="">انثى
        </div>

    </div>

    <div class="form-group m-form__group row">
        <div class="col-lg-4">

            <label class="">القسم  :</label>
            <select name="Pdata[service_id]" class="form-control m-input" onchange="getSpecialization();"
					id="service_id" data-validation="required" aria-required="true">
                <option value="">اختر </option>
                <?php
                if(isset($service) &&  !empty($service)){
                    foreach ($service as $row):
                        $sel = ($row->service_id == $out['service_id'])? "selected":"";
                        echo ' <option value="'.$row->service_id.'" '.$sel.'>'.$row->trans->title.' </option>';
                    endforeach;
                }
                else{
                    echo ' <option value="">لا يوجد بيانات  </option>';
                }
                ?>
            </select>
        </div>
		<div class="col-lg-4" id="specialization"></div>
        <div class="col-lg-4">
            <label>سنوات الخبرة :</label>
            <select name="Pdata[exper]" class="form-control m-input" data-validation="required" aria-required="true">
                <option value="">اختر </option>
                <?php
                    for ($i = 1;$i <= 15 ;$i++):
                        $sel = ($i == $out['exper'])? "selected":"";
                        echo ' <option value="'.$i.'" '.$sel.'>'.$i.' </option>';
                    endfor;
                ?>
            </select>
        </div>
    </div>

    <div class="form-group m-form__group row">
        <div class="col-lg-6">
            <label>كلمة المرور </label>
            <input type="password" name="Pdata[password]" id="user_pass" onkeyup="return valid();"
                <?=($op == 'UPDTATE' )? "":'data-validation="required"'?> class="form-control  m-input ">
            <span id="validate1" class="help-block"></span>
        </div>
        <div class="col-lg-6">
            <label>تأكيد كلمة المرور</label>
            <input type="password" onkeyup="return valid2();" id="user_pass_validate"
                <?=($op == 'UPDTATE' )? "":'data-validation="required"'?> class="form-control  m-input ">
            <span id="validate" class="help-block"></span>
        </div>
    </div>

    <div class="form-group m-form__group row">
        <div class="col-lg-6">
            <label> نبذه </label>
            <textarea name="Pdata[about]" class="form-control m-input" data-validation="required" rows="10">
                <?=$out["about"]?></textarea>
        </div>
        <div class="col-lg-6">
            <label> الصورة </label>
            <?php if ($op == 'UPDTATE') { ?>
                <input type="file" id="input-file-now-custom-1" name="logo" class="dropify"
                       data-default-file="<?= base_url() . IMAGEPATH . $out['logo'] ?>"/>
            <?php } else { ?>
                <input type="file" id="input-file-now-custom-1" name="logo" class="dropify"
                       data-default-file="" />
            <?php } ?>
        </div>
    </div>

</div>

<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
    <div class="m-form__actions m-form__actions--solid">
        <div class="row">
            <div class="col-lg-6">
                <button type="submit" name="<?php echo $out['input']?>" value="<?php echo $out['input']?>"
                        class="btn btn-primary">
                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?php echo $out['input_title']?>
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


<script>
	function getSpecialization() {
		var serviceId = $('#service_id').val();
		$.ajax({
			type: 'get',
			url: '<?= base_url() ?>specialization/' + serviceId,
			dataType: 'html',
			cache: false,
			success: function (html) {
				var totalHtml = '<label> التخصص </label>' ;
				totalHtml += html ;
				$("#specialization").html(totalHtml);
			},
			error: function (error) {
				console.log(error.responseText);
			}
		});
	}
</script>
