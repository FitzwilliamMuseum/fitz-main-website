@extends('layouts.visitus')

@section('hero_image', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/visit-final-.png')
@section('title', 'Plan your visit')
@section('description', 'Visiting the Fitzwilliam Museum? What do you need to know?')
@section('keyword', 'cambridge,museums,visit')

@section('content')

@if(request()->get('template') && request()->get('template') == 'new')
@else
<div class="row">
    <?php if(!empty($exhibition)): ?>
    <x-visit-us-static-card :image="$exhibition['hero_image']['data']['thumbnails'][13]['url']"
        :alt="$exhibition['hero_image_alt_text']" :route="'exhibitions'" :params="[]"
        :title="'Exhibitions and displays'" :colWidth="'3'"></x-visit-us-static-card>
    <?php endif; ?>

    <?php # if(!empty($display)): ?>
    {{-- <x-visit-us-static-card :image="$display['hero_image']['data']['thumbnails'][13]['url']"
        :alt="$display['hero_image_alt_text']" :route="'exhibitions'" :params="[]" :title="'New Displays'"
        :colWidth="'3'"></x-visit-us-static-card> --}}
    <?php # endif; ?>

    <x-visit-us-static-card
        :image="'https://content.fitz.ms/fitz-website/assets/Fitzwilliam Museum_GalleryOne_Panorama_02_0.jpg?key=exhibition'"
        :alt="'A highlight image for Gallery 1: British and European Art, 19th–20th Century'" :route="'galleries'"
        :params="[]" :title="'Our galleries'" :colWidth="'3'"></x-visit-us-static-card>

    <x-visit-us-static-card
        :image="'https://content.fitz.ms/fitz-website/assets/unknown_st_augustine_st_jerome_and_st_benedict.jpg?key=exhibition'"
        :alt="'An image depicting St Augustine, St Jerome and St Benedict'" :route="'events'" :params="[]"
        :title="'Events'" :colWidth="'3'"></x-visit-us-static-card>
</div>

@foreach($pages['data'] as $page)
<div class="col-12 col-max-800 shadow-sm p-3 mt-3 mx-auto mb-3">
    <h2>{{ $page['title']}}</h2>
    @markdown($page['body'] ?? 'No text available')
</div>
@endforeach
@endsection

@include('includes.elements.fitzwilliam-map')

@section('associated_pages')
<div class="container-fluid py-4">
    <div class="container">
        <div class="row">
            <x-static-image-card
                :image="'https://content.fitz.ms/fitz-website/assets/saturday_4th_april_139 SMALL.jpg?key=directus-medium-crop'"
                :alt="'Visitor in Gallery 5'" :route="'landing-section'"
                :params="['visit-us','frequently-asked-questions']" :title="'Frequently asked questions'">
            </x-static-image-card>
            @foreach($associated['data'] as $associate)
            <x-image-card :altTag="$associate['hero_image_alt_text']" :title="$associate['title']"
                :image="$associate['hero_image']" :route="'landing-section'"
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
        <x-floor-plans :floorplans="$floorplans"></x-floor-plans>
    </div>
    @endforeach
</div>
@endsection
@endif
