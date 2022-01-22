<section class="site-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><?=(isset($banner["title"]))? $banner["title"]:""?></h1>

                <div class="breadcrumbs">
                    <ul class="d-flex flex-wrap align-items-center p-0 m-0">
                        <li><a href="<?=base_url()?>"><?=lang("home")?></a></li>
                        <li><?=(isset($banner["title"]))? $banner["title"]:""?></li>
                    </ul>
                </div><!-- .breadcrumbs -->

            </div>
        </div>
    </div>
    <img class="header-img" src="<?=base_url()?><?=(isset($banner["image"]))? $banner["image"]:WEBASSETS."images/banner/about-bg.png"?>" alt="">
</section><!-- .site-header -->