@extends('layouts.layout')
@section('title','Collection Themes')
@section('description', 'A collection of objects from the collection of the Fitzwilliam Museum')
@section('keywords', 'museum,highlights,collection,objects')
@section('hero_image',env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")

@section('content')
    <div class="row">
        @foreach($pharos['data'] as $record)
            <x-image-card
                :image="$record['hero_image']"
                :altTag="$record['hero_image']['title']"
                :route="'theme'"
                :params="[$record['slug']]"
                :title="ucfirst(str_replace('-',' ', $record['title']))"></x-image-card>
        @endforeach
    </div>
@endsection
