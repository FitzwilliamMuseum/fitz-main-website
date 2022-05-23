@extends('layouts.error')
@section('title', 'Page not found')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/cupidpsychelarge.jpg')
@section('hero_image_title', 'Cupid and Psyche - del Sallaio')
@section('content')
<div class="col-md-12 shadow-sm p-3 mx-auto mb-3 mt-3">
  <div class="row">
  <div class="col-md-4">
    <figure class="figure">
      <img alt="An image of a very grumpy cat" class="img-fluid" src="https://fitz-cms-images.s3.eu-west-2.amazonaws.com/searle_cat.jpg" />
    </figure>
  </div>
  <div class="col-md-8">
    <p>
      Sorry, we cannot seem to find what you’re looking for, and Ronald Searle's cat is grumpy because of this.
      You've landed on a URL that doesn't seem to exist.
    </p>
    <p>
      We have just changed our website and are reorganising our information, so
      things you may want to see could have been moved.
    </p>

    <p>
      Based on the URL you used to trigger this error, we have suggested up to 3
      pages below that may meet what you were looking for. If these are not what you
      are looking for, please do try our search engine.
    </p>

    <p>
      If you are looking for object related information, please visit the collections pages.
    </p>
  </div>
  </div>
</div>

@inject('searchController', 'App\Http\Controllers\searchController')
@php
$records = $searchController::injectResults(Request::path());
@endphp
@if(!empty($records))
<h2>Suggested pages</h2>
@include('includes.structure.results')
@endif
@endsection
