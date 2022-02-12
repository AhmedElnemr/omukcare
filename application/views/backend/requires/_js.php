<!-- Jquery js-->
<script src="<?= base_url() . ADMINASSETS ?>plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap js-->
<script src="<?= base_url() . ADMINASSETS ?>plugins/bootstrap/js/popper.min.js"></script>
<script src="<?= base_url() . ADMINASSETS ?>plugins/bootstrap/js/bootstrap.min.js"></script>

<!--Othercharts js-->
<script src="<?= base_url() . ADMINASSETS ?>plugins/othercharts/jquery.sparkline.min.js"></script>

<!--Horizontalmenu js -->
<script src="<?= base_url() . ADMINASSETS ?>plugins/horizontal-menu/horizontal-menu.js"></script>

<!--Sticky js -->
<script src="<?= base_url() . ADMINASSETS ?>js/sticky.js"></script>

<!-- Circle-progress js-->
<script src="<?= base_url() . ADMINASSETS ?>plugins/circle-progress/circle-progress.min.js"></script>

<!--Sidemenu js-->
<script src="<?= base_url() . ADMINASSETS ?>plugins/sidemenu/sidemenu.js"></script>

<!-- P-scroll js-->
<script src="<?= base_url() . ADMINASSETS ?>plugins/p-scrollbar/p-scrollbar.js"></script>

<!--Sidebar js-->
<script src="<?= base_url() . ADMINASSETS ?>plugins/sidebar/sidebar.js"></script>

<!-- Select2 js -->
<script src="<?= base_url() . ADMINASSETS ?>plugins/select2/select2.full.min.js"></script>


<!-- Custom js-->
<script src="<?= base_url() . ADMINASSETS ?>js/custom.js"></script>



<?php   $this->load->view('backend/requires/config_js');?>
<script src="<?= base_url() . ASS ?>script/my_script.js?v=<?=time()?>" type="text/javascript"></script>
<script>
	$("#country-ids").on("change",function () {
		if($(this).val() != ""){
			var url = '<?=base_url()?>getCity/'+$(this).val();
			// console.log(url)
			$.ajax({
				type:'get',
				url: url,
				dataType: 'html',
				cache:false,
				success: function(html){
					$("#city-ids").html(html);
					$('#city-ids').selectpicker("refresh");
				},
				error:function(error){
					console.log(error.responseText);
				}
			});
		}
	})

	$("#type-coupon").on("change",function (){
		let typeCoupon  = $(this).val();
		if(typeCoupon == "val"){
			$("#limit_value").show();
			$("input",$(this)).attr('data-validation','required');
		}
		if(typeCoupon =="per"){
			$("#limit_value").hide();
			$("input",$(this)).removeAttr('data-validation');
		}
	})

	$("#type-announcer").on("change",function (){
		let typeAnnouncer  = $(this).val();
		if(typeAnnouncer == "doctor"){
			$("#specialization").show();
			$("input",$(this)).attr('data-validation','required');
		}
		if(typeAnnouncer =="hospital"){ //
			$("#specialization").hide();
			$("input",$(this)).removeAttr('data-validation');
		}
	})
