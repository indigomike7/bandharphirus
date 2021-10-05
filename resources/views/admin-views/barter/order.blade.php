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
					  @if(count($sa)>0 && $b!=null)
						<div  style="border:1px solid lightgray; border-radius:3px; padding:10px;">
						<div class="row">
						<input type="hidden" name="id" id="id" value="{{$b->id}}">
							<div class="col-md-6">
                            <div class="form-group">
                                <label for="name"><h3>Barter ID : </label>
								{{$b->id}}<br></h3>
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
									<label for="name">Delivery Address</label>
									@foreach($sa as $key=>$detail)
									{{$detail->address}}<br>
										{{$detail->zip_code}}<br/>
									@endforeach
									
								</div>
							</div>
							<br>
							<div class="col-md-12">
							<a href="{{route('admin.barter.checkout',[$b->id])}}" class="btn btn-primary">Check Out</a><br><br>
							</div>
							</div>
						</div>
						</div>
						<br>
					@endif
					@if(count($sa)==0)
        <div class="row" style="margin-top: 20px">
			<div class="col-md-6">
			Please add your primary address firstly, before you can add new barter Order!! Add <a href="{{route('admin.address.add')}}">Here</a>
			</div>
		</div>
					@endif
					@if($b==null)
						<div class="row" style="margin-top: 20px">
							<div class="col-md-6">
							Barter sudah di beli!
							</div>
						</div>
					@endif
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