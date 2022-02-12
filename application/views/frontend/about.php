<!-- ========================
  About Layout 1
=========================== -->
<section class="about-layout1 pb-0">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-6">
				<div class="heading-layout2">
					<h3 class="heading__title mb-40"><?=$title?></h3>
				</div><!-- /heading -->
			</div><!-- /.col-12 -->
		</div><!-- /.row -->
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-6">
				<div class="about__Text">
					<p class="mb-30">
						<?php if (isset($this->setting) && !empty($this->setting)): ?>
							<?php
							if($this->webLang == "ar"){
								echo (isset($this->setting->ar_about))? word_limiter($this->setting->ar_about,125):"";
							}
							elseif($this->webLang == "en"){
								echo (isset($this->setting->en_about))? word_limiter($this->setting->en_about,125):"";
							}
							?>
						<?php else: ?>
						Our goal is to deliver quality of care in a courteous, respectful, and compassionate
						manner. We hope you will allow us to care for you and to be the first and best choice for healthcare.
					We will work with you to develop individualised care plans, including management of
						chronic diseases. We are committed to being the region’s premier healthcare network providing patient
						centered care that inspires clinical and service excellence.
					<?php endif ?>
					</p>
				</div>
			</div><!-- /.col-lg-6 -->
			<div class="col-sm-12 col-md-12 col-lg-6">
				<div class="video-banner">
					<img src="<?=base_url().WEBASSETS?>images/about/1.jpg" alt="about">
				</div><!-- /.video-banner -->
			</div><!-- /.col-lg-6 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.About Layout 1 -->

