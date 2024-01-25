@extends('layouts.admin')
@section('title', 'Admin | product')

@section('content')
<div class="row my-auto align-items-center bg-white shadow-md border mb-3 py-2">
    <div class="col-md-6">
        <span class="my-auto h6 page-headder">@yield('page-headder')</span>
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"> <a href="{{route('admin.dashboard')}}" class="text-primary"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item text-dark"><a href="{{route('admin.sales.index')}}">sales</a></li>


        </ol>
    </div>
    <div class="col-md-6">
        <ol class="float-right button">
            <a href="{{ route('admin.barcode.create') }}" class="btn btn-success">Generate New Barcode</a>

        </ol>
    </div>
</div>




<div class="row">
    <div class="col-12 p-0">
        <div class="card">
            <div class="card-header justify-content-between py-3">
                <h4 class="card-title float-left pt-2">All product Barcode Generate</h4>

                <div class="float-right d-flex my-auto gap-3">

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
                <table id="example1" class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-start">Product ID</th>
                            <th class="text-start">Product Name</th>
                            <th>Barcode Number</th>
                            <th style="text-align: left !important;">Barcode</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td class="text-start">{{ $product->id }}</td>
                            <td class="text-start">{{ $product->name }}</td>
                            <td>{!! $product->code !!}</td>
                            {{-- <td>{!! DNS1D::getBarcodeHTML($product->code, 'C39') !!}</td> --}}
                            <td style="text-align: middle !important;">{!! DNS1D::getBarcodeHTML($product->code, 'C39',1.5,55,'green', true) !!}</td>
                            {{-- {!! '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($product->code, 'C39+') . '" alt="barcode" />' !!} --}}

                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pt-4 pb-2 px-4">
                    <div class="pagination d-flex justify-content-between">
                        <div class="d-flex">
                            <div class="dataTables_length" id="example_length" class="from-group">
                                <label>Show
                                    <select name="example_length" aria-controls="example" class="from-control form-select-sm" aria-label=".form-select-sm example">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                    entries
                                </label>
                            </div>
                            <div class="dataTables_info pl-5" id="example_info" role="status" aria-live="polite">
                                Showing 1 to 10 of 57 entries
                            </div>
                        </div>
                        <ul class="pagination">
                            <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                <span class="page-link" aria-hidden="true">‹ Previous</span>
                            </li>
                            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                            <li class="page-item"><a class="page-link" href="#?page=2&amp;">2</a></li>
                            <li class="page-item"><a class="page-link" href="#?page=3&amp;">3</a></li>
                            <li class="page-item"><a class="page-link" href="#?page=4&amp;">4</a></li>
                            <li class="page-item"><a class="page-link" href="#?page=5&amp;">5</a></li>
                            <li class="page-item"><a class="page-link" href="#?page=6&amp;">6</a></li>
                            <li class="page-item"><a class="page-link" href="#&amp;">...</a></li>
                            <li class="page-item"><a class="page-link" href="#?page=14&amp;">10</a></li>
                            <li class="page-item"><a class="page-link" href="#?page=15&amp;">14</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#?page=2&amp;" rel="next" aria-label="Next »">Next ›</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->



        {{-- add modal --}}
        <div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addModalLabel">Add New product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-md-4">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label>product Name</label>
                                <input class="form-control" type="text" name="HID-date" placeholder="product Name English..." value="">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Name Bangla</label>
                                <input class="form-control" type="text" name="HID-date" placeholder="Name Bangla..." value="">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label>Bin Number</label>
                                <input class="form-control" type="number" name="bin" placeholder="Bin Number..." value="">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Email</label>
                                <label>Email</label>
                                <input class="form-control" type="email" name="bin" placeholder="email..." value="">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Image</label>
                                <input class="form-control" type="file" name="Image" placeholder="Bin Number..." value="">
                            </div>


                            <div class="mb-3 col-md-12">
                                <label for="floatingTextareadesc"> Address</label>
                                <textarea class="form-control" placeholder="Leave a  Address here.." id="floatingTextareadesc"></textarea>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="floatingTextareadesc"> Descriptions</label>
                                <textarea class="form-control" placeholder="Leave a  Descriptions here.." id="floatingTextareadesc"></textarea>
                            </div>

                        </div>
                        <div class="mb-3 text-right">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-warning">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- edit modal --}}
        <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addModalLabel">Edit product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-md-4">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label>product Name</label>
                                <input class="form-control" type="text" name="HID-date" placeholder="product Name English..." value="madina group of industries Dhaka">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Name Bangla</label>
                                <input class="form-control" type="text" name="HID-date" placeholder="Name Bangla..." value="madina group of industries Dhaka">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Bin Number</label>
                                <input class="form-control" type="number" name="bin" placeholder="Bin Number..." value="">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Email</label>
                                <input class="form-control" type="email" name="bin" placeholder="email..." value="">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Image</label>
                                <input class="form-control" type="file" name="Image" placeholder="Bin Number..." value="">
                            </div>


                            <div class="mb-3 col-md-12">
                                <label for="floatingTextareadesc"> Address</label>
                                <textarea class="form-control" placeholder="Leave a  Address here.." id="floatingTextareadesc"></textarea>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="floatingTextareadesc"> Descriptions</label>
                                <textarea class="form-control" placeholder="Leave a  Descriptions here.." id="floatingTextareadesc"></textarea>
                            </div>

                        </div>
                        <div class="mb-3 text-right">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-warning">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        {{-- view modal --}}
        <div class="modal fade" id="viewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addModalLabel">View product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-md-4">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label>product Name</label>
                                <input class="form-control" type="text" name="HID-date" placeholder="product Name English..." value="madina group of industries Dhaka" disabled>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Name Bangla</label>
                                <input class="form-control" type="text" name="HID-date" placeholder="Name Bangla..." value="madina group of industries Dhaka" disabled>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label>Bin Number</label>
                                <input class="form-control" type="number" name="bin" placeholder="Bin Number..." value="">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label>Email</label>
                                <input class="form-control" type="email" name="bin" placeholder="email..." value="">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label>Image</label>
                                <input class="form-control" type="file" name="Image" placeholder="Bin Number..." value="">
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="floatingTextareadesc"> Address</label>
                                <textarea class="form-control" placeholder="Leave a  Address here.." id="floatingTextareadesc"></textarea>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="floatingTextareadesc"> Descriptions</label>
                                <textarea class="form-control" placeholder="Leave a  Descriptions here.." id="floatingTextareadesc" disabled></textarea>
                            </div>

                        </div>
                        <div class="mb-3 text-right">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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