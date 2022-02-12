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
							 echo '<span class="badge badge-pill badge-default mt-2">';
							 echo 'غير مكتم الدفع الالكترونى';
							 echo '</span>';
							break;
						case ORDER_START:
							 echo '<span class="badge badge-pill badge-info mt-2">';
							 echo 'طلب جديد';
							 echo '</span>';
							break;
						case ORDER_BLOCKED:
							 echo '<span class="badge badge-pill badge-warning mt-2">';
							 echo 'طلب معلق';
							 echo '</span>';
							break;
						case ORDER_ACCEPT:
							 echo '<span class="badge badge-pill badge-primary mt-2">';
							 echo 'طلب حالى ';
							 echo '</span>';
							break;
						case ORDER_END:
							 echo '<span class="badge badge-pill badge-default mt-2">';
							 echo 'طلب سابق';
							 echo '</span>';
							break;
						case ORDER_END_ALL:
							 echo '<span class="badge badge-pill badge-info mt-2">';
							 echo 'طلب سابق ';
							 echo '</span>';
							break;
						case ORDER_CANCEL:
							 echo '<span class="badge badge-pill badge-danger mt-2">';
							 echo 'طلب ملغى ';
							 echo '</span>';
							break;
						case ORDER_DELETE:
							 echo '<span class="badge badge-pill badge-danger mt-2">';
							 echo 'طلب ملغى';
							 echo '</span>';
							break;
					}
					?>
				</td>
				<td><?= $row->price ?></td>
				<td>
					<!-- 1- cash  / vodafone cash / 3 - online pay  / 4 - aman  -->
						<?php
			   if($row->payment == 1){
				   echo '<span class="badge badge-success mt-2">كاش</span>';
			   }
			   elseif ($row->payment == 2){
				   echo '<span class="badge badge-danger mt-2">فودافون كاش </span>';
			   }
			   elseif ($row->payment == 3){
				   echo '<span class="badge badge-info mt-2">دفع الكترونى </span>';
			   }else{
				   echo '<span class="badge badge-warning mt-2">أمان </span>';
			   }
			    ?>
					</td>
				<td><?= (isset($row->provider->name)) ? $row->provider->name : "غير محدد" ?></td>
				<td>
					<a class="btn btn-primary" data-bs-target="#m_modal_details" data-bs-toggle="modal"  onclick="getOrderData('<?=$row->order_id?>');">
						التفاصيل
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
