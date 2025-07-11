@extends('layouts.highlights')
@section('content')
    <x-ttn-label :label="$labels"></x-ttn-label>
@endsection
@if(!empty($records))
    @section('mlt')
        <div class="container">
            <h2>Other paintings that may interest you</h2>
            <div class="row">
                @foreach($records as $record)
                    <x-solr-card :result="$record"></x-solr-card>
                @endforeach
            </div>
        </div>
    @endsection
@endif
