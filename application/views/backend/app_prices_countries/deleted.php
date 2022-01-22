<div class="m-portlet__body">
	<?php if(isset($data_table ) && $data_table!=null && !empty($data_table)):?>
		<table id="myTable" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th>#</th>
				<th>الدولة  </th>
				<th>  التحكم  </th>
			</tr>
			</thead>
			<?php $x = 1; foreach($data_table as $row):?>
				<tr>
					<td><?=$x++?></td>
					<td><?=(isset($row->country->word->name))? $row->country->word->name:"غير محدد"?></td>
					<td class="text-center">
						<a href="<?= base_url() . "app-prices-countries/undeleted/" . $row->shop_id ?>">
							<button type="button" class="btn m-btn--pill btn-info btn-sm" title="اعادة ">
								<i class="fa fa-pen-alt fa-xs"></i></button>
						</a>
					</td>
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
