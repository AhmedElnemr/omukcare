<div class="card">
	<div class="card-header border-bottom-0">
		<h3 class="card-title"><?= (isset($title) ? $title : "") ?></h3>
	</div>
	<div class="card-body">
		<div class="form-group row">
		<div class="col-lg-5">
			<label>مقدم الخدمة :</label>
			<select id="user_id" class="form-control m-input">
				<option value="0">اختر </option>
				<?php
				if(isset($provider) &&  !empty($provider)){
					foreach ($provider as $row):
						echo ' <option value="'.$row->user_id.'">'.$row->name.' </option>';
					endforeach;
				}
				else{
					echo ' <option value="">لا يوجد بيانات  </option>';
				}
				?>
			</select>
		</div>
		<div class="col-lg-3">
			<label>من تاريخ :</label>
			<input type="text" id="from_date" value=""
				   class="form-control m-input datepicker-m"
				   data-validation="required">
		</div>
		<div class="col-lg-3">
			<label>الى تاريخ :</label>
			<input type="text" id="to_date" value=""
				   class="form-control m-input datepicker-m"
				   data-validation="required">
		</div>
		<div class="col-lg-1">
			<br>
			<button type="button" class="btn btn-warning" onclick="getProviderStatement();">بحث</button>
		</div>

	</div>
		<div class="" id="option_result"></div>
	</div>
</div>
