@extends('layouts.layout')

@foreach($departments['data'] as $dept)
    @section('title', $dept['title'])
@section('keywords', $dept['meta_keywords'])
@section('description', $dept['meta_description'])
@section('hero_image', $dept['hero_image']['data']['url'])
@section('hero_image_title', $dept['hero_image_alt_text'])

@section('content')
    <div class="shadow-sm">
        <div class=" p-3 mx-auto mb-3">
            @markdown($dept['department_description'] ?? '')
            @isset( $dept['email_address'] )
                <p class="text-info">
                    Email: <a href="mailto:{{ $dept['email_address'] }}">{{ $dept['email_address'] }}</a>
                </p>
            @endisset
        </div>
    </div>
@endsection
@if(!empty($dept['associated_galleries']))
@section('galleries')
    <div class="container">
        <h2>Associated Galleries</h2>
        <div class="row">
            @foreach($dept['associated_galleries'] as $gallery)
                <x-image-card :altTag="$gallery['galleries_id']['hero_image_alt_text']"
                              :title="$gallery['galleries_id']['gallery_name']"
                              :image="$gallery['galleries_id']['hero_image']" :route="'gallery'"
                              :params="array('slug' => $gallery['galleries_id']['slug'])"></x-image-card>
            @endforeach
        </div>
    </div>
@endsection
@endif

@section('cons-areas')
    @if($dept['slug'] == 'conservation-and-collections-care')
        @inject('departmentsController', 'App\Http\Controllers\departmentsController')
        @php
            $areas = $departmentsController::areas();
            $blog = $departmentsController::conservationblog()
        @endphp
        @include('includes.structure.areas')
        @include('includes.structure.cons-blog')
    @endif
@endsection

@if(!empty($staff['data']))
@section('curators')
    <div class="container">
        <h3>Associated staff</h3>
        <div class="row">
            @foreach($staff['data'] as $curator)
                <x-image-card
                    :altTag="$curator['profile_image_alt_text']"
                    :title="$curator['display_name']"
                    :image="$curator['profile_image']"
                    :route="'research-profile'"
                    :params="array('slug' => $curator['slug'])"></x-image-card>
            @endforeach
        </div>
    </div>
@endsection
@endif
@endforeach
