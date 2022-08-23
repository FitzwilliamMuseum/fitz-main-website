@extends('layouts.layout')
@section('title','Spoliation claims')
@section('hero_image', env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('description', 'Spoliation claims made to the Museum')
@section('keywords', 'spoliation,stories,museum,cambridge')
@section('content')
    <div class="row mt-3">
        @foreach($claims['data'] as $claim)
            <x-spoliation-card :claim="$claim"></x-spoliation-card>
        @endforeach
    </div>
    <div class="container mt-1 p-2 text-center">
        <nav aria-label="Page navigation">
            {{ $claims->appends(request()->except('page'))->links() }}
        </nav>
    </div>
@endsection
