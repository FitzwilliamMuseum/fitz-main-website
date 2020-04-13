@extends('layouts/layout')
@foreach($themes['data'] as $project)
  @section('title', $project['title'])
  @if(isset($project['hero_image']['data']['full_url']))
  @section('hero_image', $project['hero_image']['data']['full_url'])
  @section('hero_image_title', $project['hero_image_alt_text'])
  @endif
  @section('content')
      <h2>{{ $project['title'] }}</h2>
      <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
        @markdown($project['theme_description'])
      </div>
  @endsection
@endforeach
