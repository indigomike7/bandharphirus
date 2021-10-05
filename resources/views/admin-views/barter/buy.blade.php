@extends('layouts.back-end.app')
@section('title','Order')

@push('css_or_js')
    <link href="{{asset('public/assets/back-end/css/croppie.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/back-end/css/tags-input.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/back-end/css/custom.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
@endpush

@section('content')
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.barter.listjoin')}}">Barter</a></li>
                <li class="breadcrumb-item">Order</li>
            </ol>
        </nav>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-black-50">Order</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <h4>Order</h4>
                        </div>
                      <div class="card-body">
					  @if(count($sa)>0)
						<div  style="border:1px solid lightgray; border-radius:3px; padding:10px;">
						<div class="row">
						<input type="hidden" name="id" id="id" value="{{$b->id}}">
							<div class="col-md-6">
                            <div class="form-group">
                                <label for="name"><h3>Barter ID : </label>
								{{$b->id}}<br></h3>
								<input type="hidden" name="barter_id" id="barter_id" value="{{$b->id}}"/>
                            </div>
							</div>
							<div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Barter Category : </label>
								@foreach($category as $key=>$value)
								@if($value->id==$b->category)
								{{$value->name}}
								@endif
								@endforeach
								<br>
                            </div>
							</div>
							<div class="col-md-12">
							<h5>PRODUCT TO BARTER ##</h5>
							@php(
							$objbs=$bs->where('barter_id','=',$b->id)->get()
							)
							@foreach($objbs as $key=>$value)
							</div>
							<div class="col-md-6">
								<div class="form-group">
										<label for="name">Product Name : </label>
										{{$value->product_name}}
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Quantity : </label>
										{{$value->quantity}}
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Description</label><br>
									{{$value->description}}<br>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
										Pictures : 
										@if($value->picture!=null)
                                    @foreach (json_decode($value->picture) as $key => $photo)
                                            <div class="col-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <img style="width: 100%" height="auto" class="img-fluid"
                                                            onerror=""
                                                            src="{{asset('storage/app/public/barter/'.$photo)}}" alt="Product image">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
									@endif
									</div>
							@endforeach
							</div>
							<div style="clear:both">
							</div>
							<div class="col-md-12">
							<h5>PRODUCT IN DEMAND ##</h5>
							@php(
							$objbb=$bb->where('barter_id','=',$b->id)->get()
							)
							@foreach($objbb as $key=>$value)
							</div>
							<div class="col-md-6">
								<div class="form-group">
										<label for="name">Product Name : </label>
										{{$value->product_name}}
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Quantity : </label>
										{{$value->quantity}}
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Description</label>
									{{$value->description}}
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
										Pictures : 
										@if($value->picture!=null)
                                    @foreach (json_decode($value->picture) as $key => $photo)
                                            <div class="col-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <img style="width: 100%" height="auto" class="img-fluid"
                                                            onerror=""
                                                            src="{{asset('storage/app/public/barter/'.$photo)}}" alt="Product image">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
									@endif
									</div>
							</div>
							@endforeach


							@php( $objbms=$bms->where('barter_id','=',$b->id)->get())
							@if(count($objbms)>0)
							@foreach($objbms as $key=>$value)
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Amount Sell</label>
									{{$value->amount}}
								</div>
							</div>
							@endforeach
							@endif

							@php( $objbmb=$bmb->where('barter_id','=',$b->id)->get())
							@if(count($objbmb)>0)
							@foreach($objbmb as $key=>$value)
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Amount Buy</label>
									{{$value->amount}}
								</div>
							</div>
							@endforeach
							@endif
							
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">My Delivery Address : <br></label>
									@foreach($sa as $key=>$detail)
									{{$detail->address}}<br>
										{{$detail->zip_code}}<br/>
									@endforeach
									
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">admin Delivery Address : <br></label>
									@foreach($sa2 as $key=>$detail)
									{{$detail->address}}<br>
										{{$detail->zip_code}}<br/>
									@endforeach
									
								</div>
							</div>
							<br>
							<div class="col-md-12">
							@if($status_pay==true && $buy_amount>0)
							<a href="javascript:pay();" class="btn btn-primary">Pay</a><br><br>
							@endif
							@if($status_pay==false && $buy_amount<=0)
							<a href="javascript:buy({{$b->id}});" class="btn btn-primary">Buy</a><br><br>
							@endif
							</div>
							</div>
						</div>
						</div>
						<br>
					@endif
					@if(count($sa)==0)
        <div class="row" style="margin-top: 20px">
			<div class="col-md-6">
			Please add your primary address firstly, before you can add new barter!! Add <a href="{{route('admin.address.add')}}">Here</a>
			</div>
		</div>
					@endif
					@if($status_pay==true && $buy_amount>0)
					<div id="payment_365" class="modal col-md-12">
					<div class="row">
                        @php($data=json_decode($response,true))
                        @if($data)
							@for($i=0;$i<count($data['data']);$i++)
								<div class="col-md-3" style="cursor: pointer">
									<div class="card">
										<div class="card-body" style="height: 100px">
											<a class="btn btn-block"
											   href="javascript:modalview('{{$data['data'][$i]['code']}}',{{$buy_amount}});">
												{{$data['data'][$i]['name']}} <br/>Code : {{$data['data'][$i]['code']}}
											</a>
										</div>
									</div>
								</div>
							@endfor
                        @endif
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
							<button type="button" class="btn btn-primary" onclick="checkbayar($('#amount_pay').val(),$('#days').val());">Sudah Bayar</button>
							<input type="hidden" name="reference_bayar"  id="reference_bayar" value="">
							<button type="button" class="btn btn-secondary"  onclick="$('.modal').hide();" data-dismiss="modal">Tutup</button>
							</form>
						  </div>
						</div>
					  </div>
					 </div>
					  <script type="text/javascript">
					  @if($status_pay==true)
						  
						  $(document).ready(
							function(){
								$("#payment_365").show();
							}
					  );
					@endif
				function pay()
				{
					$("#payment_365").show();
					
				}
					  function modalview(code,amount,days)
					  {
						  $("#amount_pay").val(amount);
						$.ajax({
						  method: "GET",
						  url: "/checkout-tripay-premium",
						  data: { code: code, name:"{{$seller->f_name}}",email:"{{$seller->email}}",amount:amount }

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
									buy($("#barter_id").val());
									window.location.href = "/admin/premium/success/?payment_method=tripay&amount="+ amount + "&days=" +days;
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
					@endif
					<script type="text/javascript">
				function buy(id)
				{
					var formData = new FormData();
					formData.append('id', id);
					   $.ajaxSetup({
							headers: {
								'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
							}
						});
						$.post({
							url: '{{route('admin.barter.buy')}}',
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
									toastr.success('Sukses Order Barter!', {
										CloseButton: true,
										ProgressBar: true
									});
									setInterval(function () {
										location.href = '{{route("admin.barter.orderlistbuy")}}';
									}, 2000);
								}
							}
						});
						e.stopImmediatePropagation();
						return false;

				}
					</script>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('script')
    <script src="{{asset('public/assets/back-end')}}/js/tags-input.min.js"></script>
    <script src="{{ asset('public/assets/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('public/assets/back-end/js/spartan-multi-image-picker.js')}}"></script>
	<script type="text/javascript">
	function addtocart(id)
	{
		var formData = new FormData();
		formData.append('id', id);
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.post({
                url: '{{route('admin.barter.addtocart')}}',
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
                        toastr.success('Barter added successfully to cart!', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                        setInterval(function () {
                            location.href = '{{route("admin.barter.listjoin")}}';
                        }, 2000);
                    }
                }
            });
			e.stopImmediatePropagation();
			return false;

	}
	</script>
@endpush