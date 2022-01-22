
<div class="modal fade service-detail" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="sub-service-show"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=lang('close')?></button>
            </div>
        </div>
    </div>
</div>




<div class="subscribe-banner">
    <div class="container">
        <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <h1 class="text-white"><?=lang('download')?> <span> <?=lang("home_care")?></span></h1>
                            <p class="text-white">
							<?=lang('download_app_text')?>
                             </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                            <div class="col-md-6" style="width:40%;display: flex;margin:auto;margin-left: 100px;float: left">
                                <img src="<?=base_url().FAVICONPATH."iphone.jpeg"?>" width="80" height="78" style="margin-top: 30px"/>
                                <div>
                                    <a target="_blank" href="<?=(isset($this->setting->App_Store))? $this->setting->App_Store :"#";?>">
                                        <button class="download-btn">
                                            <i class="fab fa-apple"></i>
                                            <span>
                                                <?= lang('Available_on_the') ?>
                                                <span class="large-text">App Store</span>
                                            </span>
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6" style="width: 49%;display: flex;">
                                <div>
                                    <a target="_blank" href="<?=(isset($this->setting->Play_Store))? $this->setting->Play_Store :"#";?>">
                                        <button class="download-btn">

                                            <i class="fab fa-google-play"></i>
                                            <span>
                                                <?= lang('Available_on_the') ?>
                                                <span class="large-text">Play Store</span>
                                            </span>
                                        </button>
                                    </a>
                                </div>
                                <img src="<?=base_url().FAVICONPATH."android.jpeg"?>" width="80" height="78" style="margin-top: 30px"/>
                            </div>

                    </div>
                </div>
    </div>
</div>
<footer class="site-footer">
    <div class="footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="foot-about">
                        <h2>
							<a href="<?=base_url()?>">
								<?php
								if (isset($page_name)) {
									if ($page_name == "home-care") {
										$image = base_url();
										$image .= ($this->webLang == "ar") ? LOGO_HOME_CARE_AR : LOGO_HOME_CARE_EN;
									}
									elseif ($page_name == "medical-tourism") {
										$image = base_url();
										$image .= ($this->webLang == "ar") ? LOGO_TECNOLOGY_AR : LOGO_TECNOLOGY_EN;
									}
									else {
										$image = base_url();
										$image .= ($this->webLang == "ar") ? LOGO_HOME_AR : LOGO_HOME_EN;
									}
								}
								else {
									$image = base_url().WEBASSETS . 'images/Logo/LOGO-day-star-psd.png';
								}
								?>
								<img src="<?=$image?>" alt="Logo">
							</a>
						</h2>
						<?php if (isset($this->setting) && !empty($this->setting)): ?>
							<p>
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
							</p>
						<?php else: ?>
							<p>Based on more than 20 years of experience in the field of medical devices in Middle East
								North Africa region.
							</p>
						<?php endif ?>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mt-5 mt-md-0">
                    <div class="foot-contact">
                        <h2><?=lang('contact_us')?></h2>
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
                </div><!-- .col -->

                <div class="col-12 col-md-6 col-lg-4 mt-5 mt-md-0">
                    <div class="foot-links">
                        <h2><?=lang('Usefull_Links')?></h2>

                        <ul class="p-0 m-0">
							<li>
								<a href="<?= base_url() ?>"><?= lang('home') ?></a></li>
							<li>
								<a href="<?= base_url() . "about" ?>"><?= lang('about_us') ?></a></li>
							<li>
								<a href="<?= base_url() . "parteners" ?>"><?= lang('Parteners') ?></a>
							</li>
							<li>
								<a href="<?= base_url() . "suppliers" ?>"><?= lang('Suppliers') ?></a>
							</li>
							<li>
								<a href="<?= base_url() . "home-care" ?>"><?= lang("home_care") ?></a>
							</li>
							<li>
								<a	href="<?= base_url() . "medical-tourism" ?>"><?= lang('medical_tourism') ?></a>
							</li>
							<li>
								<a href="<?= base_url() . "contact-us" ?>"><?= lang('contact_us') ?></a>
							</li>
                        </ul>
                    </div><!-- .foot-links -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .footer-widgets -->
