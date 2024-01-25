@extends('layouts.admin')
@section('title', 'Admin | Category')

@section('page-headder')
{{-- Categories --}}
@endsection

@section('content')
<div class="row my-auto align-items-center bg-white shadow-md border mb-3 py-2">
    <div class="col-sm-6">
        <span class="my-auto h6 page-headder">@yield('page-headder')</span>
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"> <a href="{{ route('admin.dashboard') }}" class="text-primary"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item text-dark"><a href="{{ route('admin.categories.index') }}">Category</a></li>
        </ol>
    </div>
    <div class="col-sm-6">
        <ol class="float-right button">
            <span class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal"> Add New</span>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Add Category</a>

        </ol>
    </div>
</div>




<div class="row">
    <div class="col-12 p-0">
        <div class="card">
            <div class="card-header justify-content-between py-3">
                <h4 class="card-title float-left pt-2">All Category</h4>

                <div class="float-right d-flex">
                    <form action="{{ route('admin.categories.index') }}" method="GET" class="float-right d-flex my-auto gap-3">
                        <div class="form-group mb-0 d-flex w-auto">
                            <label for="mySelect">Sort By:</label>
                            <select name="type" class="selectpicker">
                                <option value="" {{ request('type') == '' ? 'selected' : '' }}>All Categories
                                </option>
                                <option value="0" {{ request('type') == 'parent' ? 'selected' : '' }}>Parent
                                    Category</option>
                                <option value="1" {{ request('type') == 'child' ? 'selected' : '' }}>Child Category
                                </option>
                            </select>


                            <select name="parent_id" id="Select">
                                <option value="" value="" {{ request('parent_id') == '' ? 'selected' : '' }}>-- Select Parent --</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ request('parent_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name_english }}
                                </option>
                                @if (count($category->children) > 0)
                                @foreach ($category->children as $child)
                                <option value="{{ $child->id }}" {{ request('parent_id') == $child->id ? 'selected' : '' }}>
                                    &nbsp;&nbsp;&nbsp;{{ $child->name_english }}
                                </option>
                                @endforeach
                                @endif
                                @endforeach
                            </select>


                        </div>
                        <div class="input-group py-0 my-0">
                            <input type="text" name="search" class="form-control" id="inputGroupFile02" placeholder="Search by name" value="{{ request('search') }}">
                        </div>
                        <button type="submit" class="btn btn-success input-group-text" for="inputGroupFile02"> <i class="fas fa-search"></i></button>
                    </form>

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body card-body table-reHIDnsive p-0">
                <table id="example1" class="table table-hover">
                    <thead>
                        <tr>
                            <th>S/L</th>
                            <th class="image">Logo</th>
                            <th>Name (English)</th>
                            <th>Name (Bangla)</th>
                            <th>Slug</th>
                            <th>Parent Category</th>
                            <th>Type</th>
                            <th>Meta Title</th>
                            <th>Meta Description</th>
                            <th>Home Status</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>


                    <tbody id="datatable">
                        @if (count($categories) > 0)
                        @foreach ($categories as $key => $category)
                        <tr>
                            <td>{{ $categories->firstItem() + $loop->index }}</td>
                            {{-- <td>{{ $categories->total() - $categories->perPage() * ($categories->currentPage() - 1) - $loop->index }}</td> --}}
                            <td>
                                <img src="{{ $category->logo ?? "asset('storage/default.jpg", "asset('storage/default.jpg')" }}" alt="default.jpg" width="60px">
                            </td>
                            <td>{{ $category->name_english }}</td>
                            <td>{{ $category->name_bangla }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->parent ? $category->parent->name_english : 'N/A' }}</td>
                            <td>{{ $category->type }}</td>
                            <td>
                                <p class="text-start" style="max-width:250px">{{ $category->meta_title }}</p>
                            </td>
                            <td>
                                <p class="text-start" style="max-width:250px">{{ $category->meta_description }}
                                </p>
                            </td>
                            <td>{{ $category->home_status ? 'Yes' : 'No' }}</td>
                            <td>
                                {{ $category->status ? 'Active' : 'Inactive' }}
                                {{-- <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="switchButton" checked>
                                </div> --}}
                            </td>
                            <td>
                                <a href="{{ route('admin.categories.edits', $category->slug) }}" class="btn btn-primary btn-sm edit text-light border-0" title="Edit">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger delete" onclick="return confirm('Are you sure?')"> <i class="fas fa-trash-can"></i></button>
                                </form>

                                {{-- <a link="#" class="btn btn-primary btn-sm edit text-light border-0" rel="tooltip" id="edit" title="Edit" data-id="4" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@mdo">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a> --}}
                                <a href="" class="btn btn-info btn-sm text-light view border-0 view" id="view" rel="tooltip" title="view" data-id="4" data-bs-toggle="modal" data-bs-target="#viewModal">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr class="h-50">
                            <td colspan="13">
                                <h4 class="fs-4">No Record Found</h4>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>

                <div class="pt-4 pb-2 px-4">
                    <div class="pagination d-flex justify-content-between">
                        <!-- ... (previous content) -->
                        <div class="d-flex">
                            <!-- Your Blade file -->

                            {{-- <form method="GET" action="{{ route('admin.categories.index') }}">
                            <label for="per_page">Entries per Page:</label>
                            <select name="per_page" id="per_page" onchange="this.form.submit()">
                                <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                                <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20</option>
                                <option value="30" {{ request('per_page') == 30 ? 'selected' : '' }}>30</option>
                                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                                <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                            </select>
                            </form> --}}

                            <label for="per_page">Entries per Page:</label>
                            <select name="per_page" id="per_page" onchange="updateQueryString()">
                                <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                                <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20</option>
                                <option value="30" {{ request('per_page') == 30 ? 'selected' : '' }}>30</option>
                                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                                <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                            </select>

                            <script>
                                function updateQueryString() {
                                    var perPage = document.getElementById('per_page').value;
                                    var currentUrl = window.location.href;
                                    var url = new URL(currentUrl);
                                    var searchParams = new URLSearchParams(url.search);
                                    // Update or add the per_page parameter
                                    searchParams.set('per_page', perPage);
                                    // Redirect to the updated URL
                                    window.location.href = url.pathname + '?' + searchParams.toString();
                                }


                                // Show loading animation
                                //  document.getElementById('loading-animation').style.display = 'block';

                                // Simulate a delay of 2 seconds
                                // setTimeout(function() {
                                // Hide loading animation
                                //    document.getElementById('loading-animation').style.display = 'none';

                                // Show category table
                                //    document.getElementById('category-table').style.display = 'table';
                                //}, 2000);





                                // Function to fetch data and update the table body
                                function fetchDataAndPopulateTable() {
                                    // Simulate a delay of 2 seconds
                                    //// document.addEventListener('DOMContentLoaded', function() {
                                    // const tableRow = document.getElementById('datatable').querySelector('tr');
                                    // Display loading animation
                                    //if (tableRow) {
                                    //  tableRow.innerHTML = '<div id="loading-animation1" style="display: block; font-size: 50px; height: 100px; padding: 100px;"><i class="fas fa-spinner fa-spin"></i></div>';
                                    // }
                                    //});

                                    document.addEventListener('DOMContentLoaded', function() {
                                        const table = document.getElementById('datatable');
                                        const tableRow = table.querySelector('tr');

                                        // Display loading animation
                                        if (tableRow) {
                                            const loadingDiv =
                                                '<div id="loading-animation1" style="display: block; font-size: 50px; height: 100px; padding: 100px;"><i class="fas fa-spinner fa-spin"></i></div>';
                                            tableRow.appendChild(loadingDiv);
                                            setTimeout(function() {

                                            }, 2000); // Adjust the time according to your needs
                                        }
                                    });


                                }

                                // Call the function when the page loads
                                fetchDataAndPopulateTable();

                            </script>

                            <!-- Information about displayed entries -->
                            <div class="dataTables_info pl-2">
                                Showing
                                <span id="showing-entries-from">{{ $categories->firstItem() }}</span>
                                to
                                <span id="showing-entries-to">{{ $categories->lastItem() }}</span>
                                of
                                <span id="total-entries">{{ $categories->total() }}</span>
                                entries
                            </div>
                        </div>
                        <!-- ... (remaining content) -->
                        {{ $categories->links('components.pagination.default') }}
                        {{-- {{ $categories->appends(request()->except('page'))->links() }} --}}


                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        {{-- <script>
            // public/js/categories.js

            function updateData() {
                const perPage = document.getElementById('per_page').value;

                axios.get(`/admin/categories?per_page=${perPage}`)
                    .then(response => {
                        const tableBody = document.getElementById('datatable');
                        tableBody.innerText = response.data;
                        console.log(response);
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
            }

            // Initial data load when the page loads
            document.addEventListener('DOMContentLoaded', updateData);

        </script> --}}


        {{-- add modal --}}
        <div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addModalLabel">Add New Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-md-4">

                        <div class="row">
                            <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="name_english">English Name</label>
                                    <input type="text" name="name_english" class="form-control @error('name_english') is-invalid @enderror" id="name_english" value="{{ old('name_english') }}" required>
                                    @error('name_english')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name_bangla">Bangla Name</label>
                                    <input type="text" name="name_bangla" class="form-control @error('name_bangla') is-invalid @enderror" id="name_bangla" value="{{ old('name_bangla') }}" required>
                                    @error('name_bangla')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="parent_id">Parent Category</label>
                                    <select name="parent_id" class="form-control @error('parent_id') is-invalid @enderror" id="parent_id">
                                        <option value="">Select Parent Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('parent_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name_english }}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" id="type" value="{{ old('type') }}">
                                    @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title" value="{{ old('meta_title') }}">
                                    @error('meta_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" id="meta_description">{{ old('meta_description') }}</textarea>
                                    @error('meta_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="descriptions">Descriptions</label>
                                    <textarea name="descriptions" class="form-control @error('descriptions') is-invalid @enderror" id="descriptions">{{ old('descriptions') }}</textarea>
                                    @error('descriptions')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="logo">Category Logo</label>
                                    <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" id="logo" value="{{ old('logo') }}">
                                    @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="home_status">Home Status</label>
                                    <input type="checkbox" name="home_status" id="home_status" value="1" @if (old('home_status')) checked @endif>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="checkbox" name="status" id="status" value="1" @if (old('status')) checked @endif>
                                </div>

                                <button type="submit" class="btn btn-primary">Create Category</button>
                            </form>
                        </div>


                        <div class="mb-3 text-right">
                            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> --}}
                            {{-- <button type="button" class="btn btn-warning">Save</button> --}}
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
                        <h1 class="modal-title fs-5" id="addModalLabel">Edit Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-md-4">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label>Category Name</label>
                                <input class="form-control" type="text" name="HID-date" placeholder="Category Name English..." value="Fresh Water">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Category Name Bangla</label>
                                <input class="form-control" type="text" name="HID-date" placeholder="Category Name bangla..." value="Fresh Water">
                            </div>


                            <div class="mb-3 col-md-4">
                                <label>Parent Category</label>
                                <select id="mySelect" class="selectpicker  w-100" data-live-search="true">
                                    <option selected>Water</option>
                                    <option>Food</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Logo</label>
                                <input class="form-control" type="file" name="logo" value="">
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="floatingTextarea">Meta Title</label>
                                <textarea class="form-control" placeholder="Leave a Meta Title here.." id="floatingTextarea"></textarea>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="floatingTextareadesc">Meta Descriptions</label>
                                <textarea class="form-control" placeholder="Leave a Meta Descriptions here.." id="floatingTextareadesc"></textarea>
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
                        <h1 class="modal-title fs-5" id="addModalLabel">View Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-md-4">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label>Category Name</label>
                                <input class="form-control" type="text" name="HID-date" placeholder="Category Name English..." value="Fresh Water" disabled>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label>Category Name Bangla</label>
                                <input class="form-control" type="text" name="HID-date" placeholder="Category Name bangla..." value="Fresh Water" disabled>
                            </div>


                            <div class="mb-3 col-md-4">
                                <label>Parent Category</label>
                                <select id="mySelect" class="selectpicker  w-100" data-live-search="true" disabled>
                                    <option selected>Water</option>
                                    <option>Food</option>
                                </select>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label>Logo</label>
                                <input class="form-control" type="file" name="logo" value="" disabled>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="floatingTextarea">Meta Title</label>
                                <textarea class="form-control" placeholder="Leave a Meta Title here.." id="floatingTextarea" disabled></textarea>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="floatingTextareadesc">Meta Descriptions</label>
                                <textarea class="form-control" placeholder="Leave a Meta Descriptions here.." id="floatingTextareadesc" disabled></textarea>
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
    // categories.js

    document.addEventListener('DOMContentLoaded', function() {
        const showEntriesDropdown = document.getElementById('show-entries');
        const showingEntries = document.querySelectorAll('#showing-entries');
        const totalEntries = document.getElementById('total-entries');

        showEntriesDropdown.addEventListener('change', function() {
            const selectedValue = this.value;
            axios.get(`/admin/categories?show=${selectedValue}`)
                .then(response => {
                    // Update the number of displayed entries
                    showingEntries.forEach(span => {
                        span.textContent = response.data.showing;
                        console.log(response.data);
                    });
                    // Update the total number of entries
                    totalEntries.textContent = response.data.total;
                })
                .catch(error => {
                    console.error(error);

                });
        });
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
