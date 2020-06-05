@extends('layouts/layout')

@foreach($pages['data'] as $page)
  @section('title', $page['title'])
  @section('hero_image', $page['hero_image']['data']['full_url'])
  @section('hero_image_title', $page['hero_image_alt_text'])
  @section('description', 'Educational resources from the Fitzwilliam Museum')
  @section('keywords', 'education,resources,do it yourself, museum, cambridge, egypt,rome, greece')
    @section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
    @markdown($page['body'])
    </div>
    @endsection
@endforeach

@section('resources-plans')
  <div class="container">
    <h2>Resources by topic</h2>
    <div class="row">
      @foreach($res['data'] as $resource)
      <div class="col-md-4 mb-3">
        <div class="card card-body h-100">
          @if(!is_null($resource['hero_image']))
            <a href="/learning/resources/{{ $resource['slug']}}"><img class="img-fluid" src="{{ $resource['hero_image']['data']['thumbnails'][4]['url']}}"
            alt="A highlight image for {{ $resource['title'] }}"
            width="{{ $resource['hero_image']['data']['thumbnails'][4]['width'] }}"
            height="{{ $resource['hero_image']['data']['thumbnails'][4]['height'] }}"
            loading="lazy"/></a>
          @endif
          <div class="container h-100">
            <div class="contents-label mb-3">
              <h3>
                <a href="/learning/resources/{{ $resource['slug']}}">{{ $resource['title'] }}</a>
              </h3>
            </div>
          </div>
          <a href="/learning/resources/{{ $resource['slug']}}" class="btn btn-dark">Read more</a>
        </div>

      </div>
      @endforeach
    </div>
  </div>
@endsection

@section('diy')
  <div class="container">
    <h2>DIY and Into Action</h2>
    <div class="row">
      @foreach($stages['data'] as $resource)
      <div class="col-md-4 mb-3">
        <div class="card card-body h-100">
          @if(!is_null($resource['hero_image']))
            <a href="/learning/resources/{{ $resource['slug']}}"><img class="img-fluid" src="{{ $resource['hero_image']['data']['thumbnails'][4]['url']}}"
            alt="{{ $resource['hero_image_alt_text'] }}"
            height="{{ $resource['hero_image']['data']['thumbnails'][4]['height'] }}"
            width="{{ $resource['hero_image']['data']['thumbnails'][4]['width'] }}"
            loading="lazy"/></a>
          @endif
          <div class="container h-100">
            <div class="contents-label mb-3">
              <h3>
                <a href="/learning/resources/{{ $resource['slug']}}">{{ $resource['title']}}</a>
              </h3>
            </div>
          </div>
          <a href="/learning/resources/{{ $resource['slug']}}" class="btn btn-dark">Read more</a>
        </div>

      </div>
      @endforeach
    </div>
  </div>
@endsection
