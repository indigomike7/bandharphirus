@extends('layouts.front-end.app')

@section('title',''. $web_config['name']->value.' - Auction')

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
							<li class="breadcrumb-item">Auction</li>
						</ol>
					</nav>

					<!-- CONTENT-->
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h5>Join Contest Lists</h5>
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
										@foreach($contest as $k=>$detail)
										@php(
												$contestuser2 = $contestuser->where("user_id","=",auth('customer')->id())->where("contest_id","=",$detail->id)->first()

										)
											<tr>
												<td valign="top">
													{{$k+1}}
												</td>
												<td>
												<!--
												@if(!empty($contestuser2))
													<h4><font color='blue'>Sudah Ikut Serta</font></h4>
												@endif-->
												ID : {{$detail->id}}<br/>
												Name : {{ $detail->name }}<br/>
												Tanggal Dibuat :{{ $detail->created_at }}<br/>
												Tanggal Kontes Dimulai : {{ $detail->start_date }}<br/>
												Tanggal Kontes Selesai :{{ $detail->end_date }}<br/><br/>
												@if($detail['picture']!=null)
												@foreach (json_decode($detail['picture']) as $image) 
													<img src="{{asset('storage/app/public/contest/'.$image)}}" alt="Contest image" style="width:70%">
												@endforeach
												@endif
												<div style="text-align:justify;">
												{{ $detail->description }}
												</div>
												</td>
											</tr>
										@endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
				<!-- EOF CONTENT-->
            </div>
        </div>
    </div>
</div>
</section>
@endsection

@push('script')
    <!-- Page level plugins -->
    <script src="{{asset('public/assets/back-end')}}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('public/assets/back-end')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('public/assets/back-end')}}/js/tags-input.min.js"></script>
    <script src="{{ asset('public/assets/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('public/assets/back-end/js/spartan-multi-image-picker.js')}}"></script>

    <!-- Page level custom scripts -->
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
	@endpush
