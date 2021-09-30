@extends('layouts.layout')
@section('title', 'Our objects and artworks')
@section('hero_image',env('CONTENT_STORE') . 'large_PD_8_1979_1_201709.jpg')
@section('hero_image_title', 'Cupid and Psyche - del Sallaio')
@section('description','A search page for our highlight objects')
@section('keywords', 'search,highlights, objects')
@section('collection-parallax', 'https://api.fitz.ms/mediaLib/pdp/pdp82/P_72_1999_200706_dc2.jpg')
@section('content')
<h3 class="lead">Search our objects and artworks</h3>
<div class="col-12 shadow-sm p-3 mx-auto mb-3">
{{ $page }}
</div>
<div class="col-12 shadow-sm p-3 mx-auto mb-3">
  {{ \Form::open(['url' => url('https://data.fitzmuseum.cam.ac.uk/search/results'),'method' => 'GET']) }}
<div class="row">
  <div class="form-group col-md-12">
    <input type="text" id="query" name="query" value="" class="form-control input-lg mr-4"
    placeholder="Search our collection" required value="{{ old('query') }}">
  </div>
</div>

<div class="row">
  <div class="col">
    <h4 class="lead">Visual results</h4>
  <div class="form-group form-check ">
    <input type="checkbox" class="form-check-input" id="images" name="images">
    <label class="form-check-label" for="images">Only with images?</label>
  </div>
</div>
<div class="col">
  <h4 class="lead">Operand for your search</h4>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="operator" id="operator" value="AND" checked>
    <label class="form-check-label" for="operator">
      AND
    </label>
  </div>

  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="operator" id="operator" value="OR" >
    <label class="form-check-label" for="operator">
      OR
    </label>
  </div>
</div>
<div class="col">
  <h4 class="lead">Sort by last update</h4>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="sort" id="sort" value="desc" checked>
    <label class="form-check-label" for="sort">
      Descending
    </label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="sort" id="sort" value="asc" >
    <label class="form-check-label" for="sort">
      Ascending
    </label>
  </div>
</div>

</div>
<div class="row">
  <div class="form-group col-md-12">
  <button type="submit" class="btn btn-dark">Submit</button>
</div>
</div>
@if(count($errors))
<div class="form-group">
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
</div>
@endif
{!! Form::close() !!}
</div>

<h3 class="lead">Search our highlights</h3>
<div class="col-12 shadow-sm p-3 mx-auto mb-3">
  {{ \Form::open(['url' => url('objects-and-artworks/highlights/search/results'),'method' => 'GET', 'class' => 'text-center']) }}
  <div class="row center-block">
    <div class="col-lg-12 center-block searchform">
      <div class="input-group mr-3">
        <input type="text" id="query" name="query" value="" class="form-control input-lg mr-4"
        placeholder="Search our highlight objects" required value="{{ old('query') }}&contentType:pharos">
        <span class="input-group-btn">
          <button class="btn btn-dark" type="submit">Search...</button>
        </span>
      </div>
    </div>
  </div>
  @if(count($errors))
  <div class="form-group">
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  </div>
  @endif
  {!! Form::close() !!}
</div>

@endsection

@section('theme-carousel')
<div class="container-fluid p-5 bg-white">
  <h3 class="lead">Explore highlights by theme</h3>
  <div class="row mb-2">
  <div id="carouselThemes" class="carousel slide sliders" data-ride="carousel" data-interval="false">
    <div class="carousel-inner row w-100 mx-auto">
      @php
      $slides = $pharos['data'];
      $count = sizeof($slides);
      $first = array_slice($slides,0,1);
      $rest = array_slice($slides, 1, $count);
      @endphp

      @foreach($first as $record)
      <div class="carousel-item  active">
        <div class="col-md-4">
        <div class="card h-100">
          @if(!is_null($record['hero_image']))
            <a href="/objects-and-artworks/highlights/themes/{{ $record['slug'] }}/"><img class="img-fluid" src="{{ $record[ 'hero_image']['data']['thumbnails'][4]['url']}}"
            alt="{{ $record[ 'hero_image']['title'] }}" loading="lazy"
            width="{{ $record['hero_image']['data']['thumbnails'][4]['width'] }}"
            height="{{ $record['hero_image']['data']['thumbnails'][4]['height'] }}"/></a>
          @endif
          <div class="card-body h-100">
            <h3 class="lead">
              <a href="/objects-and-artworks/highlights/themes/{{ $record['slug'] }}">{!! ucfirst(str_replace('-',' ', $record['title'])) !!}</a>
            </h3>
          </div>
        </div>
      </div>
      </div>
      @endforeach
      @foreach($rest as $record)
      <div class="carousel-item">
        <div class="col-md-4">
        <div class="card">
          @if(!is_null($record['hero_image']))
            <a href="/objects-and-artworks/highlights/themes/{{ $record['slug'] }}/"><img class="img-fluid" src="{{ $record[ 'hero_image']['data']['thumbnails'][4]['url']}}"
            alt="{{ $record[ 'hero_image']['title'] }}" loading="lazy"
            width="{{ $record['hero_image']['data']['thumbnails'][4]['width'] }}"
            height="{{ $record['hero_image']['data']['thumbnails'][4]['height'] }}"/></a>
          @endif
          <div class="card-body">
            <h3 class="lead">
              <a href="/objects-and-artworks/highlights/themes/{{ $record['slug'] }}">{!! ucfirst(str_replace('-',' ', $record['title'])) !!}</a>
            </h3>
          </div>
        </div>
      </div>
      </div>
      @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselThemes" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselThemes" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
