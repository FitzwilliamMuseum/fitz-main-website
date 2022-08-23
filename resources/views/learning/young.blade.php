@extends('layouts.layout')
@section('title', $pages['title'])
@section('hero_image', $pages['hero_image']['data']['url'])
@section('hero_image_title', $pages['hero_image_alt_text'])
@section('description', $pages['meta_description'])
@section('keywords', $pages['meta_keywords'])

@section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3">
        @markdown($pages['body'])
    </div>

    @if($pages['vimeo_id'])
        <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
            @include('includes.social.vimeo')
        </div>
    @endif

    @if($pages['youtube_id'])
        <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
            @include('includes.social.youtube')
        </div>
    @endif

    @if($pages['sms_id'])
        <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
            @include('includes.social.sms')
        </div>
    @endif

    @if($pages['slug'] == 'school-sessions')
        @inject('learningController', 'App\Http\Controllers\learningController')
        @php
            $sessions = $learningController::schoolsessions()
        @endphp
        @include('includes.structure.sessions')
    @endif

    @if($pages['slug'] == 'young-people')
        @inject('learningController', 'App\Http\Controllers\learningController')
        @php
            $sessions = $learningController::youngpeople()
        @endphp
        @include('includes.structure.young')
    @endif



    @if(!empty($records))
        <h3>
            Related to this page
        </h3>
        <div class="row">
            @foreach($records as $record)
                <x-solr-card :result="$record"></x-solr-card>
            @endforeach
        </div>
    @endif
@endsection
