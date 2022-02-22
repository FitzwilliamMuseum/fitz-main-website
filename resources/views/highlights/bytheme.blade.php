@extends('layouts.layout')
@foreach($theme['data'] as $th)
    @section('title', $th['title'])
@section('description', 'A description of the theme related to ' . $th['title'])
@section('keywords', '')
@section('hero_image', $th['hero_image']['data']['url'])
@section('hero_image_title', $th['hero_image_alt_text'])
@section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3">
        {!! $th['introductory_text']!!}
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
@endforeach
