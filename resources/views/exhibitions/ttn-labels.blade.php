@extends('layouts.exhibitions')
@section('keywords', 'labels,cases')
@section('hero_image', ('https://fitz-cms-images.s3.eu-west-2.amazonaws.com/johann-jakob-frey-cloud-study-3-_press-1000x450.jpg'))
@section('title', 'True To Nature. Open-air Painting 1780-1870')
@section('content')
    <a href="{{ route('exhibition.ttn.mapped') }}" class="btn btn-info d-block my-3 p-2">View a map of locations depicted in these images</a>
    <h2 class="text-info">{{ $one[0]['theme']['theme_name'] }}</h2>

    <div class="row">
        @foreach($one as $label)
         <x-ttn-labels :labels="$label"/>
        @endforeach
    </div>
    <h2 class="text-info">{{ $two[0]['theme']['theme_name'] }}</h2>
    <div class="row">
        @foreach($two as $label)
            <x-ttn-labels :labels="$label"/>
        @endforeach
    </div>
    <h2 class="text-info">{{ $three[0]['theme']['theme_name'] }}</h2>
    <div class="row">
        @foreach($three as $label)
            <x-ttn-labels :labels="$label"/>
        @endforeach
    </div>
    <h2 class="text-info">{{ $four[0]['theme']['theme_name'] }}</h2>
    <div class="row">
        @foreach($four as $label)
            <x-ttn-labels :labels="$label"/>
        @endforeach
    </div>

    <h2 class="text-info">{{ $five[0]['theme']['theme_name'] }}</h2>
    <div class="row">
        @foreach($five as $label)
            <x-ttn-labels :labels="$label"/>
        @endforeach
    </div>
    <h2 class="text-info">{{ $six[0]['theme']['theme_name'] }}</h2>
    <div class="row">
        @foreach($six as $label)
            <x-ttn-labels :labels="$label"/>
        @endforeach
    </div>
    <h2 class="text-info">{{ $seven[0]['theme']['theme_name'] }}</h2>
    <div class="row">
        @foreach($seven as $label)
            <x-ttn-labels :labels="$label"/>
        @endforeach
    </div>
    <h2 class="text-info">{{ $eight[0]['theme']['theme_name'] }}</h2>
    <div class="row">
        @foreach($eight as $label)
            <x-ttn-labels :labels="$label"/>
        @endforeach
    </div>
    <h2 class="text-info">{{ $nine[0]['theme']['theme_name'] }}</h2>
    <div class="row">
        @foreach($nine as $label)
            <x-ttn-labels :labels="$label"/>
        @endforeach
    </div>
    <h2 class="text-info">{{ $ten[0]['theme']['theme_name'] }}</h2>
    <div class="row">
        @foreach($ten as $label)
            <x-ttn-labels :labels="$label"/>
        @endforeach
    </div>
@endsection
