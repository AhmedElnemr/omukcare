<div class="product-box">
	<div class="product-imgbox">
		<div class="product-front">
			<img src="<?=base_url().IMAGEPATH.$one->product->image?>" class="img-responsive" alt="product">
		</div>
		<div class="product-back">
			<?php if (isset($one->other_image->image)): ?>
				<img src="<?= base_url() . IMAGEPATH . $one->other_image->image ?>" class="img-responsive"
					 alt="product">
			<?php else: ?>
				<img src="<?=base_url().IMAGEPATH.$one->product->image?>" class="img-responsive" alt="product">
			<?php endif ?>
		</div>
		<div class="product-icon">
			<button title="Add to cart" tabindex="-1" class="add-to-cart"
					data-id="<?=$one->id?>"  data-name="<?=$one->product->word->title?>" data-price="<?=$one->price?>"
					data-img="<?=base_url().IMAGEPATH.$one->product->image?>" data-product-id="<?=$one->product_id?>"
					data-offer-type="<?=$one->offer_type?>" data-offer-value="<?=$one->offer_value?>"
					data-old-price="<?=$one->old_price?>" data-partner-id="<?=$one->product->partner_id?>">
				<i class="fas fa-shopping-cart"></i>
			</button>
			<a onclick="addToWishlist('<?=$one->product_id?>','<?=lang('successfully')?>');" title="Add to Wishlist" tabindex="-1">
				<i class="far fa-heart" aria-hidden="true"></i>
			</a>
			<a href="#" data-toggle="modal" data-target="#quick-view"
			   onclick="getProduct('<?=$one->id?>');"
			   title="Quick View" tabindex="-1">
				<i class="fas fa-search" aria-hidden="true"></i>
			</a>
		</div>
		<?php if ($one->have_offer == "on"): ?>
			<div class="on-sale4"> on sale </div>
			<div class="new-label1">
				<?php
				if($one->offer_type == "per"){
					echo $one->offer_value ."%";
				}else{
					echo $one->offer_value ."$";
				}
				?>
			</div>
		<?php endif ?>
	</div>
	<div class="product-detail detail-center1">
		<!--<ul class="rating-star">
			<li><i class="fa fa-star"></i></li>
			<li><i class="fa fa-star"></i></li>
			<li><i class="fa fa-star"></i></li>
			<li><i class="fa fa-star"></i></li>
			<li><i class="fa fa-star"></i></li>
		</ul>-->
		<a href="<?=base_url()."single-product/".$one->id?>">
			<h6><?=$one->product->word->title?></h6>
		</a>
		<span class="detail-price"><?=$one->price?> $
			<?php if ($one->have_offer == "on"): ?>
				<span><del><?= $one->old_price ?></del></span>
			<?php endif ?>
					</span>
	</div>
	<div class="addtocart_btn">
		<button class="add-button add_cart add-to-cart" title="Add to cart" tabindex="-1"
				data-id="<?=$one->id?>"  data-name="<?=$one->product->word->title?>" data-price="<?=$one->price?>"
				data-img="<?=base_url().IMAGEPATH.$one->product->image?>" data-product-id="<?=$one->product_id?>"
				data-offer-type="<?=$one->offer_type?>" data-offer-value="<?=$one->offer_value?>" data-currency="EGP"
				data-have-offer="<?=$one->have_offer?>"
				data-old-price="<?=$one->old_price?>" data-partner-id="<?=$one->product->partner_id?>">
			add to cart
		</button>
		<div class="qty-box cart_qty">
			<div class="input-group">
				<button type="button" class="btn quantity-left-minus subtract-item" data-type="minus"
						data-field="" tabindex="-1" data-id="<?=$one->id?>">
					<i class="fa fa-minus" aria-hidden="true"></i>
				</button>
				<input type="text" name="quantity" class="form-control input-number qty-input" value="1" tabindex="-1">
				<button type="button" class="btn quantity-right-plus  plus-item" data-type="plus"
						data-field="" tabindex="-1" data-id="<?=$one->id?>">
					<i class="fa fa-plus" aria-hidden="true"></i>
				</button>
			</div>
		</div>
	</div>
</div>
