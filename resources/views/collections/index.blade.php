@extends('layouts.layout')
@foreach($pages['data'] as $page)
  @section('hero_image', $page['hero_image']['data']['full_url'])
  @section('hero_image_title', $page['hero_image_alt_text'])
  @section('description', $page['meta_description'])
  @section('keywords', $page['meta_keywords'])
@endforeach

@section('title','Objects and Art Works')

@section('collections')
<div class="container">
  <div class="row">
    @foreach($collections['data'] as $collection)
    <div class="col-md-4 mb-3">
      <div class="card card-body h-100">
        @if(!is_null($collection['hero_image']))
          <img class="img-fluid" src="{{ $collection['hero_image']['data']['thumbnails'][4]['url']}}"
          width="{{ $collection['hero_image']['data']['thumbnails'][4]['width'] }}"
          height="{{ $collection['hero_image']['data']['thumbnails'][4]['height']}}"
          alt="{{ $collection['hero_image_alt_text']}}" loading="lazy"
          />
        @endif
        <div class="container h-100">
          <div class="contents-label mb-3">
            <h3>
              <a href="/collections/{{ $collection['slug']}}">{{ $collection['collection_name']}}</a>
            </h3>
            <p class="card-text">{{ substr(strip_tags(htmlspecialchars_decode($collection['collection_description'])),0,200) }}...</p>
          </div>
        </div>
        <a href="/collections/{{ $collection['slug']}}" class="btn btn-dark">Read more</a>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection
