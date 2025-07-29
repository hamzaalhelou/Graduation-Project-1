@extends('admin.app')

@section('title',__('admin.Dashboards'))
@section('titlegage',__('admin.Courses'))
@section('content')
<div class="card mb-3 m-3" >
    <div class="card-body">
<div class="d-flex justify-content-between align-items-center">
    <h1 class="h3 text-gray-800 mb-0">{{ __('admin.View Course') }}</h1>
<a class="btn btn-primary me-17" href="{{ route('admin.courses.index') }}">{{ __('admin.All Courses') }}</a>
</div>
</div>
<form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="card-body border-top">
<div class="row align-items-center mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required"><b>{{ __('admin.Date') }}</b></label>
    <div class="col-md-6 ms-20" >
        <input type="date" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" disabled value="{{$course->date}}" name="date">
    </div>
    </div>

<div class="row align-items-center mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required "><b>{{ __('admin.Title') }}</b></label>
    <div class="col-md-6 ms-20" >
        <input type="text" placeholder="{{ __('admin.Title') }}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" disabled value="{{$course->title}}" name="title">
    </div>
    </div>

<div class="row align-items-bottom mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required "><b>{{ __('admin.Image') }}</b></label>
    <div class="col-md-6 ms-20" >
        <img width="150" src="{{ asset('uploads/images/'.$course->image) }}" alt="">
    </div>
    </div>

<div class="row align-items-center mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required"><b>{{ __('admin.Category') }}</b></label>
    <div class="col-md-6 ms-20" >
        <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" disabled value="{{$course->category}}"  name="category">
    </div>
    </div>

<div class="row align-items-center mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required"><b>{{ __('admin.field') }}</b></label>
    <div class="col-md-6 ms-20" >
        <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" disabled value="{{$course->field}}" name="field">
    </div>
    </div>

<div class="row align-items-center mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required"><b>{{ __('admin.Price') }}</b></label>
    <div class="col-md-6 ms-20" >
        <input type="number" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" disabled value="{{$course->price}}" name="price">
    </div>
    </div>

<div class="row align-items-center mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required"><b>{{ __('admin.Duration') }}</b></label>
    <div class="col-md-6 ms-20" >
        <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" disabled value="{{$course->duration}}" name="duration">

    </div>
</div>
<div class="row align-items-center mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required"><b>{{ __('admin.Duration Hours') }}</b></label>
    <div class="col-md-6 ms-20" >
        <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" disabled value="{{$course->duration_hours}}" name="duration_hours">

    </div>
</div>
<div class="row align-items-center mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required"><b>{{ __('admin.Duration Month') }}</b></label>
    <div class="col-md-6 ms-20" >
        <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" disabled value="{{$course->duration_month}}" name="duration_month">

    </div>
</div>

<div class="row align-items-center mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required" ><b>{{ __('admin.Content') }}</b></label>
    <div class="col-md-6 ms-20" >
        <textarea disabled class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" name="content" rows="5">{{ $course->content }}</textarea>
    </div>

</div>
<div class="row align-items-center mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required"><b>{{ __('admin.Teacher') }}</b></label>
    <div class="col-md-6 ms-20">
        <select class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" disabled name="teacher_id">
            @foreach ($teachers as $item)
                <option @selected($item->id == $course->teacher_id)  value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
</div>
</div>
</form>
</div>
@stop


