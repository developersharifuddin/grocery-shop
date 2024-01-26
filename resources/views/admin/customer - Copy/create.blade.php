@extends('layouts.admin')
@section('title', 'Admin | Customer')

@section('page-headder')
@endsection

@section('content')
    <div class="row my-auto align-items-center bg-white shadow-md border mb-3 py-2">
        <div class="col-sm-6">
            <span class="my-auto h6 page-headder">@yield('page-headder')</span>
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"> <a href="{{ route('admin.dashboard') }}" class="text-primary"><i
                            class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item text-dark"><a href="{{ route('admin.customers.index') }}">customers</a></li>
            </ol>
        </div>
    </div>
    <style>
        .book-img img {
            width: 100px;
            height: 120px
        }

        .book-text-area p {
            font-size: 13px;
        }

        .book-list-wrapper {
            text-align: center
        }

        .book-info__content .fs-6 {
            font-size: 13px;
        }

        .bookListContainer .col-4:hover {
            border: 1px solid #999;

        }

        #loader {
            display: none;

        }


        /* styles.css */

        .barcode-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
            /* Adjust the margin as needed */
        }

        .barcode-item {
            border: 1px solid #888;
            padding: 0 6px;
            margin: 4px;
            /* Adjust the margin as needed */
        }
    </style>


    <div class="row">
        <div class="card bg-white p-0">
            <div class="card-header justify-content-between py-3">
                <h4 class="card-title float-left pt-2">Create New Customer</h4>
            </div>
            <div class="container p-4">
                <form method="POST" action="{{ route('admin.customers.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <div class="form-group">
                                <label for="name">Customer Name</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter Customer Name..." id="name" value="{{ old('name') }}"
                                    required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 col-md-4">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="phone" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror" placeholder="Enter phone..."
                                    id="phone" value="{{ old('phone') }}" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email..."
                                    id="email" value="{{ old('email') }}" required>
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
                                    placeholder="Previous Due..." id="prev_due" value="{{ old('prev_due') }}" required>
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
                                    placeholder="Enter GST Number" id="gst_number" value="{{ old('gst_number') }}"
                                    required>
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
                                    placeholder="Enter TAX Number..." id="tax_number" value="{{ old('tax_number') }}"
                                    required>
                                @error('tax_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3 col-md-4">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" name="city"
                                    class="form-control @error('city') is-invalid @enderror" placeholder="Enter City..."
                                    id="city" value="{{ old('city') }}" required>
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
                                    placeholder="Enter Postcode..." id="postcode" value="{{ old('postcode') }}">
                                @error('postcode')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
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

                        <div class="mb-3 text-right">
                            <a type="button" class="btn btn-primary"
                                href="{{ route('admin.customers.index') }}">Cancel</a>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
    <!-- /.content -->
@endsection
