@extends('layouts.layout')
@foreach($pages['data']  as $page)
@section('title', $page['title'])
@section('hero_image', $page['hero_image']['data']['full_url'])
@section('hero_image_title', $page['hero_image_alt_text'])
@section('description', $page['meta_description'])
@section('keywords', $page['meta_keywords'])

  @section('content')
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
    @markdown($page['body'])
  </div>

    @if($page['vimeo_id'])
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
      @include('includes.social.vimeo')
    </div>
    @endif

    @if($page['youtube_id'])
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
      @include('includes.social.youtube')
    </div>
    @endif

    @if($page['slug'] == 'school-sessions')
      @inject('learningController', 'App\Http\Controllers\learningController')
      @php
      $sessions = $learningController::schoolsessions();
      @endphp
      @include('includes.structure.sessions')
    @endif

    @if(!empty($records))
    <h3>
      Related to this page
    </h3>

    <div class="row">
    @foreach($records as $record)
    <div class="col-md-4 mb-3">
      <div class="card card-body h-100">
        @if(!is_null($record['thumbnail']))
          <img class="img-fluid" src="{{ $record['thumbnail'][0]}}"
          alt="Highlight image for {{ $record['title'][0] }}" />
        @else
          <img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
          alt="No image was provided for {{ $record['title'][0] }}"/>
        @endif
      <div class="container h-100">
        <div class="contents-label mb-3">
          <h3>
            <a href="{{ $record['url'][0]}}">{{ $record['title'][0] }}</a>
          </h3>
        </div>
      </div>
      <a href="{{ $record['url'][0]}}" class="btn btn-dark">Read more</a>
    </div>

    </div>
    @endforeach
    </div>
    @endif
  @endsection


@endforeach
