@extends('layouts.layout')
@foreach($podcasts['data'] as $podcast)
    @section('description', $podcast['meta_description'])
@section('title', $podcast['title'])
@isset($podcast['banner_image'])
    @section('hero_image', $podcast['banner_image']['data']['full_url'])
@section('hero_image_title', $podcast['title'])
@else
    @section('hero_image', $podcast['hero_image']['data']['full_url'])
@section('hero_image_title', $podcast['hero_image_alt_tag'])
@endisset
@section('content')
    <div class="row ">
        <!-- Column one -->
        <div class="col-md-7 mb-3">
            <div class=" shadow-sm p-3 mb-3 mt-3">
                <figure class="figure">
                    @isset($podcast['focus_object_image'])
                        <img src="{{ $podcast['focus_object_image']['data']['full_url'] }}"
                             class="img-fluid" alt="{{ $podcast['focus_object_image_alt_text'] }}"
                             loading="lazy"
                             width="{{ $podcast['focus_object_image']['width'] }}"
                             height="{{ $podcast['focus_object_image']['height'] }}"
                        />
                    @else
                        <img src="{{ $podcast['hero_image']['data']['full_url'] }}"
                             class="img-fluid" alt="{{ $podcast['title'] }}"
                             loading="lazy"
                             width="{{ $podcast['hero_image']['width'] }}"
                             height="{{ $podcast['hero_image']['height'] }}"
                        />
                    @endisset
                </figure>
            </div>
        </div>
        <!-- End of column one -->

        <!-- column two -->
        <div class="col-md-5 mt-3">
            <div class="col shadow-sm p-3 mx-auto mb-3">
                @markdown($podcast['description'])
            </div>

            @if(Carbon\Carbon::parse($podcast['publication_date'])->isPast())
                @isset($podcast['mp3_id'])
                    <div class="col shadow-sm p-3 mx-auto mb-3">
                        <div class="plyr">
                            <div class="ratio audio-player">
                                <audio id="player" controls >
                                    <source src="{{ $podcast['mp3_id'] }}" type="audio/mp3">
                                </audio>
                            </div>
                        </div>
                    </div>
                @endisset

                @isset($podcast['podcast_id'])
                    <div class="col shadow-sm p-3 mx-auto mb-3">
                        <div class="ratio libsyn">
                            @include('includes/social/libsyn')
                        </div>
                    </div>
                @endisset
            @endif

            @if(!empty($podcast['transcript']))
                <h3>
                    Podcast transcript
                </h3>
                <div class="shadow-sm p-3 mx-auto mb-3 mt-3 collections">
                    <p>
                        <em>
                            This transcript was generated using Amazon Speech Recognition;
                            there maybe errors in this text.
                        </em>
                    </p>
                    @php
                        $count = count($podcast['transcript']);
                        $start = array_slice($podcast['transcript'],0,1);
                        if($count > 2) {
                          $end = array_slice($podcast['transcript'],1, $count);
                        }
                    @endphp

                    @if($count > 12)
                        <a class="btn btn-dark mx-2 mb-2 collapsed" data-toggle="collapse" href="#transcript"
                           role="button" aria-expanded="false" aria-controls="transcript">
                            <span class="if-collapsed">Show full transcript</span>
                            <span class="if-not-collapsed">Hide full transcript</span>
                        </a>
                        <ol>
                            @foreach ($start as $transcript)
                                <li>
                                    {{ $transcript['start_time'] }} - {{ $transcript['end_time'] }}<br/>
                                    <span class="badge badge-secondary p-2">{{ $transcript['speaker'] }}</span>
                                    {{ $transcript['comment'] }}
                                </li>
                            @endforeach
                        </ol>
                        <hr/>
                        <div class="collapse" id="transcript">
                            <ol>
                                @foreach ($end as $transcript)
                                    <li>
                                        {{ $transcript['start_time'] }} - {{ $transcript['end_time'] }}<br/>
                                        <span class="badge badge-dark p-2">{{ $transcript['speaker'] }}</span>
                                        {{ $transcript['comment'] }}
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    @else
                        <ol>
                            @foreach ($podcast['transcript'] as $transcript)
                                <li>
                                    {{ $transcript['start_time'] }} - {{ $transcript['end_time'] }}:
                                    <strong>{{ $transcript['speaker'] }}</strong><br/>
                                    {{ $transcript['comment'] }}
                                </li>
                            @endforeach
                        </ol>
                    @endif

                </div>
            @endif
        </div>
        <!-- End of column two -->
    </div>
@endsection

@if(!empty($adlib))
@section('podcast-object')
    @foreach($adlib as $record)
        <div class="container-fluid py-3 bg-gdbo">
            <div class="container">
                <h3>
                    About the object
                </h3>
                <div class="shadow-sm p-3 mx-auto mb-3 mt-3 collections">

                    @include('includes/elements/descriptive')

                    @include('includes/elements/lifecycle')

                    @include('includes/elements/identification-insta')

                </div>
            </div>
        </div>
    @endforeach
@endsection
@endif

@if(!empty($podcast['presenters']))
@section('presenters')
    <div class="container">
        <h3>
            Presenters
        </h3>
        <div class="row">
            @foreach($podcast['presenters'] as $presenter)
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

@if(!empty($podcast['partners']))
@section('research-funders')
    <div class="container">
        <h3>
            Partners
        </h3>
        <div class="row">
            @foreach($podcast['partners'] as $partner)
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
@if(!empty($suggest))
@section('mlt')
    <div class="container">
        <h3>Other podcasts you might like</h3>
        <div class="row">
            @foreach($suggest as $record)
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        @if(!is_null($record['searchImage']))
                            <a href="{{ $record['url'][0] }}">
                                <img class="card-img-top "
                                     src="{{ $record['searchImage'][0]}}"
                                     alt="Highlight image for {{ $record['title'][0] }}"
                                     loading="lazy"/>
                            </a>
                        @endif
                        <div class="card-body ">
                            <div class="contents-label mb-3">
                                <h3>
                                    <a href="{{ $record['url'][0] }}"
                                       class="stretched-link">{{ $record['title'][0] }}</a>
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

@section('plyr-css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.5.6/plyr.css" rel="stylesheet" media="screen">
@endsection
@section('plyr-js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.5.10/plyr.min.js"></script>
    <script defer type="text/javascript" src="{{ asset("/js/plyr-controls.js") }}"></script>
@endsection
