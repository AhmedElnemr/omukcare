<?php if ($op == 'UPDTATE'):
	$out['input'] = 'UPDTATE';
	$out['input_title'] = 'تعديل ';
else:
	$out['input'] = 'INSERT';
	$out['input_title'] = 'حفظ ';
endif ?>

<?= form_open_multipart($form, ["class" => 'm-form m-form--label-align-right']); ?>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header border-bottom-0">
				<h3 class="card-title"><?= (isset($title) ? $title : "") ?></h3>
			</div>
			<div class="card-body">
				<?= form_open_multipart($form); ?>
				<?php if (isset($settings) && !empty($settings)) { ?>
					<?php $x = 0;
					foreach ($settings as $row) { ?>
						<div class="form-group m-form__group row">
							<label class="col-lg-3 col-form-label"><?= ($row->type == "social") ? $row->fild_key : lang($row->world_key); ?>
								:</label>
							<div class="col-lg-9">
								<?= setHtml($row->type, $row->fild_key, $row->value, $row->is_valid); ?>
							</div>
						</div>
					<?php } ?>
				<?php } ?>
				<button type="submit" name="<?php echo $out['input'] ?>" value="<?php echo $out['input'] ?>"
						class="btn btn-primary">
					<span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?php echo $out['input_title'] ?>
				</button>
				<?= form_close() ?>
			</div>
		</div>
	</div>

</div>

