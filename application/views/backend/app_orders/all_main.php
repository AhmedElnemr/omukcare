<div class="m-portlet__body">

    <div class="form-group m-form__group row">
        <div class="col-lg-4">
            <label>من تاريخ :</label>
            <input type="date" name="from_date" value="<?=date("Y-m-d",strtotime('first day of this month', time()))?>"
                   class="form-control m-input searchOption">
        </div>
        <div class="col-lg-4">
            <label>الى تاريخ :</label>
            <input type="date" name="to_date" value="<?=date("Y-m-d",strtotime('last day of this month', time()))?>"
                   class="form-control m-input  searchOption">
        </div>
        <div class="col-lg-4">
            <br>
            <input type="hidden" name="type" class="searchOption" value="<?=$type?>">
            <button type="button" class="btn btn-primary" onclick="appOrdersMain();">
                بحث
            </button>
        </div>
    </div>



    <?php if(isset($data_table ) && $data_table!=null && !empty($data_table)):?>
		<table id="myTable" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th>#</th>
				<th>رقم الطلب   </th>
				<th>العميل   </th>
				<th>إجمالى الطلب    </th>
				<th>التفاصيل     </th>
				<?php if ($type == "ready"): ?>
					<th> التحكم</th>
				<?php endif ?>
			</tr>
			</thead>
            <tbody id="option_result">
			<?php $this->load->view('backend/app_orders/main_table');?>
            </tbody>
		</table>
	<?php else:
		echo '<div class="alert alert-danger  alert-rounded">
                  <i class="ti-user"></i> لا يوجد بيانات  
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span> </button>
             </div>';
	endif;?>
</div>
