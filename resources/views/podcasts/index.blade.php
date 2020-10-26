@extends('layouts.layout')
@section('title', 'Fitzwilliam Museum podcasts')
@section('hero_image', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/cover-podcasts.jpg')
@section('content')

<div class="row">
  <div class="col-md-4 mb-3">
    <div class="card h-100">
      <a href="/conversations/podcasts/in-my-minds-eye"><img class=" card-img-top img-fluid" src="https://fitz-cms-images.s3.eu-west-2.amazonaws.com/imme.jpg"
      alt="In My Mind's Eye logo"
      loading="lazy"/></a>
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3>
            In my mind's eye
          </h3>
        </div>
      </div>
    </div>
  </div>
  @foreach($podcasts['data'] as $podcast)
  <div class="col-md-4 mb-3">
    <div class="card h-100">
      <a href="{{ route('podcasts.series', $podcast['slug']) }}"><img class="card-img-top img-fluid" src="{{ $podcast['cover_image']['data']['thumbnails'][3]['url']}}"
      alt=""
      width="{{ $podcast['cover_image']['data']['thumbnails'][3]['width'] }}"
      height="{{ $podcast['cover_image']['data']['thumbnails'][3]['height'] }}"
      loading="lazy"/></a>
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3>
            <a href="{{ route('podcasts.series', $podcast['slug']) }}">{{ $podcast['title'] }}</a>
          </h3>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
