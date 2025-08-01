@extends('layouts.layout')

@section('title', $department['title'])
@section('keywords', $department['meta_keywords'])
@section('description', $department['meta_description'])
@section('hero_image', $department['hero_image']['data']['url'])
@section('hero_image_title', $department['hero_image_alt_text'])

@section('content')
    <div class="shadow-sm">
        <div class=" p-3 mx-auto mb-3">
            @markdown($department['department_description'] ?? '')
            @isset( $department['email_address'] )
                <p class="text-info">
                    Email: <a href="mailto:{{ $department['email_address'] }}">{{ $department['email_address'] }}</a>
                </p>
            @endisset
        </div>
    </div>
@endsection
@if(!empty($department['associated_galleries']))
    @section('galleries')
        <div class="container">
            <h2>Associated Galleries</h2>
            <div class="row">
                @foreach($department['associated_galleries'] as $gallery)
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
    @if($department['slug'] == 'conservation-and-collections-care')
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
            <h2>Associated staff</h2>
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
