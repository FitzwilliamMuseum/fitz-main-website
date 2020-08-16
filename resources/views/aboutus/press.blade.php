@extends('layouts/layout')
@section('title', 'Our press releases')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/cinderella_car_press-1-.jpg')
@section('hero_image_title', 'Beggarstaffs Cinderella poster')
@section('description', 'A list of Fitzwilliam Museum press releases')
@section('keywords', 'press,release,fitzwilliam')

@section('releases')
<div class="container">
  <div class="row">
    @foreach($press['data'] as $release)
    <div class="col-md-4 mb-3">
      <div class="card h-100">
        @if(!is_null($release['hero_image']))
        <div class="embed-responsive embed-responsive-1by1">
        <img class="img-fluid embed-responsive-item" src="{{ $release['hero_image']['data']['thumbnails'][2]['url']}}"
        width="{{ $release['hero_image']['data']['thumbnails'][2]['width'] }}"
        height="{{ $release['hero_image']['data']['thumbnails'][2]['height'] }}"
        alt="{{ $release['hero_image_alt_text'] }}" loading="lazy"/>
        </div>
        @endif
        <div class="card-body ">
          <div class="contents-label mb-3">
            <h3>
              <a href="{{ $release['file']['data']['full_url'] }}">{{ $release['title']}}</a>
            </h3>
          </div>
            <h4><small class="text-muted">{{ $release['release_date']}}</small></h4>
            <p class="card-text">{{ substr(strip_tags(htmlspecialchars_decode($release['body'])),0,200) }}...</p>
            <a href="{{ $release['file']['data']['full_url'] }}" class="btn btn-dark">Download file</a>

        </div>
      </div>
    </div>
    @endforeach
  </div>
  <nav aria-label="Page navigation">
    {{ $paginator->links() }}
  </nav>
</div>
@endsection
