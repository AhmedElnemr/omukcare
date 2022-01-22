<?php if ($op == 'UPDTATE'):
	$out['input'] = 'UPDTATE';
	$out['input_title'] = 'تعديل ';
else:
	$out['input'] = 'INSERT';
	$out['input_title'] = 'حفظ ';
endif ?>

<?= form_open_multipart($form, ["class" => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']); ?>

<div class="m-portlet__body">

	<div class="form-group m-form__group row">
		<div class="col-lg-6">
			<label> الدولة :</label>
			<select class="form-control" name="Tdata[country_id]"  data-validation="required">
				<option value="">اختر </option>
				<?php if (isset($Countries) && !empty($Countries)): ?>
					<?php foreach ($Countries as $one): ?>
					<?php if(in_array($one->id_country,$in)){continue;}?>
						<option value="<?=$one->id_country?>" <?=($out["country_id"] == $one->id_country)?"selected":""?> >
							<?=$one->word->name?></option>
					<?php endforeach ?>
				<?php endif ?>
			</select>
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



