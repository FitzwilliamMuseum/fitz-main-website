@extends('layouts.layout')

@section('title', 'Our Galleries')
@section('description', 'A page documenting the galleries of the Fitzwilliam Museum')
@section('keywords', 'gallery,description,360,3d,models')

@foreach($pages['data'] as $page)
  @section('hero_image', $page['hero_image']['data']['full_url'])
  @section('hero_image_title', $page['hero_image_alt_text'])
@endforeach

@section('themes')
<div class="container">
  <h2>
    Our galleries
  </h2>
  <div class="row">
    @foreach($galleries['data'] as $gallery)
      <div class="col-md-4 mb-3">
        <div class="card card-body h-100">
          @if(!is_null($gallery['hero_image']))
            <img class="img-fluid" src="{{ $gallery['hero_image']['data']['thumbnails'][4]['url']}}"
            alt="A highlight image for {{ $gallery['gallery_name'] }}" loading="lazy"
            width="{{ $gallery['hero_image']['data']['thumbnails'][4]['width'] }}"
            height="{{ $gallery['hero_image']['data']['thumbnails'][4]['height'] }}"/>
          @endif
          <div class="container h-100">
            <div class="contents-label mb-3">
              <h3>
                <a href="galleries/{{ $gallery['slug']}}">{{ $gallery['gallery_name'] }}</a>
              </h3>
              @if($gallery['gallery_status'])
              @foreach($gallery['gallery_status'] as $status)
                <span class="badge badge-wine mb-1">{{$status}}</span>
              @endforeach
              @endif
            </div>
          </div>
          <a href="galleries/{{ $gallery['slug']}}" class="btn btn-dark">Read more</a>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
