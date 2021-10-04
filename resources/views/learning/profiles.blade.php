@extends('layouts/layout')
@section('title','Contact our Learning team')
@section('hero_image', env('CONTENT_STORE') . 'baroque.jpg')
@section('hero_image_title', 'The baroque feasting table by Ivan Day in Feast and Fast')
@section('description', 'A page detailing our Learning team')
@section('keywords', 'research,active,museum, archaeology, classics,history,art')
@section('content')
  <div class="row">
    @foreach($profiles['data'] as $profile)
      <div class="col-md-4 mb-3">
        <div class="card card-fitz h-100 ">
          <div class="card-body">
            <div class="contents-label mb-3">
              <h3 class="lead">
                {{ $profile['display_name'] }}
              </h3>
              <p>
                {{ $profile['job_title']}}<br />
                Telephone: {{ $profile['telephone_number']}}<br />
                Email: <a href="mailto:{{ $profile['email_address']}}">{{ $profile['email_address']}}</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection
