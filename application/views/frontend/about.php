
<div class="med-history">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-12 col-lg-6">
                <h2><?=$title?></h2>

                <?php if (isset($this->setting) && !empty($this->setting)): ?>
                    <p>
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
						//echo sizeof($this->setting->es_about);
                        ?>
                    </p>
                <?php else: ?>
                    <p>Based on more than 20 years of experience in the field of medical devices in Middle East
                        North Africa region.
                        The idea comes then to establish DAYSTAR MEDICAL TECHNOLOGY SL based in Madrid Spain with an
                        objective to connect European manufacturers of medical devices and health products with
                        distributors in MENA region
                    </p>
                    <p>The normal expansion was to establish DAYSTAR MEDICAL TECHNOLOGY FZE based in Ajman United
                        Arab Emirates to support the same objective of connecting international manufacturers with
                        local distributors in MENA region</p>
                <?php endif ?>


            </div>

            <div class="col-12 col-lg-6 mt-5 mt-lg-0">
                <img class="responsive" src="<?=base_url().WEBASSETS?>images/photo/about.jpg" alt="">
            </div>
        </div>
        <!--
		<div class="row">
            <div class="col-12 col-lg-12">
                <div class="about-text">
                    <p>We are represent pharmaplast and Ultra Med from Egypt in addition to Saudi MAIS and Shmsan industrial group from Saudi Arabia.We also have a strong partnership with distributors in Egypt, Tunisia, Algeria, Morocco, KSA, UAE, Qatar, Kuwait, Jordan, Syria, Lebanon, Iraq, Iran and Pakistan </p>
                    <p>Recently we though that we need to start building our organization in Egypt to support our expansion plan in Africa medical devices market and to provide local services with multinational mindset.So DAYSTAR MEDICAL TECHNOLOGY HOME CARE based in Cairo, Egypt with an objective to connect users with services providers not only in the medical field including nurses and doctors but also in other fields such as beauty care, personal care, children care and elderly care.</p>
                    <p>DAYSTAR MEDICAL TECHNOLOGY HOME CARE is also supporting the objective on connecting international manufacturers with local distributors in Africa region then we will locally promote and distribute some of these medical products in the Egyptian market as future plan.</p>

                </div>
            </div>
        </div>
		-->
    </div>
</div>



