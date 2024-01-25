@extends('layouts.admin')
@section('title', 'Admin | uom')

@section('page-headder')
    {{-- uoms --}}
@endsection

@section('content')
    <div class="row my-auto align-items-center bg-white shadow-md border mb-3 py-2">
        <div class="col-sm-6">
            <span class="my-auto h6 page-headder">@yield('page-headder')</span>
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"> <a href="{{ route('admin.dashboard') }}" class="text-primary"><i
                            class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item text-dark"><a href="{{ route('admin.uoms.index') }}">Uom</a></li>

            </ol>
        </div>
    </div>


    <div class="row">
        <div class="card p-0">
            <div class="card-header justify-content-between py-3">
                <h4 class="card-title float-left pt-2">Add New UOM</h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-reHIDnsive p-4">

                {{-- <div class="row"> --}}
                <form method="POST" action="{{ route('admin.uoms.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="mb-3 col-12 col-md-4">
                            <label for="uom_set_id" class="control-label mb-0 pb-0">UOM Group<label
                                    class="text-danger">*</label></label>
                            <div class="input-group mr-2">
                                <div class="input-group">
                                    <select name="uom_set_id"
                                        class="from-control @error('uom_set_id') is-invalid @enderror">
                                        <option value="">--Select uom group--</option>
                                        @foreach ($uomsets as $key => $uom)
                                            <option value="{{ $uom->id }}">
                                                {{ $uom->uom_set }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('uom_set_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="uom_short_code">UOM Name</label>
                                <input type="text" name="uom_short_code"
                                    class="form-control @error('uom_short_code') is-invalid @enderror" id="uom_short_code"
                                    placeholder="uom_short_code.." value="{{ old('uom_short_code') }}">
                                @error('uom_short_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="uom_desc">Description</label>
                            <textarea class="form-control @error('uom_desc') is-invalid @enderror" value="{{ old('uom_desc') }}" name="uom_desc"
                                placeholder="Leave a  uom_descs here.." id="uom_desc"></textarea>
                            @error('uom_desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 col-12 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="relative_factor">Relative factor</label>
                                <input type="number" name="relative_factor"
                                    class="form-control @error('relative_factor') is-invalid @enderror" id="relative_factor"
                                    placeholder="relative_factor.." value="{{ old('relative_factor') }}">
                                @error('relative_factor')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="fraction_allow">Fraction_allow</label>
                                <input type="number" name="fraction_allow"
                                    class="form-control @error('fraction_allow') is-invalid @enderror" id="fraction_allow"
                                    placeholder="fraction_allow.." value="{{ old('fraction_allow') }}">
                                @error('fraction_allow')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 text-right">
                        <a type="button" class="btn bg-dangar" href="{{ route('admin.uoms.index') }}">Cancel</a>
                        <button type="reset" class="btn btn-Info bg-info">Reset</button>
                        <button type="submit" class="btn btn-warning">Save</button>
                    </div>
                </form>
                {{-- </div> --}}


            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->
    </div>
    <!-- /.content -->
@endsection
