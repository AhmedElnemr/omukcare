
<section class="trend-product">

	<div class=" ratio_asos product  section-big-pb-space">
		<div class="container  addtocart_count ">
			<div class="row">
				<div class="collection-content col">
					<div class="page-main-content">
						<div class="row">
							<div class="col-lg-6 col-xs-12">
								<div class="row">
									<div class="product-demo">
										<div class="gallery">
											<div class="previews">
												<?php if (isset($gallary) && !empty($gallary)): ?>
													<?php foreach ($gallary as $image): ?>
														<a href="javascript:void(0)" class="selected"
														   data-full="<?=base_url().IMAGEPATH.$image->image?>">
															<img src="<?=base_url().IMAGEPATH.$image->image?>" width="100" height="100"/>
														</a>
													<?php endforeach ?>
												<?php endif ?>

											</div>
											<div class="full">
												<img src="<?=base_url().IMAGEPATH.$product->product->image?>" width="410" height="520" />
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-xs-12 rtl-text">
								<div class="product-right">
									<div class="row">
										<div class="col-md-6">
											<h6 class="product-title"><?=lang("Product Name")?></h6>
											<p><?=$product->product->word->title?></p>
											<h6 class="product-title"><?=lang('price')?></h6>

											<p><?php if ($product->have_offer == "on"): ?>
													<del><?= $product->old_price ?></del>
												<?php endif ?>
												<span><?=$product->price?> EGP </span></p>

										</div>
										<div class="col-md-6">
											<h6 class="product-title"><?=lang('Company Name')?></h6>
											<p><?=$product->campany->word->title?></p>
											<?php if ($product->have_offer == "on"): ?>
											<h6 class="product-title"><?=lang('Offer')?></h6>
											<p>
												<?php
												if($one->offer_type == "per"){
													echo $one->offer_value ."%";
												}else{
													echo $one->offer_value ."$";
												}
												?>
											</p>
											<?php endif ?>
										</div>
										<div class="col-md-6">
											<h6 class="product-title"><?=lang('Main Category')?></h6>
											<p><?=$product->main_dep->word->title?></p>
										</div>
										<div class="col-md-6">
											<h6 class="product-title"><?=lang('Sub Category')?></h6>
											<p><?=$product->sub_dep->word->title?></p>
										</div>
										<div class="col-md-6">
											<h6 class="product-title"><?=lang('Partner')?></h6>
											<p><?=$product->partner->word->title?></p>
										</div>
										<div class="col-md-6">
											<h6 class="product-title"><?=lang('Made in')?></h6>
											<p><?=$product->country->word->name?></p>
										</div>
									</div>
									<div class="product-description border-product">
										<!--<h6 class="product-title">quantity</h6>
										<div class="qty-box">
											<div class="input-group"><span class="input-group-prepend">
                                                    <button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="fas fa-minus"></i></button> </span>
												<input type="text" name="quantity" class="form-control qty-input input-number" value="1"> <span class="input-group-prepend">
                                                    <button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="fas fa-plus"></i></button></span></div>
										</div>-->
									</div>
									<div class="border-product">
										<h6 class="product-title"><?=lang('product details')?></h6>
										<p><?=$product->product->word->content?> </p>
										<ul class="">
											<li>
												<h6 class="product-title">
													<?=lang('Registered according to the specifications of the Ministry of Health Number')?> :
											             <?=$product->product->license_num?>
												</h6>
											</li>
										</ul>
									</div>
									<div class="border-product">
										<div class="product-buttons">
											<a  class="btn btn-normal add-to-cart"
											   data-id="<?=$product->id?>"  data-name="<?=$product->product->word->title?>" data-price="<?=$product->price?>"
											   data-img="<?=base_url().IMAGEPATH.$product->product->image?>" data-product-id="<?=$product->product_id?>"
											   data-offer-type="<?=$product->offer_type?>" data-offer-value="<?=$product->offer_value?>" data-currency="EGP"
											   data-old-price="<?=$product->old_price?>" data-partner-id="<?=$product->product->partner_id?>"
											data-have-offer="<?=$product->have_offer?>">
												<?=lang('add to cart')?>
											</a>
											<a href="#" class="btn btn-normal "><?=lang('add to wishlist')?></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php if (isset($other) && !empty($other)): ?>
	<section class="similar-product">
		<div class="title4 section-my-space">
			<h4>Similar <span> products </span></h4>
		</div>
		<div class=" ratio_asos product  section-big-pb-space">
			<div class="container  addtocart_count ">
				<div class="row">
					<div class="col pr-0">
						<div class="product-slide-6">
							<div class="product-trend owl-carousel owl-theme">
								<?php foreach ($other as $one): ?>
									<div class="item">
										<?php $this->load->view("frontend/market/product_companant", ["one" => $one]); ?>
									</div>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif ?>
<div class="clearfix"></div>

