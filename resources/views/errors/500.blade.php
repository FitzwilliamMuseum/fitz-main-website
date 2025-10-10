@extends('layouts.error')
@section('title', 'An error has been recorded')
@section('hero_image',env('CONTENT_STORE') . "large_PD_43_1986_201701_adn21_dc1.jpeg")
@section('hero_image_title', 'Vesuvius in eruption')
@section('content')

<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 mt-3">
    <div class="row">
        <div class="container">
            <p>
                We are very sorry, but our website has encountered a problem.
            </p>
        </div>
    </div>
</div>
@endsection
