
<section id="content" class=" pb-80">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="text-block mb-50">
					<h5 class="text-block__title"><?=$main->trans->title?></h5>
					<p class="text-block__desc mb-20"><?=$main->trans->content?></p>
				</div><!-- /.text-block -->
				<div class="fancybox-layout1">
					<div class="row">
						<?php if(isset($services) && !empty($services)):?>
						    <?php foreach ($services as $row): ?>
								<div class="col-sm-6 col-md-4 col-lg-4">
									<!-- fancybox item #1 -->
									<div class="fancybox-item d-flex">
										<div class="fancybox__content">
											<h4 class="fancybox__title"><?=$row->trans->title?></h4>
											<p class="fancybox__desc"><?=$row->trans->content?></p>
											<a href="<?=base_url().'make-order/'.$row->service_id?>" class="btn btn__primary btn__outlined btn__rounded mr-30"><?=lang('Make_Order')?></a>
										</div><!-- /.fancybox-content -->
									</div><!-- /.fancybox-item -->
								</div><!-- /.col-sm-6 -->
							<?php endforeach ?>
						<?php endif ?>
					</div><!-- /.row -->
				</div><!-- /.fancybox-layout1 -->
			</div>
		</div>
	</div>
</section>

