@extends('admin.app')

@section('title',__('admin.Dashboards'))
@section('titlegage',__('admin.Teachers'))
@section('content')
<div class="card mb-3 m-3" >
    <div class="card-body">
<div class="d-flex justify-content-between align-items-center">
    <h1 class="h3 text-gray-800 mb-0">{{ __('admin.View Teacher') }}</h1>
    <a class="btn btn-primary me-17" href="{{ route('admin.teacher.index') }}">{{ __('admin.All Teachers') }}</a>
</div>
</div>
<form action="{{ route('admin.teacher.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="card-body border-top">
<div class="row align-items-center mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required "><b>{{ __('admin.Name') }}</b></label>
    <div class="col-md-6 ms-20" >
        <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" disabled value="{{ $teacher->name }}"  name="name">
    </div>
    </div>

<div class="row align-items-bottom mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required "><b>{{ __('admin.Image') }}</b></label>
    <div class="col-md-6 ms-20" >
        <img width="100" src="{{ asset('uploads/images/'.$teacher->image) }}" alt="">
    </div>
    </div>
<div class="row align-items-center mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required "><b>{{ __('admin.Position') }}</b></label>
    <div class="col-md-6 ms-20" >
        <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" disabled value="{{ $teacher->position }}" name="position">
    </div>
    </div>
<div class="row align-items-center mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required "><b>{{ __('admin.Link Facebook') }}</b></label>
    <div class="col-md-6 ms-20" >
        <input type="url" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" disabled value="{{ $teacher->fb_link }}"name="fb_link">
    </div>
    </div>
<div class="row align-items-center mb-3 m-8">
<label class="col-md-1 mb-0 text-gray-600 required "><b>{{ __('admin.Link Instagram') }}</b></label>
<div class="col-md-6 ms-20" >
    <input type="url" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" disabled value="{{ $teacher->in_link }}" name="in_link">
</div>
</div>
<div class="row align-items-center mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required "><b>{{ __('admin.Link Linkedln') }}</b></label>
    <div class="col-md-6 ms-20" >
        <input type="url" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" disabled value="{{ $teacher->ln_link }}" name="ln_link">
    </div>
    </div>
<div class="row align-items-center mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required "><b>{{ __('admin.Link Gamil') }}</b></label>
    <div class="col-md-6 ms-20" >
        <input type="url" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" disabled value="{{ $teacher->gm_link }}" name="gm_link">
    </div>
    </div>
</div>
</form>
</div>


@stop


