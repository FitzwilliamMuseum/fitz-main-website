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
  @if($page['vimeo_id'])
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
    @include('includes.social.vimeo')
  </div>
  @endif
  @endsection
@endforeach

@section('associated_pages')
  <div class="container">
    <div class="row">
      @foreach($associated['data'] as $project)
      <div class="col-md-4 mb-3">
        <div class="card h-100">
          @if(!is_null($project['hero_image']))
            <a href="{{ $project['section']}}/{{ $project['slug']}}"><img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"
            alt="{{ $project['hero_image_alt_text'] }}"
            width="{{ $project['hero_image']['data']['thumbnails'][4]['height'] }}"
            height="{{ $project['hero_image']['data']['thumbnails'][4]['width'] }}"
            loading="lazy" /></a>
          @endif
        <div class="card-body h-100">
          <h3>
            <a href="{{ $project['section']}}/{{ $project['slug']}}">{{ $project['title']}}</a>
          </h3>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
@endsection

@section('twitter')
@if(!empty($tweets))
<div class="row">
  <div class="container">
  <h3>
    Our Twitter profile
  </h3>
  @include('includes.social.tweets')
  </div>
</div>
@endif
@endsection
