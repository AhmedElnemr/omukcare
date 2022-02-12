
<!-- ============================
	Slider
============================== -->
<section class="banner slider" id="banner-slider">
	<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<?php if (isset($slider) && !empty($slider)): ?>
			<?php foreach ($slider as $key=>$row): ?>
					<li data-target="#carouselExampleIndicators" data-slide-to="<?=$key?>>" class="<?=($key==0)?"active":""?>"></li>
				<?php endforeach ?>
			<?php else: ?>
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<?php endif ?>
		</ol>
		<div class="carousel-inner">
			<?php if (isset($slider) && !empty($slider)): ?>
			<?php foreach ($slider as $key=>$row): ?>
					<div class="carousel-item <?=($key==0)?"active":""?>">
						<div class="banner-img" style="background-image: url('<?= base_url() . IMAGEPATH .$row->image ?>');">
							<div class="container">
								<div class="row align-items-center">
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
										<div class="slide__content">
											<h2 class="slide__title"><?=$row->word->title?></h2>
											<p class="slide__desc"><?=$row->word->content?></p>
											<ul class="features-list list-unstyled mb-0 d-flex flex-wrap">
												<!-- feature item #1 -->
												<li class="feature-item">
													<div class="feature__icon">
														<i class="icon-doctor"></i>
													</div>
													<h2 class="feature__title">Nursing Care</h2>
												</li><!-- /.feature-item -->
												<!-- feature item #2 -->
												<li class="feature-item">
													<div class="feature__icon">
														<i class="icon-medicine"></i>
													</div>
													<h2 class="feature__title">Elderly Care </h2>
												</li><!-- /.feature-item -->
												<!-- feature item #3 -->
												<li class="feature-item">
													<div class="feature__icon">
														<i class="icon-heart2"></i>
													</div>
													<h2 class="feature__title">Physiotherapy</h2>
												</li><!-- /.feature-item -->
												<!-- feature item #4 -->
												<li class="feature-item">
													<div class="feature__icon">
														<i class="icon-blood-test"></i>
													</div>
													<h2 class="feature__title">Special Need Care</h2>
												</li><!-- /.feature-item  -->
											</ul><!-- /.features-list   -->
										</div><!-- /.slide-content -->
									</div><!-- /.col-xl-7 -->
								</div><!-- /.row -->
							</div><!-- /.container -->
						</div><!-- /.banner-img -->
					</div>
				<?php endforeach ?>
			<?php else: ?>
				<div class="carousel-item active">
					<div class="banner-img" style="background-image: url(./images/sliders/1.jpg);">
						<div class="container">
							<div class="row align-items-center">
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
									<div class="slide__content">
										<h2 class="slide__title">Providing Best Medical Care</h2>
										<p class="slide__desc">The health and well-being of our patients and their health care team will
											always be our priority, so we follow the best practices for cleanliness.</p>
										<ul class="features-list list-unstyled mb-0 d-flex flex-wrap">
											<!-- feature item #1 -->
											<li class="feature-item">
												<div class="feature__icon">
													<i class="icon-doctor"></i>
												</div>
												<h2 class="feature__title">Nursing Care</h2>
											</li><!-- /.feature-item -->
											<!-- feature item #2 -->
											<li class="feature-item">
												<div class="feature__icon">
													<i class="icon-medicine"></i>
												</div>
												<h2 class="feature__title">Elderly Care </h2>
											</li><!-- /.feature-item -->
											<!-- feature item #3 -->
											<li class="feature-item">
												<div class="feature__icon">
													<i class="icon-heart2"></i>
												</div>
												<h2 class="feature__title">Physiotherapy</h2>
											</li><!-- /.feature-item -->
											<!-- feature item #4 -->
											<li class="feature-item">
												<div class="feature__icon">
													<i class="icon-blood-test"></i>
												</div>
												<h2 class="feature__title">Special Need Care</h2>
											</li><!-- /.feature-item  -->
										</ul><!-- /.features-list   -->

									</div><!-- /.slide-content -->
								</div><!-- /.col-xl-7 -->
							</div><!-- /.row -->
						</div><!-- /.container -->
					</div><!-- /.banner-img -->
				</div>
				<div class="carousel-item">
					<div class="banner-img" style="background-image: url(./images/sliders/2.jpg);">
						<div class="container">
							<div class="row align-items-center">
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
									<div class="slide__content">
										<h2 class="slide__title">All Aspects Of Medical Practice</h2>
										<p class="slide__desc">The health and well-being of our patients and their health care team will
											always be our priority, so we follow the best practices for cleanliness.</p>
										<ul class="features-list list-unstyled mb-0 d-flex flex-wrap">
											<!-- feature item #1 -->
											<li class="feature-item">
												<div class="feature__icon">
													<i class="icon-doctor"></i>
												</div>
												<h2 class="feature__title">Nursing Care</h2>
											</li><!-- /.feature-item -->
											<!-- feature item #2 -->
											<li class="feature-item">
												<div class="feature__icon">
													<i class="icon-medicine"></i>
												</div>
												<h2 class="feature__title">Elderly Care </h2>
											</li><!-- /.feature-item -->
											<!-- feature item #3 -->
											<li class="feature-item">
												<div class="feature__icon">
													<i class="icon-heart2"></i>
												</div>
												<h2 class="feature__title">Physiotherapy</h2>
											</li><!-- /.feature-item -->
											<!-- feature item #4 -->
											<li class="feature-item">
												<div class="feature__icon">
													<i class="icon-blood-test"></i>
												</div>
												<h2 class="feature__title">Special Need Care</h2>
											</li><!-- /.feature-item  -->
										</ul><!-- /.features-list   -->
									</div><!-- /.slide-content -->
								</div><!-- /.col-xl-7 -->
							</div><!-- /.row -->
						</div><!-- /.container -->
					</div><!-- /.banner-img -->
				</div>
			<?php endif ?>
		</div>
	</div>
