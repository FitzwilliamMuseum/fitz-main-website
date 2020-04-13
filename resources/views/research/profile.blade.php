@extends('layouts.layout')
@foreach($profiles['data'] as $profile)
@section('keywords', $profile['meta_keywords'])
@section('description', $profile['meta_description'])
@section('title', $profile['display_name'])
@if(!is_null($profile['hero_image']))
@section('hero_image', $profile['hero_image']['data']['full_url'])
@endif
  @section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
      {!! $profile['biography'] !!}
    </div>
  @endsection
@endforeach
