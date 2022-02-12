<?php if($op == 'UPDTATE' ):
    $out['input']='UPDTATE';
    $out['input_title']='تعديل ';
else:
    $out['input']='INSERT';
    $out['input_title']='حفظ ';
endif?>
<div class="card">
	<div class="card-header border-bottom-0">
		<h3 class="card-title"><?= (isset($title) ? $title : "") ?></h3>
	</div>
	<div class="card-body">
    <?=form_open_multipart($form);?>
    <div class="form-group m-form__group row">
        <div class="col-lg-6">
            <label>الاسم :</label>
            <input type="hidden" name="Pdata[user_type]"  value="1">
            <input type="hidden" name="Pdata[phone_code]" value="0020">
            <input type="hidden" name="Pdata[soft_type]" value="4">
            <input type="hidden" name="Pdata[signup_by]" value="admin">
            <input type="text" name="Pdata[name]" value="<?= $out['name'] ?>" class="form-control m-input"
                   data-validation="required">
        </div>
        <div class="col-lg-6">
            <label>الايميل :</label>
            <input type="text" name="Pdata[email]" value="<?= $out['email'] ?>" class="form-control m-input unique-field "
				   field-name="email"   data-db="registrations"   data-validation="email">
        </div>

    </div>
    <div class="form-group m-form__group row">
            <div class="col-lg-6">
                <label>الهاتف :</label>
                <input type="text" name="Pdata[phone]" value="<?= $out['phone'] ?>" class="form-control m-input unique-field"
					   field-name="phone"   data-db="registrations"    data-validation="required">
            </div>
            <div class="col-lg-6">
                <label>النوع :</label>
                <br>
                <input type="radio" name="Pdata[gender]" value="1" <?=($out["gender"] == 1)? "checked":"";?>  data-validation="required" id=""> ذكر
                <input type="radio" name="Pdata[gender]" value="2" <?=($out["gender"] == 2)? "checked":"";?>  data-validation="required" id="">انثى
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
		<button type="submit" name="<?= $out['input'] ?>" value="<?= $out['input'] ?>"
				class="btn btn-primary">
			<span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?= $out['input_title'] ?>
		</button>
		<?= form_close()?>
	</div>
</div>



