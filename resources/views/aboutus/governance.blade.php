@extends('layouts/layout')
@section('title','Our Governance Documents')
@section('hero_image',env('CONTENT_STORE') . 'millais_bridesmaid.jpg')
@section('hero_image_title','Millais\'s Bridesmaid')
@section('description', 'A list of governance files for the Fitzwilliam Museum')
@section('keywords', 'fitzwilliam,museum,governance,pdf')
@section('content')
<div class="row">

    @foreach($gov['data'] as $document)
      <div class="col-md-4 mb-3">
        <div class="card h-100">
          @if(!is_null($document['hero_image']))
            <a class="stretched-link" href="{{ $document['file']['data']['full_url'] }}"><img class="card-img-top" src="{{ $document['hero_image']['data']['thumbnails'][2]['url']}}"
            width="{{ $document['hero_image']['data']['thumbnails'][2]['width'] }}"
            height="{{ $document['hero_image']['data']['thumbnails'][2]['height'] }}"
            alt="{{ $document['hero_image_alt_text'] }}" loading="lazy"/></a>
          @else
            <a class="stretched-link" href="{{ $document['file']['data']['full_url'] }}"><img class="card-img-top" src="https://content.fitz.ms/fitz-website/assets/Fitzwilliam%20Museum%20Main%20Entrance%202018_3.jpg?key=directus-medium-crop"
            height="300" width="300" alt="The Museum's founder's entrance ceiling" loading="lazy"/></a>
          @endif
          <div class="card-body ">
              <h3 class="lead">
                <a class="stretched-link" href="{{ $document['file']['data']['full_url'] }}">{{ $document['title']}}</a>
              </h3>
              <p>@mime($document['file']['type']) - @humansize($document['file']['filesize'])</p>
              <p class="text-info">
                Posted: {{ Carbon\Carbon::parse($document['created_on'])->format('l j F Y') }}<br/>
                Document type: {{ ucfirst($document['type']) }}
              </p>
          </div>
        </div>
      </div>

    @endforeach

</div>
@endsection
