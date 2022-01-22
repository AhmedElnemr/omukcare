<table style="clear: both" class="table table-bordered table-striped">
	<tbody>
	<tr>
		<td width="35%">رقم الطلب </td>
		<td width="65%"><?=$one->order_id?></td>
	</tr>
	<tr>
		<td width="35%">إسم العميل</td>
		<td width="65%"><?=(isset($one->client->name))? $one->client->name:"--"?></td>
	</tr>

	<tr>
		<td width="35%">هاتف العميل</td>
		<td width="65%"><?=$one->phone;?></td>
	</tr>
	<tr>
		<td width="35%">هاتف أخر </td>
		<td width="65%"><?= $one->other_phone; ?></td>
	</tr>

	<?php if(!empty($one->provider)){?>
		<tr>
			<td width="35%">مقدم الخدمة</td>
			<td width="65%"><?=(isset($one->provider->name))? $one->provider->name:"--"?></td>
		</tr>

		<tr>
			<td width="35%">هاتف مقدم الخدمة</td>
			<td width="65%"><?=(isset($one->provider->phone))? $one->provider->phone:"--"?></td>
		</tr>
	<?php }?>

	<tr>
		<td width="35%">الخدمة </td>
		<td width="65%"><?=(isset($one->sub_service->trans->title))? $one->sub_service->trans->title:"غير محدد"?></td>
	</tr>
	<tr>
		<td width="35%">المنطقة </td>
		<td width="65%"><?=(isset($one->area->title))? $one->area->title:"غير محدد"?></td>
	</tr>

	<tr>
		<td width="35%">التاريخ</td>
		<td width="65%"><?=date("Y-m-d",$one->order_date)?></td>
	</tr>

	<tr>
		<td width="35%">التوقيت</td>
		<td width="65%"><?= date("H:s", $one->order_time) ?></td>
	</tr>

	<tr>
		<td width="35%"> العنوان </td>
		<td width="65%"><?=$one->address?></td>
	</tr>
	<tr>
		<td width="35%">العمر</td>
		<td width="65%"><?=$one->age?></td>
	</tr>
	<tr>
		<td width="35%">عدد المرات</td>
		<td width="65%"><?=$one->num_times?></td>
	</tr>
	<tr>
		<td width="35%">عدد المرضى</td>
		<td width="65%"><?=$one->num_patients?></td>
	</tr>
	<tr>
		<td width="35%">السعر</td>
		<td width="65%"><?=$one->price?></td>
	</tr>


	<tr>
		<td width="35%">الوصف  </td>
		<td width="65%"><?=$one->desc?></td>
	</tr>
	<tr>
		<td width="35%">تفاصيل اخرى </td>
		<td width="65%"><?=$one->other_details?></td>
	</tr>
	<tr>
		<td width="35%">gender</td>
		<td width="65%">
			<?php
			  if($one->gender == 1){
			  	echo "ذكر";
			  }elseif($one->gender == 2){
			  	echo 'انثى ';
			  }else{
			  	echo "ذكر أو انثى ";
			  }
			?>
		</td>
	</tr>

	<tr>
		<td width="35%">طريقة الدفع</td>
		<td width="65%">
			<?php

		   if($one->payment == 1){
			   echo '<button type="button" class="btn btn-outline-accent m-btn m-btn--outline-2x ">كاش</button>';
		   }
		   elseif ($one->payment == 2){
			   echo '<button type="button" class="btn btn-outline-danger m-btn m-btn--outline-2x ">فودافون كاش </button>';
		   }
		   elseif ($one->payment == 3){
			   echo '<button type="button" class="btn btn-outline-dark m-btn m-btn--outline-2x ">دفع الكترونى </button>';
		   }else{
			   echo '<button type="button" class="btn btn-outline-primary m-btn m-btn--outline-2x ">أمان </button>';
		   }
		   ?>
		</td>
	</tr>


	</tbody>
</table>
