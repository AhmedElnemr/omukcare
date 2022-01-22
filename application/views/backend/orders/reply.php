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
		<div class="col-lg-6">
			<label>مقدم الخدمة :</label>
			<input type="hidden" name="id" value="<?=$one->order_id?>"  data-validation="required">
			<select name="Pdata[provider_id]" class="form-control m-input" data-validation="required" aria-required="true"  >
				<option value="">اختر </option>
				<?php
				if(isset($providers) &&  !empty($providers)){
					foreach ($providers as $row):
						echo ' <option value="'.$row->user_id.'">'.$row->name.' </option>';
					endforeach;
				}
				else{
					echo ' <option value="">لا يوجد بيانات  </option>';
				}
				?>
			</select>
		</div>
		<div class="col-lg-6">
			<br>
			<button type="submit" name="<?= $out['input']?>" value="<?= $out['input']?>"
					class="btn btn-primary">
				<span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?= $out['input_title']?>
			</button>
			<!--     <button type="reset" class="btn btn-secondary">Cancel</button>-->
		</div>
		<?= form_close()?>
	</div>
	<div class="form-group m-form__group row">
		<?php $this->load->view('backend/orders/order_detals');?>
	</div>

</div>





