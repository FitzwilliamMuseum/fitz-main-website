@extends('layouts.layout')
@foreach($profiles['data'] as $profile)
  @section('description', 'A presenter profile for ' . $profile['display_name'])
  @section('title', $profile['display_name'])

    @section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/baroque.jpg')
    @section('hero_image_title', 'The baroque feasting table by Ivan Day in Feast and Fast')

  @section('content')
    @if(!is_null($profile['profile_image']))
    <div class="text-center">
        <a href="{{ route('podcast.presenter', $profile['slug']) }}"><img class="img-fluid mb-3" src="{{ $profile['profile_image']['data']['url']}}"
      alt="Profile image for {{ $profile['display_name'] }}"
      width="100%"
      loading="lazy"/></a>
    </div>
    @endif
    @if(!empty(['biography']))
      <div class="bg-white p-3">
        @markdown($profile['biography'])
      </div>
    @endif
  @endsection
  @if(!empty($profile['associated_institution']))
    @section('research-funders')
      <div class="container">
        <h3>Associated institutions</h3>
        <div class="row">
          @foreach($profile['associated_institution'] as $partner)
            <x-partner-card
            :altTag="$partner['partner_organisations_id']['partner_full_name']"
            :title="$partner['partner_organisations_id']['partner_full_name']"
            :image="$partner['partner_organisations_id']['partner_logo']"
            :url="$partner['partner_organisations_id']['partner_url']"></x-partner-card>
          @endforeach
        </div>
      </div>
    @endsection
  @endif
@endforeach
