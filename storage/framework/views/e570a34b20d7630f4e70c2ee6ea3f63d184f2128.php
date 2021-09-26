<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(!empty($product['product_id'])): ?>
        <?php ($product=$product->product); ?>
    <?php endif; ?>
    <div class="col-md-4 col-sm-6 px-3 mb-5">
        <?php if(!empty($product)): ?>
            <?php echo $__env->make('web-views.partials._single-product',['p'=>$product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <hr class="d-sm-none">
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/bandbkmp/public_html/resources/views/web-views/products/_ajax-products.blade.php ENDPATH**/ ?>