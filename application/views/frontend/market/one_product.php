<div class="col-lg-6 col-xs-12">
	<div class="quick-view-img">
		<img src="<?=base_url().IMAGEPATH.$product->product->image?>" alt="quick" class="img-fluid ">
	</div>
</div>
<div class="col-lg-6 rtl-text">
	<div class="product-right">
		<h2><?=$product->product->word->title?></h2>
		<h3><?=$product->price?></h3>
		<div class="border-product">
			<h6 class="product-title"><?=lang('product details')?></h6>
			<p><?=$product->product->word->content?></p>
		</div>
		<div class="product-description border-product">
			<h6 class="product-title"><?=lang('quantity')?></h6>
			<div class="qty-box">
				<div class="input-group"><span class="input-group-prepend"><button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="fas fa-angle-left"></i></button> </span>
					<input type="text" name="quantity" class="form-control input-number" value="1"> <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="fas fa-angle-right"></i></button></span></div>
			</div>
		</div>
		<div class="product-buttons">
			<a  class="btn btn-normal add-to-cart"
			   data-id="<?=$product->id?>"  data-name="<?=$product->product->word->title?>" data-price="<?=$product->price?>"
			   data-img="<?=base_url().IMAGEPATH.$product->product->image?>" data-product-id="<?=$product->product_id?>"
			   data-offer-type="<?=$product->offer_type?>" data-offer-value="<?=$product->offer_value?>" data-have-offer="<?=$product->have_offer?>"
			   data-old-price="<?=$product->old_price?>" data-partner-id="<?=$product->product->partner_id?>" data-currency="EGP">
				add to cart
			</a>
			<a href="<?= base_url() . "single-product/" . $product->id ?>" class="btn btn-normal"><?=lang('view detail')?></a></div>
	</div>
</div>
