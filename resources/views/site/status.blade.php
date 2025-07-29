@extends('site.app')
@section('title', 'Course_Single |'.env('APP_NAME'))
@section('content')
<section class="page-title-section overlay" data-background="{{ asset('assets/images/backgrounds/page-title.jpg') }}">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb mb-2">
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="courses.html">Courses Buy</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">

            <div class="alert alert-{{ $type }}">
                {{ $msg }}
            </div>

        </div>

    </div>
</div>
@stop
