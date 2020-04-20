@extends('layouts/layout')
@foreach($pharos['data'] as $record)
  @section('keywords', $record['meta_keywords'])
  @section('description', $record['meta_description'])
  @section('title', $record['title'])
  @section('hero_image', $record['image']['data']['full_url'])
  @section('hero_image_title', $record['image_alt_text'])
    @section('content')
      <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
        <figure class="figure">
        <img src="{{ $record['image']['data']['thumbnails']['5']['url']}}"
        alt="{{$record['image_alt_text']}}" class="img-fluid float-right"
        width="400"
        />
        <figcaption class="figure-caption text-right">{{$record['image_alt_text']}}</figcaption>

        </figure>
        @markdown($record['description'])
      </div>

      <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
        <h2>Meta Data</h2>
        <ul>
          <li>Place of origin: {{ $record['place_of_origin'] }}</li>
        </ul>
      </div>

    @endsection

    @section('map')
    @map([
        'lat' => $record['map']['lat'],
        'lng' => $record['map']['lng'],
        'zoom' => 6,
        'markers' => [
            [
                'title' => 'Find the museum',
                'lat' => $record['map']['lat'],
                'lng' => $record['map']['lng'],
                'popup' => 'Place of origin',
            ],
        ],
    ])

    @endsection
    @section('sketchfab-collection')

      @if(!empty($record['sketchfab_id']))
      <div class="container">
        <h2>3D scan</h2>
        <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
          <div class="embed-responsive embed-responsive-1by1">
            <iframe title="A 3D model" class="embed-responsive-item"
            src="https://sketchfab.com/models/{{ $record['sketchfab_id']}}/embed?"
            frameborder="0" allow="autoplay; fullscreen; vr" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
          </div>
        </div>
      </div>
      @endif
    @endsection
@endforeach
