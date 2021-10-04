@extends('layouts.exhibitions')
@foreach($labels['data'] as $label)
@section('keywords', 'labels,cases')
@section('description', $label['hero_image_alt_title'])
@section('title', $label['title'])
@section('hero_image', $label['hero_image']['data']['url'])
@section('hero_image_title', $label['hero_image_alt_title'])

@section('exhibitionlabels')
<div class="container-fluid py-3">
    <div class="container">
    <div class="text-center py-3 bg-white">
      <img
      src="{{ $label['hero_image']['data']['url'] }}" class="img-fluid"
      alt="{{$label['hero_image_alt_title']}}"
      />
    </div>
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 article" >
    @markdown($label['description'])
    </div>
  </div>
</div>
@endsection
@endforeach
