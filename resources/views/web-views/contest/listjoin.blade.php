@extends('layouts.front-end.app')
@section('title','Join List')

@push('css_or_js')
    <!-- Custom styles for this page -->
    <link href="{{asset('public/assets/back-end')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="{{asset('public/assets/back-end/css/croppie.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/back-end/css/tags-input.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/back-end/css/custom.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{asset('public/assets/back-end')}}/js/vendor.min.js"></script>
@endpush

@section('content')
    <!-- Page Heading -->
    <div class="container for-container">
        <div class="row align-items-center mb-3">
            <div class="col-sm">
                <h1 class="page-header-title">{{trans('messages.contest')}} <span
                        class="badge badge-soft-dark ml-2">{{\App\Model\Contest::where('seller_id',auth('seller')->id())->count()}}</span>
                </h1>

            </div>
        </div>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h5>My Joined Contest Lists</h5>
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
										<!--@if(!empty($contestuser2))
											<h4><font color='blue'>Sudah Ikut Serta</font></h4>
										@endif
										
										<form class="product-form-{{$detail->id}}" action="{{route('contest3.join')}}" method="post" enctype="multipart/form-data"
											  id="product-form-{{$detail->id}}">@csrf
                            <div class="form-group">
								<input type="hidden" name="contest-name-{{$detail->id}}" id="contest-name-{{$detail->id}}" value="{{ $detail->name }}">
                                <label for="name">Jawaban</label>
								<input type="hidden" name="id" value="{{$detail->id}}">
                                <textarea name="answer-{{$detail->id}}" value="{{old('answer')}}" class="form-control" id="answer-{{$detail->id}}" style="width:50%;">
									@if(!empty($contestuser2))
									{{$contestuser2->answer}}
									@endif
								</textarea><br/>
									@if(!empty($detail->result))
									<img src="{{asset('public/assets/images')}}/congratulation.jpg"  class="img-fluid">
								<h5>Result : </h5><br/>
									{{$detail->result}}
									@endif
								</textarea>
                            </div>
                                <div class="p-2 border border-dashed"  style="max-width:430px;">
                                    <div class="row" id="coba-{{$detail->id}}">
									@if(!empty($contestuser2))
									@if($contestuser2->picture!=null)
                                    @foreach (json_decode($contestuser2->picture) as $key => $photo)
                                            <div class="col-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <img style="width: 100%" height="auto"
                                                            onerror=""
                                                            src="{{asset('storage/app/public/contest/'.$photo)}}" alt="Product image">
                                                        <a href="{{route('contest3.remove_image_user',['id'=>$detail->id,'image'=>$photo])}}"
                                                        class="btn btn-danger btn-block">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
									@endif
									@endif
                                    </div>
                                </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12" style="padding-top: 20px">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
										</form>-->
    <script>
        $('#product-form-{{$detail->id}}').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '{{route("contest3.join")}}',
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
						alert("Anda sukses mengikuti kontes " + $("#contest-name-{{$detail->id}}").val());
                        toastr.success('Contest Joined successfully!', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                        setInterval(function () {
                            location.href = '{{route('contest3.listjoin')}}';
                        }, 2000);
                    }
                }
            });
        });
        $(function () {
            $("#coba-{{$detail->id}}").spartanMultiImagePicker({
                fieldName: 'images-{{$detail->id}}[]',
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

            $("#thumbnail-{{$detail->id}}").spartanMultiImagePicker({
                fieldName: 'image-{{$detail->id}}',
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
    </script>
										</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
