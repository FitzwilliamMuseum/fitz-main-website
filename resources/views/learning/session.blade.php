@extends('layouts/layout')
@foreach($session['data'] as $page)
  @section('title', $page['title'])
  @section('hero_image', $page['hero_image']['data']['full_url'])
  @section('hero_image_title', $page['hero_image_alt_text'])
  @section('description', $page['meta_description'])
  @section('keywords', $page['meta_keywords'])
    @section('content')
    <h3>Session Description</h3>
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
    @markdown($page['description'])
    </div>
    <h3>Format of the session</h3>
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
    @markdown($page['format_session'])
    </div>
    @endsection
@endforeach
