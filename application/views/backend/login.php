<!DOCTYPE html>
<html lang="ar" dir="rtl">
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

	<!---Icons css-->
	<link href="<?= base_url() . ADMINASSETS ?>css/icons.css" rel="stylesheet" />

	<!-- Select2 css -->
	<link href="<?= base_url() . ADMINASSETS ?>plugins/select2/select2.min.css" rel="stylesheet" />

	<!-- P-scroll bar css-->
	<link href="<?= base_url() . ADMINASSETS ?>plugins/p-scrollbar/p-scrollbar.css" rel="stylesheet" />

</head>

<body class="rtl">

<div class="page login-bg1">
	<div class="page-single">
		<div class="container">
			<div class="row">
				<div class="col-md-5 p-md-0">
					<div class="card p-5">
						<div class="ps-4 pt-4 pb-2">
							<a class="header-brand" href="<?=base_url()?>">
								<img src="<?= base_url() . FAVICONPATH ?>logo.jpeg" class="header-brand-img custom-logo" alt="Dayonelogo">
								<img src="<?= base_url() . FAVICONPATH ?>logo.jpeg" class="header-brand-img custom-logo-dark" alt="Dayonelogo">
							</a>
						</div>
						<div class="p-5 pt-0">
							<h1 class="mb-2"><?= lang('login') ?></h1>
							<!--<p class="text-muted">Sign In to your account</p>-->
						</div>
						<?= form_open('auth', ["class" => "card-body pt-3","name"=>"login","id"=>"login"]) ?>
						<!--<form class="card-body pt-3" id="login" name="login">-->
						<?php if (isset($response)): ?>
							<div class="alert alert-danger" role="alert">
								<i class="fa fa-frown-o me-2" aria-hidden="true"></i>
								<?= $response ?> ...
								<!--<button class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>-->
							</div>
						<?php endif ?>
							<div class="form-group">
								<label class="form-label"><?= lang('user_name') ?></label>
								<div class="input-group mb-4">
									<div class="input-group">
													<span class="input-group-text">
														<i class="fe fe-mail" aria-hidden="true"></i>
													</span>
										<input class="form-control" name="user_username"
											   placeholder="<?= lang('user_name') ?>" autocomplete="off">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label"><?= lang('password') ?></label>
								<div class="input-group mb-4">
									<div class="input-group" id="Password-toggle">
										<a href="" class="input-group-text">
											<i class="fe fe-eye-off" aria-hidden="true"></i>
										</a>
										<input class="form-control" type="password" name="password"
											   placeholder="<?= lang('password') ?>" autocomplete="off">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
									<span class="custom-control-label"><?=lang('Remember_me') ?></span>
								</label>
							</div>
							<div class="submit">
							<!--	<a class="btn btn-primary btn-block" href="#"><?/*= lang('login') */?></a> -->
								<button type="submit" class="btn btn-primary btn-block">
									<?= lang('login') ?>
								</button>
							</div>
							<!--<div class="text-center mt-3">
								<p class="mb-2"><a href="#">Forgot Password</a></p>
								<p class="text-dark mb-0">Don't have account?<a class="text-primary ms-1" href="#">Register</a></p>
							</div>-->
						</form>
						<!--<div class="card-body border-top-0 pb-6 pt-2">
							<div class="text-center">
								<span class="avatar brround me-3 bg-primary-transparent text-primary"><i class="ri-facebook-line"></i></span>
								<span class="avatar brround me-3 bg-primary-transparent text-primary"><i class="ri-instagram-line"></i></span>
								<span class="avatar brround me-3 bg-primary-transparent text-primary"><i class="ri-twitter-line"></i></span>
							</div>
						</div>-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Jquery js-->
<script src="<?= base_url() . ADMINASSETS ?>plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap js-->
<script src="<?= base_url() . ADMINASSETS ?>plugins/bootstrap/js/popper.min.js"></script>
<script src="<?= base_url() . ADMINASSETS ?>plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Select2 js -->
<script src="<?= base_url() . ADMINASSETS ?>plugins/select2/select2.full.min.js"></script>

<!-- P-scroll js-->
<script src="<?= base_url() . ADMINASSETS ?>plugins/p-scrollbar/p-scrollbar.js"></script>

<!-- Custom js-->
<script src="<?= base_url() . ADMINASSETS ?>js/custom.js"></script>

</body>
</html>
