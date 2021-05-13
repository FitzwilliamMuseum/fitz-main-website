@extends('layouts.layout')
@section('title','Our events')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('collections')
<div class="container">
  <div class="row">
    @php
    usort($productions, function($a, $b) {
      return strtotime($a->PerformanceDate) - strtotime($b->PerformanceDate);
    });
    @endphp
    @foreach($productions as $production)
      {{-- @dump($production) --}}

    <div class="col-md-4 mb-3">
      <div class="card h-100">
        @if($production->Facility->Id === 21)
          <img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/HT%20Press%20August%201.jpg?key=directus-medium-crop"
          alt="A stand in image for "/>
        @else
        <img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/img_20190105_153947.jpg?key=directus-medium-crop"
        alt="A stand in image for "/>
        @endif
        <div class="card-body ">
          <div class="contents-label mb-3">
            <h3>
              <a href="https://tickets.museums.cam.ac.uk/{{ $production->ProductionSeason->Id }}/{{ $production->PerformanceId }}">{{ $production->PerformanceDescription }}</a>
            </h3>
            <h5 class="lead">
              {{ Carbon\Carbon::parse($production->PerformanceDate)->format('l j F Y')  }}
            </h5>
            <p>
              <span class="lead">{{ $production->Season->Description }}</span>
                <br/>
              {{ $production->ZoneMapDescription }}
            </p>
            <p>
              {!! ucfirst(nl2br($production->SalesNotes)) !!}
            </p>
            @isset($production->Duration)
              <p>Duration: {{ $production->Duration }} minutes</p>
            @endisset
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
