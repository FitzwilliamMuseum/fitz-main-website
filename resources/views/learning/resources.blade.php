@extends('layouts.layout')

@section('title', $pages['data'][0]['title'])
@section('hero_image', $pages['data'][0]['hero_image']['data']['url'])
@section('hero_image_title', $pages['data'][0]['hero_image_alt_text'])
@section('description', 'Educational resources from the Fitzwilliam Museum')
@section('keywords', 'education,resources,do it yourself, museum, cambridge, egypt,rome, greece')
@section('content')
@foreach($pages['data'] as $page)
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 ">
    @markdown($page['body'])
</div>
@endforeach
@endsection

@section('resources-plans')
<div class="container">
    <h2>Factsheets by topic</h2>
    <div class="row">
        @foreach($res['data'] as $resource)
        <x-image-card :image="$resource['hero_image']" :route="'learn-with-us-resource'" :params="[$resource['slug']]"
            :title="$resource['title']" :altTag="$resource['hero_image_alt_text']"></x-image-card>
        @endforeach
    </div>
</div>
@endsection

@section('diy')
<div class="container">
    <h2>DIY and Into Action</h2>
    <div class="row">
        @foreach($stages['data'] as $resource)
        <x-image-card :image="$resource['hero_image']" :route="'learn-with-us-resource'" :params="[$resource['slug']]"
            :title="$resource['title']" :altTag="$resource['hero_image_alt_text']"></x-image-card>
        @endforeach
    </div>
</div>
@endsection