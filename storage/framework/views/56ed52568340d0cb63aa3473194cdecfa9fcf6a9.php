<?php $__env->startSection('title','Order List'); ?>

<?php $__env->startPush('css_or_js'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Heading -->
    <div class="content container-fluid">
        <div class="row align-items-center mb-3">
            <div class="col-sm">
                <h1 class="page-header-title"><?php echo e(trans('messages.contest')); ?> <span
                        class="badge badge-soft-dark ml-2"><?php echo e(\App\Model\Contest::where('seller_id',auth('seller')->id())->count()); ?></span>
                </h1>

            </div>
        </div>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>My Contest Lists</h5>
						<p style="text-align:right;"><a href="<?php echo e(route('seller.contest.add')); ?>">Add New Contest</a></p>
                    </div>
                    <div class="card-body" style="padding: 0">
                        <div class="table-responsive">
                            <table id="datatable"
                                   class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                                   style="width: 100%">
                                <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Created Date</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th style="width: 30px"><?php echo e(trans('messages.Action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $contest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($k+1); ?>

                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('seller.contest.detail',$detail['id'])); ?>"><?php echo e($detail['id']); ?></a>
                                        </td>
                                        <td><?php echo e($detail->name); ?></td>
                                        <td><?php echo e($detail->created_at); ?></td>
                                        <td><?php echo e($detail->start_date); ?></td>
                                        <td><?php echo e($detail->end_date); ?></td>
                                        <td>

                                            <div class="dropdown">
                                                <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="tio-settings"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item"
                                                       href="<?php echo e(route('seller.contest.edit',[$detail['id']])); ?>"> Edit</a>
                                                    <a class="dropdown-item"
                                                       href="<?php echo e(route('seller.contest.listmanage',[$detail['id']])); ?>"> Manage</a>
                                                    <a class="dropdown-item"
                                                       href="<?php echo e(route('seller.contest.delete',[$detail['id']])); ?>"> Delete</a>
                                                </div>
                                            </div>
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

    <!-- Page level custom scripts -->
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app-seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-php-8.0.8\htdocs\bandharphirus.com-newdesign-2021-08-06\resources\views/seller-views/contest/list.blade.php ENDPATH**/ ?>