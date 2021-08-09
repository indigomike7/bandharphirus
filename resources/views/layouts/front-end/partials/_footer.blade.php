</main>
<!-- Footer -->
<style>
    .page-footer {
        background: #333e4f;
        color: white;
    }

    .social-btn {
        border: 1px solid white;
        border-radius: 50%;
        height: 2rem;
        width: 2rem;
    }

    .btn-market .btn-market-title {
        font-size: 14px !important;
    }

    .social-btn i {
        line-height: 1.90rem;
    }

    .compny_name {
        font-size: 39px;
        margin-left: 5px;
    }

    .for-margin {
        margin-top: 10px;
    }

    .font-weight-bold {
        font-weight: 600 !important;
    }

    .footer-heder {
        color: #FFFFFF;
    }


    .payment-card {
        background: white;
        border-radius: 6px;
        max-width: 134px;
        padding-bottom: 5px;
        padding-top: 5px;
        margin-bottom: 3px;
        margin-right: 10px;
        margin-left: 5px;
    }

    .fa-shopping-cart {
        font-size: 56px;

    }

    .widget-list-link {
        color: #d9dce2;
    }

    .page-footer hr {
        border: 0.001px solid #2d3542;
    }
    .social-media :hover{
     color:  {{$web_config['secondary_color']}} !important;
    }
    @media (min-width: 768px) {
        .fa-shopping-cart {
            font-size: 48px;

        }


        .compny_name {
            font-size: 30px;
            margin-left: 3px;
        }
    }
    @media(max-width:1024px){
        .payment-tab{
            display: none;
        }
    }
 @media(max-width: 768px){
    .payment-tab{
            display: none;
        }
        .apple_app{
            padding-right: 0px;
        }
       .apple_app{
           padding-right: 0% !important;
       }
       .goole_app{
           padding-left: 0% !important;
       }
       .razorpay{
        margin-left: 30%;
    margin-top: 7px;
       }
 }
    @media (max-width: 500px) {
        .razorpay{
        margin-left: 30%;
    margin-top: 7px;
       }
        .mobile-padding {
            margin-bottom: 4%;
        }

        .widget-list {
            margin-bottom: 3%;
        }

        .for-mobile-delivery {
            margin-left: 15px;
        }

    }
    @media(max-width: 360px){
        .glaxy-for-mobile{
            margin-left: 1rem;
    margin-bottom: 0.55rem;
        }
    }
    @media(max-width: 375px){
        .razorpay{
        margin-left: 31%;
    margin-top: 7px;
       }
        .glaxy-for-mobile{
            margin-left: 1rem;
    margin-bottom: 0.55rem;
        }
    }
    @media(max-width: 414px)
    {
        .glaxy-for-mobile{
            margin-left: 26px;
    margin-bottom: 10px;
        }
    }
    @media(max-width: 425px)
    {
        .glaxy-for-mobile{
            margin-left: 26px;
    margin-bottom: 10px;
        }
    }

    @media screen and (max-width: 500px) {
        .title_message {
            visibility: hidden;
            clear: both;
            float: left;
            margin: 10px auto 5px 20px;
            width: 28%;
            display: none;
        }
        .for-m-p{
            margin-bottom: 5px;
    margin-left: 8%;
        }
    }
