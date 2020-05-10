@extends('layouts.layout')

@foreach($departments['data'] as $dept)
  @section('title', $dept['title'])
  @section('keywords', $dept['meta_keywords'])
  @section('description', $dept['meta_description'])
  @section('hero_image', $dept['hero_image']['data']['full_url'])
  @section('hero_image_title', $dept['hero_image_alt_text'])
  
  @section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
      @markdown($dept['department_description'])
    </div>
  @endsection
  @if(!empty($dept['associated_galleries']))
    @section('galleries')
    <div class="container">
      <h2>Associated Galleries</h2>
      <div class="row">
        @foreach($dept['associated_galleries'] as $gallery)
        <div class="col-md-4 mb-3">
          <div class="card card-body h-100">
            @if(!is_null($gallery['galleries_id']['hero_image']))
            <img class="img-fluid" src="{{ $gallery['galleries_id']['hero_image']['data']['thumbnails'][4]['url']}}"
            alt="{{ $gallery['galleries_id']['hero_image_alt_text'] }}" loading="lazy"
            width="{{ $gallery['galleries_id']['hero_image']['data']['thumbnails'][4]['width'] }}"
            height="{{ $gallery['galleries_id']['hero_image']['data']['thumbnails'][4]['height'] }}"
            />
            @endif
            <div class="container h-100">
              <div class="contents-label mb-3">
                <h3>
                  <a href="/galleries/{{ $gallery['galleries_id']['slug']}}">{{ $gallery['galleries_id']['gallery_name']}}</a>
                </h3>
              </div>
            </div>
            <a href="/galleries/{{ $gallery['galleries_id']['slug']}}" class="btn btn-dark">Read more</a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @endsection
  @endif
@endforeach
