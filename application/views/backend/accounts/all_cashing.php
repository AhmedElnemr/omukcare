<div class="card">
	<div class="card-header border-bottom-0">
		<h3 class="card-title"><?= (isset($title) ? $title : "") ?></h3>
		<?php if (isset($addLink)): ?>
		<div class="card-options">
			<a href="<?=base_url().$addLink?>" class="btn btn-warning ">
				<span><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
				أضف جديد
			</a>
		</div>
		<?php endif ?>
	</div>
	<div class="card-body">
	<?php if(isset($data_table ) && $data_table!=null && !empty($data_table)):?>
		<table id="myTable" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th>#</th>
				<th>مقدم الخدمة   </th>
				<th>المبلغ   </th>
				<th>التاريخ   </th>
				<th>  التحكم  </th>
			</tr>
			</thead>
			<?php $x = 1; foreach($data_table as $row):?>
				<tr>
					<td><?=$x++?></td>
					<td><?=$row->user->name?></td>
					<td><?=$row->provider?></td>
					<td><?=date('Y-d-m',$row->date)?></td>
					<td class="text-center">
						<a href="<?= base_url() . "admin-accounts/editCashing/" . $row->id ?>">
							<button type="button" class="btn m-btn--pill btn-info btn-sm" title="تعديل ">
								<i class="fa fa-edit" data-bs-toggle="tooltip" title="تعديل" data-bs-original-title="fa fa-edit" aria-label="تعديل"></i>
							</button>
						</a>
						<a href="<?= base_url() . "admin-accounts/delete/" . $row->id ."?type=cashing"?>"
						   onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
							<button type="button" class="btn m-btn--pill btn-danger btn-sm" title="حذف">
								<i class="fa fa-trash" data-bs-toggle="tooltip" title="الحذف" data-bs-original-title="fa fa-trash" aria-label="الحذف"></i>
							</button>
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
</div>
