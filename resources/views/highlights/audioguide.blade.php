@extends('layouts.layout')
@section('title','Our audio guide')
@section('description', 'A collection of objects from the collection of the Fitzwilliam Museum')
@section('keywords', 'museum,highlights,collection,objects')
@section('hero_image',env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")

@section('audioGuide')
    <div class="container-fluid bg-gdbo py-3">
        <div class="container">
            <div class="row">
                @foreach($stops['data'] as $record)
                    <x-audioguide-card
                        :image="$record['hero_image']"
                        :route="'audio-stop'"
                        :params="[$record['slug']]"
                        :stop="$record['stop_number']"
                        :title="$record['title']"
                        :altTag="$record['hero_image_alt_text']"></x-audioguide-card>
                @endforeach
            </div>
        </div>
    </div>
@endsection
