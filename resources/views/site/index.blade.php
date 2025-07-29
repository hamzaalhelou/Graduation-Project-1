
@extends('site.app')
@section('title', 'Homepage |'.env('APP_NAME'))
@section('content')
<!-- hero slider -->
<section class="hero-section overlay bg-cover" data-background="{{ asset('assets/images/banner/banner-1.jpg') }}">
  <div class="container">
    <div class="hero-slider">
      <!-- slider item -->
      @foreach ($sliders as $slider)
      <div class="hero-slider-item">
        <div class="row">
          <div class="col-md-8">
            <h1 class="text-white" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".1">{{ $slider->title }}</h1>
            <p class="text-muted mb-4" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".4">{{ $slider->content }}</p>
            <a href="contact.html" class="btn btn-primary" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".7">Apply now</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- /hero slider -->

<!-- banner-feature -->
<section class="bg-gray overflow-md-hidden">
  <div class="container-fluid p-0">
    <div class="row no-gutters">
      <div class="col-xl-4 col-lg-5 align-self-end">
        <img class="img-fluid w-100" src="{{ asset('assets/images/banner/banner-feature.png') }}" alt="banner-feature">
      </div>
      <div class="col-xl-8 col-lg-7">
        <div class="row feature-blocks bg-gray justify-content-between">
            @foreach ($features as $feature)
          <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
            <i class="fas fa-{{$feature->icon}} mb-xl-4 mb-lg-3 mb-4" style="font-size: 50px; color: #ffbc3b;"></i>
            <h3 class="mb-xl-4 mb-lg-3 mb-4">{{$feature->title  }}</h3>
            <p>{{$feature->content  }}</p>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /banner-feature -->

<!-- about us -->
<section class="section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 order-2 order-md-1">
        <h2 class="section-title">About Educenter</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat </p>
        <p>cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
        <a href="{{ route('site.about') }}" class="btn btn-outline-primary">Learn more</a>
      </div>
      <div class="col-md-6 order-1 order-md-2 mb-4 mb-md-0">
        <img class="img-fluid w-100" src="{{ asset('assets/images/about/about-us.jpg') }}" alt="about image">
      </div>
    </div>
  </div>
</section>
<!-- /about us -->

<!-- courses -->
<section class="section-sm">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="d-flex align-items-center section-title justify-content-between">
          <h2 class="mb-0 text-nowrap mr-3">Our Course</h2>
          <div class="border-top w-100 border-primary d-none d-sm-block"></div>
          <div>
            <a href="{{ route('site.courses') }}" class="btn btn-sm btn-outline-primary ml-sm-3 d-none d-sm-block">see all</a>
          </div>
        </div>
      </div>
    </div>
    <!-- course list -->
<div class="row justify-content-center">
  <!-- course item -->
  @foreach ($latestItems as $item)
  <div class="col-lg-4 col-sm-6 mb-5">
    <div class="card p-0 border-primary rounded-0 hover-shadow">
      <img style="height: 300px;object-fit:cover"  class="card-img-top rounded-0" src="{{asset('uploads/images/'.$item->image)}}" alt="course thumb">
      <div class="card-body">
        <ul class="list-inline mb-2">
          <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i>{{$item->date  }}</li>
          <li class="list-inline-item"><a class="text-color" href="course-single.html">{{ $item->field }}</a></li>
        </ul>
        <a href="course-single.html">
          <h4 class="card-title">{{ $item->category }}</h4>
        </a>
        <p class="card-text mb-4">{{ $item->content }}</p>
        <a href="{{route('site.course_single',$item->id)}}" class="btn btn-primary btn-sm">Apply now</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
<!-- /course list -->
    <!-- mobile see all button -->
    <div class="row">
      <div class="col-12 text-center">
        <a href="courses.html" class="btn btn-sm btn-outline-primary d-sm-none d-inline-block">sell all</a>
      </div>
    </div>
  </div>
</section>
<!-- /courses -->

