@extends('layouts/layout')
@section('title','Our Governance Documents')
@section('hero_image', env('CONTENT_STORE') . 'millais_bridesmaid.jpg')
@section('hero_image_title','Millais\'s Bridesmaid')
@section('description', 'A list of governance files for the Fitzwilliam Museum')
@section('keywords', 'fitzwilliam,museum,governance,pdf')
@section('content')

  <h2>Mission</h2>
  <div class="row">
    @foreach($mission['data'] as $document)
    <x-governance-card
    :file="$document['file']"
    :type="$document['type']"
    :image="$document['hero_image']"
    :altTag="$document['hero_image_alt_text']"
    :title="$document['title']"
    />
    @endforeach
  </div>

<h2>Policies</h2>
<div class="row">
  @foreach($policy['data'] as $document)
  <x-governance-card
  :file="$document['file']"
  :type="$document['type']"
  :image="$document['hero_image']"
  :altTag="$document['hero_image_alt_text']"
  :title="$document['title']"
  />
  @endforeach
</div>

<h2>Strategies</h2>
<div class="row">
  @foreach($strategy['data'] as $document)
  <x-governance-card
  :file="$document['file']"
  :type="$document['type']"
  :image="$document['hero_image']"
  :altTag="$document['hero_image_alt_text']"
  :title="$document['title']"
  />
  @endforeach
</div>

<h2>Reviews</h2>
<div class="row">
  @foreach($review['data'] as $document)
  <x-governance-card
  :file="$document['file']"
  :type="$document['type']"
  :image="$document['hero_image']"
  :altTag="$document['hero_image_alt_text']"
  :title="$document['title']"
  />
  @endforeach
</div>

<h2>Reports</h2>
<div class="row">
  @foreach($report['data'] as $document)
  <x-governance-card
  :file="$document['file']"
  :type="$document['type']"
  :image="$document['hero_image']"
  :altTag="$document['hero_image_alt_text']"
  :title="$document['title']"
  />
  @endforeach
</div>
<h2>Research policies and strategy</h2>
<div class="row">
  @foreach($research['data'] as $document)
  <x-governance-card
  :file="$document['file']"
  :type="$document['type']"
  :image="$document['hero_image']"
  :altTag="$document['hero_image_alt_text']"
  :title="$document['title']"
  />
  @endforeach
</div>
<h2>Education Reports</h2>
<div class="row">
  @foreach($education['data'] as $document)
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
