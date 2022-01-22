
<!--=============================================  add-to-cart-page  ==========================================-->
<section class="cart-section section-big-py-space">
	<div class="container">
		<div class="">
			<table class="table cart-table table-responsive">
				<thead>
				<tr class="table-head">
					<th scope="col"><?=lang('image')?></th>
					<th scope="col"><?=lang('product name')?></th>
					<th class="hidden-xs" scope="col"><?=lang('price')?></th>
					<th scope="col"><?=lang('quantity')?></th>
					<th scope="col"><?=lang('Total')?></th>
					<th class="hidden-xs  action" scope="col"><?=lang('action')?></th>
				</tr>
				</thead>
				<tbody id="show-cart">

				</tbody>
			</table>
			<table class="table cart-table table-responsive-md">
				<tfoot>
				<tr>
					<td><?=lang('total price')?> :</td>
					<td>
						<h2>EGP<span class="total-cart"></span></h2>
					</td>
				</tr>
				</tfoot>
			</table>
		</div>
		<div class="row cart-buttons">
			<div class="col-12">
				<a href="<?=base_url()."market"?>" class="btn btn-normal"><?=lang('continue shopping')?></a>
				<a href="<?=base_url()."checkout"?>" class="btn btn-normal ml-3 check-button"><?=lang("check out")?></a>
			</div>
		</div>
	</div>
</section>

