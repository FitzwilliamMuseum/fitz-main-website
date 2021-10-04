@extends('layouts.layout')
@section('content')
@foreach($period['data'] as $detail)
  @section('title')
   @markdown($detail['title'])
  @endsection
  @if(array_key_exists('meta_description', $detail))
    @section('description', $detail['meta_description'])
  @endif
  @if(array_key_exists('meta_keywords', $detail))
    @section('keywords', $detail['meta_keywords'])
  @endif
  @section('hero_image',$detail['hero_image']['data']['url'])
  @section('hero_image_title', $detail['hero_image_alt_text'])
@endforeach

<div class="col-md-12 shadow-sm p-3 mb-3">
  {!! $detail['introductory_text'] !!}
</div>

  <div class="row">
    @foreach($pharos['data'] as $record)
      <x-image-card
      :image="$record['image']"
      :title="$record['title']"
      :altTag="$record['image_alt_text']"
      :route="'highlight'"
      :params="[$record['slug']]"
      />
    @endforeach
  </div>
@endsection
