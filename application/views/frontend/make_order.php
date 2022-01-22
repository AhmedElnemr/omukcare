<section class="make-orders-now">
	<div class="container">
		<div id="make-order">

			<?= form_open_multipart('create-order'); ?>
			<div class="box_form clearfix">
				<h3><?= lang('Make_Order_new') ?></h3>
				<div class="box_order ">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" class="form-control"
									   value="<?= (isset($service->trans->title)) ? $service->trans->title : ""; ?>"
									   readonly="">
								<input name="Pdata[sub_service_id]" id="sub_service_id" type="hidden" class="form-control"
									   value="<?= $service->service_id ?>">
								<input name="Pdata[main_service_id]" type="hidden" class="form-control"
									   value="<?= $service->perant_id ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" id="cost" class="form-control get-total-order"
									   value="" readonly="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<select class="form-control get-total-order" id="num_times" name="Pdata[num_times]"
										data-validation="required" aria-required="true">
									<option value=""><?= lang('No_of_times') ?></option>
									<?php for ($x = 1; $x <= 30; $x++): ?>
										<option value="<?= $x ?>"><?= $x ?></option>
									<?php endfor ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" name="order_date_time" class="form-control datepicker"
									   data-validation="required" placeholder="<?= lang("choose_your_date") ?>">
								<span><i class="fas fa-calendar-week"></i></span>
							</div>
						</div>
						<?php if (isset($specialization) && !empty($specialization)): ?>
						<div class="col-md-6">
								<div class="form-group">
									<div class="select">
										<select name="Pdata[specialty_id]" id="specialty_id" class="form-control get-total-order"
												data-validation="required" aria-required="true">
											<option value=""> <?= lang('Specialization') ?> </option>
											<?php foreach ($specialization as $row): ?>
												<option value="<?= $row->id ?>"> <?= $row->trans->title ?> </option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
						</div>
						<?php endif ?>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="number" name="Pdata[age]" class="form-control" data-validation="required"
									   placeholder="<?= lang("Age") ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<select class="form-control  get-total-order" id="num_patients"
										name="Pdata[num_patients]" data-validation="required" aria-required="true">
									<option value=""><?= lang('No_of_Patients') ?></option>
									<?php for ($x = 1; $x <= 5; $x++): ?>
										<option value="<?= $x ?>"><?= $x ?></option>
									<?php endfor ?>
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<select class="form-control" name="Pdata[gender]" data-validation="required"
										aria-required="true">
									<option value=""><?= lang('Gender') ?></option>
									<option value="1"><?= lang('Male') ?></option>
									<option value="2"><?= lang('Female') ?></option>
									<option value="3"><?= lang('Any') ?></option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<select class="form-control" name="Pdata[payment]" data-validation="required"
										aria-required="true">
									<option value="">payment-way</option>
									<option value="3">Master Card</option>
									<option value="2">Vodafone Cash</option>
									<option value="4">Fawry</option>
									<option value="1">Cash Money</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<select class="form-control get-total-order" id="area_id"
										name="Pdata[area_id]" data-validation="required" aria-required="true">
									<?php if (isset($area) && !empty($area)): ?>
										<?php foreach ($area as $row): ?>
											<option value="<?=$row->area_id?>"> <?=$row->word->title?> </option>
										<?php endforeach ?>
									<?php endif ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" name="Pdata[address]" class="form-control" data-validation="required"
									   placeholder="<?= lang("address") ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<?= (isset($maps)) ? $maps['html'] : ""; ?>
								<input type="hidden" name="Pdata[google_lat]" id="lat" value="30.043489"/>
								<input type="hidden" name="Pdata[google_long]" id="lng" value="31.235291"/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="number" name="Pdata[phone]" class="form-control" data-validation="required"
									   placeholder="<?= lang('phone') ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="number" name="Pdata[other_phone]" class="form-control"
									   data-validation="required" placeholder="<?= lang('phone_other') ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<textarea name="Pdata[desc]" data-validation="required"
										  placeholder="<?= lang('Description') ?>" class="form-control"
										  rows="4"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" name="Pdata[price]" id="price" data-validation="required" readonly=""
									   class="form-control" placeholder="<?= lang('Total') ?>">
							</div>
						</div>
					</div>

					<div class="form-group">
						<input class="btn_1 send-order" type="submit" value="<?= lang('Send_Order') ?>" style="">
					</div>
				</div>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</section>
