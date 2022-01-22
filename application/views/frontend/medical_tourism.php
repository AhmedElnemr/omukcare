
<section class="medical">
    <div class="container">
		<?php if (isset($banner["text"]) && !empty($banner["text"])): ?>
			<div class="title">
				<h5><?= $banner["text"]->word->title ?></h5>
				<p><?= $banner["text"]->word->content ?></p>
			</div>
		<?php endif ?>
    </div>
</section>
<main class="cd-main-content">
    <div class="cd-tab-filter-wrapper">
        <div class="cd-tab-filter">
            <ul class="cd-filters">
                <li class="placeholder">
                    <a data-type="none" href="#0"><?=lang("All")?></a>
                    <!--selected option on mobile -->
                </li>
				<li class="filter" data-filter=".alls">
					<a class="selected" href="#0" data-type="alls"> <?=lang("All")?> </a>
				</li>
				<?php
				if (isset($services) && !empty($services)):?>
					<?php foreach ($services as $row): ?>
						<li class="filter" data-filter=".f-<?=$row->id?>">
							<a  href="#0" data-type="f-<?=$row->id?>"><?=$row->word->title?> </a>
						</li>
					<?php endforeach ?>
				<?php else: ?>

					<li class="filter" data-filter=".nursing">
						<a href="#0" data-type="nursing"> Nursing Care </a>
					</li>
					<li class="filter" data-filter=".eldery">
						<a href="#0" data-type="eldery"> Elderly Care </a></li>
				<?php endif ?>
			 </ul>
        </div>
    </div>

    <section class="cd-gallery">
        <ul>
			<?php if (isset($services) && !empty($services)): ?>
				<?php foreach ($services as $row): ?>
					<?php if (!empty($row->subs)): ?>
						<?php foreach ($row->subs as $sub): ?>
							<li class="mix f-<?=$row->id?> alls">
								<div class="post-item-wrap">
									<div class="post-thumbnail-wrap">
										<a href="">
											<div class="post-thumbnail">
												<img src="<?= base_url() . IMAGEPATH . $sub->image?>"
													 alt="Maurice Becker">
											</div>
										</a>
									</div>
									<div class="post-info">
										<div class="caregiver-header">
											<h5 class="post-title">
												<a href=""><?=$sub->word->title?></a>
											</h5>
										</div>
										<div class="post-excerpt">
											<p><?=$sub->word->content?></p>
										</div>
										<div class="caregiver-footer">
											<ul class="list-unstyled">
												<li><a>
														<h3><?=$sub->link?></h3>
													</a>
												</li>
												<li>
													<h4><?=$sub->word->address?></h4>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</li>
						<?php endforeach ?>
					<?php endif; ?>
				<?php endforeach; ?>
			    <!------------------------------------------------------------>
			<?php else: ?>
				<li class="mix eldery physio nursing alls">
					<div class="post-item-wrap">
						<div class="post-thumbnail-wrap">
							<a href="">
								<div class="post-thumbnail">
									<img src="<?= base_url() . WEBASSETS ?>images/photo/2.png" alt="Maurice Becker">
								</div>
							</a>
						</div>
						<div class="post-info">
							<div class="caregiver-header">
								<h5 class="post-title">
									<a href="">Medical Home</a>
								</h5>
							</div>
							<div class="post-excerpt">
								<p>Maurice receives a great deal of compliments from her previous and current patients
									as the most …</p>
							</div>
							<div class="caregiver-footer">
								<ul class="list-unstyled">
									<li><a>
											<h3>www.medicalhome.com</h3>
										</a></li>
									<li>
										<h4>Egypt</h4>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</li>
				<li class="mix physic children training alls">
					<div class="post-item-wrap">
						<div class="post-thumbnail-wrap">
							<a href="">
								<div class="post-thumbnail">
									<img src="<?= base_url() . WEBASSETS ?>images/photo/4.png" alt="Maurice Becker">
								</div>
							</a>
						</div>
						<div class="post-info">
							<div class="caregiver-header">
								<h5 class="post-title">
									<a href="">Medical Home</a>
								</h5>
							</div>
							<div class="post-excerpt">
								<p>Maurice receives a great deal of compliments from her previous and current patients
									as the most …</p>
							</div>
							<div class="caregiver-footer">
								<ul class="list-unstyled">
									<li><a>
											<h3>www.medicalhome.com</h3>
										</a></li>
									<li>
										<h4>Egypt</h4>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</li>
				<li class="mix need eldery children">
					<div class="post-item-wrap">
						<div class="post-thumbnail-wrap">
							<a href="">
								<div class="post-thumbnail">
									<img src="<?= base_url() . WEBASSETS ?>images/photo/4.png" alt="Maurice Becker">
								</div>
							</a>
						</div>
						<div class="post-info">
							<div class="caregiver-header">
								<h5 class="post-title">
									<a href="">Medical Home</a>
								</h5>
							</div>
							<div class="post-excerpt">
								<p>Maurice receives a great deal of compliments from her previous and current patients
									as the most …</p>
							</div>
							<div class="caregiver-footer">
								<ul class="list-unstyled">
									<li><a>
											<h3>www.medicalhome.com</h3>
										</a></li>
									<li>
										<h4>Egypt</h4>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</li>
			<?php endif ?>

            <li class="gap"></li>
            <li class="gap"></li>
            <li class="gap"></li>
        </ul>
        <div class="cd-fail-message">No results found</div>
    </section>
</main>

