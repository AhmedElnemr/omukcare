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
            <label>الاسم:</label>
            <input type="text" name="Pdata[name]" value="<?= $out["name"] ?>"
                   class="form-control m-input"
                   data-validation="required">
        </div>
        <div class="col-lg-4">
            <label>النوع  :</label>
			<select name="Pdata[type]" id="type-announcer" class="form-control m-input" data-validation="required" aria-required="true">
				<option value="">اختر </option>
				<option value="hospital" <?=($out["type"] == "hospital")? "selected":"";?>>مشفى </option>
				<option value="doctor" <?=($out["type"] == "doctor")? "selected":"";?>>طبيب </option>
			</select>
        </div>
		<div class="col-lg-4" id="specialization" style="<?=($out["type"] == "val")? "":"display: none"?>">
			<label>التخصص :</label>
			<input type="text" name="Pdata[specialization]" value="<?= $out["specialization"] ?>"
				   class="form-control m-input">
		</div>

    </div>

    <div class="form-group m-form__group row">

		<div class="col-lg-4">
			<label>الهاتف   :</label>
			<input type="text" name="Pdata[phone]" value="<?= $out["phone"] ?>"
				   class="form-control m-input"
				   data-validation="required">
		</div>
		<div class="col-lg-4">
			<label>الكود   :</label>
			<input type="text" name="Pdata[code]" value="<?= $out["code"] ?>"
				   class="form-control m-input"
				   data-validation="required">
		</div>
		<div class="col-lg-4">
			<label>المنطقة   :</label>
			<input type="text" name="Pdata[area]" value="<?= $out["area"] ?>"
				   class="form-control m-input"
				   data-validation="required">
		</div>

    </div>
    <div class="form-group m-form__group row">
		<div class="col-lg-4">
			<label>المدينة   :</label>
			<input type="text" name="Pdata[city]" value="<?= $out["city"] ?>"
				   class="form-control m-input"
				   data-validation="required">
		</div>
		<div class="col-lg-4">
			<label>النسبة او العمولة %   :</label>
			<input type="number" name="Pdata[commission]" value="<?= $out["commission"] ?>"
				   class="form-control m-input"
				   data-validation="required">
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



