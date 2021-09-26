


<div id="sidebarMain" class="d-none">
    <aside
        class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset pb-0">
                <div class="navbar-brand-wrapper justify-content-between">
                    <!-- Logo -->

                    <?php ($e_commerce_logo=\App\Model\BusinessSetting::where(['type'=>'company_web_logo'])->first()->value); ?>
                    <a class="navbar-brand" href="<?php echo e(route('admin.dashboard')); ?>" aria-label="Front">
                        <img style="max-height: 38px" onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img1.jpg')); ?>'" class="navbar-brand-logo-mini for-web-logo"
                        src="<?php echo e(asset("storage/app/public/company/$e_commerce_logo")); ?>" alt="Logo">
                    </a>

                    <!-- End Logo -->

                    <!-- Navbar Vertical Toggle -->
                    <button type="button"
                            class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
                        <i class="tio-clear tio-lg"></i>
                    </button>
                    <!-- End Navbar Vertical Toggle -->
                </div>

                <!-- Content -->
                <div class="navbar-vertical-content">
                    <ul class="navbar-nav navbar-nav-lg nav-tabs">
                        <!-- Dashboards -->
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin')?'show':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('admin.dashboard')); ?>" title="Dashboards">
                                <i class="tio-home-vs-1-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(trans('messages.Dashboard')); ?>

                                </span>
                            </a>
                        </li>
                        <!-- End Dashboards -->


                        <li class="nav-item">
                            <small class="nav-subtitle" title="Pages"><?php echo e(trans('messages.order_management')); ?></small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>

                        <!-- Order -->
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/orders*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:">
                                <i class="tio-shopping-cart nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(trans('messages.Order')); ?>

                                </span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                style="display: <?php echo e(Request::is('admin/order*')?'block':'none'); ?>">
                                <li class="nav-item <?php echo e(Request::is('admin/orders/list/all')?'active':''); ?>">
                                    <a class="nav-link" href="<?php echo e(route('admin.orders.list',['all'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            <?php echo e(trans('messages.All')); ?>

                                            <span class="badge badge-info badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::count()); ?>

                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/orders/list/pending')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.orders.list',['pending'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            <?php echo e(trans('messages.pending')); ?>

                                            <span class="badge badge-soft-info badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where(['order_status'=>'pending'])->count()); ?>

                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/orders/list/confirmed')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.orders.list',['confirmed'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            <?php echo e(trans('messages.confirmed')); ?>

                                                <span class="badge badge-soft-success badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where(['order_status'=>'confirmed'])->count()); ?>

                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/orders/list/processing')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.orders.list',['processing'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            <?php echo e(trans('messages.Processing')); ?>

                                                <span class="badge badge-warning badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where(['order_status'=>'processing'])->count()); ?>

                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/orders/list/out_for_delivery')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.orders.list',['out_for_delivery'])); ?>"
                                        title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            <?php echo e(trans('messages.out_for_delivery')); ?>

                                                <span class="badge badge-warning badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where(['order_status'=>'out_for_delivery'])->count()); ?>

                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/orders/list/delivered')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.orders.list',['delivered'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            <?php echo e(trans('messages.delivered')); ?>

                                                <span class="badge badge-success badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where(['order_status'=>'delivered'])->count()); ?>

                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/orders/list/returned')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.orders.list',['returned'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            <?php echo e(trans('messages.returned')); ?>

                                                <span class="badge badge-soft-danger badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where(['order_status'=>'returned'])->count()); ?>

                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/orders/list/failed')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.orders.list',['failed'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            <?php echo e(trans('messages.failed')); ?>

                                            <span class="badge badge-danger badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where(['order_status'=>'failed'])->count()); ?>

                                            </span>
                                        </span>
                                    </a>
                                </li>

                                <li class="nav-item <?php echo e(Request::is('admin/orders/list/canceled')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.orders.list',['canceled'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            <?php echo e(trans('messages.canceled')); ?>

                                                <span class="badge badge-soft-dark badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where(['order_status'=>'canceled'])->count()); ?>

                                            </span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- End Order -->


                        <li class="nav-item">
                            <small class="nav-subtitle" title="Pages"><?php echo e(trans('messages.product_management')); ?></small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>

                        <!-- Pages -->
                        <?php if(\App\CPU\Helpers::module_permission_check('brand')): ?>

                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/brand*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                               title="Pages">
                                <i class="tio-flag nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(trans('messages.Brand')); ?></span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                style="display: <?php echo e(Request::is('admin/brand*')?'block':'none'); ?>">
                                <li class="nav-item <?php echo e(Request::is('admin/brand/add-new')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.brand.add-new')); ?>" title="add new brand">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(trans('messages.add_new')); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/brand/list')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.brand.list')); ?>" title=" brand list">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(trans('messages.List')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if(\App\CPU\Helpers::module_permission_check('banner')): ?>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/banner*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.banner.list')); ?>"
                                   title="Pages">
                                   <i class="tio-image nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(trans('messages.Banner')); ?></span>
                                </a>
                            </li>

                        <?php endif; ?>
                        <!-- End Pages -->


                        <!-- Pages -->
                        <?php if(\App\CPU\Helpers::module_permission_check('category')): ?>
                        <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/category*') ||Request::is('admin/sub*')) ?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                               title="Pages">
                                <i class="tio-star-outlined nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(trans('messages.category')); ?></span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                style="display: <?php echo e((Request::is('admin/category*') ||Request::is('admin/sub*'))?'block':''); ?>">

                                <li class="nav-item <?php echo e(Request::is('admin/category/view')?'active':''); ?>">


                                    <a class="nav-link " href="<?php echo e(route('admin.category.view')); ?>" title="add new category">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(trans('messages.category')); ?></span>
                                    </a>

                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/sub-category/view')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.sub-category.view')); ?>" title="add new sub-category">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(trans('messages.sub_category')); ?></span>
                                    </a>


                                 </li>
                                <li class="nav-item <?php echo e(Request::is('admin/sub-sub-category/view')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.sub-sub-category.view')); ?>"
                                       title="add new sub-sub-category">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(trans('messages.sub_sub_category')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>


                        <!-- End Pages -->
  <!-- Pages -->
  <?php if(\App\CPU\Helpers::module_permission_check('product')): ?>

  <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/attribute*') || Request::is('admin/product*'))?'active':''); ?>">
      <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
         title="Pages">
          <i class="tio-premium-outlined nav-icon"></i>
          <span
              class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(trans('messages.Products')); ?>  </span>
      </a>
      <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
          style="display: <?php echo e((Request::is('admin/attribute*') || Request::is('admin/product*'))?'block':''); ?>">
          <li class="nav-item <?php echo e(Request::is('admin/attribute/view')?'active':''); ?>">

            <?php if(\App\CPU\Helpers::module_permission_check('attribute')): ?>
              <a class="nav-link " href="<?php echo e(route('admin.attribute.view')); ?>" title="add attribute ">
                  <span class="tio-circle nav-indicator-icon"></span>
                  <span class="text-truncate"><?php echo e(trans('messages.Attribute')); ?></span>
              </a>
              <?php endif; ?>
          </li>
          <li class="nav-item <?php echo e(Request::is('admin/product/list/in_house')?'active':''); ?>">
              <a class="nav-link " href="<?php echo e(route('admin.product.list',['in_house'])); ?>" title="InHouse Products">
                  <span class="tio-circle nav-indicator-icon"></span>
                  <span class="text-truncate"><?php echo e(trans('messages.InHouse Products')); ?></span>
              </a>
          </li>
          <li class="nav-item <?php echo e(Request::is('admin/product/list/seller')?'active':''); ?>">
            <a class="nav-link "href="<?php echo e(route('admin.product.list',['seller'])); ?>" title="Seller Products">
                <span class="tio-circle nav-indicator-icon"></span>
                <span class="text-truncate"><?php echo e(trans('messages.Seller Products')); ?></span>
            </a>
        </li>

      </ul>
  </li>
<?php endif; ?>

  <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/attribute*') || Request::is('admin/product*'))?'active':''); ?>">
      <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
         title="Pages">
          <i class="tio-premium-outlined nav-icon"></i>
          <span
              class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Contest  </span>
      </a>
      <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
          style="display: <?php echo e((Request::is('admin/attribute*') || Request::is('admin/contest2*'))?'block':''); ?>">
          <li class="nav-item <?php echo e(Request::is('admin/contest2/list')?'active':''); ?>">
              <a class="nav-link " href="<?php echo e(route('admin.contest2.category',['in_house'])); ?>" title="InHouse Products">
                  <span class="tio-circle nav-indicator-icon"></span>
                  <span class="text-truncate">Category</span>
              </a>
          </li>
          <li class="nav-item <?php echo e(Request::is('admin/contest2/list')?'active':''); ?>">
              <a class="nav-link " href="<?php echo e(route('admin.contest2.list',['in_house'])); ?>" title="InHouse Products">
                  <span class="tio-circle nav-indicator-icon"></span>
                  <span class="text-truncate">My Contest</span>
              </a>
          </li>

      </ul>
  </li>

  <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/attribute*') || Request::is('admin/product*'))?'active':''); ?>">
      <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
         title="Pages">
          <i class="tio-premium-outlined nav-icon"></i>
          <span
              class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Premium  </span>
      </a>
      <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
          style="display: <?php echo e((Request::is('admin/attribute*') || Request::is('admin/contest2*'))?'block':''); ?>">
          <li class="nav-item <?php echo e(Request::is('admin/contest2/list')?'active':''); ?>">
              <a class="nav-link " href="<?php echo e(route('admin.premium2.settings',['in_house'])); ?>" title="InHouse Products">
                  <span class="tio-circle nav-indicator-icon"></span>
                  <span class="text-truncate">Premium Settings</span>
              </a>
          </li>

      </ul>
  </li>

  <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/attribute*') || Request::is('admin/product*'))?'active':''); ?>">
      <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
         title="Pages">
          <i class="tio-premium-outlined nav-icon"></i>
          <span
              class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Saldo  </span>
      </a>
      <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
          style="display: <?php echo e((Request::is('admin/attribute*') || Request::is('admin/contest2*'))?'block':''); ?>">
          <li class="nav-item <?php echo e(Request::is('admin/contest2/list')?'active':''); ?>">
              <a class="nav-link " href="<?php echo e(route('admin.saldopurchased.settings',['in_house'])); ?>" title="InHouse Products">
                  <span class="tio-circle nav-indicator-icon"></span>
                  <span class="text-truncate">Saldo</span>
              </a>
          </li>

      </ul>
  </li>
<?php if(\App\CPU\Helpers::module_permission_check('employee')): ?>


<li class="nav-item">
    <small class="nav-subtitle" title="Layouts"><?php echo e(trans('messages.employee_handle')); ?></small>
        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
    </li>
<!-- Nav Item - Pages Collapse Menu -->
<?php if(\App\CPU\Helpers::module_permission_check('custom_role')): ?>
<li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/custom-role*')?'active':''); ?>">
    <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.custom-role.create')); ?>"
       title="Pages">
        <i class="tio-incognito nav-icon"></i>
        <span
            class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(trans('messages.role_management')); ?></span>
    </a>
</li>
<li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/employee*')?'active':''); ?>">
    <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
       title="Pages">
        <i class="tio-user nav-icon"></i>
        <span
            class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(trans('messages.Employee')); ?></span>
    </a>
    <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
        style="display: <?php echo e(Request::is('admin/employee*')?'block':'none'); ?>">
        <li class="nav-item <?php echo e(Request::is('admin/employee/add-new')?'active':''); ?>">
            <a class="nav-link " href="<?php echo e(route('admin.employee.add-new')); ?>" title="add new employee">
                <span class="tio-circle nav-indicator-icon"></span>
                <span class="text-truncate"><?php echo e(trans('messages.add_new')); ?></span>
            </a>
        </li>
        <li class="nav-item <?php echo e(Request::is('admin/employee/list')?'active':''); ?>">
            <a class="nav-link " href="<?php echo e(route('admin.employee.list')); ?>" title=" employee List">
                <span class="tio-circle nav-indicator-icon"></span>
                <span class="text-truncate"><?php echo e(trans('messages.List')); ?></span>
            </a>
        </li>

    </ul>
</li>

<?php endif; ?>

<?php endif; ?>
   
   <?php if(\App\CPU\Helpers::module_permission_check('seller')): ?>
   <li class="nav-item">
       <small class="nav-subtitle" title="Layouts">    <?php echo e(trans('messages.seller_section')); ?></small>
           <small class="tio-more-horizontal nav-subtitle-replacer"></small>
       </li>


       <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/seller*')?'active':''); ?>">
           <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
              title="Pages">
               <i class="tio-image nav-icon"></i>
               <span
                   class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(trans('messages.Sellers')); ?></span>
           </a>
           <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
               style="display: <?php echo e(Request::is('admin/seller*')?'block':'none'); ?>">
               <li class="nav-item <?php echo e(Request::is('admin/sellers/seller-list')?'active':''); ?>">
                   <a class="nav-link " href="<?php echo e(route('admin.sellers.seller-list')); ?>" title="add new  seller list">
                       <span class="tio-circle nav-indicator-icon"></span>
                       <span class="text-truncate"><?php echo e(trans('messages.seller_list')); ?></span>
                   </a>
               </li>
               <li class="nav-item <?php echo e(Request::is('admin/sellers/withdraw_list')?'active':''); ?>">
                <a class="nav-link " href="<?php echo e(route('admin.sellers.withdraw_list')); ?>" title="add new  seller list">
                    <span class="tio-circle nav-indicator-icon"></span>
                    <span class="text-truncate"><?php echo e(trans('messages.Withdraw')); ?> <?php echo e(trans('messages.List')); ?></span>
                </a>
            </li>


           </ul>
       </li>

       <?php endif; ?>

    <?php if(\App\CPU\Helpers::module_permission_check('deal')): ?>
    <li class="nav-item">
        <small class="nav-subtitle" title="Layouts">    <?php echo e(trans('messages.deal_management')); ?></small>
            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
        </li>


        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/deal*')?'active':''); ?>">
            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
               title="Pages">
                <i class="tio-image nav-icon"></i>
                <span
                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(trans('messages.all_deals')); ?></span>
            </a>
            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                style="display: <?php echo e(Request::is('admin/deal*')?'block':'none'); ?>">
                <li class="nav-item <?php echo e(Request::is('admin/deal/flash')?'active':''); ?>">
                    <a class="nav-link " href="<?php echo e(route('admin.deal.flash')); ?>" title="add new flash deal">
                        <span class="tio-circle nav-indicator-icon"></span>
                        <span class="text-truncate"><?php echo e(trans('messages.flash_deal')); ?></span>
                    </a>
                </li>
                <li class="nav-item <?php echo e(Request::is('admin/deal/day')?'active':''); ?>">
                    <a class="nav-link " href="<?php echo e(route('admin.deal.day')); ?>" title=" deal List">
                        <span class="tio-circle nav-indicator-icon"></span>
                        <span class="text-truncate"><?php echo e(trans('messages.deal_of_the_day')); ?></span>
                    </a>
                </li>
                <li class="nav-item <?php echo e(Request::is('admin/deal/feature')?'active':''); ?>">
                    <a class="nav-link " href="<?php echo e(route('admin.deal.feature')); ?>" title=" deal List">
                        <span class="tio-circle nav-indicator-icon"></span>
                        <span class="text-truncate"><?php echo e(trans('messages.feature_deal')); ?></span>
                    </a>
                </li>

            </ul>
        </li>

        <?php endif; ?>



                    <!-- End Pages -->
                    <?php if(\App\CPU\Helpers::module_permission_check('customerList')): ?>
                        <li class="nav-item">
                            <small class="nav-subtitle" title="Layouts"><?php echo e(trans('messages.business_management')); ?>

                            </small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>
                        <li class="nav-item <?php echo e(Request::is('admin/customer/list')?'active':''); ?>">
                            <a class="nav-link " href="<?php echo e(route('admin.customer.list')); ?>"
                               title="customer base">
                                <span class="tio-poi-user nav-icon"></span>
                                <span class="text-truncate"><?php echo e(trans('messages.Customer')); ?>  <?php echo e(trans('messages.List')); ?>  </span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if(\App\CPU\Helpers::module_permission_check('productReview')): ?>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/reviews*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('admin.reviews.list')); ?>"
                               title="Pages">
                                <i class="tio-star nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(trans('messages.Product')); ?> <?php echo e(trans('messages.Reviews')); ?>

                                </span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <!-- Pages -->
                        <?php if(\App\CPU\Helpers::module_permission_check('messages')): ?>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/contact*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.contact.list')); ?>"
                               title="Pages">
                                <i class="tio-messages nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(trans('messages.customer_message')); ?>

                                </span>
                            </a>
                        </li>

                    <?php endif; ?>
                        <!-- End Pages -->

                        <?php if(\App\CPU\Helpers::module_permission_check('messages')): ?>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/support-ticket*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.support-ticket.view')); ?>"
                               title="Pages">
                                <i class="tio-chat nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(trans('messages.support_ticket')); ?>

                                </span>
                            </a>
                        </li>

    <?php endif; ?>
    <?php if(\App\CPU\Helpers::module_permission_check('notification')): ?>
    <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/notification*')?'active':''); ?>">
        <a class="js-navbar-vertical-aside-menu-link nav-link"
           href="<?php echo e(route('admin.notification.add-new')); ?>"
           title="Pages">
            <i class="tio-notifications nav-icon"></i>
            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                <?php echo e(trans('messages.Send')); ?> <?php echo e(trans('messages.Notification')); ?>

            </span>
        </a>
    </li>
    <?php endif; ?>



                        <!-- Pages -->
                        <?php if(\App\CPU\Helpers::module_permission_check('coupon')): ?>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/coupon*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.coupon.add-new')); ?>"
                               title="Pages">
                                <i class="tio-gift nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(trans('messages.Coupon')); ?></span>
                            </a>
                        </li>

                    <?php endif; ?>
                        <!-- End Pages -->

                        <?php if(\App\CPU\Helpers::module_permission_check('business_settings')): ?>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings*')||Request::is('admin/currency*')|| Request::is('admin/helpTopic*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                               title="Pages">
                                <i class="tio-settings nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(trans('messages.business_settings')); ?></span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                style="display: <?php echo e(Request::is('admin/business-settings*')|| Request::is('admin/currency*') || Request::is('admin/helpTopic*') ?'block':'none'); ?>">
                                <li class="nav-item <?php echo e(Request::is('admin/business-settings/language')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.business-settings.language.index')); ?>" title="add new  language">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(trans('messages.Language')); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/business-settings/mail')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.business-settings.mail.index')); ?>" title=" mail config">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(trans('messages.mail_config')); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/business-settings/shipping-method/add')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.business-settings.shipping-method.add')); ?>" title=" shippitng method">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(trans('messages.shipping_method')); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/currency/view')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.currency.view')); ?>" title="add new currency">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(trans('messages.Currency')); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/business-settings/payment-method')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.business-settings.payment-method.index')); ?>" title="add new payment method">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(trans('messages.payment_method')); ?></span>
                                    </a>
                                </li>
                                 

                                       <li class="nav-item <?php echo e(Request::is('admin/helpTopic/list')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.helpTopic.list')); ?>" title="add new Faq">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(trans('messages.faq')); ?></span>
                                        </a>
                                    </li>

                                    <li class="nav-item <?php echo e(Request::is('admin/business-settings/about-us')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.business-settings.about-us')); ?>" title="add new about us">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(trans('messages.about_us')); ?></span>
                                        </a>
                                    </li>

                                    <li class="nav-item <?php echo e(Request::is('admin/business-settings/terms-condition')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.business-settings.terms-condition')); ?>" title="add new about us">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(trans('messages.terms_and_condition')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/business-settings/web-config')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.business-settings.web-config.index')); ?>" title="change web config">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(trans('messages.web_config')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/business-settings/fcm-index')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.business-settings.fcm-index')); ?>"
                                           title="add new banner">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Push Notification</span>
                                        </a>
                                    </li>

                                    <li class="nav-item <?php echo e(Request::is('admin/business-settings/social-media')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.business-settings.social-media')); ?>" title="change social media">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(trans('messages.social_media')); ?></span>
                                        </a>
                                    </li>

                                    <li class="nav-item <?php echo e(Request::is('admin/business-settings/seller-settings*')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.business-settings.seller-settings.index')); ?>" title="change seller settings">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(trans('messages.seller_settings')); ?></span>
                                        </a>
                                    </li>


                            </ul>
                        </li>


                     <?php endif; ?>

                     <?php if(\App\CPU\Helpers::module_permission_check('report')): ?>
                     <li class="nav-item">
                        <div class="nav-divider"></div>
                    </li>

                        <li class="nav-item">
                            <small class="nav-subtitle" title="Documentation"><?php echo e(trans('messages.Report')); ?> & <?php echo e(trans('messages.Analytics')); ?>  </small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>

                        <!-- Pages -->
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/report*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                               title="Pages">
                                <i class="tio-report-outlined nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(trans('messages.Report')); ?></span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                style="display: <?php echo e(Request::is('admin/report*')?'block':'none'); ?>">
                                <li class="nav-item <?php echo e(Request::is('admin/report/earning')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.report.earning')); ?>"
                                       title="add new banner">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(trans('messages.Earning')); ?> <?php echo e(trans('messages.Report')); ?> </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/report/order')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.report.order')); ?>"
                                       title="add new banner">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(trans('messages.Order')); ?> <?php echo e(trans('messages.Report')); ?> </span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <!-- End Pages -->
<?php endif; ?>
                        <li class="nav-item" style="padding-top: 100px">
                            <div class="nav-divider"></div>
                        </li>
                    </ul>
                </div>
                <!-- End Content -->
            </div>
        </div>
    </aside>
</div>

<div id="sidebarCompact" class="d-none">

</div>




<?php /**PATH /home/bandbkmp/public_html/resources/views/layouts/back-end/partials/_side-bar.blade.php ENDPATH**/ ?>