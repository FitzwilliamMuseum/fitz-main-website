@extends('layouts.layout')
@section('title', 'Fitzwilliam Museum podcasts')
@section('hero_image', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/cover-podcasts.jpg')
@section('content')

<div class="row">
  <div class="col-md-4 mb-3">
    <div class="card h-100">
      <a href=""><img class=" card-img-top img-fluid" src="https://content.fitz.ms/fitz-website/assets/mindseye.jpg?key=directus-medium-contain&q=50"
      alt="In My Mind's Eye logo"
      loading="lazy"/></a>
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3>
            In my mind's eye: culture in quarantine podcasts
          </h3>
        </div>
      </div>
    </div>
  </div>
  @foreach($podcasts['data'] as $instagram)
  <div class="col-md-4 mb-3">
    <div class="card h-100">
      <a href="{{ route('podcasts.series', $instagram['slug']) }}"><img class="card-img-top img-fluid" src="{{ $instagram['cover_image']['data']['thumbnails'][3]['url']}}"
      alt=""
      width="{{ $instagram['cover_image']['data']['thumbnails'][3]['width'] }}"
      height="{{ $instagram['cover_image']['data']['thumbnails'][3]['height'] }}"
      loading="lazy"/></a>
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3>
            <a href="{{ route('podcasts.series', $instagram['slug']) }}">{{ $instagram['title'] }}</a>
          </h3>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
