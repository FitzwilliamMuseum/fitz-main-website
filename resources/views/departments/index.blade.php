@extends('layouts.layout')

@section('title','Our departments')

@section('content')
  @foreach($departments['data'] as $dept)
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
          <a href="/departments/titled/{{ $dept['slug']}}">{{ $dept['title']}}</a>
        </h3>
      </div>
    </div>
    <a href="/departments/titled/{{ $dept['slug']}}" class="btn btn-dark">Read more</a>
  </div>

@endforeach
</div>
@endsection
