@extends('layouts.home')

@section('hero_image','https://content.fitz.ms/fitz-website/assets/front.jpg')
@section('hero_image_title','The founder\'s building entrance ceiling')
@section('parallax_home', 'https://content.fitz.ms/fitz-website/assets/10.1.m.15_f7r_3_201811_amt49_mas.jpg')
@section('parallax_two', 'https://content.fitz.ms/fitz-website/assets/10.1.m.15_f7r_3_201811_amt49_mas.jpg')
@section('parallax_three', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/aramesh.jpg')
@section('parallax_four', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/e1a3159c12ca0f5091e3e9e5000ad4d0-landscape.jpg')
@section('parallax_three_lower', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/aramesh.jpg')
@section('description', 'Welcome to the Website for the Fitzwilliam Museum, the University of Cambridge\'s principal museum')
@section('keywords', 'fitzwilliam, museum, cambridge, university, art, design, archaeology')
@section('title', 'The Fitzwilliam Museum')


@section('news')
  @foreach($news['data'] as $news)
    <x-image-card
    :altTag="$news['field_image_alt_text']"
    :title="$news['article_title']"
    :image="$news['field_image']"
    :route="'article'"
    :params="[$news['slug']]"
    />
    @endforeach
  @endsection

  @section('fundraising')
    <div class="container mt-3">
      <h2 class="lead"><a href="{{ route('landing', 'support-us') }}">Donate, become a member or support us</a></h2>
      <div class="row">
        @foreach($fundraising['data'] as $donate)
          <x-partner-card
          :altTag="$donate['hero_image_alt_text']"
          :title="$donate['title']"
          :subtitle="$donate['sub_title']"
          :image="$donate['hero_image']"
          :url="$donate['url']"
          />
          @endforeach
        </div>
      </div>
    @endsection


    @section('research')
      @foreach($research['data'] as $project)
        <x-image-card
        :altTag="$project['hero_image_alt_text']"
        :title="$project['title']"
        :image="$project['hero_image']"
        :route="'research-project'"
        :params="[$project['slug']]"
        />

        @endforeach
      @endsection

      @section('themes')
        @foreach($objects['data'] as $theme)
          <x-image-card
          :altTag="$theme['image_alt_text']"
          :title="$theme['title']"
          :image="$theme['image']"
          :route="'highlight'"
          :params="[$theme['slug']]"
          />
          @endforeach
        @endsection

        @if(!empty($shopify))
          @section('shopify')
            <div class="container">
              <h2 class="mt-3 lead"><a href="https://curatingcambridge.co.uk/collections/the-fitzwilliam-museum">Gifts from Curating Cambridge</a></h2>
              <div class="row">
                @foreach($shopify as $record)
                  <x-shopify-card :result="$record" />
                @endforeach
              </div>
            </div>
          @endsection
        @endif
