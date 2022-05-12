@extends('layouts.layout')

@foreach($pages['data'] as $page)
  @section('title', $page['title'])
  @section('hero_image', $page['hero_image']['data']['url'])
  @section('hero_image_title', $page['hero_image_alt_text'])
  @section('description', 'Educational resources from the Fitzwilliam Museum')
  @section('keywords', 'education,resources,do it yourself, museum, cambridge, egypt,rome, greece')
    @section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
    @markdown($page['body'])
    </div>
    @endsection
@endforeach

@section('resources-plans')
  <div class="container">
    <h2>Factsheets by topic</h2>
    <div class="row">
      @foreach($res['data'] as $resource)
        <x-image-card
        :image="$resource['hero_image']"
        :route="'learning-resource'"
        :params="[$resource['slug']]"
        :title="$resource['title']"
        :altTag="$resource['hero_image_alt_text']"></x-image-card>
      @endforeach
    </div>
  </div>
@endsection

@section('diy')
  <div class="container">
    <h2>DIY and Into Action</h2>
    <div class="row">
      @foreach($stages['data'] as $resource)
        <x-image-card
        :image="$resource['hero_image']"
        :route="'learning-resource'"
        :params="[$resource['slug']]"
        :title="$resource['title']"
        :altTag="$resource['hero_image_alt_text']"></x-image-card>
      @endforeach
    </div>
  </div>
@endsection
