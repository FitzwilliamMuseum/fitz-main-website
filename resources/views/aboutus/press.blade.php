@extends('layouts.layout')
@section('title', 'Our press releases')
@section('hero_image', env('CONTENT_STORE') . 'cinderella_car_press.jpg')
@section('hero_image_title', 'Beggarstaffs Cinderella poster')
@section('description', 'A list of Fitzwilliam Museum press releases')
@section('keywords', 'press,release,fitzwilliam')

@section('press-contact')
<div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
  <p>
    Contact the press team: @fa('phone') 01223 332941 @fa('at')
    <a href="mailto:press@fitzmuseum.cam.ac.uk">press@fitzmuseum.cam.ac.uk</a>
  </p>
</div>
@endsection
@section('releases')
<div class="container">
  <div class="row">
    @foreach($press['data'] as $release)
    <div class="col-md-4 mb-3">

      <div class="card h-100">

        @if(!is_null($release['hero_image']))
          <img class="img-fluid" src="{{ $release['hero_image']['data']['thumbnails'][4]['url']}}"
          width="{{ $release['hero_image']['data']['thumbnails'][4]['width'] }}"
          height="{{ $release['hero_image']['data']['thumbnails'][4]['height'] }}"
          alt="{{ $release['hero_image_alt_text'] }}" loading="lazy"/>
        @endif
        <div class="card-body ">

          <div class="contents-label mb-3">
            <h3 class="lead">
              <a class="stretched-link" href="{{ $release['file']['data']['full_url'] }}">{{ $release['title']}}</a>
            </h3>
          </div>
            <p class="card-text">{{ substr(strip_tags(htmlspecialchars_decode($release['body'])),0,200) }}...</p>
            <p class="text-info">
              {{ Carbon\Carbon::parse($release['release_date'])->format('l j F Y') }}
            </p>
            <p> @mime($release['file']['type']) - @humansize($release['file']['filesize'])</p>
            <a href="{{ $release['file']['data']['full_url'] }}" class="btn d-block btn-dark stretched-link">Download file</a>

        </div>
      </div>
    </div>
    @endforeach
  </div>
  <nav aria-label="Page navigation">
    {{ $paginator->links() }}
  </nav>
</div>
@endsection
