@extends('layouts/layout')
@foreach($news['data'] as $project)
  @section('jsonld')
    @include('includes.jsonld.news')
  @endsection
  @section('title', $project['article_title'])
  @section('description',$project['meta_description'])
  @section('keywords',$project['meta_keywords'])

  @if(!empty($project['field_image']))
    @section('hero_image', $project['field_image']['data']['url'])
    @section('hero_image_title', $project['field_image_alt_text'])
  @else
    @section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
    @section('hero_image_title', "The inside of our Founder's entrance")
  @endif

  @section('content')
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 article" >
    @include('includes.structure.oldnews')
    @markdown($project['article_body'])
    <h3 class="text-info lead">{{  Carbon\Carbon::parse($project['publication_date'])->format('l dS F Y') }}</h3>
    @if($project['youtube_playlist_id'])
      @section('youtube-playlist')
      @include('includes.social.youtube-playlist')
      @endsection
    @endif
  </div>

  @if($project['youtube_id'])
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
    <div class="ratio ratio-16x9">
      <iframe title="A YouTube video related to this story"
      src="https://www.youtube.com/embed/{{$project['youtube_id']}}"
      allowfullscreen></iframe>
    </div>
  </div>
  @endif


  @if($project['vimeo_id'])
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
    <div class="ratio ratio-16x9">
      <iframe title="A Vimeo Video related to this story"
      src="https://player.vimeo.com/video/{{$project['vimeo_id']}}"
      allowfullscreen></iframe>
    </div>
  </div>
  @endif
@endsection

@section('sketchfab-collection')
  @if(!empty($project['sketchfab_id']))
  <div class="container">
    <div class="col-12 shadow-sm p-3 mx-auto mb-3">
      <div class="embed-responsive embed-responsive-4by3">
        <iframe title="A 3D model related to this story" class="embed-responsive-item"
        src="https://sketchfab.com/models/{{ $project['sketchfab_id']}}/embed?"
         allow="autoplay; fullscreen; vr" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
      </div>
    </div>
  </div>
  @endif
@endsection

@if(!empty($project['field_image']))
  @section('height-test')
    <script>
      $("#stand-out").on("load", function(){
        let height = $(this).height();
        console.log(height);
        $('.article').css('min-height', height + 100);
      });
    </script>
  @endsection
@endif

@endforeach
@section('mlt')
@if(!empty($records))
<div class="container">
<h3>Other recommended articles</h3>
<div class="row">
  @foreach($records as $record)
    <x-solr-card :result="$record"></x-solr-card>
  @endforeach
</div>
</div>
@endif
@endsection
