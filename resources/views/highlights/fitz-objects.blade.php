@extends('layouts/layout')
@section('title','Our staff choose their highlights from our collections')
@section('description', 'A collection of favourite objects chosen by staff from the collection of the Fitzwilliam Museum')
@section('keywords', 'museum,highlights,collection,objects')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")

@section('content')
<div class="row">
  @foreach($week['data'] as $record)
  <div class="col-md-4 mb-3">
    <div class="card  h-100">
      @if(!is_null($record['hero_image']))
        <a href="/objects-and-artworks/staff-favourites/{{ $record['slug']}}"><img class="img-fluid" src="{{ $record['hero_image']['data']['thumbnails'][4]['url']}}"
        alt="{{ $record['hero_image_alt_text'] }}" loading="lazy"
        width="{{ $record['hero_image']['data']['thumbnails'][4]['width'] }}"
        height="{{ $record['hero_image']['data']['thumbnails'][4]['height'] }}"/></a>
      @endif
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3 class="lead">
            <a class="extended-link" href="/objects-and-artworks/staff-favourites/{{ $record['slug']}}">{{ $record['title'] }}</a></h3>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
<nav aria-label="Page navigation">
  {{ $paginator->links() }}
</nav>
@endsection
