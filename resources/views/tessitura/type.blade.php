@extends('layouts.layout')
@php
$title = str_replace("-", " ", $slug);
$title = str_replace(array('bookings','FFF', 'fff', 'grove lodge garden'),array('Events','Fitz Family First','Fitz Family First', 'ADC outdoor theatre'), $title );
$title = ucwords($title);
@endphp
@section('title', $title)
@section('hero_image', env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('collections')
@section('description','Events from the Fitzwilliam: ' . $title)

<div class="container">
<h2 class="text-center mb-3 lead">Events in the next 60 days</h2>

@php
usort($productions, function($a, $b) {
  return strtotime($a->PerformanceDate) - strtotime($b->PerformanceDate);
});
@endphp
<div class="row">
  <div class="col-md-3 shadow-sm mx-auto mb-3" >
    <div class="card-body">
      <h4 class="lead">Filter events</h4>
      @include('includes.elements.filters-tessitura')
    </div>
  </div>
  <div class="col-md-9">
    @if(!empty($productions))
    <div class="row">
      @foreach($productions as $production)
        {{-- @dump($production) --}}
        <div class="col-md-4 mb-3 event-wrapper" typeof="Event" vocab="https://schema.org/">
          <div class="card h-100">
            @if($production->Facility->Id === 21)
              <a class="stretched-link" href="https://tickets.museums.cam.ac.uk/{{ $production->ProductionSeason->Id }}/{{ $production->PerformanceId }}">
                <img class="card-img-top" property="image" src="@tessitura($production->ProductionSeason->Id)"
                alt="A stand in image for {{ $production->PerformanceStatusDescription }}"/>
              </a>
            @elseif($production->Facility->Id === 56)
              <a class="stretched-link" href="https://tickets.museums.cam.ac.uk/{{ $production->ProductionSeason->Id }}/{{ $production->PerformanceId }}">
                <img property="image" class="card-img-top" src="@tessitura($production->PerformanceId )"
                alt="A stand in image for {{ $production->PerformanceStatusDescription }}"/>
              </a>
            @else
              <a class="stretched-link" href="https://tickets.museums.cam.ac.uk/{{ $production->ProductionSeason->Id }}/{{ $production->PerformanceId }}">
                <img  class="card-img-top" property="image" src="@tessitura($production->ProductionSeason->Id)"
                alt="A stand in image for {{ $production->PerformanceStatusDescription }}"/>
              </a>
            @endif
            <div class="card-body">
              <div class="contents-label mb-3">
                <h3 class="lead">
                  <a class="stretched-link" property="url" href="https://tickets.museums.cam.ac.uk/{{ $production->ProductionSeason->Id }}/{{ $production->PerformanceId }}">
                    <span class="event-title" property="name">{{ $production->PerformanceDescription }}</span>
                  </a>
                </h3>
                <h5 class="lead" property="startDate" content="{{ Carbon\Carbon::parse($production->PerformanceDate)->format('l j F Y')  }}">
                  {{ Carbon\Carbon::parse($production->PerformanceDate)->format('l j F Y')  }} <span property="endDate" content="{{ Carbon\Carbon::parse($production->PerformanceDate)->format('l j F Y')  }}"></span>
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
                    <p class="text-info event-price">
                      @fa('pound-sign') @fa('ticket-alt') From <meta property="priceCurrency" content="GBP" />£<meta property="price" content="{{ $tmp[0]->Price }}" />{{ $tmp[0]->Price }}
                    </p>
                  @else
                    <p  class="text-info">FREE ENTRY/ Suggested Donation</p>
                  @endif
                  @if($production->Facility->Id != 19)
                    <span class="sr-only">Location: <span class="event-venue" property="location" typeof="Place">
                      <span property="name">The Fitzwilliam Museum</span>
                      <span property="address">Trumpington Street, Cambridge CB2 1RB </span>
                    </span>
                  @endif
                  @if($production->Facility->Id != 19)
                    <span property="eventAttendanceMode" content="OfflineEventAttendanceMode"></span>
                  @else
                    <span property="eventAttendanceMode" content="OnlineEventAttendanceMode"></span>
                  @endif
                   <span property="organizer" typeof="organization">
                     <meta property="name" content="The Fitzwilliam Museum">
                     <meta property="url" content="{{ env('APP_URL') }}">
                   </span>
                @endisset
              @isset($production->Duration)
                <p>
                  Duration: <meta property="duration" content="PT{{ $production->Duration }}M00S">{{ $production->Duration }} minutes
                </p>
              @endisset
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

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
@endsection
