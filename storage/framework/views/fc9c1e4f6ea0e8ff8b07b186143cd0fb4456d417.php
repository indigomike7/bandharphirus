<?php $__env->startSection('title','Product Add'); ?>
<?php $__env->startPush('css_or_js'); ?>
    <link href="<?php echo e(asset('public/assets/back-end/css/croppie.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/back-end/css/tags-input.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/select2/css/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/back-end/css/custom.css')); ?>" rel="stylesheet">
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
      .parcent-margin{
          margin-left: -20px;
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
        #product-images-modal .modal-content{
              width: 1116px !important;
            margin-left: -264px !important;
        }
        #thumbnail-image-modal .modal-content{
              width: 1116px !important;
            margin-left: -264px !important;
        }
        @media(max-width:768px){
            #product-images-modal .modal-content{
                width: 698px !important;
    margin-left: -75px !important;
        }

        #thumbnail-image-modal .modal-content{
            width: 698px !important;
    margin-left: -75px !important;
        }
        }
        @media(max-width:375px){
            #product-images-modal .modal-content{
              width: 367px !important;
            margin-left: 0 !important;
        }
        #thumbnail-image-modal .modal-content{
              width: 367px !important;
            margin-left: 0 !important;
        }
        }

   @media(max-width:500px){
    #product-images-modal .modal-content{
              width: 400px !important;
            margin-left: 0 !important;
        }
        #thumbnail-image-modal .modal-content{
              width: 400px !important;
            margin-left: 0 !important;
        }
        .btn-for-m{
            margin-bottom: 10px;
        }
       .parcent-margin{
           margin-left: 0px !important;
       }
   }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(trans('messages.Dashboard')); ?></a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('admin.product.list', 'in_house')); ?>"><?php echo e(trans('messages.Product')); ?></a>
            </li>
            <li class="breadcrumb-item"><?php echo e(trans('messages.Add')); ?> <?php echo e(trans('messages.New')); ?> </li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-black-50"><?php echo e(trans('messages.Product')); ?></h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <form class="product-form" action="<?php echo e(route('admin.product.store')); ?>" method="POST" enctype="multipart/form-data"
                  id="product_form">
                <?php echo csrf_field(); ?>
                <div class="card">
                    <div class="card-header">
                        <h4><?php echo e(trans('messages.General Info')); ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                                <label for="name">Collection</label>
								<select name="collection">
								<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>

                        </div>

                        <div class="form-group">
                            <label for="name"><?php echo e(trans('messages.Product Name')); ?></label>
                            <input type="text" name="name" class="form-control" id="name" value="<?php echo e(old('name')); ?>" placeholder="Ex : LUX" required>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="name"><?php echo e(trans('messages.Category')); ?></label>
                                    <select
                                        class="js-example-basic-multiple js-states js-example-responsive form-control"
                                        name="category_id"
                                        onchange="getRequest('<?php echo e(url('/')); ?>/admin/product/get-categories?parent_id='+this.value,'sub-category-select','select')" required>
                                        <option value="<?php echo e(old('category_id')); ?>" selected disabled>---Select---</option>
                                        <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($c['id']); ?>" <?php echo e(old('name')==$c['id']? 'selected': ''); ?>><?php echo e($c['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="name"><?php echo e(trans('messages.Sub Category')); ?></label>
                                    <select
                                        class="js-example-basic-multiple js-states js-example-responsive form-control"
                                        name="sub_category_id" id="sub-category-select"
                                        onchange="getRequest('<?php echo e(url('/')); ?>/admin/product/get-categories?parent_id='+this.value,'sub-sub-category-select','select')">
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="name"><?php echo e(trans('messages.Sub Sub Category')); ?></label>
                                    <select
                                        class="js-example-basic-multiple js-states js-example-responsive form-control"
                                        name="sub_sub_category_id" id="sub-sub-category-select">

                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name"><?php echo e(trans('messages.Brand')); ?></label>
                                    <select
                                        class="js-example-basic-multiple js-states js-example-responsive form-control"
                                        name="brand_id" required>
                                        <option value="<?php echo e(null); ?>" selected disabled>---Select---</option>
                                        <?php $__currentLoopData = $br; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($b['id']); ?>" ><?php echo e($b['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="name"><?php echo e(trans('messages.Unit')); ?></label>
                                    <select
                                        class="js-example-basic-multiple js-states js-example-responsive form-control"
                                        name="unit">
                                        <?php $__currentLoopData = \App\CPU\Helpers::units(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($x); ?>" <?php echo e(old('unit')==$x? 'selected':''); ?>><?php echo e($x); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        

                        
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-header">
                        <h4>Variations</h4>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="colors">
                                        <?php echo e(trans('messages.Colors')); ?> :
                                    </label>
                                    <label class="switch">
                                        <input type="checkbox" class="status" value="<?php echo e(old('colors_active')); ?>" name="colors_active">
                                        <span class="slider round"></span>
                                    </label>
                                    <select
                                        class="js-example-basic-multiple js-states js-example-responsive form-control color-var-select"
                                        name="colors[]" multiple="multiple" id="colors-selector" disabled>
                                        <?php $__currentLoopData = \App\Model\Color::orderBy('name', 'asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($color->code); ?>">
                                                <?php echo e($color['name']); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="attributes" style="padding-bottom: 3px">
                                        <?php echo e(trans('messages.Attributes')); ?> :
                                    </label>
                                    <select
                                        class="js-example-basic-multiple js-states js-example-responsive form-control"
                                        name="choice_attributes[]" id="choice_attributes" multiple="multiple">
                                        <?php $__currentLoopData = \App\Model\Attribute::orderBy('name', 'asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($a['id']); ?>">
                                                <?php echo e($a['name']); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="col-md-12 mt-2 mb-2">
                                    <div class="customer_choice_options" id="customer_choice_options"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-header">
                        <h4><?php echo e(trans('messages.Product price & stock')); ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label"><?php echo e(trans('messages.Unit price')); ?></label>
                                    <input type="number" min="0"  step="0.01"
                                           placeholder="<?php echo e(trans('messages.Unit price')); ?>"
                                           name="unit_price" value="<?php echo e(old('unit_price')); ?>" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label
                                        class="control-label"><?php echo e(trans('messages.Purchase price')); ?></label>
                                    <input type="number" min="0"  step="0.01"
                                           placeholder="<?php echo e(trans('messages.Purchase price')); ?>" value="<?php echo e(old('purchase_price')); ?>"
                                           name="purchase_price" class="form-control" required>
                                </div>
                            </div>
                            <div class="row pt-4">
                                <div class="col-md-6">
                                    <label class="control-label"><?php echo e(trans('messages.Tax')); ?></label>
                                    <label class="badge badge-info"><?php echo e(trans('messages.Percent')); ?> ( % )</label>
                                    <input type="number" min="0" value="0" step="0.01"
                                           placeholder="<?php echo e(trans('messages.Tax')); ?>}" name="tax" value="<?php echo e(old('tax')); ?>"
                                           class="form-control">
                                    <input name="tax_type" value="percent" style="display: none">
                                </div>

                                <div class="col-md-5">
                                    <label class="control-label"><?php echo e(trans('messages.Discount')); ?></label>
                                    <input type="number" min="0" value="<?php echo e(old('discount')); ?>" step="0.01"
                                           placeholder="<?php echo e(trans('messages.Discount')); ?>" name="discount"
                                           class="form-control">
                                </div>
                                <div class="col-md-1 parcent-margin" style="padding-top: 30px;">
                                    <select
                                        class="js-example-basic-multiple js-states js-example-responsive demo-select2"
                                        name="discount_type">
                                        <option value="flat"><?php echo e(trans('messages.Flat')); ?></option>
                                        <option value="percent"><?php echo e(trans('messages.Percent')); ?></option>
                                    </select>
                                </div> 
                                <div class="pt-4 col-12 sku_combination" id="sku_combination">

                                </div>
                                <div class="col-md-6" id="quantity">
                                    <label class="control-label"><?php echo e(trans('messages.total')); ?> <?php echo e(trans('messages.Quantity')); ?></label>
                                    <input type="number" min="0" value="0" step="1"
                                           placeholder="<?php echo e(trans('messages.Quantity')); ?>"
                                           name="current_stock" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-header">
                        <h4>Product Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="col-xl-12">
                                <textarea name="details" id="editor" cols="30" rows="10"><?php echo e(old('details')); ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label><?php echo e(trans('messages.Upload product images')); ?></label><small
                                        style="color: red">* ( <?php echo e(trans('messages.ratio')); ?> 1:1 )</small>
                                </div>
                                <div class="p-2 border border-dashed"  style="max-width:430px;">
                                    <div class="row" id="coba"></div>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name"><?php echo e(trans('messages.Upload thumbnail')); ?></label><small
                                        style="color: red">* ( <?php echo e(trans('messages.ratio')); ?> 1:1 )</small>
                                </div> 
                                <div style="max-width:200px;">
                                    <div class="row" id="thumbnail"></div>
                                </div>                                   
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12" style="padding-top: 20px">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/js/tags-input.min.js"></script>
    <script src="<?php echo e(asset('public/assets/select2/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/back-end/js/spartan-multi-image-picker.js')); ?>"></script>
    <script>
        $(function () {
            $("#coba").spartanMultiImagePicker({
                fieldName: 'images[]',
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

            $("#thumbnail").spartanMultiImagePicker({
                fieldName: 'image',
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

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileUpload").change(function () {
            readURL(this);
        });


        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            width: 'resolve'
        });
    </script>

    <script>
        function getRequest(route, id, type) {
            $.get({
                url: route,
                dataType: 'json',
                success: function (data) {
                    if (type == 'select') {
                        $('#' + id).empty().append(data.select_tag);
                    }
                },
            });
        }

        $('input[name="colors_active"]').on('change', function () {
            if (!$('input[name="colors_active"]').is(':checked')) {
                $('#colors-selector').prop('disabled', true);
            } else {
                $('#colors-selector').prop('disabled', false);
            }
        });

        $('#choice_attributes').on('change', function () {
            $('#customer_choice_options').html(null);
            $.each($("#choice_attributes option:selected"), function () {
                //console.log($(this).val());
                add_more_customer_choice_option($(this).val(), $(this).text());
            });
        });

        function add_more_customer_choice_option(i, name) {
            let n = name.split(' ').join('');
            $('#customer_choice_options').append('<div class="row"><div class="col-md-3"><input type="hidden" name="choice_no[]" value="' + i + '"><input type="text" class="form-control" name="choice[]" value="' + n + '" placeholder="<?php echo e(trans('Choice Title')); ?>" readonly></div><div class="col-lg-9"><input type="text" class="form-control" name="choice_options_' + i + '[]" placeholder="<?php echo e(trans('Enter choice values')); ?>" data-role="tagsinput" onchange="update_sku()"></div></div>');

            $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
        }


        $('#colors-selector').on('change', function () {
            update_sku();
        });

        $('input[name="unit_price"]').on('keyup', function () {
            update_sku();
        });

        function update_sku() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: '<?php echo e(route('admin.product.sku-combination')); ?>',
                data: $('#product_form').serialize(),
                success: function (data) {
                    $('#sku_combination').html(data.view);
                    if (data.length > 1) {
                        $('#quantity').hide();
                    } else {
                        $('#quantity').show();
                    }
                }
            });
        }

        $(document).ready(function () {
            // color select select2
            $('.color-var-select').select2({
                templateResult: colorCodeSelect,
                templateSelection: colorCodeSelect,
                escapeMarkup: function (m) {
                    return m;
                }
            });

            function colorCodeSelect(state) {
                var colorCode = $(state.element).val();
                if (!colorCode) return state.text;
                return "<span class='color-preview' style='background-color:" + colorCode + ";'></span>" + state.text;
            }
        });
    </script>
    <script>
        $('#product_form').submit(function (e) {
            e.preventDefault();
            for ( instance in CKEDITOR.instances ) {
                CKEDITOR.instances[instance].updateElement();
            }
            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '<?php echo e(route('admin.product.store')); ?>',
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
                        toastr.success('product added successfully!', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                        setInterval(function () {
                            location.href = '<?php echo e(route('admin.product.list', 'in_house')); ?>';
                        }, 2000);
                    }
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bandbkmp/public_html/resources/views/admin-views/product/add-new.blade.php ENDPATH**/ ?>