
@extends('site.app')

@section('title', 'Research |'.env('APP_NAME'))

@section('content')
<!-- page title -->
<section class="page-title-section overlay" data-background="{{ asset('assets/images/backgrounds/page-title.jpg') }}">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb mb-2">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="index.html">Home</a></li>
          <li class="list-inline-item text-white h3 font-secondary nasted">Research</li>
        </ul>
        <p class="text-lighten mb-0">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- research -->
<section class="section">
  <div class="container">
    <div class="row">
      <!-- recharch item -->
      @foreach ($researchs as $research)
      <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card rounded-0 hover-shadow border-top-0 border-left-0 border-right-0">
          <img style="height: 250px;object-fit:cover" class="card-img-top rounded-0" src="{{asset('uploads/images/'.$research->image)}}" alt="research thumb">
          <div class="card-body">
            <h4 class="card-title">{{ $research->title }}</h4>
            <p class="card-text">{{$research->content  }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- /research -->
@stop
