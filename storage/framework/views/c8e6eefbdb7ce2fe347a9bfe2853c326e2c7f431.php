<?php $__env->startSection('title','Edit My Barter'); ?>

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

        input:checked + .slider {
            background-color: #4af3ce;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #60f3ca;
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
                <li class="breadcrumb-item"><a href="<?php echo e(route('seller.dashboard')); ?>">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('admin.barter.list')); ?>">Barter</a></li>
                <li class="breadcrumb-item">Edit</li>
            </ol>
        </nav>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-black-50">Edit My Barter</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">

                <form class="product-form" action="<?php echo e(route('admin.barter.updatebarter')); ?>" method="post" enctype="multipart/form-data"
                      id="product_form">
                    <?php echo csrf_field(); ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit My Barter</h4>
                        </div>
                      <div class="card-body">
						<input type="hidden" name="id" id="id" value="<?php echo e($b->id); ?>">
                            <div class="form-group">
                                <label for="name">Barter ID : </label>
								<?php echo e($b->id); ?>

                            </div>
                            <div class="form-group">
                                <label for="name">Barter Category</label>
								<select name="category">
								<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($value->id); ?>" <?php echo e(($value->id==$b->category) ? " selected='selected' " : ""); ?>><?php echo e($value->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12" style="padding-top: 20px">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
							</form>
							BARTER IN DB #<br>
							PRODUCT TO BARTER ##
							<?php $__currentLoopData = $bs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<form action="<?php echo e(route('admin.barter.editproductsell')); ?>" method="post" enctype="multipart/form-data"
                      id="product_form_edit<?php echo e($value->id); ?>">
							  <input type="hidden" name="id" value="<?php echo e($value->id); ?>">
								<div class="form-group">
										<label for="name">Product Name</label>
										<input type="text" name="product_name" value="<?php echo e($value->product_name); ?>" class="form-control" id="product_name" placeholder="Ex : Batu Phirus">
								</div>

								<div class="form-group">
									<label for="name">Quantity</label>
									<input type="number" name="quantity" value="<?php echo e($value->quantity); ?>" class="form-control" id="quantity" placeholder="2">
								</div>
								<div class="form-group">
									<label for="name">Description</label>
									<textarea name="description" class="form-control" id="description" >
									<?php echo e($value->description); ?>

									</textarea>
								</div>
								<div class="form-group">
									<label>Upload Image</label><small style="color: red">* </small>
									</div>
									<div  class="p-2 border border-dashed"  style="max-width:430px;">'
									<div class="row" id="cobadb<?php echo e($value->id); ?>" name="cobadb<?php echo e($value->id); ?>"></div>
									<?php if($value->picture!=null): ?>
                                    <?php $__currentLoopData = json_decode($value->picture); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <img style="width: 100%" height="auto"
                                                            onerror=""
                                                            src="<?php echo e(asset('storage/app/public/barter/'.$photo)); ?>" alt="Product image">
                                                        <a href="<?php echo e(route('admin.barter.remove_image_sell',['id'=>$value['id'],'image'=>$photo])); ?>"
                                                        class="btn btn-danger btn-block">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
									</div>
									<script type="text/javascript">
											$(function () {
												$("#cobadb<?php echo e($value->id); ?>").spartanMultiImagePicker({
													fieldName: 'imagesdb<?php echo e($value->id); ?>[]',
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


											});
									</script>
									<script>
										$('#product_form_edit<?php echo e($value->id); ?>').submit(function (e) {
											e.preventDefault();
											e.stopImmediatePropagation();
											for ( instance in CKEDITOR.instances ) {
												CKEDITOR.instances[instance].updateElement();
											}
											var formData = new FormData(this);
											$.ajaxSetup({
												headers: {
													'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
												}
											});
											$.post({
												url: '<?php echo e(route('admin.barter.editproductsell')); ?>',
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
														toastr.success('Barter Product Updated successfully!', {
															CloseButton: true,
															ProgressBar: true
														});
														setInterval(function () {
															location.href = '<?php echo e(route("admin.barter.edit",[$value->barter_id])); ?>';
														}, 2000);
													}
												}
											});
											e.stopImmediatePropagation();
											return false;
										});
									</script>
								<div class="form-group">
									<div class="row">
										<div class="col-md-12" style="padding-top: 20px">
											<button type="submit" class="btn btn-primary">UPDATE PRODUCT BARTER</button>
										</div>
									</div>
								</div>
							</form>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

							BARTER IN DB #<br>
							PRODUCT IN DEMAND ##
							<?php $__currentLoopData = $bb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<form action="<?php echo e(route('admin.barter.editproductsell')); ?>" method="post" enctype="multipart/form-data"
                      id="product_form_edit_buy<?php echo e($value->id); ?>">
							  <input type="hidden" name="id" value="<?php echo e($value->id); ?>">
								<div class="form-group">
										<label for="name">Product Name</label>
										<input type="text" name="product_name" value="<?php echo e($value->product_name); ?>" class="form-control" id="product_name" placeholder="Ex : Batu Phirus">
								</div>

								<div class="form-group">
									<label for="name">Quantity</label>
									<input type="number" name="quantity" value="<?php echo e($value->quantity); ?>" class="form-control" id="quantity" placeholder="2">
								</div>
								<div class="form-group">
									<label for="name">Description</label>
									<textarea name="description" class="form-control" id="description" >
									<?php echo e($value->description); ?>

									</textarea>
								</div>
								<div class="form-group">
									<label>Upload Image</label><small style="color: red">* </small>
									</div>
									<div  class="p-2 border border-dashed"  style="max-width:430px;">'
									<div class="row" id="cobadbbuy<?php echo e($value->id); ?>" name="cobadb<?php echo e($value->id); ?>"></div>
									<?php if($value->picture!=null): ?>
                                    <?php $__currentLoopData = json_decode($value->picture); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <img style="width: 100%" height="auto"
                                                            onerror=""
                                                            src="<?php echo e(asset('storage/app/public/barter/'.$photo)); ?>" alt="Product image">
                                                        <a href="<?php echo e(route('admin.barter.remove_image_buy',['id'=>$value['id'],'image'=>$photo])); ?>"
                                                        class="btn btn-danger btn-block">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
									</div>
									<script type="text/javascript">
											$(function () {
												$("#cobadbbuy<?php echo e($value->id); ?>").spartanMultiImagePicker({
													fieldName: 'imagesdbbuy<?php echo e($value->id); ?>[]',
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


											});
									</script>
									<script>
										$('#product_form_edit_buy<?php echo e($value->id); ?>').submit(function (e) {
											e.preventDefault();
											e.stopImmediatePropagation();
											for ( instance in CKEDITOR.instances ) {
												CKEDITOR.instances[instance].updateElement();
											}
											var formData = new FormData(this);
											$.ajaxSetup({
												headers: {
													'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
												}
											});
											$.post({
												url: '<?php echo e(route('admin.barter.editproductbuy')); ?>',
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
														toastr.success('Demand Product Updated successfully!', {
															CloseButton: true,
															ProgressBar: true
														});
														setInterval(function () {
															location.href = '<?php echo e(route("admin.barter.edit",[$value->barter_id])); ?>';
														}, 2000);
													}
												}
											});
											e.stopImmediatePropagation();
											return false;
										});
									</script>
								<div class="form-group">
									<div class="row">
										<div class="col-md-12" style="padding-top: 20px">
											<button type="submit" class="btn btn-primary">UPDATE PRODUCT DEMAND</button>
										</div>
									</div>
								</div>
							</form>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

							<?php if(count($bms)>0): ?>
							<?php $__currentLoopData = $bms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<form action="<?php echo e(route('admin.barter.updateamountsell')); ?>" method="post" enctype="multipart/form-data"
                      id="amount_sell_edit<?php echo e($value->id); ?>">
							  <input type="hidden" name="id" value="<?php echo e($b->id); ?>">
								<div class="form-group">
									<label for="name">Amount Sell</label>
									<input type="number" name="amount_sell" value="<?php echo e($value->amount); ?>" class="form-control" id="amount_sell" placeholder="2">
								</div>
									<script>
										$('#amount_sell_edit<?php echo e($value->id); ?>').submit(function (e) {
											e.preventDefault();
											e.stopImmediatePropagation();
											for ( instance in CKEDITOR.instances ) {
												CKEDITOR.instances[instance].updateElement();
											}
											var formData = new FormData(this);
											$.ajaxSetup({
												headers: {
													'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
												}
											});
											$.post({
												url: '<?php echo e(route('admin.barter.updateamountsell')); ?>',
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
														toastr.success('Barter Amount Updated successfully!', {
															CloseButton: true,
															ProgressBar: true
														});
														setInterval(function () {
															location.href = '<?php echo e(route("admin.barter.edit",[$value->barter_id])); ?>';
														}, 2000);
													}
												}
											});
											e.stopImmediatePropagation();
											return false;
										});
									</script>
								<div class="form-group">
									<div class="row">
										<div class="col-md-12" style="padding-top: 20px">
											<button type="submit" class="btn btn-primary">UPDATE AMOUNT SELL</button>
										</div>
									</div>
								</div>
							</form>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>

							<?php if(count($bmb)>0): ?>
							<?php $__currentLoopData = $bmb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<form action="<?php echo e(route('admin.barter.updateamountbuy')); ?>" method="post" enctype="multipart/form-data"
                      id="amount_buy_edit<?php echo e($value->id); ?>">
							  <input type="hidden" name="id" value="<?php echo e($b->id); ?>">
								<div class="form-group">
									<label for="name">Amount Buy</label>
									<input type="number" name="amount_buy" value="<?php echo e($value->amount); ?>" class="form-control" id="amount_buy" placeholder="2">
								</div>
									<script>
										$('#amount_buy_edit<?php echo e($value->id); ?>').submit(function (e) {
											e.preventDefault();
											e.stopImmediatePropagation();
											for ( instance in CKEDITOR.instances ) {
												CKEDITOR.instances[instance].updateElement();
											}
											var formData = new FormData(this);
											$.ajaxSetup({
												headers: {
													'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
												}
											});
											$.post({
												url: '<?php echo e(route('admin.barter.updateamountbuy')); ?>',
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
														toastr.success('Demand Amount Updated successfully!', {
															CloseButton: true,
															ProgressBar: true
														});
														setInterval(function () {
															location.href = '<?php echo e(route("admin.barter.edit",[$value->barter_id])); ?>';
														}, 2000);
													}
												}
											});
											e.stopImmediatePropagation();
											return false;
										});
									</script>
								<div class="form-group">
									<div class="row">
										<div class="col-md-12" style="padding-top: 20px">
											<button type="submit" class="btn btn-primary">UPDATE AMOUNT DEMAND</button>
										</div>
									</div>
								</div>
							</form>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>

                        </div>
                    </div>

                </form>
				                <form class="product-form" action="<?php echo e(route('admin.barter.updateproducts')); ?>" method="post" enctype="multipart/form-data"
                      id="product_updates">
					  <input type="hidden" name="id" value="<?php echo e($b->id); ?>">
						<input type="hidden" name="counter" id="counter" value="1">
						<input type="hidden" name="counterbuy" id="counterbuy" value="1">
                    <?php echo csrf_field(); ?>

