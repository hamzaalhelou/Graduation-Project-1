@extends('site.app')
@section('title', 'Apply |'.env('APP_NAME'))
@section('content')
<section class="page-title-section overlay" data-background="{{ asset('assets/images/backgrounds/page-title.jpg') }}">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb mb-2">
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="courses.html">Our Courses</a></li>
            <li class="list-inline-item text-white h3 font-secondary nasted">{{$course->category }}</li>
          </ul>
          <p class="text-lighten mb-0">{{$course->content  }}</p>
        </div>
      </div>
    </div>
  </section>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="section-title bg-white text-center text-primary px-3">Welcome {{ Auth::user()->name }}</h2>
                <h1 class="mb-5">{{ $course->category }} - ${{ $course->price }}</h1>

                <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{ $id }}"></script>

                <form action="{{route('site.payment',$course->id) }}" class="paymentWidgets" data-brands="VISA MASTER AMEX AIRPLUS CENCOSUD CARTEBANCAIRE MASTERDEBIT"></form>


            </div>

        </div>
    </div>

@stop
