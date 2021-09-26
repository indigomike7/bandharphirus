<?php ($overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews)); ?>

<div class="product-card card ">

    <div class="card-header inline_product" style="cursor: pointer;"
         data-href="<?php echo e(route('product',$product->slug)); ?>">
        <?php if($product->discount > 0): ?>
            <div class="d-flex justify-content-end for-dicount-div discount-hed"> <span class="for-discoutn-value">
                    <?php if($product->discount_type == 'percent'): ?>
                        <?php echo e(round($product->discount,2)); ?>%
                    <?php elseif($product->discount_type =='flat'): ?>
                        <?php echo e(\App\CPU\Helpers::currency_converter($product->discount)); ?>

                    <?php endif; ?>
                    
            OFF</span></div>
        <?php else: ?>
            <div class="d-flex justify-content-end for-dicount-div-null"> <span class="for-discoutn-value-null">
                </span></div>
        <?php endif; ?>
        <div class="d-flex align-items-center justify-content-center"><a class="d-block"
                                                                         href="<?php echo e(route('product',$product->slug)); ?>">
                <img src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($product['thumbnail']); ?>"
                     onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                     style="height: 180px;">
            </a>
        </div>
    </div>
    <div class="card-body py-2 inline_product" style="cursor: pointer;" data-href="<?php echo e(route('product',$product->slug)); ?>">
        <div style="position: relative;">
            <a class="product-title1" href="<?php echo e(route('product',$product->slug)); ?>"><?php echo e($product['name']); ?></a>
        </div>
        <div class="d-flex justify-content-between">
            <div class="product-price">
                <span class="text-accent">
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
            <div style="margin-top: -4px;" class="product-title">
                <span
                    class="d-inline-block font-size-sm text-body align-middle mt-1 ml-1 "><?php echo e($overallRating[0]); ?></span>
                <span class="star-rating"> <i class="sr-star czi-star-filled active"></i></span>
            </div>
        </div>
    </div>

    <div class="card-body card-body-hidden">
        <div class="text-center">
            <?php if(Request::is('product/*')): ?>
                <a class="btn btn-primary btn-sm btn-block mb-2" href="<?php echo e(route('product',$product->slug)); ?>">
                    <i class="czi-forward align-middle mr-1"></i>
                    <?php echo e(trans('messages.View')); ?>

                </a>
            <?php else: ?>
                <a class="btn btn-primary btn-sm btn-block mb-2" href="javascript:"
                   onclick="quickView('<?php echo e($product->id); ?>')">
                    <i class="czi-eye align-middle mr-1"></i>
                    <?php echo e(trans('messages.Quick')); ?>   <?php echo e(trans('messages.View')); ?>

                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php /**PATH /home/bandbkmp/public_html/resources/views/web-views/partials/_single-product.blade.php ENDPATH**/ ?>