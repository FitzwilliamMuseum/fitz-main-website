@extends('layouts/layout')
@foreach($pharos['data'] as $project)
@section('title', $project['title'])
@if(!empty($project['hero_image']))
@section('hero_image', $project['hero_image']['data']['full_url'])
@section('hero_image_title', $project['hero_image_alt_text'])
@else
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@endif

@section('content')
<div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
  @markdown($project['body'])
</div>


@endsection
@endforeach
