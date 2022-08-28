@extends('layouts.exhibitions')
@section('keywords', 'labels,viewpoints,true,nature')
@section('description', 'Viewpoints by experts to complement the True to Nature exhibits')
@section('hero_image', ('https://fitz-cms-images.s3.eu-west-2.amazonaws.com/johann-jakob-frey-cloud-study-3-_press-1000x450.jpg'))
@section('title', 'Viewpoints')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($viewpoints['data'] as $viewpoint)
                <x-ttn-viewpoints :viewpoint="$viewpoint"></x-ttn-viewpoints>
            @endforeach
        </div>
    </div>
@endsection
