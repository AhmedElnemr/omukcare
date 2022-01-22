<div class="row">
	<?php
	$left ='';
	$right = "";
	if (isset($dataTable) && !empty($dataTable)): ?>
		<?php
		$x = 0;

		foreach ($dataTable as $row):
			$div = '<li>
						<a class="toggle" >
							<i class="fas fa-long-arrow-alt-right"></i>'.$row->trans->title.'</a>
						<ul class="inner">
							<p>'.$row->trans->content.'</p>
							<a class="make-order" href="'.base_url().'make-order/'.$row->service_id.'">'.lang('Make_Order').'</a>
						</ul>
					</li>';
		  if($x %2 == 0){
			  $left  .= $div;
		  }
		  else{
			  $right .= $div;
		  }
		  $x++;
		endforeach;
		?>

		<div class="col-md-6">
			<ul class="accordion">
				<?=$left?>
			</ul>
		</div>
		<div class="col-md-6">
			<ul class="accordion">
				<?=$right?>
			</ul>
		</div>
	<?php endif ?>
</div>
