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
        <div class="card-body ">
          <div class="contents-label mb-3">
            <h3>
              <a href="https://tickets.museums.cam.ac.uk/{{ $production->ProductionSeason->Id }}/{{ $production->PerformanceId }}">{{ $production->PerformanceDescription }}</a>
            </h3>
            <h5 class="lead">
              {{ Carbon\Carbon::parse($production->PerformanceDate)->format('l j F Y')  }}
            </h5>
            <p>
              {{ $production->Season->Description }}<br/>
              {{ $production->ZoneMapDescription }}
            </p>

          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
