@extends('layouts.layout')
@section('title', 'Our Galleries')
@section('description', 'A page documenting the galleries of the Fitzwilliam Museum')
@section('keywords', 'gallery,description,360,3d,models')
@foreach($pages['data'] as $page)
  @section('hero_image', $page['hero_image']['data']['url'])
  @section('hero_image_title', $page['hero_image_alt_text'])
@endforeach
@section('themes')
<div class="container">
  <div class="row">
    @foreach($galleries['data'] as $gallery)
      <x-gallery-card
      :status="$gallery['gallery_status']"
      :image="$gallery['hero_image']"
      :altTag="$gallery['gallery_name']"
      :route="'gallery'"
      :title="$gallery['gallery_name']"
      :params="[$gallery['slug']]"
      />
    @endforeach
  </div>
</div>
@endsection
