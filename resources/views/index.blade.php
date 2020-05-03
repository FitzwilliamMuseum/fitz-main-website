@extends('layouts.home')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/founders.jpg')
@section('hero_image_title','The founder\'s building of the museum')
@section('parallax_home', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/old_g3.jpg')
@section('parallax_two', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/confection.jpg')
@section('parallax_three', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/25th_november_057.jpg')
@section('parallax_four', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/e1a3159c12ca0f5091e3e9e5000ad4d0-landscape.jpg')
@section('title', 'The Fitzwilliam Museum')

@section('content')
  <blockquote class="frontpageQuote">
    <p class="pt-5">
      Discover one of the greatest art collections of the nation
    </p>
  </blockquote>
@endsection

@section('news')
  @foreach($news['data'] as $project)
  <div class="col-md-4 mb-3">
    <div class="card card-body h-100">
      @if(!is_null($project['field_image']))
      <img class="img-fluid" src="{{ $project['field_image']['data']['thumbnails'][4]['url']}}"/>
        @endif
    <div class="container h-100">

      <div class="contents-label mb-3">
        <h3>
          <a href="news/{{ $project['slug']}}">{{ $project['article_title']}}</a>
        </h3>
      </div>
    </div>
    <a href="news/{{ $project['slug']}}" class="btn btn-dark">Read more</a>
  </div>

  </div>
  @endforeach
@endsection

@section('carousel')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ $carousel['data']['image_one']['data']['full_url']}}" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>{{ $carousel['data']['image_one_alt_text']}}</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ $carousel['data']['image_two']['data']['full_url']}}" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>...</h5>
        <p>...</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ $carousel['data']['image_three']['data']['full_url']}}" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>...</h5>
        <p>...</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ $carousel['data']['image_four']['data']['full_url']}}" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>{{ $carousel['data']['image_four_alt_text']}}</h5>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@endsection


@section('research')
  @foreach($research['data'] as $project)
  <div class="col-md-4 mb-3">
    <div class="card card-body h-100">
      <div class="container h-100">
        @if(!is_null($project['hero_image']))
        <img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"/>
          @endif
        <div class="contents-label mb-3">
          <h3>
            <a href="research/projects/{{ $project['slug']}}">{{ $project['title']}}</a>
          </h3>
        </div>
      </div>
      <a href="research/projects/{{ $project['slug']}}" class="btn btn-dark">Read more</a>
    </div>
  </div>
  @endforeach
@endsection

@section('themes')
  @foreach($themes['data'] as $theme)
  <div class="col-md-4 mb-3">
    <div class="card card-body h-100">
      @if(!is_null($theme['hero_image']))
      <img class="img-fluid" src="{{ $theme['hero_image']['data']['thumbnails'][4]['url']}}"/>
      @endif
      <div class="container h-100">
        <div class="contents-label mb-3">
          <h3>
            <a href="themes/{{ $theme['slug']}}">{{ $theme['title']}}</a>
          </h3>
        </div>
      </div>
      <a href="themes/{{ $theme['slug']}}" class="btn btn-dark">Read more</a>
    </div>
  </div>
  @endforeach
@endsection

@section('twitter')
  @include('includes.social.tweets')
@endsection

@section('youtube-list')
  @include('includes.social.youtubelist')
@endsection
