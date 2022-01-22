<section class="wishlist-section section-big-py-space">

	<div class="container">
		<?php if (isset($poroducts) && !empty($poroducts)){ ?>
		<div class="">
			<div class="">
				<table class="table cart-table table-responsive">
					<thead>
					<tr class="table-head">
						<th scope="col"><?=lang('image')?></th>
						<th scope="col"><?=lang('product name')?></th>
						<th scope="col"><?=lang('price')?></th>
						<th scope="col"><?=lang('action')?></th>
					</tr>
					</thead>


					<?php foreach ($poroducts as $one): ?>
						<tbody>
						<tr>
							<td>
								<a href="<?= base_url() . "single-product/" . $one->id ?>">
									<img src="<?= base_url() . IMAGEPATH . $one->product->image ?>" alt="product"
										 class="img-fluid  ">
								</a>
							</td>
							<td><a href="<?= base_url() . "single-product/" . $one->id ?>">
									<?= $one->product->word->title ?></a>
								<div class="mobile-cart-content row">
									<div class="col-xs-3">
										<h2 class="td-color"><?=$one->price?> $</h2></div>
									<div class="col-xs-3">
										<h2 class="td-color">
											<a href="<?=base_url()."remove-from-favourite/".$one->product_id?>" class="icon mr-1">
												<i class="fas fa-times"></i>
											</a>
											<a href="#" class="cart">
												<i class="fas fa-shopping-cart"></i></a>
										</h2>
									</div>
								</div>
							</td>
							<td>
								<h2><?=$one->price?> EGP</h2></td>
							<td>
								<a href="<?=base_url()."remove-from-favourite/".$one->product_id?>" class="icon mr-3">
									<i class="fas fa-times"></i>
								</a>
								<a	 class="cart  add-to-cart"
									  data-id="<?=$one->id?>"  data-name="<?=$one->product->word->title?>" data-price="<?=$one->price?>"
									  data-img="<?=base_url().IMAGEPATH.$one->product->image?>" data-product-id="<?=$one->product_id?>"
									  data-offer-type="<?=$one->offer_type?>" data-offer-value="<?=$one->offer_value?>"
									  data-old-price="<?=$one->old_price?>" data-partner-id="<?=$one->product->partner_id?>"
									  data-currency="EGP" data-have-offer="<?=$one->have_offer?>">
									<i class="fas fa-shopping-cart"></i>
								</a>
							</td>
						</tr>
						</tbody>

					<?php endforeach ?>


				</table>
			</div>
		</div>
		<div class="row wishlist-buttons">
			<div class="col-12"><a href="<?=base_url()."market"?>" class="btn btn-normal"><?=lang('go to  shopping')?></a>
		</div>
		<?php }else{?>
			<div class="alert alert-danger">
				<strong><?=lang('List is empty')?> !</strong> .
			</div>
		<?php }?>
	</div>
</section>



