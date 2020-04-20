@extends('layouts/layout')
@foreach($pharos['data'] as $record)
  @section('keywords', $record['meta_keywords'])
  @section('description', $record['meta_description'])
  @section('title', $record['title'])
  @section('hero_image', $record['image']['data']['full_url'])
  @section('hero_image_title', $record['image_alt_text'])
    @section('content')
      <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
        <figure class="figure float-right p-3">
        <img src="{{ $record['image']['data']['thumbnails']['5']['url']}}"
        alt="{{$record['image_alt_text']}}" class="img-fluid"
        width="400"
        />
        <figcaption class="figure-caption text-right">{{$record['image_alt_text']}}</figcaption>

        </figure>
        <h2>Collections ID: {{$record['adlib_id']}}</h2>
        @markdown($record['description'])
      </div>

      <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
        <h2>Meta Data</h2>
        <ul>
          @if(!is_null($record['place_of_origin']))
          <li>Place of origin: {{ $record['place_of_origin'] }}</li>
          @endif
          @if(!is_null($record['date']))
          <li>Date: {{ $record['date'] }}</li>
          @endif
          @if(!is_null($record['maker'] ))
          <li>Maker: {{ $record['maker'] }}</li>
          @endif
          @if(!is_null($record['material'] ))
          <li>Material: {{ $record['material'] }}</li>
          @endif
          @if(!is_null($record['map']))
          <li>Map coordinates: {{ $record['map']['lat'] }}, {{$record['map']['lng']}}</li>
          @endif
        </ul>
      </div>

    @endsection

    @if(!is_null($record['map']))
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
    @endif

    @section('youtube')
      @if(!empty($record['youtube_id']))
      <div class="container">
      <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item "
          src="https://www.youtube.com/embed/{{$record['youtube_id']}}" frameborder="0"
          allowfullscreen></iframe>
        </div>
      </div>
    </div>
      @endif
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
    @if(!empty($record['audio_guide']))
    @section('audio-guide')
      @include('includes.audio-guide')
    @endsection
    @endif
@endforeach
