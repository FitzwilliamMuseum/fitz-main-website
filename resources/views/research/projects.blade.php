@extends('layouts/layout')
@section('title','Research projects')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/baroque.jpg')
@section('content')

<div class="row">
    @foreach($projects['data'] as $project)
      <div class="col-md-6 mb-3">
      <div class="card card-body h-100 ">
        @if(!is_null($project['hero_image']))
        <img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"/>
          @endif
      <div class="container h-100">
        <div class="contents-label mb-3">
        <h3>
          <a href="research/project/{{ $project['slug']}}">{{ $project['title']}}</a>
        </h3>
          <p class="card-text">{{ $project['summary']}}</p>
        </div>
      </div>
      <a href="research/project/{{ $project['slug']}}" class="btn btn-dark">Read more</a>
    </div>

    </div>
    @endforeach
</div>
@endsection
