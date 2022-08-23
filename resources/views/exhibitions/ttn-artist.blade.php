@extends('layouts.highlights')
@section('title', $artist['display_name'])
@section('description', 'A page listing image cases for ' . $artist['display_name'])
@section('content')
    <x-ttn-artist-detail :artist="$artist"></x-ttn-artist-detail>
@endsection

@if(!empty($works))
    @section('mlt')
        <div class="container">
            <h3>Associated paintings in this exhibition</h3>
            <div class="row">
                @foreach($works as $label)
                    <x-ttn-labels :labels="$label"></x-ttn-labels>
                @endforeach
            </div>
        </div>
    @endsection
@endif

@if(!empty($records))
    @section('artistsSimilar')
        <div class="container-fluid bg-pastel my-2">
            <div class="container">
                <h3>Other artists that may interest you</h3>
                <div class="row">
                    @foreach($records as $record)
                        <x-solr-card :result="$record"></x-solr-card>
                    @endforeach
                </div>
            </div>
        </div>
    @endSection
@endif

