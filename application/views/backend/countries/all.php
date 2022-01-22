

<div class="m-portlet__body">


    <div class="row p-1">
        <a href="<?=base_url()."admin-country/add"?>">
            <button  type="button"   class="btn btn-success card-shadow">
                <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                اضف   جديد
            </button>
        </a>
    </div>

    <?php if(isset($data_table ) && $data_table!=null && !empty($data_table)):?>
        <table id="myTable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>إسم الدولة  </th>
                <th>  التحكم  </th>
            </tr>
            </thead>
            <?php $x = 1; foreach($data_table as $row):?>
                <tr>
                    <td><?=$x++?></td>
                    <td><?=$row->ar_name?></td>
                    <td class="text-center">
                        <a href="<?=base_url()."admin-country/edit/".$row->id_country?>">
                            <button type="button" class="btn m-btn--pill btn-info btn-sm" title="تعديل ">
                                <i class="fa fa-pen-alt fa-xs"></i></button></a>
                        <a href="<?=base_url()."admin-country/delete/".$row->id_country?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                            <button type="button" class="btn m-btn--pill btn-danger btn-sm" title="حذف">
                                <i class="fa fa-trash-alt fa-xs"> </i> </button></a>
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
