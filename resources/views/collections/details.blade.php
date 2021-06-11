@extends('layouts.layout')
@foreach($collection['data'] as $coll)
  @section('keywords', $coll['meta_keywords'])
  @section('description', $coll['meta_description'])
  @section('title', $coll['collection_name'])
  @section('hero_image', $coll['hero_image']['data']['full_url'])
  @section('hero_image_title', $coll['hero_image_alt_text'])
@section('content')
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
    {!! $coll['collection_description'] !!}
  </div>

  @if(!empty($coll['associated_departments']))
    @section('departments')
      <div class="container">
        <h2>Associated departments</h2>
        <div class="row">
          @foreach($coll['associated_departments'] as $gallery)
          <div class="col-md-4 mb-3">
            <div class="card h-100">
              @if(!is_null($gallery['departments_id']['hero_image']))
              <div class="embed-responsive embed-responsive-4by3">
                <a href="{{ route('department', $gallery['departments_id']['slug']) }}"><img class="img-fluid embed-responsive-item" src="{{ $gallery['departments_id']['hero_image']['data']['thumbnails'][4]['url']}}"
                width="{{ $gallery['departments_id']['hero_image']['data']['thumbnails'][4]['width']}}"
                height="{{ $gallery['departments_id']['hero_image']['data']['thumbnails'][4]['height']}}"
                alt="{{ $gallery['departments_id']['hero_image_alt_text'] }}" loading="lazy"/></a>
              </div>
              @endif
              <div class="card-body">
                <div class="contents-label mb-3">
                  <h3 class="lead">
                    <a href="{{ route('department', $gallery['departments_id']['slug']) }}">{{ $gallery['departments_id']['title']}}</a>
                  </h3>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    @endsection
  @endif

  @if(!empty($coll['associated_galleries']))
    @section('galleries')
    <div class="container">
      <h2>Associated Galleries</h2>
      <div class="row">
        @foreach($coll['associated_galleries'] as $gallery)
        <div class="col-md-4 mb-3">
          <div class="card">
            @if(!is_null($gallery['galleries_id']['hero_image']))
            <div class="embed-responsive embed-responsive-4by3">
            <a href="{{ route('gallery', $gallery['galleries_id']['slug']) }}"><img class="embed-responsive-item img-fluid" src="{{ $gallery['galleries_id']['hero_image']['data']['thumbnails'][4]['url'] }}"
            width="{{ $gallery['galleries_id']['hero_image']['data']['thumbnails'][4]['width'] }}"
            height="{{ $gallery['galleries_id']['hero_image']['data']['thumbnails'][4]['height'] }}"
            alt="{{ $gallery['galleries_id']['hero_image_alt_text'] }}" loading="lazy"
            /></a>
            </div>
            @endif
            <div class="card-body  h-100">
              <div class="contents-label mb-3">
                <h3 class="lead">
                  <a href="{{ route('gallery', $gallery['galleries_id']['slug']) }}">{{ $gallery['galleries_id']['gallery_name']}}</a>
                </h3>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @endsection
  @endif
@endsection
@endforeach
