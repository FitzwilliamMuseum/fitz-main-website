@extends('layouts.layout')
@section('keywords', $resources['meta_keywords'])
@section('description', $resources['meta_description'])
@section('title', $resources['title'])
@section('hero_image', $resources['hero_image']['data']['url'])
@section('hero_image_title', $resources['hero_image_alt_text'])
@section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3">
        @markdown($resources['description'])
    </div>
    @if(!is_null($resources['project_url']))
        <h3>
            Project information
        </h3>
        <div class="col-12 shadow-sm p-3 mx-auto mb-3">
            <ul>

                <li>
                    Project website: <a href="{{ $resources['project_url']}}">{{ $resources['project_url']}}</a>
                </li>
            </ul>
        </div>
    @endif

@endsection
