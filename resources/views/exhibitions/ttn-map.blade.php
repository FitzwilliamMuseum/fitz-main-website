@extends('layouts.fullscreen-map')
@section('map')
    <div id="map"></div>


    <div class="container p-3">
        @map(
        [
        'lat' => 48.9891693,
        'lng' => 2.3197111,
        'zoom' => 4,
        'minZoom' => 6,
        'maxZoom' => 18,
        ]
        )
    </div>
@endsection