@endsection

@section('period-carousel')
<div class="container-fluid p-5 bg-white">
  <h3 class="lead">Explore highlights by period</h3>
  <div class="row mb-2">
  <div id="carouselPeriods" class="carousel slide sliders" data-ride="carousel"
  data-interval="false" data-pause="hover">
    <div class="carousel-inner row w-100 mx-auto">
      @php
      $slides = $periods;
      $count = sizeof($slides);
      $first = array_slice($slides,0,1);
      $rest = array_slice($slides, 1, $count);
      @endphp

      @foreach($first as $record)
      <div class="carousel-item active">
        <div class="col-md-4 ">
        <div class="card h-100 ">
          @if(!is_null($record[0]['image']))
            <a href="/objects-and-artworks/highlights/periods/{{ Str::slug($record[0]['period_assigned'],'-') }}/"><img class="img-fluid" src="{{ $record[0][ 'image']['data']['thumbnails'][4]['url']}}"
            alt="{{ $record[0]['period_assigned'] }}" loading="lazy"
            width="{{ $record[0]['image']['data']['thumbnails'][4]['width'] }}"
            height="{{ $record[0]['image']['data']['thumbnails'][4]['height'] }}"/></a>
          @endif
          <div class="card-body">
            <h3 class="lead">
              <a href="/objects-and-artworks/highlights/periods/{{ Str::slug($record[0]['period_assigned'],'-') }}">{!! ucfirst(str_replace('-',' ', $record[0]['period_assigned'])) !!}</a>
            </h3>
          </div>
        </div>
      </div>
      </div>
      @endforeach
      @foreach($rest as $record)
      <div class="carousel-item">
        <div class="col-md-4">
        <div class="card h-100">
          @if(!is_null($record[0][ 'image']))
            <a href="/objects-and-artworks/highlights/periods/{{ Str::slug($record[0]['period_assigned']) }}"><img class="img-fluid" src="{{ $record[0][ 'image']['data']['thumbnails'][4]['url']}}"
            alt="{{ $record[0]['period_assigned'] }}" loading="lazy"
            width="{{ $record[0]['image']['data']['thumbnails'][4]['width'] }}"
            height="{{ $record[0]['image']['data']['thumbnails'][4]['height'] }}"/></a>
          @endif
          <div class="card-body">
            <h3 class="lead">
              <a href="/objects-and-artworks/highlights/periods/{{ Str::slug($record[0]['period_assigned']) }}">{!! ucfirst(str_replace('-',' ', $record[0]['period_assigned'])) !!}</a>
            </h3>
          </div>
        </div>
      </div>
      </div>
      @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselPeriods" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselPeriods" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
@endsection

@section('context-carousel')
<div class="container-fluid p-5 bg-white">
  <h3 class="lead">Explore object contexts</h3>
  <div class="row mb-3">
  <div id="carouselContexts" class="carousel slide sliders" data-ride="carousel"
  data-interval="false" data-pause="hover">
    <div class="carousel-inner row w-100 mx-auto">
      @php
      $slides = $context;
      $count = sizeof($slides);
      $first = array_slice($slides,0,1);
      $rest = array_slice($slides, 1, $count);
      @endphp

      @foreach($first as $record)
      <div class="carousel-item active">
        <div class="col-md-4 ">
        <div class="card h-100 ">
          @if(!is_null($record[0]['hero_image']))
            <a href="/objects-and-artworks/highlights/context/{{ $record[0]['section'] }}/"><img class="img-fluid" src="{{ $record[0][ 'hero_image']['data']['thumbnails'][4]['url']}}"
            alt="{{ $record[0][ 'hero_image_alt_text'] }}" loading="lazy"
            width="{{ $record[0][ 'hero_image']['data']['thumbnails'][4]['width'] }}"
            height="{{ $record[0][ 'hero_image']['data']['thumbnails'][4]['height'] }}"/></a>
          @endif
          <div class="card-body">
            <h3 class="lead">
              <a href="/objects-and-artworks/highlights/context/{{ $record[0]['section'] }}">{!! ucfirst(str_replace('-',' ', $record[0]['section'])) !!}</a>
            </h3>
          </div>
        </div>
      </div>
      </div>
      @endforeach
      @foreach($rest as $record)
      <div class="carousel-item">
        <div class="col-md-4">
        <div class="card h-100">
          @if(!is_null($record[0]['hero_image']))
            <a href="/objects-and-artworks/highlights/context/{{ $record[0]['section'] }}/"><img class="img-fluid" src="{{ $record[0]['hero_image']['data']['thumbnails'][4]['url']}}"
            alt="{{ $record[0][ 'hero_image_alt_text'] }}" loading="lazy"
            width="{{ $record[0][ 'hero_image']['data']['thumbnails'][4]['width'] }}"
            height="{{ $record[0][ 'hero_image']['data']['thumbnails'][4]['height'] }}"/></a>
          @endif
          <div class="card-body">
            <h3 class="lead">
              <a href="/objects-and-artworks/highlights/context/{{ $record[0]['section'] }}">{!! ucfirst(str_replace('-',' ', $record[0]['section'])) !!}</a>
            </h3>
          </div>
        </div>
      </div>
      </div>
      @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselContexts" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselContexts" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
@endsection
