<html lang="en" dir="ltr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="Oumk Care">
	<link href="<?=base_url().WEBASSETS ?>images/logo/favicon.png" rel="icon">
	<title>Oumk Care</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&amp;family=Roboto:wght@400;700&amp;display=swap">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
	<link rel="stylesheet" href="<?=base_url().WEBASSETS ?>css/libraries.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"/>
	<link rel="stylesheet" href="<?=base_url().WEBASSETS ?>css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?=base_url().WEBASSETS ?>css/owl.theme.default.min.css">
	<link rel="stylesheet" href="<?=base_url().WEBASSETS ?>css/style.css">
</head>

<body>
<div class="wrapper login-page">
	<div class="overlay"></div>
	<!-- Demo header-->
	<section class="header">
		<div class="container py-4">
			<header class="text-center text-white">
				<h5 class="display-4"><?=lang('login_msg')?></h5>
				<p class="font-italic">
					<a href="<?=base_url()?>">
						<u><?=lang("home")?></u>
					</a>
				</p>
			</header>


			<div class="row">
				<div class="col-md-3">
					<!-- Tabs nav -->
					<div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link mb-3 p-3 shadow active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
							<i class="fas fa-sign-in-alt mr-2"></i>
							<span class="font-weight-bold small text-uppercase"><?= lang("login") ?></span></a>

						<a class="nav-link mb-3 p-3 shadow" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
							<i class="fas fa-user mr-2"></i>
							<span class="font-weight-bold small text-uppercase"><?= lang('client') ?></span></a>

						<a class="nav-link mb-3 p-3 shadow" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
							<i class="fas fa-user-md mr-2"></i>
							<span class="font-weight-bold small text-uppercase"> <?= lang('service_provider') ?></span></a>
					</div>
				</div>


				<div class="col-md-9">
					<!-- Tabs content -->
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
							<h4 class="font-italic mb-4">Client Sign Up</h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="phone" class="form-control" placeholder="User Name">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="Email" name="Password" class="form-control" placeholder="Email">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<select class="form-control" name="Pdata[gender]" data-validation="required" aria-required="true">
											<option value="">Gender</option>
											<option value="1">Male</option>
											<option value="2">Female</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="number" class="form-control" placeholder="Phone"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input type="password" class="form-control" placeholder="Password"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input type="file" name="logo" id="input-file-now" class="dropify"/>
									</div>
								</div>
							</div>
							<input class="form-control signin" type="submit" value="Sign UP"/>
						</div>

						<div class="tab-pane fade shadow rounded bg-white show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
							<h4 class="font-italic mb-4"><?= lang("login") ?></h4>

							<div class="row">
								<?=form_open_multipart('web-auth');  ?>
								<div class="col-md-12">
									<div class="form-group">
										<input type="tel" name="phone" class="form-control" placeholder="<?=lang("phone")?>">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="password" name="Password" class="form-control" placeholder="<?=lang("password")?>">
									</div>
								</div>
							<!--	<a href="<?/*=base_url().WEBASSETS */?>#0" class="forgot"><small><?=lang('Forget_Password')?>  ? </small></a>-->
							</div>
							<input class="form-control signin" type="submit" value="<?=lang("login")?>"/>
							<?=form_close()?>
						</div>

						<div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
							<h4 class="font-italic mb-4">Provider Sign Up</h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="phone" class="form-control" placeholder="User Name">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="Email" name="Password" class="form-control" placeholder="Email">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<select class="form-control" name="Pdata[gender]" data-validation="required" aria-required="true">
											<option value="">Gender</option>
											<option value="1">Male</option>
											<option value="2">Female</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="number" class="form-control" placeholder="Phone"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="password" class="form-control" placeholder="Password"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<select class="form-control" name="Pdata[gender]" data-validation="required" aria-required="true">
											<option value="">Experience</option>
											<option value="1">1</option><option value="2">2</option>
											<option value="3">3</option><option value="4">4</option>
											<option value="5">5</option><option value="6">6</option>
											<option value="7">7</option><option value="8">8</option>
										</select>
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<select class="form-control" name="Pdata[gender]" data-validation="required" aria-required="true">
											<option value="">Department</option>
											<option value="1">1</option><option value="2">2</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<select class="form-control" name="Pdata[gender]" data-validation="required" aria-required="true">
											<option value="">Region</option>
											<option value="1">Cairo</option><option value="2">Alex</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" class="form-control"
											   placeholder="Registration by another service provider Service provide code"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
                            <textarea name="Pdata[desc]" data-validation="required"
									  placeholder="About Me" class="form-control" rows="4"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input type="file" name="logo" id="input-file-now" class="dropify"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<iframe frameborder="0" height="200" width="100%"
												src="<?=base_url().WEBASSETS ?>https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d110502.6038954614!2d31.328505151458963!3d30.059618470346624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583fa60b21beeb%3A0x79dfb296e8423bba!2z2KfZhNmC2KfZh9ix2KnYjCDZhdit2KfZgdi42Kkg2KfZhNmC2KfZh9ix2KnigKw!5e0!3m2!1sar!2seg!4v1642315862499!5m2!1sar!2seg"></iframe>
									</div>
								</div>
							</div>
							<input class="form-control signin" type="submit" value="Sign UP"/>
						</div>


					</div>
				</div>
			</div>
		</div>
	</section>


</div><!-- /.wrapper -->

<script src="<?=base_url().WEBASSETS ?>js/jquery-3.5.1.min.js"></script>
<script src="<?=base_url().WEBASSETS ?>js/plugins.js"></script>
<!-- <script src="<?=base_url().WEBASSETS ?>js/bootstrap.min.js"></script> -->
<script src="<?=base_url().WEBASSETS ?>js/owl.carousel.min.js"></script>
<script src="<?=base_url().WEBASSETS ?>js/main.js"></script>
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script>
	$('.dropify').dropify();
</script>





</body></html>
