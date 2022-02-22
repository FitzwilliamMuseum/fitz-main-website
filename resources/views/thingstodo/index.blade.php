@extends('layouts.layout')
@section('title','Discover things to do online with the Fitz')
@section('hero_image', env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('description', 'Discover things to do online with the Fitzwilliam Museum, Cambridge University')
@section('keywords', 'activities,stories,museum,cambridge')
@section('content')
    <div class="row">
        @foreach($thingstodo['data'] as $things)
            <x-partner-card
                :altTag="$things['hero_image_alt_text'] "
                :title="$things['title']"
                :subtitle="$things['body']"
                :image="$things['hero_image']"
                :url="$things['url']"></x-partner-card>
        @endforeach
    </div>
@endsection
