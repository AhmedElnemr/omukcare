<div class="m-portlet__body">
	<?php if(isset($data_table ) && $data_table!=null && !empty($data_table)):?>
		<table id="myTable" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th>#</th>
				<th>الخبر  </th>
				<th>صورة  </th>
				<th>  التحكم  </th>
			</tr>
			</thead>
			<?php $x = 1; foreach($data_table as $row):?>
				<tr>
					<td><?=$x++?></td>
					<td><?=$row->word->title?></td>
					<td>
						<?php if (!empty($row->image) && is_file(IMAGEPATH . $row->image)): ?>
							<a class="image-popup-vertical-fit" href="<?= base_url() . IMAGEPATH . $row->image ?>"
							   title="صورة  ">
								<img src="<?= base_url() . IMAGEPATH . $row->image ?>" alt="image" class="img-thumbnail"
									 width="100" height="100"/> </a>
						<?php else: ?>
							<img src="<?= base_url() . FAVICONPATH . USERIMAGE ?>" class="img-thumbnail" width="100"
								 height="100" alt=""/>
						<?php endif ?>
					</td>
					<td class="text-center">
						<a href="<?= base_url() . "app-news/undeleted/" . $row->id ?>">
							<button type="button" class="btn m-btn--pill btn-info btn-sm" title="اعادة ">
								<i class="fa fa-pen-alt fa-xs"></i></button>
						</a>
					</td>
				</tr>
			<?php endforeach ;?>
		</table>
	<?php else:
		echo '<div class="alert alert-danger  alert-rounded">
                  <i class="ti-user"></i> لا يوجد بيانات  
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span> </button>
             </div>';
	endif;?>
</div>
