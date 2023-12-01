@extends('layouts.layout')
@section('title', $session['title'])
@section('hero_image', $session['hero_image']['data']['url'])
@section('hero_image_title', $session['hero_image_alt_text'])
@section('description', $session['meta_description'])
@section('keywords', $session['meta_keywords'])

@section('content')
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">
    @markdown($session['body'])
</div>

@if($session['vimeo_id'])
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 ">
    @include('includes.social.vimeo')
</div>
@endif

@if($session['youtube_id'])
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 ">
    @include('includes.social.youtube')
</div>
@endif

@if($session['sms_id'])
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 ">
    @include('includes.social.sms')
</div>
@endif

@if($session['slug'] == 'school-sessions')
@inject('learningController', 'App\Http\Controllers\learningController')
@php
$sessions = $learningController::schoolsessions()
@endphp
@include('includes.structure.sessions')
@endif

@if($session['slug'] == 'young-people')
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