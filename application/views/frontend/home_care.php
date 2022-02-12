<!-- ========================
   Our Services
=========================== -->
<section class="services-area bg pt-100 pb-70">
	<div class="container">
		<?php if (isset($banner["text"]) && !empty($banner["text"])): ?>
			<div class="section-title">
				<span class="top-title"><?= $banner["text"]->word->title ?></span>
				<h2><?= $banner["text"]->word->content ?></h2>
			</div>

		<?php else: ?>
			<div class="section-title">
				<span class="top-title">Our Services </span>
				<h2>Our Healthcare Service</h2>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A facilis vel consequatur tempora atque
					blanditiis exercitationem incidunt, alias corporis quam assumenda dicta, temporibus.</p>
			</div>
		<?php endif ?>


		<div class="row">
			<?php if(isset($services) && !empty($services)):?>
			<?php foreach ($services as $row): ?>
					<div class="col-lg-3 col-sm-6 col-xs-12">
						<div class="single-services">
							<span class="flaticon-man">
								<img src="<?= base_url() . IMAGEPATH .$row->web_logo  ?>"/>
							</span>
							<h3><a href="<?=base_url().'services-detail/'.$row->service_id?>"><?=$row->trans->title?></a></h3>
							<p><?=$row->trans->content?></p>
							<div class="services-shape">
								<img src="<?=base_url().WEBASSETS?>images/services/services-card-shape.png" alt="Image">
							</div>
						</div>
					</div>
				<?php endforeach ?>
			<?php else: ?>
			<div class="col-lg-3 col-sm-6 col-xs-12">
				<div class="single-services">
        <span class="flaticon-man">
            <img src="images/services/one.png"/>
        </span>
					<h3><a href="services-detail.html">Nursing Care</a></h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do </p>
					<div class="services-shape">
						<img src="images/services/services-card-shape.png" alt="Image">
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-xs-12">
				<div class="single-services">
        <span class="flaticon-liver">
            <img src="images/services/two.png"/>
        </span>
					<h3><a href="services-detail.html">Elderly Care</a></h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do </p>
					<div class="services-shape">
						<img src="images/services/services-card-shape.png" alt="Image">
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-xs-12">
				<div class="single-services">
        <span class="flaticon-kidney">
            <img src="images/services/three.png"/>
        </span>
					<h3><a href="services-detail.html">Special Need Care</a></h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do </p>
					<div class="services-shape">
						<img src="images/services/services-card-shape.png" alt="Image">
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-xs-12">
				<div class="single-services">
        <span class="flaticon-heart">
            <img src="images/services/four.png"/>
        </span>
					<h3><a href="services-detail.html">Physiotherapy</a></h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do </p>
					<div class="services-shape">
						<img src="images/services/services-card-shape.png" alt="Image">
					</div>
				</div>
			</div>
			<?php endif ?>
		</div>
	</div>
</section>
<!-- /.Services -->