</style>
        <footer class="footer appear-animate" data-animation-options="{
            'name': 'fadeIn'
        }">
            <div class="footer-newsletter bg-primary">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-xl-5 col-lg-6">
                            <div class="icon-box icon-box-side text-white">
                                <div class="icon-box-icon d-inline-flex">
                                    <i class="w-icon-envelop3"></i>
                                </div>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title text-white text-uppercase font-weight-bold">Subscribe To
                                        Our Newsletter</h4>
                                    <p class="text-white">Get all the latest information on Events, Sales and Offers.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-9 mt-4 mt-lg-0 ">
                            <form action="#" method="get"
                                class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                                <input type="email" class="form-control mr-2 bg-white" name="email" id="email"
                                    placeholder="Your E-mail Address" />
                                <button class="btn btn-dark btn-rounded" type="submit">Subscribe<i
                                        class="w-icon-long-arrow-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="widget widget-about">
                                <a href="{{route('home')}}" class="logo-footer">
                                    <img src="{{asset('public/assets')}}/images/logo.png" alt="logo-footer" width="144"
                                        height="45" />
                                </a>
                                <div class="widget-body">
                                    <p class="widget-about-title">Got Question? Call us 24/7</p>
                                    <a href="tel:18005707777" class="widget-about-call">1-800-570-7777</a>
                                    <p class="widget-about-desc">Register now to get updates on pronot get up icons
                                        & coupons ster now toon.
                                    </p>

                                    <div class="social-icons social-icons-colored">
                @php
                    $social_media = \App\Model\SocialMedia::where('active_status', 1)->get();
                @endphp
                @if(isset($social_media))
                    @foreach ($social_media as $item)
                    <span class="social-media">
                        <a class="social-btn sb-light sb-{{$item->name}} ml-4 mb-4" href="{{$item->link}}" style="color: blue; width:30px; height:30px;"><i
                                class="{{$item->icon}} fa-2x" aria-hidden="true" style="margin:0 auto;margin-top:5px;"></i></a>
					</span>
                    @endforeach
                @endif
                                    </div>
                                </div>
                            </div>
                        </div>
            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                <h6  class="widget-title">{{trans('messages.special')}}</h6>
                <ul class="widget-list">
                    @php
					$flash_deals=\App\Model\FlashDeal::where(['status'=>1,'deal_type'=>'flash_deal'])->whereDate('start_date','<=',date('Y-m-d'))->whereDate('end_date','>=',date('Y-m-d'))->first();
					@endphp
                    @if(isset($flash_deals))
                        <li class="widget-list-item">
                            <a class="widget-list-link"
                               href="{{route('flash-deals',[$flash_deals['id']])}}">
                                {{trans('messages.flash_deal')}}
                            </a>
                        </li>
                    @endif
                    <li><a  href="{{route('products',['data_from'=>'featured','page'=>1])}}">{{trans('messages.featured_products')}}</a>
                    </li>
                    <li><a  href="{{route('products',['data_from'=>'latest','page'=>1])}}">{{trans('messages.latest_products')}}</a>
                    </li>
                    <li<a  href="{{route('products',['data_from'=>'best-selling','page'=>1])}}">{{trans('messages.best_selling_product')}}</a>
                    </li>
                    <li><a  href="{{route('products',['data_from'=>'top-rated','page'=>1])}}">{{trans('messages.top_rated_product')}}</a>
                    </li>
                    <li><a href="{{route('brands')}}">{{trans('messages.all_brand')}}</a></li>
                    <li><a href="{{route('categories')}}">{{trans('messages.all_category')}}</a>
                    </li>
                </ul>
				</div>
            </div>
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            <div class="col-lg-3 col-sm-6"">
                            <div class="widget">
                <h6  class="widget-title">{{trans('messages.account&shipping_info')}}</h6>
                @if(auth('customer')->check())
                    <ul class="widget-list">
                        <li><a
                                                        href="{{route('user-account')}}">{{trans('messages.profile_info')}}</a>
                        </li>
                        <li><a
                                                        href="{{route('wishlists')}}">{{trans('messages.wish_list')}}</a>
                        </li>
                        {{--<li class="widget-list-item">
                            <a class="widget-list-link"
                               href="{{route('customer.auth.login')}}">{{trans('messages.chat_with_seller_s')}}
                            </a>
                        </li>--}}
                        <li><a
                                                        href="{{route('track-order.index')}}">{{trans('messages.track_order')}}</a>
                        </li>
                        <li><a                                                        href="{{ route('account-address') }}">{{trans('messages.address')}}</a>
                        </li>
                        <li><a
                                                        href="{{ route('account-tickets') }}">{{trans('messages.support_ticket')}}</a>
                        </li>
                        {{--<li class="widget-list-item">
                            <a class="widget-list-link"
                               href="{{route('customer.auth.login')}}">{{trans('messages.tansction_history')}}
                            </a>
                        </li>--}}
                    </ul>
                @else
                    <ul class="widget-list">
                        <li><a   href="{{route('customer.auth.login')}}">{{trans('messages.profile_info')}}</a>
                        </li>
                        <li><a   href="{{route('customer.auth.login')}}">{{trans('messages.wish_list')}}</a>
                        </li>
                        {{--<li class="widget-list-item">
                            <a class="widget-list-link"
                               href="{{route('customer.auth.login')}}">{{trans('messages.chat_with_seller_s')}}
                            </a>
                        </li>--}}
                        <li><a href="{{route('track-order.index')}}">{{trans('messages.track_order')}}</a>
                        </li>
                        <li><a href="{{route('customer.auth.login')}}">{{trans('messages.address')}}</a>
                        </li>
                        <li><a href="{{route('customer.auth.login')}}">{{trans('messages.support_ticket')}}</a>
                        </li>
                        {{--to do--}}
                        {{--<li class="widget-list-item">
                            <a class="widget-list-link"
                               href="{{route('customer.auth.login')}}">{{trans('messages.tansction_history')}}
                            </a>
                        </li>--}}
                    </ul>
                @endif
				</div>
            </div>

            <!-- Grid column -->
            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            <div class="col-lg-3 col-sm-6"">
                            <div class="widget">
                                <h4 class="widget-title">{{trans('messages.about_us')}}</h4>
                                <ul class="widget-list">
                                    <li><a href="{{route('about-us')}}">{{trans('messages.about_company')}}</a></li>
                                    <li><a href="{{route('about-us')}}">{{trans('messages.faq')}}</a></li>
                                    <li><a href="{{route('contacts')}}">{{trans('messages.contact_us')}}</a></li>
                                </ul>
                            </div>
            </div>
			@php($categories=\App\CPU\CategoryManager::parents())
                <div class="footer-middle">
                    <div class="widget widget-category">
					@foreach($categories as $category)
                        <div class="category-box">
                            <h6 class="category-name"> {{$category['name']}}:</h6>
							@if($category->childes->count()>0)
								@foreach($category['childes'] as $subCategory)
									<a href="#">{{$subCategory['name']}}</a>
								@endforeach
							@endif
                        </div>
					@endforeach
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="footer-left">
                        <p class="copyright">Copyright &copy; 2021 BandharPhirus.com. All Rights Reserved.</p>
                    </div>
                    <div class="footer-right">
                        <span class="payment-label mr-lg-8">We're using safe payment for</span>
                        <figure class="payment">
                            <img src="https://tripay.co.id/new-template/images/logo-dark.png" alt="payment" width="159" height="25" />
                        </figure>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
    <!-- End of Page-wrapper-->

    <!-- Start of Sticky Footer -->
    <div class="sticky-footer sticky-content fix-bottom">
        <a href="{{route('home')}}" class="sticky-link active">
            <i class="w-icon-home"></i>
            <p>Home</p>
        </a>
        <a href="/products?name=" class="sticky-link">
            <i class="w-icon-category"></i>
            <p>Shop</p>
        </a>
        <a href="{{route('user-account')}}" class="sticky-link">
            <i class="w-icon-account"></i>
            <p>Account</p>
        </a>
        <div class="cart-dropdown dir-up">
            <a href="{{route('shop-cart')}}" class="sticky-link">
                <i class="w-icon-cart"></i>
                <p>Cart</p>
            </a>
