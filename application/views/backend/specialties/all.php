<div class="m-portlet__body">
    <?php if(isset($data_table ) && $data_table!=null && !empty($data_table)):?>
        <table id="myTable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>اسم الخدمة  </th>
               <!-- <th>الخدمة الرئيسية  </th>-->
                <th>  التحكم  </th>
            </tr>
            </thead>
            <?php $x = 1; foreach($data_table as $row):?>
                <tr>
                    <td><?=$x++?></td>
                    <td><?=$row->words->title?></td>
                    <!--<td>
                        <?php /*if (!empty($row->logo) && is_file(IMAGEPATH . $row->logo)): */?>
                            <a class="image-popup-vertical-fit" href="<?/*= base_url() . IMAGEPATH . $row->logo */?>"
                               title="صورة  ">
                                <img src="<?/*= base_url() . IMAGEPATH . $row->logo */?>" alt="image" class="img-thumbnail"
                                     width="100" height="100"/> </a>
                        <?php /*else: */?>
                            <img src="<?/*= base_url() . FAVICONPATH . USERIMAGE */?>" class="img-thumbnail" width="100"
                                 height="100" alt=""/>
                        <?php /*endif */?>
                    </td>-->
                    <td class="text-center">
                        <a href="<?= base_url() . "admin-specialties/edit/" . $row->id ?>">
                            <button type="button" class="btn m-btn--pill btn-info btn-sm" title="تعديل ">
                                <i class="fa fa-pen-alt fa-xs"></i></button>
                        </a>
                        <a href="<?= base_url() . "admin-specialties/delete/" . $row->id ?>"
                           onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                            <button type="button" class="btn m-btn--pill btn-danger btn-sm" title="حذف">
                                <i class="fa fa-trash-alt fa-xs"> </i></button>
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
