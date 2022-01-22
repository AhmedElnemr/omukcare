<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title> DayStar </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="<?= base_url() . WEBASSETS ?>css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?= base_url() . WEBASSETS ?>css/font-awesome.min.css"/>
	<link href="<?= base_url() . WEBASSETS ?>css/owl.carousel.min.css" rel="stylesheet"/>
	<link href="<?= base_url() . WEBASSETS ?>css/owl.theme.default.min.css" rel="stylesheet"/>
	<link href="<?= base_url() . WEBASSETS ?>css/bootstrap-select.min.css" rel="stylesheet"/>
	<link href="<?= base_url() . WEBASSETS ?>css/nice-select.css" rel="stylesheet"/>
	<link href="<?= base_url() . WEBASSETS ?>css/animate.min.css" rel="stylesheet"/>
	<link href="<?= base_url() . WEBASSETS ?>css/hover-min.css" rel="stylesheet"/>
	<link href="<?= base_url() . WEBASSETS ?>css/main-menu.css" rel="stylesheet"/>

	<link href="<?= base_url() . WEBASSETS ?>css/dropify.min.css" rel="stylesheet"/>
	<link href="<?= base_url() . WEBASSETS ?>css/swiper.min.css" rel="stylesheet"/>
	<link rel="stylesheet" href="<?= base_url() . WEBASSETS ?>css/style.css"/>
	<link rel="stylesheet" href="<?= base_url() . ASS . "phone-input/" ?>build/css/intlTelInput.css"/>

	<?php if ($this->webLang == "ar"): ?>
		<link rel="stylesheet" href="<?= base_url() . WEBASSETS ?>css/bootstrap-rtl.css?v=<?= time() ?>"/>
	<?php endif ?>
	<link rel="stylesheet" href="<?= base_url() . WEBASSETS ?>css/responsive.css?v=<?= time() ?>"/>
	<link href="<?= base_url() . WEBASSETS ?>css/easy-responsive-tabs.css?v=<?= time() ?>" rel="stylesheet"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
		  integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body class="single-page">
<nav id="top">
	<div class="container">
		<div id="top-links" class="nav pull-left">
		</div>
	</div>
