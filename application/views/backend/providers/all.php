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
                <th>صورة  </th>
                <th>الاسم</th>
                <th>الهاتف </th>
                <th>القسم </th>
                <th>التقييم </th>
                <th>البريد الإلكتروني   </th>
                <th>  التحكم  </th>
            </tr>
            </thead>
            <?php $x = 1; foreach($data_table as $row):?>
                <tr>
                    <td><?=$x++?></td>
                    <td>
                        <?php if (!empty($row->logo) && is_file(IMAGEPATH . $row->logo)): ?>
                            <a class="image-popup-vertical-fit" href="<?= base_url() . IMAGEPATH . $row->logo ?>"
                               title="صورة  ">
                                <img src="<?= base_url() . IMAGEPATH . $row->logo ?>" alt="image" class="img-thumbnail"
                                     width="100" height="100"/> </a>
                        <?php else: ?>
                            <img src="<?= base_url() . FAVICONPATH .USERIMAGE?>" class="img-thumbnail"  width="100" height="100" alt=""/>
                        <?php endif ?>

                    </td>
                    <td><?=$row->name?></td>
                    <td><?=$row->phone?></td>
                    <td><?=(isset($row->service_data->trans->title))? $row->service_data->trans->title:""?></td>
                    <td><?=$row->user_rating?></td>
                    <td><?=$row->email?></td>
                    <td class="text-center">
                        <a href="<?=base_url()."admin-person/edit/".$row->user_id?>">
							<button type="button" class="btn m-btn--pill btn-info btn-sm" title="تعديل ">
								<i class="fa fa-edit" data-bs-toggle="tooltip" title="تعديل" data-bs-original-title="fa fa-edit" aria-label="تعديل"></i>
							</button>
						</a>
                        <a href="<?=base_url()."admin-person/delete/".$row->user_id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
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
