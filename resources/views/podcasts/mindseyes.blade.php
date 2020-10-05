@extends('layouts.layout')
@section('title', 'Our instagram posts')
@section('hero_image', 'https://content.fitz.ms/fitz-website/assets/SpringtimeWEB.jpg?key=directus-large-crop')
@section('hero_image_title', 'Springtime by Claude Monet')
@section('description', 'An archive of our instagram posts')
@section('content')

<div class="row">
  @foreach($mindseyes['data'] as $instagram)
  <div class="col-md-4 mb-3">
    <div class="card h-100">
      <a href="{{ route('instagram.story', $instagram['slug']) }}"><img class="img-fluid" src="{{ $instagram['hero_image']['data']['thumbnails'][4]['url']}}"
      alt="{{ $instagram['hero_image_alt_text'] }}"
      width="{{ $instagram['hero_image']['data']['thumbnails'][4]['width'] }}"
      height="{{ $instagram['hero_image']['data']['thumbnails'][4]['height'] }}"
      loading="lazy"/></a>
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3>
            <a href="{{ route('mindeyes.story', $instagram['slug']) }}">{{ $instagram['title'] }}</a>
          </h3>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>


@endsection
