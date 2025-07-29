@extends('admin.app')

@section('title',__('admin.Dashboards'))
@section('titlegage',__('admin.Features'))
@section('content')
<div class="card mb-3 m-3" >
<div class="card-body">
<div class="d-flex justify-content-between align-items-center">
    <h1 class="h3 text-gray-800 mb-0">{{ __('admin.Add New Feature') }}</h1>
    <a class="btn btn-primary me-17 " href="{{ route('admin.features.index') }}">{{ __('admin.All Features') }}</a>
</div>
</div>
<form action="{{ route('admin.features.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="card-body border-top">
<div class="row align-items-center mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required"><b>{{ __('admin.Icon') }}</b></label>
    <div class="col-md-6 ms-20" >
        <input type="text" placeholder="{{ __('admin.Icon') }}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('icon') is-invalid @enderror" name="icon">
        @error('icon')
        <small class="invalid-feedback">{{ $message }}</small>
        @enderror
    </div>
    </div>
<div class="row align-items-center mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required"><b>{{ __('admin.Title') }}</b></label>
    <div class="col-md-6 ms-20" >
        <input type="text" placeholder="{{ __('admin.Title') }}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('title') is-invalid @enderror" name="title">
        @error('title')
        <small class="invalid-feedback">{{ $message }}</small>
        @enderror
    </div>
    </div>
    <div class="row align-items-center mb-3 m-8">
        <label class="col-md-1 mb-0 text-gray-600 required" ><b>{{ __('admin.Content') }}</b></label>
        <div class="col-md-6 ms-20" >
            <textarea placeholder="{{ __('admin.Content') }}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('content') is-invalid @enderror" name="content" rows="5"></textarea>
            @error('content')
            <small class="invalid-feedback">{{ $message }}</small>
             @enderror
        </div>
    </div>
<div class="card-footer d-flex justify-content-end py-6 px-9 m-5">
    <button type="button" onclick="history.back()" class="btn btn-secondary"> <i class="fas fa-ban"></i>{{ __('admin.Cancel') }}</button>
    <button class="btn btn-success ms-3"> <i class="fas fa-save"></i>{{ __('admin.Save') }}</button>
</div>
</div>
</form>
</div>

@stop


