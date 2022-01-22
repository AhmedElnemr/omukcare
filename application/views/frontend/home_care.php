
<section class="services">

    <div class="container">
		<?php if (isset($banner["text"]) && !empty($banner["text"])): ?>
        <div class="title">
				<h5><?= $banner["text"]->word->title ?></h5>
				<p><?= $banner["text"]->word->content ?></p>
        </div>
		<?php endif ?>
        <div class="row">
            <?php if(isset($services) && !empty($services)):?>
                <?php foreach ($services as $row): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="box">
                            <div class="icon">

								<?php
/*								$im =  IMAGEPATH . $row->logo ;
								$newblue = imagecolorclosest($im, 0, 0, 255);
								// change it to green
								imagecolorset($im, $newblue, 0, 255, 0);
								imagepng($im);
								imagedestroy($im);
								*/?>

                                <img src="<?= base_url() . IMAGEPATH .$row->web_logo  ?>" class="img-responsive"
                                     alt=""/>
                            </div>
                            <h4>
                                <a main-id="<?=$row->service_id?>" onclick="getSub(this,'<?=$row->trans->title?>');"
								   data-toggle="modal" data-target="#exampleModalCenter">
									<?=$row->trans->title?> </a>
                            </h4>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php else: ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="box">
                        <div class="icon">
                            <img src="<?=base_url().WEBASSETS?>images/icon/eldery-care.png" class="img-responsive" alt=""/>
                        </div>
                        <h4><a href="#"> Elderly Care </a></h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="box">
                        <div class="icon">
                            <img src="<?=base_url().WEBASSETS?>images/icon/181451-200.png" class="img-responsive" alt=""/>
                        </div>
                        <h4><a href="#"> Special Need Care </a></h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="box">
                        <div class="icon">
                            <img src="<?=base_url().WEBASSETS?>images/icon/children-care.png" class="img-responsive" alt=""/>
                        </div>
                        <h4><a href="#"> Children Care </a></h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="box">
                        <div class="icon">
                            <img src="<?=base_url().WEBASSETS?>images/icon/physicans.png" class="img-responsive" alt=""/>
                        </div>
                        <h4><a href="#"> Physicians </a></h4>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</section>

