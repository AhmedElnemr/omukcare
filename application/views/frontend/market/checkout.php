<section class="section-big-py-space bg-light">
	<div class="container">
		<div class="checkout-page contact-page">
			<div class="checkout-form">
				<?= form_open_multipart('create-market-order'); ?>
					<div class="row">
						<div class="col-lg-6 col-sm-12 col-xs-12">
							<div class="checkout-title">
								<h3><?=lang('Billing Details')?></h3></div>
							<div class="theme-form">
								<div class="row check-out ">
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<label class="field-label"><?= lang("address") ?></label>
										<input type="text" name="address" value="" data-validation="required">
									</div>
									<div id="cart-cart-input"></div>
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<label class="field-label"><?= lang("choose_your_date") ?></label>
										<input type="text" name="order_date_time" class="form-control datepicker"
											   data-validation="required">
									</div>
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<?= (isset($maps)) ? $maps['html'] : ""; ?>
										<input type="hidden" name="address_lat" id="lat" value="30.043489"/>
										<input type="hidden" name="address_long" id="lng" value="31.235291"/>
									</div>

								</div>
							</div>
						</div>
						<div class="col-lg-6 col-sm-12 col-xs-12">
							<div class="checkout-details theme-form  section-big-mt-space">
								<div class="order-box">
									<div class="title-box">
										<div><?=lang('products')?> <span><?=lang('Total')?></span></div>
									</div>
									<ul class="qty" id="show-cart-row">

									</ul>
									<!--<ul class="sub-total">
										<li>Subtotal <span class="count">$ <span class="total-cart"></span></span></li>
										<li>Shipping
											<div class="shipping">
												<div class="shopping-option">
													<input type="checkbox" name="free-shipping" id="free-shipping">
													<label for="free-shipping">Free Shipping</label>
												</div>

											</div>
										</li>
									</ul>-->
									<ul class="total">
										<li>Total <span class="count"><h3 class="total-cart"></h3></span></li>
									</ul>
								</div>
								<div class="payment-box">
									<div class="upper-box">
										<div class="payment-options">
											<ul>
												<!--<li>
													<div class="radio-option">
														<input type="radio" name="payment-group" id="payment-1" checked="checked">
														<label for="payment-1">Check Payments<span class="small-text">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</span></label>
													</div>
												</li>-->
												<li>
													<div class="radio-option">
														<input type="radio" name="payment_type" value="cash"
															   id="payment-2" data-validation="required">
														<label for="payment-2"><?=lang("Cash On Delivery")?>
													<!--		<span class="small-text"><?/*=lang('Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.')*/?></span>
													-->	</label>
													</div>
												</li>
												<li>
													<div class="radio-option paypal">
														<input type="radio" name="payment_type" value="paypal"
															   id="payment-3" data-validation="required">
														<label for="payment-3">PayPal
															<!--	<span class="image"><img src="assets/images/paypal.png" alt=""></span></label>-->
													</div>
												</li>
											</ul>
										</div>
									</div>
									<div class="text-right"><input class="btn_1 send-order" type="submit" name="INSERT"
																   value="<?= lang('Send_Order') ?>" style=""></div>
								</div>
							</div>
						</div>
					</div>
				<?= form_close() ?>
			</div>
		</div>
	</div>
</section>

    

