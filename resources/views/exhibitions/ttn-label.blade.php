@extends('layouts.highlights')
@section('content')
    <x-ttn-label :label="$label[0]"></x-ttn-label>
@endsection
@if(!empty($records))
@section('mlt')
    <div class="container">
        <h3>Other paintings that may interest you</h3>
        <div class="row">
            @foreach($records as $record)
                <x-solr-card :result="$record"></x-solr-card>
            @endforeach
        </div>
    </div>
@endsection
@endif


