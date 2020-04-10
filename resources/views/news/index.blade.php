@extends('layouts/layout')

@section('title','News from the Fitz')

@section('content')
<div class="row">
  @foreach($news['data'] as $project)
  <div class="col-md-6 mb-3">
    <div class="card card-body h-100
    intro-card ">

    <div class="container h-100">

      <!-- start image block -->
      <div class="cover-image ">
        @if(!is_null($project['field_image']))
        <img class="align-self-center ml-1 mr-3 rounded-circle float-right thumb-post" src="{{ $project['field_image']['data']['full_url']}}" alt="Discover stories from the exhibition's profile image" height="150" width="150" loading="lazy">
        @endif
      </div>
      <!-- end image block -->

      <div class="contents-label mb-3">
        <h3>
          <a href="news/article/{{ $project['slug']}}">{{ $project['article_title']}}</a>
        </h3>
      </div>
    </div>
    <a href="news/article/{{ $project['slug']}}" class="btn btn-dark">Read more</a>
  </div>

</div>
@endforeach
</div>
@endsection
