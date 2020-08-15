@extends('layouts/layout')
@section('title','Researcher profiles')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/baroque.jpg')
@section('hero_image_title', 'The baroque feasting table by Ivan Day in Feast and Fast')
@section('description', 'A page detailing research active staff for the Fitzwilliam Museum')
@section('keywords', 'research,active,museum, archaeology, classics,history,art')
  @section('content')
  <div class="row">
      @foreach($profiles['data'] as $profile)
      <div class="col-md-4 mb-3">
        <div class="card h-100 ">
          @if(!is_null($profile['profile_image']))
            <img class="img-fluid" src="{{ $profile['profile_image']['data']['thumbnails'][2]['url']}}"
            alt="Profile image for {{ $profile['display_name'] }}"
            width="{{ $profile['profile_image']['data']['thumbnails'][4]['width'] }}"
            height="{{ $profile['profile_image']['data']['thumbnails'][4]['height'] }}"
            loading="lazy"/>
          @endif
          <div class="card-body h-100">
            <div class="contents-label mb-3">
            <h3>
              <a href="/research/staff-profiles/{{ $profile['slug']}}">{{ $profile['display_name'] }}</a>
            </h3>
            </div>
          </div>
        </div>
      </div>
      @endforeach
  </div>
  @endsection
