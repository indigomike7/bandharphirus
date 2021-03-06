<style>
    .dropdown-menu {
        min-width: 251px !important;
        margin-left: -8px;
        border-top-left-radius: .1px;
        border-top-right-radius: .1px;
    }

    .card-body.search-result-box {
        overflow: scroll;
        height: 400px;
        overflow-x: hidden;
    }

    .seller {
        font-weight: 600;
    }

    .active .seller {
        font-weight: 700;
    }

    .for-count-value {
        position: absolute;

        right: 0.6875rem;;
        width: 1.25rem;
        height: 1.25rem;
        border-radius: 50%;
        color: <?php echo e($web_config['primary_color']); ?>;

        font-size: .75rem;
        font-weight: 500;
        text-align: center;
        line-height: 1.25rem;
    }

    @media (min-width: 992px) {
        .navbar-sticky.navbar-stuck .navbar-stuck-menu.show {
            display: block;
            height: 55px !important;
        }
    }

    @media (min-width: 768px) {
        .navbar-stuck-menu {
            background-color: <?php echo e($web_config['primary_color']); ?>;
            line-height: 15px;
            padding-bottom: 6px;
        }

        .web {
            display: block;
        }

        .mobile {
            display: none;
        }
    }

    @media (max-width: 767px) {
        .search_button {
            background-color: transparent !important;
        }

        .search_button .input-group-text i {
            color: <?php echo e($web_config['primary_color']); ?>            !important;
        }

        .navbar-expand-md .dropdown-menu > .dropdown > .dropdown-toggle {
            position: relative;
            padding-right: 1.95rem;
        }

        .navbar-brand img {

        }

        .web {
            display: none;
        }

        .mobile {
            display: block;
        }

        .mega-nav1 {
            background: white;
            color: <?php echo e($web_config['primary_color']); ?>            !important;
            border-radius: 3px;
        }

        .mega-nav1 .nav-link {
            color: <?php echo e($web_config['primary_color']); ?>            !important;
        }
    }

    @media (max-width: 768px) {
        .tab-logo {
            width: 10rem;
        }
    }

    @media (max-width: 360px) {
        .mobile-head {
            padding: 3px;
        }
    }

    @media (max-width: 471px) {
        .navbar-brand img {

        }

        .web {
            display: none !important;
        }

        .mobile {
            display: block !important;
        }

        .mega-nav1 {
            background: white;
            color: <?php echo e($web_config['primary_color']); ?>            !important;
            border-radius: 3px;
        }

        .mega-nav1 .nav-link {
            color: <?php echo e($web_config['primary_color']); ?>            !important;
        }
    }


