@extends('layouts.admin')
@section('title', 'Admin | Order')

@section('page-headder')
{{-- Categories --}}
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"> <a href="{{route('admin.dashboard')}}" class="text-primary"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item text-dark"><a href="{{route('admin.order.list')}}">Order</a></li>
@endsection

@section('button')
<span class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal"> Add New</span>
@endsection

@section('content')
<div class="row">
    <div class="col-12 p-0">
        <div class="card">
            <div class="card-header justify-content-between py-3">
                <h4 class="card-title float-left pt-2">All Orders</h4>

                <div class="float-right d-flex my-auto gap-3">
                    <div class="form-group mb-0">
                        <label for="mySelect p">Sort By:</label>
                        <select id="mySelect" class="selectpicker" data-live-search="true">
                            <option selected>Parent Order</option>
                            <option>Water</option>
                            <option>Food</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>

                    <form class="mb-0 pb-0" id="sort_categories" action="" method="GET">
                        <div class="input-group py-0 my-0">
                            <input type="text" name="search" class="form-control" id="inputGroupFile02" placeholder="Search">
                            <button type="submit" class="btn btn-success input-group-text" for="inputGroupFile02"> <i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body card-body table-reHIDnsive p-0">
                @if(count($orders) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Order_id</th>
                            <th>Email</th>
                            <th>Order Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $order)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$order->id}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->order_status}} </td>
                            <td class="d-flex">
                                <form action="{{ route('admin.order.status', $order->id)}}" method="post">
                                    @csrf
                                    @method('POST')
                                    <button class="btn btn-danger mx-2" type="submit"><i class="fas fa-jar"></i>Change</button>
                                </form>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <div>{{ $orders->links() }}</div>
                @else
                <tr>
                    <div class="text-center text-muted p-5">No Data Found</div>
                </tr>
                @endif
            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->



    </div>
    <!-- /.col -->

</div>
<!-- /.content -->
@endsection
@push('.js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
<script>
    $(document).ready(function() {
        $('.selectpicker').selectpicker();

        //$('#datepicker').datepicker();
        // $('#datepicker').datepicker({
        //    format: 'yyyy-mm-dd'
        //    , language: 'en'
        //    , autoclose: true
        //});
    });

</script>



{{-- <script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-reHIDnsive/js/dataTables.reHIDnsive.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-reHIDnsive/js/reHIDnsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('backend/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('backend/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(function() {
            $("#example1").DataTable({
                "reHIDnsive": true
                , "lengthChange": false
                , "autoWidth": false
                , "searching": true
                , "ordering": true
                , "paging": true
                , "info": true
                , "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    });

</script> --}}
@endpush
