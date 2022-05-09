@extends('layouts.layout')
@section('title', 'In my mind\'s eye')
@section('hero_image', env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('description', 'In my mind\'s eye a new podcast series')
@section('content')
<div class="row">
  @foreach($mindseyes['data'] as $podcast)
    <x-image-card
        :altTag="$podcast['hero_image_alt_text']"
        :title="$podcast['title']"
        :image="$podcast['hero_image']"
        :route="'mindeyes.story'"
        :params="[$podcast['slug']]">
    </x-image-card>
  @endforeach
</div>
@endsection
