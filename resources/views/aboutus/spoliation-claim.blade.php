@extends('layouts.layout')
@section('hero_image', env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('description', 'Spoliation claims made to the Museum')
@section('keywords', 'spoliation,stories,museum,cambridge')

@foreach($claims as $claim)
    @section('title','Spoliation claim: ' . $claim['alt_text'])
@endforeach
@section('content')
    @foreach($claims as $claim)
        <div class="col-12 shadow-sm p-3 mx-auto mb-3 article">
            @markdown($claim['text'])
            <a class="btn btn-info py-3 d-block" href="{{ route('article',[$claim['news_slug']]) }}">
                Learn more about this claim
            </a>
        </div>
        <img class="card-img-top"
             src="{{ $claim['image']['data']['url']}}"
             alt="{{ $claim['alt_text'] }}"
             width="{{ $claim['image']['width'] }}"
             loading="lazy"/>
    @endforeach
@endsection
