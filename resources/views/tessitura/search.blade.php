@extends('layouts.layout')
@section('title','Our events')
@section('description', 'A search for talks,exhibitions and events from the Fitzwilliam Museum')
@section('keywords','events,fitzwilliam')
@section('hero_image', env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('content')
  <div class="container">
    <h2 class="text-center mb-3 lead">Events meeting your search</h2>
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
        @if(!empty($productions))
        <div class="row">
          @foreach($productions as $production)
            <div class="col-md-4 mb-3">
              <div class="card h-100">
                @if($production->Facility->Id === 21)
                  <a class="stretched-link" href="https://tickets.museums.cam.ac.uk/{{ $production->ProductionSeason->Id }}/{{ $production->PerformanceId }}"><img class="card-img-top" src="@tessitura($production->ProductionSeason->Id)"
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
                    @isset($production->Duration)
                      <p>Duration: {{ $production->Duration }} minutes</p>
                    @endisset
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <div class="shadow-sm p-3 mx-auto mb-3">
          <p>
            No events found in this category at the moment. Perhaps try extending
            your time range?
          </p>
        </div>
      @endif
      </div>
    </div>
  </div>
@endsection
