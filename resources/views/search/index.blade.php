@extends('layouts.layout')
@section('title','Search results')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")

@section('content')
<h2>Search results</h2>
<div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">




        {{ \Form::open(['url' => url('search/results'),'method' => 'GET']) }}
        <div class="row center-block">
            <div class="col-lg-6 center-block searchform">
                <div class="input-group">
                    <input type="text" id="query" name="query" value="" class="form-control"
                           placeholder="Search archive" required value="{{ old('query') }}">
                       <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Search the archive</button>
                       </span>
                </div>
            </div>
        </div>

        @if(count($errors))
            <div class="form-group">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        {!! Form::close() !!}

</div>

@endsection
