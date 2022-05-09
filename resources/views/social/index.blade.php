@extends('layouts.layout')
@section('title', 'Have a conversation with the Fitzwilliam Museum')
@section('hero_image', 'https://api.fitz.ms/mediaLib/pdp/pdp2/PD_59_1950.jpg')
@section('hero_image_alt_text', 'Blake in conversation with John Varley')

@section('content')

    <div class="row">
        <x-static-image-card
            :image="'https://content.fitz.ms/fitz-website/assets/imme.jpg?key=exhibition'"
            :alt="'In my Mind\'s eye'"
            :route="'mindeyes'"
            :params="[]"
            :title="'In my mind\'s eye'">
        </x-static-image-card>

        <x-static-image-card
            :image="'https://content.fitz.ms/fitz-website/assets/cover-podcasts.jpg?key=exhibition'"
            :alt="'Podcasts symbol'"
            :route="'podcasts'"
            :params="[]"
            :title="'Our podcast archive'">
        </x-static-image-card>

        <x-static-image-card
            :image="'https://content.fitz.ms/fitz-website/assets/instacover.png?key=exhibition'"
            :alt="'Our instagram profile'"
            :route="'instagram'"
            :params="[]"
            :title="'Instagram'">
        </x-static-image-card>

        <x-static-image-card
            :image="'https://content.fitz.ms/fitz-website/assets/ejpjb8sxcaa_jdg.jpg?key=exhibition'"
            :alt="'Our twitter profile'"
            :route="'twitter'"
            :params="[]"
            :title="'Twitter'">
        </x-static-image-card>
    </div>
@endsection
