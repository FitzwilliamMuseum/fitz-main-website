@extends('layouts.highlights')
@section('content')
    <x-viewpoint :viewpoint="$viewpoint[0]"/>
@endsection


@if(!empty($records))
@section('mlt')
    <div class="container">
        <h3>Paintings that may interest you based on this viewpoint</h3>
        <div class="row">
            @foreach($records as $record)
                <x-solr-card :result="$record"/>
            @endforeach
        </div>
    </div>
@endsection
@endif
