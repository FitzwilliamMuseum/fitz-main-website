@extends('layouts.visitus')
@section('title', 'Visit us')
@section('hero_image', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/european-pottery-bond.jpg')
@section('hero_image_title', "The Museum's founder's building")
@section('description','How to visit the Fitzwilliam Museum in Cambridge')

@section('content')
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card card-fitz h-100">
                <a href="{{route('exhibitions')}}" class="stretched-link"><img class="img-fluid"
                                                                               src="https://content.fitz.ms/fitz-website/assets/C.7-1986_201810_adn21_dc1.jpg?key=directus-medium-crop"
                                                                               loading="lazy"
                                                                               alt="Magdalene Odundo vessel" width="800"
                                                                               height="600"></a>
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
                <a href="{{route('exhibitions')}}#displays" class="stretched-link"><img class="img-fluid"
                                                                                        src="https://content.fitz.ms/fitz-website/assets/Women%20makers%20and%20muses.jpg?key=directus-medium-crop"
                                                                                        alt="A highlight image for Gallery 1: British and European Art, 19th–20th Century"
                                                                                        loading="lazy" width="800"
                                                                                        height="600"></a>
                <div class="card-body h-100">
                    <div class="contents-label mb-3">
                        <h3>
                            <a aria-label="New displays link" href="{{route('exhibitions')}}#displays">New displays</a>
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card card-fitz h-100">
                <a href="{{ route('galleries')}}" class="stretched-link"><img class="img-fluid"
                                                                              src="https://content.fitz.ms/fitz-website/assets/Fitzwilliam Museum_GalleryOne_Panorama_02_0.jpg?key=directus-medium-crop"
                                                                              alt="A highlight image for Gallery 1: British and European Art, 19th–20th Century"
                                                                              loading="lazy" width="800"
                                                                              height="600"></a>
                <div class="card-body h-100">
                    <div class="contents-label mb-3">
                        <h3>
                            <a href="{{ route('galleries')}}" class="stretched-link">Our galleries</a>
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card card-fitz h-100">
                <a href="{{ route('events')}}" class="stretched-link"><img class="img-fluid"
                                                                           src="https://content.fitz.ms/fitz-website/assets/unknown_st_augustine_st_jerome_and_st_benedict.jpg?key=directus-medium-crop"
                                                                           alt="A highlight image for Gallery 1: British and European Art, 19th–20th Century"
                                                                           loading="lazy" width="800" height="600"></a>
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

@section('map')
    @map([
    'lat' => 52.199818,
    'lng' => 0.11975,
    'zoom' => 18,
    'minZoom' => 16,
    'maxZoom' => 18,
    'markers' => [
    [
    'title' => 'The Founder\'s Entrance',
    'lat' => 52.20032347341985,
    'lng' => 0.11982414954445642,
    'popup' => '<h3>Founder\'s Entrance</h3><p>Access is via a flight of steps.</p>',

    ],
    [
    'title' => 'The Courtyard Entrance',
    'lat' => 52.19974696477096,
    'lng' => 0.12065154202527271,
    'popup' => '<h3>Courtyard Entrance</h3><p>Accessible step free access.</p>',

    ],
    [
    'title' => 'Cambridge Station',
    'lat' => 52.19433858460627,
    'lng' => 0.1374599593479488,
    'popup' => '<h3>Cambridge Station</h3><p>The railway station.</p>',

    ],
    [
    'title' => 'Cambridge Bus Station',
    'lat' => 52.2054313453068,
    'lng' => 0.12392614778108904,
    'popup' => '<h3>Cambridge Bus Station</h3><p>The central bus station.</p>',

    ],
    ],
    ])
@endsection

@section('associated_pages')
    <div class="container-fluid py-4 bg-grey">
        <div class="container">
            <div class="row">
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
    <ul id="floor-plans">
        @foreach($floors['data'] as $floor)
            <li>
                <a href="{{$floor['file']['data']['full_url']}}">{{$floor['title']}}</a>
            </li>
        @endforeach
    </ul>
@endsection

@section('corona')
    @include('includes.structure.corona')
@endsection