</nav>
<!--    <div id="header"></div>-->
<main>
	<div class="bg_color">
		<div class="container">
			<a class="back-home" href="<?= base_url() ?>"><i class="fas fa-home"></i></a>
			<div id="register">
				<h1><?= lang('register_msg') ?></h1>
				<div id="horizontalTab">
					<ul class="resp-tabs-list">
						<li><span><i class="fas fa-user"></i> <?= lang('client') ?> </span></li>
						<li><span><i class="fas fa-user-md"></i> <?= lang('service_provider') ?> </span></li>
						<li><span><i class="fas fa-user"></i> Distributor </span></li>

					</ul>
					<div class="resp-tabs-container">
						<div>
							<?= form_open_multipart('user-register'); ?>
							<div class="box_form clearfix">
								<h4 class="text-center"><?= lang('Create_New_Account') ?></h4>
								<div class="box_register last">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input type="text" name="Pdata[name]" class="form-control"
													   data-validation="required"
													   placeholder="<?= lang('user_name') ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" name="Pdata[email]" class="form-control unique-field"
													   field-name="email"   data-db="registrations"
													   data-validation="required" placeholder="<?= lang('emails') ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<select class="form-control" name="Pdata[gender]"
														data-validation="required" aria-required="true">
													<option value=""><?= lang('Gender') ?></option>
													<option value="1"><?= lang('Male') ?></option>
													<option value="2"><?= lang('Female') ?></option>
												</select>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<!--<input type="hidden" name="Pdata[phone_code]" value="0020">-->
												<input type="number" id="phone-country" name="Pdata[phone]"
													   field-name="phone"   data-db="registrations"
													   class="unique-field form-control" data-validation="required"
													   placeholder="<?= lang('phone') ?>">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<input type="password" name="Pdata[password]" class="form-control"
													   data-validation="required" placeholder="<?= lang('password') ?>"
													   style="margin: 0px; padding-right: 10px;">
											</div>
										</div>
										<div class="col-md-12">
											<div class="card">
												<div class="card-block">
													<h5 class="card-title"><?= lang('Photo') ?></h5>
													<input type="file" name="logo" id="input-file-now" class="dropify"/>
												</div>
											</div>
										</div>

									</div>
									<!--<div class="form-group">
										<div class="alert alert-danger">
											<strong><?/*=validation_errors()*/?>!</strong>
										</div>
									</div>-->
									<div class="form-group">
										<input class="btn_1" type="submit" onclick="getNumber();"
											   value="<?= lang('Register_Now') ?>"
											   style="margin-top: 30px;float: right">
									</div>
								</div>
							</div>
							<?= form_close() ?>
						</div>
						<div>
							<?= form_open_multipart('provider-register'); ?>
							<div class="box_form clearfix">
								<h4 class="text-center"><?= lang('Create_New_Account') ?></h4>
								<div class="box_register last">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input type="text" name="Pdata[name]" class="form-control"
													   data-validation="required"
													   placeholder="<?= lang('user_name') ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" name="Pdata[email]" class="form-control unique-field"
													   field-name="email"   data-db="registrations"
													   data-validation="required" placeholder="<?= lang('emails') ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<select class="form-control" name="Pdata[gender]"
														data-validation="required" aria-required="true">
													<option value=""><?= lang('Gender') ?></option>
													<option value="1"><?= lang('Male') ?></option>
													<option value="2"><?= lang('Female') ?></option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<!--<input type="hidden" name="Pdata[phone_code]" value="0020">-->
												<input type="number" name="Pdata[phone]" id="phone-country-1"
													   class="form-control unique-field" data-validation="required"
													   field-name="phone"   data-db="registrations"
													   placeholder="<?= lang('phone') ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="password" name="Pdata[password]" class="form-control"
													   data-validation="required" placeholder="<?= lang('password') ?>"
													   style="margin: 0px; padding-right: 10px;">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<div class="select">
													<select name="Pdata[exper]" class="form-control"
															data-validation="required" aria-required="true">
														<option value=""> <?= lang('Experience') ?> </option>
														<?php for ($x = 1; $x <= 15; $x++): ?>
															<option value="<?= $x ?>"><?= $x ?></option>
														<?php endfor ?>
													</select>
												</div>
											</div>

										</div>
										<div class="col-md-6">
											<div class="form-group">
												<div class="select">
													<select name="Pdata[service_id]" id="service_id"
															class="form-control" data-validation="required"
															aria-required="true">
														<option value=""> <?= lang('Department') ?> </option>
														<?php if (isset($service) && !empty($service)): ?>
															<?php foreach ($service as $row): ?>
																<option
																	value="<?= $row->service_id ?>"> <?= $row->trans->title ?> </option>
															<?php endforeach ?>
														<?php endif ?>
													</select>
												</div>
											</div>
										</div>
										<!----------------------------------------------->
										<div class="col-md-6">
											<div class="form-group">
												<div class="select">
													<select name="Pdata[area_id]" class="form-control"
															data-validation="required" aria-required="true">
														<option value=""> <?= lang('Region') ?> </option>
														<?php if (isset($area) && !empty($area)): ?>
															<?php foreach ($area as $row): ?>
																<option
																	value="<?= $row->area_id ?>"> <?= $row->word->title ?> </option>
															<?php endforeach ?>
														<?php endif ?>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-6" id="specialization"></div>
										<div class="col-md-12">
											<div class="form-group">
												<input type="text" name="Pdata[advertiser_code]" class="form-control"
													   placeholder="<?= lang('Registration by another service provider Service provide code') ?>">
											</div>
										</div>
										<!----------------------------------------------->
										<div class="col-md-12">
											<div class="form-group">
												<textarea name="Pdata[about]" class="form-control"
														  data-validation="required"
														  rows="6"><?= lang('About_Me') ?></textarea>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<h5 class="card-title"><?= lang('Photo') ?></h5>
												<input type="file" name="logo" id="input-file-now" class="dropify"/>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<h5 class="card-title"><?= lang('address') ?></h5>
												<?= (isset($maps)) ? $maps['html'] : ""; ?>
												<input type="hidden" name="Pdata[google_lat]" id="lat"
													   value="30.043489"/>
												<input type="hidden" name="Pdata[google_long]" id="lng"
													   value="31.235291"/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<input class="btn_1" type="submit" onclick="getNumber();"
											   value="<?= lang('Register_Now') ?>"
											   style="margin-top: 30px;float: right">
									</div>
								</div>
							</div>
							<?= form_close() ?>
						</div>
						<div>
							<?= form_open_multipart('create-register-agent'); ?>
							<div class="box_form clearfix">
								<h4 class="text-center"><?= lang('Create_New_Account') ?></h4>
								<div class="box_register last">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" name="name_ar" class="form-control"
													   data-validation="required"
													   placeholder="Name in Arabic">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" name="name_en" class="form-control"
													   data-validation="required"
													   placeholder="Name in English">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" name="email" class="form-control unique-field"
													   field-name="email"   data-db="users"
													   data-validation="required" placeholder="<?= lang('emails') ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" name="user_username" class="form-control unique-field"
													   field-name="user_username"   data-db="users"
													   data-validation="required" placeholder="User name">
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<input type="password" name="password" class="form-control"
													   data-validation="required" placeholder="<?= lang('password') ?>"
													   style="margin: 0px; padding-right: 10px;">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="password"  class="form-control"
													   data-validation="required" placeholder="Confirm Password"
													   style="margin: 0px; padding-right: 10px;">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<!--<input type="hidden" name="Pdata[phone_code]" value="0020">-->
												<input type="number" id="phone-country" name="Pdata[phone]"
													   field-name="phone"   data-db="registrations"
													   class="unique-field form-control" data-validation="required"
													   placeholder="<?= lang('phone') ?>">
											</div>
										</div>
										<div class="col-md-12">
											<div class="card">
												<div class="card-block">
													<h5 class="card-title"><?= lang('Photo') ?></h5>
													<input type="file" name="logo" id="input-file-now" class="dropify"/>
												</div>
											</div>
										</div>

									</div>
									<!--<div class="form-group">
										<div class="alert alert-danger">
											<strong><?/*=validation_errors()*/?>!</strong>
										</div>
									</div>-->
									<div class="form-group">
										<input class="btn_1" type="submit" name="create" onclick="getNumber();"
											   value="<?= lang('Register_Now') ?>"
											   style="margin-top: 30px;float: right">
									</div>
								</div>
							</div>
							<?= form_close() ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>


