@extends('layouts.layout')
@section('title','Our staff choose their highlights from our collections')
@section('description', 'A collection of favourite objects chosen by staff from the collection of the Fitzwilliam Museum')
@section('keywords', 'museum,highlights,collection,objects')
@section('hero_image',env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")

@section('content')
    <div class="row">
        @foreach($week['data'] as $record)
            <x-image-card
                :image="$record['hero_image']"
                :altTag="$record['hero_image_alt_text']"
                :route="'fitz-object'"
                :params="[$record['slug']]"
                :title="$record['title']"></x-image-card>
        @endforeach
    </div>
    {{ $paginator->links() }}
@endsection
