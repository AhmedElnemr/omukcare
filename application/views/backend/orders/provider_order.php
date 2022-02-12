<div class="card">
	<div class="card-header border-bottom-0">
		<h3 class="card-title"><?= (isset($title) ? $title : "") ?></h3>
	</div>
	<div class="card-body">
	<div class="form-group m-form__group row">
		<div class="col-lg-6">
			<select id="user_id" class="form-control m-input">
				<option value="0">اختر </option>
				<?php
				if(isset($clients) &&  !empty($clients)){
					foreach ($clients as $row):
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
			<button type="button" class="btn btn-warning" onclick="getProviderOrders();">بحث</button>
		</div>

	</div>
	<div class="" id="option_result"></div>
	</div>
</div>
