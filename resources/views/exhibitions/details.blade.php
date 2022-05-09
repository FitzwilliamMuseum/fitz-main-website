@extends('layouts.exhibitions')

@foreach($exhibitions['data'] as $coll)
    @section('keywords', $coll['meta_keywords'])
@section('description', $coll['meta_description'])
@section('title', $coll['exhibition_title'])
@section('hero_image', $coll['hero_image']['data']['url'])
@section('hero_image_title', $coll['hero_image_alt_text'])
@php
    $type = match($coll['type']){ 'display'=>'Temporary Display', default => 'Exhibition'}
@endphp
@if($coll['slug'] === 'true-to-nature-open-air-painting-in-europe-1780-1870')
    @if (\Carbon\Carbon::now()->diffInHours('2022-04-28 00:00:01', false) <= 0)
        @include('includes.structure.true')
    @endif
@endif

@section('content')
    @isset($coll['tessitura_string'])
        @if(!Carbon\Carbon::parse($coll['exhibition_end_date'])->isPast() && !Carbon\Carbon::parse($coll['exhibition_end_date'])->isPast())
            @include('includes.structure.tessitura')
        @endif
    @endisset
    @isset($coll['exhibition_end_date'])
        @if(Carbon\Carbon::parse($coll['exhibition_end_date'])->isPast())
            @include('includes.structure.expired')
        @endif
    @endisset
    @if($coll['tessitura_string'] === NULL)
        @if(!Carbon\Carbon::parse($coll['exhibition_end_date'])->isPast() && !Carbon\Carbon::parse($coll['exhibition_end_date'])->isPast() && $coll['exhibition_status'] === 'current')
            @include('includes.structure.general')
        @endif
    @endisset

    <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
        @markdown($coll['exhibition_narrative'])
        @if(isset($coll['exhibition_abstract']))
            @markdown($coll['exhibition_abstract'])
        @endif
    </div>

    @if( isset($coll['exhibition_url']) || isset($coll['exhibition_start_date']))
        <h3>{{$type}} details</h3>
        <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
            <ul>
                @if(isset($coll['exhibition_url']))
                    <li>
                        <a href="{{ $coll['exhibition_url']  }}">{{$type}} website</a>
                    </li>
                @endif
                @if(isset($coll['exhibition_start_date']))
                    <li>
                        {{$type}} run: {{  Carbon\Carbon::parse($coll['exhibition_start_date'])->format('l dS F Y') }}
                        to
                        {{  Carbon\Carbon::parse($coll['exhibition_end_date'])->format('l dS F Y') }}
                    </li>
                @endif
            </ul>
        </div>
    @endif

    @if(!empty($cases['data']))
    @section('exhibitionCaseCards')
    <div class="container-fluid bg-pastel py-3">
        <div class="container">
            <h3 class="lead text-white">
                <a href="">
                    Exhibition Case Introductions
                </a>
            </h3>
            <div class="row">
                @foreach($cases['data'] as $case)
                    <x-image-card
                        :altTag="$case['title']"
                        :title="$case['title']"
                        :image="$case['cover_image']"
                        :route="'exhibition.labels'"
                        :params="['exhibition' => $case['related_exhibition'][0]['exhibitions_id']['slug'],'slug' => $case['slug']]"></x-image-card>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
    @endif

@if(!empty($podcasts))
@section('exhibitionAudio')
    <div class="container-fluid bg-gdbo py-2 mb-2">
        <div class="container">
            <h3>Audio</h3>
            <div class="row">
                @foreach($podcasts['data'] as $podcast)
                    <x-image-card :altTag="$podcast['hero_image_alt_tag']" :title="$podcast['title']"
                                  :image="$podcast['hero_image']" :route="'podcasts.episode'"
                                  :params="[$podcast['slug']]"></x-image-card>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@endif

@if(isset($coll['youtube_id']) && $coll['youtube_id']!= '' )
    <h3>
        {{ $type }} films
    </h3>
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
        <div class="ratio ratio-16x9">
            <iframe title="A film related to {{ $coll['exhibition_title'] }}"
                    loading="lazy"
                    src="https://www.youtube.com/embed/{{$coll['youtube_id']}}"
                    allowfullscreen></iframe>
        </div>
    </div>
@endif

@if(isset($coll['youtube_secondary_id']) && $coll['youtube_secondary_id']!= '' )
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
        <div class="ratio ratio-16x9">
            <iframe title="A film related to {{ $coll['exhibition_title'] }}"
                    loading="lazy"
                    src="https://www.youtube.com/embed/{{$coll['youtube_secondary_id']}}" frameborder="0"
                    allowfullscreen></iframe>
        </div>
    </div>
@endif

