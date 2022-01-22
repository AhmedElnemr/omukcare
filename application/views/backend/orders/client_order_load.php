<?php if (isset($data_table) && $data_table != null && !empty($data_table)): ?>
	<table id="" class="table table-bordered table-striped">
		<thead>
		<tr class="table-info">
			<th>رقم الطلب</th>
			<th>الخدمة</th>
			<th> تاريخ الطلب</th>
			<th> حالة الطلب </th>
			<th> السعر</th>
			<th> طريقة الدفع</th>
			<th>مقدم الخدمة</th>
			<th> التفاصيل</th>
		</tr>
		</thead>
		<?php $x = 1;
		foreach ($data_table as $row): ?>
			<tr>
				<td><?= $row->order_id ?></td>
				<td><?= (isset($row->sub_service->trans->title)) ? $row->sub_service->trans->title : "غير محدد" ?></td>
				<td><?= date("Y-m-d", $row->order_date) ?></td>
				<td>
					<?php
					switch ($row->order_status) {
						case ORDER_WAT_PAY:
							 echo 'غير مكتم الدفع الالكترونى';
							break;
						case ORDER_START:
							 echo 'طلب جديد';
							break;
						case ORDER_BLOCKED:
							 echo 'طلب معلق';
							break;
						case ORDER_ACCEPT:
							 echo 'طلب حالى ';
							break;
						case ORDER_END:
							 echo 'طلب سابق';
							break;
						case ORDER_END_ALL:
							 echo 'طلب سابق ';
							break;
						case ORDER_CANCEL:
							 echo 'طلب ملغى ';
							break;
						case ORDER_DELETE:
							 echo 'طلب ملغى';
							break;
					}
					?>
				</td>
				<td><?= $row->price ?></td>
				<td>
					<!-- 1- cash  / vodafone cash / 3 - online pay  / 4 - aman  -->
						<?php
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
			    ?>
					</td>
				<td><?= (isset($row->provider->name)) ? $row->provider->name : "غير محدد" ?></td>
				<td>
					<button type="button" class="btn m-btn m-btn--gradient-from-focus m-btn--gradient-to-danger"
							data-toggle="modal" data-target="#m_modal_details"
							onclick="getOrderData('<?= $row->order_id ?>');">التفاصيل
					</button>
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
