@extends('layouts/layout')
@section('title','Researcher profiles')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/baroque.jpg')
@section('content')
<div class="row">
    @foreach($profiles['data'] as $project)
      <div class="col-md-6 mb-3">
      <div class="card card-body h-100 ">
        @if(!is_null($project['profile_image']))
        <img class="img-fluid" src="{{ $project['profile_image']['data']['thumbnails'][2]['url']}}"/>
          @endif
      <div class="container h-100">
        <div class="contents-label mb-3">
        <h3>
          <a href="/research/staff-profiles/{{ $project['slug']}}">{{ $project['display_name']}}</a>
        </h3>
        
      </h4>

        </div>
      </div>
      <a href="/research/staff-profiles/{{ $project['slug']}}" class="btn btn-dark">Read more</a>
    </div>

    </div>
    @endforeach
</div>
@endsection