</footer><!-- .site-footer -->
<?php if(isset($maps)) { ?>
	<script type="text/javascript">
		var centreGot = false;
	</script>
<?=$maps['js'];?>
<?php 	} ?>
<?php   $this->load->view('backend/requires/config_js');?>





<script src="<?=base_url().WEBASSETS?>js/jquery-3.3.1.min.js"></script>
<script src="<?=base_url().WEBASSETS?>js/popper.min.js"></script>
<script src="<?=base_url().WEBASSETS?>js/bootstrap.min.js"></script>
<script src="<?=base_url().WEBASSETS?>js/owl.carousel.min.js"></script>
<script src="<?=base_url().WEBASSETS?>js/jquery.nice-select.min.js"></script>
<script src="<?=base_url().WEBASSETS?>js/bootstrap-select.min.js"></script>
<script src="<?=base_url().WEBASSETS?>js/swiper.min.js"></script>
<script src="<?=base_url().WEBASSETS?>js/modernizr.custom.63321.js"></script>
<script src="<?=base_url().WEBASSETS?>js/jquery.catslider.js"></script>
<script src="<?=base_url().WEBASSETS?>js/custom.js?v=<?=time()?>"></script>
<script src="<?= base_url() . ASS ?>script/my_script.js?v=<?=time()?>" type="text/javascript"></script>
<!----------------------------------------CART  ------------------------------------------------------>
<script>
 var msg = '<?=lang("Successfully added to the cart")?>';
</script>
<script src="<?= base_url() . ASS ."cart/my_cart_class.js?ver=" . time() ?>"></script>
<script src="<?= base_url() . ASS ."cart/js_my_cart.js?ver=" . time() ?>"></script>
<!----------------------------------------SWEET  ------------------------------------------------------>
<script src="<?= base_url() . ASS ."sweetalert/sweetalert.js"?>"></script>
<?php   $this->load->view('frontend/requires/sweetalert');?>
<!----------------------------------------  ------------------------------------------------------>
<!------------------------------>
<?php if (isset($myFiles) && in_array("market",$myFiles) ):?>
<script>
	$(function() {
		$( '#mi-slider' ).catslider();
	});
</script>
<script>
    function getProduct(id) {
		$.ajax({
			type:'get',
			url: '<?=base_url() ?>get-product-by-id/'+id,
			dataType: 'html',
			cache:false,
			success: function(html){
				$("#result-product").html(html);
			},
			error:function(error){
				console.log(error.responseText);
			}
		});

	}
</script>
	<script src="<?=base_url().WEBASSETS?>css/fancybox/jquery.fancybox.js?v=2.1.4"></script>
	<script>
		$(document).ready(function() {
			$('a').click(function() {
				var largeImage = $(this).attr('data-full');
				$('.selected').removeClass();
				$(this).addClass('selected');
				$('.full img').hide();
				$('.full img').attr('src', largeImage);
				$('.full img').fadeIn();


			}); // closing the listening on a click
			$('.full img').on('click', function() {
				var modalImage = $(this).attr('src');
				$.fancybox.open(modalImage);
			});
		}); //closing our doc ready

	</script>
<?php endif ?>

<?php if (isset($myFiles) && in_array("medical_tourism",$myFiles) ): ?>
    <script src="<?=base_url().WEBASSETS?>js/modernizr.js"></script>
    <script src="<?=base_url().WEBASSETS?>js/jquery.mixitup.min.js"></script>
    <script src="<?=base_url().WEBASSETS?>js/main.js"></script>
<?php endif ?>


<?php if (isset($myFiles) && in_array("home",$myFiles) ): ?>
    <script>
        var mySwiper = new Swiper('.hero-slider', {
            slidesPerView: 1,
            spaceBetween: 0,
            // loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                renderBullet: function (index, className) {
                    return '<span class="' + className + '">0' + (index + 1) + '</span>';
                },
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            }
        });
    </script>
    <script>
        $('.owl-carousel.testimonial-slider-wrap').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
    </script>
<?php endif ?>

<?php if (isset($myFiles) && in_array("suppliers",$myFiles) ): ?>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })

    </script>
