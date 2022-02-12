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
    <div class="form-group row">
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
    <div class="form-group row">

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
    <div class="form-group row">
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
		<button type="submit" name="<?= $out['input'] ?>" value="<?= $out['input'] ?>"
				class="btn btn-primary">
			<span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?= $out['input_title'] ?>
		</button>
		<?= form_close()?>
	</div>
</div>
