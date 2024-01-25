@extends('layouts.admin')
@section('title', 'Admin | color')

@section('page-headder')
{{-- colors --}}
@endsection

@section('content')
<div class="row my-auto align-items-center bg-white shadow-md border mb-3 py-2">
    <div class="col-sm-6">
        <span class="my-auto h6 page-headder">@yield('page-headder')</span>
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"> <a href="{{ route('admin.dashboard') }}" class="text-primary"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item text-dark"><a href="{{ route('admin.colors.index') }}">color</a></li>

        </ol>
    </div>
</div>


<div class="row">
    <div class="card p-0">
        <div class="card-header justify-content-between py-3">
            <h4 class="card-title float-left pt-2">Add New color</h4>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-reHIDnsive p-4">

            {{-- <div class="row"> --}}
            <form method="POST" action="{{ route('admin.colors.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label>color Name</label>
                        <input class="form-control" type="text" name="name_english" placeholder="color Name English..." value="">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label>color Name Bangla</label>
                        <input class="form-control" type="text" name="name_bangla" placeholder="color Name bangla..." value="">
                    </div>

                    <div class="mb-3 col-md-4">
                        <label>color Logo</label>
                        <input class="form-control" type="file" name="logo" placeholder="color Name bangla..." value="">
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="floatingTextareadesc"> Descriptions</label>
                        <textarea class="form-control" name="description" placeholder="Leave a Descriptions here.." id="floatingTextareadesc"></textarea>
                    </div>

                </div>

                <div class="mb-3 text-right">
                    <a type="button" class="btn bg-dangar" href="{{ route('admin.colors.index') }}">Cancel</a>
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
