<section>
    <div class="swiper-container hero-slider">
        <div class="swiper-wrapper">
            <?php if (isset($slider) && !empty($slider)): ?>
                <?php foreach ($slider as $row): ?>
                    <div class="swiper-slide hero-content-wrap"
                         style="background-image: url('<?= base_url() . IMAGEPATH .$row->image ?>')">
                        <div class="hero-content-overlay position-absolute w-100 h-100">
                            <div class="container h-100">
                                <div class="row h-100">
                                    <div class="col-12 col-lg-6 slider-swip d-flex flex-column justify-content-center align-items-start">
                                        <header class="entry-header">
                                            <h1><?=$row->word->title?></h1>
                                        </header>

                                        <div class="entry-content mt-4">
                                            <p style="width: 60%"><?=$row->word->content?></p>
                                        </div>
                                        <footer class="entry-footer d-flex flex-wrap align-items-center mt-4">
                                            <a href="<?=base_url().$row->link?>" class="button gradient-bg"><?=lang("read_more")?></a>
                                        </footer>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php else: ?>
                <div class="swiper-slide hero-content-wrap"
                     style="background-image: url('<?= base_url() . WEBASSETS ?>images/banner/special.png')">
                    <div class="hero-content-overlay position-absolute w-100 h-100">
                        <div class="container h-100">
                            <div class="row h-100">
                                <div class="col-12 col-lg-6 slider-swip d-flex flex-column justify-content-center align-items-start">
                                    <header class="entry-header">
                                        <h1>Special Need Care</h1>
                                    </header>

                                    <div class="entry-content mt-4">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada
                                            lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula
                                            sapien. Suspendisse cursus faucibus finibus.</p>
                                    </div>
                                    <footer class="entry-footer d-flex flex-wrap align-items-center mt-4">
                                        <a href="#" class="button gradient-bg">Read More</a>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide hero-content-wrap"
                     style="background-image: url('<?= base_url() . WEBASSETS ?>images/banner/hero.png')">
                    <div class="hero-content-overlay position-absolute w-100 h-100">
                        <div class="container h-100">
                            <div class="row h-100">
                                <div class="col-12 col-lg-6 d-flex slider-swip flex-column justify-content-center align-items-start">
                                    <header class="entry-header">
                                        <h1>Eldery Care</h1>
                                    </header>

                                    <div class="entry-content mt-4">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada
                                            lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula
                                            sapien. Suspendisse cursus faucibus finibus.</p>
                                    </div>

                                    <footer class="entry-footer d-flex flex-wrap align-items-center mt-4">
                                        <a href="#" class="button gradient-bg">Read More</a>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide hero-content-wrap"
                     style="background-image: url('<?= base_url() . WEBASSETS ?>images/banner/physio.png')">
                    <div class="hero-content-overlay position-absolute w-100 h-100">
                        <div class="container h-100">
                            <div class="row h-100">
                                <div class="col-12 col-lg-6 d-flex slider-swip flex-column justify-content-center align-items-start">
                                    <header class="entry-header">
                                        <h1>Physiotherapy Care</h1>
                                    </header>

                                    <div class="entry-content mt-4">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada
                                            lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula
                                            sapien. Suspendisse cursus faucibus finibus.</p>
                                    </div>

                                    <footer class="entry-footer d-flex flex-wrap align-items-center mt-4">
                                        <a href="#" class="button gradient-bg">Read More</a>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>

        <div class="pagination-wrap position-absolute w-100">
            <div class="swiper-pagination d-flex flex-row flex-md-column"></div>
        </div>
    </div>
</section>

<div class="homepage-boxes">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-12 col-md-12 col-lg-8 mt-5 mt-lg-0">
                <div class="appointment-box">
                    <h2 class="d-flex align-items-center"><?=lang("about_us")?></h2>
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
                    <div class="read">
                        <footer class="entry-footer d-flex flex-wrap align-items-center mt-4">
                            <a href="<?=base_url()."about"?>" class="button gradient-bg"><?=lang("read_more")?></a>
                        </footer>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>


