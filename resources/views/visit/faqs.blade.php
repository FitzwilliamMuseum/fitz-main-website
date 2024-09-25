@extends('layouts.layout')
@section('title', 'Frequently asked questions')
@section('hero_image', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/saturday_4th_april_139-small-1.jpg')
@section('hero_image_title', "The Museum's founder's building")
@section('description','Frequently asked questions about the museum and your visit')

@section('content')
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 ">
    <h2 class="text-info mb-4">Booking tickets</h2>
    @foreach($booking as $book)
    <x-faq :faq="$book"></x-faq>
    @endforeach
</div>

<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">
    <h2 class="text-info mb-4">Visiting</h2>
    @foreach($visiting as $visit)
    <x-faq :faq="$visit"></x-faq>
    @endforeach
</div>

<div class="col-12 col-max-800 shadow-sm p-3 mx-auto  ">
    <h2 class="text-info mb-4">Health, safety and hygiene</h2>
    @foreach($hse as $health)
    <x-faq :faq="$health"></x-faq>
    @endforeach
</div>

@endsection

{{-- @include('includes.structure.related-pages') --}}