<?php endif ?>

<?php if (isset($myFiles) && in_array("make_order",$myFiles) ): ?>
	<script>
          $(".get-total-order").on("keyup change",function () {
            // 	console.log("go")
            // var cost = $("#cost").val() || 0 ;
             var num_times = parseFloat($("#num_times").val()) || 1;
             var sub_service_id = parseFloat($("#sub_service_id").val()) || 0;
             var num_patients = parseFloat($("#num_patients").val()) || 1;
             var specialty_id = parseFloat($("#specialty_id").val()) || 0;
             var area_id = parseFloat($("#area_id").val()) || 0;
             //-------------------------------
			 // console.log(sub_service_id)
			 var dataString = {sub_service_id:sub_service_id,area_id:area_id,specialty_id:specialty_id};
			  $.ajax({
				  type:'post',
				  url: '<?=base_url()?>api/service-price',
				  data:dataString,
				  dataType: 'json',
				  cache:false,
				  success: function(html){
					 // console.log("json");
					 // console.log(html.price);
					  cost = html.price;
					  var price = cost * num_times * num_patients ;
					  $("#price").val(price);
					  $("#cost").val(price);
				  },
				  error:function(error){
					  console.log(error.responseText);
				  }
			  });
             //-------------------------------

		  });

	</script>

	<script src="<?=base_url().ASS ?>date-picker/jquery.datetimepicker.full.js"></script>
    <script>
	   $('.datepicker').datetimepicker({
		   format:'Y-m-d H:i',
		   formatTime:	'H:i',
		   time: true
	   });
    </script>
    <script src="<?= base_url().ASS ?>validator/jquery.form-validator.js?v=<?=VER?>"></script>
	<script>
		$(function () {
			$.validate({
				validateHiddenInputs: true
			});
		});
	</script>
<?php endif ?>



<script>

	function getSub(obj,title) {
		var mainId = $(obj).attr("main-id");
		//console.log('<?= base_url() .'sub-service/'?>'+ mainId);
		$("#exampleModalLongTitle").text(title);
		$("#sub-service-show").html('');
		$.ajax({
			type:'get',
			url:'<?= base_url() .'sub-service/'?>'+ mainId ,
			dataType: 'html',
			cache:false,
			success: function(html){
				//console.log(html);
				$("#sub-service-show").html(html);
				$('.toggle').click(function(e) {
					var $this = $(this);
					if ($this.next().hasClass('show')) {
						$this.next().removeClass('show');
						$this.next().slideUp(350);
					} else {
						$this.parent().parent().find('li .inner').removeClass('show');
						$this.parent().parent().find('li .inner').slideUp(350);
						$this.next().toggleClass('show');
						$this.next().slideToggle(350);
					}
				});
			},
			error:function(error){
				console.log(error.responseText);
			}
		});
	}

</script>

<script>
    $('.toggle-inner').on('click', function(e) {
        e.preventDefault();
        $('body').toggleClass('going');
        $('.close-menu').on('click', function() {
            $('body').removeClass('going');
        });
    });

    var Concertina = function(el, multiple) {
        this.el = el || {};

        this.multiple = multiple || false;

        var dropdown_here = this.el.find('.dropdown-here');
        dropdown_here.on('click', {
                el: this.el,
                multiple: this.multiple
            },
            this.dropdown);
    };

    Concertina.prototype.dropdown = function(e) {
        e.preventDefault();
        var $el = e.data.el,
            $this = $(this),

            $next = $this.next();

        $next.slideToggle();
        $this.parent().toggleClass('open');

        if (!e.data.multiple) {
            $el.find('.submenuItems').not($next).slideUp().parent().removeClass('open');
        }
    }
    var accordion = new Concertina($('.slide-menu'), false);

</script>
<script>
    $(".nav-item").on("click", function(e){
        $("li.nav-item").removeClass("active-item");
        $(this).addClass("active-item");
    });
</script>

<!----------------------------------------------------------------------------------------->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/5e2aec3adaaca76c6fcfae3b/default';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
	})();
</script>
<!--End of Tawk.to Script-->
<!----------------------------------------------------------------------------------------->


</body>
</html>
