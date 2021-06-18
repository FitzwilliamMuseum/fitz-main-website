@extends('layouts.layout')

@section('title','Search our site')
@section('hero_image', env('CONTENT_STORE') . 'img_20190105_153947.jpg' . '?key=banner')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('meta_description', 'An introductory page to the Museum\'s collection')
@section('meta_keywords', 'collection,museum,objects, art works')

@section('content')
<div class="col-12 shadow-sm p-3 mx-auto mb-3">
  {{ \Form::open(['url' => url('search/results'),'method' => 'GET']) }}
  <div class="row center-block">
    <div class="col-lg-6 center-block searchform">
      <div class="input-group mr-3">
        <input type="text" id="query" name="query" value="" class="form-control mr-4"
        placeholder="Search our site" required value="{{ old('query') }}">
        <span class="input-group-btn">
          <button class="btn btn-dark" type="submit">Search...</button>
        </span>
      </div>
    </div>
  </div>
  @if(count($errors))
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
  {!! Form::close() !!}
</div>
@endsection