<!--            <div class="dropdown-box">
                <div class="products">
                    <div class="product product-cart">
                        <div class="product-detail">
                            <h3 class="product-name">
                                <a href="product-default.html">Beige knitted elas<br>tic
                                    runner shoes</a>
                            </h3>
                            <div class="price-box">
                                <span class="product-quantity">1</span>
                                <span class="product-price">$25.68</span>
                            </div>
                        </div>
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/cart/product-1.jpg" alt="product" height="84" width="94" />
                            </a>
                        </figure>
                        <button class="btn btn-link btn-close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <div class="product product-cart">
                        <div class="product-detail">
                            <h3 class="product-name">
                                <a href="product-default.html">Blue utility pina<br>fore
                                    denim dress</a>
                            </h3>
                            <div class="price-box">
                                <span class="product-quantity">1</span>
                                <span class="product-price">$32.99</span>
                            </div>
                        </div>
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/cart/product-2.jpg" alt="product" width="84" height="94" />
                            </a>
                        </figure>
                        <button class="btn btn-link btn-close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="cart-total">
                    <label>Subtotal:</label>
                    <span class="price">$58.67</span>
                </div>

                <div class="cart-action">
                    <a href="cart.html" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                    <a href="checkout.html" class="btn btn-primary  btn-rounded">Checkout</a>
                </div>
            </div>
            <!-- End of Dropdown Box -->
        </div>

        <div class="header-search hs-toggle dir-up">
            <a href="#" class="search-toggle sticky-link">
                <i class="w-icon-search"></i>
                <p>Search</p>
            </a>
            <form action="{{route('products')}}" class="input-wrapper">
                <input type="text" class="form-control" name="name" autocomplete="off" placeholder="Search"
                    required />
					<input type="hidden" name="data_from" value="search">
					<input type="hidden" name="page" value="1">
                <button class="btn btn-search" type="submit">
                    <i class="w-icon-search"></i>
                </button>
            </form>
        </div>
    </div>
    <!-- End of Sticky Footer -->

    <!-- Start of Scroll Top -->
    <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="fas fa-chevron-up"></i></a>
    <!-- End of Scroll Top -->

    <!-- Start of Mobile Menu -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-overlay"></div>
        <!-- End of .mobile-menu-overlay -->

        <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
        <!-- End of .mobile-menu-close -->

        <div class="mobile-menu-container scrollable">
            <form action="{{route('products')}}" method="get" class="input-wrapper">
                <input type="text" class="form-control" name="name" autocomplete="off" placeholder="Search"
                    required />
					<input type="hidden" name="data_from" value="search">
					<input type="hidden" name="page" value="1">
                <button class="btn btn-search" type="submit">
                    <i class="w-icon-search"></i>
                </button>
            </form>
            <!-- End of Search Form -->
            <div class="tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#main-menu" class="nav-link active">Main Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="#categories" class="nav-link">Categories</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="main-menu">
                    <ul class="mobile-menu">
                        <li><a href="{{route('home')}}">Home</a></li>
						<li>
							<a href="collection.html">Collection</a>

							<ul>
								<li><a href="koleksi-amerika.html">Amerika</a></li>
								<li><a href="koleksi-cina.html">Cina</a></li>
								<li><a href="koleksi-persian.html">Persian</a></li> 
							</ul>
						</li>
						<li>
							<a href="vendor-dokan-store.html">Contest</a>
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
							</ul>
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
							<a href="education.html">Education</a>
						</li>

                    </ul>
                </div>
                <div class="tab-pane" id="categories">
                    <ul class="mobile-menu">
					@foreach($categories as $category)
                        <li>
                            <a href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}">
                                {{$category['name']}}
                            </a>
							@if($category->childes->count()>0)
                            <ul>
								@foreach($category['childes'] as $subCategory)
                                <li>
                                    <h4>{{$subCategory['name']}}</h4>
									@if($subCategory->childes->count()>0)
										<ul>
											<li><a href="shop-fullwidth-banner.html">New Arrivals</a>
											</li>
											<li><a href="shop-fullwidth-banner.html">Best Sellers</a>
											</li>
											<li><a href="shop-fullwidth-banner.html">Sale</a></li>
											@foreach($subCategory['childes'] as $subSubCategory)
												<li><a href="{{route('products',['id'=> $subSubCategory['id'],'data_from'=>'category','page'=>1])}}">{{$subSubCategory['name']}}</a>
												</li>
											@endforeach
										</ul>
									@endif
                                </li>
								@endforeach
							</ul>
							@endif
						</li>
					@endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Mobile Menu -->

    <!-- Start of Quick View -->
    <div class="product product-single product-popup">
        <div class="row gutter-lg">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="product-gallery product-gallery-sticky mb-0">
                    <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no">
                        <figure class="product-image">
                            <img src="assets/images/products/popup/1-440x494.jpg"
                                data-zoom-image="assets/images/products/popup/1-800x900.jpg"
                                alt="Water Boil Black Utensil" width="800" height="900">
                        </figure>
                        <figure class="product-image">
                            <img src="assets/images/products/popup/2-440x494.jpg"
                                data-zoom-image="assets/images/products/popup/2-800x900.jpg"
                                alt="Water Boil Black Utensil" width="800" height="900">
                        </figure>
                        <figure class="product-image">
                            <img src="assets/images/products/popup/3-440x494.jpg"
                                data-zoom-image="assets/images/products/popup/3-800x900.jpg"
                                alt="Water Boil Black Utensil" width="800" height="900">
                        </figure>
                        <figure class="product-image">
                            <img src="assets/images/products/popup/4-440x494.jpg"
                                data-zoom-image="assets/images/products/popup/4-800x900.jpg"
                                alt="Water Boil Black Utensil" width="800" height="900">
                        </figure>
                    </div>
                    <div class="product-thumbs-wrap">
                        <div class="product-thumbs">
                            <div class="product-thumb active">
                                <img src="assets/images/products/popup/1-103x116.jpg" alt="Product Thumb" width="103"
                                    height="116">
                            </div>
                            <div class="product-thumb">
                                <img src="assets/images/products/popup/2-103x116.jpg" alt="Product Thumb" width="103"
                                    height="116">
                            </div>
                            <div class="product-thumb">
                                <img src="assets/images/products/popup/3-103x116.jpg" alt="Product Thumb" width="103"
                                    height="116">
                            </div>
                            <div class="product-thumb">
                                <img src="assets/images/products/popup/4-103x116.jpg" alt="Product Thumb" width="103"
                                    height="116">
                            </div>
                        </div>
                        <button class="thumb-up disabled"><i class="w-icon-angle-left"></i></button>
                        <button class="thumb-down disabled"><i class="w-icon-angle-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 overflow-hidden p-relative">
                <div class="product-details scrollable pl-0">
                    <h2 class="product-title">Electronics Black Wrist Watch</h2>
                    <div class="product-bm-wrapper">
                        <figure class="brand">
                            <img src="assets/images/products/brand/brand-1.jpg" alt="Brand" width="102" height="48" />
                        </figure>
                        <div class="product-meta">
                            <div class="product-categories">
                                Category:
                                <span class="product-category"><a href="#">Electronics</a></span>
                            </div>
                            <div class="product-sku">
                                SKU: <span>MS46891340</span>
                            </div>
                        </div>
                    </div>

                    <hr class="product-divider">

                    <div class="product-price">$40.00</div>

                    <div class="ratings-container">
                        <div class="ratings-full">
                            <span class="ratings" style="width: 80%;"></span>
                            <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <a href="#" class="rating-reviews">(3 Reviews)</a>
                    </div>

                    <div class="product-short-desc">
                        <ul class="list-type-check list-style-none">
                            <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                            <li>Volutpat ac tincidunt vitae semper quis lectus.</li>
                            <li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
                        </ul>
                    </div>

                    <hr class="product-divider">

                    <div class="product-form product-variation-form product-color-swatch">
                        <label>Color:</label>
                        <div class="d-flex align-items-center product-variations">
                            <a href="#" class="color" style="background-color: #ffcc01"></a>
                            <a href="#" class="color" style="background-color: #ca6d00;"></a>
                            <a href="#" class="color" style="background-color: #1c93cb;"></a>
                            <a href="#" class="color" style="background-color: #ccc;"></a>
                            <a href="#" class="color" style="background-color: #333;"></a>
                        </div>
                    </div>
                    <div class="product-form product-variation-form product-size-swatch">
                        <label class="mb-1">Size:</label>
                        <div class="flex-wrap d-flex align-items-center product-variations">
                            <a href="#" class="size">Small</a>
                            <a href="#" class="size">Medium</a>
                            <a href="#" class="size">Large</a>
                            <a href="#" class="size">Extra Large</a>
                        </div>
                        <a href="#" class="product-variation-clean">Clean All</a>
                    </div>

                    <div class="product-variation-price">
                        <span></span>
                    </div>

                    <div class="product-form">
                        <div class="product-qty-form">
                            <div class="input-group">
                                <input class="quantity form-control" type="number" min="1" max="10000000">
                                <button class="quantity-plus w-icon-plus"></button>
                                <button class="quantity-minus w-icon-minus"></button>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-cart">
                            <i class="w-icon-cart"></i>
                            <span>Add to Cart</span>
                        </button>
                    </div>

                    <div class="social-links-wrapper">
                        <div class="social-links">
                            <div class="social-icons social-no-color border-thin">
                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                                <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                            </div>
                        </div>
                        <span class="divider d-xs-show"></span>
                        <div class="product-link-wrapper d-flex">
                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"></a>
                            <a href="#"
                                class="btn-product-icon btn-compare btn-icon-left w-icon-compare"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Footer -->
