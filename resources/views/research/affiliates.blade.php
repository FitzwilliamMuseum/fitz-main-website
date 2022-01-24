@extends('layouts.layout')
@section('title','Affiliated researchers')
@section('hero_image',env('CONTENT_STORE') . 'baroque.jpg')
@section('hero_image_title', 'The baroque feasting table by Ivan Day in Feast and Fast')
@section('description', 'The Fitzwilliam Museum affiliate researchers')
@section('keywords', 'research,active,museum, archaeology, classics,history,art')

@section('content')
  @if(!empty($profiles['data']))
  <div class="alert alert-info text-dark p-3 my-2">Fitzwilliam Museum Affiliated Researchers are specialists who are actively undertaking research on projects or other initiatives that are closely linked with the Museum’s research and collections.</div>
  <div class="row">
      @foreach($profiles['data'] as $profile)
        <x-image-card
        :altTag="$profile['profile_image_alt_text']"
        :title="$profile['display_name']"
        :image="$profile['profile_image']"
        :route="'research-affilate'"
        :params="[$profile['slug']]"
        />
      @endforeach
  </div>
  @else
    <p>No affiliate profiles found</p>
  @endif
@endsection
