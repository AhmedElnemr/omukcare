<?php if(isset($data_table ) && $data_table!=null && !empty($data_table)):?>
<?php $x = 1; foreach($data_table as $row):?>
    <tr>
        <td><?=$x++?></td>
        <td><?=$row->order_id?></td>
        <td><?=(isset($row->client->name))? $row->client->name:"-"?></td>
        <td><?=$row->cost?></td>
        <td>
            <button type="button" class="btn m-btn m-btn--gradient-from-focus m-btn--gradient-to-danger"
                    data-toggle="modal" data-target="#m_modal_details" onclick="getOrderDetails('<?=$row->order_id?>','<?=$row->id?>');" >التفاصيل</button>
        </td>
        <?php if ($type == "new"): ?>
            <td class="text-center">
                <a href="<?= base_url() . "app-orders/makeOld/" . $row->id ."/".$row->order_id?>"
                   onclick="return confirm('هل انت متأكد من عملية الإنهاء ؟');">
                    <button type="button" class="btn m-btn--pill btn-info btn-sm" title="إنهاء ">
                        <i class="fa fa-pen-alt fa-xs"></i></button>
                </a>
            </td>
        <?php endif ?>
    </tr>
<?php endforeach ;?>
<?php else: ?>
    <tr>
        <td colspan="<?=($type == "new")? "6":"5"?>">لا يوجد طلبات </td>
    </tr>
<?php endif;?>
