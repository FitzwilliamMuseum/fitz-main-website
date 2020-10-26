@extends('layouts.layout')
@section('title', 'In my mind\'s eye')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('description', 'In my mind\'s eye a new podcast series')
@section('content')

<div class="row">
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
      alt=" Cover image for podcasts series"

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
