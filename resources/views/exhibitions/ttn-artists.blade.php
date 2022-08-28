@extends('layouts.exhibitions')
@section('keywords', 'labels,cases')
@section('hero_image', ('https://fitz-cms-images.s3.eu-west-2.amazonaws.com/johann-jakob-frey-cloud-study-3-_press-1000x450.jpg'))
@section('title', 'The Artists represented in the exhibition')
@section('description', 'The Artists represented in the exhibition True to Nature, biographies and images collated by Rebecca Virag')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($artists as $artist)
                <x-ttn-artist :artists="$artist"></x-ttn-artist>
            @endforeach
        </div>
    </div>
@endsection
