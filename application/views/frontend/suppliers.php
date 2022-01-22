
<section class="suppliers">
    <div class="container">
		<?php if (isset($banner["text"]) && !empty($banner["text"])): ?>
			<div class="title">
				<h5><?= $banner["text"]->word->title ?></h5>
				<p><?= $banner["text"]->word->content ?></p>
			</div>
		<?php endif ?>
        <div class="row">
            <?php if (isset($all_suppliers) && !empty($all_suppliers)): ?>
                <?php foreach ($all_suppliers as $row): ?>
                    <div class="col-md-6">
                        <figure class="snip1224">
                            <div class="image">
                                <div class="owl-carousel owl-theme gallery-images">
                                    <div class="item">
                                        <img class="" src="<?=base_url().IMAGEPATH.$row->image?>"/>
                                    </div>
                                    <div class="item">
                                        <img class="" src="<?=base_url().IMAGEPATH.$row->image?>"/>
                                    </div>
                                    <div class="item">
                                        <img class="" src="<?=base_url().IMAGEPATH.$row->image?>"/>
                                    </div>
                                </div>
                            </div>
                            <figcaption>
                                <h5><?=$row->word->title?></h5>
                                <p><?=$row->word->content?></p>
                                <div class="Country">
                                    <?=$row->word->address?>
                                </div>
                            </figcaption>
                            <a target="" href="<?=$row->link?>" class="website"><?=$row->link?></a>
                        </figure>
                    </div>
                <?php endforeach ?>
            <?php else: ?>
                <div class="col-md-6">
                    <figure class="snip1224">
                        <div class="image">
                            <div class="owl-carousel owl-theme gallery-images">
                                <div class="item">
                                    <img class="" src="<?=base_url().WEBASSETS?>images/photo/2.png"/>
                                </div>
                                <div class="item">
                                    <img class="" src="<?=base_url().WEBASSETS?>images/photo/3.jpg"/>
                                </div>
                                <div class="item">
                                    <img class="" src="<?=base_url().WEBASSETS?>images/photo/4.png"/>
                                </div>
                            </div>
                        </div>
                        <figcaption>
                            <h5>Medical-Home</h5>
                            <p>I'm just very selective about the reality I choose to accept.I'm just very selective
                                about the reality I choose to accept.</p>
                            <div class="Country">
                                Egypt-Cairo
                            </div>
                        </figcaption>
                        <a href="#" class="website">www.medical-home.com</a>
                    </figure>
                </div>
                <div class="col-md-6">
                    <figure class="snip1224">
                        <div class="image">
                            <div class="owl-carousel owl-theme gallery-images">
                                <div class="item">
                                    <img class="" src="<?=base_url().WEBASSETS?>images/photo/2.png"/>
                                </div>
                                <div class="item">
                                    <img class="" src="<?=base_url().WEBASSETS?>images/photo/3.jpg"/>
                                </div>
                                <div class="item">
                                    <img class="" src="<?=base_url().WEBASSETS?>images/photo/4.png"/>
                                </div>
                            </div>
                        </div>
                        <figcaption>
                            <h5>Medical-Home</h5>
                            <p>I'm just very selective about the reality I choose to accept.I'm just very selective
                                about the reality I choose to accept.</p>
                            <div class="Country">
                                Egypt-Cairo
                            </div>
                        </figcaption>
                        <a href="#" class="website">www.medical-home.com</a>
                    </figure>
                </div>
            <?php endif ?>

        </div>
    </div>
</section>

