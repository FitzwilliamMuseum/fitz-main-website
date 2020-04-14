@extends('layouts/layout')
@foreach($news['data'] as $project)
  @section('title','News from the Fitz')
  @if(isset($project['field_image']['data']['full_url']))
  @section('hero_image', $project['field_image']['data']['full_url'])
  @section('hero_image_title', $project['field_image_alt_text'])

  @endif

  @section('content')
      <h2>{{ $project['article_title'] }}</h2>
      <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
        <h3>{{  Carbon\Carbon::parse($project['publication_date'])->format('l dS F Y') }}</h3
        @markdown($project['article_body'])
      </div>
  @endsection
@endforeach
