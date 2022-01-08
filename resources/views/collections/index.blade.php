@extends('layouts.layout')
@foreach($pages['data'] as $page)
  @section('hero_image', $page['hero_image']['data']['url'])
  @section('hero_image_title', $page['hero_image_alt_text'])
  @section('description', $page['meta_description'])
  @section('keywords', $page['meta_keywords'])
@endforeach

@section('title','Our collections: an overview')

@section('collections')
<div class="container">
  <div class="row">
    @foreach($collections['data'] as $collection)
    <div class="col-md-4 mb-3">
      <div class="card h-100">
        @if(!is_null($collection['hero_image']))
        <div class="embed-responsive embed-responsive-4by3">
          <a href="{{ route('collection', $collection['slug']) }}"><img class="img-fluid embed-responsive-item" src="{{ $collection['hero_image']['data']['thumbnails'][4]['url']}}"
          width="{{ $collection['hero_image']['data']['thumbnails'][4]['width'] }}"
          height="{{ $collection['hero_image']['data']['thumbnails'][4]['height']}}"
          alt="{{ $collection['hero_image_alt_text']}}" loading="lazy"
          /></a>
        </div>
        @endif
        <div class="card-body ">
          <div class="contents-label mb-3">
            <h3>
              <a href="{{ route('collection', $collection['slug']) }}">{{ $collection['collection_name']}}</a>
            </h3>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
