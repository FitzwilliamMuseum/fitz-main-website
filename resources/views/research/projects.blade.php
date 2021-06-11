@extends('layouts/layout')
@section('title','Research projects')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/baroque.jpg')
@section('hero_image_title', 'A Baroque feasting table by Ivan Day in feast and fast')

@section('content')
  <div class="row">
      @foreach($projects['data'] as $project)
      <div class="col-md-4 mb-3">
        <div class="card h-100 ">
          @if(!is_null($project['hero_image']))
          <a href="{{ route('research-project', $project['slug']) }}"><img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"
          alt="{{ $project['hero_image_alt_text']}}" loading="lazy"
          width="{{ $project['hero_image']['data']['thumbnails'][4]['width'] }}"
          height="{{ $project['hero_image']['data']['thumbnails'][4]['height'] }}"/></a>
          @endif
          <div class="card-body h-100">
            <div class="contents-label mb-3">
              <h3 class="lead">
                <a href="{{ route('research-project', $project['slug']) }}">{{ $project['title']}}</a>
              </h3>
            </div>
            </div>
          </div>
        </div>
      @endforeach
  </div>
@endsection
