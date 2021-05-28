@extends('layouts.exhibitions')

@section('title', 'The Museum\'s previous exhibitions and displays')
@section('description', 'An archived overview of exhibitions and displays')
@section('keywords', 'exhibition,archive,displays')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")

@section('archive')
<div class="container">
  <h2>
    Archived exhibitions and displays
  </h2>
  <div class="row">
    @foreach($archive['data'] as $project)
    <div class="col-md-4 mb-3">
      <div class="card  h-100">
        @if(!is_null($project['hero_image']))
          <a href="{{ route('exhibition', $project['slug']) }}"><img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"
          alt="{{ $project['hero_image_alt_text'] }}"
          width="{{ $project['hero_image']['data']['thumbnails'][4]['width'] }}"
          height="{{ $project['hero_image']['data']['thumbnails'][4]['height'] }}"
          loading='lazy'
          /></a>
        @endif
        <div class="card-body h-100">
          <div class="contents-label mb-3">
            <h3>
              <a href="{{ route('exhibition',$project['slug']) }}">{{ $project['exhibition_title']}}</a>
            </h3>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
