@extends('layouts.layout')
@foreach($pages['data'] as $page)
@section('title', $page['title'])
@section('hero_image', $page['hero_image']['data']['full_url'])
@section('hero_image_title', $page['hero_image_alt_text'])

@section('content')
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
  @markdown($page['body'])
  </div>
@endsection
@endforeach
