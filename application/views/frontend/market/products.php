<section class="shop-grid">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-4 col-lg-3">
				<aside class="sidebar-layout2">
					<!--<div class="widget widget-search">
						<h5 class="widget__title">Search</h5>
						<div class="widget__content">
							<form class="widget__form-search">
								<input type="text" class="form-control" placeholder="Search...">
								<button class="btn" type="submit"><i class="icon-search"></i></button>
							</form>
						</div>
					</div>-->
					<div class="widget widget-categories">
						<h5 class="widget__title">Categories</h5>
						<div class="widget-content">
							<ul class="list-unstyled mb-0">
								<?php if (isset($departments) && !empty($departments)): ?>
									<?php foreach ($departments as $one): ?>
										<li><a href="<?=base_url()."products/".$one->id?>">
												<!--<span class="cat-count">4</span>-->
												<span> <?=$one->word->title?></span></a>
										</li>
									<?php endforeach ?>
								<?php endif ?>
							</ul>
						</div><!-- /.widget-content -->
					</div><!-- /.widget-categories -->
					<div class="widget widget-poducts">
						<h5 class="widget__title">Best Sellers</h5>
						<div class="widget__content">
							<?php if (isset($products) && !empty($products)): ?>
								<?php foreach ($products as $one): ?>
									<div class="widget-product-item d-flex align-items-center">
										<div class="widget-product__img">
											<a href="#"><img src="<?=base_url().IMAGEPATH.$one->product->image?>" alt="Product"
															 loading="lazy"></a>
										</div><!-- /.product-product-img -->
										<div class="widget-product__content">
											<h5 class="widget-product__title"><a href="#"><?=$one->product->word->title?></a>
											</h5>
											<span class="widget-product__price">$ 300.00</span>
										</div><!-- /.widget-product-content -->
									</div>
								<?php endforeach ?>
							<?php endif ?>

						</div>
					</div><!-- /.widget-poducts -->
				</aside><!-- /.sidebar -->
			</div><!-- /.col-lg-3 -->
			<div class="col-sm-12 col-md-8 col-lg-9">
				<div class="row">
					<!-- Product item #1 -->
					<?php $this->load->view("frontend/market/products_load");?>

				</div><!-- /.row -->
				<!--<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 text-center">
						<nav class="pagination-area">
							<ul class="pagination justify-content-center">
								<li><a class="current" href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</nav>
					</div>
				</div>-->
			</div><!-- /.col-lg-9 -->

		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.shop -->
