<?php $__env->startSection('title','FAQ'); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta property="og:image" content="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="og:title" content="FAQ of <?php echo e($web_config['name']->value); ?> "/>
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:description" content="<?php echo substr($web_config['about']->value,0,100); ?>">

    <meta property="twitter:card" content="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="twitter:title" content="FAQ of <?php echo e($web_config['name']->value); ?>"/>
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:description" content="<?php echo substr($web_config['about']->value,0,100); ?>">

    <style>
        .headerTitle {
            font-size: 25px;
            font-weight: 700;
            margin-top: 2rem;
        }

        body {
            font-family: 'Titillium Web', sans-serif
        }

        .product-qty span {
            font-size: 14px;
            color: #6A6A6A;
        }

        .btn-link {
            color: #4c5056e3;
        }

        .btnF {
            display: inline-block;
            font-weight: normal;
            margin-top: 4%;
            color: #4b566b;
            text-align: center;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            font-size: .9375rem;
            transition: color 0.25s ease-in-out, background-color 0.25s ease-in-out, border-color 0.25s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        @media (max-width: 600px) {
            .sidebar_heading {
                background: <?php echo e($web_config['primary_color']); ?>

            }

            .sidebar_heading h1 {
                text-align: center;
                color: aliceblue;
                padding-bottom: 17px;
                font-size: 19px;
            }

            .headerTitle {

                font-weight: 700;
                margin-top: 1rem;
            }
        }

    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Title-->
    <div class="container">
        <div class="row">
            <div class="col-md-12 sidebar_heading text-center mb-2">
                <h1 class="h3  mb-0 folot-left headerTitle"><?php echo e(trans('messages.frequently_asked_question')); ?></h1>
            </div>
        </div>
        <hr>
    </div>

    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 mt-3">
        <div class="row">   <!-- Sidebar-->
            <div class="col-lg-2"></div>
            <section class="col-lg-10 mt-3">
                <section class="container pt-4 pb-5 ">
                    <div class="row pt-4">
                        <div class="col-sm-6">
                            <ul class="list-unstyled">
                                <?php $length=count($helps); ?>
                                <?php if($length%2!=0){$first=($length+1)/2;}else{$first=$length/2;}?>
                                <?php for($i=0;$i<$first;$i++): ?>
                                    <li id="accordion">
                                        <h5 class="mb-0" style="color: black;">
                                            <i class="czi-book text-muted "></i>
                                            <button class="btnF btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapseTwo<?php echo e($helps[$i]['id']); ?>"
                                                    aria-expanded="false" aria-controls="collapseTwo">
                                    <li class="d-flex align-items-center border-bottom pb-3 mb-3"><?php echo e($helps[$i]['question']); ?></li>
                                    </button>
                                    </h5>
                                    <div id="collapseTwo<?php echo e($helps[$i]['id']); ?>" class="collapse"
                                         aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <?php echo e($helps[$i]['answer']); ?>

                                        </div>
                                    </div>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </div>
                        <div class="col-sm-6">

                            <ul class="list-unstyled">
                                <?php for($i=$first;$i<$length;$i++): ?>
                                    <div id="accordion">
                                        <h5 class="mb-0" style="color: black;">
                                            <i class="czi-book text-muted mr-2"></i>
                                            <button class="btnF btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapseTwo<?php echo e($helps[$i]['id']); ?>"
                                                    aria-expanded="false" aria-controls="collapseTwo">
                                                <li class="d-flex align-items-center border-bottom pb-3 mb-3"><?php echo e($helps[$i]['question']); ?></li>
                                            </button>
                                        </h5>
                                        <div id="collapseTwo<?php echo e($helps[$i]['id']); ?>" class="collapse"
                                             aria-labelledby="headingTwo" data-parent="#accordion">
                                            <div class="card-body">
                                                <?php echo e($helps[$i]['answer']); ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endfor; ?>

                            </ul>
                        </div>

                    </div>
                </section>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scipit'); ?>
$(document).on('click', '.delete', function () {
    var id = $(this).attr("id");
    Swal.fire({
        title: 'Are you sure delete this banner?',
        text: "You won't be able to revert this!",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.banner.delete')); ?>",
                method: 'POST',
                data: {id: id},
                success: function () {
                    toastr.success('Banner deleted successfully');
                    location.reload();
                }
            });
        }
    })
});

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bandbkmp/public_html/resources/views/web-views/help-topics.blade.php ENDPATH**/ ?>