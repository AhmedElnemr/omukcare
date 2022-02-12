<div class="m-portlet__body">
	<?php if (isset($data_table) && $data_table != null && !empty($data_table)): ?>
		<table id="myTable" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th>#</th>
				<th>اسم الخدمة</th>
				<!-- <th>الخدمة الرئيسية  </th>-->
				<th> التحكم</th>
				<th> الاسعار</th>
			</tr>
			</thead>
			<?php $x = 1;
			foreach ($data_table as $row): ?>
				<tr>
					<td><?= $x++ ?></td>
					<td><?= $row->words->title ?></td>
					<!--<td>
                        <?php /*if (!empty($row->logo) && is_file(IMAGEPATH . $row->logo)): */ ?>
                            <a class="image-popup-vertical-fit" href="<? /*= base_url() . IMAGEPATH . $row->logo */ ?>"
                               title="صورة  ">
                                <img src="<? /*= base_url() . IMAGEPATH . $row->logo */ ?>" alt="image" class="img-thumbnail"
                                     width="100" height="100"/> </a>
                        <?php /*else: */ ?>
                            <img src="<? /*= base_url() . FAVICONPATH . USERIMAGE */ ?>" class="img-thumbnail" width="100"
                                 height="100" alt=""/>
                        <?php /*endif */ ?>
                    </td>-->
					<td class="text-center">
						<a href="<?= base_url() . "admin-sub-service/edit/" . $row->service_id ?>">
							<button type="button" class="btn m-btn--pill btn-info btn-sm" title="تعديل ">
								<i class="fa fa-edit" data-bs-toggle="tooltip" title="تعديل" data-bs-original-title="fa fa-edit" aria-label="تعديل"></i>
							</button>
						</a>
						<a href="<?= base_url() . "admin-sub-service/delete/" . $row->service_id ?>"
						   onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
							<button type="button" class="btn m-btn--pill btn-danger btn-sm" title="حذف">
								<i class="fa fa-trash" data-bs-toggle="tooltip" title="الحذف" data-bs-original-title="fa fa-trash" aria-label="الحذف"></i>
							</button>
						</a>
					</td>
					<td class="text-center">
						<a href="<?= base_url() . "admin-sub-service/prices/" . $row->service_id."/".$row->perant_id ?>">
							<button type="button" class="btn m-btn--pill btn-success btn-sm" title="تعديل الاسعار ">
								<i class="fa fa-bank" data-bs-toggle="tooltip" title="تعديل الاسعار" data-bs-original-title="fa fa-edit" aria-label="تعديل الاسعار"></i>
							</button>
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	<?php else:
		echo '<div class="alert alert-danger  alert-rounded">
                  <i class="ti-user"></i> لا يوجد بيانات  
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span> </button>
             </div>';
	endif; ?>
</div>
