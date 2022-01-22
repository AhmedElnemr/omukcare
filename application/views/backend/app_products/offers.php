<div class="m-portlet__body">
	<?php if(isset($data_table ) && $data_table!=null && !empty($data_table)):?>
		<?=form_open_multipart($form,["class"=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']);?>
		<table id="" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th>#</th>
				<th>السعر   </th>
				<th>الدولة   </th>
				<th>حالة العرض   </th>
				<th> نوع العرض   </th>
				<th>قيمة العرض   </th>
			</tr>
			</thead>
			<?php $x = 1; foreach($data_table as $row):?>
				<tr>
					<td><?=$x++?></td>
					<td>
						<?=$row->price?>
					    <input type="hidden" name="price[<?=$row->id?>]" value="<?=$row->price?>" >
					    <input type="hidden" name="old_price[<?=$row->id?>]" value="<?=$row->old_price?>" >
					</td>
					<td>
						<?php
						if (isset($row->shop->country_id)) {
						 $con = $this->Countries_model->get($row->shop->country_id);
                            echo (isset($con->word->name))? $con->word->name:"-";
						}
						else{
							echo "--";
						}
						?>
					</td>
					<td>
						<input type="radio" name="have_offer[<?=$row->id?>]" <?=($row->have_offer == "on")? "checked":""?>  value="on">مفعل
						<input type="radio" name="have_offer[<?=$row->id?>]" <?=($row->have_offer == "off")? "checked":""?>  value="off"> غير مفعل
					</td>
					<td>
						<input type="radio" name="offer_type[<?=$row->id?>]" <?=($row->offer_type == "per")? "checked":""?>  value="per">نسبه
						<input type="radio" name="offer_type[<?=$row->id?>]" <?=($row->offer_type == "value")? "checked":""?>  value="value"> مبلغ
					</td>
					<td><input type="number" name="offer_value[<?=$row->id?>]" value="<?=$row->offer_value?>"  class="form-control"></td>
				</tr>
			<?php endforeach ;?>
		</table>
		<div class="row">
			<div class="col-lg-6">
				<button type="submit" name="Insert" value="Insert"
						class="btn btn-primary">
					<span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ
				</button>
				<!--     <button type="reset" class="btn btn-secondary">Cancel</button>-->
			</div>
			<div class="col-lg-6 m--align-right">
				<!--  <button type="reset" class="btn btn-danger">Delete</button>-->
			</div>
		</div>
		<?= form_close()?>
	<?php else:
		echo '<div class="alert alert-danger  alert-rounded">
                  <i class="ti-user"></i> لا يوجد بيانات  
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span> </button>
             </div>';
	endif;?>
</div>
