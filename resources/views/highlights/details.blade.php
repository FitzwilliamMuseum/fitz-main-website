@extends('layouts.highlights')
@foreach($pharos['data'] as $record)
    @section('keywords', $record['meta_keywords'])
@section('description', $record['meta_description'])
@section('title', $record['title'])
@section('hero_image', $record['image']['data']['url'])
@section('hero_image_title', $record['image_alt_text'])
@section('content')
    <div class="text-center">
        <figure class="figure">
            <img src="{{ $record['image']['data']['url']}}"
                 alt="{{ $record['image_alt_text'] }}" class="img-fluid"
                 loading="lazy"
                 height="{{ $record['image']['height'] }}"
                 width="{{ $record['image']['width'] }}"
            />
            <figcaption class="figure-caption text-info text-right">{{$record['image_alt_text']}}</figcaption>
        </figure>
    </div>
    <div class="p-3 mx-auto mb-3 shadow-sm">
        @markdown($record['description'])
    </div>

    <h3>Themes and periods</h3>
    <div class="col-12 shadow-sm p-3 mx-auto mb-3">

        @if(isset($record['period_assigned']))
            <a href="{{ route('period', [Str::slug($record['period_assigned'],'-')]) }}"
               class="btn btn-dark mr-2 mt-2">{{$record['period_assigned']}}</a>
        @endif
        @if(isset($record['themes']))
            @foreach($record['themes'] as $th)
                <a href="{{route('theme', [$th]) }}" class="btn btn-dark mr-2 mt-2">{{str_replace('-',' ',$th)}}</a>
            @endforeach
        @endif
    </div>
@endsection

@if(!is_null($record['map']))
@section('map')
    @map(
    [
    'lat' => $record['map']['lat'],
    'lng' => $record['map']['lng'],
    'zoom' => 6,
    'markers' => [
    ['title' => 'Place of origin',
    'lat' => $record['map']['lat'],
    'lng' => $record['map']['lng'],
    'popup' => 'Place of origin',],
    ],
    ]
    )
@endsection
@endif

@section('youtube')
    @if(!empty($record['youtube_id']))
        <div class="container">
            <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
                <div class="ratio ratio-16x9">
                    <iframe title="A video from YouTube related to {{ $record['title'] }}"
                            src="https://www.youtube.com/embed/{{$record['youtube_id']}}"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('sketchfab-collection')
    @if(!empty($record['sketchfab_id']))
        <div class="container">
            <h2>3D scan</h2>
            <div class="col-12 shadow-sm p-3 mx-auto mb-3">
                <div class="ratio ratio-4x3">
                    <iframe title="A 3D model of {{ $record['title'] }}"
                            src="https://sketchfab.com/models/{{ $record['sketchfab_id']}}/embed?"
                            allow="autoplay; fullscreen; vr" mozallowfullscreen="true"
                            webkitallowfullscreen="true"></iframe>
                </div>
            </div>
        </div>
    @endif
@endsection


@if(!empty($record['audio_guide']))
@section('audio-guide')
    @include('includes.elements.audio-guide')
@endsection
@endif

@if(!empty($record['associated_pharos_content']))
@section('pharos-pages')
    <div class="container">
        <h3>Stories, Contexts and Themes</h3>
        <div class="row">
            @foreach($record['associated_pharos_content'] as $pharosassoc)
                <x-image-card
                    :image="$pharosassoc['pharos_pages_id']['hero_image']"
                    :altTag="$pharosassoc['pharos_pages_id']['hero_image_alt_text']"
                    :route="'context-section-detail'"
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
        <h3>Other highlight objects you might like</h3>
        <div class="row">
            @foreach($records as $record)
                <x-solr-card :result="$record"></x-solr-card>
            @endforeach
        </div>
    </div>
@endsection
@endif

@endforeach

@section('adlib')
    @if(!empty($adlib))
        @foreach($adlib as $record)
            <h3 class="visually-hidden">Data from our collections database</h3>
            @include('includes/elements/expander')
            <div id="expand-more" class="collapse">
                <div class="col-12 shadow-sm p-3 mx-auto mb-3">
                    @include('includes/elements/descriptive')
                    @include('includes/elements/legal')
                    @include('includes/elements/lifecycle')
                    @include('includes/elements/agents-subjects')
                    @include('includes/elements/medium')
                    @include('includes/elements/materials')
                    @include('includes/elements/identification')

                </div>
            </div>
        @endforeach
    @else
        @foreach($pharos['data'] as $record)

            <div class="col-12 shadow-sm p-3 mx-auto mb-3">
                <h3>Further information</h3>
                <ul>
                    <li>Collections ID: {{$record['adlib_id']}}</li>
                    @if(!is_null($record['place_of_origin']))
                        <li>Place of origin: {{ $record['place_of_origin'] }}</li>
                    @endif
                    @if(!is_null($record['date']))
                        <li>Date: {{ $record['date'] }}</li>
                    @endif
                    @if(!is_null($record['maker'] ))
                        <li>Maker: {{ $record['maker'] }}</li>
                    @endif
                    @if(!is_null($record['material'] ))
                        <li>Material: {{ $record['material'] }}</li>
                    @endif
                    @if(!is_null($record['map']))
                        <li>Map coordinates: {{ $record['map']['lat'] }}, {{$record['map']['lng']}}</li>
                    @endif
                </ul>

            </div>
        @endforeach

    @endif
@endsection

@if(!empty($shopify))
@section('shopify')
    <div class="container py-3">
        <h3>Suggested Curating Cambridge products</h3>
        <div class="row">
            @foreach($shopify as $record)
                <x-shopify-card :result="$record"></x-shopify-card>
            @endforeach
        </div>
    </div>
@endsection
@endif
