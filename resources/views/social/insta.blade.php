@extends('layouts.layout')
@section('title', 'Our instagram posts')
@section('hero_image', 'https://content.fitz.ms/fitz-website/assets/SpringtimeWEB.jpg?key=directus-large-crop')
@section('hero_image_title', 'Springtime by Claude Monet')
@section('description', 'An archive of our instagram posts')
@section('content')

  <div class="row">
    @foreach($insta['data'] as $instagram)
      <div class="col-md-4 mb-3">
        <div class="card h-100">
          @if(!empty($instagram['hero_image']))
            <a href="{{ route('instagram.story', $instagram['slug']) }}"><img class="img-fluid" src="{{ $instagram['hero_image']['data']['thumbnails'][2]['url']}}"
              alt="{{ $instagram['hero_image_alt_text'] }}"
              width="{{ $instagram['hero_image']['data']['thumbnails'][5]['width'] }}"
              height="{{ $instagram['hero_image']['data']['thumbnails'][5]['height'] }}"
              loading="lazy"/></a>
            @else
              {{-- <a href="{{ route('instagram.story', $instagram['slug']) }}"> --}}
                <img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
                alt="A stand in image for {{ $instagram['title'] }}"
                />
              {{-- </a> --}}
              @endif
              <div class="card-body h-100">
                <div class="contents-label mb-3">
                  <h3 class="lead">
                    {{-- <a href="{{ route('instagram.story', $instagram['slug']) }}">{{ $instagram['title'] }}</a> --}}
                  </h3>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endsection
