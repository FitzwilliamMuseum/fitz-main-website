@extends('layouts.layout')
@foreach($external['data'] as $profile)
    @section('description', 'A curatorial or expert profile for ' . $profile['display_name'])
@section('title', $profile['display_name'])


@if(!is_null($profile['banner_image']))
    @section('hero_image',$profile['banner_image']['data']['url'])
    @section('hero_image_title', '')
@else
    @section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/baroque.jpg')
    @section('hero_image_title', 'The baroque feasting table by Ivan Day in Feast and Fast')
@endif

@section('content')
    @if(!is_null($profile['profile_image']))
        <div class="text-center">
            <img class="img-fluid mb-3"
                 src="{{ $profile['profile_image']['data']['url']}}"
                 alt="Profile image for {{ $profile['display_name'] }}"
                 width="100%"
                 loading="lazy"/>
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
        <h2>Associated institutions</h2>
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
@section('exhibitions-curated')
    <div class="container-fluid bg-pastel p-3">
        <div class="container">
            <h2>
                Associated Exhibitions
            </h2>
            <div class="row">
                @foreach($exhibitions as $exhibition)
                    <x-image-card
                        :altTag="$exhibition['exhibitions_id']['hero_image_alt_text']"
                        :title="$exhibition['exhibitions_id']['exhibition_title']"
                        :image="$exhibition['exhibitions_id']['hero_image']"
                        :route="'exhibition'"
                        :params="[$exhibition['exhibitions_id']['slug']]"></x-image-card>
                @endforeach
            </div>
        </div>
    </div>
@endsection
