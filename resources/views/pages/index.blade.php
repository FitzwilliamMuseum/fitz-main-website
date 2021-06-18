@extends('layouts.layout')
@foreach($pages['data']  as $page)
@section('title', $page['title'])
@if(!empty($page['hero_image']))
  @section('hero_image', $page['hero_image']['data']['thumbnails'][10]['url'])
  @section('hero_image_title', $page['hero_image_alt_text'])
@else
  @section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
  @section('hero_image_title', "The inside of our Founder's entrance")
@endif
@section('description', $page['meta_description'])
@section('keywords', $page['meta_keywords'])

  @section('content')
    @if(!empty($page['carousel_associated']))
      @if($page['carousel_associated'][0]['carousels_id'])

        <div class="container-fluid">
          <div class="negative-padding">
            @include('includes.structure.carousel-pages')
          </div>
        </div>
      @endif
    @endif
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

    @if($page['slug'] == 'adult-programming')
      @inject('learningController', 'App\Http\Controllers\learningController')
      @php
      $sessions = $learningController::adultsessions();
      @endphp
      @include('includes.structure.adult')
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
    <h3 class="lead">
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
          <h3 class="lead">
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
