@extends('layouts.layout')
@section('keywords', $collection['meta_keywords'])
@section('description', $collection['meta_description'])
@section('title', $collection['collection_name'])
@section('hero_image', $collection['hero_image']['data']['url'])
@section('hero_image_title', $collection['hero_image_alt_text'])

@section('content')
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 ">
    {!! $collection['collection_description'] !!}
</div>
@endsection

@section('collections')
@isset($collection['object_id_numbers'])
@inject('collectionsController', 'App\Http\Controllers\collectionsController')
@php
$records = $collectionsController::getObjects($collection['object_id_numbers']);
@endphp
@if(!empty($records))
<div class="container">
    <h3>
        Selected Related Objects
    </h3>
    <div class="row">
        @foreach($records as $record)
        @php
        $pris = Arr::pluck($record['_source']['identifier'],'priref');
        $pris = array_filter($pris);
        $pris= Arr::flatten($pris);
        @endphp

        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="results_image">
                    @if(array_key_exists('multimedia', $record['_source']))
                    <a href="{{ env('COLLECTION_URL') }}/id/object/{{ $pris[0] }}"><img class="results_image__thumbnail"
                            src="{{ env('COLLECTION_URL') }}/imagestore/{{ $record['_source']['multimedia'][0]['processed']['preview']['location'] }}"
                            loading="lazy" alt="An image of {{ ucfirst($record['_source']['summary_title']) }}" /></a>
                    @else
                    <a href="{{ env('COLLECTION_URL') }}/id/object/{{ $pris[0] }}"><img class="results_image__thumbnail"
                            src="https://content.fitz.ms/fitz-website/assets/no-image-available.png?key=directus-medium-crop"
                            alt="A stand in image for {{ ucfirst($record['_source']['summary_title']) }}}" /></a>
                    @endif
                </div>
                <div class="card-body ">
                    <div class="contents-label mb-3">
                        <h3>
                            @if(array_key_exists('title',$record['_source'] ))
                            <a href="{{ env('COLLECTION_URL') }}/id/object/{{ $pris[0] }}">{{
                                ucfirst($record['_source']['title'][0]['value']) }}</a>
                            @else
                            <a href="{{ env('COLLECTION_URL') }}/id/object/{{ $pris[0] }}">{{
                                ucfirst($record['_source']['summary_title']) }}</a>
                            @endif
                        </h3>
                        <p class="text-info">{{ $record['_source']['identifier'][0]['accession_number'] }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
@endisset
@endsection


@if(!empty($collection['associated_galleries']))
@section('galleries')
<div class="container">
    <h3>
        Associated Galleries
    </h3>
    <div class="row">
        @foreach($collection['associated_galleries'] as $gallery)
        <x-image-card :altTag="$gallery['galleries_id']['hero_image_alt_text']"
            :title="$gallery['galleries_id']['gallery_name']" :image="$gallery['galleries_id']['hero_image']"
            :route="'gallery'" :params="[$gallery['galleries_id']['slug']]"></x-image-card>
        @endforeach
    </div>
</div>
@endsection
@endif


@if(!empty($collection['curators']))
@section('curators')
<div class="container">
    <h3>Associated staff</h3>
    <div class="row">
        @foreach($collection['curators'] as $curator)
        <x-image-card :altTag="$curator['staff_profiles_id']['profile_image_alt_text']"
            :title="$curator['staff_profiles_id']['display_name']"
            :image="$curator['staff_profiles_id']['profile_image']" :route="'research-profile'"
            :params="[$curator['staff_profiles_id']['slug']]"></x-image-card>
        @endforeach
    </div>
</div>
@endsection
@endif