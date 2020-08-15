@extends('layouts/error')
@section('title', 'Page not found')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/cupidpsychelarge.jpg')
@section('hero_image_title', 'Cupid and Psyche - del Sallaio')
@section('content')
<h2>404 Error</h2>

<div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
  <figure class="figure">
  <img class="img-fluid" src="https://fitz-cms-images.s3.eu-west-2.amazonaws.com/searle_cat.jpg" />
</figure>
  <p>Sorry, we can’t seem to find what you’re looking for.</p>
  <p>You've landed on a URL that doesn't seem to exist.</p>
</div>
@endsection
