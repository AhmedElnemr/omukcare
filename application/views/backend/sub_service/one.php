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
		<div class="form-group  row">
			<div class="col-lg-6">
				<label class="">الخدمة الرئيسية   :</label>
				<select name="Tdata[perant_id]" class="form-control m-input" data-validation="required" aria-required="true">
					<option value="">اختر </option>
				 <?php
				 if(isset($service) &&  !empty($service)){
					 foreach ($service as $row):
						 $sel = ($row->service_id == $out['perant_id'])? "selected":"";
						 echo ' <option value="'.$row->service_id.'" '.$sel.'>'.$row->words->title.' </option>';
					 endforeach;
				 }
				 else{
					 echo ' <option value="">لا يوجد بيانات  </option>';
				 }
				 ?>
				</select>
			</div>
			<div class="col-lg-6">
				<label>متوسط الاسعار :</label>
				<input type="text" name="Tdata[cost]" value="<?= $out["cost"] ?>"
					   class="form-control m-input"
					   data-validation="required">
			</div>
		</div>
		<div class="form-group  row">
			<div class="col-lg-6">
				<label>اسم الخدمة  (ar):</label>
				<input type="text" name="Pdata[ar][title]" value="<?= $out["ar"]["title"] ?>"
					   class="form-control m-input"
					   data-validation="required">
			</div>
			<div class="col-lg-6">
				<label>اسم الخدمة  (en):</label>
				<input type="text" name="Pdata[en][title]" value="<?= $out["en"]["title"] ?>"
					   class="form-control m-input"
					   data-validation="required">
			</div>
		</div>
		<div class="form-group  row">
			<div class="col-lg-6">
				<label>تفاصيل الخدمة  (ar):</label>
				<textarea name="Pdata[ar][content]" class="form-control" rows="5" data-validation="required">
					<?= $out["ar"]["content"] ?>
				</textarea>
			</div>
			<div class="col-lg-6">
				<label>تفاصيل الخدمة  (en):</label>
				<textarea name="Pdata[en][content]" class="form-control" rows="5" data-validation="required">
					<?= $out["en"]["content"] ?>
				</textarea>
			</div>
		</div>
		<button type="submit" name="<?= $out['input'] ?>" value="<?= $out['input'] ?>"
				class="btn btn-primary">
			<span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?= $out['input_title'] ?>
		</button>
		<?= form_close() ?>
	</div>
</div>
