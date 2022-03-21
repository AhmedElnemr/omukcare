<div class="sticky">
	<div class="horizontal-main hor-menu clearfix">
		<div class="horizontal-mainwrapper container clearfix">
			<!--Nav-->
			<nav class="horizontalMenu clearfix">
				<ul class="horizontalMenu-list">

					<li aria-haspopup="true">
						<a href="#" class="">
							<i class="feather feather-codepen hor-icon"></i>
							مستخدمى لوحة التحكم
							<i class="fa fa-angle-down horizontal-icon"></i>
						</a>
						<ul class="sub-menu">
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-users" ?>">عرض</a></li>
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-users/add" ?>">اضافة</a></li>
						</ul>
					</li>

					<li aria-haspopup="true">
						<a href="#" class="">
							<i class="feather feather-codepen hor-icon"></i>
							البيانات الاساسية
							<i class="fa fa-angle-down horizontal-icon"></i>
						</a>
						<ul class="sub-menu">
							<li aria-haspopup="true"><a href="<?= base_url() . "main-setting" ?>">بيانات الموقع</a></li>
							<li aria-haspopup="true"><a href="<?= base_url() . "main-setting/about" ?>">عنـا</a></li>
							<li aria-haspopup="true"><a href="<?= base_url() . "main-setting/terms" ?>">الشروط و
									الأحكام</a></li>
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-contact" ?>">رسائل التواصل </a>
							</li>

							<li aria-haspopup="true"><a href="<?= base_url() . "admin-slider" ?>"> عرض بنرات الموقع </a>
							</li>
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-slider/add" ?>"> إضافة بنر الموقع </a></li>


							<li aria-haspopup="true"><a href="<?= base_url() . "admin-area" ?>"> عرض المناطق </a></li>
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-area/add" ?>"> إضافة منطقة </a></li>

						</ul>
					</li>

					<li aria-haspopup="true">
						<a href="#" class="">
							<i class="feather feather-codepen hor-icon"></i>
							الخدمات
							<i class="fa fa-angle-down horizontal-icon"></i>
						</a>
						<ul class="sub-menu">
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-main-service" ?>">الخدمات الرئيسية </a></li>

							<?php if ($_SESSION['is_developer'] == 1): ?>
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-main-service/add" ?>">إضافة خدمة رئيسية</a></li>
							<?php endif ?>
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-main-service/deleted" ?>"> الخدمات الرئيسية المحذوفة</a></li>
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-sub-service" ?>"> الخدمات الفرعية</a></li>
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-sub-service/add" ?>"> إضافة خدمة
									فرعية </a></li>
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-sub-service/deleted" ?>"> الخدمات
									الفرعية المحذوفة </a></li>
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-specialties" ?>"> تخصصات
									الاطباء </a></li>
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-specialties/add" ?>"> إضافة
									تخصص </a></li>

						</ul>
					</li>

					<li aria-haspopup="true">
						<a href="#" class="">
							<i class="feather feather-codepen hor-icon"></i>
							مقدمى الخدمات
							<i class="fa fa-angle-down horizontal-icon"></i>
						</a>
						<ul class="sub-menu">
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-provider" ?>">عرض</a></li>
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-provider/add" ?>">إضافة</a></li>
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-provider/apply" ?>">طلبات
									التسجيل</a></li>

							<li aria-haspopup="true"><a href="<?= base_url() . "admin-accounts/cashing" ?>">مدفوعات
									لمقدمى الخدمات</a></li>
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-accounts/exchange" ?>">تحصيل من
									مقدمى الخدمات</a></li>
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-accounts/statement" ?>">كشف حساب
									مقدمى الخدمات</a></li>

						</ul>
					</li>

					<li aria-haspopup="true">
						<a href="#" class="">
							<i class="feather feather-codepen hor-icon"></i>
							عملاء التطبيق
							<i class="fa fa-angle-down horizontal-icon"></i>
						</a>
						<ul class="sub-menu">
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-person" ?>">عرض</a></li>
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-person/add" ?>">اضافة</a></li>
						</ul>
					</li>

					<li aria-haspopup="true">
						<a href="#" class="">
							<i class="feather feather-codepen hor-icon"></i>
							الطلبات
							<i class="fa fa-angle-down horizontal-icon"></i>
						</a>
						<ul class="sub-menu">
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-orders/new" ?>">الجديدة</a></li>
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-orders/current" ?>">الحالية</a>
							</li>
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-orders/old" ?>">السابقة</a></li>
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-orders/client" ?>"> طلبات
									عميل </a></li>
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-orders/provider" ?>"> طلبات مقدم
									خدمة </a></li>
						</ul>
					</li>



					<li aria-haspopup="true">
						<a href="#" class="">
							<i class="feather feather-codepen hor-icon"></i>
							Referral
							<i class="fa fa-angle-down horizontal-icon"></i>
						</a>
						<ul class="sub-menu">
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-announcer" ?>">عرض</a></li>
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-announcer/add" ?>">اضافة</a></li>
						</ul>
					</li>


                    <li aria-haspopup="true">
						<a href="#" class="">
							<i class="feather feather-codepen hor-icon"></i>
							الكوبونات
							<i class="fa fa-angle-down horizontal-icon"></i>
						</a>
						<ul class="sub-menu">
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-coupons" ?>"> عرض الكوبونات </a></li>
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-coupons/add" ?>"> إضافة كوبون </a></li>
							<li aria-haspopup="true"><a href="<?= base_url() . "admin-coupons/user_coupons" ?>"> الكوبونات المستخدمة </a></li>

						</ul>
					</li>

					<li aria-haspopup="true">
						<a href="#" class="">
							<i class="feather feather-codepen hor-icon"></i>
							المنتجات
							<i class="fa fa-angle-down horizontal-icon"></i>
						</a>
						<ul class="sub-menu">
							<li aria-haspopup="true"><a href="<?= base_url() . "app-sub-dep/add" ?>"> الاقسام </a></li>
						</ul>
					</li>




				</ul>
			</nav>
			<!--Nav-->
		</div>
	</div>
</div>
