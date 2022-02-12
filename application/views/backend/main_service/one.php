<?php if($op == 'UPDTATE' ):
    $out['input']='UPDTATE';
    $out['input_title']='تعديل ';
else:
    $out['input']='INSERT';
    $out['input_title']='حفظ ';
endif?>

<div class="card">
	<div class="card-header border-bottom-0">
		<h3 class="card-title"><?= (isset($title) ? $title : "") ?></h3>
	</div>
	<div class="card-body">
    <?=form_open_multipart($form);?>
    <div class="row form-group">
        <div class="col-lg-4">
            <label>اسم الخدمة  (ar):</label>
            <input type="text" name="Pdata[ar][title]" value="<?= $out["ar"]["title"] ?>"
                   class="form-control m-input"
                   data-validation="required">
        </div>
        <div class="col-lg-4">
            <label>اسم الخدمة  (en):</label>
            <input type="text" name="Pdata[en][title]" value="<?= $out["en"]["title"] ?>"
                   class="form-control m-input"
                   data-validation="required">
        </div>
        <div class="col-lg-4">
            <label>اسم الخدمة  (es):</label>
            <input type="text" name="Pdata[es][title]" value="<?= $out["es"]["title"] ?>"
                   class="form-control m-input"
                   data-validation="required">
        </div>
	</div>
	<div class="row form-group">
        <div class="col-lg-6">
            <label> أيقونت التطبيق  </label>
            <?php if ($op == 'UPDTATE') { ?>
                <input type="file" id="input-file-now-custom-1" name="logo" class="dropify"
                       data-default-file="<?= base_url() . IMAGEPATH. $out['logo'] ?>"/>
            <?php } else { ?>
                <input type="file" id="input-file-now-custom-1" name="logo" class="dropify"
                       data-default-file="" data-validation="required"/>
            <?php } ?>
        </div>
		<div class="col-lg-6">
            <label> أيقونت الموقع  </label>
            <?php if ($op == 'UPDTATE') { ?>
                <input type="file" id="input-file-now-custom-1" name="web_logo" class="dropify"
                       data-default-file="<?= base_url() . IMAGEPATH. $out['web_logo'] ?>"/>
            <?php } else { ?>
                <input type="file" id="input-file-now-custom-1" name="web_logo" class="dropify"
                       data-default-file="" data-validation="required"/>
            <?php } ?>
        </div>
    </div>
		<button type="submit" name="<?= $out['input'] ?>" value="<?= $out['input'] ?>"
				class="btn btn-primary">
			<span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?= $out['input_title'] ?>
		</button>
		<?= form_close() ?>
	</div>
</div>



