@extends('layouts.layout')
@section('title', $session['title'])
@section('hero_image', $session['hero_image']['data']['url'])
@section('hero_image_title', $session['hero_image_alt_text'])
@section('description', $session['meta_description'])
@section('keywords', $session['meta_keywords'])
@section('content')
<h3>Session Description</h3>
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 ">
    @markdown($session['description'])
    <p>
        Contact us on 01223 332904 or <a href="mailto:education@fitzmuseum.cam.ac.uk">email</a>
        to book, or to discuss your needs.
    </p>
</div>
<h3>Format of the session</h3>
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 ">
    @markdown($session['format_session'])
</div>

@if(isset($session['quote']))
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 ">
    <blockquote class="blockquote">
        @markdown($session['quote'])
    </blockquote>
</div>
@endif

<h3>More about this session</h3>
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 ">
    <ul>
        @if(isset($session['key_stages']) && !empty($session['key_stages']))
        <li>Key stages appropriate:{{ implode(', ', $session['key_stages']) }}</li>
        @endif

        @if(isset($session['curriculum_link']) && !empty($session['curriculum_link']))
        <li>Curriculum links: {{ implode(', ', $session['curriculum_link']) }}</li>
        @endif

        @if(isset($session['session_type']) && !empty($session['session_type']))
        <li>Session type:{{ implode(', ', $session['session_type']) }}</li>
        @endif

        @if(isset($session['type_of_activity']) && !empty($session['type_of_activity']))
        <li>Type of activity:{{ implode(', ', $session['type_of_activity']) }}</li>
        @endif
    </ul>
</div>

@if(!empty($session['associated_learning_files']))
<h3>Fact sheets and related files</h3>
<div class="row">
    @foreach($session['associated_learning_files'] as $file)
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