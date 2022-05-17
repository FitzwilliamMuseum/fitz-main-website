@extends('layouts.exhibitions')
@section('keywords', 'labels,cases')
@section('hero_image', ('https://fitz-cms-images.s3.eu-west-2.amazonaws.com/johann-jakob-frey-cloud-study-3-_press-1000x450.jpg'))
@section('title', 'The labels - True To Nature. Open-air Painting 1780-1870')
@section('description', 'Explore the labels from the True To Nature Exhibition')
@section('content')
    <a href="{{ route('exhibition.ttn.mapped') }}" class="btn btn-info d-block my-3 p-2">View a map of locations depicted in these images</a>
    <h2 class="text-info">{{ $sectionOne[0]['theme']['theme_name'] }}</h2>
    <div class="row">
        @foreach($sectionOne as $label)
            <x-ttn-labels :labels="$label"></x-ttn-labels>
        @endforeach
    </div>
    <h2 class="text-info">{{ $sectionTwo[0]['theme']['theme_name'] }}</h2>
    <div class="row">
        @foreach($sectionTwo as $label)
            <x-ttn-labels :labels="$label"></x-ttn-labels>
        @endforeach
    </div>
    <h2 class="text-info">{{ $sectionThree[0]['theme']['theme_name'] }}</h2>
    <div class="row">
        @foreach($sectionThree as $label)
            <x-ttn-labels :labels="$label"></x-ttn-labels>
        @endforeach
    </div>
    <h2 class="text-info">{{ $sectionFour[0]['theme']['theme_name'] }}</h2>
    <div class="row">
        @foreach($sectionFour as $label)
            <x-ttn-labels :labels="$label"></x-ttn-labels>
        @endforeach
    </div>

    <h2 class="text-info">{{ $sectionFive[0]['theme']['theme_name'] }}</h2>
    <div class="row">
        @foreach($sectionFive as $label)
            <x-ttn-labels :labels="$label"></x-ttn-labels>
        @endforeach
    </div>
    <h2 class="text-info">{{ $sectionSix[0]['theme']['theme_name'] }}</h2>
    <div class="row">
        @foreach($sectionSix as $label)
            <x-ttn-labels :labels="$label"></x-ttn-labels>
        @endforeach
    </div>
    <h2 class="text-info">{{ $sectionSeven[0]['theme']['theme_name'] }}</h2>
    <div class="row">
        @foreach($sectionSeven as $label)
            <x-ttn-labels :labels="$label"></x-ttn-labels>
        @endforeach
    </div>
    <h2 class="text-info">{{ $sectionEight[0]['theme']['theme_name'] }}</h2>
    <div class="row">
        @foreach($sectionEight as $label)
            <x-ttn-labels :labels="$label"></x-ttn-labels>
        @endforeach
    </div>
    <h2 class="text-info">{{ $sectionNine[0]['theme']['theme_name'] }}</h2>
    <div class="row">
        @foreach($sectionNine as $label)
            <x-ttn-labels :labels="$label"></x-ttn-labels>
        @endforeach
    </div>
    <h2 class="text-info">{{ $sectionTen[0]['theme']['theme_name'] }}</h2>
    <div class="row">
        @foreach($sectionTen as $label)
            <x-ttn-labels :labels="$label"></x-ttn-labels>
        @endforeach
    </div>
@endsection
