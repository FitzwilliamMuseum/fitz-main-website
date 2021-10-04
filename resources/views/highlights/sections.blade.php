@extends('layouts.layout')
@section('title','Collection Context: ' . str_replace('-',' ',$pharos['data'][0]['section']))
@section('description', 'A collection of objects from the collection of the Fitzwilliam Museum')
@section('keywords', 'museum,highlights,collection,objects')
@section('hero_image',env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")

@section('content')
<div class="row">
  @foreach($pharos['data'] as $record)
    <x-image-card
    :image="$record['hero_image']"
    :route="'context-section-detail'"
    :title="$record['title']"
    :altTag="$record['hero_image_alt_text']"
    :params="[$record['section'],$record['slug']]"
    />
  @endforeach
</div>
@endsection