@if(isset($coll['youtube_playlist_id']))
    <h3>
        {{ $type }} films - a playlist
    </h3>
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
        <div class="ratio ratio-16x9">
            <iframe title="A YouTube video playlist from the Fitzwilliam Museum"
                    src="https://www.youtube.com/embed/videoseries?list={{$coll['youtube_playlist_id']}}"
                    allowfullscreen></iframe>
        </div>
    </div>
@endif


@isset($adlib)
    <h3>Selected objects from the {{$type}}</h3>
    <div class="row">
        @foreach($adlib as $record)
            @php
                $pris = Arr::pluck($record['_source']['identifier'],'priref');
                $pris = array_filter($pris);
                $pris= Arr::flatten($pris)
            @endphp
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="results_image">
                        @if(array_key_exists('multimedia', $record['_source']))
                            <a href="{{ env('COLLECTION_URL')}}/id/object/{{ $pris[0] }}"><img
                                    class="results_image__thumbnail"
                                    src="{{ env('COLLECTION_URL')}}/imagestore/{{ $record['_source']['multimedia'][0]['processed']['preview']['location'] }}"
                                    loading="lazy" alt="An image of {{ ucfirst($record['_source']['summary_title']) }}"
                                /></a>
                        @else
                            <a href="{{ env('COLLECTION_URL')}}/id/object/{{ $pris[0] }}"><img
                                    class="results_image__thumbnail"
                                    src="https://content.fitz.ms/fitz-website/assets/no-image-available.png?key=directus-medium-crop"
                                    alt="A stand in image for {{ ucfirst($record['_source']['summary_title']) }}}"/></a>
                        @endif
                    </div>
                    <div class="card-body ">

                        <div class="contents-label mb-3">
                            <h3>
                                <a href="{{ env('COLLECTION_URL')}}/id/object/{{ $pris[0] }}"
                                   class="stretched-link">{{ ucfirst($record['_source']['summary_title']) }}</a>
                            </h3>
                            <p>
                                @if(array_key_exists('department', $record['_source']))
                                    {{ $record['_source']['identifier'][0]['accession_number'] }}<br/>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endisset

@endsection

@if(!empty($coll['associated_curators']) || !empty($coll['external_curators']))
@section('curators')
    <div class="container-fluid bg-grey py-3">
        <div class="container">
            <h3>Curators and experts behind this exhibition</h3>
            <div class="row">
                @foreach($coll['associated_curators'] as $curator)
                    <x-image-card
                        :altTag="$curator['staff_profiles_id']['display_name']"
                        :title="$curator['staff_profiles_id']['display_name']"
                        :image="$curator['staff_profiles_id']['profile_image']"
                        :route="'research-profile'"
                        :params="[$curator['staff_profiles_id']['slug']]"
                    />
                @endforeach
                @foreach($coll['external_curators'] as $curator)
                        <x-associated-curator
                            :curator="$curator"
                        />
                @endforeach
            </div>
        </div>
    </div>
@endsection
@endif

@if(!empty($coll['exhibition_partners'] ))
@section('research-funders')
    <div class="container-fluid py-3">
        <div class="container">
            <h3>Funders and partners</h3>
            <div class="row">
                @foreach($coll['exhibition_partners'] as $partner)
                    <x-partner-card
                        :altTag="$partner['partner']['partner_full_name']"
                        :title="$partner['partner']['partner_full_name']"
                        :image="$partner['partner']['partner_logo']"
                        :url="$partner['partner']['partner_url']"></x-partner-card>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@endif


@if(!empty($coll['associated_departments']))
@section('departments')
    <div class="container">
        <h3>Associated departments</h3>
        <div class="row">
            @foreach($coll['associated_departments'] as $department)
                <x-image-card
                    :altTag="$department['departments_id']['hero_image_alt_text']"
                    :title="$department['departments_id']['title']"
                    :image="$department['departments_id']['hero_image']"
                    :route="'department'"
                    :params="[$department['departments_id']['slug']]"></x-image-card>
            @endforeach
        </div>
    </div>
@endsection
@endif


