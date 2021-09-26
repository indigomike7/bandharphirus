<div id="sidebarMain" class="d-none">
    <aside
        class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset" style="padding-bottom: 0">
                <div class="navbar-brand-wrapper justify-content-between">
                    <!-- Logo -->
                    <?php ($seller_logo=\App\Model\Shop::where(['seller_id'=>auth('seller')->id()])->first()->image); ?>
                    <a class="navbar-brand" href="<?php echo e(route('seller.dashboard')); ?>" aria-label="Front">
                        
                        <img onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img1.jpg')); ?>'"
                             class="navbar-brand-logo-mini for-seller-logo"
                             src="<?php echo e(asset("storage/app/public/shop/$seller_logo")); ?>" alt="Logo">
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
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('seller')?'show':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('seller.dashboard')); ?>" title="Dashboards">
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

                        <!-- Pages -->
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('seller/orders*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                               title="Pages">
                                <i class="tio-shopping-cart nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(trans('messages.Order')); ?>

                                </span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                style="display: <?php echo e(Request::is('seller/order*')?'block':'none'); ?>">

                                <li class="nav-item <?php echo e(Request::is('seller/orders/list/all')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('seller.orders.list',['all'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(trans('messages.All')); ?></span>
                                    </a>
                                </li>
                                  <li class="nav-item <?php echo e(Request::is('seller/orders/list/pending')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('seller.orders.list',['pending'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(trans('messages.Pending')); ?></span>
                                    </a>
                                </li>

                                <li class="nav-item <?php echo e(Request::is('seller/orders/list/processing')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('seller.orders.list',['processing'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(trans('messages.Processing')); ?></span>
                                    </a>
                                </li>

                                <li class="nav-item <?php echo e(Request::is('seller/orders/list/delivered')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('seller.orders.list',['delivered'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(trans('messages.Delivered')); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('seller/orders/list/returned')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('seller.orders.list',['returned'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(trans('messages.Returned')); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('seller/orders/list/failed')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('seller.orders.list',['failed'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(trans('messages.Failed')); ?></span>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        <!-- End Pages -->

                        <!-- Pages -->
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('seller/orders*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                               title="Pages">
                                <i class="tio-premium-outlined  nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(trans('messages.contest')); ?>

                                </span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                style="display: <?php echo e(Request::is('seller/order*')?'block':'none'); ?>">

                                <li class="nav-item <?php echo e(Request::is('seller/contest/list/all')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('seller.contest.list',['all'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">My Contest</span>
                                    </a>
                                </li>

                                <li class="nav-item <?php echo e(Request::is('seller/contest/list/all')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('seller.contest.listjoin',['all'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Join Contest</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- End Pages -->

                        <!-- Pages -->
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('seller/orders*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                               title="Pages">
                                <i class="tio-premium-outlined  nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(trans('messages.barter')); ?>

                                </span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                style="display: <?php echo e(Request::is('seller/order*')?'block':'none'); ?>">

                                <li class="nav-item <?php echo e(Request::is('seller/contest/list/all')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('seller.contest.list',['all'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">My Barter</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('seller/contest/list/all')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('seller.contest.list',['all'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Requested Barter</span>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        <!-- End Pages -->
                        <li class="nav-item">
                            <small class="nav-subtitle" title="Pages"><?php echo e(trans('messages.product_management')); ?></small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>

                        <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('seller/product*'))?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                               title="Pages">
                                <i class="tio-premium-outlined nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(trans('messages.Products')); ?>  </span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                style="display: <?php echo e((Request::is('seller/product*'))?'block':''); ?>">

                                <li class="nav-item <?php echo e(Request::is('seller/product/list')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('seller.product.list')); ?>" title="Products">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(trans('messages.Products')); ?></span>
                                    </a>

                                </li>

                            </ul>
                        </li>

                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('seller/reviews/list*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('seller.reviews.list')); ?>"
                               title="Pages">
                                <i class="tio-star nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(trans('messages.Product')); ?> <?php echo e(trans('messages.Reviews')); ?>

                                </span>
                            </a>
                        </li>


                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('seller/messages*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('seller.messages.chat')); ?>"
                               title="Pages">
                                <i class="tio-email nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(trans('messages.messages')); ?>

                                </span>
                            </a>
                        </li>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('seller/profile*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('seller.profile.view')); ?>"
                               title="Pages">
                                <i class="tio-shop nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(trans('messages.my_bank_info')); ?>

                                </span>
                            </a>
                        </li>


                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('seller/shop*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('seller.shop.view')); ?>"
                               title="Pages">
                                <i class="tio-home nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(trans('messages.my_shop')); ?>

                                </span>
                            </a>
                        </li>


                        <!-- End Pages -->

                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('seller/business-settings*')||Request::is('seller/currency*')|| Request::is('seller/helpTopic*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                               title="Pages">
                                <i class="tio-settings nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(trans('messages.business_settings')); ?></span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                style="display: <?php echo e(Request::is('seller/business-settings*') ?'block':'none'); ?>">


                                <li class="nav-item <?php echo e(Request::is('seller/business-settings/shipping-method/add')?'active':''); ?>">
                                    <a class="nav-link "
                                       href="<?php echo e(route('seller.business-settings.shipping-method.add')); ?>"
                                       title=" shippitng method">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(trans('messages.shipping_method')); ?></span>
                                    </a>
                                </li>


                            </ul>
                        </li>


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




<?php /**PATH /home/bandbkmp/public_html/resources/views/layouts/back-end/partials-seller/_side-bar.blade.php ENDPATH**/ ?>