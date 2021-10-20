@extends('layouts.layout')
  @section('title', 'Presenters and guests on our podcasts')
  @section('hero_image', 'https://content.fitz.ms/fitz-website/assets/SpringtimeWEB.jpg?key=directus-large-crop')
  @section('hero_image_title', 'Springtime by Claude Monet')
  @section('description', 'Presenters and guests on our podcasts')
  @if(!empty($profiles['data']))
    @section('presenters')
      <div class="container">
        <div class="row">
          @foreach($profiles['data'] as $presenter)
            <x-image-card
            :altTag="$presenter['display_name']"
            :title="$presenter['display_name']"
            :image="$presenter['profile_image']"
            :route="'podcast.presenter'"
            :params="[$presenter['slug']]"
            />
          @endforeach
        </div>
      </div>
    @endsection
  @endif
