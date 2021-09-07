@extends('layouts/layout')
@foreach($week['data'] as $record)
  @section('description', $record['meta_description'])
  @section('title')
    @php
      $title = $record['title'];
    @endphp
    {{ strip_tags($title) }}
  @endsection
  @section('hero_image', $record['hero_image']['data']['url'])
  @section('hero_image_title', $record['hero_image_alt_text'])
  @section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3">
      {!! $record['body'] !!}
    </div>
  @endsection
@endforeach
