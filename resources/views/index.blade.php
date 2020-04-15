@extends('layouts.home')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/founders.jpg')
@section('hero_image_title','The founder\'s building of the museum')
@section('parallax_home', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/old_g3.jpg')
@section('parallax_two', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/confection.jpg')
@section('parallax_three', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/25th_november_057.jpg')

@section('title', 'The Fitzwilliam Museum')

@section('content')
<h2>Welcome to the Fitzwilliam Museum</h2>
<div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
  @markdown
  The Fitzwilliam Museum is the principal museum of the University of Cambridge and leads the University of Cambridge Museums (UCM) consortium, an Arts Council England funded National Portfolio Organisation.

  The UCM consortium brings together eight University Museums and the Cambridge University Botanic Garden. Together, they represent the UK’s highest concentration of internationally important collections outside London. With more than five million works of art, artefacts, and specimens, the collections span four and a half billion years. Close to a million people of all ages and backgrounds participate in events for our extensive public, educational and outreach programme every year.

  Our mission is to contribute to society through the pursuit of education, learning and research at the highest international levels of excellence.  We do this by preserving and extending our world‐class collections and buildings, and by offering public programmes to engage with as wide an audience as possible.

  We aim to be one of the leading University Museums in the world.  We are known internationally for: exemplary collections and exhibitions; exceptional research; high standards of curatorial and conservation work; and a creative, inclusive and impactful learning service.   We strive to be innovators in the enhancement of learning.

  Through local partnerships we play a role in making the city and region a better place to live, work and visit.
@endmarkdown
</div>
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
          <a href="news/article/{{ $project['slug']}}">{{ $project['article_title']}}</a>
        </h3>
      </div>
    </div>
    <a href="news/article/{{ $project['slug']}}" class="btn btn-dark">Read more</a>
  </div>

  </div>
  @endforeach
@endsection

@section('carousel')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ $carousel['data']['image_one']['data']['full_url']}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ $carousel['data']['image_two']['data']['full_url']}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ $carousel['data']['image_three']['data']['full_url']}}" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ $carousel['data']['image_four']['data']['full_url']}}" alt="Third slide">
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
