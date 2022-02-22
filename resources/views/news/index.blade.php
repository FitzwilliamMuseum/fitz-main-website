@extends('layouts.layout')
@section('title','News stories')
@section('hero_image', env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('description', 'News stories from the Fitzwilliam Museum, Cambridge University')
@section('keywords', 'news,stories,museum,cambridge')
@section('content')
  <div class="row">
    @foreach($news['data'] as $news)
      <x-image-card
          :altTag="$news['field_image_alt_text']"
          :title="$news['article_title']"
          :image="$news['field_image']"
          :route="'article'"
          :params="[$news['slug']]"></x-image-card>
    @endforeach
  </div>
  <div class="container mt-1 p-2 text-center">
    <nav aria-label="Page navigation" >
      {{ $paginator->appends(request()->except('page'))->links() }}
    </nav>
  </div>
@endsection
