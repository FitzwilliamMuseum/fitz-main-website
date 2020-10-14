@extends('layouts.layout')
@section('hero_image', 'https://content.fitz.ms/fitz-website/assets/SpringtimeWEB.jpg?key=directus-large-crop')
@section('hero_image_title', 'Springtime by Claude Monet')
@section('description', 'Culture in quarantine - in my mind\'s eye')
@section('content')

<div class="row">
  @foreach($podcasts['data'] as $instagram)
    @php
    $title = $instagram['podcast_series'][0]['podcast_series_id']['title'];
    @endphp
    @section('title', $title )

    @dump($instagram)
  <div class="col-md-4 mb-3">
    <div class="card h-100">
      <a href="{{ route('podcasts.episode', $instagram['slug']) }}"><img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
      alt="A stand in image for "/></a>
      {{-- <a href="{{ route('podcasts.episode', $instagram['slug']) }}"><img class="img-fluid" src="{{ $instagram['hero_image']['data']['thumbnails'][4]['url']}}"
      alt="{{ $instagram['hero_image_alt_text'] }}"
      width="{{ $instagram['hero_image']['data']['thumbnails'][4]['width'] }}"
      height="{{ $instagram['hero_image']['data']['thumbnails'][4]['height'] }}"
      loading="lazy"/></a> --}}
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3>
            <a href="{{ route('podcasts.episode', $instagram['slug']) }}">{{ $instagram['title'] }}</a>
          </h3>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>


@endsection
