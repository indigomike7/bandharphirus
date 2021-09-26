@extends('layouts.back-end.app-seller')
@section('title','Update Saldo')

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
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('seller.premium.update')}}">Premium</a></li>
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
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif                        <div class="card-body row">
                            <div class="form-group col-md-2" style="border:1px solid black; margin:30px;">
							{{$sp->saldo1}}<br/>
							Cost : {{$sp->saldo1}}<br/>
                                <input type="hidden" name="saldo1" value="{{$sp->saldo1}}" class="form-control" id="saldo1">
								<button type="button" onclick="$('#payment_saldo_1').show();$('#payment_saldo_2').hide();$('#payment_saldo_3').hide();$('#payment_saldo_4').hide();">Buy</button>
                            </div>

                            <div class="form-group col-md-2" style="border:1px solid black; margin:30px;">
							{{$sp->saldo2}}<br/>
							Cost : {{$sp->saldo2}}<br/>
                                <input type="hidden" name="saldo2" value="{{$sp->saldo2}}" class="form-control" id="saldo2" >
								<button type="button"onclick="$('#payment_saldo_1').hide();$('#payment_saldo_2').show();$('#payment_saldo_3').hide();$('#payment_saldo_4').hide();">Buy</button>
                            </div>
                            <div class="form-group col-md-2" style="border:1px solid black;  margin:30px;">
							{{$sp->saldo3}}<br/>
							Cost : {{$sp->saldo3}}<br/>
                                <input type="hidden" name="saldo3" value="{{$sp->saldo3}}" class="form-control" id="saldo3" >
								<button type="button"onclick="$('#payment_saldo_1').hide();$('#payment_saldo_2').hide();$('#payment_saldo_3').show();$('#payment_saldo_4').hide();">Buy</button>
                            </div>
                            <div class="form-group col-md-2" style="border:1px solid black;  margin:30px;">
							{{$sp->saldo4}}<br/>
							Cost : {{$sp->saldo4}}<br/>
								<input type="hidden" name="saldo4" value="{{$sp->saldo4}}" class="form-control" id="saldo4">
								<button type="button"onclick="$('#payment_saldo_1').hide();$('#payment_saldo_2').hide();$('#payment_saldo_3').hide();$('#payment_saldo_4').show();">Buy</button>
                            </div>
                        </div>
                    </div>
					<div id="payment_saldo_1" class="modal col-md-12">
					<div class="row">
                        @php($data=json_decode($response,true))
                        @if($data)
							@for($i=0;$i<count($data['data']);$i++)
								<div class="col-md-3" style="cursor: pointer">
									<div class="card">
										<div class="card-body" style="height: 100px">
											<a class="btn btn-block"
											   href="javascript:modalview('{{$data['data'][$i]['code']}}',$('#saldo1').val());">
												{{$data['data'][$i]['name']}} <br/>Code : {{$data['data'][$i]['code']}}
											</a>
										</div>
									</div>
								</div>
							@endfor
                        @endif
					</div>
					</div>
					<div id="payment_saldo_2" class="modal col-md-12">
					<div class="row">
                        @php($data=json_decode($response,true))
                        @if($data)
							@for($i=0;$i<count($data['data']);$i++)
								<div class="col-md-3" style="cursor: pointer">
									<div class="card">
										<div class="card-body" style="height: 100px">
											<a class="btn btn-block"
											   href="javascript:modalview('{{$data['data'][$i]['code']}}',$('#saldo2').val());">
												{{$data['data'][$i]['name']}} <br/>Code : {{$data['data'][$i]['code']}}
											</a>
										</div>
									</div>
								</div>
							@endfor
                        @endif
					</div>
					</div>

					<div id="payment_saldo_3" class="modal col-md-12">
					<div class="row">
                        @php($data=json_decode($response,true))
                        @if($data)
							@for($i=0;$i<count($data['data']);$i++)
								<div class="col-md-3" style="cursor: pointer">
									<div class="card">
										<div class="card-body" style="height: 100px">
											<a class="btn btn-block"
											   href="javascript:modalview('{{$data['data'][$i]['code']}}',$('#saldo3').val());">
												{{$data['data'][$i]['name']}} <br/>Code : {{$data['data'][$i]['code']}}
											</a>
										</div>
									</div>
								</div>
							@endfor
                        @endif
					</div>
					</div>
					<div id="payment_saldo_4" class="modal col-md-12">
					<div class="row">
                        @php($data=json_decode($response,true))
                        @if($data)
							@for($i=0;$i<count($data['data']);$i++)
								<div class="col-md-3" style="cursor: pointer">
									<div class="card">
										<div class="card-body" style="height: 100px">
											<a class="btn btn-block"
											   href="javascript:modalview('{{$data['data'][$i]['code']}}',$('#saldo4').val());">
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
						  <input type="hidden" name="days" id="days" value="">
							<button type="button" class="btn btn-primary" onclick="checkbayar($('#amount_pay').val());">Sudah Bayar</button>
							<input type="hidden" name="reference_bayar"  id="reference_bayar" value="">
							<button type="button" class="btn btn-secondary"  onclick="$('.modal').hide();" data-dismiss="modal">Tutup</button>
							</form>
						  </div>
						</div>
					  </div>
					 </div>
					  <script type="text/javascript">
					  function modalview(code,amount)
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

					  function checkbayar(amount)
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
									window.location.href = "/seller/saldo/success/?payment_method=tripay&amount="+ amount ;
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
@endsection
