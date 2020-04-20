@extends('layouts/layout')
@foreach($pharos['data'] as $record)
  @section('keywords', $record['meta_keywords'])
  @section('description', $record['meta_description'])
  @section('title', $record['title'])
  @section('hero_image', $record['image']['data']['full_url'])
  @section('hero_image_title', $record['image_alt_text'])
    @section('content')
      <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
        <img src="{{ $record['image']['data']['thumbnails']['5']['url']}}"
        alt="{{$record['image_alt_text']}}" class="img-fluid float-right"
        width="400"
        />
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

@endforeach
