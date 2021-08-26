@extends('layouts.layout')
@section('title','Our events')
@section('hero_image', env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('content')
  <div class="container">

    <h2 class="text-center mb-3 lead">What would you like to attend?</h2>
    @php
    $types = Arr::pluck($productions, 'FacilityDescription');
    $ids = Arr::pluck($productions, 'Facility');
    $tags = array_count_values($types);
    usort($productions, function($a, $b) {
      return strtotime($a->PerformanceDate) - strtotime($b->PerformanceDate);
    });
    @endphp

    <div class="row">
      <div class="card col-md-3 shadow-sm  mx-auto mb-3 ">
        <div class="card-body">
          <h4 class="lead">Filter events</h4>
          @include('includes.elements.filters-tessitura')
        </div>
      </div>

        <div class="col-md-9">
          <div class="row">
            @foreach ($events['data'] as $type)
              <div class="col-md-4 mb-3">
                <div class="card h-100">
                  <a class="stretched-link" href="{{ route('events.type', Str::slug($type['title'])) }}"><img class="card-img-top" src="{{ $type['hero_image']['data']['thumbnails'][4]['url'] }}"
                    alt="{{ $type['title'] }}"/></a>
                    <div class="card-body ">
                      <div class="contents-label mb-3">
                        <h3 class="lead">
                          <a class="stretched-link" href="{{ route('events.type', Str::slug($type['title'])) }}" title="Events listing for {{ $type['title'] }}">{{  $type['title'] }}</a>
                        </h3>
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
