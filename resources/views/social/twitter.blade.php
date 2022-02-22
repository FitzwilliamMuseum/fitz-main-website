@extends('layouts.layout')
@section('title', 'Our recent Twitter posts')
@section('hero_image', 'https://content.fitz.ms/fitz-website/assets/SpringtimeWEB.jpg?key=directus-large-crop')
@section('hero_image_title', 'Springtime by Claude Monet')
@section('description', 'An archive of our Twitter posts')

@section('content')

    <div class="row">
        @foreach($tweets as $tweet)
            <x-twitterCard :tweet="$tweet"/>
        @endforeach
    </div>
@endsection