</style>
                <?php
                    $locale = session()->get('locale') ;
                    if ($locale==""){
                        $locale = "en";
                    }
                    \App\CPU\Helpers::currency_load();
                    $currency_code = session('currency_code');
                    $currency_symbol= session('currency_symbol');
                    if ($currency_symbol=="")
                    {
                        $system_default_currency_info = \session('system_default_currency_info');
                        $currency_symbol = $system_default_currency_info->symbol;
                        $currency_code = $system_default_currency_info->code;
                    }
                    $language=\App\CPU\Helpers::language_load();
                    $company_phone =$web_config['phone']->value;
                    $company_name =$web_config['name']->value;
                    $company_web_logo =$web_config['web_logo']->value;
                    $company_mobile_logo =$web_config['mob_logo']->value;
					$seller_registration=\App\Model\BusinessSetting::where(['type'=>'seller_registration'])->first()->value;
					$categories=\App\CPU\CategoryManager::parents();
                ?>

        <!-- Start of Header -->
        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-right">
                <div  class="dropdown">
                    <a href="#currency" >
                        <span><?php echo e($currency_code); ?> <?php echo e($currency_symbol); ?></span>
                    </a>
                    <div class="dropdown-box">
                        <?php $__currentLoopData = \App\Model\Currency::where('status', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li style="cursor: pointer" class="dropdown-item"
                                onclick="currency_change('<?php echo e($currency['code']); ?>')">
                                <?php echo e($currency->name); ?>

                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                        <!-- End of DropDown Menu -->

                        <div class="dropdown">
                        <?php $__currentLoopData = json_decode($language['value'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($data['code']==$locale): ?>
                                <a href="<?php echo e(route('lang',[$data['code']])); ?>"><img class="mr-2" width="20"
                                     src="<?php echo e(asset('public/assets/front-end')); ?>/img/flags/<?php echo e($data['code']); ?>.png"
                                     alt="Eng">
                                <?php echo e($data['name']); ?>

                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="dropdown-box">
                        <?php $__currentLoopData = json_decode($language['value'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($data['status']==1): ?>
                                    <a class="dropdown-item pb-1" href="<?php echo e(route('lang',[$data['code']])); ?>">
                                        <img class="mr-2" width="20"
                                             src="<?php echo e(asset('public/assets/front-end')); ?>/img/flags/<?php echo e($data['code']); ?>.png"
                                             alt="<?php echo e($data['name']); ?>"/>
                                        <span style="text-transform: uppercase"><?php echo e($data['code']); ?></span>
                                    </a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="dropdown">
                        
						
                        <?php if($seller_registration): ?>
                                <a href="javascript:;">
                                <?php echo e(trans('messages.Seller')); ?>  <?php echo e(trans('messages.zone')); ?>

                            <div class="dropdown-box">
                                    <a class="dropdown-item pb-1" href="<?php echo e(route('shop.apply')); ?>">
                                        <?php echo e(trans('messages.Become a')); ?> <?php echo e(trans('messages.Seller')); ?>

                                    </a>
                                    <a class="dropdown-item pb-1" href="<?php echo e(route('seller.auth.login')); ?>">
                                        <?php echo e(trans('messages.Seller')); ?>  <?php echo e(trans('messages.login')); ?>

                                    </a>
							</div>
                        <?php endif; ?>
						</div>
                        <!-- End of Dropdown Menu -->
                        <span class="divider d-lg-show"></span>
                        <a href="<?php echo e(route('about-us')); ?>" class="d-lg-show"><?php echo e(trans('messages.about_company')); ?></a>
                        <a href="blog.html" class="d-lg-show">Blog</a>
                        <a href="<?php echo e(route('contacts')); ?>" class="d-lg-show"><?php echo e(trans('messages.contact_us')); ?></a>
                    <?php if(auth('customer')->check()): ?>
                        <div class="dropdown">
                         <a href="#" class="d-lg-show">My Account</a>
                            <div class="dropdown-box">
                                <a class="dropdown-item pb-1"
                                   href="<?php echo e(route('account-oder')); ?>"> <?php echo e(trans('messages.my_order')); ?> </a>
                                <a class="dropdown-item pb-1"
                                   href="<?php echo e(route('user-account')); ?>"> <?php echo e(trans('messages.my_profile')); ?></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item pb-1"
                                   href="<?php echo e(route('customer.auth.logout')); ?>"><?php echo e(trans('messages.logout')); ?></a>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="<?php echo e(route('customer.auth.login')); ?>" class="d-lg-show login sign-in"><i class="w-icon-account"></i><?php echo e(trans('messages.sing_in')); ?></a>
                            <span class="delimiter d-lg-show">/</span>
                        <a href="<?php echo e(route('customer.auth.register')); ?>" class="ml-0 d-lg-show login register"><?php echo e(trans('messages.sing_up')); ?></a>
					<?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- End of Header Top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left mr-md-4">
                        <a href="#" class="mobile-menu-toggle  w-icon-hamburger">
                        </a>
                        <a href="<?php echo e(route('home')); ?>" class="logo ml-lg-0">
                            <img src="<?php echo e(asset('public/assets')); ?>/images/logo.png" alt="logo" width="144" height="45" />
                        </a>
						<style>
						.btn-search{border: 2px solid #336699; border-left: none;}
						</style>
                        <form method="get" action="<?php echo e(route('products')); ?>" class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                            <div class="select-box">
                                <select id="category" name="category">
                                    <option value="">All Categories</option>
									<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($category['id']); ?>"><?php echo e($category['name']); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <input type="text" class="form-control" name="name" id="search"
                                placeholder="Search in..." required />
					<input type="hidden" name="data_from" value="search">
					<input type="hidden" name="page" value="1">
                            <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="header-right ml-4">
                        <div class="header-call d-xs-show d-lg-flex align-items-center">
                            <a href="tel:#" class="w-icon-call"></a>
                            <div class="call-info d-lg-show">
                                <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                                    <a href="mailto:#" class="text-capitalize">Live Chat</a> or :</h4>
                                <a href="tel:#" class="phone-number font-weight-bolder ls-50">0(800)123-456</a>
                            </div>
                        </div>
						<style>
						.font-size-md {
    font-size: 1.3rem !important;
}
.font-weight-bolder {
    font-weight: 700 !important;
}.header-call .phone-number {
    font-size: 1.6rem;
    line-height: 1.7;
}						</style>
                        
                            <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                            <a class="cart-toggle label-down link" href="<?php echo e(route('wishlists')); ?>">
							<i class="w-icon-heart"> 
							<span class="cart-count"><?php echo e(session()->has('wish_list')?count(session('wish_list')):0); ?></span>
                            </i>
                            <span class="cart-label">Wishlist</span>
						</div>
                        </a>
                        <a class="compare label-down link d-xs-show" href="compare.html" style="margin-left:20px;">
                            <i class="w-icon-compare"></i>
                            <span class="compare-label d-lg-show">Compare</span>
                        </a>
                        <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                            <div class="cart-overlay"></div>
                            <a href="<?php echo e(route('shop-cart')); ?>" class="cart-toggle label-down link">
                                <i class="w-icon-cart">
                                    <span class="cart-count"><?php echo e(session()->has('cart')?count(session()->get('cart')):0); ?></span>
                                </i>
                                <span class="cart-label">Cart</span>
                            </a>
                            <div class="dropdown-box">
                                <div class="cart-header">
                                    <span>Shopping Cart</span>
                                    <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                                <div class="products">
        <?php echo e(\App\CPU\Helpers::currency_converter(\App\CPU\CartManager::cart_total_applied_discount(session()->get('cart')))); ?>

			<?php ($sub_total=0); ?>
			<?php ($total_tax=0); ?>
            <?php if(session()->has('cart') && count( session()->get('cart')) > 0): ?>
                    <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="product product-cart">
                                        <div class="product-detail">
                                            <a href="<?php echo e(route('product',$cartItem['slug'])); ?>" class="product-name"><?php echo e($cartItem['name']); ?></a>
                                            <div class="price-box">
                                                <span class="product-quantity">x <?php echo e($cartItem['quantity']); ?></span>
                                                <span class="product-price">
                                                <?php echo e(\App\CPU\Helpers::currency_converter(($cartItem['price']-$cartItem['discount'])*$cartItem['quantity'])); ?>

												</span>
                                            </div>
                                        </div>
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                         src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($cartItem['thumbnail']); ?>"
                                         alt="Product" height="84"
                                                    width="94" />
                                            </a>
                                        </figure>
                                        <button class="btn btn-link btn-close">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>

                        <?php ($sub_total+=($cartItem['price']-$cartItem['discount'])*$cartItem['quantity']); ?>
                        <?php ($total_tax+=$cartItem['tax']*$cartItem['quantity']); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
                                </div>

                                <div class="cart-total">
                                    <label>Subtotal:</label>
                                    <span class="price"><?php echo e(\App\CPU\Helpers::currency_converter($sub_total)); ?></span>
                                </div>

                                <div class="cart-action">
                                    <a href="<?php echo e(route('shop-cart')); ?>" class="btn btn-dark btn-outline btn-rounded">View More</a>
                                    <a href="<?php echo e(route('checkout-details')); ?>" class="btn btn-primary  btn-rounded">Checkout</a>
                                </div>
                            </div>
                            <!-- End of Dropdown Box -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Header Middle -->
            <div class="header-bottom sticky-content fix-top sticky-header has-dropdown">
                <div class="container">
                    <div class="inner-wrap">
                        <div class="header-left">
                            <div class="dropdown category-dropdown has-border" data-visible="true">
                                <a href="#" class="category-toggle text-dark toggle-cat-menu" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true" data-display="static"
                                    title="Browse Categories">
                                    <i class="w-icon-category"></i>
                                    <span>Browse Categories</span>
                                </a>

                                <div class="dropdown-box toggled-cat-menu">
                                    <ul class="menu vertical-menu category-menu">
									<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a class="dropdown-item <?php echo e($category->childes->count() > 0?'dropdown-toggle':''); ?>"
                                           href="<?php echo e(route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])); ?>">
                                            <?php echo e($category['name']); ?>

                                        </a>
                                        <?php if($category->childes->count()>0): ?>
                                            <ul class="megamenu">
                                                <?php $__currentLoopData = $category['childes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                    <h4 class="menu-title"><?php echo e($subCategory['name']); ?></h4>
                                                    <hr class="divider">
                                                        <?php if($subCategory->childes->count()>0): ?>
														<ul>
															<li><a href="shop-fullwidth-banner.html">New Arrivals</a>
															</li>
															<li><a href="#">Best Sellers</a>
															</li>
															<li><a href="#">Sale</a></li>
															<?php $__currentLoopData = $subCategory['childes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subSubCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<li>
																	<a class="dropdown-item "
																	   href="<?php echo e(route('products',['id'=> $subSubCategory['id'],'data_from'=>'category','page'=>1])); ?>">
																		<?php echo e($subSubCategory['name']); ?>

																	</a>
																</li>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</ul>
														<?php endif; ?>
													</li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--								<li>
                                            <a href="shop-fullwidth-banner.html">
                                                <i class="w-icon-tshirt2"></i>Fashion
                                            </a>
                                            <ul class="megamenu">
                                                <li>
                                                    <h4 class="menu-title">Women</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="shop-fullwidth-banner.html">New Arrivals</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Best Sellers</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Trending</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Clothing</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Shoes</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Bags</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Accessories</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Jewlery &
                                                                Watches</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Sale</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <h4 class="menu-title">Men</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="shop-fullwidth-banner.html">New Arrivals</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Best Sellers</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Trending</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Clothing</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Shoes</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Bags</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Accessories</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Jewlery &
                                                                Watches</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <div class="banner-fixed menu-banner menu-banner2">
                                                        <figure>
                                                            <img src="assets/images/menu/banner-2.jpg" alt="Menu Banner"
                                                                width="235" height="347" />
                                                        </figure>
                                                        <div class="banner-content">
                                                            <div class="banner-price-info mb-1 ls-normal">Get up to
                                                                <strong
                                                                    class="text-primary text-uppercase">20%Off</strong>
                                                            </div>
                                                            <h3 class="banner-title ls-normal">Hot Sales</h3>
                                                            <a href="shop-banner-sidebar.html"
                                                                class="btn btn-dark btn-sm btn-link btn-slide-right btn-icon-right">
                                                                Shop Now<i class="w-icon-long-arrow-right"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="shop-fullwidth-banner.html">
                                                <i class="w-icon-home"></i>Home & Garden
                                            </a>
                                            <ul class="megamenu">
                                                <li>
                                                    <h4 class="menu-title">Bedroom</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="shop-fullwidth-banner.html">Beds, Frames &
                                                                Bases</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Dressers</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Nightstands</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Kid's Beds &
                                                                Headboards</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Armoires</a></li>
                                                    </ul>

                                                    <h4 class="menu-title mt-1">Living Room</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="shop-fullwidth-banner.html">Coffee Tables</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Chairs</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Tables</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Futons & Sofa
                                                                Beds</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Cabinets &
                                                                Chests</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <h4 class="menu-title">Office</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="shop-fullwidth-banner.html">Office Chairs</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Desks</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Bookcases</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">File Cabinets</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Breakroom
                                                                Tables</a></li>
                                                    </ul>

                                                    <h4 class="menu-title mt-1">Kitchen & Dining</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="shop-fullwidth-banner.html">Dining Sets</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Kitchen Storage
                                                                Cabinets</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Bashers Racks</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Dining Chairs</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Dining Room
                                                                Tables</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Bar Stools</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <div class="menu-banner banner-fixed menu-banner3">
                                                        <figure>
                                                            <img src="assets/images/menu/banner-3.jpg" alt="Menu Banner"
                                                                width="235" height="461" />
                                                        </figure>
                                                        <div class="banner-content">
                                                            <h4
                                                                class="banner-subtitle font-weight-normal text-white mb-1">
                                                                Restroom</h4>
                                                            <h3
                                                                class="banner-title font-weight-bolder text-white ls-normal">
                                                                Furniture Sale</h3>
                                                            <div
                                                                class="banner-price-info text-white font-weight-normal ls-25">
                                                                Up to <span
                                                                    class="text-secondary text-uppercase font-weight-bold">25%
                                                                    Off</span></div>
                                                            <a href="shop-banner-sidebar.html"
                                                                class="btn btn-white btn-link btn-sm btn-slide-right btn-icon-right">
                                                                Shop Now<i class="w-icon-long-arrow-right"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="shop-fullwidth-banner.html">
                                                <i class="w-icon-electronics"></i>Electronics
                                            </a>
                                            <ul class="megamenu">
                                                <li>
                                                    <h4 class="menu-title">Laptops &amp; Computers</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="shop-fullwidth-banner.html">Desktop
                                                                Computers</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Monitors</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Laptops</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Hard Drives &amp;
                                                                Storage</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Computer
                                                                Accessories</a></li>
                                                    </ul>

                                                    <h4 class="menu-title mt-1">TV &amp; Video</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="shop-fullwidth-banner.html">TVs</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Home Audio
                                                                Speakers</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Projectors</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Media Streaming
                                                                Devices</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <h4 class="menu-title">Digital Cameras</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="shop-fullwidth-banner.html">Digital SLR
                                                                Cameras</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Sports & Action
                                                                Cameras</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Camera Lenses</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Photo Printer</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Digital Memory
                                                                Cards</a></li>
                                                    </ul>

                                                    <h4 class="menu-title mt-1">Cell Phones</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="shop-fullwidth-banner.html">Carrier Phones</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Unlocked Phones</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Phone & Cellphone
                                                                Cases</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Cellphone
                                                                Chargers</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <div class="menu-banner banner-fixed menu-banner4">
                                                        <figure>
                                                            <img src="assets/images/menu/banner-4.jpg" alt="Menu Banner"
                                                                width="235" height="433" />
                                                        </figure>
                                                        <div class="banner-content">
                                                            <h4 class="banner-subtitle font-weight-normal">Deals Of The
                                                                Week</h4>
                                                            <h3 class="banner-title text-white">Save On Smart EarPhone
                                                            </h3>
                                                            <div
                                                                class="banner-price-info text-secondary font-weight-bolder text-uppercase text-secondary">
                                                                20% Off</div>
                                                            <a href="shop-banner-sidebar.html"
                                                                class="btn btn-white btn-outline btn-sm btn-rounded">Shop
                                                                Now</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="shop-fullwidth-banner.html">
                                                <i class="w-icon-furniture"></i>Furniture
                                            </a>
                                            <ul class="megamenu type2">
                                                <li class="row">
                                                    <div class="col-md-3 col-lg-3 col-6">
                                                        <h4 class="menu-title">Furniture</h4>
                                                        <hr class="divider" />
                                                        <ul>
                                                            <li><a href="shop-fullwidth-banner.html">Sofas & Couches</a>
                                                            </li>
                                                            <li><a href="shop-fullwidth-banner.html">Armchairs</a></li>
                                                            <li><a href="shop-fullwidth-banner.html">Bed Frames</a></li>
                                                            <li><a href="shop-fullwidth-banner.html">Beside Tables</a>
                                                            </li>
                                                            <li><a href="shop-fullwidth-banner.html">Dressing Tables</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-6">
                                                        <h4 class="menu-title">Lighting</h4>
                                                        <hr class="divider" />
                                                        <ul>
                                                            <li><a href="shop-fullwidth-banner.html">Light Bulbs</a>
                                                            </li>
                                                            <li><a href="shop-fullwidth-banner.html">Lamps</a></li>
                                                            <li><a href="shop-fullwidth-banner.html">Celling Lights</a>
                                                            </li>
                                                            <li><a href="shop-fullwidth-banner.html">Wall Lights</a>
                                                            </li>
                                                            <li><a href="shop-fullwidth-banner.html">Bathroom
                                                                    Lighting</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-6">
                                                        <h4 class="menu-title">Home Accessories</h4>
                                                        <hr class="divider" />
                                                        <ul>
                                                            <li><a href="shop-fullwidth-banner.html">Decorative
                                                                    Accessories</a></li>
                                                            <li><a href="shop-fullwidth-banner.html">Candals &
                                                                    Holders</a></li>
                                                            <li><a href="shop-fullwidth-banner.html">Home Fragrance</a>
                                                            </li>
                                                            <li><a href="shop-fullwidth-banner.html">Mirrors</a></li>
                                                            <li><a href="shop-fullwidth-banner.html">Clocks</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-6">
                                                        <h4 class="menu-title">Garden & Outdoors</h4>
                                                        <hr class="divider" />
                                                        <ul>
                                                            <li><a href="shop-fullwidth-banner.html">Garden
                                                                    Furniture</a></li>
                                                            <li><a href="shop-fullwidth-banner.html">Lawn Mowers</a>
                                                            </li>
                                                            <li><a href="shop-fullwidth-banner.html">Pressure
                                                                    Washers</a></li>
                                                            <li><a href="shop-fullwidth-banner.html">All Garden
                                                                    Tools</a></li>
                                                            <li><a href="shop-fullwidth-banner.html">Outdoor Dining</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="row">
                                                    <div class="col-6">
                                                        <div class="banner banner-fixed menu-banner5 br-xs">
                                                            <figure>
                                                                <img src="assets/images/menu/banner-5.jpg" alt="Banner"
                                                                    width="410" height="123"
                                                                    style="background-color: #D2D2D2;" />
                                                            </figure>
                                                            <div class="banner-content text-right y-50">
                                                                <h4
                                                                    class="banner-subtitle font-weight-normal text-default text-capitalize">
                                                                    New Arrivals</h4>
                                                                <h3
                                                                    class="banner-title font-weight-bolder text-capitalize ls-normal">
                                                                    Amazing Sofa</h3>
                                                                <div
                                                                    class="banner-price-info font-weight-normal ls-normal">
                                                                    Starting at <strong>$125.00</strong></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="banner banner-fixed menu-banner5 br-xs">
                                                            <figure>
                                                                <img src="assets/images/menu/banner-6.jpg" alt="Banner"
                                                                    width="410" height="123"
                                                                    style="background-color: #9F9888;" />
                                                            </figure>
                                                            <div class="banner-content y-50">
                                                                <h4
                                                                    class="banner-subtitle font-weight-normal text-white text-capitalize">
                                                                    Best Seller</h4>
                                                                <h3
                                                                    class="banner-title font-weight-bolder text-capitalize text-white ls-normal">
                                                                    Chair &amp; Lamp</h3>
                                                                <div
                                                                    class="banner-price-info font-weight-normal ls-normal text-white">
                                                                    From <strong>$165.00</strong></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="shop-fullwidth-banner.html">
                                                <i class="w-icon-heartbeat"></i>Healthy & Beauty
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-fullwidth-banner.html">
                                                <i class="w-icon-gift"></i>Gift Ideas
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-fullwidth-banner.html">
                                                <i class="w-icon-gamepad"></i>Toy & Games
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-fullwidth-banner.html">
                                                <i class="w-icon-ice-cream"></i>Cooking
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-fullwidth-banner.html">
                                                <i class="w-icon-ios"></i>Smart Phones
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-fullwidth-banner.html">
                                                <i class="w-icon-camera"></i>Cameras & Photo
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-fullwidth-banner.html">
                                                <i class="w-icon-ruby"></i>Accessories
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-banner-sidebar.html"
                                                class="font-weight-bold text-primary text-uppercase ls-25">
                                                View All Categories<i class="w-icon-angle-right"></i>
                                            </a>
                                        </li>
								-->
                                    </ul>
                                </div>
                            </div>
                            <nav class="main-nav">
                                <ul class="menu active-underline">
                                    <li class="active">
                                        <a href="<?php echo e(route('home')); ?>">Home</a>
                                    </li>
									<?php if($collection!= null): ?>
                                    <li>
                                        <a href="<?php echo e(route('collection')); ?>">Collection</a>
                                        <ul>
										<?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <li><a href="<?php echo e(route('collectionid',[$value->slug])); ?>"><?php echo e($value->name); ?></a></li>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>

                                    </li>
									<?php endif; ?>
                                    <li>
                                        <a href="<?php echo e(route('contest3.listjoin')); ?>">Contest</a><!--
                                        <ul>
                                            <li><a href="contest-kingman-open.html">Kingman Open</a></li>
                                            <li><a href="contest-damele-open.html">Damele Open</a></li>
                                            <li><a href="contest-blue-persian.html">Blue Persian</a></li>
                                            <li><a href="contest-blue-chinese.html">Blue Chinese</a></li>
                                            <li><a href="contest-green-persian.html">Green Persian</a></li>
                                            <li><a href="contest-green-chinese.html">Green Chinese</a></li>
                                            <li><a href="contest-blue-gradation-persian.html">Blue Gradation Persian</a></li>
                                            <li><a href="contest-blue-gradation-chinese.html">Blue Gradation Chinese</a></li>
                                            <li><a href="contest-blue-turquoise-persian.html">Blue Turquoise Persian</a></li>
                                            <li><a href="contest-green-turquoise-persian.html">Green Turquoise Persian</a></li>
                                            <li><a href="contest-blue-turquoise-chinese.html">Blue Turquoise Chinese</a></li>
                                            <li><a href="contest-multicolor-persian.html">Multicolour Persian</a></li>
                                            <li><a href="contest-multicolour-chinese.html">Multicolour Chinese</a></li>    
                                        </ul>-->
                                    </li>
                                    <li>
                                        <a href="exchange.html">exchange</a>
                                    </li>
                                    <li>
                                        <a href="auction.html">Auction</a>
                                    </li>
                                    <li>
                                        <a href="chatroom.html">Chatroom</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('educationcategory')); ?>">Education</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>


    <!-- End of Mobile Menu -->
        <!-- Start of Main-->
        <main class="main">
<?php /**PATH /home/bandbkmp/public_html/resources/views/layouts/front-end/partials/_header.blade.php ENDPATH**/ ?>