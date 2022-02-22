@extends('layouts.home')
@section('hero_image',$settings['hero_image']['data']['full_url'])
@section('hero_image_title', $settings['hero_image_alt_text'])
@section('parallax_home', $settings['parallax_one']['data']['full_url'])
@section('parallax_two', $settings['parallax_two']['data']['full_url'])
@section('description', $settings['meta_description'])
@section('keywords', 'fitzwilliam, museum, cambridge, university, art, design, archaeology')
@section('title', $settings['title'])


@section('news')
  @foreach($news['data'] as $news)
    <x-image-card
    :altTag="$news['field_image_alt_text']"
    :title="$news['article_title']"
    :image="$news['field_image']"
    :route="'article'"
    :params="[$news['slug']]"></x-image-card>
    @endforeach
  @endsection

  @section('fundraising')
    <div class="container mt-3">
      <h3><a href="{{ route('landing', 'support-us') }}">Donate, become a member or support us</a></h3>
      <div class="row">
        @foreach($fundraising['data'] as $donate)
          <x-partner-card
          :altTag="$donate['hero_image_alt_text']"
          :title="$donate['title']"
          :subtitle="$donate['sub_title']"
          :image="$donate['hero_image']"
          :url="$donate['url']"></x-partner-card>
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
        :params="[$project['slug']]"></x-image-card>
        @endforeach
      @endsection

      @section('themes')
        @foreach($objects['data'] as $theme)
          <x-image-card
          :altTag="$theme['image_alt_text']"
          :title="$theme['title']"
          :image="$theme['image']"
          :route="'highlight'"
          :params="[$theme['slug']]"></x-image-card>
          @endforeach
        @endsection

        @if(!empty($shopify))
          @section('shopify')
            <div class="container">
              <h3 class="mt-3"><a href="https://curatingcambridge.co.uk/collections/the-fitzwilliam-museum">Gifts from Curating Cambridge</a></h3>
              <div class="row">
                @foreach($shopify as $record)
                  <x-shopify-card :result="$record"></x-shopify-card>
                @endforeach
              </div>
            </div>
          @endsection
        @endif
