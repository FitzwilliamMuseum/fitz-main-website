@extends('layouts/layout')
@section('title','Research opportunities')
@section('hero_image',env('CONTENT_STORE') . 'baroque.jpg')
@section('hero_image_title', 'A Baroque feasting table by Ivan Day in feast and fast')

@section('content')
  @if(count($opps['data']) > 0)
  <div class="row">
      @foreach($opps['data'] as $opp)
      <div class="col-md-4 mb-3">
        <div class="card h-100 ">
          @if(!is_null($opp['hero_image']))
          <a href="{{ route('opportunity', $opp['slug']) }}"><img class="img-fluid" src="{{ $opp['hero_image']['data']['thumbnails'][4]['url']}}"
          alt="{{ $opp['hero_image_alt_text']}}" loading="lazy"
          width="{{ $opp['hero_image']['data']['thumbnails'][4]['width'] }}"
          height="{{ $opp['hero_image']['data']['thumbnails'][4]['height'] }}"/></a>
          @endif
          <div class="card-body h-100">
            <div class="contents-label mb-3">
              <h3 class="lead">
                <a href="{{ route('opportunity', $opp['slug']) }}">{{ $opp['title']}}</a>
              </h3>
            </div>
            </div>
          </div>
        </div>
      @endforeach
    @else
      <div class="col-md-12 shadow-sm p-3 mx-auto mb-3">
        <p>We currently have no opportunities available.</p>
      </div>
    @endif
  </div>
@endsection
