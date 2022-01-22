<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title> DayStar | Home Care </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="<?=base_url().WEBASSETS?>css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?=base_url().WEBASSETS?>css/font-awesome.min.css" />
	<link href="<?=base_url().WEBASSETS?>css/owl.carousel.min.css" rel="stylesheet" />
	<link href="<?=base_url().WEBASSETS?>css/owl.theme.default.min.css" rel="stylesheet" />
	<link href="<?=base_url().WEBASSETS?>css/bootstrap-select.min.css" rel="stylesheet" />
	<link href="<?=base_url().WEBASSETS?>css/nice-select.css" rel="stylesheet" />
	<link href="<?=base_url().WEBASSETS?>css/animate.min.css" rel="stylesheet" />
	<link href="<?=base_url().WEBASSETS?>css/hover-min.css" rel="stylesheet" />
	<link href="<?=base_url().WEBASSETS?>css/main-menu.css" rel="stylesheet" />
	<link href="<?=base_url().WEBASSETS?>css/easy-responsive-tabs.css" rel="stylesheet" />
	<link href="<?=base_url().WEBASSETS?>css/dropify.min.css" rel="stylesheet" />
	<link href="<?=base_url().WEBASSETS?>css/swiper.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?=base_url().WEBASSETS?>css/style.css" />
	<link rel="stylesheet" href="<?= base_url() . WEBASSETS ?>css/responsive.css?v=<?= time() ?>"/>
	<?php if ($this->webLang == "ar"): ?>
		<link rel="stylesheet" href="<?= base_url() . WEBASSETS ?>css/bootstrap-rtl.css?v=<?= time() ?>"/>
	<?php endif ?>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body class="single-page">
<nav id="top">
	<div class="container">
		<div id="top-links" class="nav pull-left">
		</div>
	</div>
</nav>
<main>
	<div class="bg_color">
		<div class="container">
			<a class="back-home" href="<?=base_url()?>"><i class="fas fa-home"></i></a>
			<div id="login">
				<h1><?=lang('login_msg')?></h1>
				<?=form_open_multipart('web-auth');  ?>
					<div class="box_form clearfix">
						<div class="box_login ">
							<div class="form-group">
								<input type="tel" name="phone" class="form-control" placeholder="<?=lang("phone")?>">
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-control " placeholder="<?=lang("password")?>"  style="margin: 0px; padding-right: 10px;">
								<a href="#0" class="forgot"><small><?=lang('Forget_Password')?> </small></a>
							</div>
							<div class="form-group">
								<input class="btn_1" type="submit" value="<?=lang("login")?>" style="margin-top: 30px;float: right">
							</div>
						</div>
					</div>
				<?=form_close()?>
				<p class="text-center link_bright"><?=lang('make_regster_msg')?>
					<a href="<?=base_url()."register"?>" style="color: #fafafa"><strong >  <?=lang('Register_Now')?></strong></a></p>
			</div>
		</div>
	</div>
</main>





<script src="<?=base_url().WEBASSETS ?>js/jquery-3.3.1.min.js"></script>
<script src="<?=base_url().WEBASSETS ?>js/popper.min.js"></script>
<script src="<?=base_url().WEBASSETS ?>js/bootstrap.min.js"></script>
<script src="<?=base_url().WEBASSETS ?>js/owl.carousel.min.js"></script>
<script src="<?=base_url().WEBASSETS ?>js/jquery.nice-select.min.js"></script>
<script src="<?=base_url().WEBASSETS ?>js/bootstrap-select.min.js"></script>
<script src="<?=base_url().WEBASSETS ?>js/easy-responsive-tabs.js"></script>
<script src="<?=base_url().WEBASSETS ?>js/dropify.min.js"></script>
<script src="<?=base_url().WEBASSETS ?>js/swiper.min.js"></script>
<script src="<?=base_url().WEBASSETS ?>js/custom.js"></script>


</body>

</html>
