<div class="row">
	<div class="col-md-12">
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
                    <th>الإسم</th>
                    <th>البريد الإلكترونى </th>
                    <th> الرسالة </th>
                    <!--<th> الرد  </th>-->
                    <th> الحذف </th>
                </tr>
                </thead>
                <?php $x = 1; foreach($data_table as $row):?>
                    <tr>
                        <td ><?=$x++?></td>
                        <td > <?= $row->name?> </td>
                        <td ><?= $row->email?></td>
                        <td >
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaldemo-<?= $row->id?>">عرض </button>
                        </td>
                       <!-- <td >
                          <?php /*if($row->reply_state == 0){*/?>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#responsive-modal-<?php /* echo $row->id*/?>">اضافة الرد  </button>
                         <?php /*}else {
                            echo '<span class="label label-info"> تم الرد </span>';
                         }*/?>
                        </td>-->
                        <td>
                          <!--   -->
                            <a href="<?= base_url().'admin-contact/delete/'.$row->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
                                <button type="button" class="btn btn-danger btn-xs" >
									<i class="fa fa-trash" data-bs-toggle="tooltip" title="الحذف" data-bs-original-title="fa fa-trash" aria-label="الحذف"></i>
                                </button>
                            </a>
                        </td>

                    </tr>
                <?php endforeach ;?>

            </table>
     
        <?php else:
            echo ' <div class="alert alert-danger alert-dismissable">
									  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									  <strong>  لا يوجد رسائل واردة !</strong> .
									  </div>';
            ?>
        <?php endif;?>
			</div>
		</div>
	</div>
</div>


<?php if(isset($data_table ) && $data_table!=null && !empty($data_table)):?>
    <?php $x =1; foreach($data_table as $row):?>
       <?= form_open_multipart("MainData/SendReply/".$row->id)?>
    <div id="responsive-modal-<?= $row->id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                 <h4 class="modal-title">إضافة الرد :</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="message-text" class="control-label">نص الرسالة  </label>
                            <textarea class="form-control" name="reply" rows="8" id="message-text" data-validation="required"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?=$row->id?>" />
                            <input type="hidden" name="email" value="<?=$row->email?>" />
                           <button type="submit" name="ADD" value="ADD" class="btn btn-danger waves-effect waves-light">ارسال الرد </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">إغلاق</button>
                    
                </div>
            </div>
        </div>
    </div>
        <!------------------------------------------------------------------------------------>
        <div class="modal fade" id="modaldemo-<?= $row->id?>" >
            <div class="modal-dialog modal-lg">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                     <h4 class="modal-title ">تفاصيل الرسالة  </h4>
						<button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 row">
                                <div class="col-sm-4"><h4>الإسم : </h4></div>
                                <div class="col-sm-8"><h4><?= $row->name?> </h4></div>
                            </div>
                              <div class="col-sm-12 row">
                                <div class="col-sm-4"><h4>تاريخ الأرسال  : </h4></div>
                                <div class="col-sm-8"><h4><?= date("Y-m-d",$row->date)?> </h4></div>
                            </div>
                            <div class="col-sm-12 row">
                                <div class="col-sm-4"><h4>البريد الإلكترونى    : </h4></div>
                                <div class="col-sm-8"><h4><?= $row->email?> </h4></div>
                            </div>
                            <div class="col-sm-12 row">
                                <div class="col-sm-4"><h4> نص الرسالة : </h4></div>
                                <div class="col-sm-8"><h4><?= $row->message?> </h4></div>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
						<button aria-label="Close" class="btn btn-danger" data-bs-dismiss="modal">إغلاق</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!------------------------------------------------------------------------------------>
    <?php endforeach ;?>
<?php endif;?>