</section>
<!-- /.Slider -->
<!-- ============================
	 .About Layout 1
 ============================== -->
<section class="about-layout1 pb-0">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-6">
				<div class="heading-layout2">
					<h3 class="heading__title mb-40">Improving The Quality Of Your Life Through Better Health.</h3>
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
						elseif($this->webLang == "es"){
							echo (isset($this->setting->es_about))? word_limiter($this->setting->es_about,125):"";
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
					<div class="d-flex align-items-center mb-30">
						<a href="<?=base_url()."about"?>" class="btn btn__primary btn__outlined btn__rounded mr-30">
							<?=lang("read_more")?></a>
					</div>
				</div>
			</div><!-- /.col-lg-6 -->
			<div class="col-sm-12 col-md-12 col-lg-6">
				<div class="video-banner">
					<img src="<?=base_url().WEBASSETS?>images/about/2.jpg" alt="about">
				</div><!-- /.video-banner -->
			</div><!-- /.col-lg-6 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>
<!-- ======================
 Work Process
========================= -->
<section class="work-process work-process-carousel pt-130 pb-0 bg-overlay bg-overlay-secondary">
	<div class="bg-img">
		<img src="<?=base_url().WEBASSETS?>images/banners/1.jpg" alt="background">
	</div>
	<div class="container">
		<div class="row heading-layout2">
			<div class="col-12">
				<h2 class="heading__subtitle color-primary">Caring For The Health Of You And Your Family.</h2>
			</div><!-- /.col-12 -->
			<div class="col-sm-12 col-md-12 col-lg-6 col-xl-5">
				<h3 class="heading__title color-white">We Provide All Aspects Of Medical Practice For Your Whole Family!
				</h3>
			</div><!-- /.col-xl-5 -->
			<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 offset-xl-1">
				<p class="heading__desc font-weight-bold color-gray mb-40">We will work with you to develop individualised
					care
					plans, including
					management of chronic diseases. If we cannot assist, we can provide referrals or advice about the type of
					practitioner you require. We treat all enquiries sensitively and in the strictest confidence.
				</p>
				<ul class="list-items list-items-layout2 list-items-light list-horizontal list-unstyled">
					<li>Fractures and dislocations</li>
					<li>Health Assessments</li>
					<li>Desensitisation injections</li>
					<li>High Quality Care</li>
					<li>Desensitisation injections</li>
				</ul>
			</div><!-- /.col-xl-6 -->
		</div><!-- /.row -->
		<div class="row">
			<div class="col-12">
				<div class="carousel-container mt-90">
					<div class="slick-carousel"
						 data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite":false,
                 "arrows": false, "dots": false}'>
						<!-- process item #1 -->
						<div class="process-item">
							<span class="process__number">01</span>
							<div class="process__icon">
								<i class="fas fa-rocket"></i>
							</div><!-- /.process__icon -->
							<h4 class="process__title"><?=lang('Our_Mission')?></h4>
							<p class="process__desc">
								<?php if (isset($this->setting) && !empty($this->setting)): ?>
								<?php
								if($this->webLang == "ar"){
									echo (isset($this->setting->ar_Our_Mission))? word_limiter($this->setting->ar_Our_Mission,100):"";
								}
								elseif($this->webLang == "en"){
									echo (isset($this->setting->en_Our_Mission))? word_limiter($this->setting->en_Our_Mission,100):"";
								}
								?>
								<?php else: ?>
								Delivering High quality services to our end users making sure of the availability of up to date medical devices innovations in the region of Middle East and Africa
								<?php endif ?>
							</p>
						</div><!-- /.process-item -->
						<!-- process-item #2 -->
						<div class="process-item">
							<span class="process__number">02</span>
							<div class="process__icon">
								<i class="fas fa-eye"></i>
							</div><!-- /.process__icon -->
							<h4 class="process__title"><?=lang('our_vision')?></h4>
							<p class="process__desc">
								<?php if (isset($this->setting) && !empty($this->setting)): ?>
								<?php
								if($this->webLang == "ar"){
									echo (isset($this->setting->ar_Our_Vision))? word_limiter($this->setting->ar_Our_Vision,100):"";
								}
								elseif($this->webLang == "en"){
									echo (isset($this->setting->en_Our_Vision))? word_limiter($this->setting->en_Our_Vision,100):"";
								}
								elseif($this->webLang == "es"){
									echo (isset($this->setting->es_Our_Vision))? word_limiter($this->setting->es_Our_Vision,100):"";
								}
								?>
								<?php else: ?>
									Building up a leading Medical Technology Company to support a well-structured end users and
									service providers network in addition to manufacturer and distributor network in the region
									of Middle East and Africa
								<?php endif ?>
							</p>
						</div><!-- /.process-item -->
						<!-- process-item #3 -->
						<div class="process-item">
							<span class="process__number">03</span>
							<div class="process__icon">
								<i class="far fa-gem"></i>
							</div><!-- /.process__icon -->
							<h4 class="process__title"><?=lang('Our_Values')?></h4>
							<p class="process__desc">
								<?php if (isset($this->setting) && !empty($this->setting)): ?>
									<?php
									if($this->webLang == "ar"){
										echo (isset($this->setting->ar_Our_Values))? word_limiter($this->setting->ar_Our_Values,100):"";
									}
									elseif($this->webLang == "en"){
										echo (isset($this->setting->en_Our_Values))? word_limiter($this->setting->en_Our_Values,100):"";
									}
									?>
								<?php else: ?>
									Building up a leading Medical Technology Company to support a well-structured end users and
									service providers network in addition to manufacturer and distributor network in the region
									of Middle East and Africa
								<?php endif ?>
							</p>
						</div><!-- /.process-item -->

					</div><!-- /.carousel -->
				</div>
			</div><!-- /.col-12 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
	<div class="cta bg-light-blue">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-sm-12 col-md-1 col-lg-1">
				</div><!-- /.col-lg-2 -->
				<div class="col-sm-12 col-md-10 col-lg-10">
					<h4 class="cta__title"><?=lang('download')?>  <?=lang("home_care")?> </h4>
					<p class="cta__desc">
						<?=lang('download_app_text')?>
					</p>
					<div class="btn-downloads">
						<a target="_blank" href="<?=(isset($this->setting->App_Store))? $this->setting->App_Store :"#";?>">
							<button class="download-btn">
								<i class="fab fa-apple"></i>
								<span>
                            Available on <span class="large-text">App Store</span>
                        </span>
							</button>
						</a>
						<a target="_blank" href="<?=(isset($this->setting->Play_Store))? $this->setting->Play_Store :"#";?>">
							<button class="download-btn">
								<i class="fab fa-google-play"></i>
								<span>
                          Available on <span class="large-text">Play Store</span>
                      </span>
							</button>
						</a>
					</div>
				</div><!-- /.col-lg-7 -->
				<div class="col-sm-12 col-md-1 col-lg-1">

				</div><!-- /.col-lg-3 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.cta -->
</section>
<!-- /.Work Process -->
