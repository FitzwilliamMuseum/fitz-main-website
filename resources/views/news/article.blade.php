@extends('layouts/layout')
@foreach($news['data'] as $project)
  @section('jsonld')
    @include('includes.jsonld.news')
  @endsection
  @section('title', $project['article_title'])
  @section('description',$project['meta_description'])
  @section('keywords',$project['meta_keywords'])

  @if(!empty($project['field_image']))
    @section('hero_image', $project['field_image']['data']['full_url'])
    @section('hero_image_title', $project['field_image_alt_text'])
  @else
    @section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
    @section('hero_image_title', "The inside of our Founder's entrance")
  @endif

  @section('content')
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 article" >
    @if($project['field_image'])
    <figure class="figure float-right p-3 col-md-4">
      <img src="{{ $project['field_image']['data']['thumbnails']['5']['url'] }}"
      alt="{{ $project['field_image_alt_text'] }}" class="img-fluid" id="stand-out"
      width="400"
      loading="lazy"
      />
      <figcaption class="figure-caption text-left">{{ $project['field_image_alt_text'] }}</figcaption>
    </figure>
    @endif
    @markdown($project['article_body'])
    <h3 class="text-muted">{{  Carbon\Carbon::parse($project['publication_date'])->format('l dS F Y') }}</h3>
    @if($project['youtube_playlist_id'])
      @section('youtube-playlist')
      @include('includes.social.youtube-playlist')
      @endsection
    @endif
  </div>





  @if($project['youtube_id'])
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
    <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item" title="A YouTube video related to this story"
      src="https://www.youtube.com/embed/{{$project['youtube_id']}}" frameborder="0"
      allowfullscreen></iframe>
    </div>
  </div>
  @endif


    @if($project['vimeo_id'])
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" title="A Vimeo Video related to this story"
        src="https://player.vimeo.com/video/{{$project['vimeo_id']}}" frameborder="0"
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
          frameborder="0" allow="autoplay; fullscreen; vr" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
        </div>
      </div>
    </div>
    @endif
  @endsection

  @if(!empty($project['field_image']))
    @section('height-test')
      <script>
        $("#stand-out").on("load", function(){
          var height = $(this).height();
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
  <div class="col-md-4 mb-3">
    <div class="card h-100">
      @if(!is_null($record['thumbnail']))
        <a href="{{ route('article', $record['slug'][0]) }}"><img class="img-fluid" src="{{ $record['thumbnail'][0]}}" alt="A highlight image for {{ $record['title'][0] }}"
        height="600"
        width="800"
        loading="lazy"
        /></a>
      @else
        <a href="{{ route('article', $record['slug'][0]) }}"><img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
        alt="No image was provided for {{ $record['title'][0] }}"
        loading="lazy"
        height="600"
        width="800"
        /></a>
      @endif
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3>
            <a href="{{ route('article', $record['slug'][0]) }}">{{ $record['title'][0] }}</a>
          </h3>
          <h4>
            <small class="text-muted">{{  Carbon\Carbon::parse($record['pubDate'][0])->format('l j F Y') }}</small>
          </h4>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
</div>
@endif
@endsection
