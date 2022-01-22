
<section class="trend-product">

	<div class=" ratio_asos product  section-big-pb-space">
		<div class="container  addtocart_count ">
			<div class="row">
				<div class="col-sm-3 col-xs-12 collection-filter category-page-side">
					<div class="collection-filter-block creative-card creative-inner category-side">
						<!-- brand filter start -->
						<div class="collection-mobile-back">
							 <span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> </span>
						</div>
						<div class="collection-collapse-block open">
							<h3 class="collapse-block-title mt-0"></h3>
							<div class="collection-collapse-block-content">
								<ul class="list-unstyled">
									<?php if (isset($departments) && !empty($departments)): ?>
										<?php foreach ($departments as $one): ?>
											<li>
												<a href="<?=base_url()."products/".$one->id?>">
													<i class="fas fa-circle"></i> <?=$one->word->title?>
												</a>
											</li>
										<?php endforeach ?>
									<?php endif ?>
								</ul>
							</div>
						</div>
					</div>
					<!--<div class="theme-card creative-card creative-inner">
						<h5 class="title-border">new product</h5>
					</div>-->
				</div>

				<div class="collection-content col-md-9 col-xs-12">
					<div class="page-main-content">
						<div class="row">
							<div class="collection-product-wrapper">
								<div class="product-top-filter">
									<div class="row">
									</div>
								<!--	<div class="product-filter-content">
										<div class="row">
											<div class="col-md-6 col-xs-12">
												<div class="product-page-per-view">
													<select>
														<option value="High to low">24 Products Par Page</option>
														<option value="Low to High">50 Products Par Page</option>
														<option value="Low to High">100 Products Par Page</option>
													</select>
												</div>
											</div>
											<div class="col-md-6 col-xs-12">
												<div class="product-page-filter">
													<select>
														<option value="High to low">Sorting items</option>
														<option value="Low to High">50 Products</option>
														<option value="Low to High">100 Products</option>
													</select>
												</div>
											</div>
										</div>
									</div>-->
									<div class="pr-0">
										<div class="product-trend row ">
											<?php $this->load->view("frontend/market/products_load");?>
										</div>
									</div>
								<!--	<div class="product-pagination">
										<div class="theme-paggination-block">
											<div class="row">
												<div class="col-xl-6 col-md-6 col-sm-12">
													<nav aria-label="Page navigation">
														<ul class="pagination">
															<li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span> <span class="sr-only">Previous</span></a></li>
															<li class="page-item active"><a class="page-link" href="#">1</a></li>
															<li class="page-item"><a class="page-link" href="#">2</a></li>
															<li class="page-item"><a class="page-link" href="#">3</a></li>
															<li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span> <span class="sr-only">Next</span></a></li>
														</ul>
													</nav>
												</div>
												<div class="col-xl-6 col-md-6 col-sm-12">
													<div class="product-search-count-bottom">
														<h5>Showing Products 1-24 of 10 Result</h5>
													</div>
												</div>
											</div>
										</div>
									</div>-->
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>
</section>

<div class="modal fade bd-example-modal-lg theme-modal" id="quick-view">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content quick-view-modal">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<div class="row" id="result-product"></div>
			</div>
		</div>
	</div>
</div>



