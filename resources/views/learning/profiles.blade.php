@extends('layouts.layout')
@section('title','Contact our Learning team')
@section('hero_image', env('CONTENT_STORE') . 'baroque.jpg')
@section('hero_image_title', 'The baroque feasting table by Ivan Day in Feast and Fast')
@section('description', 'A page detailing our Learning team')
@section('keywords', 'research,active,museum, archaeology, classics,history,art')
@section('content')
  <div class="row">
    @foreach($profiles['data'] as $profile)
      <x-learning-profile-card :profile="$profile"></x-learning-profile-card>
    @endforeach
  </div>
@endsection
