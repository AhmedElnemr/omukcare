<div class="card">
	<div class="card-header border-bottom-0">
		<h3 class="card-title"><?= (isset($title) ? $title : "") ?></h3>
	</div>
	<div class="card-body">
	<?= form_open_multipart($form); ?>
		<div class="form-group m-form__group row">
			<?php if (!empty($specialties)) { ?>
				<table id="myTable" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>المنطقة</th>
						<th> التخصص</th>
						<th> السعر</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($specialties as $row) { ?>
						<?php if (!empty($area)) { ?>
							<?php foreach ($area as $one):
							  if(isset($result[$one->area_id][$row->id])){
								$value = $result[$one->area_id][$row->id]->price ;
								$input = '<input type="hidden" name="ids[]" value="'.$result[$one->area_id][$row->id]->id.'">';
							  }
							  else{
								$value = "0";
								$input = '';
							  }
							?>
								<tr>
									<td><?= $one->word->title ?></td>
									<td><?= $row->trans->title ?> </td>
									<td>
										<?=$input?>
										<input name="area_id[]" type="hidden" class="form-control" value="<?= $one->area_id ?>">
										<input name="specialty_id[]" type="hidden" class="form-control" value="<?= $row->id ?>">
										<input name="price[]" type="number" class="form-control" value="<?=$value?>">
									</td>
								</tr>
							<?php endforeach ?>
						<?php } ?>
					<?php } ?>
					</tbody>
				</table>
			<?php } else { ?>
				<table id="myTable" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>المنطقة</th>
						<th> السعر</th>
					</tr>
					</thead>
					<tbody>
					<?php if (!empty($area)) { ?>
						<?php foreach ($area as $one):
							if(isset($result[$one->area_id][0])){
								$value = $result[$one->area_id][0]->price ;
								$input = '<input type="hidden" name="ids[]" value="'.$result[$one->area_id][0]->id.'">';
							}
							else{
								$value = "0";
								$input = '';
							}
						?>
							<tr>
								<td><?= $one->word->title ?></td>
								<td>
									<?=$input?>
									<input name="area_id[]" type="hidden" class="form-control" value="<?= $one->area_id ?>">
									<input name="specialty_id[]" type="hidden" class="form-control" value="0">
									<input name="price[]" type="number" class="form-control" value="<?=$value?>">
								</td>
							</tr>
						<?php endforeach ?>
					<?php } ?>
					</tbody>
				</table>
			<?php } ?>
		</div>
		<button type="submit" name="action" value="<?=$action?>"
				class="btn btn-primary">
			<span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ
		</button>
		<?= form_close() ?>
	</div>
</div>

