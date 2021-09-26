<?php $__env->startSection('title','Bandk Info View'); ?>
<?php $__env->startPush('css_or_js'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('seller.dashboard')); ?>"><?php echo e(trans('messages.Dashboard')); ?></a></li>
                <li class="breadcrumb-item" aria-current="page"><?php echo e(trans('messages.seller')); ?></li>
                <li class="breadcrumb-item"><?php echo e(trans('messages.my_bank_info')); ?></li>
            </ol>
        </nav>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-black-50"><?php echo e(trans('messages.my_bank_info')); ?></h1>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h3 mb-0  "><?php echo e(trans('messages.my_bank_info')); ?>  </h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-8 mt-4">
                            <h4><?php echo e(trans('messages.bank_name')); ?>

                                : <?php echo e($data->bank_name ? $data->bank_name : 'No Data found'); ?></h4>
                            <h6><?php echo e(trans('messages.Branch')); ?> : <?php echo e($data->branch ? $data->branch : 'No Data found'); ?></h6>
                            <h6><?php echo e(trans('messages.holder_name')); ?>

                                : <?php echo e($data->holder_name ? $data->holder_name : 'No Data found'); ?></h6>
                            <h6><?php echo e(trans('messages.account_no')); ?>

                                : <?php echo e($data->account_no ? $data->account_no : 'No Data found'); ?></h6>


                            <a class="btn btn-primary"
                               href="<?php echo e(route('seller.profile.bankInfo',[$data->id])); ?>"><?php echo e(trans('messages.Edit')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <!-- Page level plugins -->
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app-seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bandbkmp/public_html/resources/views/seller-views/profile/view.blade.php ENDPATH**/ ?>