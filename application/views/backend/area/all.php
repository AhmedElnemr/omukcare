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
				<th>المنطقة   </th>
				<th>  التحكم  </th>
			</tr>
			</thead>
			<?php $x = 1; foreach($data_table as $row):?>
				<tr>
					<td><?=$x++?></td>
					<td><?=$row->word->title?></td>
					<td class="text-center">
						<a href="<?= base_url() . "admin-area/edit/" . $row->area_id ?>">
							<button type="button" class="btn m-btn--pill btn-info btn-sm" title="تعديل ">
								<i class="fa fa-edit" data-bs-toggle="tooltip" title="تعديل" data-bs-original-title="fa fa-edit" aria-label="تعديل"></i>
							</button>
						</a>
						<a href="<?= base_url() . "admin-area/delete/" . $row->area_id ?>"
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
