@extends('layouts.layout')
@section('title', $theme['title'])
@section('description', 'A description of the theme related to ' . $theme['title'])
@section('keywords', 'pharos,theme,' . $theme['title'])
@section('hero_image', $theme['hero_image']['data']['url'])
@section('hero_image_title', $theme['hero_image_alt_text'])
@section('content')
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">
    {!! $theme['introductory_text']!!}
</div>
<div class="row">
    @foreach($pharos['data'] as $record)
    <x-image-card :image="$record['image']" :title="$record['title']" :altTag="$record['image_alt_text']"
        :route="'highlight'" :params="[$record['slug']]"></x-image-card>
    @endforeach
</div>
@endsection