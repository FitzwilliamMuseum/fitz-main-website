@extends('layouts.exhibitions')

@section('title', 'The Museum\'s previous exhibitions and displays')
@section('description', 'An archived overview of exhibitions and displays')
@section('keywords', 'exhibition,archive,displays')
@section('hero_image', env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")

@section('archive')
<div class="container">
  <h2 class="lead">
    Archived exhibitions and displays
  </h2>
  <div class="row">
    @foreach($archive['data'] as $exhibition)
    <div class="col-md-4 mb-3">
      <div class="card  h-100">
        @if(!is_null($exhibition['hero_image']))
          <a href="{{ route('exhibition', $exhibition['slug']) }}"><img class="img-fluid" src="{{ $exhibition['hero_image']['data']['thumbnails'][4]['url']}}"
          alt="{{ $exhibition['hero_image_alt_text'] }}"
          width="{{ $exhibition['hero_image']['data']['thumbnails'][4]['width'] }}"
          height="{{ $exhibition['hero_image']['data']['thumbnails'][4]['height'] }}"
          loading='lazy'
          /></a>
        @endif
        <div class="card-body h-100">
          <div class="contents-label mb-3">
            <h3 class="lead">
              <a href="{{ route('exhibition',$exhibition['slug']) }}">{{ $exhibition['exhibition_title']}}</a>
            </h3>
            <p class="text-info">
              {{  Carbon\Carbon::parse($exhibition['exhibition_start_date'])->format('l dS F Y') }} to
              {{  Carbon\Carbon::parse($exhibition['exhibition_end_date'])->format('l dS F Y') }}
            </p>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
