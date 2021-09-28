<?php $__env->startSection('title','Join List'); ?>

<?php $__env->startPush('css_or_js'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/back-end/css/croppie.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/back-end/css/tags-input.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/select2/css/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/back-end/css/custom.css')); ?>" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<script src="<?php echo e(asset('public/assets/back-end')); ?>/js/vendor.min.js"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Heading -->
    <div class="container for-container">
        <div class="row align-items-center mb-3">
            <div class="col-sm">
                <h1 class="page-header-title"><?php echo e(trans('messages.contest')); ?> <span
                        class="badge badge-soft-dark ml-2"><?php echo e(\App\Model\Contest::where('seller_id',auth('seller')->id())->count()); ?></span>
                </h1>

            </div>
        </div>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h5>My Joined Contest Lists</h5>
						<p style="text-align:right;">Let's Join Luck in Contest</p>
                    </div>
                    <div class="card-body" style="padding: 0">
                        <div class="table-responsive">
                            <table id="datatable"
                                   class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                                   style="width: 100%">
                                <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Kontes</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $contest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php (
								        $contestuser2 = $contestuser->where("user_id","=",auth('customer')->id())->where("contest_id","=",$detail->id)->first()

								); ?>
                                    <tr>
                                        <td valign="top">
                                            <?php echo e($k+1); ?>

                                        </td>
                                        <td>
										<!--
										<?php if(!empty($contestuser2)): ?>
											<h4><font color='blue'>Sudah Ikut Serta</font></h4>
										<?php endif; ?>-->
                                        ID : <?php echo e($detail->id); ?><br/>
										Name : <?php echo e($detail->name); ?><br/>
										Tanggal Dibuat :<?php echo e($detail->created_at); ?><br/>
										Tanggal Kontes Dimulai : <?php echo e($detail->start_date); ?><br/>
										Tanggal Kontes Selesai :<?php echo e($detail->end_date); ?><br/><br/>
										<?php if($detail['picture']!=null): ?>
										<?php $__currentLoopData = json_decode($detail['picture']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
											<img src="<?php echo e(asset('storage/app/public/contest/'.$image)); ?>" alt="Contest image" style="width:70%">
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
										<div style="text-align:justify;">
										<?php echo e($detail->description); ?>

										</div>
										<!--<?php if(!empty($contestuser2)): ?>
											<h4><font color='blue'>Sudah Ikut Serta</font></h4>
										<?php endif; ?>
										
										<form class="product-form-<?php echo e($detail->id); ?>" action="<?php echo e(route('contest3.join')); ?>" method="post" enctype="multipart/form-data"
											  id="product-form-<?php echo e($detail->id); ?>"><?php echo csrf_field(); ?>
                            <div class="form-group">
								<input type="hidden" name="contest-name-<?php echo e($detail->id); ?>" id="contest-name-<?php echo e($detail->id); ?>" value="<?php echo e($detail->name); ?>">
                                <label for="name">Jawaban</label>
								<input type="hidden" name="id" value="<?php echo e($detail->id); ?>">
                                <textarea name="answer-<?php echo e($detail->id); ?>" value="<?php echo e(old('answer')); ?>" class="form-control" id="answer-<?php echo e($detail->id); ?>" style="width:50%;">
									<?php if(!empty($contestuser2)): ?>
									<?php echo e($contestuser2->answer); ?>

									<?php endif; ?>
								</textarea><br/>
									<?php if(!empty($detail->result)): ?>
									<img src="<?php echo e(asset('public/assets/images')); ?>/congratulation.jpg"  class="img-fluid">
								<h5>Result : </h5><br/>
									<?php echo e($detail->result); ?>

									<?php endif; ?>
								</textarea>
                            </div>
                                <div class="p-2 border border-dashed"  style="max-width:430px;">
                                    <div class="row" id="coba-<?php echo e($detail->id); ?>">
									<?php if(!empty($contestuser2)): ?>
									<?php if($contestuser2->picture!=null): ?>
                                    <?php $__currentLoopData = json_decode($contestuser2->picture); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <img style="width: 100%" height="auto"
                                                            onerror=""
                                                            src="<?php echo e(asset('storage/app/public/contest/'.$photo)); ?>" alt="Product image">
                                                        <a href="<?php echo e(route('contest3.remove_image_user',['id'=>$detail->id,'image'=>$photo])); ?>"
                                                        class="btn btn-danger btn-block">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
									<?php endif; ?>
                                    </div>
                                </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12" style="padding-top: 20px">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
										</form>-->
    <script>
        $('#product-form-<?php echo e($detail->id); ?>').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '<?php echo e(route("contest3.join")); ?>',
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.errors) {
                        for (var i = 0; i < data.errors.length; i++) {
                            toastr.error(data.errors[i].message, {
                                CloseButton: true,
                                ProgressBar: true
                            });
                        }
                    } else {
						alert("Anda sukses mengikuti kontes " + $("#contest-name-<?php echo e($detail->id); ?>").val());
                        toastr.success('Contest Joined successfully!', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                        setInterval(function () {
                            location.href = '<?php echo e(route('contest3.listjoin')); ?>';
                        }, 2000);
                    }
                }
            });
        });
        $(function () {
            $("#coba-<?php echo e($detail->id); ?>").spartanMultiImagePicker({
                fieldName: 'images-<?php echo e($detail->id); ?>[]',
                maxCount: 4,
                rowHeight: 'auto',
                groupClassName: 'col-6',
                maxFileSize: '',
                placeholderImage: {
                    image: '<?php echo e(asset('public/assets/back-end/img/400x400/img2.jpg')); ?>',
                    width: '100%',
                },
                dropFileLabel: "Drop Here",
                onAddRow: function (index, file) {

                },
                onRenderedPreview: function (index) {

                },
                onRemoveRow: function (index) {

                },
                onExtensionErr: function (index, file) {
                    toastr.error('Please only input png or jpg type file', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                },
                onSizeErr: function (index, file) {
                    toastr.error('File size too big', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });

            $("#thumbnail-<?php echo e($detail->id); ?>").spartanMultiImagePicker({
                fieldName: 'image-<?php echo e($detail->id); ?>',
                maxCount: 1,
                rowHeight: 'auto',
                groupClassName: 'col-12',
                maxFileSize: '',
                placeholderImage: {
                    image: '<?php echo e(asset('public/assets/back-end/img/400x400/img2.jpg')); ?>',
                    width: '100%',
                },
                dropFileLabel: "Drop Here",
                onAddRow: function (index, file) {

                },
                onRenderedPreview: function (index) {

                },
                onRemoveRow: function (index) {

                },
                onExtensionErr: function (index, file) {
                    toastr.error('Please only input png or jpg type file', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                },
                onSizeErr: function (index, file) {
                    toastr.error('File size too big', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        });
    </script>
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
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/js/tags-input.min.js"></script>
    <script src="<?php echo e(asset('public/assets/select2/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/back-end/js/spartan-multi-image-picker.js')); ?>"></script>

    <!-- Page level custom scripts -->
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
	<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bandbkmp/public_html/resources/views/web-views/contest/listjoin.blade.php ENDPATH**/ ?>