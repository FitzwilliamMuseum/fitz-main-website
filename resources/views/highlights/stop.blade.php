@extends('layouts.layout')

@foreach($stop['data'] as $record)
    @section('keywords', $record['meta_keywords'])
@section('description', $record['meta_description'])
@section('title', 'Audio guide: ' . $record['title'])
@section('hero_image', $record['hero_image']['data']['url'])
@section('hero_image_title', $record['hero_image_alt_text'])
@section('content')
    <h2>Audio guide stop: {{ $record['stop_number'] }}</h2>

    <div class="col-12 shadow-sm p-3 mx-auto mb-3">
        <div class="shadow-sm p-3 mx-auto mb-3">
            <div class="plyr">
                <div class="audio-player">
                    <audio id="player" controls>
                        <source src="{{ $record['associated_audio_file'][0]['directus_files_id']['data']['full_url'] }}"
                                type="audio/aac">
                    </audio>
                </div>
            </div>
        </div>

    </div>

    <h3>Crowdsourced transcription of the audio file</h3>
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 article">
        <figure class="figure float-right p-3">
            <img src="{{ $record['hero_image']['data']['thumbnails']['7']['url']}}"
                 alt="{{ $record['hero_image_alt_text'] }}" class="img-fluid"
                 loading="lazy"
                 height="{{ $record['hero_image']['data']['thumbnails']['7']['height'] }}"
                 width="{{ $record['hero_image']['data']['thumbnails']['7']['width'] }}"
            />
            <figcaption class="figure-caption text-right">{{$record['hero_image_alt_text']}}</figcaption>
            <span class="btn btn-dark m-1 p-2 share">
        <a href="{{$record['hero_image']['data']['full_url']  }}"
           download><i class="fas fa-download mr-2"></i>  Download image</a>
      </span>
            <span class="btn btn-dark p-2">
      <a rel="license" href="https://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Creative Commons Licence"
                                                                                      src="https://i.creativecommons.org/l/by-nc-sa/4.0/80x15.png"/></a>
      </span>
        </figure>
        @markdown($record['transcription'])
    </div>
    <h3>Co-production of this resource</h3>
    <div class="col-12 shadow-sm p-3 mx-auto mb-3">
        <img src="https://content.fitz.ms/fitz-website/assets/MP_SQUARE_notype.png?key=directus-medium-crop"
             class="float-end img-fluid p-2" alt="The MicroPasts logo" width="100" height="100"/>
        <p>
            The transcription of the audio file for this stop was enabled by the AHRC
            funded crowd-sourcing platform <a href="https://crowdsourced.micropasts.org">MicroPasts</a>.
            The below generously gave their time to transcribe the
            file.
        </p>
        @markdown($record['transcribers'])
    </div>
@endsection

@if(!empty($record['associated_pharos_object']))
@section('pharos-pages')
    <div class="container">
        <h3>Associated highlight record</h3>
        <div class="row">
            @foreach($record['associated_pharos_object'] as $pharosassoc)
                <x-image-card
                    :image="$pharosassoc['pharos_id']['image']"
                    :altTag="$pharosassoc['pharos_id']['image_alt_text']"
                    :params="[$pharosassoc['pharos_id']['slug']]"
                    :route="'highlight'"
                    :title="$pharosassoc['pharos_id']['title']"></x-image-card>
            @endforeach
        </div>
    </div>
@endsection
@endif

@if(!empty($records))
@section('mlt')
    <div class="container">
        <h3>Other audio guide stops you might like</h3>
        <div class="row">
            @foreach($records as $record)
                <x-solr-card :result="$record"></x-solr-card>
            @endforeach
        </div>
    </div>
@endsection
@endif
@endforeach
