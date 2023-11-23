@extends('layouts.layout')
@foreach($pages['data'] as $page)
    @section('title', $page['title'])
@section('hero_image', $page['hero_image']['data']['url'])
@section('hero_image_title', $page['hero_image_alt_text'])
@section('description', $page['meta_description'])
@section('keywords', $page['meta_keywords'])
@endforeach
@section('departments')
    <div class="container-fluid py-4">
        <div class="container">
            <div class="row">
                @foreach($departments['data'] as $department)
                    <x-image-card
                        :altTag="$department['hero_image_alt_text'] "
                        :title="$department['title']"
                        :image="$department['hero_image']"
                        :route="'department'"
                        :params="[$department['slug']]"></x-image-card>
                @endforeach
            </div>
        </div>
    </div>
@endsection
