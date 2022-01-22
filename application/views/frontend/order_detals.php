<section class="make-orders-now">
	<div class="container">
		<div id="make-order">
			<div class="box_form clearfix">
				<h3><?=lang('Make_Order_new')?></h3>
				<div class="box_order ">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" class="form-control" value="<?=(isset($order->service_titles->title))? $order->service_titles->title :"";?>" readonly="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label><?=lang('price')?></label>
								<input type="text"  class="form-control" value="<?=$order->sub_service->cost?>" readonly="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?=lang('No_of_times')?> </label>
								<input type="text"  class="form-control" value="<?=$order->num_times?>" readonly="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label><?=lang("date")?> </label>
								<input type="text"  class="form-control" value="<?=date("Y-m-d H:s",$order->order_time)?>" readonly="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label><?=lang("Age")?> </label>
								<input type="text"  class="form-control" value="<?=$order->age?>" readonly="">

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?=lang("No_of_Patients")?> </label>
								<input type="text"  class="form-control" value="<?=$order->num_patients?>" readonly="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label><?=lang("Gender")?> </label>
								<?php
								if($order->gender == 1){
									$Gender = lang('Male') ;
								}
								elseif ($order->gender == 2){
									$Gender = lang('Female') ;
								}else{
									$Gender = lang('Any') ;
								}
								?>
								<input type="text"  class="form-control" value="<?=$Gender?>" readonly="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>payment-way </label>
								<?php
								if($order->payment == 1){
									$payment = 'Cash Money';
								}
								elseif ($order->payment == 2){
									$payment = "Vodafone Cash" ;
								}
								elseif ($order->payment == 3){
									$payment = "Master Card" ;
								}else{
									$payment = 'Fawry' ;
								}
								?>
								<input type="text"  class="form-control" value="<?=$payment?>" readonly="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group" >
								<label><?=lang("address")?> </label>
								<input type="text"  class="form-control" value="<?=$order->address?>" readonly="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<?=(isset($maps))? $maps['html']:"";?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label><?=lang("phone")?> </label>
								<input type="text"  class="form-control" value="<?=$order->phone?>" readonly="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?=lang("phone_other")?> </label>
								<input type="text"  class="form-control" value="<?=$order->other_phone?>" readonly="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label><?=lang('Description')?></label>
								<textarea  disabled class="form-control" rows="4">
									<?=trim(strip_tags($order->desc))?>
								</textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label><?=lang("Total")?> </label>
								<input type="text"  class="form-control" value="<?=$order->price?>" readonly="">
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>
