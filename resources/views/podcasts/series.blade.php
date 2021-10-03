@extends('layouts.layout')
@if(!is_null($podcasts['data'][0]['podcast_series']))
  @section('hero_image', $podcasts['data'][0]['podcast_series'][0]['podcast_series_id']['hero_image']['data']['url'] )
  @section('hero_image_title', $podcasts['data'][0]['podcast_series'][0]['podcast_series_id']['hero_image_alt_tag'])
@else
  @section('hero_image', 'https://content.fitz.ms/fitz-website/assets/SpringtimeWEB.jpg?key=directus-large-crop')
  @section('hero_image_title', 'Springtime by Claude Monet')
@endif
@section('description', 'Fitzwilliam Museum Podcasts - an archive')
@section('content')
  <div class="row">
    @if(!empty($podcasts['data']))
    @foreach($podcasts['data'] as $podcast)
      @php
      $title = $podcast['podcast_series'][0]['podcast_series_id']['title'];
      @endphp
      @section('title', $title )
      <x-image-card :altTag="$podcast['hero_image_alt_tag'] " :title="$podcast['title']"  :image="$podcast['hero_image']" :route="'podcasts.episode'" :params="[$podcast['slug']]" />
      @endforeach
    @endif
    </div>
  @endsection
