@extends('layouts.error')
@section('title', 'An error has been recorded')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/cupidpsychelarge.jpg')
@section('hero_image_title', 'Cupid and Psyche - del Sallaio')
@section('content')

    <div class="col-12 shadow-sm p-3 mx-auto mb-3 mt-3">
        <div class="row">
            <div class="col-md-6">
                <figure class="figure">
                    <img alt="An image of a very grumpy cat" class="img-fluid" src="https://fitz-cms-images.s3.eu-west-2.amazonaws.com/searle_cat.jpg"/>
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
