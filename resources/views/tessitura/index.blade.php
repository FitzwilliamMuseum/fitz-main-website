@extends('layouts.layout')
@section('title','Our events')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('content')
<div class="container">

<h2>What would you like to attend?</h2>
    @php
    $types = Arr::pluck($productions, 'FacilityDescription');
    $ids = Arr::pluck($productions, 'Facility');
    $tags = array_count_values($types);
    usort($productions, function($a, $b) {
      return strtotime($a->PerformanceDate) - strtotime($b->PerformanceDate);
    });
    @endphp

    <div class="row">
      @foreach ($tags as $key => $value)
        @php
        $filter = $key;
        $new_array = array_filter($ids, function($var) use ($filter){
          return ($var->Description == $filter);
        });
        $id = array_slice($new_array,0,1);
        @endphp

        <div class="col-md-3 mb-3">
          <div class="card h-100">

          <a class="stretched-link" href="/events/{{ Str::slug($key) }}"><img class="card-img-top" src="https://content.fitz.ms/fitz-website/assets/img_20190105_153947.jpg?key=directus-medium-crop"
              alt="A stand in image for "/></a>
            <div class="card-body ">
              <div class="contents-label mb-3">
                <h3 class="lead">
                  <a class="stretched-link" href="{{ route('events.type', Str::slug($key)) }}" title="Events listing for {{ $key }}">{{ $key }}</a>
                </h3>
                <p class="text-info">{{ $value }} events</p>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
</div>
@endsection
