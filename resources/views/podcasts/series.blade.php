@extends('layouts.layout')
@if(!is_null($ids['data']))
  @section('title', $ids['data'][0]['title'])
  @section('hero_image', $ids['data'][0]['hero_image']['data']['url'] )
  @section('hero_image_title', $ids['data'][0]['hero_image_alt_tag'])
@else
  @section('hero_image', 'https://content.fitz.ms/fitz-website/assets/SpringtimeWEB.jpg?key=directus-large-crop')
  @section('hero_image_title', 'Springtime by Claude Monet')
@endif
@section('description', $ids['data'][0]['title'])
@section('content')
  @isset($ids['data'][0]['description'])
  <div class="shadow-sm p-3 mb-2">
    @markdown($ids['data'][0]['description'])
  </div>
  @endisset
  @if($ids['data'][0]['youtube_id'])
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
    <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item" title="A YouTube video related to this podcast series"
      src="https://www.youtube.com/embed/{{$ids['data'][0]['youtube_id']}}" frameborder="0"
      allowfullscreen></iframe>
    </div>
  </div>
  @endif

  @if(!empty($podcasts['data']))
    <h4 class="lead">Episodes</h4>
    <div class="row">

      @foreach($podcasts['data'] as $podcast)
        <x-image-card
        :altTag="$podcast['hero_image_alt_tag'] "
        :title="$podcast['title']"
        :image="$podcast['hero_image']"
        :route="'podcasts.episode'"
        :params="[$podcast['slug']]"
        />
      @endforeach
    </div>
  @endif
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

  @if(!empty($ids['data'][0]['presenters']))
    @section('presenters')
      <div class="container">
        <h4 class="lead">Presenters</h4>
        <div class="row">
          @foreach($ids['data'][0]['presenters'] as $presenter)
            <x-image-card
            :altTag="$presenter['associated_people_id']['display_name']"
            :title="$presenter['associated_people_id']['display_name']"
            :image="$presenter['associated_people_id']['profile_image']"
            :route="'podcast.presenter'"
            :params="[$presenter['associated_people_id']['slug']]"
            />
          @endforeach
        </div>
      </div>
    @endsection
  @endif

  @if(!empty($suggest))
    @section('mlt')
      <div class="container">
        <h3 class="lead">Other podcast series you might like</h3>
        <div class="row">
          @foreach($suggest as $record)
            <div class="col-md-4 mb-3">
              <div class="card h-100">
                @if(!is_null($record['searchImage']))
                  <a href="{{ $record['url'][0] }}"><img class="card-img-top " src="{{ $record['searchImage'][0]}}"
                  alt="Highlight image for {{ $record['title'][0] }}" loading="lazy"/></a>
                @endif
                <div class="card-body ">
                  <div class="contents-label mb-3">
                    <h3 class="lead">
                      <a href="{{ $record['url'][0] }}" class="stretched-link">{{ $record['title'][0] }}</a>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @endsection
  @endif
