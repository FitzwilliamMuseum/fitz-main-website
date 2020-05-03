@extends('layouts.layout')
@foreach($pages['data'] as $page)
@section('hero_image', $page['hero_image']['data']['full_url'])
@section('hero_image_title', $page['hero_image_alt_text'])


@endforeach
@section('title','Objects and Artworks')

@section('collections')
<div class="container">
  <div class="row">
    @foreach($collections['data'] as $project)
    <div class="col-md-4 mb-3">
      <div class="card card-body h-100">
        @if(!is_null($project['hero_image']))
        <img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"/>
          @endif
      <div class="container h-100">
        <div class="contents-label mb-3">
          <h3>
            <a href="/collections/{{ $project['slug']}}">{{ $project['collection_name']}}</a>
          </h3>
          <p class="card-text">{{ substr(strip_tags(htmlspecialchars_decode($project['collection_description'])),0,200) }}...</p>
        </div>
      </div>
      <a href="/collections/{{ $project['slug']}}" class="btn btn-dark">Read more</a>
    </div>

  </div>
  @endforeach
  </div>
</div>

@endsection
