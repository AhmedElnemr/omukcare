<?= form_open_multipart($form, ["class" => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']); ?>
<div class="m-portlet__body">
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

</div>
<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
	<div class="m-form__actions m-form__actions--solid">
		<div class="row">
			<div class="col-lg-6">
				<button type="submit" name="action" value="<?=$action?>"
						class="btn btn-primary">
					<span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ
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



