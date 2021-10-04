@extends('layouts/layout')
@section('title','Our Governance Documents')
@section('hero_image', env('CONTENT_STORE') . 'millais_bridesmaid.jpg')
@section('hero_image_title','Millais\'s Bridesmaid')
@section('description', 'A list of governance files for the Fitzwilliam Museum')
@section('keywords', 'fitzwilliam,museum,governance,pdf')
@section('content')
  <div class="row">

    @foreach($gov['data'] as $document)
      <x-governance-card
      :file="$document['file']"
      :type="$document['type']"
      :image="$document['hero_image']"
      :altTag="$document['hero_image_alt_text']"
      :title="$document['title']"
      />
        @endforeach

      </div>
    @endsection
