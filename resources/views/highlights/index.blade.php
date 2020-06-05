@extends('layouts/layout')
@section('title','Highlights from our collection')
@section('description', 'A collection of objects from the collection of the Fitzwilliam Museum')
@section('keywords', 'museum,highlights,collection,objects')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")

@section('content')
<div class="row">
  @foreach($pharos['data'] as $record)
  <div class="col-md-4 mb-3">
    <div class="card card-body h-100">
      @if(!is_null($record['image']))
        <img class="img-fluid" src="{{ $record['image']['data']['thumbnails'][4]['url']}}"
        alt="{{ $record['image_alt_text'] }}" loading="lazy"
        width="{{ $record['image']['data']['thumbnails'][4]['width'] }}"
        height="{{ $record['image']['data']['thumbnails'][4]['height'] }}"/>
      @endif
      <div class="container h-100">
        <div class="contents-label mb-3">
          <h3>
            <a href="/objects-and-artworks/highlights/{{ $record['slug']}}">{{ $record['title']}}</a></h3>
        </div>
      </div>
      <a href="/objects-and-artworks/highlights/{{ $record['slug']}}"
      class="btn btn-dark">Read more</a>
    </div>
  </div>
  @endforeach
</div>
<nav aria-label="Page navigation">
  {{ $paginator->links() }}
</nav>
@endsection
