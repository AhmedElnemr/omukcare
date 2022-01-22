

<div class="main">
	<div id="mi-slider" class="mi-slider">

		<?php if (isset($departments) && !empty($departments)): ?>
		    <?php $out = '';?>
			<?php foreach ($departments as $one): ?>
				<?php if (isset($one->sub) && !empty($one->sub)): ?>
				<?php $out .= '<a href="#">'.$one->word->title.'</a>'?>
				<ul>
					<?php foreach ($one->sub as $sub): ?>
						<li>
							<a href="<?=base_url()."products/".$sub->id?>">
								<img src="<?=base_url().IMAGEPATH.$sub->image?>" alt="img12">
								<h4><?=$sub->word->title?></h4>
							</a>
						</li>
					<?php endforeach ?>
				</ul>
				<?php endif ?>
			<?php endforeach ?>
		<?php else: ?>
		<ul>
			<li><a href="#"><img src="images/n1.jpg" alt="img12"><h4>Carry-Ons</h4></a></li>
			<li><a href="#"><img src="images/n2.jpg" alt="img13"><h4>Duffel Bags</h4></a></li>
		</ul>
		<?php endif ?>
		<nav>

			<?php if (isset($departments) && !empty($departments)): ?>
				 <?=$out?>
			<?php else: ?>
				<a href="#">medical devices</a>
			<?php endif ?>
		</nav>


	</div>
</div>