<script type="text/javascript">
function addsell()
{
	var html='<div id="divbarter' + $("#counter").val() + '"><br/><br><br><a href="javascript:closebarter(' + $("#counter").val() + ')">Delete this Product</a><br>Product to Barter<br><br>'
				+'	<div class="form-group">'
				+'		<label for="name">Product Name</label>'
				+'		<input type="text" name="product_name' + $("#counter").val() + '" value="" class="form-control" id="product_name' + $("#counter").val() + '" placeholder="Ex : Batu Phirus">'
				+'	</div>'

				+'	<div class="form-group">'
				+'		<label for="name">Quantity</label>'
				+'		<input type="number" name="quantity' + $("#counter").val() + '" value="" class="form-control" id="quantity' + $("#counter").val() + '" placeholder="2">'
				+'	</div>'
				+'	<div class="form-group">'
				+'		<label for="name">Description</label>'
				+'		<textarea name="description' + $("#counter").val() + '" value="" class="form-control" id="description' + $("#counter").val() + '" >'
				+'		</textarea>'
				+'	</div>'
                 +'                   <div class="form-group">'
                 +'                       <label>Upload Image</label><small '
                 +'                           style="color: red">* </small>'
                 +'                   </div>'
                 +'                  <div  class="p-2 border border-dashed"  style="max-width:430px;">'
                 +'                       <div class="row" id="coba' + $("#counter").val() + '" name="coba' + $("#counter").val() + '"></div>'
                 +'                   </div>'
	+'</div>';
	var js=''
    +'<script>'
    +'        $("#coba'+$("#counter").val()+'").spartanMultiImagePicker({'
    +'            fieldName: "images'+$("#counter").val()+'[]",'
    +'            maxCount: 4,'
    +'            rowHeight: "auto",'
    +'            groupClassName: "col-6",'
    +'            maxFileSize: "",'
    +'            placeholderImage: {'
    +'                image: \'<?php echo e(asset("public/assets/back-end/img/400x400/img2.jpg")); ?>\','
    +'                width: \'100%\','
    +'            },'
    +'            dropFileLabel: "Drop Here",'
    +'            onAddRow: function (index, file) {'

    +'            },'
    +'            onRenderedPreview: function (index) {'

    +'            },'
    +'            onRemoveRow: function (index) {'

    +'           },'
    +'            onExtensionErr: function (index, file) {'
    +'                toastr.error("Please only input png or jpg type file", {'
    +'                    CloseButton: true,'
    +'                    ProgressBar: true'
    +'                });'
    +'            },'
    +'            onSizeErr: function (index, file) {'
    +'                toastr.error("File size too big", {'
    +'                    CloseButton: true,'
    +'                    ProgressBar: true'
    +'                });'
    +'            }'
    +'        });'

+'	function closebarter(id)'
+'	{'
+'		$("#divbarter" + id + "").html("");'
+'	}'
+		''
	+ '<\/script>'
	+ '';
	html2=$("#contentbarter").html();
	$("#counter").val(parseInt($("#counter").val())+1);
	$("#contentbarter").append(html+js);
}
function addmoneysell()
{
	var html='<div id="divbartermoney"><br/>Money to Barter<br><br>'
				+'	<div class="form-group">'
				+'		<label for="name">Amount</label>'
				+'		<input type="text" name="amount" value="" class="form-control" id="amount" placeholder="200000">'
				+'	</div>'

	+'</div>';
	$("#contentbartermoney").append(html);
	$("#clickedbartermoney").hide();
}
function addbuy()
{
	var html='<div id="divbuy' + $("#counterbuy").val() + '"><br/><br><br><br/><a href="javascript:closebuy(' + $("#counterbuy").val() + ')">Delete this Product</a><br>Product in demand<br><br>'
				+'	<div class="form-group">'
				+'		<label for="name">Product Name</label>'
				+'		<input type="text" name="product_buy_name' + $("#counterbuy").val() + '" value="" class="form-control" id="product_buy_name' + $("#counterbuy").val() + '" placeholder="Ex : Batu Phirus">'
				+'	</div>'

				+'	<div class="form-group">'
				+'		<label for="name">Quantity</label>'
				+'		<input type="number" name="quantity_buy' + $("#counterbuy").val() + '" value="" class="form-control" id="quantity_buy' + $("#counterbuy").val() + '" placeholder="2">'
				+'	</div>'
				+'	<div class="form-group">'
				+'		<label for="name">Description</label>'
				+'		<textarea name="description_buy' + $("#counterbuy").val() + '" value="" class="form-control" id="description_buy' + $("#counterbuy").val() + '" >'
				+'		</textarea>'
				+'	</div>'
                 +'                   <div class="form-group">'
                 +'                       <label>Upload Image</label><small '
                 +'                           style="color: red">* </small>'
                 +'                   </div>'
                 +'                  <div  class="p-2 border border-dashed"  style="max-width:430px;">'
                 +'                       <div class="row" id="cobabuy' + $("#counterbuy").val() + '" name="coba' + $("#counterbuy").val() + '"></div>'
                 +'                   </div>'
	+'</div>';
	var js=''
    +'<script>'
    +'        $("#cobabuy'+$("#counterbuy").val()+'").spartanMultiImagePicker({'
    +'            fieldName: "imagesbuy'+$("#counterbuy").val()+'[]",'
    +'            maxCount: 4,'
    +'            rowHeight: "auto",'
    +'            groupClassName: "col-6",'
    +'            maxFileSize: "",'
    +'            placeholderImage: {'
    +'                image: \'<?php echo e(asset("public/assets/back-end/img/400x400/img2.jpg")); ?>\','
    +'                width: \'100%\','
    +'            },'
    +'            dropFileLabel: "Drop Here",'
    +'            onAddRow: function (index, file) {'

    +'            },'
    +'            onRenderedPreview: function (index) {'

    +'            },'
    +'            onRemoveRow: function (index) {'

    +'           },'
    +'            onExtensionErr: function (index, file) {'
    +'                toastr.error("Please only input png or jpg type file", {'
    +'                    CloseButton: true,'
    +'                    ProgressBar: true'
    +'                });'
    +'            },'
    +'            onSizeErr: function (index, file) {'
    +'                toastr.error("File size too big", {'
    +'                    CloseButton: true,'
    +'                    ProgressBar: true'
    +'                });'
    +'            }'
    +'        });'

+'	function closebuy(id)'
+'	{'
+'		$("#divbuy" + id + "").html("");'
+'	}'
+		''
	+ '<\/script>'
	+ '';
	$("#counterbuy").val(parseInt($("#counterbuy").val())+1);
	$("#contentbuy").append(html+js);
}
function addmoneybuy()
{
	var html='<div id="divbbuymoney"><br/>Money in Demand<br><br>'
				+'	<div class="form-group">'
				+'		<label for="name">Amount</label>'
				+'		<input type="text" name="amount_buy" value="" class="form-control" id="amount_buy" placeholder="200000">'
				+'	</div>'

	+'</div>';
	$("#contentbuymoney").append(html);
	$("#clickedbuymoney").hide();
}
</script>
							<div id="adddiv">
							<a href="javascript:addsell();">Add New Barter Product</a><br/>
							<a href="javascript:addbuy();">Add New Demand Product</a><br/>
							<?php if(count($bms)==0): ?>
							<a href="javascript:addmoneysell();" id="clickedbartermoney">Add New Barter Money</a><br/>
							<?php endif; ?>
							<?php if(count($bmb)==0): ?>
							<a href="javascript:addmoneybuy();" id="clickedbuymoney">Add New Demand Money</a><br/>
							<?php endif; ?>
							</div>
							<div id="contentbarter">
							</div>
							<div id="contentbartermoney">
							</div>
							<div id="contentbuy">
							</div>
							<div id="contentbuymoney">
							</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-12" style="padding-top: 20px">
											<button type="submit" class="btn btn-primary">Add Products to Barter</button>
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
<!--    <script>
        $(function () {
            $("#coba1").spartanMultiImagePicker({
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


        });

        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            width: 'resolve'
        });
    </script>
