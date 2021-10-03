@extends('layouts.layout')
@section('title','Online resources')
@section('hero_image',env('CONTENT_STORE'). 'baroque.jpg')
@section('hero_image_title', 'A Baroque feasting table by Ivan Day in feast and fast')
@section('description', 'An overview of Fitzwilliam legeacy digital resources')
@section('content')
  <div class="row">
    @foreach($resources['data'] as $project)
      <x-image-card :altTag="$project['hero_image_alt_text'] " :title="$project['title']"  :image="$project['hero_image']" :route="'resource'" :params="[$project['slug']]" />
    @endforeach
  </div>
@endsection
