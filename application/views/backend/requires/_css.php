<head>
	<!-- Meta data -->
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	<meta content="OmukCare" name="description">
	<meta content="Spruko Technologies Private Limited" name="author">
	<meta name="keywords" content="OmukCare"/>

	<!-- Title -->
	<title>OmukCare</title>
	<!--Favicon -->
	<link rel="icon" href="<?= base_url() . ADMINASSETS ?>images/brand/favicon.ico" type="image/x-icon"/>

	<!-- Bootstrap css -->
	<link href="<?= base_url() . ADMINASSETS ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet" />
	<!-- Style css -->
	<link href="<?= base_url() . ADMINASSETS ?>css/style.css" rel="stylesheet" />
	<link href="<?= base_url() . ADMINASSETS ?>css/boxed.css" rel="stylesheet" />
	<link href="<?= base_url() . ADMINASSETS ?>css/dark.css" rel="stylesheet" />
	<link href="<?= base_url() . ADMINASSETS ?>css/skin-modes.css" rel="stylesheet" />
	<!-- Animate css -->
	<link href="<?= base_url() . ADMINASSETS ?>css/animated.css" rel="stylesheet" />
	<!-- P-scroll bar css-->
	<link href="<?= base_url() . ADMINASSETS ?>plugins/p-scrollbar/p-scrollbar.css" rel="stylesheet" />
	<!---Icons css-->
	<link href="<?= base_url() . ADMINASSETS ?>css/icons.css" rel="stylesheet" />
	<!---Sidebar css-->
	<link href="<?= base_url() . ADMINASSETS ?>plugins/sidebar/sidebar.css" rel="stylesheet" />
	<!-- Select2 css -->
	<link href="<?= base_url() . ADMINASSETS ?>plugins/select2/select2.min.css" rel="stylesheet" />

	<!--begin::Page Vendors Styles -->
	<?php if (isset($my_footer)) { ?>
		<!----------------------------------------------------------->
		<?php if (in_array("date", $my_footer)): ?>
			<link rel="stylesheet" href="<?=base_url().ASS ?>date-picker/jquery.datetimepicker.css?v=<?=VER?>">
		<?php endif ?>
		<!----------------------------------------------------------->
		<?php  if(in_array("table",$my_footer)){?>
			<link rel="stylesheet" href="<?=base_url().ASS ?>mydatatables/css/jquery.dataTables.min.css?v=<?=VER?>">
			<link rel="stylesheet" href="<?=base_url().ASS ?>mydatatables/css/buttons.dataTables.min.css?v=<?=VER?>">
			<link rel="stylesheet" href="<?=base_url().ASS ?>mydatatables/css/responsive.dataTables.min.css?v=<?=VER?>">
			<link rel="stylesheet" href="<?=base_url().ASS ?>mydatatables/css/table.css?v=<?=VER?>">
		<?php }  ?>
		<!----------------------------------------------------------->
		<?php  if(in_array("multi_upload",$my_footer)){?>
			<link rel="stylesheet" href="<?=base_url().ASS ?>multi-upload/imageuploadify.min.css?v=<?=VER?>">
			<link rel="stylesheet" href="<?=base_url().ASS ?>multi-upload/style.css?v=<?=VER?>">
		<?php }  ?>
		<!----------------------------------------------------------->
		<?php if (in_array("upload", $my_footer)): ?>
			<link rel="stylesheet" href="<?=base_url().ASS ?>dropify/dist/css/dropify.min.css?v=<?=VER?>">
		<?php endif ?>
		<!----------------------------------------------------------->
	<?php } ?>
	<!--end::Page Vendors Styles -->

</head>
