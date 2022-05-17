@extends('layouts.layout')
@section('title', 'Our instagram posts')
@section('hero_image', 'https://content.fitz.ms/fitz-website/assets/SpringtimeWEB.jpg?key=directus-large-crop')
@section('hero_image_title', 'Springtime by Claude Monet')
@section('description', 'An archive of our instagram posts')
@section('content')

    <div class="row">
        @foreach($insta['data'] as $instagram)
            <x-instagram-card :instagram="$instagram"></x-instagram-card>
        @endforeach
    </div>
@endsection
