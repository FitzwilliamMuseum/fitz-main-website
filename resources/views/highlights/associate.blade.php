@extends('layouts.highlights')
@section('title', $pharos['title'])
@section('description', $pharos['meta_description'])
@section('keywords', $pharos['meta_keywords'])
@if(!empty($pharos['hero_image']))
    @section('hero_image', $pharos['hero_image']['data']['url'])
    @section('hero_image_title', $pharos['hero_image_alt_text'])
@else
    @section('hero_image',env('CONTENT_STORE') . 'img_20190105_153947.jpg')
    @section('hero_image_title', "The inside of our Founder's entrance")
@endif

@section('content')
    @if(!is_null($pharos['hero_image']))
        <div class="text-center">
            <figure class="figure ">
                <a href="{{ route('context-section-detail', [$pharos['section'] , $pharos['slug'] ]) }}">
                    <img class="img-fluid"
                         src="{{ $pharos['hero_image']['data']['url']}}"
                         alt="{{ $pharos['hero_image_alt_text'] }}"
                         loading="lazy"
                         width="{{ $pharos['hero_image']['width'] }}"
                         height="{{ $pharos['hero_image']['height'] }}"/>
                </a>
                <figcaption class="text-info figure-caption">
                    {{ $pharos['hero_image_alt_text'] }}
                </figcaption>
            </figure>
        </div>
    @endif
    <div class="col-12 shadow-sm p-3 mx-auto mb-3">
        @markdown($pharos['body'])
    </div>
@endsection

@if(!empty($highlights))
    @section('highlight')
        <div class="container">
            <h3>
                Other highlight objects you might like
            </h3>
            <div class="row">
                @foreach($highlights as $record)
                    <x-solr-card :result="$record"></x-solr-card>
                @endforeach
            </div>
        </div>

    @endsection
@endif

@if(!empty($records))
    @section('mlt')
        <div class="container">
            <h3>
                Other pathways and stories you might like
            </h3>
            <div class="row">
                @foreach($records as $record)
                    <x-solr-card :result="$record"></x-solr-card>
                @endforeach
            </div>
        </div>
    @endsection
@endif
