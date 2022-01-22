<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title> <?= lang('web_name') ?> </title>
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
	<link href="<?= base_url() . WEBASSETS ?>css/swiper.min.css" rel="stylesheet"/>
	<link href="<?= base_url() . ASS ?>date-picker/jquery.datetimepicker.css" rel="stylesheet"/>
	<link href="<?= base_url() . ASS ?>sweetalert/sweetalert.css" rel="stylesheet"/>
	<link href="<?= base_url() . WEBASSETS ?>css/fancybox/jquery.fancybox.css" rel="stylesheet"/>
	<link rel="stylesheet" href="<?= base_url() . WEBASSETS ?>css/cd-gallry.css"/>
	<link rel="stylesheet" href="<?= base_url() . WEBASSETS ?>css/style.css?v=<?= time() ?>"/>
	<link rel="stylesheet" href="<?= base_url() . WEBASSETS ?>css/responsive.css?v=<?= time() ?>"/>
	<link rel="stylesheet" href="<?= base_url() . WEBASSETS ?>css/second-style.css?v=<?= time() ?>"/>


	<?php if ($this->webLang == "ar"): ?>
		<link rel="stylesheet" href="<?= base_url() . WEBASSETS ?>css/bootstrap-rtl.css?v=<?= time() ?>"/>
	<?php endif ?>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
		  integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body class="<?= (isset($page_name) && $page_name == "home") ? "" : "single-page"; ?>">
