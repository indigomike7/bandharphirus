<?php $__env->startSection('title','Seller List'); ?>
<?php $__env->startPush('css_or_js'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/back-end/css/croppie.css')); ?>" rel="stylesheet">

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(trans('messages.Dashboard')); ?></a></li>
            <li class="breadcrumb-item" aria-current="page"><?php echo e(trans('messages.Sellers')); ?></li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h4 class=" mb-0 text-black-50"><?php echo e(trans('messages.Sellers')); ?></h4>
    </div>

    <div class="row" >
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <?php echo e(trans('messages.seller_table')); ?>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th scope="col"><?php echo e(trans('messages.SL#')); ?></th>
                                <th scope="col"><?php echo e(trans('messages.name')); ?></th>
                                <th scope="col"><?php echo e(trans('messages.Phone')); ?></th>
                                <th scope="col"><?php echo e(trans('messages.Email')); ?></th>
                                <th scope="col"><?php echo e(trans('messages.status')); ?></th>
                                <th scope="col"><?php echo e(trans('messages.orders')); ?></th>
                                <th scope="col"><?php echo e(trans('messages.Products')); ?></th>
                                <th scope="col" style="width: 50px"><?php echo e(trans('messages.action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; ?>
                                <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td scope="col"><?php echo e($i++); ?></td>
                                        <td scope="col"><?php echo e($seller->f_name); ?> <?php echo e($seller->l_name); ?></td>
                                        <td scope="col"><?php echo e($seller->phone); ?></td>
                                        <td scope="col"><?php echo e($seller->email); ?></td>
                                        <td scope="col"><?php echo e($seller->status); ?></td>
                                        <td scope="col">
                                            <a href="<?php echo e(route('admin.sellers.order-list',[$seller['id']])); ?>" class="btn btn-outline-primary btn-block">
                                                <i class="tio-shopping-cart-outlined"></i>( <?php echo e($seller->orders->count()); ?> )
                                            </a>
                                        </td>
                                        <td scope="col">
                                            <a href="<?php echo e(route('admin.sellers.product-list',[$seller['id']])); ?>" class="btn btn-outline-primary btn-block">
                                                <i class="tio-premium-outlined mr-1"></i>( <?php echo e($seller->product->count()); ?> )
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="<?php echo e(route('admin.sellers.verification',$seller->id)); ?>">
                                                <?php echo e(trans('messages.View')); ?>

                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <!-- Page level plugins -->
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bandbkmp/public_html/resources/views/admin-views/seller/index.blade.php ENDPATH**/ ?>