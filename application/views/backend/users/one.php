<?php if ($op == 'UPDTATE'):
	$out['input'] = 'UPDTATE';
	$out['input_title'] = 'تعديل ';
else:
	$out['input'] = 'INSERT';
	$out['input_title'] = 'حفظ ';
endif ?>
<div class="row">
	<div class="col-md-12">
			<div class="card">
				<div class="card-header border-bottom-0">
					<h3 class="card-title"><?=(isset($title)? $title:"")?></h3>
				</div>
				<div class="card-body">
					<?= form_open_multipart($form); ?>
					<div class="row">
						<div class="col-lg-8">
							<div class="form-group m-form__group row">
								<div class="col-lg-6">
									<label>الاسم </label>
									<input type="text" name="Pdata[name]" value="<?= $out['name']; ?>"
										   class="form-control m-input"
										   data-validation="required">
									<span style="color: red" id="span_user_username"></span>
								</div>
								<div class="col-lg-6">
									<label>إسم المستخدم</label>
									<input type="text" name="Pdata[user_username]" value="<?= $out['user_username']; ?>"
										   class="form-control m-input unique-field only-En" field-name="user_username"
										   data-db="users"
										   data-validation="required">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<div class="col-lg-6">
									<label>كلمة المرور </label>
									<input type="password" name="Pdata[password]" id="user_pass"
										   onkeyup="return valid();"
											<?= ($op == 'UPDTATE') ? "" : 'data-validation="required"' ?>
										   class="form-control  m-input ">
									<span id="validate1" class="help-block"></span>
								</div>
								<div class="col-lg-6">
									<label>تأكيد كلمة المرور</label>
									<input type="password" onkeyup="return valid2();" id="user_pass_validate"
											<?= ($op == 'UPDTATE') ? "" : 'data-validation="required"' ?>
										   class="form-control  m-input ">
									<span id="validate" class="help-block"></span>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<div class="col-lg-6">
									<label>رقم الهاتف </label>
									<input type="number" name="Pdata[phone]" value="<?= $out['phone']; ?>"
										   class="form-control ">
								</div>
								<div class="col-lg-6">
									<label>البريد الألكتروني</label>
									<input type="email" name="Pdata[email]" value="<?= $out['email']; ?>"
										   class="form-control m-input unique-field" field-name="email" data-db="users"
										   data-validation="email">
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group m-form__group row">
								<?php if ($op == 'UPDTATE') { ?>
									<input type="file" id="input-file-now-custom-1" name="image" class="dropify"
										   data-default-file="<?= base_url() . IMAGEPATH . $out['image'] ?>"/>
								<?php } else { ?>
									<input type="file" id="input-file-now-custom-1" name="image" class="dropify"
										   data-default-file="" data-validation="required"/>
								<?php } ?>
							</div>
						</div>
					</div>
					<button type="submit" name="<?= $out['input'] ?>" value="<?= $out['input'] ?>"
							class="btn btn-primary">
						<span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?= $out['input_title'] ?>
					</button>
					<?= form_close() ?>
				</div>
			</div>
		</div>
	</div>

