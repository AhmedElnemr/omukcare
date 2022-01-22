<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1"
	 m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
	<?php $dir = ($this->AdminLang == "ar") ? "la-angle-left" : "la-angle-right"; ?>
	<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
		<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
			<a href="<?= base_url() . 'Dashboard' ?>" class="m-menu__link ">
				<i class="m-menu__link-icon flaticon-line-graph"></i>
				<span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">
                            <?= lang("home") ?>
                        </span>

                    </span>
                </span>
			</a>
		</li>
		<!------------------------------------------>
		<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
			<a href="javascript:;" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-web"></i>
				<span class="m-menu__link-text">بيانات الحساب   </span>
				<i class="m-menu__ver-arrow la <?= $dir ?>"></i>
			</a>
			<div class="m-menu__submenu ">
				<span class="m-menu__arrow"></span>
				<ul class="m-menu__subnav">
					<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                        <span class="m-menu__link">
                            <span class="m-menu__link-text">بيانات الحساب  </span>
                        </span>
					</li>

					<li class="m-menu__item " aria-haspopup="true">
						<a href="<?= base_url() . "admin-users/edit/".$_SESSION["user_id"] ?>" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
							<span class="m-menu__link-text">حسابى   </span></a>
					</li>

				</ul>
			</div>
		</li>
		<!------------------------------------------>
		<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
			<a href="javascript:;" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-web"></i>
				<span class="m-menu__link-text">المنتجات     </span>
				<i class="m-menu__ver-arrow la <?= $dir ?>"></i>
			</a>
			<div class="m-menu__submenu ">
				<span class="m-menu__arrow"></span>
				<ul class="m-menu__subnav">
					<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                                        <span class="m-menu__link">
                                            <span class="m-menu__link-text">منتجاتى   </span>
                                        </span>
					</li>
					<li class="m-menu__item " aria-haspopup="true">
						<a href="<?= base_url() . "app-products" ?>" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
							<span class="m-menu__link-text"> عرض منتجاتى  </span></a>
					</li>
					<li class="m-menu__item " aria-haspopup="true">
						<a href="<?= base_url() . "app-products/add" ?>" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
							<span class="m-menu__link-text">إضافة منتج  </span></a>
					</li>
					<!--<li class="m-menu__item " aria-haspopup="true">
						<a href="<?/*= base_url() . "app-products/deleted" */?>" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
							<span class="m-menu__link-text">المنتجات المحذوفة   </span></a>
					</li>-->
				</ul>
			</div>
		</li>
		<!------------------------------------------>
		<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
			<a href="javascript:;" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-web"></i>
				<span class="m-menu__link-text">الطلبات     </span>
				<i class="m-menu__ver-arrow la <?= $dir ?>"></i>
			</a>
			<div class="m-menu__submenu ">
				<span class="m-menu__arrow"></span>
				<ul class="m-menu__subnav">
					<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                                        <span class="m-menu__link">
                                            <span class="m-menu__link-text">الطلبات   </span>
                                        </span>
					</li>
					<li class="m-menu__item " aria-haspopup="true">
						<a href="<?= base_url() . "app-orders" ?>" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
							<span class="m-menu__link-text">الجديدة  </span></a>
					</li>
					<li class="m-menu__item " aria-haspopup="true">
						<a href="<?= base_url() . "app-orders/old" ?>" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
							<span class="m-menu__link-text">السابقة  </span></a>
					</li>
					<!--<li class="m-menu__item " aria-haspopup="true">
						<a href="<? /*= base_url() . "app-products/deleted" */ ?>" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
							<span class="m-menu__link-text">المنتجات المحذوفة   </span></a>
					</li>-->
				</ul>
			</div>
		</li>
		<!------------------------------------------>

	</ul>
</div>
