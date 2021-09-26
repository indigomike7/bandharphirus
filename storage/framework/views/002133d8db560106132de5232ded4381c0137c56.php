<?php $__env->startSection('title','Add Shipping'); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 48px;
            height: 23px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #377dff;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #377dff;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('seller.dashboard')); ?>"><?php echo e(trans('messages.Dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><?php echo e(trans('messages.business_settings')); ?></li>
                <li class="breadcrumb-item"><?php echo e(trans('messages.update')); ?></li>
            </ol>
        </nav>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-black-50"><?php echo e(trans('messages.shipping_method')); ?></h1>
        </div>

        <!-- Content Row -->
        <div class="row pt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <?php echo e(trans('messages.shipping_method')); ?> <?php echo e(trans('messages.form')); ?>

                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('seller.business-settings.shipping-method.add')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="title"><?php echo e(trans('messages.title')); ?></label>
                                        <input type="text" name="title" class="form-control" placeholder="">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="duration"><?php echo e(trans('messages.duration')); ?></label>
                                        <input type="text" name="duration" class="form-control"
                                               placeholder="Ex : 4-6 days">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="cost"><?php echo e(trans('messages.cost')); ?></label>
                                        <input type="text" name="cost" class="form-control" placeholder="Ex : 10 $">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer" style="padding-left: 0">
                                <button type="submit" class="btn btn-primary"><?php echo e(trans('messages.Submit')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(trans('messages.shipping_method')); ?> <?php echo e(trans('messages.table')); ?></h5>
                    </div>
                    <div class="card-body">
                        <table id="datatable"
                               class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                               style="width: 100%">
                            <thead class="thead-light">
                            <tr>
                                <th><?php echo e(trans('messages.sl#')); ?></th>
                                <th><?php echo e(trans('messages.title')); ?></th>
                                <th><?php echo e(trans('messages.duration')); ?></th>
                                <th><?php echo e(trans('messages.cost')); ?></th>
                                <th><?php echo e(trans('messages.status')); ?></th>
                                <th style="width: 50px"><?php echo e(trans('messages.action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $shipping_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($k+1); ?></th>
                                    <td><?php echo e($method['title']); ?></td>
                                    <td>
                                        <?php echo e($method['duration']); ?>

                                    </td>
                                    <td>
                                        <?php echo e(\App\CPU\BackEndHelper::usd_to_currency($method['cost'])); ?>

                                    </td>

                                    <td>
                                        <div>
                                            <label class="switch">
                                                <input type="checkbox" class="status" id="<?php echo e($method['id']); ?>" <?php echo e($method->status == 1?'checked':''); ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </td>

                                    <td style="display: flex; width:100%;">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                <i class="tio-settings"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item"
                                                   href="<?php echo e(route('seller.business-settings.shipping-method.edit',[$method['id']])); ?>"><?php echo e(trans('messages.Edit')); ?></a>
                                                <a class="dropdown-item" href="javascript:"
                                                   onclick="form_alert('product-<?php echo e($method['id']); ?>','Want to delete this item ?')"><?php echo e(trans('messages.Delete')); ?></a>
                                                <form
                                                    action="<?php echo e(route('seller.business-settings.shipping-method.delete',[$method['id']])); ?>"
                                                    method="post" id="product-<?php echo e($method['id']); ?>">
                                                    <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                                </form>
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

    <script>
        $(document).on('change', '.status', function () {
            var id = $(this).attr("id");
            if ($(this).prop("checked") == true) {
                var status = 1;
            } else if ($(this).prop("checked") == false) {
                var status = 0;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('seller.business-settings.shipping-method.status-update')); ?>",
                method: 'POST',
                data: {
                    id: id,
                    status: status
                },
                success: function () {
                    toastr.success('Status updated successfully');
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app-seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bandbkmp/public_html/resources/views/seller-views/shipping-method/add-new.blade.php ENDPATH**/ ?>