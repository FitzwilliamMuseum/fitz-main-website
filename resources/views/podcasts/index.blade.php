@extends('layouts.layout')
@section('title', 'Fitzwilliam Museum podcasts')
@section('description', 'A listing of all Fitzwilliam Museum Podcasts')
@section('hero_image', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/cover-podcasts.jpg')
@section('content')
  <div class="row">
    @include('includes.elements.imme-podcast')
    @foreach($podcasts['data'] as $podcast)
      <x-image-card
          :altTag="$podcast['hero_image_alt_tag']"
          :title="$podcast['title']"
          :image="$podcast['cover_image']"
          :route="'podcasts.series'"
          :params="[$podcast['slug']]">
      </x-image-card>
    @endforeach
  </div>
@endsection
