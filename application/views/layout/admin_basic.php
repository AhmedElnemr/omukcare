<!DOCTYPE html>
<html lang="ar" dir="rtl">
<?php $this->load->view('backend/requires/_css'); ?>
<body class="app sidebar-mini rtl">

<!---Global-loader-->
<div id="global-loader">
	<img src="<?= base_url() . ADMINASSETS ?>/images/svgs/loader.svg" alt="loader">
</div>
<div class="page">
	<div class="page-main">
		<!--app header-->
		<?php $this->load->view('backend/requires/header'); ?>
		<!--/app header-->

		<!--/Horizontal-main -->
		<?php
		if ($_SESSION["user_type"] == "admin") {
			$this->load->view('backend/requires/sidebar');
		} else {
			$this->load->view('backend/requires/sidebar_market');
		}
		?>
		<!--/Horizontal-main -->

		<!-- App-content opened -->
		<div class="main-content">
			<div class="container">
				<?php $this->load->view('backend/' . $subview); ?>
			</div>
		</div>
		<!-- end app-content-->
	</div>
	<!--Footer-->
	<?php $this->load->view('backend/requires/footer'); ?>
	<!-- End Footer-->

	<!--------------------- Model  -->
	<div class="modal fade" id="m_modal_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		 aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">التفاصيل</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="option_details">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
				</div>
			</div>
		</div>
	</div>
	<!--------------------- Model  -->

</div>
<a href="#top" id="back-to-top"><span class="feather feather-chevrons-up"></span></a>
<?php $this->load->view('backend/requires/_js'); ?>
</body>
</html>
