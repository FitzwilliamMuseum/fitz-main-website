@extends('layouts.exhibitions')

@foreach($pages['data'] as $page)
  @section('title', $page['title'])
  @section('description', $page['meta_description'])
  @section('keywords', $page['meta_keywords'])
  @section('hero_image', $page['hero_image']['data']['full_url'])
  @section('hero_image_title', $page['hero_image_alt_text'])
@endforeach

@section('current')
<div class="container">
  <h2>Our current exhibitions & displays</h2>
  <div class="row">
    @foreach($current['data'] as $project)
    <div class="col-md-4 mb-3">
      <div class="card card-body h-100">
        @if(!is_null($project['hero_image']))
          <a href="exhibitions/{{ $project['slug']}}"><img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}" loading="lazy"
          alt="{{ $project['hero_image_alt_text'] }}"
          width="{{ $project['hero_image']['data']['thumbnails'][4]['width'] }}"
          height="{{ $project['hero_image']['data']['thumbnails'][4]['height'] }}"
          /></a>
        @endif
        <div class="container h-100">
          <div class="contents-label mb-3">
            <h3>
              <a href="exhibitions/{{ $project['slug']}}">{{ $project['exhibition_title']}}</a>
            </h3>
          </div>
        </div>
        <a href="exhibitions/{{ $project['slug']}}" class="btn btn-dark">Read more</a>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection



@section('future')
<div class="container">
  <h2>Our forthcoming exhibitions and displays</h2>
  <div class="row">
    @foreach($future['data'] as $project)
    <div class="col-md-4 mb-3">
      <div class="card card-body h-100">
        @if(!is_null($project['hero_image']))
          <a href="exhibitions/{{ $project['slug']}}"><img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"
          loading="lazy"
          height="{{ $project['hero_image']['data']['thumbnails'][4]['height'] }}"
          width="{{ $project['hero_image']['data']['thumbnails'][4]['width'] }}"
          alt="{{ $project['hero_image_alt_text'] }}"
          /></a>
        @endif
        <div class="container h-100">

          <div class="contents-label mb-3">
            <h3>
              <a href="exhibitions/{{ $project['slug']}}">{{ $project['exhibition_title']}}</a>
            </h3>
          </div>
        </div>
        <a href="exhibitions/{{ $project['slug']}}" class="btn btn-dark">Read more</a>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection

@section('archive')
<div class="container">
  <h2>
    Archived exhibitions and displays
  </h2>
  <div class="row">
    @foreach($archive['data'] as $project)
    <div class="col-md-4 mb-3">
      <div class="card card-body h-100">
        @if(!is_null($project['hero_image']))
          <a href="exhibitions/{{ $project['slug']}}"><img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"
          alt="{{ $project['hero_image_alt_text'] }}"
          width="{{ $project['hero_image']['data']['thumbnails'][4]['width'] }}"
          height="{{ $project['hero_image']['data']['thumbnails'][4]['height'] }}"
          loading='lazy'
          /></a>
        @endif
        <div class="container h-100">
          <div class="contents-label mb-3">
            <h3>
              <a href="exhibitions/{{ $project['slug']}}">{{ $project['exhibition_title']}}</a>
            </h3>
          </div>
        </div>
        <a href="exhibitions/{{ $project['slug']}}" class="btn btn-dark">Read more</a>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
