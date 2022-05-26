@extends('layouts.layout')
@section('title','Research projects')
@section('hero_image',env('CONTENT_STORE') . 'baroque.jpg')
@section('hero_image_title', 'A Baroque feasting table by Ivan Day in feast and fast')
@section('description', 'An overview of Fitzwilliam Museum research projects')
@section('content')
  <div class="row">
    @foreach($projects->items()['data'] as $project)
      <x-image-card
          :altTag="$project['hero_image_alt_text']"
          :title="$project['title']"
          :image="$project['hero_image']"
          :route="'research-project'"
          :params="[$project['slug']]"></x-image-card>
    @endforeach
  </div>
  {{ $projects->appends(request()->except('page'))->links() }}
@endsection
