<?php $__env->startSection('title','Choose Payment Method'); ?>

<?php $__env->startPush('css_or_js'); ?>
    <style>
        .stripe-button-el {
            display: none !important;
        }

        .razorpay-payment-button {
            display: none !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <div class="col-md-12 mb-5 pt-5">
                <div class="feature_header" style="background: #dcdcdc;line-height: 1px">
                    <span><?php echo e(trans('messages.payment_method')); ?></span>
                </div>
            </div>
            <section class="col-lg-8">
                <hr>
                <div class="checkout_details mt-3">
                <?php echo $__env->make('web-views.partials._checkout-steps',['step'=>3], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Payment methods accordion-->
                    <h2 class="h6 pb-3 mb-2 mt-5"><?php echo e(trans('messages.choose_payment')); ?></h2>

                    <div class="row">
                        <?php ($data=json_decode($response,true)); ?>
                        <?php if($data): ?>
							<?php for($i=0;$i<count($data['data']);$i++): ?>
								<div class="col-md-6 mb-4" style="cursor: pointer">
									<div class="card">
										<div class="card-body" style="height: 100px">
											<a class="btn btn-block"
											   href="javascript:modalview('<?php echo e($data['data'][$i]['code']); ?>');">
												<?php echo e($data['data'][$i]['name']); ?> <br/>Code : <?php echo e($data['data'][$i]['code']); ?>

											</a>
										</div>
									</div>
								</div>
							<?php endfor; ?>
                        <?php endif; ?>
                        <?php ($config=\App\CPU\Helpers::get_business_settings('cash_on_delivery')); ?>
                        <?php if($config['status']): ?>
                            <div class="col-md-6 mb-4" style="cursor: pointer">
                                <div class="card">
                                    <div class="card-body" style="height: 100px">
                                        <a class="btn btn-block"
                                           href="<?php echo e(route('checkout-complete',['payment_method'=>'cash_on_delivery'])); ?>">
                                            <img width="150" style="margin-top: -10px"
                                                 src="<?php echo e(asset('public/assets/front-end/img/cod.png')); ?>"/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php ($config=\App\CPU\Helpers::get_business_settings('ssl_commerz_payment')); ?>
                        <?php if($config['status']): ?>
                            <div class="col-md-6 mb-4" style="cursor: pointer">
                                <div class="card">
                                    <div class="card-body" style="height: 100px">
                                        <form action="<?php echo e(url('/pay-ssl')); ?>" method="POST" class="needs-validation">
                                            <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token"/>
                                            <button class="btn btn-block" type="submit">
                                                <img width="150"
                                                     src="<?php echo e(asset('public/assets/front-end/img/sslcomz.png')); ?>"/>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php ($config=\App\CPU\Helpers::get_business_settings('paypal')); ?>
                        <?php if($config['status']): ?>
                            <div class="col-md-6 mb-4" style="cursor: pointer">
                                <div class="card">
                                    <div class="card-body" style="height: 100px">
                                        <form class="needs-validation" method="POST" id="payment-form"
                                              action="<?php echo e(route('pay-paypal')); ?>">
                                            <?php echo e(csrf_field()); ?>

                                            <button class="btn btn-block" type="submit">
                                                <img width="150"
                                                     src="<?php echo e(asset('public/assets/front-end/img/paypal.png')); ?>"/>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>



                        <?php ($coupon_discount = session()->has('coupon_discount') ? session('coupon_discount') : 0); ?>
                        <?php ($value = \App\CPU\CartManager::cart_grand_total(session('cart')) - $coupon_discount); ?>

                        <?php ($config=\App\CPU\Helpers::get_business_settings('stripe')); ?>
                        <?php if($config['status']): ?>
                            <div class="col-md-6 mb-4" style="cursor: pointer">
                                <div class="card">
                                    <div class="card-body" style="height: 100px">
                                        <?php ($config=\App\CPU\Helpers::get_business_settings('stripe')); ?>
                                        <form class="needs-validation" method="POST" id="payment-form"
                                              action="<?php echo e(route('pay-stripe')); ?>">
                                            <?php echo e(csrf_field()); ?>

                                            <button class="btn btn-block" type="button"
                                                    onclick="$('.stripe-button-el').click()">
                                                <img width="150" style="margin-top: -10px"
                                                     src="<?php echo e(asset('public/assets/front-end/img/stripe.png')); ?>"/>
                                            </button>
                                            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                    data-key="<?php echo e($config['published_key']); ?>"
                                                    data-amount="<?php echo e(($value-$coupon_discount)*100); ?>"
                                                    data-name="<?php echo e(auth('customer')->user()->f_name); ?>"
                                                    data-description=""
                                                    data-image=""
                                                    data-locale="auto"
                                                    data-currency="USD">
                                            </script>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php ($config=\App\CPU\Helpers::get_business_settings('razor_pay')); ?>
                        <?php ($amount=$value-$coupon_discount); ?>
                        <?php ($inr=\App\Model\Currency::where(['symbol'=>'₹'])->first()); ?>
                        <?php ($usd=\App\Model\Currency::where(['code'=>'usd'])->first()); ?>
                        <?php if(isset($inr) && isset($usd) && $config['status']): ?>
                            <?php ($rate=$usd['exchange_rate']/$inr['exchange_rate']); ?>
                            <div class="col-md-6 mb-4" style="cursor: pointer">
                                <div class="card">
                                    <div class="card-body" style="height: 100px">
                                        <form action="<?php echo route('payment-razor'); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <!-- Note that the amount is in paise = 50 INR -->
                                            <!--amount need to be in paisa-->
                                            <script src="https://checkout.razorpay.com/v1/checkout.js"
                                                    data-key="<?php echo e(\Illuminate\Support\Facades\Config::get('razor.razor_key')); ?>"
                                                    data-amount="<?php echo e((round($amount/$rate))*100); ?>"
                                                    data-buttontext="Pay <?php echo e(($amount)*100); ?> INR"
                                                    data-name="<?php echo e(\App\Model\BusinessSetting::where(['type'=>'company_name'])->first()->value); ?>"
                                                    data-description=""
                                                    data-image="<?php echo e(asset('storage/app/public/company/'.\App\Model\BusinessSetting::where(['type'=>'company_web_logo'])->first()->value)); ?>"
                                                    data-prefill.name="<?php echo e(auth('customer')->user()->f_name); ?>"
                                                    data-prefill.email="<?php echo e(auth('customer')->user()->email); ?>"
                                                    data-theme.color="#ff7529">
                                            </script>
                                        </form>
                                        <button class="btn btn-block" type="button"
                                                onclick="$('.razorpay-payment-button').click()">
                                            <img width="150"
                                                 src="<?php echo e(asset('public/assets/front-end/img/razor.png')); ?>"/>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- Navigation (desktop)-->
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <a class="btn btn-secondary btn-block" href="<?php echo e(route('checkout-shipping')); ?>">
                                <span class="d-none d-sm-inline">Back to Shipping</span>
                                <span class="d-inline d-sm-none">Back</span>
                            </a>
                        </div>
                        <div class="col-4"></div>
                    </div>
                </div>
					<div class="modal" tabindex="-1" role="dialog">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title"></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick="$('.modal').hide();" >
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body">
						  </div>
						  <div class="modal-footer">
						  <form action="" method="GET">
							<button type="button" class="btn btn-primary" onclick="checkbayar();">Sudah Bayar</button>
							<input type="hidden" name="reference_bayar"  id="reference_bayar" value="">
							<button type="button" class="btn btn-secondary"  onclick="$('.modal').hide();" data-dismiss="modal">Tutup</button>
							</form>
						  </div>
						</div>
					  </div>
					  <script type="text/javascript">
					  function modalview(code)
					  {
						$.ajax({
						  method: "GET",
						  url: "/checkout-tripay",
						  data: { code: code, name:"<?php echo e(auth('customer')->user()->f_name); ?>",email:"<?php echo e(auth('customer')->user()->email); ?>",amount:"<?php echo e((round($amount/$rate))*100); ?>" }
						})
						  .done(function( msg ) {
							//alert(msg);
							msg=  JSON.parse(msg);
							//alert(msg.success);
							//alert(msg.data.payment_name);
							$(".modal-title").html(msg.data.payment_name);
							$(".modal-body").html("<b>Total Bayar : " + msg.data.amount + "</b><br/><br/>" +msg.data.instructions[0].title + "<br/>" + msg.data.instructions[0].steps);
							$("#reference_bayar").val(msg.data.reference);
							$(".modal").show();
						  });
					  }

					  function checkbayar()
					  {
						$.ajax({
						  method: "GET",
						  url: "/checkout-tripay-bayar",
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
									window.location.href = "/checkout-complete?payment_method=tripay";
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
				</section>
            <!-- Sidebar-->
            <?php echo $__env->make('web-views.partials._order-summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        setTimeout(function () {
            $('.stripe-button-el').hide();
            $('.razorpay-payment-button').hide();
        }, 10)
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bandbkmp/public_html/resources/views/web-views/checkout-payment.blade.php ENDPATH**/ ?>