

<section class="parteners">
    <div class="container">
		<?php if (isset($banner["text"]) && !empty($banner["text"])): ?>
			<div class="title">
				<h5><?= $banner["text"]->word->title ?></h5>
				<p><?= $banner["text"]->word->content ?></p>
			</div>
		<?php endif ?>
        <div class="row">
            <?php if (isset($all_parteners) && !empty($all_parteners)): ?>
                <?php foreach ($all_parteners as $row): ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="post-item-wrap">
                            <div class="post-thumbnail-wrap">
                                <a href="">
                                    <div class="post-thumbnail">
                                        <img src="<?=base_url().IMAGEPATH.$row->image?>" alt="Maurice Becker">
                                    </div>
                                </a>
                            </div>
                            <div class="post-info">
                                <div class="caregiver-header">
                                    <h5 class="post-title">
                                        <?=$row->word->title?>
                                    </h5>
                                </div>
                                <div class="post-excerpt">
                                    <p><?=$row->word->content?></p>
                                </div>
                                <div class="caregiver-footer">
                                    <a target="_blank" href="<?=$row->link?>">
                                        <h3><?=$row->link?></h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ;?>
            <?php else: ?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="post-item-wrap">
                    <div class="post-thumbnail-wrap">
                        <a href="">
                            <div class="post-thumbnail">
                                <img src="<?=base_url().WEBASSETS?>images/photo/5.jpg" alt="Maurice Becker">
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
                            <p>Maurice receives a great deal of compliments from her previous and current patients as the most …</p>
                        </div>
                        <div class="caregiver-footer">
                            <a><h3>www.medicalhome.com</h3></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="post-item-wrap">
                    <div class="post-thumbnail-wrap">
                        <a href="">
                            <div class="post-thumbnail">
                                <img src="<?=base_url().WEBASSETS?>images/photo/4.png" alt="Maurice Becker">
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
                            <p>Maurice receives a great deal of compliments from her previous and current patients as the most …</p>
                        </div>
                        <div class="caregiver-footer">
                            <a><h3>www.medicalhome.com</h3></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif ?>
        </div>
    </div>
</section>

