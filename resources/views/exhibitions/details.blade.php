@extends('layouts.exhibitions')
@section('keywords', $exhibition['meta_keywords'])
@section('description', $exhibition['meta_description'])
@section('title', $exhibition['exhibition_title'])

@if(!empty($banners))
    @section('banner')
        <x-home-page-banner :banners="$banners"></x-home-page-banner>
    @endSection
    @section('hero_image_title', $exhibition['hero_image_alt_text'])
    @section('hero_image', $exhibition['hero_image']['data']['url'])
@else
    @section('hero_image', $exhibition['hero_image']['data']['url'])
    @section('hero_image_title', $exhibition['hero_image_alt_text'])
@endif


@if($exhibition['slug'] === 'true-to-nature-open-air-painting-in-europe-1780-1870')
    @if (\Carbon\Carbon::now()->diffInHours('2022-04-28 00:00:01', false) <= 0)
        @include('includes.structure.true')
    @endif
@endif

@include('includes.elements.exhibitions.main-content')

@include('includes.elements.exhibitions.cases')

@include('includes.elements.exhibitions.podcasts')

@include('includes.elements.exhibitions.films')

@include('includes.elements.exhibitions.artworks')

@include('includes.elements.exhibitions.curators')

@include('includes.elements.exhibitions.partners')

@include('includes.elements.exhibitions.departments')

@include('includes.elements.exhibitions.carousel')

@include('includes.elements.exhibitions.galleries')

@include('includes.elements.exhibitions.360')

@include('includes.elements.exhibitions.sketchfab')

@if($exhibition['slug'] === 'islanders')
    @include('includes.elements.exhibitions.shopify')
@endif

@include('includes.elements.exhibitions.files')

@include('includes.elements.exhibitions.thanks')

@include('includes.elements.exhibitions.products')

@include('includes.elements.exhibitions.events')

@include('includes.elements.exhibitions.events-url')

@include('includes.elements.exhibitions.similar-exhibits')

