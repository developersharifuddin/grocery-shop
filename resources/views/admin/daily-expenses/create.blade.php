@extends('layouts.admin')
@section('title', 'Admin | Expenses')

@section('page-headder')
{{-- Categories --}}
@endsection

@section('content')
<div class="row my-auto align-items-center bg-white shadow-md border mb-3 py-2">
    <div class="col-sm-6">
        <span class="my-auto h6 page-headder">@yield('page-headder')</span>
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"> <a href="{{ route('admin.dashboard') }}" class="text-primary"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item text-dark"><a href="{{ route('admin.categories.index') }}">Expenses</a></li>

        </ol>
    </div>
</div>

<div class="row">
    <div class="card p-0">
        <div class="card-header justify-content-between py-3">
            <h4 class="card-title float-left pt-2">Add New Expenses</h4>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-reHIDnsive p-4">
            <form method="POST" action="{{ route('admin.daily-expenses.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label for="expense_name">Expense Name</label>
                            <input type="text" name="expense_name" class="form-control @error('expense_name') is-invalid @enderror" id="expense_name" placeholder="Enter Expense Name..." value="{{ old('expense_name') }}">
                            @error('expense_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label for="expense_group">Expense Group</label>
                            <input type="text" name="expense_group" class="form-control @error('expense_group') is-invalid @enderror" id="expense_group" placeholder="Enter Expense Group" value="{{ old('expense_group') }}">
                            @error('expense_group')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label for="company">Company</label>
                            <select name="company" class="form-control @error('company') is-invalid @enderror" id="company">
                                <option value="Rabbi Grocery Shop" {{ old('company') == 'Rabbi Grocery Shop' ? 'selected' : '' }}>Rabbi Grocery Shop</option>
                            </select>
                            @error('company')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label for="store">Store</label>
                            <select name="store" class="form-control @error('store') is-invalid @enderror" id="store">
                                <option value="Main-Store" {{ old('store') == 'Main-Store' ? 'selected' : '' }}>Main-Store</option>
                                <option value="Sub-Store" {{ old('store') == 'Sub-Store' ? 'selected' : '' }}>Sub-Store</option>
                            </select>
                            @error('store')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label for="expense_date">Expense Date</label>
                            <input type="date" name="expense_date" class="form-control @error('expense_date') is-invalid @enderror" id="expense_date" placeholder="Enter Expense Date" value="{{ old('expense_date') }}">
                            @error('expense_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" step="0.01" name="amount" class="form-control @error('amount') is-invalid @enderror" id="amount" placeholder="Enter Amount" value="{{ old('amount') }}">
                            @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label for="approved_status">Approved Status</label>
                            <select name="approved_status" class="form-control @error('approved_status') is-invalid @enderror" id="approved_status">
                                <option value="Approved" {{ old('approved_status') == 'Approved' ? 'selected' : '' }}>Approved</option>
                                <option value="Non-Approved" {{ old('approved_status') == 'Non-Approved' ? 'selected' : '' }}>Non-Approved</option>
                            </select>
                            @error('approved_status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="mb-3 text-right">
                    <a type="button" class="btn bg-danger" href="{{ route('admin.daily-expenses.index') }}">Cancel</a>
                    <button type="reset" class="btn btn-Info bg-info">Reset</button>
                    <button type="submit" class="btn btn-warning">Save</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.content -->
@endsection

@push('.js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
<script>
    $(document).ready(function() {
        $('.selectpicker').selectpicker();
    });

</script>
@endpush
