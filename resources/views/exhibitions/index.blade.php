@extends('layouts.exhibitions')
@foreach($pages['data'] as $page)
@section('title', $page['title'])
@section('hero_image', $page['hero_image']['data']['full_url'])
@section('hero_image_title', $page['hero_image_alt_text'])

@section('content')
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
  @markdown($page['body'])
  </div>
@endsection
@endforeach

@section('current')
<div class="container">
  <h2>Our current displays</h2>
  @foreach($current['data'] as $project)
  <div class="col-md-4 mb-3">
    <div class="card card-body h-100">
      @if(!is_null($project['hero_image']))
      <img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"/>
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
@endsection



@section('future')
<div class="container">
  <h2>Our forthcoming exhibitions</h2>
  @foreach($future['data'] as $project)
  <div class="col-md-4 mb-3">
    <div class="card card-body h-100">
      @if(!is_null($project['hero_image']))
      <img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"/>
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
@endsection

@section('archive')
<div class="container">
  <h2>Archived exhibitions</h2>
  @foreach($archive['data'] as $project)
  <div class="col-md-4 mb-3">
    <div class="card card-body h-100">
      @if(!is_null($project['hero_image']))
      <img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"/>
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
@endsection
