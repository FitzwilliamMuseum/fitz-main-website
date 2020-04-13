@extends('layouts/visitus')
@section('title', 'Visiting us')
@section('hero_image', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/founders.jpg')
@section('hero_image_title', "The Museum's founder's building")
@section('parallax_home', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/old_g3.jpg')

@section('opening-hours')
  <h2>When we're open</h2>
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
    @include('includes/opening')
  </div>
@endsection

@section('content')

  @foreach($pages['data'] as $page)

  <div class="col-12 shadow-sm p-3 mt-3 mx-auto mb-3 rounded">
    <h2>{{ $page['title']}}</h2>
    @markdown($page['body'])
  </div>
  @endforeach
@endsection

@section('map')
@map([
    'lat' => 52.200278,
    'lng' => 0.119444,
    'zoom' => 18,
    'minZoom' => 16,
    'maxZoom' => 18,
    'markers' => [
        [
            'title' => 'Find the museum',
            'lat' => 52.200278,
            'lng' => 0.119444,
            'popup' => '<h3>The Museum</h3><p>We are located here</p>',

        ],
    ],
])
@endsection
