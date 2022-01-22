<table style="clear: both" class="table table-bordered table-striped">
	<tbody>
	<tr>
		<td width="35%">رقم الطلب</td>
		<td width="65%"><?= $main_order->id ?></td>
	</tr>
	<tr>
		<td width="35%">إسم العميل</td>
		<td width="65%"><?= (isset($main_order->client->name)) ? $main_order->client->name : "--" ?></td>
	</tr>
	<tr>
		<td width="35%">هاتف العميل</td>
		<td width="65%"><?= (isset($main_order->client->phone)) ? $main_order->client->phone : "--" ?></td>
	</tr>
	<tr>
		<td width="35%">تاريخ التوصيل</td>
		<td width="65%"><?= date("Y-m-d", $main_order->delivery_date) ?></td>
	</tr>
	<tr>
		<td width="35%"> وقت التوصيل</td>
		<td width="65%"><?= date("H:i", $main_order->delivery_time) ?></td>
	</tr>
	<tr>
		<td width="35%"> العنوان</td>
		<td width="65%"><?= $main_order->address ?></td>
	</tr>
	</tbody>
</table>

<?php if(isset($order_details) && !empty($order_details)):?>
<table id="myTable" class="table table-bordered table-striped">
	<thead>
	<tr>
		<th>الصورة</th>
		<th>المنتج </th>
		<th> الكمية  </th>
		<th>الاجمالى  </th>
		<?php if (isset($main)): ?>
			<th>الوكيل</th>
		<?php endif ?>
	</tr>
	</thead>
	<?php foreach($order_details as $row):?>
		<tr>
			<td>
			<?php if (!empty($row->product->image) && is_file(IMAGEPATH . $row->product->image)): ?>
				<a class="image-popup-vertical-fit" href="<?= base_url() . IMAGEPATH . $row->product->image ?>"
				   title="صورة  ">
					<img src="<?= base_url() . IMAGEPATH . $row->product->image ?>" alt="image" class="img-thumbnail"
						 width="100" height="100"/> </a>
			<?php else: ?>
				<img src="<?= base_url() . FAVICONPATH .USERIMAGE?>" class="img-thumbnail"  width="100" height="100" alt=""/>
			<?php endif ?>
			</td>
			<td><?=(isset($row->product->word->title))? $row->product->word->title:"غير محدد"?></td>
			<td><?=$row->amount?></td>
			<td><?=$row->cost?></td>
			<?php if (isset($main)): ?>
				<td><?=(isset($row->partner->word->title))? $row->partner->word->title:"غير محدد"?></td>
			<?php endif ?>
		</tr>
	<?php endforeach ;?>
</table>
<?php endif ;?>


