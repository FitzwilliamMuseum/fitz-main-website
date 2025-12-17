@extends('layouts.layout')

@section('title','Search our site')
@section('hero_image', env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('meta_description', 'An introductory page to the Museum\'s collection')
@section('meta_keywords', 'collection,museum,objects, art works')

@section('content')
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">

    @if ($enabled)

    {{ html()->form('get', url('search/results'))->open() }}
    <div class="row center-block">
        <div class="col-lg-6 center-block searchform">
            <div class="input-group mr-3">
                {{ html()->text('query')->id('query')->class('form-control mr-4')->placeholder('Search our site')->required()->value(old('query')) }}
                <span class="input-group-btn">
                    {{ html()->button('Search...')->class('btn btn-dark')->type('submit') }}
                </span>
            </div>
        </div>
    </div>
    @if($errors->any())
        <div class="form-group">
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
{{ html()->form()->close() }}

    @else

    Search is not supported by this website

    @endif
</div>
@endsection