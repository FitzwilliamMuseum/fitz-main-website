@extends('layouts.layout')
@foreach($pages['data'] as $page)
@section('title', $page['title'])
@section('hero_image', $page['hero_image']['data']['full_url'])
@section('hero_image_title', $page['hero_image_alt_text'])

@section('content')
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
  @markdown($page['body'])
  </div>
  @if($page['vimeo_id'])
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
    @include('includes.vimeo')
  </div>
  @endif
@endsection
@endforeach
@section('associated_pages')
<div class="container">
<div class="row">
  @foreach($associated['data'] as $project)
  <div class="col-md-6 mb-3">
    <div class="card card-body h-100">
      @if(!is_null($project['hero_image']))
      <img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"/>
        @endif
    <div class="container h-100">

      <div class="contents-label mb-3">
        <h3>
          <a href="{{ $project['section']}}/{{ $project['slug']}}">{{ $project['title']}}</a>
        </h3>
        <p class="card-text">{{ substr(strip_tags(htmlspecialchars_decode($project['body'])),0,200) }}...</p>

      </div>
    </div>
    <a href="{{ $project['section']}}/{{ $project['slug']}}" class="btn btn-dark">Read more</a>
  </div>

</div>
@endforeach
</div>
</div>

@endsection
