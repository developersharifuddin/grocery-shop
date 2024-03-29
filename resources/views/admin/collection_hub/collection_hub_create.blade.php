@extends('backend.layouts.app')
@section('title','Author Create')
@section('content')
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{ translate('Branch Information') }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.collection_hubs.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{ translate('Name') }}</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="{{ __('Name') }}" id="name" name="name"
                                class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{ translate('Bangla Name') }}</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="{{ __('Bangla Name') }}" id="name" name="name_bangla"
                                class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="email">{{ translate('Address') }}</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="{{ __('Address') }}" id="address" name="address"
                            class="form-control" required>
                        </div>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">{{ translate('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
