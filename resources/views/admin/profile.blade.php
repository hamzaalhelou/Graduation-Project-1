@extends('admin.app')

@section('title',__('admin.Account'))
@section('title2',__('admin.Account'))
@section('titlegage',
__('admin.Account Overview'))
@section('content')
<div class="card mb-3 m-3" >
    <div class="card-body">
<div class="d-flex justify-content-between align-items-center">
    <h1 class="h3 text-gray-800 mb-0">{{ __('admin.Profile Details') }}</h1>
</div>
</div>
<form action="{{ route('admin.profile.update') }}" method="POST">
@csrf
@method('PUT')
<div class="card-body border-top">
<div class="row align-items-center mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required"><b>{{ __('admin.Name') }}</b></label>
    <div class="col-md-6 ms-20 " >
        <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}" name="name">
        @error('name')
        <small class="invalid-feedback">{{ $message }}</small>
        @enderror
    </div>
    </div>

<div class="row align-items-center mb-3 m-8">
    <label class="col-md-1 mb-0 text-gray-600 required"><b>{{ __('admin.Email') }}</b></label>
    <div class="col-md-6 ms-20 " >
        <input type="email" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}" name="email">
        @error('email')
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
@section('scripts')
<script>
    @if (session('success'))
    Swal.fire({
    icon: 'success',
    title: "{{ session('success') }}"
    })
    @endif
</script>
@endsection
@stop


