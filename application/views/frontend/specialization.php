<?php if (isset($specialization) && !empty($specialization)): ?>
	<div class="form-group">
		<div class="select">
			<select name="Pdata[specialty_id]" class="form-control" data-validation="required" aria-required="true">
				<option value=""> <?= lang('Specialization') ?> </option>

					<?php foreach ($specialization as $row): ?>
						<option value="<?= $row->id ?>"> <?= $row->trans->title ?> </option>
					<?php endforeach ?>

			</select>
		</div>
	</div>
<?php endif ?>
