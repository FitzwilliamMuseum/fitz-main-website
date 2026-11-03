@extends('layouts.layout')
@section('title','Collection search currently unavailable')
@section('description', 'A collection of objects from the collection of the Fitzwilliam Museum')
@section('keywords', 'museum,highlights,collection,objects')
@section('hero_image',config('fitz.assets.location') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")

@section('content')
    <div class="row">
        <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">
            <p>Our collection search is currently unavailable while we undertake essential technical maintenance.</p>
            <p>We're working to get this feature back online as soon as we can - apologies for any inconvenience.</p>
        </div>
    </div>
@endsection
