@extends('layouts.exhibitions')
@section('keywords', 'labels,cases')
@section('hero_image', ('https://fitz-cms-images.s3.eu-west-2.amazonaws.com/johann-jakob-frey-cloud-study-3-_press-1000x450.jpg'))
@section('title', 'The Artists represented in the exhibition')
@section('content')
    <div class="row">
        @foreach($artists as $artist)
        <x-ttn-artist :artists="$artist"></x-ttn-artist>
        @endforeach
    </div>
@endsection
