@extends('layouts.visitus')
@section('title', 'Visit us')
@section('hero_image', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/european-pottery-bond.jpg')
@section('hero_image_title', "The Museum's founder's building")
@section('description','How to visit the Fitzwilliam Museum in Cambridge')

@section('content')
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card card-fitz h-100">
                <a href="{{route('exhibitions')}}" class="stretched-link">
                    <img class="img-fluid"
                         src="https://content.fitz.ms/fitz-website/assets/C.7-1986_201810_adn21_dc1.jpg?key=directus-medium-crop"
                         loading="lazy"
                         alt="Magdalene Odundo vessel" width="800"
                         height="600">
                </a>
                <div class="card-body h-100">
                    <div class="contents-label mb-3">
                        <h3>
                            <a href="{{route('exhibitions')}}" class="stretched-link">Exhibitions</a>
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card card-fitz h-100">
                <a href="{{route('exhibitions')}}#displays" class="stretched-link">
                    <img class="img-fluid"
                         src="https://content.fitz.ms/fitz-website/assets/Women%20makers%20and%20muses.jpg?key=directus-medium-crop"
                         alt="A highlight image for Gallery 1: British and European Art, 19th–20th Century"
                         loading="lazy" width="800"
                         height="600">
                </a>
                <div class="card-body h-100">
                    <div class="contents-label mb-3">
                        <h3>
                            <a aria-label="New displays link" href="{{route('exhibitions')}}#displays">
                                New displays
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card card-fitz h-100">
                <a href="{{ route('galleries')}}" class="stretched-link">
                    <img class="img-fluid"
                         src="https://content.fitz.ms/fitz-website/assets/Fitzwilliam Museum_GalleryOne_Panorama_02_0.jpg?key=directus-medium-crop"
                         alt="A highlight image for Gallery 1: British and European Art, 19th–20th Century"
                         loading="lazy" width="800"
                         height="600">
                </a>
                <div class="card-body h-100">
                    <div class="contents-label mb-3">
                        <h3>
                            <a href="{{ route('galleries')}}" class="stretched-link">
                                Our galleries
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card card-fitz h-100">
                <a href="{{ route('events')}}" class="stretched-link">
                    <img class="img-fluid"
                         src="https://content.fitz.ms/fitz-website/assets/unknown_st_augustine_st_jerome_and_st_benedict.jpg?key=directus-medium-crop"
                         alt="A highlight image for Gallery 1: British and European Art, 19th–20th Century"
                         loading="lazy"
                         width="800"
                         height="600">
                </a>
                <div class="card-body h-100">
                    <div class="contents-label mb-3">
                        <h3>
                            <a href="{{ route('events')}}" class="stretched-link">What's on?</a>
                        </h3>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @foreach($pages['data'] as $page)
    @section('description', $page['meta_description'])
    @section('keyword', $page['meta_keywords'])
        <div class="col-12 shadow-sm p-3 mt-3 mx-auto mb-3">
            <h2>{{ $page['title']}}</h2>
            @markdown($page['body'])
        </div>
    @endforeach
@endsection

@include('includes.elements.fitzwilliam-map')

@section('associated_pages')
    <div class="container-fluid py-4 bg-grey">
        <div class="container">
            <div class="row">
                <x-static-image-card
                    :image="'https://content.fitz.ms/fitz-website/assets/saturday_4th_april_139 SMALL.jpg?key=directus-medium-crop'"
                    :alt="'Visitor in Gallery 5'"
                    :route="'landing-section'"
                    :params="['visit-us','frequently-asked-questions']"
                    :title="'Frequently Asked Questions'"
                    />
                @foreach($associated['data'] as $associate)
                    <x-image-card
                        :altTag="$associate['hero_image_alt_text']"
                        :title="$associate['title']"
                        :image="$associate['hero_image']"
                        :route="'landing-section'"
                        :params="[$associate['section'],$associate['slug']]"></x-image-card>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('floorplans')
    <div class="row">
        @foreach($floors as $floorplans)
            <div class="col-md-4">
                <x-floor-plans :floorplans="$floorplans"/>
            </div>
        @endforeach
    </div>
@endsection

