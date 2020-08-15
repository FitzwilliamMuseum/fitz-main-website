@extends('layouts/layout')
@section('title','Contact our Learning team')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/baroque.jpg')
@section('hero_image_title', 'The baroque feasting table by Ivan Day in Feast and Fast')
@section('description', 'A page detailing our Learning team')
@section('keywords', 'research,active,museum, archaeology, classics,history,art')
  @section('content')
  <div class="row">
      @foreach($profiles['data'] as $profile)
      <div class="col-md-4 mb-3">
        <div class="card card-body h-100 ">

          <div class="container h-100">
            <div class="contents-label mb-3">
            <h3>
              <a href="/research/staff-profiles/{{ $profile['slug']}}">{{ $profile['display_name'] }}</a>
            </h3>
            <p>
              {{ $profile['job_title']}}<br />
              Telephone: {{ $profile['telephone_number']}}<br />
              Email: <a href="mailto:{{ $profile['email_address']}}">{{ $profile['email_address']}}</a>
            </p>
            </div>
          </div>
          <a href="/research/staff-profiles/{{ $profile['slug']}}" class="btn btn-dark">Read more</a>
        </div>
      </div>
      @endforeach
  </div>
  @endsection
