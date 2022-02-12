<!--Page header-->
<div class="page-header d-xl-flex d-block">
	<div class="page-leftheader">
		<h4 class="page-title">عمق <span class="font-weight-normal text-muted ms-2">للرعاية </span></h4>
	</div>
	<div class="page-rightheader ms-md-auto">
		<div class="d-flex align-items-end flex-wrap my-auto end-content breadcrumb-end">
			<div class="d-flex">
				<div class="header-datepicker me-3">
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="feather feather-calendar"></i>
							</div>
						</div>
						<input class="form-control fc-datepicker" value="<?=date("Y-m-d")?>" readonly=""  type="text">
					</div>
				</div>

			</div>
			<div class="d-lg-flex d-block">
				<div class="btn-list">
                    	<button  class="btn btn-light"  onclick="location.href = '<?=base_url()."admin-contact"?>';" title="رسائل التواصل">
							<i class="feather feather-mail"></i>
						</button>

						<button  class="btn btn-primary" onclick="location.href = '<?=base_url()."main-setting"?>';"  title="بيانات الموقع">
							<i class="feather feather-info"></i>
						</button>

				</div>
			</div>
		</div>
	</div>
</div>
<!--End Page header-->
<!-- Row -->
<div class="row">
	<div class="col-lg-3">
		<div class="card">
			<!--<div class="card-header border-bottom-0">
				<h3 class="card-title">عدد العملاء</h3>
			</div>-->
			<div class="card-body text-center">
				<div class="avatar avatar-xl brround bg-success text-center">
					<i class="feather feather-users"></i>
				</div>
				<h5 class="mt-4">العملاء</h5>
				<h2 class="counter fs-40"><?=$client?></h2>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="card">
			<!--<div class="card-header border-bottom-0">
				<h3 class="card-title">مقدمى الخدمات</h3>
			</div>-->
			<div class="card-body text-center">
				<div class="avatar avatar-xl brround bg-orange text-center">
					<i class="fe fe-user-plus"></i>
				</div>
				<h5 class="mt-4">مقدمى الخدمات</h5>
				<h2 class="counter fs-40"><?=$providers?></h2>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="card">
			<!--<div class="card-header border-bottom-0">
				<h3 class="card-title">مقدمى الخدمات</h3>
			</div>-->
			<div class="card-body text-center">
				<div class="avatar avatar-xl brround bg-info text-center">
					<i class="fa fa-shopping-bag"></i>
				</div>
				<h5 class="mt-4">الطلبات</h5>
				<h2 class="counter fs-40"><?=$orders?></h2>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="card">
			<!--<div class="card-header border-bottom-0">
				<h3 class="card-title">FloatNumbers counter</h3>
			</div>-->
			<div class="card-body text-center">
				<div class="avatar avatar-xl brround bg-primary text-center">
					<i class="feather feather-dollar-sign"></i>
				</div>
				<h5 class="mt-4">الايرادات</h5>
				<h2 class="fs-40"><span class="counter"><?=$orders_com?></span> ريـال </h2>
			</div>
		</div>
	</div>
</div>



