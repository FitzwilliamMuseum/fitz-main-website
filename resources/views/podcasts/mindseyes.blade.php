@extends('layouts.layout')
@section('title', 'Culture in quarantine: In my mind\'s eye')
@section('hero_image', 'https://content.fitz.ms/fitz-website/assets/SpringtimeWEB.jpg?key=directus-large-crop')
@section('hero_image_title', 'Springtime by Claude Monet')
@section('description', 'Culture in quarantine - in my mind\'s eye')
@section('content')

<div class="row">
  <div class="col-md-4 mb-3">
    <div class="card h-100">
      <a href=""><img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/mindseye.jpg?key=directus-large-crop&q=50"
      alt=""

      loading="lazy"/></a>
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3>
            In my mind's eye: culture in quarantine podcasts
          </h3>
          <p>
            These podcasts were made possible thanks to the support of the
            Belvedere Trust.
          </p>
        </div>
      </div>
    </div>
  </div>
  @foreach($mindseyes['data'] as $podcast)
  <div class="col-md-4 mb-3">
    <div class="card h-100">
      <a href="{{ route('mindeyes.story', $podcast['slug']) }}"><img class="img-fluid" src="{{ $podcast['hero_image']['data']['thumbnails'][4]['url']}}"
      alt="{{ $podcast['hero_image_alt_text'] }}"
      width="{{ $podcast['hero_image']['data']['thumbnails'][4]['width'] }}"
      height="{{ $podcast['hero_image']['data']['thumbnails'][4]['height'] }}"
      loading="lazy"/></a>
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3>
            <a href="{{ route('mindeyes.story', $podcast['slug']) }}">{{ $podcast['title'] }}</a>
          </h3>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  <div class="col-md-4 mb-3">
    <div class="card h-100">
      <a href="{{ route('podcasts') }}"><img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/cover-podcasts.jpg?key=directus-large-crop&q=50"
      alt=""

      loading="lazy"/></a>
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3>
            <a href="{{ route('podcasts') }}">Listen to more Fitzwilliam Museum podcasts</a>
          </h3>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
