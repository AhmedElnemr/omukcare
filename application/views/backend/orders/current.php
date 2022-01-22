<div class="m-portlet__body">
	<?php if(isset($data_table ) && $data_table!=null && !empty($data_table)):?>
		<table id="myTable" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th>رقم الطلب </th>
				<th>العميل   </th>
				<th>مقدم الخدمة   </th>
				<th>الخدمة  </th>
				<th> تاريخ الطلب  </th>
				<th>  العنوان   </th>
				<th>  السعر   </th>
				<th> التفاصيل    </th>
				<th>  التحكم   </th>
			</tr>
			</thead>
			<?php $x = 1; foreach($data_table as $row):?>
				<tr>
					<td><?=$row->order_id?></td>
					<td><?=(isset($row->client->name))? $row->client->name:"غير محدد"?></td>
					<td><?=(isset($row->provider->name))? $row->provider->name:"غير محدد"?></td>
					<td><?=(isset($row->sub_service->trans->title))? $row->sub_service->trans->title:"غير محدد"?></td>
					<td><?=date("Y-m-d",$row->order_date)?></td>
					<td><?=$row->address?></td>
					<!-- 1- cash  / vodafone cash / 3 - online pay  / 4 - aman  -->
					<!--<td>
						<?php
					/*
				   if($row->payment == 1){
					   echo '<button type="button" class="btn btn-outline-accent m-btn m-btn--outline-2x ">كاش</button>';
				   }
				   elseif ($row->payment == 2){
					   echo '<button type="button" class="btn btn-outline-danger m-btn m-btn--outline-2x ">فودافون كاش </button>';
				   }
				   elseif ($row->payment == 3){
					   echo '<button type="button" class="btn btn-outline-dark m-btn m-btn--outline-2x ">دفع الكترونى </button>';
				   }else{
					   echo '<button type="button" class="btn btn-outline-primary m-btn m-btn--outline-2x ">أمان </button>';
				   }
				   */?>
					</td>-->
					<td><?=$row->price?></td>
					<td>
						<button type="button" class="btn m-btn m-btn--gradient-from-focus m-btn--gradient-to-danger"
								data-toggle="modal" data-target="#m_modal_details" onclick="getOrderData('<?=$row->order_id?>');" >التفاصيل</button>
					</td>
					<td class="text-center">
						<a href="<?=base_url()."admin-orders/delete/".$row->order_id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
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
