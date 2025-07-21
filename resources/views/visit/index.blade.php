@extends('layouts.visitus')

@section('hero_image', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/visit-final-.png')
@section('title', 'Plan your visit')
@section('description', 'Visiting the Fitzwilliam Museum? What do you need to know?')
@section('keyword', 'cambridge,museums,visit')

@section('content')
    <div class="visit-us-landing">
        @include('support.components.components-repeater');
    </div>
@endsection