@if(!empty($coll['exhibition_carousel']))
@section('excarousel')
    <div class="container-fluid bg-white py-2">
        <div class="container">
            <div class="bd-example mb-3">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-interval="10000">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class=""></li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" class=""></li>
                        @if(array_key_exists('image_four_alt_text',$coll['exhibition_carousel'][0]['carousels_id']))
                            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" class=""></li>
                        @endif
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100"
                                 alt="{{ $coll['exhibition_carousel'][0]['carousels_id']['image_one_alt_text'] }}"
                                 src="{{ $coll['exhibition_carousel'][0]['carousels_id']['image_one']['data']['thumbnails'][4]['url'] }}">
                            <div class="carousel-caption d-none d-md-block text-dark exhibition-carousel">
                                <p>{{ $coll['exhibition_carousel'][0]['carousels_id']['image_one_alt_text'] }}</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100"
                                 alt="{{ $coll['exhibition_carousel'][0]['carousels_id']['image_two_alt_text'] }}"
                                 src="{{ $coll['exhibition_carousel'][0]['carousels_id']['image_two']['data']['thumbnails'][4]['url'] }}">
                            <div class="carousel-caption d-none d-md-block text-dark exhibition-carousel">
                                <p>{{ $coll['exhibition_carousel'][0]['carousels_id']['image_two_alt_text'] }}</p>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <img class="d-block w-100"
                                 alt="{{ $coll['exhibition_carousel'][0]['carousels_id']['image_three_alt_text'] }}"
                                 src="{{ $coll['exhibition_carousel'][0]['carousels_id']['image_three']['data']['thumbnails'][4]['url'] }}">
                            <div class="carousel-caption  d-none d-md-block text-dark exhibition-carousel">
                                <p>{{ $coll['exhibition_carousel'][0]['carousels_id']['image_three_alt_text'] }}</p>
                            </div>
                        </div>
                        @if(array_key_exists('image_four_alt_text',$coll['exhibition_carousel'][0]['carousels_id']))
                            <div class="carousel-item ">
                                <img class="d-block w-100"
                                     alt="{{ $coll['exhibition_carousel'][0]['carousels_id']['image_four_alt_text'] }}"
                                     src="{{ $coll['exhibition_carousel'][0]['carousels_id']['image_four']['data']['thumbnails'][4]['url'] }}">
                                <div class="carousel-caption d-none d-md-block text-dark exhibition-carousel">
                                    <p>{{ $coll['exhibition_carousel'][0]['carousels_id']['image_four_alt_text'] }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@endif

@if(!empty($coll['associated_galleries']))
@section('galleries')
    <div class="container-fluid bg-dark text-white py-2 mb-2">
        <div class="container">
            <h3>Associated Galleries</h3>
            <div class="row">
                @foreach($coll['associated_galleries'] as $gallery)
                    <x-image-card
                        :altTag="$gallery['galleries_id']['hero_image_alt_text']"
                        :title="$gallery['galleries_id']['gallery_name']"
                        :image="$gallery['galleries_id']['hero_image']"
                        :route="'gallery'"
                        :params="[$gallery['galleries_id']['slug']]"></x-image-card>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@endif

@section('360')
    @if(!empty($coll['image_360_pano']))
        <div class="container">
            <h3>360 gallery image</h3>
            <div class="col-12 shadow-sm p-3 mx-auto mb-3">
                <div id="panorama"></div>
            </div>
        </div>
@section('360_image', $coll['image_360_pano']['data']['full_url']))
@endif
@endsection
@endforeach

@if(!empty($records))
@section('mlt')
    <div class="container">
        <h3>Similar exhibitions from our archives</h3>
        <div class="row">
            @foreach($records as $record)
                <x-solr-card :result="$record"></x-solr-card>
            @endforeach
        </div>
    </div>
@endsection


@section('sketchfab')
    @if(!empty($coll['sketchfab_id']))
        <div class="container">
            <h4 class="lead">3d model of this display or exhibition</h4>
            <div class="col-12 shadow-sm p-3 mx-auto mb-3">
                <div class="ratio ratio-4x3">
                    <iframe title="A 3D  model related to this exhibition"
                            src="https://sketchfab.com/models/{{ $coll['sketchfab_id']}}/embed?"
                            allow="autoplay; fullscreen; vr"
                            mozallowfullscreen="true"
                            webkitallowfullscreen="true"></iframe>
                </div>
            </div>
        </div>
    @endif
@endsection
@endif

@section('exhibitions-files')
    @if(!empty($coll['exhibition_files']))
        <x-exhibition-files :files="$coll['exhibition_files']"></x-exhibition-files>
    @endif
@endsection

@section('exhibition-thanks')
    <x-exhibition-thanks :exhibition="$coll"></x-exhibition-thanks>
@endsection

@if(!empty($products))
@section('shopify')
    <div class="container py-3">
        <h3>Suggested Curating Cambridge products</h3>
        <div class="row">
            @foreach($products as $record)
                <x-shopify-live-card :result="$record"></x-shopify-live-card>
            @endforeach
        </div>
    </div>
@endsection
@endif


@if(!empty($events))
@section('tnew-data')
    <div class="container pt-3">
        <h3>Special events for this exhibition</h3>
        <div class="row">
            @foreach($events as $production)
                <x-tessitura-production-details-card :production="$production"></x-tessitura-production-details-card>
            @endforeach
        </div>
    </div>
@endsection
@endif