<div class="row">
	<div class="col-xl-3 col-lg-3 col-md-12">
		<div class="card">
			<div class="card-body">
				<svg class="card-custom-icon text-success icon-dropshadow-success" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
					<path opacity=".0" d="M3.31,11 L5.51,19.01 L18.5,19 L20.7,11 L3.31,11 Z M12,17 C10.9,17 10,16.1 10,15 C10,13.9 10.9,13 12,13 C13.1,13 14,13.9 14,15 C14,16.1 13.1,17 12,17 Z"></path>
					<path d="M22,9 L17.21,9 L12.83,2.44 C12.64,2.16 12.32,2.02 12,2.02 C11.68,2.02 11.36,2.16 11.17,2.45 L6.79,9 L2,9 C1.45,9 1,9.45 1,10 C1,10.09 1.01,10.18 1.04,10.27 L3.58,19.54 C3.81,20.38 4.58,21 5.5,21 L18.5,21 C19.42,21 20.19,20.38 20.43,19.54 L22.97,10.27 L23,10 C23,9.45 22.55,9 22,9 Z M12,4.8 L14.8,9 L9.2,9 L12,4.8 Z M18.5,19 L5.51,19.01 L3.31,11 L20.7,11 L18.5,19 Z M12,13 C10.9,13 10,13.9 10,15 C10,16.1 10.9,17 12,17 C13.1,17 14,16.1 14,15 C14,13.9 13.1,13 12,13 Z"></path>
				</svg>
				<p class=" mb-1 ">الطلبات الجدية </p>
				<h2 class="mb-1 font-weight-bold"><?=$orders_new?></h2>
				<!--<span class="mb-1 text-muted"><span class="text-danger"><i class="fa fa-caret-down  me-1"></i> 43.2</span> than last month</span>-->
				<div class="progress progress-sm mt-3 bg-success-transparent">
					<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: <?=(($orders_new / $orders) *100)?>%"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-3 col-md-12">
		<div class="card">
			<div class="card-body">
				<svg class="card-custom-icon text-primary icon-dropshadow-primary" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
					<path opacity=".0" d="M12.07,6.01 C8.2,6.01 5.07,9.14 5.07,13.01 C5.07,16.88 8.2,20.01 12.07,20.01 C15.94,20.01 19.07,16.88 19.07,13.01 C19.07,9.14 15.94,6.01 12.07,6.01 Z M13.07,14.01 L11.07,14.01 L11.07,8.01 L13.07,8.01 L13.07,14.01 Z"></path>
					<path d="M9.07,1.01 L15.07,1.01 L15.07,3.01 L9.07,3.01 L9.07,1.01 Z M11.07,8.01 L13.07,8.01 L13.07,14.01 L11.07,14.01 L11.07,8.01 Z M19.1,7.39 L20.52,5.97 C20.09,5.46 19.62,4.98 19.11,4.56 L17.69,5.98 C16.14,4.74 14.19,4 12.07,4 C7.1,4 3.07,8.03 3.07,13 C3.07,17.97 7.09,22 12.07,22 C17.05,22 21.07,17.97 21.07,13 C21.07,10.89 20.33,8.93 19.1,7.39 Z M12.07,20.01 C8.2,20.01 5.07,16.88 5.07,13.01 C5.07,9.14 8.2,6.01 12.07,6.01 C15.94,6.01 19.07,9.14 19.07,13.01 C19.07,16.88 15.94,20.01 12.07,20.01 Z"></path></svg>
				<p class=" mb-1 ">الطلبات الحالية </p>
				<h2 class="mb-1 font-weight-bold"><?=$orders_current?></h2>
				<!--<span class="mb-1 text-muted"><span class="text-success">
						<i class="fa fa-caret-up  me-1"></i> 19.8</span> than last month
				</span>-->
				<div class="progress progress-sm mt-3 bg-primary-transparent">
					<div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" style="width: <?=(($orders_current / $orders) *100)?>%"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-3 col-md-12">
		<div class="card">
			<div class="card-body">
				<svg class="card-custom-icon text-danger icon-dropshadow-danger" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
					<path d="M17.65,6.35 C16.2,4.9 14.21,4 12,4 C7.58,4 4.01,7.58 4.01,12 C4.01,16.42 7.58,20 12,20 C15.73,20 18.84,17.45 19.73,14 L17.65,14 C16.83,16.33 14.61,18 12,18 C8.69,18 6,15.31 6,12 C6,8.69 8.69,6 12,6 C13.66,6 15.14,6.69 16.22,7.78 L13,11 L20,11 L20,4 L17.65,6.35 Z"></path></svg>
				<p class=" mb-1 ">الطلبات السابقة </p>
				<h2 class="mb-1 font-weight-bold"><?=$orders_old?></h2>
				<!--<span class="mb-1 text-muted"><span class="text-success"><i class="fa fa-caret-up  me-1"></i> 0.8%</span> than last month</span>
				-->
				<div class="progress progress-sm mt-3 bg-danger-transparent">
					<div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" style="width: <?=(($orders_current / $orders) *100)?>%"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-3 col-md-12">
		<div class="card">
			<div class="card-body">
				<svg class="card-custom-icon text-danger icon-dropshadow-danger" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
					<path d="M17.65,6.35 C16.2,4.9 14.21,4 12,4 C7.58,4 4.01,7.58 4.01,12 C4.01,16.42 7.58,20 12,20 C15.73,20 18.84,17.45 19.73,14 L17.65,14 C16.83,16.33 14.61,18 12,18 C8.69,18 6,15.31 6,12 C6,8.69 8.69,6 12,6 C13.66,6 15.14,6.69 16.22,7.78 L13,11 L20,11 L20,4 L17.65,6.35 Z"></path></svg>
				<p class=" mb-1 ">الطلبات الملغية  </p>
				<h2 class="mb-1 font-weight-bold"><?=$orders_cancel?></h2>
				<!--<span class="mb-1 text-muted"><span class="text-success"><i class="fa fa-caret-up  me-1"></i> 0.8%</span> than last month</span>
				-->
				<div class="progress progress-sm mt-3 bg-danger-transparent">
					<div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" style="width: <?=(($orders_cancel / $orders) *100)?>%"></div>
				</div>
			</div>
		</div>
	</div>

</div>


