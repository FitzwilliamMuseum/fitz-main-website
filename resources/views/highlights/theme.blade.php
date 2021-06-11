@extends('layouts/layout')
@section('title','Collection Themes')
@section('description', 'A collection of objects from the collection of the Fitzwilliam Museum')
@section('keywords', 'museum,highlights,collection,objects')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")

@section('content')
<div class="row">
  @foreach($pharos['data'] as $record)
  <div class="col-md-4 mb-3">
    <div class="card  h-100">
      @if(!is_null($record['hero_image']))
        <a href="/objects-and-artworks/highlights/themes/{{ $record['slug'] }}/"><img class="img-fluid" src="{{ $record[ 'hero_image']['data']['thumbnails'][4]['url']}}"
        alt="{{ $record[ 'hero_image']['title'] }}" loading="lazy"
        width="{{ $record['hero_image']['data']['thumbnails'][4]['width'] }}"
        height="{{ $record['hero_image']['data']['thumbnails'][4]['height'] }}"/></a>
      @endif
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3 class="lead">
            <a href="/objects-and-artworks/highlights/themes/{{ $record['slug'] }}">{!! ucfirst(str_replace('-',' ', $record['title'])) !!}</a></h3>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
