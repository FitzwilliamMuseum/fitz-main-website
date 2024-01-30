@extends('layouts.layout')
@foreach($pages['data'] as $page)
@section('title', $page['title'])
@if(!empty($page['hero_image']))
@section('hero_image', $page['hero_image']['data']['url'])
@section('hero_image_title', $page['hero_image_alt_text'])
@else
@section('hero_image',env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@endif
@section('description', $page['meta_description'])
@section('keywords', $page['meta_keywords'])
@endforeach
@section('content')
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto  ">
    @markdown($page['body'])
</div>
@endsection
@section('associated_pages')
<div class="container">
    <div class="row">
        <x-static-image-card :title="'Our researchers'" :route="'research-profiles'"
            :image="'https://content.fitz.ms/fitz-website/assets/img_20191219_184304_832.jpeg?key=exhibition'"
            :alt="'The eye of our replica minotaur'" :params="[]"></x-static-image-card>
        <x-static-image-card :title="'Research opportunities'" :route="'opportunities'"
            :image="'https://content.fitz.ms/fitz-website/assets/IMG_20191022_152807.jpeg?key=exhibition'"
            :alt="'Jennifer Wexler with her Museum in a Box project'" :params="[]"></x-static-image-card>
        <x-static-image-card :title="'Our research work'" :route="'research-projects'"
            :image="'https://content.fitz.ms/fitz-website/assets/XRF analysis of an illuminated mss at the Fitz.jpg?key=exhibition'"
            :alt="'XRF analysis of a manuscript'" :params="[]"></x-static-image-card>
        <x-static-image-card :title="'Digital resources'" :route="'resources'"
            :image="'https://content.fitz.ms/fitz-website/assets/4.-Dormition-of-the-Virgin-Italy-Venice-c.1420-Master-of-the-Murano-Gradual-active-c.1420-1440.jpg?key=exhibition'"
            :alt="'A segment of a manuscript'" :params="[]"></x-static-image-card>
        <x-static-image-card :title="'Affiliated researchers'" :route="'research-affiliates'"
            :image="'https://content.fitz.ms/fitz-website/assets/25th_november_131_2000x1000.jpg?key=exhibition'"
            :alt="'The Founders Entrance Portico'" :params="[]"></x-static-image-card>

        @foreach($associated['data'] as $project)
        <x-image-card :image="$project['hero_image']" :route="'landing-section'"
            :altTag="$project['hero_image_alt_text']" :title="$project['title']"
            :params="[$project['section'],$project['slug']]"></x-image-card>

        @endforeach
    </div>
</div>
@endsection