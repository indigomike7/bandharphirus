@extends('layouts.front-end.app')

@section('title',''. $web_config['name']->value.' - Chatroom')

@push('css_or_js')
    <meta property="og:image" content="{{asset('storage/app/public/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="og:title" content="Welcome To {{$web_config['name']->value}} Home"/>
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:description" content="{!! substr($web_config['about']->value,0,100) !!}">

    <meta property="twitter:card" content="{{asset('storage/app/public/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="twitter:title" content="Welcome To {{$web_config['name']->value}} Home"/>
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta property="twitter:description" content="{!! substr($web_config['about']->value,0,100) !!}">

    <link rel="stylesheet" href="{{asset('public/assets/front-end')}}/css/home.css"/>
    <style>
        .cz-countdown-days {
            color: white !important;
            background-color: {{$web_config['primary_color']}};
            padding: 0px 6px;
            border-radius: 3px;
            margin-right: 3px !important;
        }

        .cz-countdown-hours {
            color: white !important;
            background-color: {{$web_config['primary_color']}};
            padding: 0px 6px;
            border-radius: 3px;
            margin-right: 3px !important;
        }

        .discount-top-f {
            text-align: end;
            /* margin-top: 5px; */
            margin-bottom: 5px;
        }

        .cz-countdown-minutes {
            color: white !important;
            background-color: {{$web_config['primary_color']}};
            padding: 0px 6px;
            border-radius: 3px;
            margin-right: 3px !important;
        }

        .cz-countdown-seconds {
            color: {{$web_config['primary_color']}};
            border: 1px solid{{$web_config['primary_color']}};
            padding: 0px 6px;
            border-radius: 3px !important;
        }

        .flash_deal_product_details .flash-product-price {
            font-weight: 700;
            font-size: 18px;
            color: {{$web_config['primary_color']}};
        }

        .for-discoutn-value {
            background: {{$web_config['primary_color']}};

        }

        .featured_deal_left {
            height: 130px;
            background: {{$web_config['primary_color']}} 0% 0% no-repeat padding-box;
            padding: 10px 100px;
            text-align: center;
        }

        .featured_deal {
            min-height: 130px;

        }

        .category_div:hover {
            color: {{$web_config['secondary_color']}};
        }

        .deal_of_the_day {
            /* filter: grayscale(0.5); */
            opacity: .8;
            background: {{$web_config['secondary_color']}};
            border-radius: 3px;
        }

        .deal-title {
            font-size: 12px;

        }

        .for-flash-deal-img img {
            max-width: none;
        }

        @media (max-width: 375px) {
            .cz-countdown {
                display: flex !important;

            }

            .cz-countdown .cz-countdown-seconds {

                margin-top: -5px !important;
            }

            .for-feature-title {
                font-size: 20px !important;
            }
        }

        @media (max-width: 600px) {
            .flash_deal_title {
                font-weight: 600;
                font-size: 18px;
                text-transform: uppercase;
            }

            .cz-countdown .cz-countdown-value {
                font-family: "Roboto", sans-serif;
                font-size: 11px !important;
                font-weight: 700 !important;
            }

            .featured_deal {
                opacity: 1 !important;
            }

            .cz-countdown {
                display: inline-block;
                flex-wrap: wrap;
                font-weight: normal;
                margin-top: 4px;
                font-size: smaller;
            }

            .view-btn-div-f {

                margin-top: 6px;
                float: right;
            }

            .view-btn-div {
                float: right;
            }

            .viw-btn-a {
                font-size: 10px;
                font-weight: 600;
            }


            .for-mobile {
                display: none;
            }

            .featured_for_mobile {
                max-width: 95%;
                margin-top: 20px;
            }
        }

        @media (max-width: 360px) {
            .featured_for_mobile {
                max-width: 96%;
                margin-top: 11px;
            }

            .featured_deal {
                opacity: 1 !important;
            }
        }

        @media (max-width: 375px) {
            .featured_for_mobile {
                max-width: 96%;
                margin-top: 11px;
            }

            .featured_deal {
                opacity: 1 !important;
            }

            .for-iphone-mobile {
                margin-left: 2%;
            }
        }

        @media (min-width: 768px) {
            .displayTab {
                display: block !important;
            }
        }

        @media (max-width: 800px) {
            .for-tab-view-img {
                width: 40%;
            }

            .for-tab-view-img {
                width: 105px;
            }

            .widget-title {
                font-size: 19px !important;
            }
        }

        .featured_deal_carosel .carousel-inner {
            width: 100% !important;
        }
    </style>
@endpush

@section('content')
    <!-- Hero (Banners + Slider)-->
    <section class="bg-transparent mt-4 mb-4">
        <div class="container">
            <div class="row ">
                <div class="col-12">
				<div class="row">

					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
							<li class="breadcrumb-item">Barter</li>
						</ol>
					</nav>


					<!-- Content Row -->
					<div class="row">
						<div class="col-md-12">

								<div class="card">
									<div class="card-header">
										<h4>Join Barter</h4>
									</div>
									  <div class="card-body">
									  @if(count($sa)>0)
									  @foreach($b as $key=>$eachbarter)
										<div  style="border:1px solid lightgray; border-radius:3px; padding:10px;">
										<div class="row">
										<input type="hidden" name="id" id="id" value="{{$eachbarter->id}}">
											<div class="col-md-6">
											<div class="form-group">
												<label for="name"><h3>Barter ID : </label>
												{{$eachbarter->id}}<br></h3>
											</div>
											</div>
											<div class="col-md-6">
											<div class="form-group">
												<label for="name">Barter Category : </label>
												@foreach($category as $key=>$value)
												@if($value->id==$eachbarter->category)
												{{$value->name}}
												@endif
												@endforeach
												<br>
											</div>
											</div>
											<div class="col-md-12">
											<h5>PRODUCT TO BARTER ##</h5>
											@php(
											$objbs=$bs->where('barter_id','=',$eachbarter->id)->get()
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
											$objbb=$bb->where('barter_id','=',$eachbarter->id)->get()
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


											@php( $objbms=$bms->where('barter_id','=',$eachbarter->id)->get())
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

											@php( $objbmb=$bmb->where('barter_id','=',$eachbarter->id)->get())
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
											
											<br>
											<div class="col-md-12">
											<!--<a href="javascript:;" onclick="addtocart({{$eachbarter->id}})" class="btn btn-primary">Add To Barter Cart</a>-->
											<a href="{{route('seller.barter.order',[$eachbarter->id])}}" class="btn btn-primary">Order</a><br><br>
											</div>
											</div>
										</div>
										</div>
										<br>
									@endforeach
									@endif
									@if(count($sa)==0)
						<div class="row" style="margin-top: 20px">
							<div class="col-md-6">
							Please add your primary address firstly, before you can add new barter!! Add <a href="{{route('seller.address.add')}}">Here</a>
							</div>
						</div>
									@endif
									</div>
								</div>
						</div>
					</div>
				</div
                </div>
            </div>
        </div>
	</div>
    </section>
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
                url: '{{route('seller.barter.addtocart')}}',
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
                            location.href = '{{route("seller.barter.listjoin")}}';
                        }, 2000);
                    }
                }
            });
			e.stopImmediatePropagation();
			return false;

	}
	</script>
@endpush