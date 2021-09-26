<?php $__env->startSection('title','Update To Premium'); ?>

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
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('seller.premium.update')); ?>">Premium</a></li>
                <li class="breadcrumb-item">Settings</li>
            </ol>
        </nav>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-black-50">Premium</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <h4>Premium Settings</h4>
                        </div>
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>                        <div class="card-body row">
                            <div class="form-group col-md-2" style="border:1px solid black; margin:30px;">
							30 Days<br/>
							Cost : <?php echo e($ps->cost_30_days); ?><br/>
                                <input type="hidden" name="cost_30_days" value="<?php echo e($ps->cost_30_days); ?>" class="form-control" id="cost_30_days">
								<button type="button" onclick="$('#payment_30').show();$('#payment_90').hide();$('#payment_180').hide();$('#payment_365').hide();">Apply</button>
                            </div>

                            <div class="form-group col-md-2" style="border:1px solid black; margin:30px;">
							90 Days<br/>
							Cost : <?php echo e($ps->cost_90_days); ?><br/>
                                <input type="hidden" name="cost_90_days" value="<?php echo e($ps->cost_90_days); ?>" class="form-control" id="cost_90_days" >
								<button type="button"onclick="$('#payment_30').hide();$('#payment_90').show();$('#payment_180').hide();$('#payment_365').hide();">Apply</button>
                            </div>
                            <div class="form-group col-md-2" style="border:1px solid black;  margin:30px;">
							180 Days<br/>
							Cost : <?php echo e($ps->cost_180_days); ?><br/>
                                <input type="hidden" name="cost_180_days" value="<?php echo e($ps->cost_180_days); ?>" class="form-control" id="cost_180_days" >
								<button type="button"onclick="$('#payment_30').hide();$('#payment_90').hide();$('#payment_180').show();$('#payment_365').hide();">Apply</button>
                            </div>
                            <div class="form-group col-md-2" style="border:1px solid black;  margin:30px;">
							365 Days<br/>
							Cost : <?php echo e($ps->cost_365_days); ?><br/>
								<input type="hidden" name="cost_365_days" value="<?php echo e($ps->cost_365_days); ?>" class="form-control" id="cost_365_days" placeholder="100000">
								<button type="button"onclick="$('#payment_30').hide();$('#payment_90').hide();$('#payment_180').hide();$('#payment_365').show();">Apply</button>
                            </div>
                        </div>
                    </div>
					<div id="payment_30" class="modal col-md-12">
					<div class="row">
                        <?php ($data=json_decode($response,true)); ?>
                        <?php if($data): ?>
							<?php for($i=0;$i<count($data['data']);$i++): ?>
								<div class="col-md-3" style="cursor: pointer">
									<div class="card">
										<div class="card-body" style="height: 100px">
											<a class="btn btn-block"
											   href="javascript:modalview('<?php echo e($data['data'][$i]['code']); ?>',$('#cost_30_days').val(),30);">
												<?php echo e($data['data'][$i]['name']); ?> <br/>Code : <?php echo e($data['data'][$i]['code']); ?>

											</a>
										</div>
									</div>
								</div>
							<?php endfor; ?>
                        <?php endif; ?>
					</div>
					</div>
					<div id="payment_90" class="modal col-md-12">
					<div class="row">
                        <?php ($data=json_decode($response,true)); ?>
                        <?php if($data): ?>
							<?php for($i=0;$i<count($data['data']);$i++): ?>
								<div class="col-md-3" style="cursor: pointer">
									<div class="card">
										<div class="card-body" style="height: 100px">
											<a class="btn btn-block"
											   href="javascript:modalview('<?php echo e($data['data'][$i]['code']); ?>',$('#cost_90_days').val(),90);">
												<?php echo e($data['data'][$i]['name']); ?> <br/>Code : <?php echo e($data['data'][$i]['code']); ?>

											</a>
										</div>
									</div>
								</div>
							<?php endfor; ?>
                        <?php endif; ?>
					</div>
					</div>

					<div id="payment_180" class="modal col-md-12">
					<div class="row">
                        <?php ($data=json_decode($response,true)); ?>
                        <?php if($data): ?>
							<?php for($i=0;$i<count($data['data']);$i++): ?>
								<div class="col-md-3" style="cursor: pointer">
									<div class="card">
										<div class="card-body" style="height: 100px">
											<a class="btn btn-block"
											   href="javascript:modalview('<?php echo e($data['data'][$i]['code']); ?>',$('#cost_180_days').val(),180);">
												<?php echo e($data['data'][$i]['name']); ?> <br/>Code : <?php echo e($data['data'][$i]['code']); ?>

											</a>
										</div>
									</div>
								</div>
							<?php endfor; ?>
                        <?php endif; ?>
					</div>
					</div>
					<div id="payment_365" class="modal col-md-12">
					<div class="row">
                        <?php ($data=json_decode($response,true)); ?>
                        <?php if($data): ?>
							<?php for($i=0;$i<count($data['data']);$i++): ?>
								<div class="col-md-3" style="cursor: pointer">
									<div class="card">
										<div class="card-body" style="height: 100px">
											<a class="btn btn-block"
											   href="javascript:modalview('<?php echo e($data['data'][$i]['code']); ?>',$('#cost_365_days').val(),365);">
												<?php echo e($data['data'][$i]['name']); ?> <br/>Code : <?php echo e($data['data'][$i]['code']); ?>

											</a>
										</div>
									</div>
								</div>
							<?php endfor; ?>
                        <?php endif; ?>
					</div>
					</div>
					<div class="modal" tabindex="-1" role="dialog" id="bayarmodal">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title2"></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick="$('.modal').hide();" >
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body2">
						  </div>
						  <div class="modal-footer">
						  <form action="" method="GET">
						  <input type="hidden" name="amount_pay" id="amount_pay" value="">
						  <input type="hidden" name="days" id="days" value="">
							<button type="button" class="btn btn-primary" onclick="checkbayar($('#amount_pay').val(),$('#days').val());">Sudah Bayar</button>
							<input type="hidden" name="reference_bayar"  id="reference_bayar" value="">
							<button type="button" class="btn btn-secondary"  onclick="$('.modal').hide();" data-dismiss="modal">Tutup</button>
							</form>
						  </div>
						</div>
					  </div>
					 </div>
					  <script type="text/javascript">
					  function modalview(code,amount,days)
					  {
						  $("#amount_pay").val(amount);
						  $("#days").val(days);
						$.ajax({
						  method: "GET",
						  url: "/checkout-tripay-premium",
						  data: { code: code, name:"<?php echo e($seller->f_name); ?>",email:"<?php echo e($seller->email); ?>",amount:amount }

						})
						  .done(function( msg ) {
							//alert(msg);
							msg=  JSON.parse(msg);
							//alert(msg.success);
							//alert(msg.data.payment_name);
							$(".modal-title2").html(msg.data.payment_name);
							$(".modal-body2").html("<b>Total Bayar : " + msg.data.amount + "</b><br/><br/>" +msg.data.instructions[0].title + "<br/>" + msg.data.instructions[0].steps);
							$("#reference_bayar").val(msg.data.reference);
							$("#bayarmodal").show();
						  });
					  }

					  function checkbayar(amount,days)
					  {
						$.ajax({
						  method: "GET",
						  url: "/checkout-tripay-bayar-2",
						  data: { reference: $("#reference_bayar").val()}
						})
						  .done(function( msg ) {
							//alert(msg);
							msg=  JSON.parse(msg);
							if(msg.success==true)
							{
								if(msg.data.status=="PAID")
								{
									alert("Pembayaran berhasil!");
									window.location.href = "/seller/premium/success/?payment_method=tripay&amount="+ amount + "&days=" +days;
								}
								else
								{
									//alert(msg.success);
									//alert(msg.data.payment_name);
									$(".modal-title").html(msg.data.payment_name);
									$(".modal-body").html("<font color='red'>Pembayaran belum dilakukan..</font><br/><br/><b>Total Bayar : " + msg.data.amount + "</b><br/><br/>" +msg.data.instructions[0].title + "<br/>" + msg.data.instructions[0].steps);
									$("reference_bayar").val(msg.data.reference);
									$(".modal").show();
								}

							}
							else
							{
									alert("Anda belum melakukan pembayaran!");
									$(".modal").show();

							}
							});
					  }
					  </script>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.back-end.app-seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bandbkmp/public_html/resources/views/seller-views/premium/update.blade.php ENDPATH**/ ?>