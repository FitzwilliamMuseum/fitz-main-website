@extends('layouts/visitus')
@section('title', 'Visit us')
@section('hero_image', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/founders.jpg')
@section('hero_image_title', "The Museum's founder's building")
@section('parallax_home', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/old_g3.jpg')
@section('description','How to visit the Fitzwilliam Museum in Cambridge')

@section('content')
<div class="row">
  <div class="col-md-4 mb-3">
    <div class="card  h-100">
      <img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/RASCHIG_KOLLWITZ, KATHE (1).jpg?key=directus-large-crop" loading="lazy" alt="Exhibition Poster for The Human Touch" width="800" height="600">
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3>
            <a href="/visit-us/exhibitions">Exhibitions and displays</a>
          </h3>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-4 mb-3">
    <div class="card  h-100">
      <img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/Fitzwilliam Museum_GalleryOne_Panorama_02_0.jpg?key=directus-large-crop" alt="A highlight image for Gallery 1: British and European Art, 19th–20th Century" loading="lazy" width="800" height="600">
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3>
            <a href="visit-us/galleries">Our galleries</a>
          </h3>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-4 mb-3">
    <div class="card  h-100">
      <img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/Scent from Nature Press 2.jpg?key=directus-large-crop" alt="A highlight image for Gallery 1: British and European Art, 19th–20th Century" loading="lazy" width="800" height="600">
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3>
            <a href="/events">What's on?</a>
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
    <h2>{{ $page['title']}}</h2>
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
            'popup' => '<h4>Founder\'s Entrance</h4><p>Access is via a flight of steps.</p>',

        ],
        [
            'title' => 'The Courtyard Entrance',
            'lat' => 52.19974696477096,
            'lng' => 0.12065154202527271,
            'popup' => '<h4>Courtyard Entrance</h4><p>Accessible step free access.</p>',

        ],
        [
            'title' => 'Cambridge Station',
            'lat' => 52.19433858460627,
            'lng' => 0.1374599593479488,
            'popup' => '<h4>Cambridge Station</h4><p>The railway station.</p>',

        ],
        [
            'title' => 'Cambridge Bus Station',
            'lat' => 52.2054313453068,
            'lng' => 0.12392614778108904,
            'popup' => '<h4>Cambridge Bus Station</h4><p>The central bus station.</p>',

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
            <h3>
              <a href="{{ $project['section']}}/{{ $project['slug']}}">{{ $project['title']}}</a>
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
