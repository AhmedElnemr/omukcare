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
        <div class="col-lg-4">
            <label>اسم المنتج  (ar):</label>
            <input type="text" name="Pdata[ar][title]" value="<?= $out["ar"]["title"] ?>"
                   class="form-control m-input"
                   data-validation="required">
        </div>
        <div class="col-lg-4">
            <label>اسم المنتج  (en):</label>
            <input type="text" name="Pdata[en][title]" value="<?= $out["en"]["title"] ?>"
                   class="form-control m-input"
                   data-validation="required">
        </div>
        <div class="col-lg-4">
            <label>اسم المنتج  (es):</label>
            <input type="text" name="Pdata[es][title]" value="<?= $out["es"]["title"] ?>"
                   class="form-control m-input"
                   data-validation="required">
        </div>
	</div>

	<div class="form-group m-form__group row">
		<div class="col-lg-4">
			<label>تفاصيل الخدمة  (ar):</label>
			<textarea name="Pdata[ar][content]" class="form-control" rows="5" data-validation="required">
                <?= $out["ar"]["content"] ?>
            </textarea>
		</div>
		<div class="col-lg-4">
			<label>تفاصيل الخدمة  (en):</label>
			<textarea name="Pdata[en][content]" class="form-control" rows="5" data-validation="required">
                <?= $out["en"]["content"] ?>
            </textarea>
		</div>
		<div class="col-lg-4">
			<label>تفاصيل الخدمة  (es):</label>
			<textarea name="Pdata[es][content]" class="form-control" rows="5" data-validation="required">
                <?= $out["es"]["content"] ?>
            </textarea>
		</div>
	</div>

	<div class="form-group m-form__group row">
		<div class="col-lg-4">
			<label class="">القسم   :</label>
			<select name="Tdata[sub_dep_id]" class="form-control m-input" data-validation="required" aria-required="true">
				<option value="">اختر </option>
				<?php
				if(isset($Departments) &&  !empty($Departments)){
					foreach ($Departments as $row):
						$sel = ($row->id == $out['sub_dep_id'])? "selected":"";
						echo ' <option value="'.$row->id.'-'.$row->perant_id.'"   '.$sel.'>'.$row->word->title.' </option>';
					endforeach;
				}
				else{
					echo ' <option value="">لا يوجد بيانات  </option>';
				}
				?>
			</select>
		</div>
		<div class="col-lg-4">
			<label class="">الشركة المصنعة   :</label>
			<select name="Tdata[campany_id]" class="form-control m-input" data-validation="required" aria-required="true">
				<option value="">اختر </option>
				<?php
				if(isset($campanies) &&  !empty($campanies)){
					foreach ($campanies as $row):
						$sel = ($row->id == $out['campany_id'])? "selected":"";
						echo ' <option value="'.$row->id.'" '.$sel.'>'.$row->word->title.' </option>';
					endforeach;
				}
				else{
					echo ' <option value="">لا يوجد بيانات  </option>';
				}
				?>
			</select>
		</div>
		<div class="col-lg-4">
			<label class="">الدولة   :</label>
			<select name="Tdata[country_id]" class="form-control m-input" data-validation="required" aria-required="true">
				<option value="">اختر </option>
				<?php
				if(isset($Countries) &&  !empty($Countries)){
					foreach ($Countries as $row):
						$sel = ($row->id_country == $out['country_id'])? "selected":"";
						echo ' <option value="'.$row->id_country.'" '.$sel.'>'.$row->word->name.' </option>';
					endforeach;
				}
				else{
					echo ' <option value="">لا يوجد بيانات  </option>';
				}
				?>
			</select>
		</div>
	</div>

	<div class="form-group m-form__group row">
		<div class="col-lg-4">
			<label class="">الوكيل   :</label>
			<select name="Tdata[partner_id]" class="form-control m-input" data-validation="required" aria-required="true">
				<?php
				if(isset($partners) &&  !empty($partners)){?>
					<?php if (sizeof($partners) > 1): ?>
						<option value="">اختر</option>
					<?php endif ?>
					<?php foreach ($partners as $row):
						$sel = ($row->id == $out['partner_id'])? "selected":"";
						echo ' <option value="'.$row->id.'" '.$sel.'>'.$row->word->title.' </option>';
					endforeach;
				}
				else{
					echo ' <option value="">لا يوجد بيانات  </option>';
				}
				?>
			</select>
		</div>
		<div class="col-lg-4">
			<label>المخزون :</label>
			<input type="number" name="Tdata[stock]" value="<?= $out["stock"] ?>"
				   class="form-control m-input"
				   data-validation="required">
		</div>
		<div class="col-lg-4">
			<label>رقم الرخصة :</label>
			<input type="number" name="Tdata[license_num]" value="<?= $out["license_num"] ?>"
				   class="form-control m-input"
				   data-validation="required">
		</div>
	</div>

	<div class="form-group m-form__group row">
		<div class="col-lg-6">
			<label> صورة المنتج  </label>
			<?php if ($op == 'UPDTATE') { ?>
				<input type="file" id="input-file-now-custom-1" name="image" class="dropify"
					   data-default-file="<?= base_url() . IMAGEPATH. $out['image'] ?>"/>
			<?php } else { ?>
				<input type="file" id="input-file-now-custom-1" name="image" class="dropify"
					   data-default-file="" data-validation="required"/>
			<?php } ?>
		</div>
		<div class="col-lg-6">
			<label> صورة الرخصة  </label>
			<?php if ($op == 'UPDTATE') { ?>
				<input type="file" id="input-file-now-custom-1" name="license_image" class="dropify"
					   data-default-file="<?= base_url() . IMAGEPATH. $out['license_image'] ?>"/>
			<?php } else { ?>
				<input type="file" id="input-file-now-custom-1" name="license_image" class="dropify"
					   data-default-file="" />
			<?php } ?>
		</div>
	</div>

	<div class="form-group m-form__group row">
		<table  class="table table-bordered table-striped">
			<thead>
			<tr>
				<th>الدولة  </th>
				<th>السعر  </th>
				<th>   <i class="fa fa-plus-square append-frist-tr"  add-body-id="price_body"></i>   </th>
			</tr>
			</thead>
			<tbody id="price_body">
			<?php if (isset($product_prices) && !empty($product_prices)): ?>
				<?php foreach ($product_prices as $row): ?>
					<tr>
						<td>
							<select name="lang_id[]" class="form-control m-input unique-tr" data-validation="required"
									aria-required="true">
								<option value="">اختر</option>
								<?php
								if (isset($prices) && !empty($prices)) {
									foreach ($prices as $one):
										$sel = ($one->shop_id == $row->shop_id)? "selected":"";
										echo ' <option value="' . $one->shop_id . '" ' . $sel . '>' . $one->country->word->name . ' </option>';
									endforeach;
								} else {
									echo ' <option value="">لا يوجد بيانات  </option>';
								}
								?>
							</select>
						</td>
						<td><input type="number" name="price[]" value="<?=$row->price?>"
								   class="form-control m-input" data-validation="required">
						</td>
						<td>
							<button type="button" class="btn m-btn--pill btn-danger btn-sm  remove-table-row"
									remove-class="remove-table-row" title="حذف">
								<i class="fa fa-trash-alt fa-xs"> </i></button>
						</td>
					</tr>
				<?php endforeach ?>
			<?php else: ?>
			<tr>
				<td>
					<select name="lang_id[]" class="form-control m-input unique-tr" data-validation="required" aria-required="true">
						<option value="">اختر </option>
						<?php
						if(isset($prices) &&  !empty($prices)){
							foreach ($prices as $row):
								echo ' <option value="'.$row->shop_id.'" >'.$row->country->word->name.' </option>';
							endforeach;
						}
						else{
							echo ' <option value="">لا يوجد بيانات  </option>';
						}
						?>
					</select>
				</td>
				<td> <input type="number" name="price[]" value=""
							class="form-control m-input" data-validation="required">
				</td>
				<td>
					<button type="button" class="btn m-btn--pill btn-danger btn-sm  remove-table-row"
							remove-class="remove-table-row"  title="حذف">
						<i class="fa fa-trash-alt fa-xs"> </i></button>
				</td>
			</tr>
			<?php endif ?>
			</tbody>
		</table>
	</div>

	<div class="form-group m-form__group row">
		<!--<h6 class="card-title">صور المنتج </h6>-->
		<?php if (isset($photos) && !empty($photos)): ?>
			<div class="row">
				<?php foreach ($photos as $img): ?>
					<div class="image-area ">
						<img src="<?= base_url() . "uploads/images/" . $img->image ?>" alt="Preview">
						<a class="remove-image"
						   href="<?= base_url() . "app-products/deleteImage/" . $img->id . "/" . $out['id'] ?>"
						   style="display: inline;">&#215;</a>
					</div>
				<?php endforeach ?>
			</div>
		<?php endif ?>
		<input type="file" name="images[]" class="multi-up"
			   accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
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



