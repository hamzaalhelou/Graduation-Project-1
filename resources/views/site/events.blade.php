
@extends('site.app')

@section('title', 'Events |'.env('APP_NAME'))

@section('content')
<!-- page title -->
<section class="page-title-section overlay" data-background="{{ asset('assets/images/backgrounds/page-title.jpg') }}">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb mb-2">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="index.html">Home</a></li>
          <li class="list-inline-item text-white h3 font-secondary nasted">Upcoming Events</li>
        </ul>
        <p class="text-lighten mb-0">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- courses -->
<section class="section">
  <div class="container">
    <div class="row">
      <!-- event -->
      @foreach ($events as $event)
      <div class="col-lg-4 col-sm-6 mb-5">
        <div class="card border-0 rounded-0 hover-shadow">
          <div class="card-img position-relative">
            <img class="card-img-top rounded-0" src="{{asset('uploads/images/'.$event->image)}}" alt="event thumb">
            <div class="card-date"><span>{{$event->date}}</span><br>{{ $event->month }}</div>
          </div>
          <div class="card-body">
            <!-- location -->
            <p><i class="ti-location-pin text-primary mr-2"></i>{{ $event->address }}</p>
            <a href="event-single.html">
              <h4 class="card-title">{{ $event->content }}.</h4>
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- /courses -->
@stop
