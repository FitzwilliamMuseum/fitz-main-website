@extends('layouts.layout')
@foreach($session['data'] as $page)
    @section('title', $page['title'])
@section('hero_image', $page['hero_image']['data']['url'])
@section('hero_image_title', $page['hero_image_alt_text'])
@section('description', $page['meta_description'])
@section('keywords', $page['meta_keywords'])

@section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3">
        @markdown($page['body'])
    </div>

    @if($page['vimeo_id'])
        <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
            @include('includes.social.vimeo')
        </div>
    @endif

    @if($page['youtube_id'])
        <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
            @include('includes.social.youtube')
        </div>
    @endif

    @if($page['sms_id'])
        <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
            @include('includes.social.sms')
        </div>
    @endif

    @if($page['slug'] == 'school-sessions')
        @inject('learningController', 'App\Http\Controllers\learningController')
        @php
            $sessions = $learningController::schoolsessions()
        @endphp
        @include('includes.structure.sessions')
    @endif

    @if($page['slug'] == 'young-people')
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
@endforeach
