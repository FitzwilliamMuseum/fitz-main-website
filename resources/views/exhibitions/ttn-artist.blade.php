@extends('layouts.highlights')
@section('title', $artists[0]['display_name'])

@section('content')
    <x-ttn-artist-detail :artist="$artists"/>
@endsection

@if(!empty($records))
@section('mlt')
    <div class="container">
        <h3>Other highlight objects in our collection you might like</h3>
        <div class="row">
            @foreach($records as $record)
                <x-solr-card :result="$record"/>
            @endforeach
        </div>
    </div>
@endsection
@endif
