@extends('layouts.layout')
@if(!is_null($ids['data']))
  @section('title', $ids['data'][0]['title'])
  @section('hero_image', $ids['data'][0]['hero_image']['data']['url'] )
  @section('hero_image_title', $ids['data'][0]['hero_image_alt_tag'])
@else
  @section('hero_image', 'https://content.fitz.ms/fitz-website/assets/SpringtimeWEB.jpg?key=directus-large-crop')
  @section('hero_image_title', 'Springtime by Claude Monet')
@endif
@section('description', 'Fitzwilliam Museum Podcasts - an archive')
@section('content')
  @isset($ids['data'][0]['description'])
  <div class="shadow-sm p-3 mb-2">
    @markdown($ids['data'][0]['description'])
  </div>
  @endisset
  <div class="row">
    @if(!empty($podcasts['data']))
    @foreach($podcasts['data'] as $podcast)
      <x-image-card :altTag="$podcast['hero_image_alt_tag'] " :title="$podcast['title']"  :image="$podcast['hero_image']" :route="'podcasts.episode'" :params="[$podcast['slug']]" />
      @endforeach
    @endif
    </div>
  @endsection

  @if(!empty($ids['data'][0]['partners']))
    @section('research-funders')
      <div class="container">
        <h4 class="lead">Partners</h4>
        <div class="row">
          @foreach($ids['data'][0]['partners'] as $partner)
            <x-partner-card
            :altTag="$partner['partner_organisations_id']['partner_full_name']"
            :title="$partner['partner_organisations_id']['partner_full_name']"
            :image="$partner['partner_organisations_id']['partner_logo']"
            :url="$partner['partner_organisations_id']['partner_url']"
            />
            @endforeach
          </div>
        </div>
      @endsection
    @endif
