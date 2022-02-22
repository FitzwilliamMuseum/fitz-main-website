@extends('layouts.layout')
@foreach($pages['data'] as $page)
    @if(!empty($page['hero_image']))
        @section('hero_image', $page['hero_image']['data']['url'])
@section('hero_image_title', $page['hero_image_alt_text'])
@else
    @section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@endif
@section('title', 'Look, Think, Do')
@section('description', $page['meta_description'])
@section('keywords', $page['meta_keywords'])

@section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3">
        @markdown($page['body'])
    </div>

    @endforeach

    @if(!empty($ltd['data']))
        <div class="row">
            @foreach($ltd['data'] as $look)
                <x-image-card
                    :altTag="$look['focus_image_alt_text']"
                    :title="$look['title_of_work']"
                    :image="$look['focus_image']"
                    :route="'ltd-activity'"
                    :params="[$look['slug']]"></x-image-card>
            @endforeach
        </div>
    @endif
@endsection
