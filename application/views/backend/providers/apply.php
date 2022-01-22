<div class="m-portlet__body">
    <?php if(isset($data_table ) && $data_table!=null && !empty($data_table)):?>
        <table id="myTable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>صورة  </th>
                <th>الاسم</th>
                <th>الهاتف </th>
                <th>القسم </th>
                <th>نبذه </th>
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
                    <td><?=$row->service_data->trans->title?></td>
                    <td><?=$row->about?></td>
                    <td><?=$row->email?></td>
                    <td class="text-center">
                        <a href="<?=base_url()."admin-provider/approve/1/".$row->user_id?>">
                            <button type="button" class="btn m-btn--pill btn-info btn-sm" title="موافقة " onclick="return confirm('هل انت متأكد من عملية القبول ؟');">
                                <i class="fa fa-check fa-xs"></i>  موافقة </button></a>
                        <a href="<?=base_url()."admin-provider/approve/2/".$row->user_id?>" onclick="return confirm('هل انت متأكد من عملية الرفض ؟');">
                            <button type="button" class="btn m-btn--pill btn-danger btn-sm" title="رفض ">
                                <i class="fa fa-times fa-xs"> </i> رفض </button></a>
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
