@extends('layouts.layout')
@section('title', $session['title'])
@section('hero_image', $session['hero_image']['data']['url'])
@section('hero_image_title', $session['hero_image_alt_text'])
@section('description', $session['meta_description'])
@section('keywords', $session['meta_keywords'])
@section('content')
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 ">
    {{ $session['body']}}
</div>
@endsection

@section('vimeo')
@if(!is_null($session['vimeo_id']))
<div class="container">
    <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 ">
        <div class="ratio ratio-16x9">
            <iframe title="A Vimeo video related to {{ $session['title'] }}"
                src="https://player.vimeo.com/video/{{$session['vimeo_id']}}" allowfullscreen></iframe>
        </div>
    </div>
</div>
@endif
@endsection

@section('youtube')
@if(!is_null($session['youtube_id']))
<div class="container">
    <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 ">
        <div class="ratio ratio-16x9">
            <iframe title="A YouTube video related to {{ $session['title'] }}"
                src="https://www.youtube.com/embed/{{ $session['youtube_id'] }}" allowfullscreen></iframe>
        </div>
    </div>
</div>
@endif
@endsection

@section('sms')
@if(!is_null($session['sms_id']))
<div class="container">
    <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 ">
        @include('includes.social.sms')
    </div>
</div>
@endif
@endsection