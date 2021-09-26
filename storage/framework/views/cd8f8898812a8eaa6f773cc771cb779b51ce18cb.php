<?php $__env->startSection('title','Seller View'); ?>
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
            <li class="breadcrumb-item" aria-current="page"><?php echo e(trans('messages.sellers_verification')); ?></li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="d-sm-flex row align-items-center justify-content-between mb-2">
        <div class="col-md-6"> 
             <h4 class=" mb-0 text-black-50"><?php echo e(trans('messages.sellers_verification')); ?></h4>
            </div>
      <div class="col-md-6 ">
        <?php if($seller->status=="pending"): ?>
        <div class="mt-4 pr-2 float-right">
            <div class="text-center">
                <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                    <input type="hidden" name="status" value="approved">
                    <button type="submit" class="btn btn-primary"><?php echo e(trans('messages.accept')); ?></button>
                </form>
                <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                    <input type="hidden" name="status" value="suspended">
                    <button type="submit" class="btn btn-danger"><?php echo e(trans('messages.reject')); ?></button>
                </form>
            </div>
        </div>
   
    <?php endif; ?>
</div>
    </div>

    <div class="row" >
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <?php echo e(trans('messages.Seller')); ?> <?php echo e(trans('messages.info')); ?>

                </div>
                <div class="card-body">
                    <h5><?php echo e(trans('messages.name')); ?> : <?php echo e($seller->f_name); ?> <?php echo e($seller->l_name); ?></h5>
                    <h5><?php echo e(trans('messages.Email')); ?> : <?php echo e($seller->email); ?></h5>
                    <h5><?php echo e(trans('messages.Phone')); ?> : <?php echo e($seller->phone); ?></h5>
                </div>
            </div>
        </div>
        <?php if($seller->shop): ?>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <?php echo e(trans('messages.Shop')); ?> <?php echo e(trans('messages.info')); ?>

                </div>
                <div class="card-body">
                    <h5><?php echo e(trans('messages.seller_b')); ?> : <?php echo e($seller->shop->name); ?></h5>
                    <h5><?php echo e(trans('messages.Phone')); ?> : <?php echo e($seller->shop->contact); ?></h5>
                    <h5><?php echo e(trans('messages.address')); ?> : <?php echo e($seller->shop->address); ?></h5>
                </div>
            </div>
        </div>
        <?php endif; ?>
    
     

    </div>
    <div class="row mt-3">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="h3 mb-0  "><?php echo e(trans('messages.my_bank_info')); ?> </h3>
                </div>
                <div class="card-body">
                    <div class="col-md-8 mt-4">
                        
                        <h4><?php echo e(trans('messages.bank_name')); ?>: <?php echo e($seller->bank_name ? $seller->bank_name : 'No Data found'); ?></h4>
                        <h6><?php echo e(trans('messages.Branch')); ?>  : <?php echo e($seller->branch ? $seller->branch : 'No Data found'); ?></h6>
                        <h6><?php echo e(trans('messages.holder_name')); ?> : <?php echo e($seller->holder_name ? $seller->holder_name : 'No Data found'); ?></h6>
                        <h6><?php echo e(trans('messages.account_no')); ?>  : <?php echo e($seller->account_no ? $seller->account_no : 'No Data found'); ?></h6>
                      

                       
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <!-- Page level plugins -->
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bandbkmp/public_html/resources/views/admin-views/seller/view.blade.php ENDPATH**/ ?>