</script>
<?php if (isset($my_footer)) { ?>
	<!----------------------------------------------------------->
	<?php if (in_array("Counters", $my_footer)): ?>
		<!-- INTERNAL Time Counter -->
		<script src="<?= base_url() . ADMINASSETS ?>plugins/counters/counterup.min.js"></script>
		<script src="<?= base_url() . ADMINASSETS ?>plugins/counters/waypoints.min.js"></script>
		<script src="<?= base_url() . ADMINASSETS ?>plugins/counters/counter.js"></script>

		<!-- INTERNAL Counters -->
	    <!--
		<script src="<?= base_url() . ADMINASSETS ?>plugins/countdown/countdowntime.js"></script>
		<script src="<?= base_url() . ADMINASSETS ?>js/countdown.js"></script>
		-->
	<?php endif; ?>
	<!----------------------------------------------------------->
	<?php if(in_array("flot_chart",$my_footer)):?>
		<!-- INTERNAL Flot Charts js-->
		<script src="<?= base_url() . ADMINASSETS ?>plugins/flot/jquery.flot.js"></script>
		<script src="<?= base_url() . ADMINASSETS ?>plugins/flot/jquery.flot.fillbetween.js"></script>
		<script src="<?= base_url() . ADMINASSETS ?>plugins/flot/jquery.flot.pie.js"></script>
		<script src="<?= base_url() . ADMINASSETS ?>js/flot.js"></script>
	<?php endif;  ?>
	<!----------------------------------------------------------->
	<?php if(in_array("multi_upload",$my_footer)):?>
		<script type="text/javascript" src="<?=base_url().ASS?>multi-upload/imageuploadify.min.js?v=<?=VER?>"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.multi-up').imageuploadify();
			})
		</script>
	<?php endif;  ?>
	<!----------------------------------------------------------->
	<?php if (in_array("date", $my_footer)): ?>
		<script src="<?=base_url().ASS?>date-picker/jquery.datetimepicker.full.js?v=<?=VER?>"></script>
		<script>
			$('.datepicker-m').datetimepicker({
				format:'Y-m-d',
				timepicker:  false
			});
		</script>
	<?php endif ?>
	<!----------------------------------------------------------->
	<?php if (in_array("upload",$my_footer)): ?>
		<!-- file upload -->
		<script src="<?=base_url().ASS ?>dropify/js/jasny-bootstrap.js?v=<?=VER?>"></script>
		<!-- This is data table -->
		<!-- jQuery file upload -->
		<script src="<?=base_url().ASS ?>dropify/dist/js/dropify.min.js?v=<?=VER?>"></script>
		<script>
			$(document).ready(function () {
				// Basic
				$('.dropify').dropify();
				// Translated
				$('.dropify-fr').dropify({
					messages: {
						default: 'Glissez-d�posez un fichier ici ou cliquez',
						replace: 'Glissez-d�posez un fichier ou cliquez pour remplacer',
						remove: 'Supprimer',
						error: 'D�sol�, le fichier trop volumineux'
					}
				});
				// Used events
				var drEvent = $('#input-file-events').dropify();
				drEvent.on('dropify.beforeClear', function (event, element) {
					return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
				});
				drEvent.on('dropify.afterClear', function (event, element) {
					alert('File deleted');
				});
				drEvent.on('dropify.errors', function (event, element) {
					console.log('Has Errors');
				});
				var drDestroy = $('#input-file-to-destroy').dropify();
				drDestroy = drDestroy.data('dropify')
				$('#toggleDropify').on('click', function (e) {
					e.preventDefault();
					if (drDestroy.isDropified()) {
						drDestroy.destroy();
					} else {
						drDestroy.init();
					}
				})
			});
		</script>
	<?php endif ?>
	<!----------------------------------------------------------->
	<?php if (in_array("table", $my_footer)) : ?>
		<!-- datatables-->
		<script src="<?= base_url().ASS ?>mydatatables/js/jquery.dataTables.min.js?v=<?=VER?>"></script>
		<script src="<?= base_url().ASS ?>mydatatables/js/dataTables.buttons.min.js?v=<?=VER?>"></script>
		<script src="<?= base_url().ASS ?>mydatatables/js/buttons.flash.min.js?v=<?=VER?>"></script>
		<script src="<?= base_url().ASS ?>mydatatables/js/jszip.min.js?v=<?=VER?>"></script>
		<script src="<?= base_url().ASS ?>mydatatables/js/pdfmake.min.js?v=<?=VER?>"></script>
		<script src="<?= base_url().ASS ?>mydatatables/js/vfs_fonts.js?v=<?=VER?>"></script>
		<script src="<?= base_url().ASS ?>mydatatables/js/buttons.html5.min.js?v=<?=VER?>"></script>
		<script src="<?= base_url().ASS ?>mydatatables/js/buttons.print.min.js?v=<?=VER?>"></script>
		<script src="<?= base_url().ASS ?>mydatatables/js/buttons.colVis.min.js?v=<?=VER?>"></script>
		<script src="<?= base_url().ASS ?>mydatatables/js/dataTables.responsive.min.js?v=<?=VER?>" id="responsive-dt"></script>
		<script src="<?= base_url().ASS ?>mydatatables/js/plugin.js?v=<?=VER?>"></script>
	<?php endif; ?>
	<!----------------------------------------------------------->
	<?php if (in_array("valid",$my_footer)): ?>
		<script src="<?= base_url().ASS ?>validator/form-validator/jquery.form-validator.js?v=<?=VER?>"></script>
		<script>
			$(function () {
				$.validate({
					validateHiddenInputs: true,
					lang:"ar"
				});
			});
		</script>
	<?php endif ?>
	<!----------------------------------------------------------->
<?php } ?>


