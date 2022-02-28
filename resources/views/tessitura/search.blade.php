@extends('layouts.layout')
@section('title','Our events')
@section('description', 'A search for talks,exhibitions and events from the Fitzwilliam Museum')
@section('keywords','events,fitzwilliam')
@section('hero_image', env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('content')
    <div class="container">
        <h3 class="text-center mb-3">Events meeting your search</h3>
        @php
            usort($productions, function($a, $b) {
              return strtotime($a->PerformanceDate) - strtotime($b->PerformanceDate);
            })
        @endphp
        <div class="row">
            <div class="col-md-3 shadow-sm  mx-auto mb-3 ">
                <div class="card-body">
                    <h3>Filter events</h3>
                    @include('includes.elements.filters-tessitura')
                </div>
            </div>
            <div class="col-md-9">
                @if(!empty($productions))
                    <div class="row">
                        @foreach($productions as $production)
                            <x-tessitura-production-card :production="$production"></x-tessitura-production-card>
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
