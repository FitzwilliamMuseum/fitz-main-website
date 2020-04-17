@extends('layouts/layout')
@foreach($ltd['data'] as $page)
@section('title', $page['title'])
@section('hero_image', $page['hero_image']['data']['full_url'])
@section('hero_image_title', $page['hero_image_alt_text'])
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
        <img class="img-fluid" src="{{ $resource['hero_image']['data']['thumbnails'][7]['url']}}"/>
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
