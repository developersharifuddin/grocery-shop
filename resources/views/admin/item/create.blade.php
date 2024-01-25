@extends('layouts.admin')
@section('title', 'Admin | product')

@section('page-headder')
    {{-- Categories --}}
@endsection


@section('content')
    <div class="row my-auto align-items-center bg-white shadow-md border mb-3 py-2">
        <div class="col-md-6">
            <span class="my-auto h6 page-headder">@yield('page-headder')</span>
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"> <a href="{{ route('admin.dashboard') }}" class="text-primary"><i
                            class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item text-dark"><a href="{{ route('admin.products.index') }}">Products</a></li>
                <li class="breadcrumb-item text-dark"><a href="{{ route('admin.products.create') }}">Create</a></li>
            </ol>
        </div>
        <div class="col-md-6">
            <ol class="float-right button">
                {{-- <span class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal"> Add New</span> --}}
                <a href="{{ route('admin.products.index') }}" class="btn btn-success" rel="tooltip" id="add"
                    title="add">
                    Products
                </a>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12 p-0">
            <div class="card">
                <div class="card-header justify-content-between py-3">
                    <h4 class="card-title float-left pt-2">Create New product</h4>
                </div>
                <!-- /.card-header -->
                <div class="card-body card-body bg-light">
                    <form action="{{ route('admin.products.store') }}" class="form-horizontal" id="sales-form"
                        enctype="multipart/form-data" method="POST" accept-charset="utf-8">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-9 px-4">
                                <div class="row bg-light">

                                    <div class="mb-3 col-12 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="name">Name English</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror" id="Reference No"
                                                placeholder="Reference No.." value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 col-12 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="name_bangla">Name Bangla</label>
                                            <input type="text" name="name_bangla"
                                                class="form-control @error('name_bangla') is-invalid @enderror"
                                                id="Reference No" placeholder="Reference No.."
                                                value="{{ old('name_bangla') }}">
                                            @error('name_bangla')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="mb-3 col-12 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="sub_title">Sub title</label>
                                            <input type="text" name="sub_title"
                                                class="form-control @error('sub_title') is-invalid @enderror"
                                                id="Reference No" placeholder="Reference No.."
                                                value="{{ old('sub_title') }}">
                                            @error('sub_title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 col-12 col-md-4">
                                        <label for="trans_uom" class="control-label mb-0 pb-0">Trasaction UOM<label
                                                class="text-danger">*</label></label>
                                        <div class="input-group mr-2">
                                            <div class="input-group">
                                                <select name="trans_uom" id="mySelect" data-live-search="true"
                                                    class="selectpicker @error('trans_uom') is-invalid @enderror">
                                                    <option value="">--Select transaction UOM--</option>
                                                    @foreach ($uoms as $key => $trans_uom)
                                                        <option value="{{ $trans_uom->id }}">
                                                            {{ $trans_uom->uom_short_code }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('trans_uom')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-12 col-md-4">
                                        <label for="stock_uom" class="control-label mb-0 pb-0">Stock UOM<label
                                                class="text-danger">*</label></label>
                                        <div class="input-group mr-2">
                                            <div class="input-group">
                                                <select name="stock_uom" id="mySelect" data-live-search="true"
                                                    class="selectpicker @error('stock_uom') is-invalid @enderror">
                                                    <option value="">--Select stock UOM--</option>
                                                    @foreach ($uoms as $key => $stock_uom)
                                                        <option value="{{ $stock_uom->id }}">
                                                            {{ $stock_uom->uom_short_code }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('stock_uom')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-12 col-md-4">
                                        <label for="uom" class="control-label mb-0 pb-0">Sales UOM<label
                                                class="text-danger">*</label></label>
                                        <div class="input-group mr-2">
                                            <div class="input-group">
                                                <select name="sales_uom" id="mySelect" data-live-search="true"
                                                    class="selectpicker @error('uom') is-invalid @enderror">
                                                    <option value="">--Select Sales UOM--</option>
                                                    @foreach ($uoms as $key => $uom)
                                                        <option value="{{ $uom->id }}">
                                                            {{ $uom->uom_short_code }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('uom')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-12 col-md-4">
                                        <label for="brand" class="control-label mb-0 pb-0">Brand<label
                                                class="text-danger">*</label></label>
                                        <div class="input-group mr-2">
                                            <div class="input-group">
                                                <select name="brand" id="mySelect" data-live-search="true"
                                                    class="selectpicker @error('brand') is-invalid @enderror">
                                                    <option value="">--Select brand--</option>
                                                    @foreach ($brands as $key => $brand)
                                                        <option value="{{ $brand->id }}">
                                                            {{ $brand->name_english }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('brand')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <label class="input-group-text btn-success bg-success" for="brand"
                                                    data-bs-toggle="modal" data-bs-target="#addModal">
                                                    <i class="fa fa-plus"></i>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-12 col-md-4 col-lg-4">
                                        <label for="color" class="control-label mb-0 pb-0">color<label
                                                class="text-danger">*</label></label>
                                        <div class="input-group">
                                            <select name="color[]"
                                                class="selectpicker @error('color') is-invalid @enderror" multiple
                                                aria-label="Default select" data-live-search="true">
                                                @if (count($colors) > 0)
                                                    @foreach ($colors as $key => $color)
                                                        <option value="{{ $color->id }}">
                                                            {{ $key++ }}. {{ $color->name_english }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option class="h-50">
                                                        <p class="fs-4">No Record Found</p>
                                                    </option>
                                                @endif
                                            </select>
                                            @error('color')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="input-group-text btn-success bg-success" for="color"
                                                data-bs-toggle="modal" data-bs-target="#addModal">
                                                <i class="fa fa-plus"></i>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-12 col-md-4 col-lg-4">
                                        <label for="size" class="control-label mb-0 pb-0">Size<label
                                                class="text-danger">*</label></label>
                                        <div class="input-group">
                                            <select name="size[]"
                                                class="selectpicker @error('size') is-invalid @enderror" multiple
                                                aria-label="Default select" data-live-search="true">
                                                @if (count($sizes) > 0)
                                                    @foreach ($sizes as $key => $size)
                                                        <option value="{{ $size->id }}">{{ $key++ }}.
                                                            {{ $size->name_en }}</option>
                                                    @endforeach
                                                @else
                                                    <option class="h-50">
                                                        <p class="fs-4">No Record Found</p>
                                                    </option>
                                                @endif
                                            </select>
                                            @error('size')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label class="input-group-text btn-success bg-success" for="size"
                                                data-bs-toggle="modal" data-bs-target="#addModal">
                                                <i class="fa fa-plus"></i>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-12 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="hs_code">HS Code</label>
                                            <input type="text" name="hs_code"
                                                class="form-control @error('hs_code') is-invalid @enderror"
                                                id="Reference No" placeholder="Reference No.."
                                                value="{{ old('hs_code') }}">
                                            @error('hs_code')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="mb-3 col-12 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="published_price">Published Price</label>
                                            <input type="number" name="published_price"
                                                class="form-control @error('published_price') is-invalid @enderror"
                                                id="Reference No" placeholder="Reference No.."
                                                value="{{ old('published_price') }}">
                                            @error('published_price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 col-12 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="purchase_price">Purchase Price</label>
                                            <input type="number" name="purchase_price"
                                                class="form-control @error('purchase_price') is-invalid @enderror"
                                                id="Reference No" placeholder="Reference No.."
                                                value="{{ old('purchase_price') }}">
                                            @error('purchase_price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label for="published_price">Discount Type<span
                                                class="text-danger">*</span></label>
                                        <div class="flex-wrap d-flex">
                                            <div style="flex-basis:45%">
                                                <select name="discount_type" id="discount_type" class="form-control">
                                                    <option value="1" selected="">Amount </option>
                                                    <option value="2">Percentage </option>
                                                </select>
                                            </div>
                                            <div style="flex-basis:55%">
                                                <input name="discount" type="number" sale_discount="sale_discount"
                                                    class="form-control @error('sale_discount') is-invalid @enderror"
                                                    id="sale_discount" placeholder="Discount.."
                                                    value="{{ old('sale_discount') }}">
                                                @error('sale_discount')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb-3 col-12 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="sell_price">Sales Price</label>
                                            <input type="number" name="sell_price"
                                                class="form-control @error('sell_price') is-invalid @enderror"
                                                id="Reference No" placeholder="Reference No.."
                                                value="{{ old('sell_price') }}">
                                            @error('sell_price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 col-12 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="safety_level">Safety Level</label>
                                            <input type="number" name="safety_level"
                                                class="form-control @error('safety_level') is-invalid @enderror"
                                                id="Reference No" placeholder="Reference No.."
                                                value="{{ old('safety_level') }}">
                                            @error('safety_level')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 col-12 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="reorder_level">Reorder Level</label>
                                            <input type="number" name="reorder_level"
                                                class="form-control @error('reorder_level') is-invalid @enderror"
                                                value="{{ old('reorder_level') }}" id="Reference No"
                                                placeholder="Reference No..">
                                            @error('reorder_level')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="summary">Summary</label>
                                        <textarea class="form-control @error('summary') is-invalid @enderror" value="{{ old('summary') }}" name="summary"
                                            placeholder="Leave a  summarys here.." id="summary"></textarea>
                                        @error('summary')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label for="meta_title">Meta Title</label>
                                        <textarea class="form-control @error('meta_title') is-invalid @enderror" value="{{ old('meta_title') }}"
                                            name="meta_title" placeholder="Leave a  Title here.." id="meta_title"></textarea>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="meta_keyword">Meta Keyword</label>
                                        <textarea class="form-control @error('meta_keyword') is-invalid @enderror" value="{{ old('meta_keyword') }}"
                                            name="meta_keyword" placeholder="Leave a  Title here.." id="meta_keyword"></textarea>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label for="meta_description">Meta Descriptions</label>
                                        <textarea class="form-control @error('meta_description') is-invalid @enderror" value="{{ old('meta_description') }}"
                                            name="meta_description" placeholder="Leave a  Meta Descriptions here.." id="meta_description"></textarea>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-3 px-4">
                                <div class="row bg-white">

                                    <div class="mb-3 col-12 col-md-12">
                                        <label for="category_id" class="control-label mb-0 pb-0">Category<label
                                                class="text-danger">*</label></label>
                                        <div class="input-group mr-2">
                                            <div class="input-group">
                                                <select name="category_id" id="mySelect" data-live-search="true"
                                                    class="selectpicker @error('category_id') is-invalid @enderror">
                                                    <option value="">--Select category_id--</option>
                                                    @foreach ($categories as $key => $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->name_english }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <label class="input-group-text btn-success bg-success" for="category_id"
                                                    data-bs-toggle="modal" data-bs-target="#addModal">
                                                    <i class="fa fa-plus"></i>
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb-3 col-12 col-md-12">
                                        <label for="sub-category" class="control-label mb-0 pb-0">Sub-Category<label
                                                class="text-danger">*</label></label>
                                        <div class="input-group mr-2">
                                            <div class="input-group">
                                                <select name="sub-category" id="mySelect" data-live-search="true"
                                                    class="selectpicker w-100 @error('sub-category') is-invalid @enderror">
                                                    <option value="">--Select Sub-Category--</option>
                                                    @foreach ($categories as $key => $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->name_english }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('sub-category')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb-3 col-12 col-md-12">
                                        <label for="child-category" class="control-label mb-0 pb-0">Child-Category<label
                                                class="text-danger">*</label></label>
                                        <div class="input-group mr-2">
                                            <div class="input-group">
                                                <select name="child-category" id="mySelect" data-live-search="true"
                                                    class="selectpicker w-100 @error('child-category') is-invalid @enderror">
                                                    <option value="">--Select Child-Category--</option>
                                                    @foreach ($categories as $key => $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->name_english }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('child-category')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb-3 col-md-12">
                                        <label>Cover Image</label>
                                        <input class="form-control" type="file" name="Cover Image"
                                            placeholder="Cover Number..." value="">
                                    </div>

                                    <div class="Cover border" style="height:100px;">Select Cover Image</div>
                                    <div class="mb-3 col-md-12">
                                        <label>Look Inside Image</label>
                                        <input class="form-control" type="file" name="Look Inside Image"
                                            placeholder="Look Inside Number..." value="">
                                    </div>
                                    <div class="Look border" style="height:100px;">Select Look Inside Image</div>

                                </div>
                            </div>
                        </div>

                        <div class="my-4 text-right">
                            <button type="submit" class="btn home-details-btn btn-success">Save</button>
                            <a type="button" class="btn btn-primary"
                                href="{{ route('admin.products.index') }}">Cancel</a>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->


            {{-- add modal --}}
            <div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addModalLabel">Add New Customer</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-md-4">

                            <form method="POST" action="{{ route('admin.customers.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="mb-3 col-md-3">
                                        <div class="form-group">
                                            <label for="name">Customer Name</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Enter Customer Name..." id="name"
                                                value="{{ old('name') }}" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="phone" name="phone"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                placeholder="Enter phone..." id="phone" value="{{ old('phone') }}"
                                                required>
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Enter Email..." id="email" value="{{ old('email') }}"
                                                required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <div class="form-group">
                                            <label for="prev_due">Previous Due</label>
                                            <input type="number" name="prev_due"
                                                class="form-control @error('prev_due') is-invalid @enderror"
                                                placeholder="Previous Due..." id="prev_due"
                                                value="{{ old('prev_due') }}" required>
                                            @error('prev_due')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <div class="form-group">
                                            <label for="gst_number">GST Number</label>
                                            <input type="text" name="gst_number"
                                                class="form-control @error('gst_number') is-invalid @enderror"
                                                placeholder="Enter GST Number" id="gst_number"
                                                value="{{ old('gst_number') }}" required>
                                            @error('gst_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <div class="form-group">
                                            <label for="tax_number">TAX Number</label>
                                            <input type="text" name="tax_number"
                                                class="form-control @error('tax_number') is-invalid @enderror"
                                                placeholder="Enter TAX Number..." id="tax_number"
                                                value="{{ old('tax_number') }}" required>
                                            @error('tax_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="mb-3 col-md-4">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <select name="country"
                                                class="form-control @error('country') is-invalid @enderror"
                                                placeholder="" id="country">
                                                <option value="">Select Country</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('country') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name_english }}</option>
                                                @endforeach
                                            </select>
                                            @error('country')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <select name="state"
                                                class="form-control @error('state') is-invalid @enderror"
                                                placeholder="Enter State.." id="state">
                                                <option value="">Select State</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('state') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name_english }}</option>
                                                @endforeach
                                            </select>
                                            @error('state')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="mb-3 col-md-4">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" name="city"
                                                class="form-control @error('city') is-invalid @enderror"
                                                placeholder="Enter City..." id="city" value="{{ old('city') }}"
                                                required>
                                            @error('city')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <div class="form-group">
                                            <label for="postcode">Postcode</label>
                                            <input postcode="text" name="postcode"
                                                class="form-control @error('postcode') is-invalid @enderror"
                                                placeholder="Enter Postcode..." id="postcode"
                                                value="{{ old('postcode') }}">
                                            @error('postcode')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- 'previous_due' => $request->previous_due, --}}

                                    <div class="mb-3 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Address..."
                                                id="address">{{ old('address') }}</textarea>
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- <div class="form-group">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status" id="status" value="1" @if (old('status')) checked @endif>
                            </div> --}}
                                    <div class="mb-3 text-right">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>



                            {{-- <div class="mb-3 text-right">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-warning">Save</button>
                    </div> --}}
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
