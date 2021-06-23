@extends('layouts.layout')

@foreach($pages['data'] as $page)
  @section('title', $page['title'])
  @section('hero_image', $page['hero_image']['data']['url'])
  @section('hero_image_title', $page['hero_image_alt_text'])
  @section('description', $page['meta_description'])
  @section('keywords', $page['meta_keywords'])
@endforeach

@section('departments')
  <div class="container">
    <div class="row">
      @foreach($departments['data'] as $department)
      <div class="col-md-4 mb-3">
        <div class="card  h-100">
          @if(!is_null($department['hero_image']))
            <a href="/about-us/departments/{{$department['slug']}}"><img class="img-fluid" src="{{ $department['hero_image']['data']['thumbnails'][4]['url']}}"
            alt="A highlight image for {{ $department['hero_image_alt_text'] }}"
            height="{{ $department['hero_image']['data']['thumbnails'][4]['height'] }}"
            width="{{ $department['hero_image']['data']['thumbnails'][4]['width'] }}"
            loading="lazy"/></a>
          @endif
          <div class="card-body h-100">
            <div class="contents-label mb-3">
              <h3 class="lead">
                <a href="/about-us/departments/{{$department['slug']}}">{{ $department['title']}}</a>
              </h3>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
@endsection
