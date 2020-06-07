@extends('layouts/layout')
@section('title','Our Governance Documents')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/millais_bridesmaid.jpg')
@section('hero_image_title','Millais\'s Bridesmaid')
@section('description', 'A list of governance files for the Fitzwilliam Museum')
@section('keywords', 'fitzwilliam,museum,governance,pdf')
@section('content')
<div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
  <ul>
    @foreach($gov['data'] as $document)
    <li>
      <a href="{{ $document['file']['data']['full_url'] }}">{{ $document['title'] }}</a>
      {{ $document['type'] }} - @humansize($document['file']['filesize'])
    </li>
    @endforeach
  </ul>
</div>
@endsection