-->
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
                url: '<?php echo e(route('seller.product.sku-combination')); ?>',
                data: $('#product_form').serialize(),
                success: function (data) {
                    $('#sku_combination').html(data.view);
                    $('#sku_combination').addClass('pt-4');
                    if (data.length > 1) {
                        $('#quantity').hide();
                    } else {
                        $('#quantity').show();
                    }
                }
            });
        };

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
			e.stopImmediatePropagation();
			for ( instance in CKEDITOR.instances ) {
                CKEDITOR.instances[instance].updateElement();
            }
            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.post({
                url: '<?php echo e(route('admin.barter.updatebarter')); ?>',
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
                        toastr.success('Barter updated successfully!', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                        setInterval(function () {
                            location.href = '<?php echo e(route("admin.barter.edit",[$b->id])); ?>';
                        }, 2000);
                    }
                }
            });
			e.stopImmediatePropagation();
			return false;
        });
										$('#product_updates').submit(function (e) {
											e.preventDefault();
											e.stopImmediatePropagation();
											for ( instance in CKEDITOR.instances ) {
												CKEDITOR.instances[instance].updateElement();
											}
											var formData = new FormData(this);
											$.ajaxSetup({
												headers: {
													'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
												}
											});
											$.post({
												url: '<?php echo e(route('admin.barter.updateproducts')); ?>',
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
														toastr.success('Product and Amount Added successfully to Barter!', {
															CloseButton: true,
															ProgressBar: true
														});
														setInterval(function () {
															location.href = '<?php echo e(route("admin.barter.edit",[$b->id])); ?>';
														}, 2000);
													}
												}
											});
											e.stopImmediatePropagation();
											return false;
										});
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bandbkmp/public_html/resources/views/admin-views/barter/adminedit.blade.php ENDPATH**/ ?>