@extends('layouts.layout')
@section('title', $period['title'])
@if(array_key_exists('meta_description', $period))
    @section('description', $period['meta_description'])
@endif
@if(array_key_exists('meta_keywords', $period))
    @section('keywords', $period['meta_keywords'])
@endif
@section('hero_image',$period['hero_image']['data']['url'])
@section('hero_image_title', $period['hero_image_alt_text'])

@section('content')
    <div class="col-md-12 shadow-sm p-3 mb-3">
        {!! $period['introductory_text'] !!}
    </div>

    <div class="row">
        @foreach($pharos['data'] as $record)
            <x-image-card
                :image="$record['image']"
                :title="$record['title']"
                :altTag="$record['image_alt_text']"
                :route="'highlight'"
                :params="[$record['slug']]"></x-image-card>
        @endforeach
    </div>
@endsection
