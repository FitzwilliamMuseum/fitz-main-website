@extends('layouts.highlights')
@section('keywords', $pharos['meta_keywords'])
@section('description', $pharos['meta_description'])
@section('title', $pharos['title'])
@section('hero_image', $pharos['image']['data']['url'])
@section('hero_image_title', $pharos['image_alt_text'])
@section('content')
<div class="text-center">
    <figure class="figure">
        <img src="{{ $pharos['image']['data']['url']}}" alt="" class="img-fluid"
            loading="lazy" height="{{ $pharos['image']['height'] }}" width="{{ $pharos['image']['width'] }}" />
        <figcaption class="figure-caption text-info text-right">{{$pharos['image_alt_text']}}</figcaption>
    </figure>
</div>
<div class="p-3 mx-auto mb-3 shadow-sm">
    @markdown($pharos['description'])
</div>

<h2>Themes and periods</h2>
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">

    @if(isset($pharos['period_assigned']))
    <a href="{{ route('period', [Str::slug($pharos['period_assigned'],'-')]) }}"
        class="btn btn-dark mr-2 mt-2">{{$pharos['period_assigned']}}</a>
    @endif
    @if(isset($pharos['themes']))
    @foreach($pharos['themes'] as $th)
    <a href="{{route('theme', [$th]) }}" class="btn btn-dark mr-2 mt-2">
        {{str_replace('-',' ',$th)}}
    </a>
    @endforeach
    @endif
</div>
@endsection

@if(!is_null($pharos['map']))
@section('map')
@map(
[
'lat' => $pharos['map']['lat'],
'lng' => $pharos['map']['lng'],
'zoom' => 6,
'markers' => [
['title' => 'Place of origin',
'lat' => $pharos['map']['lat'],
'lng' => $pharos['map']['lng'],
'popup' => 'Place of origin',],
],
]
)
@endsection
@endif

@section('youtube')
@if(!empty($pharos['youtube_id']))
<div class="container">
    <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 ">
        <div class="ratio ratio-16x9">
            <iframe title="A video from YouTube related to {{ $pharos['title'] }}"
                src="https://www.youtube.com/embed/{{$pharos['youtube_id']}}" allowfullscreen></iframe>
        </div>
    </div>
</div>
@endif
@endsection

@section('sketchfab-collection')
@if(!empty($pharos['sketchfab_id']))
<div class="container">
    <h2>3D scan</h2>
    <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">
        <div class="ratio ratio-4x3 mb-3">
            <iframe title="A 3D model of {{ $pharos['title'] }}"
                src="https://sketchfab.com/models/{{ $pharos['sketchfab_id']}}/embed?" allow="autoplay; fullscreen; vr"
                mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
        </div>
        <h3 class="mb-3">Accessibility Notice:</h3>
        <p>The 3D model on this page is hosted on Sketchfab and may not be fully accessible to everyone, including users of assistive technologies. We apologize for any inconvenience.</p>
    </div>
</div>
@endif
@endsection


@if(!empty($pharos['audio_guide']))
@section('audio-guide')
@include('includes.elements.audio-guide')
@endsection
@endif

@if(!empty($pharos['associated_pharos_content']))
@section('pharos-pages')
<div class="container">
    <h2>Stories, Contexts and Themes</h2>
    <div class="row">
        @foreach($pharos['associated_pharos_content'] as $pharosassoc)
        <x-image-card :image="$pharosassoc['pharos_pages_id']['hero_image']"
            :altTag="$pharosassoc['pharos_pages_id']['hero_image_alt_text']" :route="'context-section-detail'"
            :params="[$pharosassoc['pharos_pages_id']['section'],$pharosassoc['pharos_pages_id']['slug']]"
            :title="$pharosassoc['pharos_pages_id']['title']"></x-image-card>
        @endforeach
    </div>
</div>
@endsection
@endif

@if(!empty($records))
@section('mlt')
<div class="container">
    <h2>Other highlight objects you might like</h2>
    <div class="row">
        @foreach($records as $record)
        <x-solr-card :result="$record"></x-solr-card>
        @endforeach
    </div>
</div>
@endsection
@endif

@section('adlib')
@if(!empty($adlib))
@foreach($adlib as $record)
<h2 class="visually-hidden">Data from our collections database</h2>
@include('includes.elements.expander')
<div id="expand-more" class="collapse">
    <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">
        @include('includes.elements.descriptive')
        @include('includes.elements.legal')
        @include('includes.elements.lifecycle')
        @include('includes.elements.agents-subjects')
        @include('includes.elements.medium')
        @include('includes.elements.materials')
        @include('includes.elements.identification')

    </div>
</div>
@endforeach
@else

<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">
    <h2>Further information</h2>
    <ul>
        <li>Collections ID: {{$pharos['adlib_id']}}</li>
        @if(!is_null($pharos['place_of_origin']))
        <li>Place of origin: {{ $pharos['place_of_origin'] }}</li>
        @endif
        @if(!is_null($pharos['date']))
        <li>Date: {{ $pharos['date'] }}</li>
        @endif
        @if(!is_null($pharos['maker'] ))
        <li>Maker: {{ $pharos['maker'] }}</li>
        @endif
        @if(!is_null($pharos['material'] ))
        <li>Material: {{ $pharos['material'] }}</li>
        @endif
        @if(!is_null($pharos['map']))
        <li>Map coordinates: {{ $pharos['map']['lat'] }}, {{$pharos['map']['lng']}}</li>
        @endif
    </ul>

</div>

@endif
@endsection

@if(!empty($shopify))
@section('shopify')
<div class="container py-3">
    <h2>Suggested Curating Cambridge products</h2>
    <div class="row">
        @foreach($shopify as $record)
        <x-shopify-card :result="$record"></x-shopify-card>
        @endforeach
    </div>
</div>
@endsection
@endif
