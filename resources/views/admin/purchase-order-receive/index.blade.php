@extends('layouts.admin')
@section('title', 'Admin | Purchase orders')

@section('page-headder')
{{-- Categories --}}
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"> <a href="{{route('admin.dashboard')}}" class="text-primary"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item text-dark"><a href="{{route('admin.brand')}}">Purchase order Received</a></li>
@endsection

@section('button')
{{-- <button type="button" class="btn btn-success swalDefaultSuccess">Success</button>
    <button type="button" class="btn btn-info swalDefaultInfo">Info</button>
    <button type="button" class="btn btn-success toastrDefaultSuccess">Success</button>
    <button type="button" class="btn btn-danger toastrDefaultError">Error</button> --}}
<span class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal"> Add New</span>
@endsection

@section('content')
<div class="row">
    <div class="col-12 p-0">
        <div class="card">
            <div class="card-header justify-content-between py-3">
                <h4 class="card-title float-left pt-2">List of Received Purchase order</h4>

                <div class="float-right d-flex my-auto gap-3">
                    <div class="form-group mb-0">
                        <label for="mySelect p">Sort By:</label>
                        <select id="mySelect" class="selectpicker" data-live-search="true">
                            <option selected>Supplier</option>
                            <option>bengal Group</option>
                            <option>Modina LTD</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>

                    <div class="form-group mb-0" style="width:240px">
                        <input type="date" class="form-control" id="datepicker" name="datepicker">
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
            <div class="card-body card-body table-responsive p-0">
                <table id="example1" class="table table-hover">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Challan Number</th>
                            <th>SPO NO</th>
                            <th>SPO Date</th>
                            <th>Received Date</th>
                            <th>Receving Store</th>
                            <th>Purchase Qty</th>
                            <th>Received Qty</th>
                            <th class="status">Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="datatable">
                        <tr>
                            <td>01</td>
                            <td>CHL-9093732</td>
                            <td>SPO-434</td>
                            <td>12-July-2023</td>
                            <td>15-July-2023</td>
                            <td>Gulsan Store</td>
                            <td>500 PCS</td>
                            <td>500 PCS</td>
                            <td><span class="badge bg-success">Received</span></td>
                            <td>
                                <a href="" class="btn btn-info btn-sm text-light view border-0 view" id="view" rel="tooltip" title="view" data-id="4" data-bs-toggle="modal" data-bs-target="#viewModal"> <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>01</td>
                            <td>CHL-9093732</td>
                            <td>SPO-434</td>
                            <td>12-July-2023</td>
                            <td>15-July-2023</td>
                            <td>Gulsan Store</td>
                            <td>500 PCS</td>
                            <td>500 PCS</td>
                            <td><span class="badge bg-success">Received</span></td>
                            <td>
                                <a href="" class="btn btn-info btn-sm text-light view border-0 view" id="view" rel="tooltip" title="view" data-id="4" data-bs-toggle="modal" data-bs-target="#viewModal"> <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>01</td>
                            <td>CHL-9093732</td>
                            <td>SPO-434</td>
                            <td>12-July-2023</td>
                            <td>15-July-2023</td>
                            <td>Gulsan Store</td>
                            <td>500 PCS</td>
                            <td>500 PCS</td>
                            <td><span class="badge bg-success">Received</span></td>
                            <td>
                                <a href="" class="btn btn-info btn-sm text-light view border-0 view" id="view" rel="tooltip" title="view" data-id="4" data-bs-toggle="modal" data-bs-target="#viewModal"> <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>01</td>
                            <td>CHL-9093732</td>
                            <td>SPO-434</td>
                            <td>12-July-2023</td>
                            <td>15-July-2023</td>
                            <td>Gulsan Store</td>
                            <td>500 PCS</td>
                            <td>500 PCS</td>
                            <td><span class="badge bg-success">Received</span></td>
                            <td>
                                <a href="" class="btn btn-info btn-sm text-light view border-0 view" id="view" rel="tooltip" title="view" data-id="4" data-bs-toggle="modal" data-bs-target="#viewModal"> <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>01</td>
                            <td>CHL-9093732</td>
                            <td>SPO-434</td>
                            <td>12-July-2023</td>
                            <td>15-July-2023</td>
                            <td>Gulsan Store</td>
                            <td>500 PCS</td>
                            <td>500 PCS</td>
                            <td><span class="badge bg-success">Received</span></td>
                            <td>
                                <a href="" class="btn btn-info btn-sm text-light view border-0 view" id="view" rel="tooltip" title="view" data-id="4" data-bs-toggle="modal" data-bs-target="#viewModal"> <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>01</td>
                            <td>CHL-9093732</td>
                            <td>SPO-434</td>
                            <td>12-July-2023</td>
                            <td>15-July-2023</td>
                            <td>Gulsan Store</td>
                            <td>500 PCS</td>
                            <td>500 PCS</td>
                            <td><span class="badge bg-success">Received</span></td>
                            <td>
                                <a href="" class="btn btn-info btn-sm text-light view border-0 view" id="view" rel="tooltip" title="view" data-id="4" data-bs-toggle="modal" data-bs-target="#viewModal"> <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>01</td>
                            <td>CHL-9093732</td>
                            <td>SPO-434</td>
                            <td>12-July-2023</td>
                            <td>15-July-2023</td>
                            <td>Gulsan Store</td>
                            <td>500 PCS</td>
                            <td>500 PCS</td>
                            <td><span class="badge bg-success">Received</span></td>
                            <td>
                                <a href="" class="btn btn-info btn-sm text-light view border-0 view" id="view" rel="tooltip" title="view" data-id="4" data-bs-toggle="modal" data-bs-target="#viewModal"> <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>01</td>
                            <td>CHL-9093732</td>
                            <td>SPO-434</td>
                            <td>12-July-2023</td>
                            <td>15-July-2023</td>
                            <td>Gulsan Store</td>
                            <td>500 PCS</td>
                            <td>500 PCS</td>
                            <td><span class="badge bg-success">Received</span></td>
                            <td>
                                <a href="" class="btn btn-info btn-sm text-light view border-0 view" id="view" rel="tooltip" title="view" data-id="4" data-bs-toggle="modal" data-bs-target="#viewModal"> <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>01</td>
                            <td>CHL-9093732</td>
                            <td>SPO-434</td>
                            <td>12-July-2023</td>
                            <td>15-July-2023</td>
                            <td>Gulsan Store</td>
                            <td>500 PCS</td>
                            <td>500 PCS</td>
                            <td><span class="badge bg-success">Received</span></td>
                            <td>
                                <a href="" class="btn btn-info btn-sm text-light view border-0 view" id="view" rel="tooltip" title="view" data-id="4" data-bs-toggle="modal" data-bs-target="#viewModal"> <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>01</td>
                            <td>CHL-9093732</td>
                            <td>SPO-434</td>
                            <td>12-July-2023</td>
                            <td>15-July-2023</td>
                            <td>Gulsan Store</td>
                            <td>500 PCS</td>
                            <td>500 PCS</td>
                            <td><span class="badge bg-success">Received</span></td>
                            <td>
                                <a href="" class="btn btn-info btn-sm text-light view border-0 view" id="view" rel="tooltip" title="view" data-id="4" data-bs-toggle="modal" data-bs-target="#viewModal"> <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>


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
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addModalLabel">List of Purchase order for Received</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-md-4">
                        <div class="row">

                            <div class="mb-3 col-md-4">
                                <label>SPO No</label>
                                <select id="mySelect" class="selectpicker  w-100" data-live-search="true">
                                    <option>SPO-No</option>
                                    <option selected>SPO-344</option>
                                    <option>SPO-345</option>
                                </select>
                            </div>


                            <div class="mb-3 col-md-4">
                                <label>Challan No</label>
                                <input class="form-control" type="text" name="total_product" value="" placeholder="Challan Number">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label>SPO Date</label>
                                <input class="form-control" type="date" name="spo-date" value="2023-09-25">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label for="Company"> Company</label>
                                <select id="mySelect" class="selectpicker  w-100" data-live-search="true">
                                    <option selected>Supplier</option>
                                    <option>bengal Group</option>
                                    <option>Modina LTD</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Receive Date</label>
                                <input class="form-control" type="date" name="delivery-date" value="2023-09-25">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Delivery Point</label>
                                <select id="mySelect" class="selectpicker w-100" data-live-search="true" disabled>
                                    <option> Delivery Point</option>
                                    <option>gulsan store</option>
                                    <option selected>Fresh LTD</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Total SPO Qty</label>
                                <input class="form-control" type="number" name="total_product" value="36" disabled>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Total Delivered Qty</label>
                                <input class="form-control" type="number" name="total_product" value="36" disabled>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Total Receive Qty</label>
                                <input class="form-control" type="number" name="total_product" value="36" disabled>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Total Purchase Price </label>
                                <input class="form-control" type="number" value="3046" disabled>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Collected By </label>
                                <input class="form-control" type="text" value="Rahim">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Remarks </label>
                                <input class="form-control" type="text" placeholder="remarks...">
                            </div>
                        </div>


                        <div class="mb-3 row justify-content-center">
                            <table class="table mt-4 aiz-table table-bordered">
                                <thead>
                                    <tr class="bg-light my-auto">
                                        <th class="text-center">SL</th>
                                        <th class="text-left">Product Image</th>
                                        <th class="text-left">Product Name</th>
                                        <th class="text-center">Published Price</th>
                                        <th class="text-center">Purchase Price</th>
                                        <th class="text-center">Unit</th>
                                        <th class="text-center">Stock Qty</th>
                                        <th class="text-center">Purchase Qty</th>
                                        <th class="text-center">Delivered Qty</th>
                                        <th class="text-center">Receive Qty</th>
                                        <th class="text-left">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-left">Image</td>
                                        <td class="text-left">Rupcada Oil</td>
                                        <td class="text-center">9373 TK</td>
                                        <td class="text-center">6733 TK</td>
                                        <td class="text-center">PCS</td>
                                        <td class="text-center"><input type="number" class="form-control" value="10" min="1" max="1000" placeholder="Stock Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty"></td>
                                        <td class="text-left"><input type="text" class="form-control" placeholder="Remarks"></td>

                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-left">Image</td>
                                        <td class="text-left">Rupcada Oil</td>
                                        <td class="text-center">9373 TK</td>
                                        <td class="text-center">6733 TK</td>
                                        <td class="text-center">PCS</td>
                                        <td class="text-center"><input type="number" class="form-control" value="10" min="1" max="1000" placeholder="Stock Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty"></td>
                                        <td class="text-left"><input type="text" class="form-control" placeholder="Remarks"></td>

                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-left">Image</td>
                                        <td class="text-left">Rupcada Oil</td>
                                        <td class="text-center">9373 TK</td>
                                        <td class="text-center">6733 TK</td>
                                        <td class="text-center">PCS</td>
                                        <td class="text-center"><input type="number" class="form-control" value="10" min="1" max="1000" placeholder="Stock Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty"></td>
                                        <td class="text-left"><input type="text" class="form-control" placeholder="Remarks"></td>

                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-left">Image</td>
                                        <td class="text-left">Rupcada Oil</td>
                                        <td class="text-center">9373 TK</td>
                                        <td class="text-center">6733 TK</td>
                                        <td class="text-center">PCS</td>
                                        <td class="text-center"><input type="number" class="form-control" value="10" min="1" max="1000" placeholder="Stock Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty"></td>
                                        <td class="text-left"><input type="text" class="form-control" placeholder="Remarks"></td>

                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-left">Image</td>
                                        <td class="text-left">Rupcada Oil</td>
                                        <td class="text-center">9373 TK</td>
                                        <td class="text-center">6733 TK</td>
                                        <td class="text-center">PCS</td>
                                        <td class="text-center"><input type="number" class="form-control" value="10" min="1" max="1000" placeholder="Stock Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty"></td>
                                        <td class="text-left"><input type="text" class="form-control" placeholder="Remarks"></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mb-3 text-right">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-warning">Received</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        {{-- view modal --}}
        <div class="modal fade" id="viewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addModalLabel">List of Purchase order for Received</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-md-4">
                        <div class="row">

                            <div class="mb-3 col-md-4">
                                <label>SPO No</label>
                                <select id="mySelect" class="selectpicker  w-100" data-live-search="true" disabled>
                                    <option>SPO-No</option>
                                    <option selected>SPO-344</option>
                                    <option>SPO-345</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>SPO Date</label>
                                <input class="form-control" type="date" name="spo-date" value="2023-09-25" disabled>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label>Challan No</label>
                                <input class="form-control" type="text" name="total_product" value="CHL-344" disabled>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label for="Company"> Company</label>
                                <select id="mySelect" class="selectpicker  w-100" data-live-search="true" disabled>
                                    <option selected>Supplier</option>
                                    <option>bengal Group</option>
                                    <option>Modina LTD</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Receive Date</label>
                                <input class="form-control" type="date" name="delivery-date" value="2023-09-25" disabled>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Delivery Point</label>
                                <select id="mySelect" class="selectpicker w-100" data-live-search="true" disabled>
                                    <option> Delivery Point</option>
                                    <option>gulsan store</option>
                                    <option selected>Fresh LTD</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Total SPO Qty</label>
                                <input class="form-control" type="number" name="total_product" value="36" disabled>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Total Delivered Qty</label>
                                <input class="form-control" type="number" name="total_product" value="36" disabled>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Total Receive Qty</label>
                                <input class="form-control" type="number" name="total_product" value="36" disabled>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Total Purchase Price </label>
                                <input class="form-control" type="number" value="3046" disabled>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Collected By </label>
                                <input class="form-control" type="text" value="Rahim" disabled>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Remarks </label>
                                <input class="form-control" type="text" placeholder="remarks..." disabled>
                            </div>
                        </div>


                        <div class="mb-3 row justify-content-center">
                            <table class="table mt-4 aiz-table table-bordered">
                                <thead>
                                    <tr class="bg-light my-auto">
                                        <th class="text-center">SL</th>
                                        <th class="text-left">Product Image</th>
                                        <th class="text-left">Product Name</th>
                                        <th class="text-center">Published Price</th>
                                        <th class="text-center">Purchase Price</th>
                                        <th class="text-center">Unit</th>
                                        <th class="text-center">Stock Qty</th>
                                        <th class="text-center">Purchase Qty</th>
                                        <th class="text-center">Delivered Qty</th>
                                        <th class="text-center">Receive Qty</th>
                                        <th class="text-left">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-left">Image</td>
                                        <td class="text-left">Rupcada Oil</td>
                                        <td class="text-center">9373 TK</td>
                                        <td class="text-center">6733 TK</td>
                                        <td class="text-center">PCS</td>
                                        <td class="text-center"><input type="number" class="form-control" value="10" min="1" max="1000" placeholder="Stock Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-left"><input type="text" class="form-control" placeholder="Remarks" disabled></td>

                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-left">Image</td>
                                        <td class="text-left">Rupcada Oil</td>
                                        <td class="text-center">9373 TK</td>
                                        <td class="text-center">6733 TK</td>
                                        <td class="text-center">PCS</td>
                                        <td class="text-center"><input type="number" class="form-control" value="10" min="1" max="1000" placeholder="Stock Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-left"><input type="text" class="form-control" placeholder="Remarks" disabled></td>

                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-left">Image</td>
                                        <td class="text-left">Rupcada Oil</td>
                                        <td class="text-center">9373 TK</td>
                                        <td class="text-center">6733 TK</td>
                                        <td class="text-center">PCS</td>
                                        <td class="text-center"><input type="number" class="form-control" value="10" min="1" max="1000" placeholder="Stock Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-left"><input type="text" class="form-control" placeholder="Remarks" disabled></td>

                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-left">Image</td>
                                        <td class="text-left">Rupcada Oil</td>
                                        <td class="text-center">9373 TK</td>
                                        <td class="text-center">6733 TK</td>
                                        <td class="text-center">PCS</td>
                                        <td class="text-center"><input type="number" class="form-control" value="10" min="1" max="1000" placeholder="Stock Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-left"><input type="text" class="form-control" placeholder="Remarks" disabled></td>

                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-left">Image</td>
                                        <td class="text-left">Rupcada Oil</td>
                                        <td class="text-center">9373 TK</td>
                                        <td class="text-center">6733 TK</td>
                                        <td class="text-center">PCS</td>
                                        <td class="text-center"><input type="number" class="form-control" value="10" min="1" max="1000" placeholder="Stock Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-center"><input type="number" class="form-control" value="1" min="1" max="1000" placeholder="Purchase Qty" disabled></td>
                                        <td class="text-left"><input type="text" class="form-control" placeholder="Remarks" disabled></td>

                                    </tr>
                                </tbody>
                            </table>
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
<script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
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
                "responsive": true
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
