@extends('layouts.layout')
@foreach($period['data'] as $detail)
    @section('title', $detail['title'])
@if(array_key_exists('meta_description', $detail))
    @section('description', $detail['meta_description'])
@endif
@if(array_key_exists('meta_keywords', $detail))
    @section('keywords', $detail['meta_keywords'])
@endif
@section('hero_image',$detail['hero_image']['data']['url'])
@section('hero_image_title', $detail['hero_image_alt_text'])
@endforeach

@section('content')
    <div class="col-md-12 shadow-sm p-3 mb-3">
        {!! $detail['introductory_text'] !!}
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
