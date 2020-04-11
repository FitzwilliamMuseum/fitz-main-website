@extends('layouts.layout')
@foreach($departments['data'] as $dept)
@section('keywords', $dept['meta_keywords'])
@section('description', $dept['meta_description'])
@section('title', $dept['title'])
@section('hero_image', $dept['hero_image']['data']['full_url'])

  @section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
      @markdown($dept['department_description'])
    </div>
  @endsection
@endforeach
