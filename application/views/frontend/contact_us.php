

<!-- =========================
	Google Map
=========================  -->
<section class="google-map py-0">
	<iframe frameborder="0" height="500" width="100%"
			src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d110502.6038954614!2d31.328505151458963!3d30.059618470346624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583fa60b21beeb%3A0x79dfb296e8423bba!2z2KfZhNmC2KfZh9ix2KnYjCDZhdit2KfZgdi42Kkg2KfZhNmC2KfZh9ix2KnigKw!5e0!3m2!1sar!2seg!4v1642315862499!5m2!1sar!2seg"></iframe>
</section><!-- /.GoogleMap -->
<!-- ==========================
	contact layout 1
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
	elseif ($this->webLang == "es") {
		$address =  (isset($this->setting->es_address)) ? $this->setting->es_address: $address;
		$addressOther = (isset($this->setting->es_address_other))? $this->setting->es_address_other :$addressOther;
	}
endif;
?>
<section class="contact-layout1 pt-0 mt--100">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="contact-panel d-flex flex-wrap">
					<form class="contact-panel__form" method="post" action="#" id="contactForm">
						<div class="row">
							<div class="col-sm-12">
								<h4 class="contact-panel__title">How Can We Help? </h4>
								<p class="contact-panel__desc mb-30">Please feel welcome to contact our friendly reception staff
									with any general or medical enquiry. Our doctors will receive or return any urgent calls.
								</p>
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6">
								<div class="form-group">
									<i class="icon-user form-group-icon"></i>
									<input type="text" class="form-control" placeholder="<?=lang("name")?>" id="contact-name" name="contact-name"
										   required>
								</div>
							</div><!-- /.col-lg-6 -->
							<div class="col-sm-6 col-md-6 col-lg-6">
								<div class="form-group">
									<i class="icon-email form-group-icon"></i>
									<input type="email" class="form-control" placeholder="<?=lang('emails')?>" id="contact-email"
										   name="contact-email" required>
								</div>
							</div><!-- /.col-lg-6 -->
							<div class="col-sm-6 col-md-6 col-lg-6">
								<div class="form-group">
									<i class="icon-phone form-group-icon"></i>
									<input type="text" class="form-control" placeholder="<?=lang('Subject')?>" id="contact-Phone"
										   name="contact-phone" required>
								</div>
							</div><!-- /.col-lg-6 -->
							<div class="col-12">
								<div class="form-group">
									<i class="icon-alert form-group-icon"></i>
									<textarea class="form-control" placeholder="<?=lang('message')?>" id="contact-message"
											  name="contact-message"></textarea>
								</div>
								<button type="submit" class="btn btn__secondary btn__rounded btn__block btn__xhight mt-10">
									<span><?=lang('send_now')?></span> <i class="icon-arrow-right"></i>
								</button>
								<div class="contact-result"></div>
							</div><!-- /.col-lg-12 -->
						</div><!-- /.row -->
					</form>
					<div
							class="contact-panel__info d-flex flex-column justify-content-between bg-overlay bg-overlay-primary-gradient">
						<div class="bg-img"><img src="<?=base_url().WEBASSETS?>images/banners/1.jpg" alt="banner"></div>
						<div>
							<h4 class="contact-panel__title color-white"><?=lang('Contact_Info')?></h4>
							<!--<p class="contact-panel__desc font-weight-bold color-white mb-30">Please feel free to contact our
								friendly staff with any medical enquiry.
							</p>-->
						</div>
						<div>
							<ul class="contact__list list-unstyled mb-30">
								<li>
									<i class="icon-phone"></i><a href="tel:<?=$phone?>"><?=lang("Emergency")?>: <?=$phone?></a>
								</li>
								<li>
									<i class="icon-location"></i><a href="#"><?=lang('address')?>: <?=$address?></a>
								</li>
								<li>
									<i class="icon-clock"></i><a href="#"><?=lang('Opening_Hours_tr')?></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div><!-- /.col-lg-6 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.contact layout 1 -->


