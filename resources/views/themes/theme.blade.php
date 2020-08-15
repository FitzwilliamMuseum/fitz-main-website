@extends('layouts/layout')
@foreach($themes['data'] as $page)
  @section('title', $page['title'])
  @section('description', $page['meta_description'])
  @section('keywords', $page['meta_keywords'])
  @if(isset($page['hero_image']['data']['full_url']))
    @section('hero_image', $page['hero_image']['data']['full_url'])
    @section('hero_image_title', $page['hero_image_alt_text'])
  @endif
  @section('content')
      <h2>{{ $page['title'] }}</h2>
      <div class="col-12 shadow-sm p-3 mx-auto mb-3">
        @markdown($page['theme_description'])
      </div>
  @endsection
@endforeach
