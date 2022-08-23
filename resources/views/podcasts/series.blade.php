@extends('layouts.layout')
@if(!empty($ids))
    @section('title', $ids['title'])
    @section('hero_image', $ids['hero_image']['data']['url'] )
    @section('hero_image_title', $ids['hero_image_alt_tag'])
@else
    @section('hero_image', 'https://content.fitz.ms/fitz-website/assets/SpringtimeWEB.jpg?key=directus-large-crop')
    @section('hero_image_title', 'Springtime by Claude Monet')
@endif
@section('description', $ids['title'])
@section('content')
    @isset($ids['description'])
        <div class="shadow-sm p-3 mb-2">
            @markdown($ids['description'])
        </div>
    @endisset
    @if($ids['youtube_id'])
        <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
            <div class="ratio ratio-16x9">
                <iframe title="A YouTube video related to this podcast series"
                        src="https://www.youtube.com/embed/{{$ids['youtube_id']}}"
                        allowfullscreen></iframe>
            </div>
        </div>
    @endif
    @if(!empty($podcasts))
        <h3>
            Episodes
        </h3>
        <div class="row">
            @foreach($podcasts as $podcast)
                <x-image-card
                    :altTag="$podcast['hero_image_alt_tag'] "
                    :title="$podcast['title']"
                    :image="$podcast['hero_image']"
                    :route="'podcasts.episode'"
                    :params="[$podcast['slug']]"></x-image-card>
            @endforeach
        </div>
    @endif

@endsection

@if(!empty($ids['partners']))
    @section('research-funders')
        <div class="container">
            <h3>Partners</h3>
            <div class="row">
                @foreach($ids['partners'] as $partner)
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

@if(!empty($ids['presenters']))
    @section('presenters')
        <div class="container">
            <h3>Presenters</h3>
            <div class="row">
                @foreach($ids['presenters'] as $presenter)
                    <x-image-card
                        :altTag="$presenter['associated_people_id']['display_name']"
                        :title="$presenter['associated_people_id']['display_name']"
                        :image="$presenter['associated_people_id']['profile_image']"
                        :route="'podcast.presenter'"
                        :params="[$presenter['associated_people_id']['slug']]"></x-image-card>
                @endforeach
            </div>
        </div>
    @endsection
@endif

@if(!empty($suggest))
    @section('mlt')
        <div class="container">
            <h3>Other podcast series you might like</h3>
            <div class="row">
                @foreach($suggest as $record)
                    <x-solr-card :result="$record"></x-solr-card>
                @endforeach
            </div>
        </div>
    @endsection
@endif
