@extends('layouts.layout')
@section('title','Our events')
@section('hero_image', env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('content')
@section('description', 'The Fitzwilliam Museum runs a rich programme of events')
@section('keywords','events,fitzwilliam')

<div class="alert alert-info mb-3 text-center">
  For assistance with booking and ticketing enquiries, please contact us.<br />
  @fa('envelope'): <a href="mailto:tickets@museums.cam.ac.uk">tickets@museums.cam.ac.uk</a> @fa('phone'): +44 (0)1223 333 230
  <br />
  Available 10:00 - 17:00 Tuesday to Saturday, 12:00 - 17:00 Sunday, closed Monday.

</div>
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
              <x-image-card :altTag="$type['title']" :title="$type['title']"  :image="$type['hero_image']" :route="'events.type'" :params="[Str::slug($type['title'])]" />
              @endforeach
            </div>
          </div>

      </div>
    </div>
  @endsection
