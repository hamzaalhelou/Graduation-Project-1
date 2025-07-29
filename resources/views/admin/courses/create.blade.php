@extends('admin.app')

@section('title',__('admin.Dashboards'))
@section('titlegage',__('admin.Courses'))
@section('content')
<div class="card mb-3 m-3" >
    <div class="card-body">
<div class="d-flex justify-content-between align-items-center">
    <h1 class="h3 text-gray-800 mb-0">{{ __('admin.Add New Course') }}</h1>
<a class="btn btn-primary me-17" href="{{ route('admin.courses.index') }}">{{ __('admin.All Courses') }}</a>
</div>
</div>
<form action="{{ route('admin.courses.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body border-top">
    <div class="row align-items-center mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required"><b>{{ __('admin.Date') }}</b></label>
    <div class="col-md-6 ms-20" >
        <input type="date" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('date') is-invalid @enderror" name="date">
        @error('date')
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
            <label class="col-md-1 mb-0 text-gray-600 required"><b>{{ __('admin.Image') }}</b></label>
            <div class="col-md-6 ms-20">
                <input type="file" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('image') is-invalid @enderror" name="image">
                @error('image')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            </div>
     <div class="row align-items-center mb-3 m-8">
                <label class="col-md-1 mb-0 text-gray-600 required"><b>{{ __('admin.Category') }}</b></label>
                <div class="col-md-6 ms-20" >
                    <input type="text" placeholder="{{ __('admin.Category') }}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('category') is-invalid @enderror" name="category">
                    @error('category')
                    <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                </div>
    <div class="row align-items-center mb-3 m-8">
                    <label class="col-md-1 mb-0 text-gray-600 required"><b>{{ __('admin.field') }}</b></label>
                    <div class="col-md-6 ms-20" >
                        <input type="text" placeholder="{{ __('admin.field') }}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('field') is-invalid @enderror" name="field">
                        @error('field')
                        <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    </div>
    <div class="row align-items-center mb-3 m-8">
                        <label class="col-md-1 mb-0 text-gray-600  required"><b>{{ __('admin.Price') }}</b></label>
                        <div class="col-md-6 ms-20" >
                            <input type="number" placeholder="{{ __('admin.Price') }}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('price') is-invalid @enderror" name="price">
                            @error('price')
                           <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                        </div>
    <div class="row align-items-center mb-3 m-8">
            <label class="col-md-1 mb-0 text-gray-600 required"><b>{{ __('admin.Duration') }}</b></label>
            <div class="col-md-6 ms-20" >
                <input type="text" placeholder="{{ __('admin.Duration') }}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('duration') is-invalid @enderror" name="duration">
                @error('duration')
                <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
            </div>
        </div>
    <div class="row align-items-center mb-3 m-8">
        <label class="col-md-1 mb-0 text-gray-600 required"><b>{{ __('admin.Duration Hours') }}</b></label>
        <div class="col-md-6 ms-20" >
            <input type="text" placeholder="{{ __('admin.Duration Hours') }}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('duration_hours') is-invalid @enderror" name="duration_hours">
            @error('duration_hours')
            <small class="invalid-feedback">{{ $message }}</small>
                @enderror
        </div>
    </div>
    <div class="row align-items-center mb-3 m-8">
        <label class="col-md-1 mb-0 text-gray-600 required"><b>{{ __('admin.Duration Month') }}</b></label>
        <div class="col-md-6 ms-20" >
            <input type="text" placeholder="{{ __('admin.Duration Month') }}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('duration_month') is-invalid @enderror" name="duration_month">
            @error('duration_month')
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

    <div class="row align-items-center mb-3 m-8">
        <label class="col-md-1 mb-0 text-gray-600 required"><b>{{ __('admin.Teacher') }}</b></label>
        <div class="col-md-6 ms-20">
            <select class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" name="teacher_id">
                @foreach ($teachers as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="card-footer d-flex justify-content-end py-6 px-9 m-5">
        <button type="button" onclick="history.back()" class="btn btn-secondary"><i class="fas fa-ban"></i>{{ __('admin.Cancel') }}</button>
        <button class="btn btn-success ms-3"><i class="fas fa-save"></i>{{ __('admin.Save') }}</button>

    </div>
</div>
    </form>
</div>

@stop