<!--
<div class="our-departments">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="our-departments-wrap">
                    <h2><?/*=lang('Our_Departments')*/?></h2>

                    <div class="row">
                        <?php /*if (isset($services) && !empty($services)): */?>
                            <?php /*foreach ($services as $row): */?>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="our-departments-cont">
                                        <header class="entry-header">
                                            <?php /*if (is_file(IMAGEPATH . $row->logo)): */?>
                                                <img src="<?/*= base_url() . IMAGEPATH . $row->logo */?>" alt="">
                                            <?php /*else: */?>
                                                <img src="<?/*= base_url() . WEBASSETS */?>images/depts/Nursing-care.png"
                                                     alt="">
                                            <?php /*endif */?>
                                            <h3><?/*=$row->trans->title*/?></h3>
                                        </header>
                                        <div class="entry-content">
                                            <p><?/*=word_limiter($row->trans->content,45)*/?></p>
                                        </div>
                                        <footer class="entry-footer">
                                            <a data-toggle="modal" data-target="#exampleModalCenter"
											   main-id="<?/*=$row->service_id*/?>" onclick="getSub(this,'<?/*=$row->trans->title*/?>');">
												<?/*=lang('read_more')*/?></a>
                                        </footer>
                                    </div>
                                </div>
                            <?php /*endforeach */?>
                        <?php /*else: */?>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="our-departments-cont">
                                    <header class="entry-header">
                                        <img src="<?/*= base_url() . WEBASSETS */?>images/depts/Nursing-care.png" alt="">

                                        <h3>Nursing Care</h3>
                                    </header>
                                    <div class="entry-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada
                                            lorem maximus mauris.</p>
                                    </div>

                                    <footer class="entry-footer">
                                        <a href="#">read more</a>
                                    </footer>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="our-departments-cont">
                                    <header class="entry-header">
                                        <img src="<?/*= base_url() . WEBASSETS */?>images/depts/eldery-care.png" alt="">

                                        <h3>Eldery Care</h3>
                                    </header>

                                    <div class="entry-content">
                                        <p>Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut
                                            ac ligula sapien.</p>
                                    </div>

                                    <footer class="entry-footer">
                                        <a href="#">read more</a>
                                    </footer>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="our-departments-cont">
                                    <header class="entry-header">
                                        <img src="<?/*= base_url() . WEBASSETS */?>images/depts/181451-200.png" alt="">

                                        <h3>Special Need Care</h3>
                                    </header>

                                    <div class="entry-content">
                                        <p>Lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula
                                            sapien. Suspendisse cursus.</p>
                                    </div>

                                    <footer class="entry-footer">
                                        <a href="#">read more</a>
                                    </footer>
                                </div>
                            </div>
                        <?php /*endif */?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->
<section class="testimonial-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2><?=lang("WHY_CHOOSE_US")?></h2>
            </div>
        </div>
    </div>

    <!-- Swiper -->
    <div class="testimonial-slider">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-12 col-lg-8">
                    <div class="testimonial-bg-shape">
                        <div class="owl-carousel owl-theme testimonial-slider-wrap">
                            <?php if (isset($this->setting) && !empty($this->setting)): ?>

                                <div class="item">
                                    <div class="swiper-slide">
                                        <div class="entry-content">
                                            <h3><?=lang('Our_Mission')?></h3>
                                            <p>
                                                <?php
                                                if($this->webLang == "ar"){
                                                    echo (isset($this->setting->ar_Our_Mission))? word_limiter($this->setting->ar_Our_Mission,100):"";
                                                }
                                                elseif($this->webLang == "en"){
                                                    echo (isset($this->setting->en_Our_Mission))? word_limiter($this->setting->en_Our_Mission,100):"";
                                                }
                                                elseif($this->webLang == "es"){
                                                    echo (isset($this->setting->es_Our_Mission))? word_limiter($this->setting->es_Our_Mission,100):"";
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="swiper-slide">
                                        <div class="entry-content">
                                            <h3><?=lang('our_vision')?></h3>
                                            <p>
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
                                            </p>
                                        </div>
                                    </div>
                                </div>
								<div class="item">
									<div class="swiper-slide">
										<div class="entry-content">
											<h3><?=lang('Our_Values')?></h3>
											<p>
												<?php
												if($this->webLang == "ar"){
													echo (isset($this->setting->ar_Our_Values))? word_limiter($this->setting->ar_Our_Values,100):"";
												}
												elseif($this->webLang == "en"){
													echo (isset($this->setting->en_Our_Values))? word_limiter($this->setting->en_Our_Values,100):"";
												}
												elseif($this->webLang == "es"){
													echo (isset($this->setting->es_Our_Values))? word_limiter($this->setting->es_Our_Values,100):"";
												}
												?>
											</p>
										</div>
									</div>
								</div>
                            <?php else: ?>
                                <div class="item">
                                    <div class="swiper-slide">
                                        <div class="entry-content">
                                            <h3>Our Values</h3>
                                            <p>
                                                1- Passion:
                                                To make difference in health care and medical technology field in Middle
                                                East and Africa region<br/>
                                                2- Commitment:
                                                Clear and consistent way of work with our end users and partners<br/>
                                                3- Quality of Services:
                                                Applying the gold standard in connecting our end users and distributors
                                                with service providers and manufacturers<br/>
                                                4- Humanity and Trust:
                                                Building up a long term trustful partnership based on humanity and
                                                ethics with our end users and partners
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="swiper-slide">
                                        <div class="entry-content">
                                            <h3>Our Mission</h3>
                                            <p>Delivering High quality services to our end users making sure of the
                                                availability of up to date medical devices innovations in the region of
                                                Middle East and Africa .</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="swiper-slide">
                                        <div class="entry-content">
                                            <h3>Our Vision</h3>
                                            <p>Building up a leading Medical Technology Company to support a
                                                well-structured end users and service providers network in addition to
                                                manufacturer and distributor network in the region of Middle East and
                                                Africa.</p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </div>
</section>


