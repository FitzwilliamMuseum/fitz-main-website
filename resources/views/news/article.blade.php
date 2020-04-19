@extends('layouts/layout')
@foreach($news['data'] as $project)
  @section('title', $project['article_title'])
  @if(isset($project['field_image']['data']['full_url']))
  @section('hero_image', $project['field_image']['data']['full_url'])
  @section('hero_image_title', $project['field_image_alt_text'])

  @endif

  @section('content')
      <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
        <h3 class="text-muted">{{  Carbon\Carbon::parse($project['publication_date'])->format('l dS F Y') }}</h3>
        @markdown($project['article_body'])
      </div>
      @if($project['youtube_id'])
      <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item "
          src="https://www.youtube.com/embed/{{$project['youtube_id']}}" frameborder="0"
          allowfullscreen></iframe>
        </div>
      </div>
      @endif
  @endsection
@endforeach
