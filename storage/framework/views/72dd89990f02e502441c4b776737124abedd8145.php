<?php $__env->startSection('title',$product['name']); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="description" content="<?php echo e($product->slug); ?>">
    <meta name="keywords" content="<?php $__currentLoopData = explode(' ',$product['name']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($keyword.' , '); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
    <?php if($product->added_by=='seller'): ?>
        <meta name="author" content="<?php echo e($product->seller->shop?$product->seller->shop->name:$product->seller->f_name); ?>">
    <?php elseif($product->added_by=='admin'): ?>
        <meta name="author" content="<?php echo e($web_config['name']); ?>">
    <?php endif; ?>
    <!-- Viewport-->

    <meta property="og:image" content="<?php echo e(asset("storage/app/public/product/thumbnail")); ?>/<?php echo e($product->thumbnail); ?>"/>
    <meta property="og:title" content="<?php echo e($product->name); ?>"/>
    <meta property="og:url" content="<?php echo e(route('product',[$product->slug])); ?>">
    <meta property="og:description"
          content="<?php $__currentLoopData = explode(' ',$product['name']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($keyword.' , '); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">

    <meta property="twitter:card"
          content="<?php echo e(asset("storage/app/public/product/thumbnail/")); ?>/<?php echo e($product->thumbnail); ?>"/>
    <meta property="twitter:title" content="<?php echo e($product->name); ?>"/>
    <meta property="twitter:url" content="<?php echo e(route('product',[$product->slug])); ?>">
    <meta property="twitter:description"
          content="<?php $__currentLoopData = explode(' ',$product['name']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($keyword.' , '); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('public/assets/front-end/css/product-details.css')); ?>"/>
    <style>
        .msg-option {
            display: none;
        }

        .chatInputBox {
            width: 100%;
        }

        .for-discoutn-value {
            background-color: <?php echo e($web_config['primary_color']); ?>;
            color: white;
            padding: 3px 4px 2px 5px;
            border-radius: 0px 5px;
            font-size: small;
        }

        .for-discoutn-value-null {
            color: white;
            padding: 3px 4px 2px 5px;
            border-radius: 0px 5px;
            font-size: small;
            display: inline-block;
        }

        .for-dicount-div-null {
            margin-bottom: 8%;
        }

        .for-dicount-div {
            margin-top: -6%;
            margin-right: -9%;
            margin-bottom: 6%;
        }

        .go-to-chatbox {
            width: 100%;
            text-align: center;
            padding: 5px 0px;
            display: none;
        }

        .feature_header {
            display: flex;
            justify-content: center;
        }

        .btn-number:hover {
            color: <?php echo e($web_config['secondary_color']); ?>;

        }

        .for-total-price {
            margin-left: -30%;
        }

        .for-hover-bg:hover {
            border: 2px solid<?php echo e($web_config['primary_color']); ?>;
        }

        .for-hover-bg {
            font-size: 18px;
            height: 45px;
            color: <?php echo e($web_config['primary_color']); ?>;
            border: 2px solid<?php echo e($web_config['secondary_color']); ?>;
        }

        .feature_header span {
            padding-right: 15px;
            padding-left: 15px;
            font-weight: 700;
            font-size: 25px;
            background-color: #ffffff;
            text-transform: uppercase;
        }

        @media (max-width: 768px) {
            .feature_header span {
                margin-bottom: -40px;
            }

            .for-total-price {
                padding-left: 30%;
            }

            .product-quantity {
                padding-left: 4%;
            }

            .for-margin-bnt-mobile {
                margin-right: 7px;
            }

            .font-for-tab {
                font-size: 11px !important;


            }

            .pro {
                font-size: 13px;
            }
        }

        @media (max-width: 375px) {
            .for-margin-bnt-mobile {
                margin-right: 3px;
            }

            .for-discount {
                margin-left: 10% !important;
            }

            .for-dicount-div {
                margin-top: -5%;
                margin-right: -7%;
            }

            .product-quantity {
                margin-left: 4%;
            }

        }

        @media (max-width: 500px) {
            .for-dicount-div {
                margin-top: -4%;
                margin-right: -5%;
            }

            .for-total-price {
                margin-left: -20%;
            }

            .view-btn-div {

                margin-top: -9%;
                float: right;
            }

            .for-discount {
                margin-left: 7%;
            }

            .viw-btn-a {
                font-size: 10px;
                font-weight: 600;
            }

            .feature_header span {
                margin-bottom: -7px;
            }

            .for-mobile-capacity {
                margin-left: 7%;
            }
        }
    </style>
    <style>
        th, td {
            border-bottom: 1px solid #ddd;
            padding: 5px;
        }

        thead {
            background: <?php echo e($web_config['primary_color']); ?>     !important;
            color: white;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php
    if (!empty($product)) {
        $overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews);
    }
    $rating = \App\CPU\ProductManager::get_rating($product->reviews);
    ?>
    <!-- Page Content-->
    <div class="container mt-4">
        <!-- General info tab-->
        <div class="row ">
            <!-- Product gallery-->
            <div class="col-lg-6 col-md-6">
                <div class="cz-product-gallery">
                    <div class="cz-preview">
                        <?php if($product->images!=null): ?>
                            <?php $__currentLoopData = json_decode($product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div
                                    class="cz-preview-item d-flex align-items-center justify-content-center  <?php echo e($key==0?'active':''); ?>"
                                    id="image<?php echo e($key); ?>">
                                    <img class="cz-image-zoom img-responsive"
                                         src="<?php echo e(asset("storage/app/public/product/$photo")); ?>"
                                         data-zoom="<?php echo e(asset("storage/app/public/product/$photo")); ?>"
                                         alt="Product image" width="">
                                    <div class="cz-image-zoom-pane"></div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                    <div class="cz">
                        <div class="container">
                            <div class="row">
                                <div class="table-responsive" data-simplebar style="max-height: 515px; padding: 1px;">
                                    <div class="d-flex">
                                        <?php if($product->images!=null): ?>
                                            <?php $__currentLoopData = json_decode($product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="cz-thumblist">
                                                    <a class="cz-thumblist-item  <?php echo e($key==0?'active':''); ?> d-flex align-items-center justify-content-center "
                                                       href="#image<?php echo e($key); ?>">
                                                        <img src="<?php echo e(asset("storage/app/public/product/$photo")); ?>"
                                                             alt="Product thumb">
                                                    </a>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product details-->
            <div class="col-lg-6 col-md-6 mt-md-0 mt-sm-3">
                <div class="details">
                    <h1 class="h3 mb-2"><?php echo e($product->name); ?></h1>
                    <div class="d-flex align-items-center mb-2 pro">
                        <span
                            class="d-inline-block font-size-sm text-body align-middle mt-1 mr-md-2 mr-sm-0 pr-2"><?php echo e($overallRating[0]); ?></span>
                        <div class="star-rating">
                            <?php if($overallRating[0]==5): ?>
                                <?php for($i = 0; $i < 5; $i++): ?>
                                    <i class="sr-star czi-star-filled active"></i>
                                <?php endfor; ?>
                            <?php endif; ?>
                            <?php if($overallRating[0]==4): ?>
                                <?php for($i = 0; $i < 4; $i++): ?>
                                    <i class="sr-star czi-star-filled active"></i>
                                <?php endfor; ?>
                                <i class="sr-star czi-star"></i>
                            <?php endif; ?>
                            <?php if($overallRating[0]==3): ?>
                                <?php for($i = 0; $i < 3; $i++): ?>
                                    <i class="sr-star czi-star-filled active"></i>
                                <?php endfor; ?>
                                <?php for($j = 0; $j < 2; $j++): ?>
                                    <i class="sr-star czi-star"></i>
                                <?php endfor; ?>
                            <?php endif; ?>
                            <?php if($overallRating[0]==2): ?>
                                <?php for($i = 0; $i < 2; $i++): ?>
                                    <i class="sr-star czi-star-filled active"></i>
                                <?php endfor; ?>
                                <?php for($j = 0; $j < 3; $j++): ?>
                                    <i class="sr-star czi-star"></i>
                                <?php endfor; ?>
                            <?php endif; ?>
                            <?php if($overallRating[0]==1): ?>
                                <?php for($i = 0; $i < 4; $i++): ?>
                                    <i class="sr-star czi-star-filled active"></i>
                                <?php endfor; ?>
                                <i class="sr-star czi-star"></i>
                            <?php endif; ?>
                            <?php if($overallRating[0]==0): ?>
                                <?php for($i = 0; $i < 5; $i++): ?>
                                    <i class="sr-star czi-star"></i>
                                <?php endfor; ?>
                            <?php endif; ?>
                        </div>
                        <span
                            class="font-for-tab d-inline-block font-size-sm text-body align-middle mt-1 ml-1 mr-md-2 mr-1 pl-md-2 pl-sm-1 pr-md-2 pr-sm-1"><?php echo e($overallRating[1]); ?> <?php echo e(trans('messages.Reviews')); ?></span>
                        <span style="width: 0px;height: 10px;border: 0.5px solid #707070; margin-top: 6px"></span>
                        <span
                            class="d-inline-block font-size-sm text-body align-middle mt-1 ml-1 mr-md-2 mr-1 pl-md-2 pl-sm-1 pr-md-2 pr-sm-1 font-for-tab"><?php echo e($countOrder); ?> <?php echo e(trans('messages.orders')); ?>   </span>
                        <span style="width: 0px;height: 10px;border: 0.5px solid #707070; margin-top: 6px">    </span>
                        <span
                            class=" font-for-tab d-inline-block font-size-sm text-body align-middle mt-1 ml-1 mr-md-2 mr-0 pl-md-2 pl-sm-1 pr-md-2 pr-sm-1">  <?php echo e($countWishlist); ?> <?php echo e(trans('messages.wish')); ?> </span>

                    </div>
                    <div class="mb-3">
                        <span class="h3 font-weight-normal text-accent mr-1">
                            <?php echo e(\App\CPU\Helpers::get_price_range($product)); ?>

                        </span>
                        <?php if($product->discount > 0): ?>
                            <strike style="color: <?php echo e($web_config['secondary_color']); ?>;">
                                <?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price)); ?>

                            </strike>
                        <?php endif; ?>
                    </div>

                    <?php if($product->discount > 0): ?>
                        <div class="mb-3">
                            <strong>
                                Discount : <?php echo e(\App\CPU\Helpers::currency_converter(\App\CPU\Helpers::get_product_discount($product,$product['unit_price']))); ?>

                            </strong>
                        </div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <strong>
                            TAX : <?php echo e(\App\CPU\Helpers::currency_converter(
                                    \App\CPU\Helpers::tax_calculation($product->unit_price,$product->tax,$product->tax_type)
                                )); ?> ( <?php echo e($product['tax']); ?> % )
                        </strong>
                    </div>
                    <form id="add-to-cart-form" class="mb-2">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                        <div class="position-relative mr-n4 mb-3">
                            <?php if(count(json_decode($product->colors)) > 0): ?>
                                <div class="row no-gutters">
                                    <div class="col-2">
                                        <div class="product-description-label mt-2"><?php echo e(__('Color')); ?>:
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <ul class="list-inline checkbox-color mb-1">
                                            <?php $__currentLoopData = json_decode($product->colors); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <input type="radio"
                                                           id="<?php echo e($product->id); ?>-color-<?php echo e($key); ?>"
                                                           name="color" value="<?php echo e($color); ?>"
                                                           <?php if($key == 0): ?> checked <?php endif; ?>>
                                                    <label style="background: <?php echo e($color); ?>;"
                                                           for="<?php echo e($product->id); ?>-color-<?php echo e($key); ?>"
                                                           data-toggle="tooltip"></label>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php
                                $qty = 0;
                                if(!empty($product)){
                                foreach (json_decode($product->variation) as $key => $variation) {
                                        $qty += $variation->qty;
                                    }
                                }
                            ?>
                        </div>
                        <?php $__currentLoopData = json_decode($product->choice_options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row no-gutters">
                                <div class="col-3">
                                    <div class="product-description-label mt-2"><?php echo e($choice->title); ?>:
                                    </div>
                                </div>
                                <div class="col-9">
                                    <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2">
                                        <?php $__currentLoopData = $choice->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="for-mobile-capacity">
                                                <input type="radio"
                                                       id="<?php echo e($choice->name); ?>-<?php echo e($option); ?>"
                                                       name="<?php echo e($choice->name); ?>" value="<?php echo e($option); ?>"
                                                       <?php if($key == 0): ?> checked <?php endif; ?>>
                                                <label for="<?php echo e($choice->name); ?>-<?php echo e($option); ?>"><?php echo e($option); ?></label>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <!-- Quantity + Add to cart -->
                        <div class="row no-gutters">
                            <div class="col-2">
                                <div class="product-description-label mt-2"><?php echo e(__('Quantity')); ?>:</div>
                            </div>
                            <div class="col-10">
                                <div class="product-quantity d-flex align-items-center">
                                    <div class="input-group input-group--style-2 pr-3"
                                         style="width: 160px;">
                                        <span class="input-group-btn">
                                            <button class="btn btn-number" type="button"
                                                    data-type="minus" data-field="quantity"
                                                    disabled="disabled" style="padding: 10px">
                                                -
                                            </button>
                                        </span>
                                        <input type="text" name="quantity"
                                               class="form-control input-number text-center cart-qty-field"
                                               placeholder="1" value="1" min="1" max="100">
                                        <span class="input-group-btn">
                                            <button class="btn btn-number" type="button" data-type="plus"
                                                    data-field="quantity" style="padding: 10px">
                                               +
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row no-gutters d-none mt-2" id="chosen_price_div">
                            <div class="col-5">
                                <div class="product-description-label"><?php echo e(__('Total Price')); ?>:</div>
                            </div>
                            <div class="col-7">
                                <div class="product-price for-total-price">
                                    <strong id="chosen_price"></strong>
                                </div>
                            </div>
                        </div>

                        
                        <div class="row" style="display: none">
                            <div class="col-md-12">
                                <div id="accordion">
                                    <div class="card mt-2 mb-2">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                                <a href="javascript:" style="font-size: 15px" class="collapsed"
                                                   data-toggle="collapse" data-target="#collapseTwo"
                                                   aria-expanded="false"
                                                   aria-controls="collapseTwo">
                                                    <?php echo e(trans('messages.Select')); ?> <?php echo e(trans('messages.shipping_method')); ?>

                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                                             data-parent="#accordion">
                                            <div class="card-body">
                                                <ul class="list-group">
                                                    <?php $__currentLoopData = \App\CPU\ProductManager::get_shipping_methods($product); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="list-group-item" style="cursor: pointer;"
                                                            onclick="$('#sh-<?php echo e($shipping['id']); ?>').prop( 'checked', true )">
                                                            <input type="radio" name="shipping_method_id"
                                                                   id="sh-<?php echo e($shipping['id']); ?>"
                                                                   value="<?php echo e($shipping['id']); ?>" <?php echo e($key==0?'checked':''); ?>>
                                                            <span class="checkmark" style="margin-right: 10px"></span>
                                                            <?php echo e($shipping['title']); ?> ( Duration
                                                            : <?php echo e($shipping['duration']); ?>,
                                                            Cost
                                                            : <?php echo e(\App\CPU\Helpers::currency_converter($shipping['cost'])); ?>

                                                            )
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-2">

                            <button class="btn btn-secondary for-margin-bnt-mobile" onclick="buy_now()"
                                    type="button"
                                    style="width:37%; height: 45px">
                                <?php echo e(trans('messages.buy_now')); ?>

                            </button>
                            <button class="btn btn-primary for-margin-bnt-mobile"
                                    onclick="addToCart()"
                                    type="button"
                                    style="width:37%; height: 45px">
                                <?php echo e(trans('messages.Add')); ?> <?php echo e(trans('messages.To')); ?> <?php echo e(trans('messages.Cart')); ?>

                            </button>


                            <button type="button" onclick="addWishlist('<?php echo e($product['id']); ?>')" class="btn for-hover-bg"
                                    style="">
                                <i class="fa fa-heart-o mr-2" aria-hidden="true"></i>
                                <span class="countWishlist-<?php echo e($product['id']); ?>"><?php echo e($countWishlist); ?></span>
                            </button>
                        </div>
                    </form>
                    <hr style="padding-bottom: 10px">
                    <div style="text-align:left;" class="sharethis-inline-share-buttons"></div>
                </div>
            </div>
        </div>
    </div>

    
    
    <?php if($product->added_by=='seller'): ?>
        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <div class="seller_details d-flex align-items-center" id="seller_details">
                        <div class="container">
                            <div class="row d-flex align-items-center" id="sellerOption">
                                <div class="col-md-6 p-0">
                                    <div class="seller_shop">
                                        <div class="shop_image d-flex justify-content-center align-items-center">
                                            <a href="#" class="d-flex justify-content-center">
                                                <img style="height: 65px; border-radius: 50%"
                                                     src="<?php echo e(asset('storage/app/public/shop')); ?>/<?php echo e($product->seller->shop->image); ?>"
                                                     onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                     alt="">
                                            </a>
                                        </div>
                                        <div class="shop_name d-flex justify-content-center align-items-center">
                                            <div>
                                                <a href="#" class="d-flex align-items-center">
                                                    <div
                                                        class="title"><?php echo e($product->seller->shop->name); ?></div>
                                                </a>
                                                <div class="review d-flex align-items-center">
                                                    <div class="">
                                                        <span
                                                            class="d-inline-block font-size-sm text-body align-middle mt-1 mr-2"><?php echo e(trans('messages.Seller')); ?> <?php echo e(trans('messages.Info')); ?> </span>
                                                        <span
                                                            class="d-inline-block font-size-sm text-body align-middle mt-1 ml-2"></span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 p-md-0 pt-sm-3">
                                    <div class="seller_contact">
                                        <?php $__currentLoopData = $product->seller->shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="d-flex align-items-center pr-4">
                                                <a href="<?php echo e(route('shopView',[$product->seller->id])); ?>">
                                                    <button class="btn btn-secondary">
                                                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                        <?php echo e(trans('messages.Visit')); ?>

                                                    </button>
                                                </a>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if(auth('customer')->id() == ''): ?>
                                            <div class="d-flex align-items-center">
                                                <a href="<?php echo e(route('customer.auth.login')); ?>">
                                                    <button class="btn btn-primary">
                                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                                        <?php echo e(trans('messages.Contact')); ?> <?php echo e(trans('messages.Seller')); ?>

                                                    </button>
                                                </a>
                                            </div>
                                        <?php else: ?>
                                            <div class="d-flex align-items-center" id="contact-seller">
                                                <button class="btn btn-primary">
                                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                                    <?php echo e(trans('messages.Contact')); ?> <?php echo e(trans('messages.Seller')); ?>

                                                </button>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row msg-option" id="msg-option">
                                <form action="">
                                    <input type="text" class="seller_id" hidden seller-id="<?php echo e($product->seller->id); ?>">
                                    <textarea shop-id="<?php echo e($product->seller->shop->id); ?>" class="chatInputBox"
                                              id="chatInputBox" rows="5"> </textarea>

                                    <button class="btn btn-secondary" style="color: white;" id="cancelBtn">Cancel
                                    </button>
                                    <button class="btn btn-primary" style="color: white;" id="sendBtn">Send</button>
                                </form>
                            </div>
                            <div class="go-to-chatbox" id="go_to_chatbox">
                                <a href="<?php echo e(route('chat-with-seller')); ?>" class="btn btn-primary" id="go_to_chatbox_btn">
                                    <?php echo e(trans('messages.go_to')); ?> <?php echo e(trans('messages.chatbox')); ?> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    
    <div class="container mt-4">
        <div class="product_overview">
            <!-- Tabs-->
            <ul class="nav nav-tabs d-flex justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#overview" data-toggle="tab" role="tab"
                       style="color: black !important;">
                        <?php echo e(trans('messages.OVERVIEW')); ?>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#reviews" data-toggle="tab" role="tab" style="color: black !important;">
                        <?php echo e(trans('messages.REVIEWS')); ?>

                    </a>
                </li>
            </ul>
            <div class="px-4 pt-lg-3 pb-3 mb-3">
                <div class="tab-content px-lg-3">
                    <!-- Tech specs tab-->
                    <div class="tab-pane fade show active" id="overview" role="tabpanel">
                        <div class="row pt-2 specification">
                            <div class="col-lg-12 col-md-12">
                                <?php echo $product['details']; ?>

                            </div>
                        </div>
                    </div>
                    <!-- Reviews tab-->
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="row pt-2 pb-3">
                            <div class="col-lg-4 col-md-5 ">
                                <h2 class="overall_review mb-2"><?php echo e($overallRating[1]); ?>

                                    &nbsp<?php echo e(trans('messages.Reviews')); ?> </h2>
                                <div class="star-rating mr-2">
                                    <?php if(round($overallRating[0])==5): ?>
                                        <?php for($i = 0; $i < 5; $i++): ?>
                                            <i class="czi-star-filled font-size-sm text-accent mr-1"></i>
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                    <?php if(round($overallRating[0])==4): ?>
                                        <?php for($i = 0; $i < 4; $i++): ?>
                                            <i class="czi-star-filled font-size-sm text-accent mr-1"></i>
                                        <?php endfor; ?>
                                        <i class="czi-star font-size-sm text-muted mr-1"></i>
                                    <?php endif; ?>
                                    <?php if(round($overallRating[0])==3): ?>
                                        <?php for($i = 0; $i < 3; $i++): ?>
                                            <i class="czi-star-filled font-size-sm text-accent mr-1"></i>
                                        <?php endfor; ?>
                                        <?php for($j = 0; $j < 2; $j++): ?>
                                            <i class="czi-star font-size-sm text-accent mr-1"></i>
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                    <?php if(round($overallRating[0])==2): ?>
                                        <?php for($i = 0; $i < 2; $i++): ?>
                                            <i class="czi-star-filled font-size-sm text-accent mr-1"></i>
                                        <?php endfor; ?>
                                        <?php for($j = 0; $j < 3; $j++): ?>
                                            <i class="czi-star font-size-sm text-accent mr-1"></i>
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                    <?php if(round($overallRating[0])==1): ?>
                                        <?php for($i = 0; $i < 4; $i++): ?>
                                            <i class="czi-star font-size-sm text-accent mr-1"></i>
                                        <?php endfor; ?>
                                        <i class="czi-star-filled font-size-sm text-accent mr-1"></i>
                                    <?php endif; ?>
                                    <?php if(round($overallRating[0])==0): ?>
                                        <?php for($i = 0; $i < 5; $i++): ?>
                                            <i class="czi-star font-size-sm text-muted mr-1"></i>
                                        <?php endfor; ?>
                                    <?php endif; ?>

                                </div>
                                <span class="d-inline-block align-middle">
                                    <?php echo e($overallRating[0]); ?> <?php echo e(trans('messages.Overall')); ?> <?php echo e(trans('messages.rating')); ?>

                                </span>
                            </div>
                            <div class="col-lg-8 col-md-7 pt-sm-3 pt-md-0">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-nowrap mr-3"><span
                                            class="d-inline-block align-middle text-muted"><?php echo e(trans('messages.5')); ?></span><i
                                            class="czi-star-filled font-size-xs ml-1"></i></div>
                                    <div class="w-100">
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                 style="width: <?php echo $widthRating = ($rating[0] != 0) ? ($rating[0] / $overallRating[1]) * 100 : (0); ?>%;"
                                                 aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <span class="text-muted ml-3">
                                        <?php echo e($rating[0]); ?>

                                    </span>
                                </div>

                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-nowrap mr-3"><span
                                            class="d-inline-block align-middle text-muted"><?php echo e(trans('messages.4')); ?></span><i
                                            class="czi-star-filled font-size-xs ml-1"></i></div>
                                    <div class="w-100">
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width: <?php echo $widthRating = ($rating[1] != 0) ? ($rating[1] / $overallRating[1]) * 100 : (0); ?>%; background-color: #a7e453;"
                                                 aria-valuenow="27" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <span class="text-muted ml-3">
                                       <?php echo e($rating[1]); ?>

                                    </span>
                                </div>

                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-nowrap mr-3"><span
                                            class="d-inline-block align-middle text-muted"><?php echo e(trans('messages.3')); ?></span><i
                                            class="czi-star-filled font-size-xs ml-1"></i></div>
                                    <div class="w-100">
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width: <?php echo $widthRating = ($rating[2] != 0) ? ($rating[2] / $overallRating[1]) * 100 : (0); ?>%; background-color: #ffda75;"
                                                 aria-valuenow="17" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <span class="text-muted ml-3">
                                        <?php echo e($rating[2]); ?>

                                    </span>
                                </div>

                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-nowrap mr-3"><span
                                            class="d-inline-block align-middle text-muted"><?php echo e(trans('messages.2')); ?></span><i
                                            class="czi-star-filled font-size-xs ml-1"></i></div>
                                    <div class="w-100">
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width: <?php echo $widthRating = ($rating[3] != 0) ? ($rating[3] / $overallRating[1]) * 100 : (0); ?>%; background-color: #fea569;"
                                                 aria-valuenow="9" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <span class="text-muted ml-3">
                                    <?php echo e($rating[3]); ?>

                                    </span>
                                </div>

                                <div class="d-flex align-items-center">
                                    <div class="text-nowrap mr-3"><span
                                            class="d-inline-block align-middle text-muted"><?php echo e(trans('messages.1')); ?></span><i
                                            class="czi-star-filled font-size-xs ml-1"></i></div>
                                    <div class="w-100">
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar bg-danger" role="progressbar"
                                                 style="width: <?php echo $widthRating = ($rating[4] != 0) ? ($rating[4] / $overallRating[1]) * 100 : (0); ?>%;"
                                                 aria-valuenow="4" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <span class="text-muted ml-3">
                                       <?php echo e($rating[4]); ?>

                                    </span>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4 pb-4 mb-3">
                        <div class="row pb-4">
                            <div class="col-12">
                                <?php if(count($product->reviews)>0): ?>
                                    <?php $__currentLoopData = $product->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productReview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="single_product_review p-2" style="margin-bottom: 20px">
                                            <div class="product-review d-flex justify-content-between">
                                                <div class="d-flex mb-3 pr-5">
                                                    <div class="media media-ie-fix align-items-center mr-4 pr-2">
                                                        <img style="max-height: 64px;" class="rounded-circle" width="64"
                                                             onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                             src="<?php echo e(asset("storage/app/public/profile/".$productReview->user->image)); ?>"
                                                             alt="<?php echo e($productReview->user->f_name); ?>"/>
                                                        <div class="media-body pl-3">
                                                            <h6 class="font-size-sm mb-0"><?php echo e($productReview->user->f_name); ?></h6>
                                                            <div class="d-flex justify-content-between">
                                                                <div
                                                                    class="product_review_rating"><?php echo e($productReview->rating); ?></div>
                                                                <div class="star-rating">

                                                                    <?php if($productReview->rating==5): ?>
                                                                        <?php for($i = 0; $i < 5; $i++): ?>
                                                                            <i class="sr-star czi-star-filled active"></i>
                                                                        <?php endfor; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($productReview->rating==4): ?>
                                                                        <?php for($i = 0; $i < 4; $i++): ?>
                                                                            <i class="sr-star czi-star-filled active"></i>
                                                                        <?php endfor; ?>
                                                                        <i class="sr-star czi-star"></i>
                                                                    <?php endif; ?>
                                                                    <?php if($productReview->rating==3): ?>
                                                                        <?php for($i = 0; $i < 3; $i++): ?>
                                                                            <i class="sr-star czi-star-filled active"></i>
                                                                        <?php endfor; ?>
                                                                        <?php for($j = 0; $j < 2; $j++): ?>
                                                                            <i class="sr-star czi-star"></i>
                                                                        <?php endfor; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($productReview->rating==2): ?>
                                                                        <?php for($i = 0; $i < 2; $i++): ?>
                                                                            <i class="sr-star czi-star-filled active"></i>
                                                                        <?php endfor; ?>
                                                                        <?php for($j = 0; $j < 3; $j++): ?>
                                                                            <i class="sr-star czi-star"></i>
                                                                        <?php endfor; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($productReview->rating==1): ?>
                                                                        <?php for($i = 0; $i < 4; $i++): ?>
                                                                            <i class="sr-star czi-star-filled active"></i>
                                                                        <?php endfor; ?>
                                                                        <i class="sr-star czi-star"></i>
                                                                    <?php endif; ?>
                                                                    <?php if($productReview->rating==0): ?>
                                                                        <?php for($i = 0; $i < 5; $i++): ?>
                                                                            <i class="sr-star czi-star"></i>
                                                                        <?php endfor; ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>

                                                            <div class="font-size-ms text-muted">
                                                                <?php echo e($productReview->created_at->format('M d Y')); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="font-size-md mt-3 mb-2"><?php echo e($productReview->comment); ?></p>
                                                    <?php if(!empty(json_decode($productReview->attachment))): ?>
                                                        <?php $__currentLoopData = json_decode($productReview->attachment); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <img
                                                                style="cursor: pointer;border-radius: 5px;border:1px;border-color: #7a6969; height: 67px ; margin-right: 5px;"
                                                                onclick="showInstaImage('<?php echo e(asset("storage/app/public/$photo")); ?>')"
                                                                class="cz-image-zoom"
                                                                onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                                src="<?php echo e(asset("storage/app/public/$photo")); ?>"
                                                                alt="Product review" width="67">
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Review-->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="text-danger text-center"><?php echo e(trans('messages.product_review_not_available')); ?></h6>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product carousel (You may also like)-->
    <div class="container  mb-3">
        <div class="feature_header">
            <span><?php echo e(trans('messages.similar_products')); ?></span>
        </div>

        <div class="view_all view-btn-div">
            <div>
                <?php ($category=json_decode($product['category_ids'])); ?>
                <a class="btn btn-outline-accent btn-sm viw-btn-a"
                   href="<?php echo e(route('products',['id'=> $category[0]->id,'data_from'=>'category','page'=>1])); ?>"><?php echo e(trans('messages.view_all')); ?>

                    <i class="czi-arrow-right ml-1 mr-n1"></i>
                </a>
            </div>
        </div>
        <!-- Grid-->
        <hr class="view_border">
        <!-- Product-->
        <div class="row mt-4">
        <?php if(count($relatedProducts)>0): ?>
            <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $relatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Product-->
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                        <?php echo $__env->make('web-views.partials._single-product',['product'=>$relatedProduct], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-danger text-center"><?php echo e(trans('messages.similar')); ?> <?php echo e(trans('messages.product_not_available')); ?></h6>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="modal fade" id="show-modal-view" tabindex="-1" role="dialog" aria-labelledby="show-modal-image"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button class="btn btn-default"
                            style="border-radius: 50%;margin-top: -25px;position: absolute;right: -7px;"
                            data-dismiss="modal">
                        <i class="fa fa-close"></i>
                    </button>
                    <img id="attachment-view" src="">
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

    <script type="text/javascript">
        cartQuantityInitialize();
        getVariantPrice();
        $('#add-to-cart-form input').on('change', function () {
            getVariantPrice();
        });

        function showInstaImage(link) {
            $("#attachment-view").attr("src", link);
            $('#show-modal-view').modal('toggle')
        }
    </script>

    
    <script>
        $('#contact-seller').on('click', function (e) {
            // $('#seller_details').css('height', '200px');
            $('#seller_details').animate({'height': '276px'});
            $('#msg-option').css('display', 'block');
        });
        $('#sendBtn').on('click', function (e) {
            e.preventDefault();
            let msgValue = $('#msg-option').find('textarea').val();
            let data = {
                message: msgValue,
                shop_id: $('#msg-option').find('textarea').attr('shop-id'),
                seller_id: $('.msg-option').find('.seller_id').attr('seller-id'),
            }
            if (msgValue != '') {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: '<?php echo e(route('messages_store')); ?>',
                    data: data,
                    success: function (respons) {
                        console.log('send successfully');
                    }
                });
                $('#chatInputBox').val('');
                $('#msg-option').css('display', 'none');
                $('#contact-seller').find('.contact').attr('disabled', '');
                $('#seller_details').animate({'height': '125px'});
                $('#go_to_chatbox').css('display', 'block');
            } else {
                console.log('say something');
            }
        });
        $('#cancelBtn').on('click', function (e) {
            e.preventDefault();
            $('#seller_details').animate({'height': '114px'});
            $('#msg-option').css('display', 'none');
        });
    </script>

    <script type="text/javascript"
            src="https://platform-api.sharethis.com/js/sharethis.js#property=5f55f75bde227f0012147049&product=sticky-share-buttons"
            async="async"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bandbkmp/public_html/resources/views/web-views/products/details.blade.php ENDPATH**/ ?>