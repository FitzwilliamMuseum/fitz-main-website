@extends('layouts.layout')
@php
$title = str_replace("-", " ", $facility);
$title = str_replace(array('bookings','FFF', 'fff'),array('Events','Fitz Family First','Fitz Family First'), $title );
$title = ucwords($title);
@endphp
@section('title', $title)
@section('hero_image', env('CONTENT_STORE') . 'img_20190105_153947.jpg' . '?key=banner')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('collections')
  <div class="container">
    <h2 class="text-center mb-3 lead">Events in the next 30 days</h2>
    @php
    usort($productions, function($a, $b) {
      return strtotime($a->PerformanceDate) - strtotime($b->PerformanceDate);
    });
    @endphp
    <div class="row">
      <div class="col-md-3 shadow-sm  mx-auto mb-3 ">
        <div class="card-body">
          <h4 class="lead">Filter events</h4>
          @include('includes.elements.filters-tessitura')
        </div>
      </div>
      <div class="col-md-9">
        <div class="row">
          @foreach($productions as $production)
            {{-- @dump($production) --}}
            <div class="col-md-4 mb-3">
              <div class="card h-100">
                @if($production->Facility->Id === 21)
                  <a class="stretched-link" href="https://tickets.museums.cam.ac.uk/{{ $production->ProductionSeason->Id }}/{{ $production->PerformanceId }}"><img class="card-img-top" src="@tessitura($production->ProductionSeason->Id)"
                    alt="A stand in image for "/></a>
                  @elseif($production->Facility->Id === 56)
                    <a class="stretched-link" href="https://tickets.museums.cam.ac.uk/{{ $production->ProductionSeason->Id }}/{{ $production->PerformanceId }}"><img class="card-img-top" src="@tessitura($production->PerformanceId )"
                      alt="A stand in image for "/></a>
                  @else
                    <a class="stretched-link" href="https://tickets.museums.cam.ac.uk/{{ $production->ProductionSeason->Id }}/{{ $production->PerformanceId }}"><img class="card-img-top" src="@tessitura($production->ProductionSeason->Id)"
                      alt="A stand in image for "/></a>
                    @endif
                    <div class="card-body ">
                      <div class="contents-label mb-3">
                        <h3 class="lead">
                          <a class="stretched-link" href="https://tickets.museums.cam.ac.uk/{{ $production->ProductionSeason->Id }}/{{ $production->PerformanceId }}">{{ $production->PerformanceDescription }}</a>
                        </h3>
                        <h5 class="lead">
                          {{ Carbon\Carbon::parse($production->PerformanceDate)->format('l j F Y')  }}
                        </h5>
                        @if($production->PerformanceDescription === 'The Human Touch')
                          <p>This includes general admission</p>
                        @endif

                        @if($production->PerformanceStatusDescription == 'Cancelled')
                          <p class="text-danger text-uppercase">{{ $production->PerformanceStatusDescription }}</p>
                        @endif
                        @php
                        $tmp = \App\TessituraApi::getPerfPrices($production->PerformanceId);
                      @endphp
                      @isset($tmp[0]->Price)
                        @if($tmp[0]->Price > 0 )
                          <p class="text-info">
                            @fa('pound-sign') @fa('ticket-alt')<br/>
                            From £{{ $tmp[0]->Price }}
                          </p>
                        @else
                          <p  class="text-info">FREE ENTRY/ Suggested Donation</p>
                        @endif
                      @endisset

                      {{-- <p>
                      <span class="lead">{{ $production->Season->Description }}</span>
                      {{-- <br/>
                      {{ $production->ZoneMapDescription }} --}}
                      {{-- </p> --}}
                      {{-- <p>
                      {!! ucfirst(nl2br($production->SalesNotes)) !!}
                    </p> --}}
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
    </div>
  </div>
@endsection
