<?php if ($op == 'UPDTATE'):
	$out['input'] = 'UPDTATE';
	$out['input_title'] = 'تعديل ';
	$out["date"] = date("Y-m-d", $out["date"]);
else:
	$out['input'] = 'INSERT';
	$out['input_title'] = 'حفظ ';
	$out["date"] = date("Y-m-d", time());
endif ?>

<?= form_open_multipart($form, ["class" => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']); ?>

<div class="m-portlet__body">
	<div class="form-group m-form__group row">
		<div class="col-lg-6">
			<label>مقدم الخدمة :</label>
			<select name="Tdata[user_id]" class="form-control m-input" data-validation="required">
				<option value="0">اختر</option>
				<?php
				if (isset($providers) && !empty($providers)) {
					foreach ($providers as $row):
						$sel = ($row->user_id == $out['user_id'])? "selected":"";
						echo ' <option value="' . $row->user_id . '" '.$sel.'>' . $row->name . ' </option>';
					endforeach;
				} else {
					echo ' <option value="">لا يوجد بيانات  </option>';
				}
				?>
			</select>
		</div>

		<div class="col-lg-3">
			<label>التاريخ :</label>
			<input type="text" name="Tdata[date]" value="<?= $out["date"] ?>"
				   class="form-control m-input datepicker-m"
				   data-validation="required">
		</div>
		<div class="col-lg-3">
			<label>المبلغ :</label>
			<input type="hidden" name="Tdata[company]" value="0">
			<input type="hidden" name="Tdata[type]" value="cashing">
			<input type="number" step="any" name="Tdata[provider]" value="<?= $out["provider"] ?>"
				   class="form-control m-input"
				   data-validation="required">
		</div>
	</div>
	<div class="form-group m-form__group row">

		<div class="col-lg-6">
			<label>تفاصيل :</label>
			<textarea name="Tdata[content]" class="form-control" rows="5">
                <?= $out["content"] ?>
            </textarea>
		</div>
		<div class="col-lg-6">
			<label>مرفقات :</label>
			<?php if ($op == 'UPDTATE'){ ?>
				<input type="file" id="input-file-now-custom-1" name="image" class="dropify"
					   data-default-file="<?= base_url() . "uploads/images/" . $out['image'] ?>"/>
			<?php } else { ?>
				<input type="file" id="input-file-now-custom-1" name="image" class="dropify"/>
			<?php } ?>
		</div>

	</div>

</div>

<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
	<div class="m-form__actions m-form__actions--solid">
		<div class="row">
			<div class="col-lg-6">
				<button type="submit" name="<?= $out['input'] ?>" value="<?= $out['input'] ?>"
						class="btn btn-primary">
					<span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?= $out['input_title'] ?>
				</button>
				<!--     <button type="reset" class="btn btn-secondary">Cancel</button>-->
			</div>
			<div class="col-lg-6 m--align-right">
				<!--  <button type="reset" class="btn btn-danger">Delete</button>-->
			</div>
		</div>
	</div>
</div>
<?= form_close() ?>



