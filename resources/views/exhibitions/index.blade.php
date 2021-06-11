@extends('layouts.exhibitions')

@foreach($pages['data'] as $page)
  @section('title', $page['title'])
  @section('description', $page['meta_description'])
  @section('keywords', $page['meta_keywords'])
  @section('hero_image', $page['hero_image']['data']['full_url'])
  @section('hero_image_title', $page['hero_image_alt_text'])
@endforeach

@section('current')
<div class="container">
  <h2 class="lead">Our current exhibitions</h2>
  <div class="row">
    @foreach($current['data'] as $project)
    <div class="col-md-4 mb-3">
      <div class="card  h-100">
        @if(!is_null($project['hero_image']))
          <a href="{{ route('exhibition',$project['slug']) }}"><img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}" loading="lazy"
          alt="{{ $project['hero_image_alt_text'] }}"
          width="{{ $project['hero_image']['data']['thumbnails'][4]['width'] }}"
          height="{{ $project['hero_image']['data']['thumbnails'][4]['height'] }}"
          /></a>
        @endif
        <div class="card-body h-100">
          <div class="contents-label mb-3">
            <h3 class="lead">
              <a href="{{ route('exhibition',$project['slug']) }}">{{ $project['exhibition_title']}}</a>
            </h3>
            @if($project['ticketed'] ==1)
              <p class="text-info">Ticket and timed entry</p>
              <a class="btn btn-dark" href="https://tickets.museums.cam.ac.uk/overview/{{ $project['tessitura_string'] }}">Book now</a>
            @else
              <p class="text-info">Included in General admission</p>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  <h2 class="lead" id="displays">New displays in the galleries</h2>
  <div class="row" >
    @foreach($displays['data'] as $project)
    <div class="col-md-4 mb-3">
      <div class="card h-100">
        @if(!is_null($project['hero_image']))
          <a href="{{ route('exhibition',$project['slug']) }}"><img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}" loading="lazy"
          alt="{{ $project['hero_image_alt_text'] }}"
          width="{{ $project['hero_image']['data']['thumbnails'][4]['width'] }}"
          height="{{ $project['hero_image']['data']['thumbnails'][4]['height'] }}"
          /></a>
        @endif
        <div class="card-body h-100">
          <div class="contents-label mb-3">
            <h3 class="lead">
              <a href="{{ route('exhibition',$project['slug']) }}">{{ $project['exhibition_title']}}</a>
            </h3>
            @if($project['ticketed'] ==1)
              <p class="text-info">Ticket and timed entry</p>
              <a class="btn btn-dark" href="https://tickets.museums.cam.ac.uk/overview/{{ $project['tessitura_string'] }}">Book now</a>
            @else
              <p class="text-info">Included in General admission</p>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection



@section('future')
<div class="container">
  <h2 class="lead">Our forthcoming exhibitions and displays</h2>
  <div class="row">
    @foreach($future['data'] as $project)
    <div class="col-md-4 mb-3">
      <div class="card  h-100">
        @if(!is_null($project['hero_image']))
          <a href="{{ route('exhibition',$project['slug']) }}"><img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"
          loading="lazy"
          height="{{ $project['hero_image']['data']['thumbnails'][4]['height'] }}"
          width="{{ $project['hero_image']['data']['thumbnails'][4]['width'] }}"
          alt="{{ $project['hero_image_alt_text'] }}"
          /></a>
        @endif
        <div class="card-body h-100">

          <div class="contents-label mb-3">
            <h3 class="lead">
              <a href="{{ route('exhibition',$project['slug']) }}">{{ $project['exhibition_title']}}</a>
            </h3>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection

@section('archive')
<div class="container">
  <h2 class="lead">
    Archived exhibitions and displays
  </h2>
  <div class="row">
    @foreach($archive['data'] as $project)
    <div class="col-md-4 mb-3">
      <div class="card  h-100">
        @if(!is_null($project['hero_image']))
          <a href="{{ route('exhibition', $project['slug']) }}"><img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"
          alt="{{ $project['hero_image_alt_text'] }}"
          width="{{ $project['hero_image']['data']['thumbnails'][4]['width'] }}"
          height="{{ $project['hero_image']['data']['thumbnails'][4]['height'] }}"
          loading='lazy'
          /></a>
        @endif
        <div class="card-body h-100">
          <div class="contents-label mb-3">
            <h3 class="lead">
              <a href="{{ route('exhibition',$project['slug']) }}">{{ $project['exhibition_title']}}</a>
            </h3>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <a class="d-block btn btn-dark" href="{{ route('archive') }}">View our exhibition archive</a>
</div>
@endsection
