@extends('layouts.error')
@section('title', 'An error has been recorded')
@section('hero_image',env('CONTENT_STORE') . "large_PD_43_1986_201701_adn21_dc1.jpeg")
@section('hero_image_title', 'Vesuvius in eruption')
@section('content')

<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 mt-3">
    <div class="row">
        <div class="col-md-6">
            <figure class="figure">
                <img alt="An image of a very grumpy cat" class="img-fluid" width="416" height="416"
                    src="{{ env('CONTENT_STORE') }}searle_cat.jpg?key=exhibition" />
                <figcaption class="figure-caption">
                    One of Ronald Searle's cats, given to the Fiztwilliam Museum in 2014 by his family.
                </figcaption>
            </figure>
        </div>
        <div class="col-md-6">
            <p>
                We are very sorry, but our website has encountered a problem.
            </p>
        </div>
    </div>
</div>
@endsection