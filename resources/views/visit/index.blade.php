@extends('layouts.visitus')
@section('title', 'Visit us')
@section('hero_image', env('CONTENT_STORE') . 'wonder.jpg')
@section('hero_image_title', "The Museum's founder's building")
@section('description','How to visit the Fitzwilliam Museum in Cambridge')

@section('content')
<div class="row">
  <div class="col-md-3 mb-3">
    <div class="card  h-100">
      <a href="{{route('exhibitions')}}" class="stretched-link"><img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/RASCHIG_KOLLWITZ, KATHE (1).jpg?key=directus-large-crop" loading="lazy" alt="Exhibition Poster for The Human Touch" width="800" height="600"></a>
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3 class="lead">
            <a href="{{route('exhibitions')}}" class="stretched-link">Exhibitions</a>
          </h3>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3 mb-3">
    <div class="card h-100">
      <a href="{{route('exhibitions')}}#displays" class="stretched-link"><img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/Women%20makers%20and%20muses.jpg?key=directus-large-crop" alt="A highlight image for Gallery 1: British and European Art, 19th–20th Century" loading="lazy" width="800" height="600"></a>
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3 class="lead">
            <a href="{{route('exhibitions')}}#displays" class="stretched-link">New displays</a>
          </h3>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3 mb-3">
    <div class="card h-100">
      <a href="{{ route('galleries')}}" class="stretched-link"><img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/Fitzwilliam Museum_GalleryOne_Panorama_02_0.jpg?key=directus-large-crop" alt="A highlight image for Gallery 1: British and European Art, 19th–20th Century" loading="lazy" width="800" height="600"></a>
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3 class="lead">
            <a href="{{ route('galleries')}}" class="stretched-link">Our galleries</a>
          </h3>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3 mb-3">
    <div class="card  h-100">
      <a href="{{ route('events')}}" class="stretched-link"><img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/Scent from Nature Press 2.jpg?key=directus-large-crop" alt="A highlight image for Gallery 1: British and European Art, 19th–20th Century" loading="lazy" width="800" height="600"></a>
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3 class="lead">
            <a href="{{ route('events')}}" class="stretched-link">What's on?</a>
          </h3>
        </div>
      </div>
    </div>
  </div>

</div>
  @foreach($pages['data'] as $page)
  @section('description', $page['meta_description'])
  @section('keyword', $page['meta_keywords'])
  <div class="col-12 shadow-sm p-3 mt-3 mx-auto mb-3">
    <h2 class="lead">{{ $page['title']}}</h2>
    @markdown($page['body'])
  </div>
  @endforeach
@endsection

@section('map')
@map([
    'lat' => 52.199818,
    'lng' => 0.11975,
    'zoom' => 18,
    'minZoom' => 16,
    'maxZoom' => 18,
    'markers' => [
        [
            'title' => 'The Founder\'s Entrance',
            'lat' => 52.20032347341985,
            'lng' => 0.11982414954445642,
            'popup' => '<h4 class="lead">Founder\'s Entrance</h4><p>Access is via a flight of steps.</p>',

        ],
        [
            'title' => 'The Courtyard Entrance',
            'lat' => 52.19974696477096,
            'lng' => 0.12065154202527271,
            'popup' => '<h4 class="lead">Courtyard Entrance</h4><p>Accessible step free access.</p>',

        ],
        [
            'title' => 'Cambridge Station',
            'lat' => 52.19433858460627,
            'lng' => 0.1374599593479488,
            'popup' => '<h4 class="lead">Cambridge Station</h4><p>The railway station.</p>',

        ],
        [
            'title' => 'Cambridge Bus Station',
            'lat' => 52.2054313453068,
            'lng' => 0.12392614778108904,
            'popup' => '<h4 class="lead">Cambridge Bus Station</h4><p>The central bus station.</p>',

        ],
    ],
])
@endsection

@section('associated_pages')
<div class="container">
  <div class="row">


    @foreach($associated['data'] as $project)
    <div class="col-md-4 mb-3">
      <div class="card  h-100">
        @if(!is_null($project['hero_image']))
        <a href="{{ $project['section']}}/{{ $project['slug']}}"><img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"
        alt="{{ $project['hero_image_alt_text'] }}"
        width="{{ $project['hero_image']['data']['thumbnails'][4]['width'] }}"
        height="{{ $project['hero_image']['data']['thumbnails'][4]['height'] }}"
        loading="lazy"/></a>
        @endif
        <div class="card-body h-100">
          <div class="contents-label mb-3">
            <h3 class="lead">
              <a class="stretched-link" href="{{ $project['section']}}/{{ $project['slug']}}">{{ $project['title']}}</a>
            </h3>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection

@section('floorplans')
<ul id="floor-plans">
@foreach($floors['data'] as $floor)
  <li><a href="{{$floor['file']['data']['full_url']}}">{{$floor['title']}}</a></li>
@endforeach
</ul>
@endsection

@section('corona')
  @include('includes.structure.corona')
@endsection
