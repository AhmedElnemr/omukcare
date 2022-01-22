<div class="clearfix"></div>
<div id="content" class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-3 col-lg-3 page-sidebar">
				<aside>
					<div class="sidebar-box">
						<div class="user">
							<figure>
								<?php if (!empty($user->logo) && is_file(IMAGEPATH . $user->logo)): ?>
									<img src="<?= base_url() . IMAGEPATH .$user->logo ?>" alt="" width="59" height="59">
								<?php else: ?>
									<img src="<?= base_url() . WEBASSETS ?>images/icon/avatar_img.png" alt="">
								<?php endif ?>
							</figure>
							<div class="usercontent">
								<h3><?=$user->name?></h3>
								<h4><?=$user->phone?></h4>
							</div>
						</div>
						<nav class="navdashboard">
							<ul class="nav nav-pills">
								<li>
									<a class="active" href="#user-detail" data-toggle="tab">
										<i class="far fa-id-badge"></i>
										<span><?=lang('Personal_Information')?> </span>
									</a>
								</li>
								<li>
									<a href="#my-orders" data-toggle="tab">
										<i class="fas fa-file-invoice"></i>
										<span> <?=lang('Orders')?> </span>
									</a>
								</li>
								<li>
									<a href="#notification" data-toggle="tab">
										<i class="fas fa-bell"></i>
										<span> <?=lang('Notification')?> </span>
									</a>
								</li>

								<li>
									<a href="#profile-edit" data-toggle="tab">
										<i class="fas fa-user"></i>
										<span><?=lang('Update_Account')?></span>
									</a>
								</li>
								<li>
									<a href="#password" data-toggle="tab">
										<i class="fas fa-unlock"></i>
										<span><?=lang('Change_Password')?></span>
									</a>
								</li>
								<li>
									<a href="<?=base_url().'my-Favourite'?>">
										<i class="fas fa-heart"></i>
										<span><?=lang('Favorite')?></span>
									</a>
								</li>
								<li>
									<a href="<?=base_url().'web-logout'?>">
										<i class="fas fa-unlock"></i>
										<span><?=lang('logout')?></span>
									</a>
								</li>
							</ul>
						</nav>
					</div>

				</aside>
			</div>
			<div class="col-sm-12 col-md-9 col-lg-9">
				<div class="tab-content">
					<div class="tab-pane active" id="user-detail">
						<div class="row page-content">
							<div class="inner-box">
								<div class="dashboard-box">
									<h2 class="dashbord-title"> <?=lang('Personal_Information')?> </h2>
								</div>
								<div class="dashboard-wrapper">
									<div class="detail">
										<h4><i class="fas fa-user"></i> <?=lang('name')?> :<span><?=$user->name?> </span></h4>
										<h4><i class="far fa-phone"></i><?=lang('phone')?> : <span> <?=$user->phone?></span></h4>
										<h4><i class="far fa-envelope"></i><?=lang('emails')?>: <span> <?=$user->email?> </span></h4>
										<?php if ($user->user_type == 2 ): ?>
											<h4><i class="fas fa-home"></i><?=lang('Department')?> :
												<span> <?= $user->service->title  ?> </span></h4>
											<h4><i class="fas fa-home"></i><?=lang('Experience')?>  :
												<span> <?= $user->exper ?> </span></h4>
										<?php endif ?>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="tab-pane" id="my-orders">
						<div class="page-content">
							<div class="inner-box">
								<div class="dashboard-box">
									<h2 class="dashbord-title"><?=lang('Orders')?> </h2>
								</div>
								<div class="dashboard-wrapper">
									<div class="row">
										<?php if (isset($orders) && !empty($orders)): ?>
										<div class="notify">
											<?php foreach ($orders as $order): ?>
												<a target="_blank"
												   href="<?= base_url() . "order-details/" . $order->order_id ?>">
													<div class="noty">
														<div class="row">
															<div class="col-md-2">
																<div class="mob">
																	<span class="order"><i
																			class="fas fa-file-invoice"></i></span>
																</div>
															</div>
															<div class="col-md-10">
																<ul class="list-unstyled">
																	<li>

																		<?= lang('Order_Number') ?> :
																		<span>#<?= $order->order_id ?></span>

																	</li>
																	<li>
																		<?= lang('Order_status') ?>:
																		<span>
																			<?php
																			if ($order->order_status == ORDER_START) {
																				echo lang('pending');
																			} elseif ($order->order_status == ORDER_ACCEPT) {
																				echo lang('accepted');
																			} elseif ($order->order_status == ORDER_END || $order->order_status == ORDER_END_ALL) {
																				echo lang('previous');
																			}
																			?>
																		 </span>
																	</li>
																	<li><?= lang('Total') ?>:
																		<span><?= $order->price ?></span></li>

																</ul>
																<p><?= $order->desc ?></p>
															</div>
														</div>
													</div>
													<div class="date text-center">
														<h6><?= date("Y-m-d", $order->order_date) ?></h6>
													</div>
												</a>
											<?php endforeach ?>
										</div>
										<?php else: ?>
										<div class="alert alert-info" style="width: -webkit-fill-available;">
											<strong><?=lang('order_empty_msg')?></strong>.
										</div>
										<?php endif ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="notification">
						<div class="page-content">
							<div class="inner-box">
								<div class="dashboard-box">
									<h2 class="dashbord-title"> <?=lang('Notification')?> </h2>
								</div>
								<div class="dashboard-wrapper">
									<div class="row">

										<?php if (isset($notes) && !empty($notes)): ?>
											<div class="notify">
												<?php foreach ($notes as $oneNote): ?>
													<div class="noty">
														<div class="row">
															<div class="col-md-2">
																<div class="mob">
																	<span class="order"><i
																			class="far fa-bell"></i></span>
																</div>
															</div>
															<div class="col-md-10">
																<p><?=(isset($oneNote->words->content))? $oneNote->words->content:"-"; ?></p>
																<?php if ($oneNote->action_type == 1): ?>
																	<div class="buttons">
																		<a href="<?=base_url().'accept-order/'.$oneNote->process_id_fk.'/'.$oneNote->notification_id.'/'.$oneNote->from_user_id?>">
																			<?=lang('accept')?>
																		</a>
																		<a href="<?=base_url().'refuse-order/'.$oneNote->process_id_fk.'/'.$oneNote->notification_id.'/'.$oneNote->from_user_id?>">
																			<?=lang('refuse')?>
																		</a>
																	</div>
																<?php elseif ($oneNote->action_type == 2): ?>
																	<div class="buttons">
																		<a href="<?=base_url().'client-end-order/'.$oneNote->process_id_fk.'/'.$oneNote->notification_id.'/'.$oneNote->from_user_id?>">
																			<?=lang('end_order')?>
																		</a>
																	</div>
																<?php endif ?>
															</div>
														</div>
													</div>
													<div class="date text-center">
														<h6><?=date("Y-m-d h:i:s A",$oneNote->created_at)?></h6>
													</div>
												<?php endforeach ?>
											</div>
										<?php else: ?>
											<div class="alert alert-info" style="width: -webkit-fill-available;">
												<strong><?=lang('note_empty_msg')?></strong>.
											</div>
										<?php endif ?>
									</div>

								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="profile-edit">
						<div class="page-content">
							<div class="inner-box">
								<div class="dashboard-box">
									<h2 class="dashbord-title"> <?=lang('Update_Account')?></h2>
								</div>
								<div class="dashboard-wrapper">
									<div class="row">
										<div class="col-md-1"></div>

										<div class="col-md-10 form-detail">
											<?=form_open_multipart('update-profile/'.$user->user_id);  ?>
											<div class="form-group">
												<label><?=lang("name")?></label>
												<input name="Pdata[name]" type="text" class="form-control" value="<?=$user->name?>"  data-validation="required" >
											</div>
											<div class="form-group">
												<label> <?=lang("phone")?> </label>
												<input name="Pdata[phone]" type="number" class="form-control" value="<?=$user->phone?>"  data-validation="required" >
											</div>
											<div class="form-group">
												<label> <?=lang("emails")?> </label>
												<input name="Pdata[email]" type="email" class="form-control" value="<?=$user->email?>"  data-validation="required" >
											</div>
											<div class="form-group save">
												<button type="submit" name="up" value="up"> <?=lang('Save_Changes')?> </button>
											</div>
											<?=form_close()?>
										</div>
										<div class="col-md-1"></div>
									</div>

								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="password">
						<div class="page-content">
							<div class="inner-box">
								<div class="dashboard-box">
									<h2 class="dashbord-title"> <?=lang('Change_Password')?> </h2>
								</div>
								<div class="dashboard-wrapper">
									<div class="row">
										<div class="col-md-1"></div>
										<div class="col-md-10 form-detail">
											<?=form_open_multipart('update-profile/'.$user->user_id);  ?>
											<div class="form-group">
												<label> <?=lang('Current_Password')?> </label>
												<input type="password" class="form-control" placeholder="<?=lang('Current_Password')?>">
											</div>
											<div class="form-group">
												<label><?=lang('New_Password')?></label>
												<input name="password" type="password" class="form-control"  id="user_pass" onkeyup="return valid();" placeholder="<?=lang('New_Password')?>">
											</div>
											<div class="form-group">
												<label> <?=lang('Confirm_New_Password')?> </label>
												<input type="password" class="form-control" id="user_pass_validate"  onkeyup="return valid2();"  placeholder="<?=lang('Confirm_New_Password')?>">
											</div>
											<div class="form-group save">
												<button type="submit" name="up" value="up"> <?=lang('Save_Changes')?> </button>
											</div>
											<?=form_close()?>
										</div>
										<div class="col-md-1"></div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

