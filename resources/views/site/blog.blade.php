
@extends('site.app')

@section('title', 'Blogs |'.env('APP_NAME'))

@section('content')
<!-- page title -->
<section class="page-title-section overlay" data-background="{{ asset('assets/images/backgrounds/page-title.jpg') }}">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb mb-2">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="index.html">Home</a></li>
          <li class="list-inline-item text-white h3 font-secondary nasted">Our Blog</li>
        </ul>
        <p class="text-lighten mb-0">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- blogs -->
<section class="section">
  <div class="container">
    <div class="row">
      <!-- blog post -->
      @foreach ($journalists as $journalist)
      <article class="col-lg-4 col-sm-6 mb-5">
        <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
          <img style="height: 250px;object-fit:cover" class="card-img-top rounded-0" src="{{asset('uploads/images/'.$journalist->image)}}" alt="Post thumb">
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
<!-- /blogs -->
@stop
