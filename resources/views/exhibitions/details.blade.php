@php
    if(!empty($exhibition['exhibition_tagline'])) {
        $exhibition_tagline = $exhibition['exhibition_tagline'];
    } else {
        $exhibition_tagline = $exhibition['exhibition_title'];
    }
    $hero = [
        'exhibition_slug' => $exhibition['slug'],
        'hero_title' => $exhibition['exhibition_title'],
        'hero_subtitle' => $exhibition_tagline,
        'start' => $exhibition["exhibition_start_date"],
        'end' => $exhibition["exhibition_end_date"],
        'display_end_date' => $exhibition['display_end_date'],
        'image' => $exhibition["hero_image"]
    ];
    if(!empty($exhibition['page_template'])) {
        $page_template = $exhibition['page_template'];
    }
@endphp

@extends('layouts.exhibitions')
@section('keywords', $exhibition['meta_keywords'])
@section('description', $exhibition['meta_description'])
@section('title', $exhibition['exhibition_title'])
@section('hero_image', $exhibition['hero_image']['data']['thumbnails'][10]['url'])
{{-- Start template check --}}

{{-- Exhibitions - 2024 template --}}
    @if(!empty($page_template) && $page_template == 'exhibitions-2024')
        @section('exhibitions-2024')
            @include('exhibitions.templates.details-2024')
        @endsection
        @section('shopify')
            @include('includes.elements.exhibitions.products')
        @endsection
    @elseif(!empty($page_template) && $page_template == 'exhibitions-2025')
        @section('exhibitions-2025')
            @include('exhibitions.templates.details-2025')
        @endsection
        @section('shopify')
            @include('includes.elements.exhibitions.products')
        @endsection
    @else
{{-- Default template --}}
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

    @include('includes.elements.exhibitions.faqs')

    @include('includes.elements.exhibitions.sketchfab')

    @if($exhibition['slug'] === 'islanders')
        @include('includes.elements.exhibitions.shopify')
    @endif

    @include('includes.elements.exhibitions.files')

    @include('includes.elements.exhibitions.thanks')

    @include('includes.elements.exhibitions.products')

    @include('includes.elements.exhibitions.events')

    @include('includes.elements.exhibitions.events-url')

    {{-- @include('includes.elements.exhibitions.similar-exhibits') --}}

{{-- End template check --}}
@endif
