@extends('layouts.layout')

@foreach($pages['data'] as $page)
  @section('title', $page['title'])
  @section('hero_image', $page['hero_image']['data']['full_url'])
  @section('hero_image_title', $page['hero_image_alt_text'])
  @section('meta_description', $page['meta_description'])
  @section('meta_keywords', $page['meta_keywords'])

  @section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
      @markdown($page['body'])
    </div>
  @endsection
@endforeach

@section('research-projects')
<div class="container">
  <h2>Featured research projects</h2>
  <div class="row">

  @foreach($projects['data'] as $project)
  <div class="col-md-4 mb-3">

    <div class="card card-body h-100">
      @if(!is_null($project['hero_image']))
        <img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"
        alt="{{ $project['hero_image_alt_text'] }}"
        height="{{ $project['hero_image']['data']['thumbnails'][4]['height'] }}"
        width="{{ $project['hero_image']['data']['thumbnails'][4]['width'] }}"
        loading="lazy"/>
      @endif
      <div class="container h-100">
        <div class="contents-label mb-3">
          <h3>
            <a href="research/projects/{{ $project['slug']}}">{{ $project['title']}}</a>
          </h3>
        </div>
      </div>
      <a href="research/projects/{{ $project['slug']}}" class="btn btn-dark">Read more</a>
    </div>
  </div>
  @endforeach
  </div>
</div>
@endsection
