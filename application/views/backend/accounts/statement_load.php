<?php if (isset($data_table) && $data_table != null && !empty($data_table)): ?>
	<table id="myTable" class="table table-bordered table-striped">
		<thead>
		<tr>
			<th>#</th>
			<th>التاريخ</th>
			<th>الحركة</th>
			<th>البيان</th>
			<th> دائن</th>
			<th>مدين</th>
			<th>الرصيد</th>
		</tr>
		</thead>
		<?php $x = 1; $balance = 0 ;
		foreach ($data_table as $row):
			$balance += ($row->provider - $row->company)?>
			<tr>
				<td><?= $x++ ?></td>
				<td><?= date("Y-m-d", $row->date) ?></td>
				<td>
					<?php
					switch ($row->type) {
						case "commission":
							echo " عمولة ١٪؜ ";
							break;
						case "order_to_company":
							echo "طلب (كاش)";
							break;
						case "order_to_provider":
							echo "عموله طلب ";
							break;
						case "cashing":
							echo "سند صرف";
							break;
						case "exchange":
							echo "سند قبض ";
							break;
					}
					?>
				</td>
				<td><?=  $row->content ?></td>
				<td><?=  $row->provider ?></td>
				<td><?=  $row->company ?></td>
				<td><?=  $balance ?></td>
			</tr>
		<?php endforeach; ?>
		<tr>
			<td colspan="6">الرصيد الختامى </td>
			<td><?=  $balance ?></td>
		</tr>

	</table>
<?php else:
	echo '<div class="alert alert-danger  alert-rounded">
                  <i class="ti-user"></i> لا يوجد بيانات  
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span> </button>
             </div>';
endif; ?>
