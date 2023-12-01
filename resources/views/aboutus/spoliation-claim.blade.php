@extends('layouts.layout')
@section('hero_image', env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('description', 'Spoliation claims made to the Museum')
@section('keywords', 'spoliation,stories,museum,cambridge')
@section('title','Spoliation claim: ' . $claims['alt_text'])
@section('content')
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 article">
    @markdown($claims['text'])
    <a class="btn btn-info py-3 d-block" href="{{ route('article',[$claims['news_slug']]) }}">
        Learn more about this claim
    </a>
</div>
<img class="card-img-top" src="{{ $claims['image']['data']['url']}}" alt="{{ $claims['alt_text'] }}"
    width="{{ $claims['image']['width'] }}" loading="lazy" />
@endsection