<!-- ======================
Features Layout 1
========================= -->
<section class="features-layout1 pt-130 pb-50 mt--90">
	<div class="bg-img"><img src="<?=base_url().WEBASSETS?>images/backgrounds/1.png" alt="background"></div>
	<div class="container">
		<div class="row mb-40">
			<div class="col-sm-12 col-md-12 col-lg-5">
				<div class="heading__layout2">
					<h3 class="heading__title">Providing Care for The Sickest In Community.</h3>
				</div>
			</div><!-- /col-lg-5 -->
			<div class="col-sm-12 col-md-12 col-lg-5 offset-lg-1">
				<p class="heading__desc font-weight-bold">Oumk has been present in Europe since 1990, offering innovative
					solutions, specializing in medical services for treatment of medical infrastructure. With over 100
					professionals actively participates in numerous initiatives aimed at creating sustainable change for
					patients!
				</p>
				<!--<div class="d-flex flex-wrap align-items-center mt-40 mb-30">
					<a href="#" class="btn btn__secondary btn__link">
						<i class="icon-arrow-right icon-filled"></i>
						<span>Our Core Values</span>
					</a>
				</div>-->
			</div><!-- /.col-lg-6 -->
		</div><!-- /.row -->
		<div class="row">
			<!-- Feature item #1 -->
			<div class="col-sm-6 col-md-6 col-lg-3">
				<div class="feature-item">
					<div class="feature__content">
						<div class="feature__icon">
							<i class="icon-heart"></i>
							<i class="icon-heart feature__overlay-icon"></i>
						</div>
						<h4 class="feature__title">Medical Advices & Check Ups</h4>
					</div><!-- /.feature__content -->
					<a href="#" class="btn__link">
						<i class="icon-arrow-right icon-outlined"></i>
					</a>
				</div><!-- /.feature-item -->
			</div><!-- /.col-lg-3 -->
			<!-- Feature item #2 -->
			<div class="col-sm-6 col-md-6 col-lg-3">
				<div class="feature-item">
					<div class="feature__content">
						<div class="feature__icon">
							<i class="icon-doctor"></i>
							<i class="icon-doctor feature__overlay-icon"></i>
						</div>
						<h4 class="feature__title">Trusted Medical Treatment </h4>
					</div><!-- /.feature__content -->
					<a href="#" class="btn__link">
						<i class="icon-arrow-right icon-outlined"></i>
					</a>
				</div><!-- /.feature-item -->
			</div><!-- /.col-lg-3 -->
			<!-- Feature item #3 -->
			<div class="col-sm-6 col-md-6 col-lg-3">
				<div class="feature-item">
					<div class="feature__content">
						<div class="feature__icon">
							<i class="icon-ambulance"></i>
							<i class="icon-ambulance feature__overlay-icon"></i>
						</div>
						<h4 class="feature__title">Emergency Help Available 24/7</h4>
					</div><!-- /.feature__content -->
					<a href="#" class="btn__link">
						<i class="icon-arrow-right icon-outlined"></i>
					</a>
				</div><!-- /.feature-item -->
			</div><!-- /.col-lg-3 -->
			<!-- Feature item #4 -->
			<div class="col-sm-6 col-md-6 col-lg-3">
				<div class="feature-item">
					<div class="feature__content">
						<div class="feature__icon">
							<i class="icon-drugs"></i>
							<i class="icon-drugs feature__overlay-icon"></i>
						</div>
						<h4 class="feature__title">Medical Research Professionals </h4>
					</div><!-- /.feature__content -->
					<a href="#" class="btn__link">
						<i class="icon-arrow-right icon-outlined"></i>
					</a>
				</div><!-- /.feature-item -->
			</div><!-- /.col-lg-3 -->
			<!-- Feature item #5 -->
			<div class="col-sm-6 col-md-6 col-lg-3">
				<div class="feature-item">
					<div class="feature__content">
						<div class="feature__icon">
							<i class="icon-first-aid-kit"></i>
							<i class="icon-first-aid-kit feature__overlay-icon"></i>
						</div>
						<h4 class="feature__title">Only Qualified Doctors</h4>
					</div><!-- /.feature__content -->
					<a href="#" class="btn__link">
						<i class="icon-arrow-right icon-outlined"></i>
					</a>
				</div><!-- /.feature-item -->
			</div><!-- /.col-lg-3 -->
			<!-- Feature item #6 -->
			<div class="col-sm-6 col-md-6 col-lg-3">
				<div class="feature-item">
					<div class="feature__content">
						<div class="feature__icon">
							<i class="icon-hospital"></i>
							<i class="icon-hospital feature__overlay-icon"></i>
						</div>
						<h4 class="feature__title">Cutting Edge Facility</h4>
					</div><!-- /.feature__content -->
					<a href="#" class="btn__link">
						<i class="icon-arrow-right icon-outlined"></i>
					</a>
				</div><!-- /.feature-item -->
			</div><!-- /.col-lg-3 -->
			<!-- Feature item #7 -->
			<div class="col-sm-6 col-md-6 col-lg-3">
				<div class="feature-item">
					<div class="feature__content">
						<div class="feature__icon">
							<i class="icon-expenses"></i>
							<i class="icon-expenses feature__overlay-icon"></i>
						</div>
						<h4 class="feature__title">Affordable Prices For All Patients</h4>
					</div><!-- /.feature__content -->
					<a href="#" class="btn__link">
						<i class="icon-arrow-right icon-outlined"></i>
					</a>
				</div><!-- /.feature-item -->
			</div><!-- /.col-lg-3 -->
			<!-- Feature item #8 -->
			<div class="col-sm-6 col-md-6 col-lg-3">
				<div class="feature-item">
					<div class="feature__content">
						<div class="feature__icon">
							<i class="icon-bandage"></i>
							<i class="icon-bandage feature__overlay-icon"></i>
						</div>
						<h4 class="feature__title">Quality Care For Every Patient</h4>
					</div><!-- /.feature__content -->
					<a href="#" class="btn__link">
						<i class="icon-arrow-right icon-outlined"></i>
					</a>
				</div><!-- /.feature-item -->
			</div><!-- /.col-lg-3 -->
		</div><!-- /.row -->

	</div><!-- /.container -->
</section><!-- /.Features Layout 1 -->

