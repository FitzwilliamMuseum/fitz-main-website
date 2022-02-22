@extends('layouts.layout')
@section('title','Collection Contexts')
@section('description', 'A collection of objects from the collection of the Fitzwilliam Museum')
@section('keywords', 'museum,highlights,collection,objects')
@section('hero_image',env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")

@section('content')
    <div class="row">
        @foreach($context as $record)
            <x-image-card
                :image="$record[0]['hero_image']"
                :route="'context-sections'"
                :title="ucfirst(str_replace('-',' ', $record[0]['section']))"
                :altTag="$record[0]['hero_image']['title']"
                :params="[$record[0]['section']]"></x-image-card>
        @endforeach
    </div>
@endsection
