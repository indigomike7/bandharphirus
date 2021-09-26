@extends('layouts.back-end.app-seller')

@push('css_or_js')
    <link href="{{asset('public/assets/back-end/css/croppie.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/back-end/css/tags-input.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/back-end/css/custom.css')}}" rel="stylesheet">
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
                <li class="breadcrumb-item"><a href="{{route('seller.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('seller.contest.list')}}">Contest</a></li>
                <li class="breadcrumb-item">Manage Contest</li>
            </ol>
        </nav>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-black-50">{{trans('messages.contest')}}</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">

                <form class="product-form" action="{{route('seller.contest.update')}}" method="post" enctype="multipart/form-data"
                      id="product_form">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4>Manage Contest</h4>
                        </div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif                        <div class="card-body">
                            <div class="form-group">
							<h4>{{$contest->name}}</h4>
							Category :
							@foreach($contestcat as $key=>$value)
							@if($value->id==$contest->contestcat)
							{{$value->category}}<br/>
							@endif
							@endforeach
							{{$contest->description}}<br/>
							Biaya : {{$contest->fund}}<br/>
							Dimulai tanggal {{$contest->start_date!==null ? $contest->start_date->format('Y-m-d') : 'N/A'}}<br/>
							Berakhir tanggal {{$contest->end_date!==null ? $contest->end_date->format('Y-m-d') : 'N/A'}}<br/>
							Dimulai tanggal {{$contest->start_date_1!==null ? $contest->start_date_1 : 'N/A'}} Tiap Bulan<br/>
							Berakhir tanggal {{$contest->end_date_1!==null ? $contest->end_date_1 : 'N/A'}} Tiap Bulan<br/>
							Dimulai tanggal {{$contest->start_date_2!==null ? $contest->start_date_2 : 'N/A'}} Tiap Bulan<br/>
							Berakhir tanggal {{$contest->end_date_2!==null ? $contest->end_date_2 : 'N/A'}} Tiap Bulan<br/>
							Dimulai tanggal {{$contest->start_date_3!==null ? $contest->start_date_3 : 'N/A'}} Tiap Bulan<br/>
							Berakhir tanggal {{$contest->end_date_3!==null ? $contest->start_date_3 : 'N/A'}} Tiap Bulan<br/>
									@if($contest->picture!=null)
                                    @foreach (json_decode($contest->picture) as $key => $photo)
                                            <div class="col-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <img style="width: 100%" height="auto"
                                                            onerror=""
                                                            src="{{asset('storage/app/public/contest/'.$photo)}}" alt="Product image">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
									@endif
                                    </div>
                                </div>


                <form class="product-form" action="{{route('seller.contest.updatemanage')}}" method="post" enctype="multipart/form-data"
                      id="product_form">
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12" style="padding-top: 20px">
										<div class="form-group">
											<input type="hidden" name="id" value="{{$contest->id}}"/>
											<label for="name">Result</label>
											<textarea name="result" class="form-control" id="result" >{{$contest->result}}
											</textarea>
										</div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
					<!-- LISTING -->
								<div class="row">
								@php(
								        $contestuser2 = $contestuser->where("contest_id","=",$contest->id)->get()

								)
									@if(!empty($contestuser2))
										@foreach($contestuser2 as $k=>$detail)
		                                    <div class="col-md-6" style="padding-top: 20px">
												<div class="form-group">
											@if($detail->user_id!=null)
											@php(
											$userobj=$user->where('id','=',$detail->user_id)->first()
											)
											Buyer Name : {{$userobj->f_name}} {{$userobj->l_name}}<br/>
											@endif
											@if($detail->seller_id!=null)
											@php(
											$sellerobj=$seller->where('id','=',$detail->seller_id)->first()
											)
											Seller Name : {{$sellerobj->f_name}} {{$sellerobj->l_name}}<br/>
											@endif
												@if($detail->picture!=null)
												@foreach (json_decode($detail->picture) as $key => $photo)
														<div class="col-6">
															<div class="card">
																<div class="card-body">
																<a href="{{asset('storage/app/public/contest/'.$photo)}}" target="_blank">
																	<img class="img-fluid"
																		onerror=""
																		src="{{asset('storage/app/public/contest/'.$photo)}}" alt="User Contest Joiners image">
																</a>
																</div>
															</div>
														</div>
													@endforeach
												@endif
												</div>
											</div>
											Answer<br/>{{$detail->answer}}

												</div>
											</div>

										@endforeach
									@endif
                                </div>

					<!-- EOF LISTING -->
                            </div>
                        </div>
                    </div>

                </form>


            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{asset('public/assets/back-end')}}/js/tags-input.min.js"></script>
    <script src="{{ asset('public/assets/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('public/assets/back-end/js/spartan-multi-image-picker.js')}}"></script>
    <script>
        $(function () {
            $("#coba").spartanMultiImagePicker({
                fieldName: 'images[]',
                maxCount: 4,
                rowHeight: 'auto',
                groupClassName: 'col-6',
                maxFileSize: '',
                placeholderImage: {
                    image: '{{asset('public/assets/back-end/img/400x400/img2.jpg')}}',
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
                    image: '{{asset('public/assets/back-end/img/400x400/img2.jpg')}}',
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
            $('#customer_choice_options').append('<div class="row"><div class="col-md-3"><input type="hidden" name="choice_no[]" value="' + i + '"><input type="text" class="form-control" name="choice[]" value="' + n + '" placeholder="{{trans('Choice Title') }}" readonly></div><div class="col-lg-9"><input type="text" class="form-control" name="choice_options_' + i + '[]" placeholder="{{trans('Enter choice values') }}" data-role="tagsinput" onchange="update_sku()"></div></div>');

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
                url: '{{route('seller.product.sku-combination')}}',
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
                url: '{{route('seller.contest.updatemanage')}}',
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
                        toastr.success('Contest Result updated successfully!', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                        setInterval(function () {
                            location.href = '{{route('seller.contest.listmanage',$contest->id)}}';
                        }, 2000);
                    }
                }
            });
        });
    </script>
@endpush