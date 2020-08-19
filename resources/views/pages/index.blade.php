@extends('layouts.layout')
@foreach($pages['data']  as $page)
@section('title', $page['title'])
@section('hero_image', $page['hero_image']['data']['full_url'])
@section('hero_image_title', $page['hero_image_alt_text'])
@section('description', $page['meta_description'])
@section('keywords', $page['meta_keywords'])

  @section('content')
  <div class="col-12 shadow-sm p-3 mx-auto mb-3">
    @markdown($page['body'])
  </div>

    @if($page['vimeo_id'])
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
      @include('includes.social.vimeo')
    </div>
    @endif

    @if($page['youtube_id'])
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
      @include('includes.social.youtube')
    </div>
    @endif

    @if($page['sms_id'])
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
      @include('includes.social.sms')
    </div>
    @endif

    @if($page['slug'] == 'school-sessions')
      @inject('learningController', 'App\Http\Controllers\learningController')
      @php
      $sessions = $learningController::schoolsessions();
      @endphp
      @include('includes.structure.sessions')
    @endif

    @if($page['slug'] == 'young-people')
      @inject('learningController', 'App\Http\Controllers\learningController')
      @php
      $sessions = $learningController::youngpeople();
      @endphp
      @include('includes.structure.young')
    @endif

    @if($page['slug'] == 'families')
      @inject('learningController', 'App\Http\Controllers\learningController')
      @php
      $sessions = $learningController::families();
      @endphp
      @include('includes.structure.families')
    @endif



    @if(!empty($records))
    <h3>
      Related to this page
    </h3>

    <div class="row">
    @foreach($records as $record)
    <div class="col-md-4 mb-3">
      <div class="card  h-100">
        @if(!is_null($record['thumbnail']))
          <a href="{{ $record['url'][0]}}"><img class="img-fluid" src="{{ $record['thumbnail'][0]}}"
          alt="Highlight image for {{ $record['title'][0] }}" /></a>
        @else
          <a href="{{ $record['url'][0]}}"><img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
          alt="No image was provided for {{ $record['title'][0] }}"/></a>
        @endif
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3>
            <a href="{{ $record['url'][0]}}">{{ $record['title'][0] }}</a>
          </h3>
        </div>
      </div>
    </div>

    </div>
    @endforeach
    </div>
    @endif
  @endsection


@endforeach
