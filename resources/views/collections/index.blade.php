@extends('layouts.layout')
@foreach($pages['data'] as $page)
  @section('hero_image', $page['hero_image']['data']['url'])
  @section('hero_image_title', $page['hero_image_alt_text'])
  @section('description', $page['meta_description'])
  @section('keywords', $page['meta_keywords'])
@endforeach

@section('title','Our collections: an overview')

@section('collections')
<div class="container">
  <div class="row">
    @foreach($collections['data'] as $collection)
          <x-image-card
              :altTag="$collection['hero_image_alt_text']"
              :title="$collection['collection_name']"
              :image="$collection['hero_image']"
              :route="'collection'"
              :params="[$collection['collection_name']]"></x-image-card>
    @endforeach
  </div>
</div>
@endsection
