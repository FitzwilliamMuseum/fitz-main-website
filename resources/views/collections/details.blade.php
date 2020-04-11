@extends('layouts.layout')
@foreach($collection['data'] as $coll)
@section('keywords', $coll['meta_keywords'])
@section('description', $coll['meta_description'])
@section('title', $coll['collection_name'])
@section('hero_image', $coll['hero_image']['data']['full_url'])

@section('content')

  <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
    {!! $coll['collection_description'] !!}
  </div>




  <!-- Start assoicated department block -->
  @foreach($coll['associated_departments'] as $dept)
  <h3>Associated Department</h3>
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded intro-card">
    <h3><a href="/departments/titled/{{ $dept['departments_id']['slug'] }}">{{ $dept['departments_id']['title'] }}</a></h3>
  </div>
  @endforeach
  <!-- End  associated_departments block -->

  <!-- Start associated_galleries block -->
  @foreach($coll['associated_galleries'] as $gallery)
  <h3>Associated galleries</h3>
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded intro-card">
    <h3>{{ $gallery['galleries_id']['gallery_name'] }}</h3>
  </div>
  @endforeach
  <!-- End associated_galleriesb nlock -->

<?php
// dd($collection);
?>
@endsection
@endforeach
