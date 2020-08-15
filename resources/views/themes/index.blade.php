@extends('layouts.layout')

@foreach($pages['data'] as $page)
  @section('title', $page['title'])
  @section('hero_image', $page['hero_image']['data']['full_url'])
  @section('hero_image_title', $page['hero_image_alt_text'])
  @section('description', $page['meta_description'])
  @section('keywords', $page['meta_keywords'])
  @section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
      @markdown($page['body'])
    </div>
  @endsection
@endforeach

@section('themes')
<div class="container">
  <h2>Featured themes</h2>
  <div class="row">
    @foreach($themes['data'] as $theme)
    <div class="col-md-4 mb-3">
      <div class="card card-body h-100">
        @if(!is_null($theme['hero_image']))
        <img class="img-fluid" src="{{ $theme['hero_image']['data']['thumbnails'][4]['url']}}"
        alt="{{ $theme['hero_image_alt_text'] }}"
        width="{{ $theme['hero_image']['data']['thumbnails'][4]['width'] }}"
        height="{{ $theme['hero_image']['data']['thumbnails'][4]['height'] }}"
        loading="lazy"/>
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
  </div>
</div>
@endsection
