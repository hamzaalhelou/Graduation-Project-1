@extends('admin.app')

@section('title',__('admin.Dashboards'))
@section('titlegage',__('admin.Events'))
@section('content')
<div class="card mb-3 m-3" >
    <div class="card-body">
<div class="d-flex justify-content-between align-items-center">
    <h1 class="h3 text-gray-800 mb-0">{{ __('admin.View Event') }}</h1>
<a class="btn btn-primary me-17" href="{{ route('admin.events.index') }}">{{ __('admin.All Events') }}</a>
</div>
</div>
<form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="card-body border-top">
<div class="row align-items-center mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required"><b>{{ __('admin.Date') }}</b></label>
    <div class="col-md-6 ms-20" >
        <input type="number" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" disabled value="{{$event->date}}" name="date">
    </div>
    </div>
<div class="row align-items-center mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required"><b>{{ __('admin.Month') }}</b></label>
    <div class="col-md-6 ms-20" >
        <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" disabled value="{{$event->month}}" name="month">
    </div>
    </div>
<div class="row align-items-bottom mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required"><b>{{ __('admin.Image') }}</b></label>
    <div class="col-md-6 ms-20" >
        <img width="150" src="{{ asset('uploads/images/'.$event->image) }}" alt="">
    </div>
    </div>
<div class="row align-items-center mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required"><b>{{ __('admin.Addres') }}</b></label>
    <div class="col-md-6 ms-20" >
        <input type="text" disabled class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{$event->address}}" name="address">
    </div>
    </div>
    <div class="row align-items-center mb-3 m-8">
        <label class="col-md-1 mb-0 text-gray-600 required" ><b>{{ __('admin.Content') }}</b></label>
        <div class="col-md-6 ms-20" >
            <textarea disabled class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"name="content" rows="5">{{ $event->content }}</textarea>
        </div>

    </div>
</div>
</form>
</div>
@stop


