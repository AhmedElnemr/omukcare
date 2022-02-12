<div class="card">
	<div class="card-header border-bottom-0">
		<h3 class="card-title"><?= (isset($title) ? $title : "") ?></h3>
	</div>
	<div class="card-body">
	<?php if(isset($data_table ) && $data_table!=null && !empty($data_table)):?>
		<table id="myTable" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th>#</th>
				<th>المستخدم  </th>
				<th>كود الكوبون  </th>
				<th>النوع </th>
				<th>القيمة </th>
				<th>التاريخ </th>
			</tr>
			</thead>
			<?php $x = 1; foreach($data_table as $row):?>
				<tr>
					<td><?=$x++?></td>
					<td><?=(isset($row->client->name))? $row->client->name:""?></td>
					<td><?=(isset($row->coupon->code))? $row->coupon->code:""?></td>
					<td><?=($row->type == "val")? "قيمة":"نسبة";?></td>
					<td><?=$row->value?></td>
					<td><?=date("Y-m-d",$row->created_at)?></td>
				</tr>
			<?php endforeach ;?>
		</table>
	<?php else:
		echo '<div class="alert alert-danger  alert-rounded">
                  <i class="ti-user"></i> لا يوجد بيانات  
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span> </button>
             </div>';
	endif;?>
	</div>
</div>
