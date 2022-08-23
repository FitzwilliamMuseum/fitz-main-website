@extends('layouts.layout')
@section('jsonld')
    @include('includes.jsonld.news')
@endsection

@section('title', $news['article_title'])
@section('description',$news['meta_description'])
@section('keywords',$news['meta_keywords'])

@if(!empty($news['field_image']))
    @section('hero_image', $news['field_image']['data']['url'])
    @section('hero_image_title', $news['field_image_alt_text'])
@else
    @section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
    @section('hero_image_title', "The inside of our Founder's entrance")
@endif

@if($news['youtube_playlist_id'])
    @section('youtube-playlist')
        @include('includes.social.youtube-playlist')
    @endsection
@endif

@section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 article">
        @include('includes.structure.oldnews')
        @markdown($news['article_body'])
        <h3 class="text-info lead">{{  Carbon\Carbon::parse($news['publication_date'])->format('l dS F Y') }}</h3>
    </div>

    @if($news['youtube_id'])
        <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
            <div class="ratio ratio-16x9">
                <iframe title="A YouTube video related to this story"
                        src="https://www.youtube.com/embed/{{$news['youtube_id']}}"
                        allowfullscreen></iframe>
            </div>
        </div>
    @endif


    @if($news['vimeo_id'])
        <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
            <div class="ratio ratio-16x9">
                <iframe title="A Vimeo Video related to this story"
                        src="https://player.vimeo.com/video/{{$news['vimeo_id']}}"
                        allowfullscreen></iframe>
            </div>
        </div>
    @endif
@endsection

@section('sketchfab-collection')
    @if(!empty($news['sketchfab_id']))
        <div class="container">
            <div class="col-12 shadow-sm p-3 mx-auto mb-3">
                <div class="ratio ratio-4x3">
                    <iframe title="A 3D model related to this story"
                            src="https://sketchfab.com/models/{{ $news['sketchfab_id']}}/embed?"
                            allow="autoplay; fullscreen; vr" mozallowfullscreen="true"
                            webkitallowfullscreen="true"></iframe>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('mlt')
    @if(!empty($records))
        <div class="container">
            <h3>Other recommended articles</h3>
            <div class="row">
                @foreach($records as $record)
                    <x-solr-card :result="$record"></x-solr-card>
                @endforeach
            </div>
        </div>
    @endif
@endsection
