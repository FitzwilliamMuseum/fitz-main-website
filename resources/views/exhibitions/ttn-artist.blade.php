@extends('layouts.highlights')
@section('title', $artists[0]['display_name'])

@section('content')
    <x-ttn-artist-detail :artist="$artists"/>
@endsection

@if(!empty($works))
@section('mlt')
    <div class="container">
        <h3>Associated paintings in this exhibition</h3>
        <div class="row">
            @foreach($works as $label)
                <x-ttn-labels :labels="$label"/>
            @endforeach
        </div>
    </div>
@endsection
@endif
