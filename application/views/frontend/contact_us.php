<div class="contact-page-short-boxes">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4 col-md-6">
                <div class="contact-info h-100">
                    <h2 class="d-flex align-items-center"><?=lang('Contact_Info')?></h2>
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
                    <ul class="p-0 m-0">
						<li><span><?=lang('address')?>-1:</span><?=$address?></li>
						<li><span><?=lang('address')?>-2:</span><?=$addressOther?></li>
						<li><span><?=lang('phone')?>:</span><?=$phone?></li>
						<li><span><?=lang('emails')?>:</span><?=$mail?></li>
                    </ul>
                </div>
            </div>

            <div class="col-12 col-lg-4 col-md-6 mt-5 mt-lg-0">
                <div class="opening-hours h-100">
                    <h2 class="d-flex align-items-center"><?=lang("Opening_Hours")?></h2>

                    <ul class="p-0 m-0">
                      <?=lang('Opening_Hours_tr')?>
                    </ul>
                </div>
            </div>

            <div class="col-12 col-lg-4 col-md-6 mt-5 mt-lg-0">
                <div class="emergency-box h-100">
                    <h2 class="d-flex align-items-center"><?=lang("Emergency")?></h2>

                    <div class="call-btn text-center">
                        <a class="d-flex justify-content-center align-items-center button gradient-bg" href="#">
                            <img src="<?=base_url().WEBASSETS?>images/icon/emergency-call.png"> <?=$phone?></a>
                    </div>

					<?php if (isset($this->setting) && !empty($this->setting)): ?>
						<p>
							<?php
							if($this->webLang == "ar"){
								echo (isset($this->setting->ar_about))? word_limiter($this->setting->ar_about,25):"-";
							}
							elseif($this->webLang == "en"){
								echo (isset($this->setting->en_about))? word_limiter($this->setting->en_about,25):"-";
							}
							elseif($this->webLang == "es"){
								echo (isset($this->setting->es_about))? word_limiter($this->setting->es_about,25):"-";
							}
							?>
						</p>
					<?php else: ?>
						<p>Based on more than 20 years of experience in the field of medical devices in Middle East
							North Africa region.
						</p>
					<?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="contact-form">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2><?=lang('Get_in_Touch')?></h2>
            </div>

            <div class="col-12  col-md-4">
                <input type="text" placeholder="<?=lang("name")?>">
            </div><!-- col-4 -->

            <div class="col-12 col-md-4">
                <input type="email" placeholder="<?=lang('emails')?>>">
            </div><!-- col-6 -->

            <div class="col-12 col-md-4">
                <input type="text" placeholder="<?=lang('Subject')?>">
            </div>

            <div class="col-12">
                <textarea name="name" rows="12" cols="80" placeholder="<?=lang('message')?>"></textarea>
            </div>

            <div class="col-12">
                <input type="submit" name="" value="<?=lang('send_now')?>" class="button gradient-bg">
            </div>
        </div><!-- row -->
    </div>
</div>
