@extends('layouts.layout')
@section('title', 'Our Galleries')
@foreach($pages['data'] as $page)
@section('hero_image', $page['hero_image']['data']['full_url'])
@section('hero_image_title', $page['hero_image_alt_text'])


@endforeach

@section('themes')
<div class="container">
  <h2>Our galleries</h2>
  <div class="row">

  @foreach($galleries['data'] as $theme)
  <div class="col-md-4 mb-3">
    <div class="card card-body h-100">
      @if(!is_null($theme['hero_image']))
      <img class="img-fluid" src="{{ $theme['hero_image']['data']['thumbnails'][4]['url']}}"/>
      @endif
      <div class="container h-100">
        <div class="contents-label mb-3">
          <h3>
            <a href="galleries/{{ $theme['slug']}}">{{ $theme['gallery_name']}}</a>
          </h3>
          @if($theme['gallery_status'])
          <span class="badge badge-wine">{{$theme['gallery_status'][0]}}</span>
          @endif
        </div>
      </div>
      <a href="galleries/{{ $theme['slug']}}" class="btn btn-dark">Read more</a>
    </div>
  </div>
  @endforeach
</div>
</div>
@endsection
