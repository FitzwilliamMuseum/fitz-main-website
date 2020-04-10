@extends('layouts.layout')

@section('title','Our collections')

@section('content')
<div class="row">
  @foreach($collections['data'] as $project)
  <div class="col-md-6 mb-3">
    <div class="card card-body h-100
    intro-card ">

    <div class="container h-100">

      <!-- start image block -->
      <div class="cover-image ">

      </div>
      <!-- end image block -->

      <div class="contents-label mb-3">
        <h3>
          <a href="/collections/by-focus/{{ $project['slug']}}">{{ $project['collection_name']}}</a>
        </h3>
      </div>
    </div>
    <a href="/collections/by-focus/{{ $project['slug']}}" class="btn btn-dark">Read more</a>
  </div>

</div>
@endforeach
</div>
@endsection
