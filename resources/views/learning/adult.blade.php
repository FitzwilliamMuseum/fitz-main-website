@extends('layouts.layout')
@foreach($session['data'] as $page)
  @section('title', $page['title'])
  @section('hero_image', $page['hero_image']['data']['url'])
  @section('hero_image_title', $page['hero_image_alt_text'])
  @section('description', $page['meta_description'])
  @section('keywords', $page['meta_keywords'])
    @section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
      {{ $page['body']}}
    </div>
    @endsection

    @section('vimeo')
    @if(!is_null($page['vimeo_id']))
    <div class="container">
      <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
        <div class="ratio ratio-16x9">
          <iframe title="A Vimeo video related to {{ $page['title'] }}"
          src="https://player.vimeo.com/video/{{$page['vimeo_id']}}"
          allowfullscreen></iframe>
        </div>
      </div>
    </div>
    @endif
    @endsection

    @section('youtube')
    @if(!is_null($page['youtube_id']))
    <div class="container">
      <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
        <div class="ratio ratio-16x9">
          <iframe title="A YouTube video related to {{ $page['title'] }}"
          src="https://www.youtube.com/embed/{{ $page['youtube_id'] }}"
          allowfullscreen></iframe>
        </div>
      </div>
    </div>
    @endif
    @endsection

    @section('sms')
    @if(!is_null($page['sms_id']))
    <div class="container">
      <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
        @include('includes.social.sms')
      </div>
    </div>
    @endif
    @endsection
@endforeach
