@extends('layouts.layout')

@foreach($pages['data'] as $page)
  @section('title', $page['title'])
  @section('hero_image', $page['hero_image']['data']['full_url'])
  @section('hero_image_title', $page['hero_image_alt_text'])
  @section('description', $page['meta_description'])
  @section('keywords', $page['meta_keywords'])
@endforeach

@section('departments')
  <div class="container">
    <div class="row">
      @foreach($departments['data'] as $project)
      <div class="col-md-4 mb-3">
        <div class="card  h-100">
          @if(!is_null($project['hero_image']))
            <a href="/departments/{{$project['slug']}}"><img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"
            alt="A highlight image for {{ $project['hero_image_alt_text'] }}"
            height="{{ $project['hero_image']['data']['thumbnails'][4]['height'] }}"
            width="{{ $project['hero_image']['data']['thumbnails'][4]['width'] }}"
            loading="lazy"/></a>
          @endif
          <div class="card-body h-100">
            <div class="contents-label mb-3">
              <h3>
                <a href="/departments/{{$project['slug']}}">{{ $project['title']}}</a>
              </h3>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
@endsection
