<section class="page-title page-title-layout1 bg-overlay">
	<div class="bg-img"><img src="<?=base_url().WEBASSETS?>images/about/about-us.jpg" alt="background"></div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
				<h1 class="pagetitle__heading"><?=(isset($banner["title"]))? $banner["title"]:""?></h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?=base_url()?>"><?=lang("home")?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?=(isset($banner["title"]))? $banner["title"]:""?></li>
					</ol>
				</nav>
			</div><!-- /.col-xl-5 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.page-title -->
