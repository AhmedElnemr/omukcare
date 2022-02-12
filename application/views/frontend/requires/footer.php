<!-- ========================
	 Footer
   ========================== -->
<footer class="footer">
	<div class="footer-primary">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-4 col-lg-4">
					<div class="footer-widget-about">
						<img src="<?=base_url().WEBASSETS?>images/logo/logo-light.png" alt="logo" class="mb-30">
						<p class="color-gray">
							<?php if (isset($this->setting) && !empty($this->setting)): ?>
							<?php
							if($this->webLang == "ar"){
								echo (isset($this->setting->ar_about))? word_limiter($this->setting->ar_about,50):"-";
							}
							elseif($this->webLang == "en"){
								echo (isset($this->setting->en_about))? word_limiter($this->setting->en_about,50):"-";
							}
							elseif($this->webLang == "es"){
								echo (isset($this->setting->es_about))? word_limiter($this->setting->es_about,50):"-";
							}
							?>
							<?php else: ?>
							Our goal is to deliver quality of care in a courteous, respectful, and
							compassionate manner. We hope you will allow us to care for you and strive to be the first and best
							choice for your family healthcare.
							<?php endif ?>
						</p>
					</div><!-- /.footer-widget__content -->
				</div><!-- /.col-xl-2 -->
				<div class="col-sm-12 col-md-4 col-lg-4">
					<div class="footer-widget-nav">
						<h6 class="footer-widget__title">Links</h6>
						<nav>
							<ul class="list-unstyled">
								<li>
									<a href="<?= base_url() ?>"><?= lang('home') ?></a></li>
								<li>
									<a href="<?= base_url() . "about" ?>"><?= lang('about_us') ?></a></li>
								<li>
									<a href="<?= base_url() . "home-care" ?>"><?= lang("home_care") ?></a>
								</li>
								<li><a href="#!"> Medical Supplies</a></li>
								<li>
									<a href="<?= base_url() . "contact-us" ?>"><?= lang('contact_us') ?></a>
								</li>
							</ul>
						</nav>
					</div><!-- /.footer-widget__content -->
				</div><!-- /.col-lg-2 -->
				<div class="col-sm-12 col-md-4 col-lg-4">
					<div class="footer-widget-nav">
						<h6 class="footer-widget__title"><?=lang('contact_us')?></h6>
						<ul class="list-unstyled">
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
								elseif ($this->webLang == "es") {
									$address =  (isset($this->setting->es_address)) ? $this->setting->es_address: $address;
									$addressOther = (isset($this->setting->es_address_other))? $this->setting->es_address_other :$addressOther;
								}
							endif;
							?>
							<li><a href="#"><b><?=lang('address')?>-1:</b><?=$address?></a></li>
							<li><a href="#"><b><?=lang('address')?>-2:</b><?=$addressOther?></a></li>
							<li><a href="#"><b><?=lang('phone')?>:</b><?=$phone?></a></li>
							<li><a href="#"><b><?=lang('emails')?>:</b><?=$mail?></a></li>
						</ul>
						<div class="d-flex align-items-center">
							<ul class="social-icons list-unstyled mb-0">
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-instagram"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
							</ul><!-- /.social-icons -->
						</div>
					</div><!-- /.footer-widget__content -->
				</div><!-- /.col-lg-2 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.footer-primary -->
</footer><!-- /.Footer -->

<button id="scrollTopBtn" class=""><i class="fas fa-long-arrow-alt-up"></i></button>
</div><!-- /.wrapper -->



<?php if(isset($maps)) { ?>
	<script type="text/javascript">
		var centreGot = false;
	</script>
	<?=$maps['js'];?>
<?php 	} ?>
<?php   $this->load->view('backend/requires/config_js');?>



<script src="<?=base_url().WEBASSETS?>js/jquery-3.5.1.min.js"></script>
<script src="<?=base_url().WEBASSETS?>js/plugins.js"></script>
<!-- <script src="js/bootstrap.min.js"></script> -->
<script src="<?=base_url().WEBASSETS?>js/owl.carousel.min.js"></script>
<script src="<?=base_url().WEBASSETS?>js/main.js"></script>


<!----------------------------------------SWEET  ------------------------------------------------------>
<script src="<?= base_url() . ASS ."sweetalert/sweetalert.js"?>"></script>
<?php   $this->load->view('frontend/requires/sweetalert');?>
<!----------------------------------------  ------------------------------------------------------>
<!------------------------------>





</body>
</html>