<!-- cta -->
<section class="section bg-primary">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h6 class="text-white font-secondary mb-0">Click to Join the Advance Workshop</h6>
        <h2 class="section-title text-white">Training In Advannce Networking</h2>
        <a href="contact.html" class="btn btn-light">join now</a>
      </div>
    </div>
  </div>
</section>
<!-- /cta -->

<!-- success story -->
<section class="section bg-cover" data-background="{{ asset('assets/images/backgrounds/success-story.jpg') }}">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-sm-4 position-relative success-video">
        <a class="play-btn venobox" href="https://youtu.be/nA1Aqp0sPQo" data-vbtype="video">
          <i class="ti-control-play"></i>
        </a>
      </div>
      <div class="col-lg-6 col-sm-8">
        <div class="bg-white p-5">
          <h2 class="section-title">Success Stories</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /success story -->

<!-- events -->
<section class="section bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="d-flex align-items-center section-title justify-content-between">
          <h2 class="mb-0 text-nowrap mr-3">Upcoming Events</h2>
          <div class="border-top w-100 border-primary d-none d-sm-block"></div>
          <div>
            <a href="{{ route('site.events') }}" class="btn btn-sm btn-outline-primary ml-sm-3 d-none d-sm-block">see all</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
  <!-- event -->
  @foreach ($events as $event)
  <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
    <div class="card border-0 rounded-0 hover-shadow">
      <div class="card-img position-relative">
        <img class="card-img-top rounded-0" src="{{asset('uploads/images/'.$event->image)}}" alt="event thumb">
        <div class="card-date"><span>{{$event->date}}</span><br>{{ $event->month }}</div>
      </div>
      <div class="card-body">
        <!-- location -->
        <p><i class="ti-location-pin text-primary mr-2"></i>{{ $event->address }}</p>
        <a href="event-single.html"><h4 class="card-title">{{ $event->content }}</h4></a>
      </div>
    </div>
  </div>
  @endforeach
</div>
    <!-- mobile see all button -->
    <div class="row">
      <div class="col-12 text-center">
        <a href="course.html" class="btn btn-sm btn-outline-primary d-sm-none d-inline-block">sell all</a>
      </div>
    </div>
  </div>
</section>
<!-- /events -->

<!-- teachers -->
<section class="section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="section-title">Our Teachers</h2>
      </div>
      <!-- teacher -->
      @foreach ($teachers as $teacher)
      <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
        <div class="card border-0 rounded-0 hover-shadow">
          <img class="card-img-top rounded-0" src="{{asset('uploads/images/'.$teacher->image)}}" alt="teacher">
          <div class="card-body">
            <a href="teacher-single.html">
              <h4 class="card-title">{{ $teacher->name }}</h4>
            </a>
            <p>{{ $teacher->position }}</p>
            <ul class="list-inline">
              <li class="list-inline-item"><a class="text-color" href="{{ $teacher->fb_link }}"><i class="ti-facebook"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="{{ $teacher->gm_link }}"><i class="ti-google"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="{{ $teacher->ln_link }}"><i class="ti-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- /teachers -->

<!-- blog -->
<section class="section pt-0">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section-title">Latest News</h2>
      </div>
    </div>
    <div class="row justify-content-center">
  <!-- blog post -->
  @foreach ($journalists as $journalist)
  <article class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
    <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
      <img class="card-img-top rounded-0" src="{{asset('uploads/images/'.$journalist->image)}}" alt="Post thumb">
      <div class="card-body">
        <!-- post meta -->
        <ul class="list-inline mb-3">
          <!-- post date -->
          <li class="list-inline-item mr-3 ml-0">{{ $journalist->date }}</li>
          <!-- author -->
          <li class="list-inline-item mr-3 ml-0">By {{ $journalist->writer }}</li>
        </ul>
        <a href="blog-single.html">
          <h4 class="card-title">{{ $journalist->title }}</h4>
        </a>
        <p class="card-text">{{ $journalist->content }}</p>
        <a href="blog-single.html" class="btn btn-primary btn-sm">read more</a>
      </div>
    </div>
  </article>
  @endforeach
</div>
  </div>
</section>
<!-- /blog -->
@stop
