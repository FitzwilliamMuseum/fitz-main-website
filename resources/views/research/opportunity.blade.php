@extends('layouts.layout')
@foreach($opportunities['data'] as $opportunity)

    @section('description', $opportunity['meta_description'])

    @section('title', $opportunity['title'])

    @if(!is_null($opportunity['hero_image']))
        @section('hero_image', $opportunity['hero_image']['data']['url'])
        @section('hero_image_title', $opportunity['hero_image_alt_text'])
    @endif

    @section('content')
        <div class="shadow-sm p-3 mx-auto mb-3">
            {!! $opportunity['description'] !!}
        </div>
    @endsection
@endforeach
