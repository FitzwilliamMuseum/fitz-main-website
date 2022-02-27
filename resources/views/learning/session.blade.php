@extends('layouts/layout')
@foreach($session['data'] as $page)
    @section('title', $page['title'])
@section('hero_image', $page['hero_image']['data']['url'])
@section('hero_image_title', $page['hero_image_alt_text'])
@section('description', $page['meta_description'])
@section('keywords', $page['meta_keywords'])
@section('content')
    <h3>Session Description</h3>
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
        @markdown($page['description'])
        <p>
            Contact us on 01223 332904 or <a href="mailto:education@fitzmuseum.cam.ac.uk">email</a>
            to book, or to discuss your needs.
        </p>
    </div>
    <h3>Format of the session</h3>
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
        @markdown($page['format_session'])
    </div>

    @if(isset($page['quote']))
        <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
            <blockquote class="blockquote">
                @markdown($page['quote'])
            </blockquote>
        </div>
    @endif

    <h3>More about this session</h3>
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
        <ul>
            @if(isset($page['key_stages']) && !empty($page['key_stages']))
                <li>Key stages appropriate:{{ implode(', ', $page['key_stages']) }}</li>
            @endif

            @if(isset($page['curriculum_link']) && !empty($page['curriculum_link']))
                <li>Curriculum links: {{ implode(', ', $page['curriculum_link']) }}</li>
            @endif

            @if(isset($page['session_type']) && !empty($page['session_type']))
                <li>Session type:{{ implode(', ', $page['session_type']) }}</li>
            @endif

            @if(isset($page['type_of_activity']) && !empty($page['type_of_activity']))
                <li>Type of activity:{{ implode(', ', $page['type_of_activity']) }}</li>
            @endif
        </ul>
    </div>

    @if(!empty($page['associated_learning_files']))
        <h3>Fact sheets and related files</h3>
        <div class="row">
            @foreach($page['associated_learning_files'] as $file)
                <x-learning-file-card :file="$file"></x-learning-file-card>
            @endforeach
        </div>
    @endif
@endsection
@if(!empty($records))
@section('mlt')
    <div class="container">
        <h3>Other related schools sessions</h3>
        <div class="row">
            @foreach($records as $record)
                <x-solr-card :result="$record"></x-solr-card>
            @endforeach
        </div>
    </div>
@endsection
@endif
@endforeach
