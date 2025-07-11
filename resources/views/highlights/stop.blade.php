@extends('layouts.layout')
@section('keywords', $stop['meta_keywords'])
@section('description', $stop['meta_description'])
@section('title', 'Audio guide: ' . $stop['title'])
@section('hero_image', $stop['hero_image']['data']['url'])
@section('hero_image_title', $stop['hero_image_alt_text'])
@section('content')
<h2>
    Audio guide stop: {{ $stop['stop_number'] }}
</h2>

<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">
    <div class="shadow-sm p-3 mx-auto mb-3">
        <div class="plyr">
            <div class="audio-player">
                <audio id="player" controls>
                    <source src="{{ $stop['associated_audio_file'][0]['directus_files_id']['data']['full_url'] }}"
                        type="audio/aac">
                </audio>
            </div>
        </div>
    </div>

</div>

<h2>
    Crowdsourced transcription of the audio file
</h2>
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 article">
    <figure class="figure float-right p-3">
        <img src="{{ $stop['hero_image']['data']['thumbnails']['7']['url']}}" alt=""
            class="img-fluid" loading="lazy" height="{{ $stop['hero_image']['data']['thumbnails']['7']['height'] }}"
            width="{{ $stop['hero_image']['data']['thumbnails']['7']['width'] }}" />
        <figcaption class="figure-caption text-right">{{$stop['hero_image_alt_text']}}</figcaption>
        <a class="btn btn-dark m-1 p-2" href="{{$stop['hero_image']['data']['full_url']  }}" download><i
                class="fas fa-download mr-2"></i> Download image</a>
        <a class="btn btn-dark p-2" rel="license" href="https://creativecommons.org/licenses/by-nc-sa/4.0/">
            CC BY-NC-SA 4.0</a>
    </figure>
    @markdown($stop['transcription'])
</div>
<h2>Co-production of this resource</h2>
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">
    <img src="https://content.fitz.ms/fitz-website/assets/MP_SQUARE_notype.png?key=directus-medium-crop"
        class="float-end img-fluid p-2" alt="" width="100" height="100" />
    <p>
        The transcription of the audio file for this stop was enabled by the AHRC
        funded crowd-sourcing platform <a href="https://crowdsourced.micropasts.org">MicroPasts</a>.
        The below generously gave their time to transcribe the
        file.
    </p>
    @markdown($stop['transcribers'])
</div>
@endsection

@if(!empty($stop['associated_pharos_object']))
@section('pharos-pages')
<div class="container">
    <h2>Associated highlight record</h2>
    <div class="row">
        @foreach($stop['associated_pharos_object'] as $pharosassoc)
        <x-image-card :image="$pharosassoc['pharos_id']['image']" :altTag="$pharosassoc['pharos_id']['image_alt_text']"
            :params="[$pharosassoc['pharos_id']['slug']]" :route="'highlight'"
            :title="$pharosassoc['pharos_id']['title']"></x-image-card>
        @endforeach
    </div>
</div>
@endsection
@endif

@if(!empty($records))
@section('mlt')
<div class="container">
    <h2>Other audio guide stops you might like</h2>
    <div class="row">
        @foreach($records as $record)
        <x-solr-card :result="$record"></x-solr-card>
        @endforeach
    </div>
</div>
@endsection
@endif
