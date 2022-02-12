<div class="product-item">
	<div class="product__img">
		<img src="<?=base_url().IMAGEPATH.$one->product->image?>" alt="Product" loading="lazy">
		<div class="product__action">
			<a href="#" class="btn btn__primary btn__rounded">
				<span>06.00$ For Rent</span>
			</a>
		</div><!-- /.product-action -->
	</div><!-- /.product-img -->
	<div class="product__info">
		<h4 class="product__title"><a href="#"> <?=$one->product->word->title?> </a></h4>
		<span class="product__price">
                        <a href="#!" class="btn btn__primary btn__rounded" data-toggle="modal"
						   data-target="#exampleModal">12.00$ For Sale</a></span>
	</div><!-- /.product-content -->
</div><!-- /.product-item -->
