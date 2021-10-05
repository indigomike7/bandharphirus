@extends('layouts.back-end.app')
@section('title','My Barter Selling List')

@push('css_or_js')
    <!-- Custom styles for this page -->
    <link href="{{asset('public/assets/back-end')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="{{asset('public/assets/back-end/css/croppie.css')}}" rel="stylesheet">
@endpush

@section('content')
    <!-- Page Heading -->
    <div class="content container-fluid">
        <div class="row align-items-center mb-3">
            <div class="col-sm">
                <h1 class="page-header-title">Barter <span
                        class="badge badge-soft-dark ml-2">{{\App\Model\SellerBarterOrder::where('seller_id_sell',0)->count()}}</span>
                </h1>

            </div>
        </div>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>My Barter Sold Lists</h5>
                    </div>
						@if(count($sa)>0)
                    <div class="card-body" style="padding: 0">
                        <div class="table-responsive">
                            <table id="datatable"
                                   class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                                   style="width: 100%">
                                <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Order ID</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>
                                    <th style="width: 30px">{{trans('messages.Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sbo as $k=>$detail)
                                    <tr>
                                        <td>
                                            {{$k+1}}
                                        </td>
                                        <td>
                                            <a href="{{route('admin.barter.buydetail',$detail['id'])}}">{{$detail['id']}}</a>
                                        </td>
                                        <td>{{ $detail->created_at }}</td>
                                        <td>{{ $detail->updated_at }}</td>
                                        <td>{{ $detail->status }}</td>
                                        <td>

                                            <div class="dropdown">
                                                <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="tio-settings"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item"
                                                       href="{{route('admin.barter.selldetail',[$detail['id']])}}"> Manage</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
					@endif
                </div>
            </div>
        </div>
				@if(count($sa)==0)
        <div class="row" style="margin-top: 20px">
			<div class="col-md-6">
			Please add your primary address firstly, before you can manage barter sold!! Add <a href="{{route('admin.address.add')}}">Here</a>
			</div>
		</div>
		@endif
    </div>
@endsection

@push('script')
    <!-- Page level plugins -->
    <script src="{{asset('public/assets/back-end')}}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('public/assets/back-end')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('public/assets/back-end/js/croppie.js')}}"></script>
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function () {
$.extend(true, $.fn.dataTable.defaults, {
    "lengthMenu": [[5, 10, 15, 20, 25], [5, 10, 15, 20, 25]],
    "pageLength": 5

});
$('#dataTable').DataTable(
{
    "iDisplayLength": 5,
    "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    }			);
        });
    </script>
@endpush
