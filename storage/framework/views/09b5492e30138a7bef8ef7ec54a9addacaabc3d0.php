<style>
    .product {
        background-color: #fcfcfc;
        border: 2px solid #efefef;
        margin-bottom: 10px;
    }

    .product_pic {
        width: 40%;
    }

    .product_details {
        width: 60%;
        padding: 5px;
    }

    .image_center {
        height: 126px;
    }

    .image_center img {
        min-width: 100px;
        vertical-align: middle;
    }

    .product-title {
        position: relative;
    }

    .product-title > a{
        color: #373f50;
    }
    .star-rating > i{
        font-size: 8px!important;
    }

    .ptr1 {
        position: relative;
        display: inline-block;
        word-wrap: break-word;
        overflow: hidden;
        max-height: 2.4em; /* (Number of lines you want visible) * (line-height) */
        line-height: 1.2em;
        /*text-align:justify;*/
    }

    .ptr {
        font-weight: 600;
        font-size: 16px !important;
    }

    .inline_product_image {
        height: 100px;
    }

    .ptp {
        font-weight: 700;
        font-size: 16px !important;
    }
    .star-rating .sr-star{
        margin: 0!important;
    }

    @media (max-width: 768px) {
        .product_pic {
            width: 200px !important;
        }

        .product {
            margin-right: 16px;
        }

        .product_details {
            width: 100% !important;
        }
    }


</style>
<div class="d-flex product justify-content-between inline_product" style="cursor: pointer;"
     data-href="<?php echo e(route('product',$product->slug)); ?>">
    <div class="product_pic d-flex align-items-center justify-content-center" style=" text-align: center;">
        <a href="<?php echo e(route('product',$product->slug)); ?>" class="image_center">
            <img class="inline_product_image"
                 onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                 src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($product['thumbnail']); ?>" width="100%" style="height: 100%;">
        </a>
    </div>
    <div class="product_details">
        <h3 class="product-title">
            <a class="ptr ptr1" href="<?php echo e(route('product',$product->slug)); ?>"><?php echo e($product['name']); ?></a>
        </h3>
        <?php ($overallRating=\App\CPU\ProductManager::get_overall_rating($product->reviews)); ?>
        <h6 class="ptr">
            <span class="d-inline-block text-body align-middle mt-1 mr-2"
                  style="color: #fea96e !important; font-size: 10px!important;"><?php echo e($overallRating[0]); ?> </span>
            <span class="star-rating">
                    <?php if(round($overallRating[0])==5): ?>
                    <?php for($i = 0; $i < 5; $i++): ?>
                        <i class="sr-star czi-star-filled active"></i>
                    <?php endfor; ?>
                <?php endif; ?>
                <?php if(round($overallRating[0])==4): ?>
                    <?php for($i = 0; $i < 4; $i++): ?>
                        <i class="sr-star czi-star-filled active"></i>
                    <?php endfor; ?>
                    <i class="sr-star czi-star"></i>
                <?php endif; ?>
                <?php if(round($overallRating[0])==3): ?>
                    <?php for($i = 0; $i < 3; $i++): ?>
                        <i class="sr-star czi-star-filled active"></i>
                    <?php endfor; ?>
                    <?php for($j = 0; $j < 2; $j++): ?>
                        <i class="sr-star czi-star"></i>
                    <?php endfor; ?>
                <?php endif; ?>
                <?php if(round($overallRating[0])==2): ?>
                    <?php for($i = 0; $i < 2; $i++): ?>
                        <i class="sr-star czi-star-filled active"></i>
                    <?php endfor; ?>
                    <?php for($j = 0; $j < 3; $j++): ?>
                        <i class="sr-star czi-star"></i>
                    <?php endfor; ?>
                <?php endif; ?>
                <?php if(round($overallRating[0])==1): ?>
                    <?php for($i = 0; $i < 4; $i++): ?>
                        <i class="sr-star czi-star-filled active"></i>
                    <?php endfor; ?>
                    <i class="sr-star czi-star"></i>
                <?php endif; ?>
                <?php if(round($overallRating[0])==0): ?>
                    <?php for($i = 0; $i < 5; $i++): ?>
                        <i class="sr-star czi-star"></i>
                    <?php endfor; ?>
                <?php endif; ?>
            </span>
        </h6>
        <div class="product-price">
            <span class="text-accent ptp">
            <?php echo e(\App\CPU\Helpers::currency_converter(
            $product->unit_price-(\App\CPU\Helpers::get_product_discount($product,$product->unit_price))
            )); ?>

            </span>
            <?php if($product->discount > 0): ?>
                <strike style="font-size: 12px!important;color: grey!important;">
                    <?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price)); ?>

                </strike>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php /**PATH D:\xampp-php-8.0.8\htdocs\bandharphirus.com-newdesign-2021-08-06\resources\views/web-views/partials/_inline-single-product.blade.php ENDPATH**/ ?>