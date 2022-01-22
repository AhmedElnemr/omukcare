<?php if($op == 'UPDTATE' ):
    $out['input']='UPDTATE';
    $out['input_title']='تعديل ';
	$out["from_date"] = date("Y-m-d",$out["from_date"]);
	$out["to_date"] = date("Y-m-d",$out["to_date"]);
else:
    $out['input']='INSERT';
    $out['input_title']='حفظ ';
endif?>

<?=form_open_multipart($form,["class"=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']);?>

<div class="m-portlet__body">

    <div class="form-group m-form__group row">
        <div class="col-lg-4">
            <label>كود الكوبون:</label>
            <input type="text" name="Pdata[code]" value="<?= $out["code"] ?>"
                   class="form-control m-input"
                   data-validation="required">
        </div>
        <div class="col-lg-4">
            <label>النوع  :</label>
			<select name="Pdata[type]" id="type-coupon" class="form-control m-input" data-validation="required" aria-required="true">
				<option value="">اختر </option>
				<option value="val" <?=($out["type"] == "val")? "selected":"";?>>قيمة </option>
				<option value="per" <?=($out["type"] == "per")? "selected":"";?>>نسبة  </option>
			</select>
        </div>
        <div class="col-lg-4">
            <label>القيمة   :</label>
            <input type="number" name="Pdata[value]" value="<?= $out["value"] ?>"
                   class="form-control m-input"
                   data-validation="required">
        </div>
    </div>

    <div class="form-group m-form__group row">
		<div class="col-lg-4" id="limit_value" style="<?=($out["type"] == "val")? "":"display: none"?>">
			<label>الحد الادنى للطلب :</label>
			<input type="number" name="Pdata[limit_value]" value="<?= $out["limit_value"] ?>"
				   class="form-control m-input">
		</div>

        <div class="col-lg-4">
            <label>من تاريخ:</label>
			<input type="date" name="Pdata[from_date]" value="<?= $out["from_date"]?>"
				   class="form-control m-input"
				   data-validation="required">
        </div>
        <div class="col-lg-4">
            <label>الى تاريخ  :</label>
			<input type="date" name="Pdata[to_date]" value="<?= $out["to_date"]?>"
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



