<?php if (isset($products) && !empty($products)): ?>
	<?php foreach ($products as $one): ?>
		<div class="col-sm-6 col-md-6 col-lg-4">
			<?php $this->load->view("frontend/market/product_companant",["one"=>$one]);?>
		</div>
	<?php endforeach ?>
<?php else: ?>
           <img src="<?=base_url().FAVICONPATH."nodata.png"?>" width="100%" >
<?php endif ?>



