@extends('layouts.layout')
@foreach($pages['data']  as $page)
@section('title', $page['title'])
@section('hero_image', $page['hero_image']['data']['full_url'])
@section('hero_image_title', $page['hero_image_alt_text'])

<?php
//dd($page);
?>
@section('content')
<div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
  @markdown($page['body'])
</div>
@if($page['vimeo_id'])
<div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
  @include('includes.vimeo')
</div>
@endif
@if($page['youtube_id'])
<div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
  @include('includes.youtube')
</div>
@endif
@endsection
@endforeach
