@extends('layouts/layout')
@section('title','Online resources')
@section('hero_image',env('CONTENT_STORE'). 'baroque.jpg')
@section('hero_image_title', 'A Baroque feasting table by Ivan Day in feast and fast')
@section('content')
  <div class="row">
      @foreach($resources['data'] as $project)
      <div class="col-md-4 mb-3">
        <div class="card h-100 ">
          @if(!empty($project['hero_image']))
            <a href="{{ route('resource', $project['slug']) }}"><img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"
            alt="{{ $project['hero_image_alt_text']}}" loading="lazy"
            width="{{ $project['hero_image']['data']['thumbnails'][4]['width'] }}"
            height="{{ $project['hero_image']['data']['thumbnails'][4]['height'] }}"/></a>
          @endif
          <div class="card-body">
            <div class="contents-label mb-3">
              <h3 class="lead">
                <a href="{{ route('resource', $project['slug']) }}">{{ $project['title']}}</a>
              </h3>
            </div>
          </div>
        </div>
      </div>
      @endforeach
</div>
@endsection
