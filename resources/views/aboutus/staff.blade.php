@extends('layouts.layout')
@section('title','Staff profiles')
@section('hero_image',env('CONTENT_STORE') . 'baroque.jpg')
@section('hero_image_title', 'The baroque feasting table by Ivan Day in Feast and Fast')
@section('description', 'Profiles for Fitzwilliam Museum staff')
@section('keywords', 'research,active,museum, archaeology, classics,history,art')

@section('content')
<div class="row">
    @foreach($paginator->items()['data'] as $profile)
      <x-image-card
      :altTag="$profile['profile_image_alt_text']"
      :title="$profile['display_name']"
      :image="$profile['profile_image']"
      :route="'research-profile'"
      :params="[$profile['slug']]"
      />
    @endforeach
</div>
<div class="container mt-1 p-2 text-center">
  <nav aria-label="Page navigation" >
    {{ $paginator->appends(request()->except('page'))->links() }}
  </nav>
</div>
@endsection