<header class="site-header">
	<div id="menu-area">
		<div class="menu-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-sm-2">
						<div class="h-logo">
							<a href="<?= base_url() ?>">
								<?php
								if (isset($page_name)) {
									if ($page_name == "home-care") {
										$image = base_url();
										$image .= ($this->webLang == "ar") ? LOGO_HOME_CARE_AR : LOGO_HOME_CARE_EN;
									} elseif ($page_name == "medical-tourism") {
										$image = base_url();
										$image .= ($this->webLang == "ar") ? LOGO_TECNOLOGY_AR : LOGO_TECNOLOGY_EN;
									} else {
										$image = base_url();
										$image .= ($this->webLang == "ar") ? LOGO_HOME_AR : LOGO_HOME_EN;
									}
								} else {
									$image = base_url() . WEBASSETS . 'images/Logo/LOGO-day-star-psd.png';
								}
								?>
								<img src="<?= $image ?>" alt="Logo">
							</a>
						</div>
					</div>
					<div class="col-lg-10 col-sm-10">
						<div class="menu-search">
							<nav class="main-menu">
								<ul class="list-unstyled">
									<li class="nav-item <?= (isset($page_name) && $page_name == "home") ? "active-item" : ""; ?>">
										<a href="<?= base_url() ?>"><?= lang('home') ?></a></li>
									<!--<li class="nav-item <? /*=(isset($page_name) && $page_name == "about")? "active-item":"";*/ ?>">
										<a href="<? /*= base_url() . "about" */ ?>"><? /*= lang('about_us') */ ?></a></li>-->
									<!------------------------------------------------------->
									<li class="nav-item <?= (isset($page_name) && $page_name == "home-care") ? "active-item" : ""; ?>">
										<a href="<?= base_url() . "home-care" ?>">
											<?= lang("home_care") ?></a>
									</li>
									<!------------------------------------------------------->
									<li class="nav-item <?= (isset($page_name) && $page_name == "category") ? "active-item" : ""; ?>">
										<a href="<?= base_url() . "market" ?>">
											<?= lang("market") ?> </a>
									</li>
									<!------------------------------------------------------->
									<li class="nav-item <?= (isset($page_name) && $page_name == "Trading") ? "active-item" : ""; ?>">
										<a href="#"><?= lang('Trading') ?></a>
										<ul class="dropdown-menus list-unstyled">
											<li>
												<a href="<?= base_url() . "parteners" ?>">
													<?= lang('Parteners') ?></a>
											</li>
											<li>
												<a href="<?= base_url() . "suppliers" ?>">
													<?= lang('Suppliers') ?></a>
											</li>
										</ul>
									</li>

									<!------------------------------------------------------->
									<li class="nav-item <?= (isset($page_name) && $page_name == "medical-tourism") ? "active-item" : ""; ?>">
										<a href="<?= base_url() . "medical-tourism" ?>">
											<?= lang('medical_tourism') ?></a>
									</li>
									<!------------------------------------------------------->
									<li class="nav-item <?= (isset($page_name) && $page_name == "contact-us") ? "active-item" : ""; ?>">
										<a href="<?= base_url() . "contact-us" ?>">
											<?= lang('contact_us') ?></a></li>
									<!------------------------------------------------------->
									<!------------------------------------------------------->
									<?php
									$get = $this->input->get();
									if (in_array(uri_string(), ['ar', 'en', 'es'])) {
										$path = str_replace($this->webLang, "", uri_string());
										$path = str_replace($this->webLang, "", $path);
										$path .= (isset($get) && !empty($get)) ? creatGetUrl($get) : "";
									} else {
										$path = str_replace($this->webLang . "/", "", uri_string());
										$path = str_replace($this->webLang . "/", "", $path);
										$path .= (isset($get) && !empty($get)) ? creatGetUrl($get) : "";
									}
									//=========================================================
									if ($this->webLang == "ar") {
										$path_1 = "#";//base_url()."ar/".$path ;
										$path_2 = base_url() . "en/" . $path;
										$path_3 = base_url() . "es/" . $path;
										$title_1 = "العربية";
										$title_2 = "الإنجليزية";
										$title_3 = "الإسبانية";
										$lang_image_1 = "England.png";
										$lang_image_2 = "spain.png";
									} elseif ($this->webLang == "es") {
										$path_1 = "#";//base_url()."es/".$path ;
										$path_2 = base_url() . "en/" . $path;
										$path_3 = base_url() . "ar/" . $path;
										$title_1 = "Español";
										$title_2 = "Inglés";
										$title_3 = "Arábica";
										$lang_image_1 = "England.png";
										$lang_image_2 = "Egypt.png";
									} else {
										$path_1 = "#";//base_url()."en/".$path ;
										$path_2 = base_url() . "ar/" . $path;
										$path_3 = base_url() . "es/" . $path;
										$title_1 = "English";
										$title_2 = "Arabic";
										$title_3 = "Spanish";
										$lang_image_1 = "Egypt.png";
										$lang_image_2 = "spain.png";
									}
									?>
									<li class="nav-item">
										<a href="<?= $path_1 ?>"><?= $title_1 ?></a>
										<ul class="dropdown-menus lang list-unstyled">
											<li>
												<img src="<?= base_url() . WEBASSETS ?>images/icon/<?= $lang_image_1 ?>"/>
												<a href="<?= $path_2 ?>"><?= $title_2 ?></a>
											</li>
											<li>
												<img src="<?= base_url() . WEBASSETS ?>images/icon/<?= $lang_image_2 ?>"/>
												<a href="<?= $path_3 ?>"><?= $title_3 ?></a>
											</li>
										</ul>
									</li>
									<!------------------------------------------------------->
									<?php if (isset($_SESSION["web_user"])): ?>
										<li class="nav-item <?= (isset($page_name) && $page_name == "home-care") ? "active-item" : ""; ?>">
											<a href="#"><?= lang('my_profile') ?></a>
											<ul class="dropdown-menus list-unstyled">
												<li>
													<a href="<?= base_url() . "profile/" . $_SESSION["web_user"]->user_id ?>">
														<?= lang('my_profile') ?></a>
												</li>
												<li>
													<a href="<?= base_url() . "my-cart" ?>">
														<?= lang('My Cart') ?></a>
												</li>
												<li>
													<a href="<?= base_url() . "web-logout" ?>">
														<?= lang('logout') ?></a>
												</li>
											</ul>
										</li>
									<?php else: ?>

										<li class="nav-item <?= (isset($page_name) && $page_name == "web-login") ? "active-item" : ""; ?>">
											<a href="<?= base_url() . "web-login" ?>">
												<?= lang("login") ?></a>
										</li>
									<?php endif ?>
									<!------------------------------------------------------->


								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="mobile-nav-wrap" class="clearfix">
			<div class="container">
				<div class="mobile-logo">
					<div class="h-logo"><a href="<?= base_url() ?>">

							<?php
							if (isset($page_name)) {
								if ($page_name == "home-care") {
									$image = base_url();
									$image .= ($this->webLang == "ar") ? LOGO_HOME_CARE_AR : LOGO_HOME_CARE_EN;
								} elseif ($page_name == "medical-tourism") {
									$image = base_url();
									$image .= ($this->webLang == "ar") ? LOGO_TECNOLOGY_AR : LOGO_TECNOLOGY_EN;
								} else {
									$image = base_url();
									$image .= ($this->webLang == "ar") ? LOGO_HOME_AR : LOGO_HOME_EN;
								}
							} else {
								$image = base_url() . WEBASSETS . 'images/Logo/LOGO-day-star-psd.png';
							}
							?>
							<img src="<?= $image ?>" alt="Logo">
						</a>
					</div>
				</div>
				<div class="toggle-inner"></div>
			</div>
		</div>

		<div class="mobile-menu-inner">
			<div class="mobile-in-logo">
				<div class="mob-inner-logo"><a href="<?= base_url() ?>">
						<?php
						if (isset($page_name)) {
							if ($page_name == "home-care") {
								$image = base_url();
								$image .= ($this->webLang == "ar") ? LOGO_HOME_CARE_AR : LOGO_HOME_CARE_EN;
							} elseif ($page_name == "medical-tourism") {
								$image = base_url();
								$image .= ($this->webLang == "ar") ? LOGO_TECNOLOGY_AR : LOGO_TECNOLOGY_EN;
							} else {
								$image = base_url();
								$image .= ($this->webLang == "ar") ? LOGO_HOME_AR : LOGO_HOME_EN;
							}
						} else {
							$image = base_url() . WEBASSETS . 'images/Logo/LOGO-day-star-psd.png';
						}
						?>
						<img src="<?= $image ?>" alt="Logo">
					</a>
				</div>
				<div class="close-menu"><i class="fas fa-times"></i></div>
			</div>
			<nav id="accordian">
				<ul class="slide-menu list-unstyled">

					<li class=" <?= (isset($page_name) && $page_name == "home") ? "active-item" : ""; ?>">
						<a href="<?= base_url() ?>"><?= lang('home') ?></a></li>

					<li class="<?= (isset($page_name) && $page_name == "home-care") ? "active-item" : ""; ?>">
						<a href="<?= base_url() . "home-care" ?>"><?= lang('home_care') ?></a>
					</li>

					<li class="<?= (isset($page_name) && $page_name == "category") ? "active-item" : ""; ?>">
						<a href="<?= base_url() . "market" ?>"><?= lang('market') ?></a>
					</li>
					<li>
						<a href="#"
						   class="dropdown-here <?= (isset($page_name) && $page_name == "Trading") ? "active-item" : ""; ?>">
							<?= lang('Trading') ?>
						</a>
						<ul class="submenuItems list-unstyled">
							<li>
								<a href="<?= base_url() . "parteners" ?>">
									<?= lang('Parteners') ?></a>
							</li>
							<li>
								<a href="<?= base_url() . "suppliers" ?>">
									<?= lang('Suppliers') ?></a>
							</li>
						</ul>
					</li>
					<li class="<?= (isset($page_name) && $page_name == "medical-tourism") ? "active-item" : ""; ?>">
						<a href="<?= base_url() . "medical-tourism" ?>">
							<?= lang('medical_tourism') ?></a>
					</li>
					<li class="<?= (isset($page_name) && $page_name == "contact-us") ? "active-item" : ""; ?>">
						<a href="<?= base_url() . "contact-us" ?>">
							<?= lang('contact_us') ?></a>
					</li>
					<li>
						<a href="#" class="dropdown-here"><?= $title_1 ?></a>
						<ul class="submenuItems list-unstyled">
							<li>
								<a href="<?= $path_2 ?>"><?= $title_2 ?></a>
							</li>
							<li>
								<a href="<?= $path_3 ?>"><?= $title_3 ?></a>
							</li>
						</ul>
					</li>
					<!------------------------------------------------------->
					<?php if (isset($_SESSION["web_user"])): ?>
						<li>
							<a href="#"><?= lang('my_profile') ?></a>
							<ul class="submenuItems list-unstyled">
								<li>
									<a href="<?= base_url() . "profile/" . $_SESSION["web_user"]->user_id ?>">
										<?= lang('my_profile') ?></a>
								</li>
								<li>
									<a href="<?= base_url() . "my-cart" ?>">
										<?= lang('My Cart') ?></a>
								</li>
								<li>
									<a href="<?= base_url() . "web-logout" ?>">
										<?= lang('logout') ?></a>
								</li>
							</ul>
						</li>
					<?php else: ?>

						<li>
							<a href="<?= base_url() . "web-login" ?>">
								<?= lang("login") ?></a>
						</li>
					<?php endif ?>
					<!------------------------------------------------------->

				</ul>
			</nav>
		</div>

	</div>
</header>
