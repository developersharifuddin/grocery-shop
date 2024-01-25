@extends('layouts.admin')
@section('title', 'Admin | Employee')

@section('page-headder')
{{-- Categories --}}
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"> <a href="{{route('admin.dashboard')}}" class="text-primary"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item text-dark"><a href="{{route('admin.employee')}}">Employee</a></li>
@endsection

@section('button')
<span class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal"> Add New</span>
@endsection

@section('content')
<div class="row">
    <div class="col-12 p-0">
        <div class="card">
            <div class="card-header justify-content-between py-3">
                <h4 class="card-title float-left pt-2">All Employee</h4>

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
                            <th>SL</th>
                            <th class="image">Image</th>
                            <th>Employee Name</th>
                            <th>Employee Name Bangla</th>
                            <th>Email</th>
                            <th>Branch</th>
                            <th>Store</th>
                            <th>Role</th>
                            <th class="status">Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="datatable">
                        <tr>
                            <td>01</td>
                            <td>
                                <img src="{{ asset('storage/default.jpg') }}" alt="default.jpg" width="60px">
                            </td>
                            <td>Riyat khan</td>
                            <td>Riyat khan</td>
                            <td>riyat50@gmail.com</td>
                            <td>Dhaka</td>
                            <td>Modina Store</td>
                            <td><span class="badge bg-success">Sales Man</span></td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="switchButton" checked>
                                </div>
                            </td>
                            <td>
                                <a link="#" class="btn btn-primary btn-sm edit text-light border-0 edit" rel="tooltip" id="edit" title="Edit" data-id="4" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@mdo">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="" class="btn btn-info btn-sm text-light view border-0 view" id="view" rel="tooltip" title="view" data-id="4" data-bs-toggle="modal" data-bs-target="#viewModal">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>
                                <img src="{{ asset('storage/default.jpg') }}" alt="default.jpg" width="60px">
                            </td>
                            <td>Riyat khan</td>
                            <td>Riyat khan</td>
                            <td>riyat50@gmail.com</td>
                            <td>Dhaka</td>
                            <td>Modina Store</td>
                            <td><span class="badge bg-success">Sales Man</span></td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="switchButton" checked>
                                </div>
                            </td>
                            <td>
                                <a link="#" class="btn btn-primary btn-sm edit text-light border-0 edit" rel="tooltip" id="edit" title="Edit" data-id="4" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@mdo">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="" class="btn btn-info btn-sm text-light view border-0 view" id="view" rel="tooltip" title="view" data-id="4" data-bs-toggle="modal" data-bs-target="#viewModal">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>
                                <img src="{{ asset('storage/default.jpg') }}" alt="default.jpg" width="60px">
                            </td>
                            <td>Riyat khan</td>
                            <td>Riyat khan</td>
                            <td>riyat50@gmail.com</td>
                            <td>Dhaka</td>
                            <td>Modina Store</td>
                            <td><span class="badge bg-success">Sales Man</span></td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="switchButton" checked>
                                </div>
                            </td>
                            <td>
                                <a link="#" class="btn btn-primary btn-sm edit text-light border-0 edit" rel="tooltip" id="edit" title="Edit" data-id="4" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@mdo">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="" class="btn btn-info btn-sm text-light view border-0 view" id="view" rel="tooltip" title="view" data-id="4" data-bs-toggle="modal" data-bs-target="#viewModal">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>
                                <img src="{{ asset('storage/default.jpg') }}" alt="default.jpg" width="60px">
                            </td>
                            <td>Riyat khan</td>
                            <td>Riyat khan</td>
                            <td>riyat50@gmail.com</td>
                            <td>Dhaka</td>
                            <td>Modina Store</td>
                            <td><span class="badge bg-success">Sales Man</span></td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="switchButton" checked>
                                </div>
                            </td>
                            <td>
                                <a link="#" class="btn btn-primary btn-sm edit text-light border-0 edit" rel="tooltip" id="edit" title="Edit" data-id="4" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@mdo">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="" class="btn btn-info btn-sm text-light view border-0 view" id="view" rel="tooltip" title="view" data-id="4" data-bs-toggle="modal" data-bs-target="#viewModal">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>
                                <img src="{{ asset('storage/default.jpg') }}" alt="default.jpg" width="60px">
                            </td>
                            <td>Riyat khan</td>
                            <td>Riyat khan</td>
                            <td>riyat50@gmail.com</td>
                            <td>Dhaka</td>
                            <td>Modina Store</td>
                            <td><span class="badge bg-success">Sales Man</span></td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="switchButton" checked>
                                </div>
                            </td>
                            <td>
                                <a link="#" class="btn btn-primary btn-sm edit text-light border-0 edit" rel="tooltip" id="edit" title="Edit" data-id="4" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@mdo">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="" class="btn btn-info btn-sm text-light view border-0 view" id="view" rel="tooltip" title="view" data-id="4" data-bs-toggle="modal" data-bs-target="#viewModal">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>
                                <img src="{{ asset('storage/default.jpg') }}" alt="default.jpg" width="60px">
                            </td>
                            <td>Riyat khan</td>
                            <td>Riyat khan</td>
                            <td>riyat50@gmail.com</td>
                            <td>Dhaka</td>
                            <td>Modina Store</td>
                            <td><span class="badge bg-success">Sales Man</span></td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="switchButton" checked>
                                </div>
                            </td>
                            <td>
                                <a link="#" class="btn btn-primary btn-sm edit text-light border-0 edit" rel="tooltip" id="edit" title="Edit" data-id="4" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@mdo">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="" class="btn btn-info btn-sm text-light view border-0 view" id="view" rel="tooltip" title="view" data-id="4" data-bs-toggle="modal" data-bs-target="#viewModal">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>
                                <img src="{{ asset('storage/default.jpg') }}" alt="default.jpg" width="60px">
                            </td>
                            <td>Riyat khan</td>
                            <td>Riyat khan</td>
                            <td>riyat50@gmail.com</td>
                            <td>Dhaka</td>
                            <td>Modina Store</td>
                            <td><span class="badge bg-success">Sales Man</span></td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="switchButton" checked>
                                </div>
                            </td>
                            <td>
                                <a link="#" class="btn btn-primary btn-sm edit text-light border-0 edit" rel="tooltip" id="edit" title="Edit" data-id="4" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@mdo">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="" class="btn btn-info btn-sm text-light view border-0 view" id="view" rel="tooltip" title="view" data-id="4" data-bs-toggle="modal" data-bs-target="#viewModal">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>
                                <img src="{{ asset('storage/default.jpg') }}" alt="default.jpg" width="60px">
                            </td>
                            <td>Riyat khan</td>
                            <td>Riyat khan</td>
                            <td>riyat50@gmail.com</td>
                            <td>Dhaka</td>
                            <td>Modina Store</td>
                            <td><span class="badge bg-success">Sales Man</span></td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="switchButton" checked>
                                </div>
                            </td>
                            <td>
                                <a link="#" class="btn btn-primary btn-sm edit text-light border-0 edit" rel="tooltip" id="edit" title="Edit" data-id="4" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@mdo">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="" class="btn btn-info btn-sm text-light view border-0 view" id="view" rel="tooltip" title="view" data-id="4" data-bs-toggle="modal" data-bs-target="#viewModal">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>
                                <img src="{{ asset('storage/default.jpg') }}" alt="default.jpg" width="60px">
                            </td>
                            <td>Riyat khan</td>
                            <td>Riyat khan</td>
                            <td>riyat50@gmail.com</td>
                            <td>Dhaka</td>
                            <td>Modina Store</td>
                            <td><span class="badge bg-success">Sales Man</span></td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="switchButton" checked>
                                </div>
                            </td>
                            <td>
                                <a link="#" class="btn btn-primary btn-sm edit text-light border-0 edit" rel="tooltip" id="edit" title="Edit" data-id="4" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@mdo">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="" class="btn btn-info btn-sm text-light view border-0 view" id="view" rel="tooltip" title="view" data-id="4" data-bs-toggle="modal" data-bs-target="#viewModal">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>
                                <img src="{{ asset('storage/default.jpg') }}" alt="default.jpg" width="60px">
                            </td>
                            <td>Riyat khan</td>
                            <td>Riyat khan</td>
                            <td>riyat50@gmail.com</td>
                            <td>Dhaka</td>
                            <td>Modina Store</td>
                            <td><span class="badge bg-success">Sales Man</span></td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="switchButton" checked>
                                </div>
                            </td>
                            <td>
                                <a link="#" class="btn btn-primary btn-sm edit text-light border-0 edit" rel="tooltip" id="edit" title="Edit" data-id="4" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@mdo">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="" class="btn btn-info btn-sm text-light view border-0 view" id="view" rel="tooltip" title="view" data-id="4" data-bs-toggle="modal" data-bs-target="#viewModal">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>
                                <img src="{{ asset('storage/default.jpg') }}" alt="default.jpg" width="60px">
                            </td>
                            <td>Riyat khan</td>
                            <td>Riyat khan</td>
                            <td>riyat50@gmail.com</td>
                            <td>Dhaka</td>
                            <td>Modina Store</td>
                            <td><span class="badge bg-success">Sales Man</span></td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="switchButton" checked>
                                </div>
                            </td>
                            <td>
                                <a link="#" class="btn btn-primary btn-sm edit text-light border-0 edit" rel="tooltip" id="edit" title="Edit" data-id="4" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@mdo">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="" class="btn btn-info btn-sm text-light view border-0 view" id="view" rel="tooltip" title="view" data-id="4" data-bs-toggle="modal" data-bs-target="#viewModal">
                                    <i class="fas fa-eye"></i>
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
                        <h1 class="modal-title fs-5" id="addModalLabel">Add New employee</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-md-4">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label>Employee Name</label>
                                <input class="form-control" type="text" name="name" placeholder="Employee Name English..." value="">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Employee Name Bangla</label>
                                <input class="form-control" type="text" name="nameBn" placeholder="Name Bangla..." value="">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label>Phone Number</label>
                                <input class="form-control" type="number" name="phone" placeholder="phone Number..." value="">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Email Address</label>
                                <input class="form-control" type="email" name="email" placeholder="email..." value="">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label>Branch</label>
                                <select id="mySelect" class="selectpicker  w-100" data-live-search="true">
                                    <option>Select Branch</option>
                                    <option>Dhaka</option>
                                    <option>Rajshahi</option>
                                </select>
                            </div>


                            <div class="mb-3 col-md-4">
                                <label>Store</label>
                                <select id="mySelect" class="selectpicker  w-100" data-live-search="true">
                                    <option>Select Store</option>
                                    <option>Modina Store</option>
                                    <option>Mokka Store</option>
                                </select>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label>NID Number</label>
                                <input class="form-control" type="file" name="nid" placeholder="NID..." value="">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label>Upload NID</label>
                                <input class="form-control" type="file" name="nidcard" placeholder="nidcard..." value="">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label>Profile Picture</label>
                                <input class="form-control" type="file" name="Image" placeholder="Image..." value="">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="floatingTextareadesc1"> Present Address</label>
                                <textarea class="form-control" name="presentAddress" placeholder="Leave a Present Address here.." id="floatingTextareadesc1"></textarea>
                            </div>


                            <div class="mb-3 col-md-6">
                                <label for="floatingTextareadesc2"> Permanent Address</label>
                                <textarea class="form-control" name="permanentAddress" placeholder="Leave a Permanent Address here.." id="floatingTextareadesc2"></textarea>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="floatingTextareadesc3"> Descriptions</label>
                                <textarea class="form-control" placeholder="Leave a  Descriptions here.." id="floatingTextareadesc3"></textarea>
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
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addModalLabel">Add New employee</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-md-4">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label>Employee Name</label>
                                <input class="form-control" type="text" name="name" placeholder="Employee Name English..." value="Riyat khan">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Employee Name Bangla</label>
                                <input class="form-control" type="text" name="nameBn" placeholder="Name Bangla..." value="Riyat khan">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label>Phone Number</label>
                                <input class="form-control" type="number" name="phone" placeholder="phone Number..." value="01965674161">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Email Address</label>
                                <input class="form-control" type="email" name="email" placeholder="email..." value="riyat@gmail.com">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label>Branch</label>
                                <select id="mySelect" class="selectpicker  w-100" data-live-search="true">
                                    <option>Select Branch</option>
                                    <option selected>Dhaka</option>
                                    <option>Rajshahi</option>
                                </select>
                            </div>


                            <div class="mb-3 col-md-4">
                                <label>Store</label>
                                <select id="mySelect" class="selectpicker  w-100" data-live-search="true">
                                    <option>Select Store</option>
                                    <option selected>Modina Store</option>
                                    <option>Mokka Store</option>
                                </select>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label>NID Number</label>
                                <input class="form-control" type="file" name="nid" placeholder="NID..." value="9832987212373">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label>Upload NID</label>
                                <input class="form-control" type="file" name="nidcard" placeholder="nidcard..." value="">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label>Profile Picture</label>
                                <input class="form-control" type="file" name="Image" placeholder="Image..." value="">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="floatingTextareadesc1"> Present Address</label>
                                <textarea class="form-control" name="presentAddress" placeholder="Leave a Present Address here.." id="floatingTextareadesc1">Gazipur</textarea>
                            </div>


                            <div class="mb-3 col-md-6">
                                <label for="floatingTextareadesc2"> Permanent Address</label>
                                <textarea class="form-control" name="permanentAddress" placeholder="Leave a Permanent Address here.." id="floatingTextareadesc2">Gazipur</textarea>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="floatingTextareadesc3"> Descriptions</label>
                                <textarea class="form-control" placeholder="Leave a  Descriptions here.." id="floatingTextareadesc3">Sells man.</textarea>
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
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addModalLabel">Add New employee</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-md-4">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label>Employee Name</label>
                                <input class="form-control" type="text" name="name" placeholder="Employee Name English..." value="Riyat khan" disabled>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Employee Name Bangla</label>
                                <input class="form-control" type="text" name="nameBn" placeholder="Name Bangla..." value="Riyat khan" disabled>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label>Phone Number</label>
                                <input class="form-control" type="number" name="phone" placeholder="phone Number..." value="01965674161" disabled>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Email Address</label>
                                <input class="form-control" type="email" name="email" placeholder="email..." value="riyat@gmail.com" disabled>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label>Branch</label>
                                <select id="mySelect" class="selectpicker  w-100" data-live-search="true" disabled>
                                    <option>Select Branch</option>
                                    <option selected>Dhaka</option>
                                    <option>Rajshahi</option>
                                </select>
                            </div>


                            <div class="mb-3 col-md-4">
                                <label>Store</label>
                                <select id="mySelect" class="selectpicker  w-100" data-live-search="true" disabled>
                                    <option>Select Store</option>
                                    <option selected>Modina Store</option>
                                    <option>Mokka Store</option>
                                </select>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label>NID Number</label>
                                <input class="form-control" type="file" name="nid" placeholder="NID..." value="9832987212373" disabled>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label>Upload NID</label>
                                <input class="form-control" type="file" name="nidcard" placeholder="nidcard..." value="" disabled>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label>Profile Picture</label>
                                <input class="form-control" type="file" name="Image" placeholder="Image..." value="" disabled>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="floatingTextareadesc1"> Present Address</label>
                                <textarea class="form-control" name="presentAddress" placeholder="Leave a Present Address here.." id="floatingTextareadesc1" disabled>Gazipur</textarea>
                            </div>


                            <div class="mb-3 col-md-6">
                                <label for="floatingTextareadesc2"> Permanent Address</label>
                                <textarea class="form-control" name="permanentAddress" placeholder="Leave a Permanent Address here.." id="floatingTextareadesc2" disabled>Gazipur</textarea>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="floatingTextareadesc3"> Descriptions</label>
                                <textarea class="form-control" placeholder="Leave a  Descriptions here.." id="floatingTextareadesc3" disabled>Sells man.</textarea>
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