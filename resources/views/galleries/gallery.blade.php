@extends('layouts.layout')
@section('title', $gallery['gallery_name'])
@section('description', $gallery['meta_description'])
@section('keywords', $gallery['meta_keywords'])
@if(isset($gallery['hero_image']['data']['full_url']))
    @section('hero_image', $gallery['hero_image']['data']['url'])
    @section('hero_image_title', $gallery['hero_image_alt_text'])
@endif

@section('content')
    @include('includes.elements.galleries.status')

    @include('includes.elements')

    @include('includes.elements.galleries.info')

    @include('includes.elements.galleries.star-objects')

    @include('includes.elements.galleries.adlib')
@endsection

@include('includes.elements.galleries.audio-guide')

@include('includes.elements.galleries.360')

@include('includes.elements.galleries.sketchfab')

@include('includes.elements.galleries.sketchup')
