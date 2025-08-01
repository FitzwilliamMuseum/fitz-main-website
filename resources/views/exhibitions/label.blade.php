@extends('layouts.highlights')
@section('keywords', 'labels,cases')
@section('description', $label['hero_image_alt_title'])
@section('title', $label['title'])
@section('hero_image', $label['hero_image']['data']['url'])
@section('hero_image_title', $label['hero_image_alt_title'])

@section('content')
<div class="container-fluid py-3">
    <div class="container">
        <div class="text-center py-3 bg-white">
            <img src="{{ $label['hero_image']['data']['url'] }}" class="img-fluid"
                alt="{{$label['hero_image_alt_title']}}" />
        </div>
        <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 article">
            @markdown($label['description'])
            <a class="btn btn-info d-block"
                href="{{ route('exhibition.labels', [ $label['object_labels'][0]['mo_labels_id']['related_exhibition'][0]['exhibitions_id']['slug'],$label['object_labels'][0]['mo_labels_id']['slug']]) }}">
                Other objects in {{ $label['object_labels'][0]['mo_labels_id']['title'] }}
            </a>
        </div>
    </div>
</div>
@endsection

@if(!empty($records))
@section('mlt')
<div class="container">
    <h2>Other highlight objects in our collection you might like</h2>
    <div class="row">
        @foreach($records as $record)
        <x-solr-card :result="$record"></x-solr-card>
        @endforeach
    </div>
</div>
@endsection
@endif
