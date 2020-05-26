@extends('layouts.layout')

@foreach($resources['data'] as $project)
  @section('keywords', $project['meta_keywords'])
  @section('description', $project['meta_description'])
  @section('title', $project['title'])
  @section('hero_image', $project['hero_image']['data']['full_url'])
  @section('hero_image_title', $project['hero_image_alt_text'])

  @section('content')
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
    @markdown($project['description'])
  </div>
  <h3>Project information</h3>
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">

    <ul>
      @if($project['project_url'])
      <li>Project website: <a href="{{ $project['project_url']}}">{{ $project['project_url']}}</a></li>
      @endif
    </ul>
  @endsection
@endforeach