<?php if (isset($maps)) { ?>
	<script type="text/javascript">
		var centreGot = false;
	</script>
	<?= $maps['js']; ?>
<?php } ?>
<?php   $this->load->view('backend/requires/config_js');?>
<script src="<?= base_url() . WEBASSETS ?>js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url() . WEBASSETS ?>js/popper.min.js"></script>
<script src="<?= base_url() . WEBASSETS ?>js/bootstrap.min.js"></script>
<script src="<?= base_url() . WEBASSETS ?>js/owl.carousel.min.js"></script>
<script src="<?= base_url() . WEBASSETS ?>js/jquery.nice-select.min.js"></script>
<script src="<?= base_url() . WEBASSETS ?>js/bootstrap-select.min.js"></script>
<script src="<?= base_url() . WEBASSETS ?>js/easy-responsive-tabs.js"></script>
<script src="<?= base_url() . WEBASSETS ?>js/dropify.min.js"></script>
<script src="<?= base_url() . WEBASSETS ?>js/swiper.min.js"></script>
<script src="<?= base_url() . WEBASSETS ?>js/custom.js"></script>
<script src="<?= base_url() . ASS ?>script/my_script.js?v=<?=time()?>" type="text/javascript"></script>

<script src="<?= base_url() . ASS . "phone-input/" ?>build/js/intlTelInput.js"></script>
<script src="<?= base_url() . ASS . "phone-input/" ?>build/js/utils.js"></script>
<script>
	var objPhone = {
		autoHideDialCode: true,
		hiddenInput: "full_number",
		localizedCountries: {'eg': 'Egypt'},
		onlyCountries: ['eg'/*,'sa'*/],
		separateDialCode: true,
		utilsScript: "build/js/utils.js",
		// allowDropdown: false,
		// autoPlaceholder: "off",
		// dropdownContainer: document.body,
		// excludeCountries: ["us"],
		// formatOnDisplay: false,
		// geoIpLookup: function(callback) {
		//   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
		//     var countryCode = (resp && resp.country) ? resp.country : "";
		//     callback(countryCode);
		//   });
		// },
		// initialCountry: "auto",
		// nationalMode: false,
		// placeholderNumberType: "MOBILE",
		// preferredCountries: ['cn', 'jp'],
	}
	var input = document.querySelector("#phone-country");
	window.intlTelInput(input, objPhone);
	var inputOne = document.querySelector("#phone-country-1");
	window.intlTelInput(inputOne, objPhone);
</script>


<script>
	$(document).ready(function () {
		$('#horizontalTab').easyResponsiveTabs({
			type: 'default', //Types: default, vertical, accordion
			width: 'auto', //auto or any width like 600px
			fit: true, // 100% fit in a container
			closed: 'accordion', // Start closed if in accordion view
			activate: function (event) { // Callback function if tab is switched
				var $tab = $(this);
				var $info = $('#tabInfo');
				var $name = $('span', $info);
				$name.text($tab.text());
				$info.show();
			}
		});
	});

</script>
<script>
	$(document).ready(function () {
		// Basic
		$('.dropify').dropify();
	});

</script>
<script>
	$("#service_id").on("change", function () {
		var serviceId = $(this).val();
		$.ajax({
			type: 'get',
			url: '<?= base_url() ?>specialization/' + serviceId,
			dataType: 'html',
			cache: false,
			success: function (html) {
				$("#specialization").html(html);
			},
			error: function (error) {
				console.log(error.responseText);
			}
		});
	});

</script>

<script src="<?= base_url() . ASS ?>validator/jquery.form-validator.js?v=<?= VER ?>"></script>
<script>
	$(function () {
		$.validate({
			validateHiddenInputs: true
		});
	});
</script>

</body>

</html>
