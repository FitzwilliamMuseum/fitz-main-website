@extends('layouts.layout')
@section('title','Collection Periods')
@section('description', 'A collection of objects from the collection of the Fitzwilliam Museum')
@section('keywords', 'museum,highlights,collection,objects')
@section('hero_image',env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('content')
    <div class="row">
        @foreach($periods as $record)
            <x-image-card
                :image="$record[0]['image']"
                :route="'period'"
                :title="$record[0]['period_assigned']"
                :altTag="$record[0]['image']['title']"
                :params="[Str::slug($record[0]['period_assigned'],'-')]"></x-image-card>
        @endforeach
    </div>
@endsection
