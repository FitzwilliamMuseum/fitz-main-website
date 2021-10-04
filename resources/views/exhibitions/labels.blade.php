@extends('layouts.exhibitions')
@section('keywords', 'labels,cases')
@section('description', 'Labels for the Odundo show ' . $title)
@section('title', 'Labels for ' . $title)
@section('hero_image', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/2019-8034.15_odundo-pot_2.jpg')
@section('hero_image_title', '2019,8034.15 Odundo Pot 2')

@section('exhibitionlabels')
<div class="container-fluid py-3">
  <div class="container">
    <div class="row">
    @foreach($labels['data'] as $label)
      <x-image-card
      :image="$label['hero_image']"
      :altTag="$label['hero_image_alt_title']"
      :route="'exhibition.label'"
      :params="[$label['slug']]"
      :title="$label['title']"
      />
    @endforeach
    </div>
  </div>
</div>
@endsection
