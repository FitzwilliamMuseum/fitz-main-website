@extends('layouts.layout')
@php
    $title = str_replace("-", " ", $slug);
    $title = str_replace(array('bookings','FFF', 'fff', 'grove lodge garden'),array('Events','Fitz Family First','Fitz Family First', 'ADC outdoor theatre'), $title );
    $title = ucwords($title)
@endphp
@section('title', $title)
@section('hero_image', env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('description','Events from the Fitzwilliam: ' . $title)

@section('collections')

    <div class="container">
        <h3 class="text-center mb-2">Events in the next 120 days</h3>
        @php
            usort($productions, function($a, $b) {
              return strtotime($a->PerformanceDate) - strtotime($b->PerformanceDate);
            })
        @endphp
        <div class="row">
            <div class="col-md-3 shadow-sm mx-auto mb-3">
                <div class="card-body">
                    <h3>Filter events</h3>
                    @include('includes.elements.filters-tessitura')
                </div>
            </div>
            <div class="col-md-9">
                @if(!empty($productions))
                    <div class="row">
                        @foreach($productions as $production)
                            <x-tessitura-production-details-card :production="$production"></x-tessitura-production-details-card>
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
