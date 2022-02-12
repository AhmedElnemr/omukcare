<html lang="en" dir="ltr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="Oumk Care">
	<link href="<?= base_url() . WEBASSETS ?>images/logo/favicon.png" rel="icon">
	<title><?= lang('web_name') ?></title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&amp;family=Roboto:wght@400;700&amp;display=swap">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
	<link rel="stylesheet" href="<?= base_url() . WEBASSETS ?>css/libraries.css">
	<link rel="stylesheet" href="<?= base_url() . WEBASSETS ?>css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url() . WEBASSETS ?>css/owl.theme.default.min.css">
	<link rel="stylesheet" href="<?= base_url() . WEBASSETS ?>css/style.css">
</head>

<body>
<div class="wrapper">
	<!-- /.preloader -->

	<!-- =========================
		Header
	=========================== -->

	<?php
	$address = 'Arab Republic of Egypt First Settlement, New Cairo Six Neighborhood, Villa 381';
	$addressOther = 'United Arab Emirates Ajman Free Zone B.C. 1301423';
	$phone = (isset($this->setting->phones)) ? $this->setting->phones:'+971 55 455 3340';
	$mail  = (isset($this->setting->emails)) ? $this->setting->emails:'info@daystar-mea.com';
	if (isset($this->setting) && !empty($this->setting)):
		if ($this->webLang == "ar") {
			$address =  (isset($this->setting->ar_address)) ? $this->setting->ar_address: $address;
			$addressOther = (isset($this->setting->ar_address_other))? $this->setting->ar_address_other :$addressOther;
		}
		elseif ($this->webLang == "en") {
			$address =  (isset($this->setting->en_address)) ? $this->setting->en_address: $address;
			$addressOther = (isset($this->setting->en_address_other))? $this->setting->en_address_other :$addressOther;
		}
	endif;
	?>


	<header class="header header-layout1">
		<div class="header-topbar">
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="col-12">
						<div class="d-flex align-items-center justify-content-between">
							<ul class="contact__list d-flex flex-wrap align-items-center list-unstyled mb-0">
								<li>
									<button class="miniPopup-emergency-trigger" type="button">24/7 Emergency</button>
									<div id="miniPopup-emergency" class="miniPopup miniPopup-emergency text-center">
										<div class="emergency__icon">
											<i class="icon-call3"></i>
										</div>
										<a href="tel:+201061245741" class="phone__number">
											<i class="icon-phone"></i> <span>+2 01061245741</span>
										</a>
										<p>Please feel free to contact our friendly reception staff with any general or medical enquiry.
										</p>
										<a href="appointment.html" class="btn btn__secondary btn__link btn__block">
											<span>Make Appointment</span> <i class="icon-arrow-right"></i>
										</a>
									</div><!-- /.miniPopup-emergency -->
								</li>
								<li>
									<i class="icon-phone"></i><a href="tel:+5565454117">Emergency Line: <?=$phone?></a>
								</li>
								<li>
									<i class="icon-location"></i><a href="#"><?=$address?></a>
								</li>
								<li>
									<i class="icon-clock"></i><a href="contact-us.html">Mon - Fri: 8:00 am - 7:00 pm</a>
								</li>
							</ul><!-- /.contact__list -->
							<div class="d-flex">
								<ul class="social-icons list-unstyled mb-0 mr-30">
									<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
									<li><a href="#"><i class="fab fa-instagram"></i></a></li>
									<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								</ul><!-- /.social-icons -->
							</div>
						</div>
					</div><!-- /.col-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.header-top -->
		<nav class="navbar navbar-expand-lg sticky-navbar">
			<div class="container-fluid">
				<a class="navbar-brand" href="<?=base_url()?>">
					<img src="<?= base_url() . WEBASSETS ?>images/logo/logo-light.png" class="logo-light" alt="logo">
					<img src="<?= base_url() . WEBASSETS ?>images/logo/logo-dark.png" class="logo-dark" alt="logo">
				</a>
				<button class="navbar-toggler" type="button">
					<span class="menu-lines"><span></span></span>
				</button>
				<div class="collapse navbar-collapse" id="mainNavigation">
					<ul class="navbar-nav ml-auto">
						<li class="nav__item has-dropdown">
							<a href="<?= base_url() ?>" class=" nav__item-link active"><?= lang('home') ?></a>
						</li><!-- /.nav-item -->
						<li class="nav__item has-dropdown">
							<a href="<?= base_url() . "about" ?>" class="nav__item-link"><?= lang('about_us') ?></a>
						</li><!-- /.nav-item -->
						<li class="nav__item has-dropdown">
							<a href="<?= base_url() . "home-care" ?>"  class="nav__item-link"><?= lang("home_care") ?></a>
						</li>
						<li class="nav__item">
							<a href="<?= base_url() . "contact-us" ?>" class="nav__item-link"><?= lang('contact_us') ?></a>
						</li><!-- /.nav-item -->
					</ul><!-- /.navbar-nav -->
					<button class="close-mobile-menu d-block d-lg-none"><i class="fas fa-times"></i></button>
				</div><!-- /.navbar-collapse -->
				<div class="d-none header-btns d-xl-flex align-items-center position-relative ml-30">
					<div class="miniPopup-departments-trigger">
						<span class="menu-lines" id="miniPopup-departments-trigger-icon"><span></span></span>
						<a href="#!">Medical Supplies</a>
					</div>
					<ul id="miniPopup-departments" class="miniPopup miniPopup-departments dropdown-menu">
						<?php if(isset($this->departments) && !empty($this->departments)):?>
							<?php foreach ($this->departments as $one): ?>
								<li class="nav__item">
									<a href="<?=base_url()."products/".$one->id?>" class="nav__item-link"><?=$one->word->title?></a>
								</li>
							<?php endforeach ?>
						<?php endif;?>
					</ul> <!-- /.miniPopup-departments -->

					<?php if (isset($_SESSION["web_user"])): ?>
					<a href="<?= base_url() . "profile/" . $_SESSION["web_user"]->user_id ?>" class="btn btn__primary btn__rounded ml-30">
						<i class="icon-user"></i>
						<span><?= lang('my_profile') ?></span>
					</a>
					<?php else: ?>
						<a href="<?= base_url() . "web-login" ?>" class="btn btn__primary btn__rounded ml-30">
							<i class="icon-user"></i>
							<span><?= lang("login") ?></span>
						</a>
					<?php endif ?>
				</div>
			</div><!-- /.container -->
		</nav><!-- /.navabr -->
	</header><!-- /.Header -->

