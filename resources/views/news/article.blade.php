@extends('layouts/layout')
@foreach($news['data'] as $project)
@section('title', $project['article_title'])
@if(!empty($project['field_image']))
@section('hero_image', $project['field_image']['data']['full_url'])
@section('hero_image_title', $project['field_image_alt_text'])
@else
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@endif

@section('content')
<div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
  <h3 class="text-muted">{{  Carbon\Carbon::parse($project['publication_date'])->format('l dS F Y') }}</h3>
  @if($project['field_image'])
  <figure class="figure float-right p-3">
    <img src="{{ $project['field_image']['data']['thumbnails']['5']['url']}}"
    alt="{{$project['field_image_alt_text']}}" class="img-fluid"
    width="400"
    />
    <figcaption class="figure-caption text-right">{{$project['field_image_alt_text']}}</figcaption>
  </figure>
  @endif
  @markdown($project['article_body'])
</div>

@if(!empty($records))
<h3>Other recommended articles</h3>
<div class="row">
@foreach($records as $record)

<div class="col-md-4 mb-3">
  <div class="card card-body h-100">
    @if(!is_null($record['thumbnail']))
    <img class="img-fluid" src="{{ $record['thumbnail'][0]}}"/>
    @else
    <img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"/>
    @endif
  <div class="container h-100">

    <div class="contents-label mb-3">
      <h3>
        <a href="/news/{{ $record['slug'][0]}}">{{ $record['title'][0]}}</a>
      </h3>
      <h4><small class="text-muted">{{  Carbon\Carbon::parse($record['pubDate'][0])->format('l dS F Y') }}</small></h4>

      <p class="card-text">{{ substr(strip_tags(htmlspecialchars_decode($record['description'][0])),0,200) }}...</p>

    </div>
  </div>
  <a href="/news/{{ $record['slug'][0]}}" class="btn btn-dark">Read more</a>
</div>

</div>
@endforeach
</div>
@endif

@if($project['youtube_id'])
<div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
  <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item "
    src="https://www.youtube.com/embed/{{$project['youtube_id']}}" frameborder="0"
    allowfullscreen></iframe>
  </div>
</div>
@endif
@if($project['vimeo_id'])
<div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
  <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item "
    src="https://player.vimeo.com/video/{{$project['vimeo_id']}}" frameborder="0"
    allowfullscreen></iframe>
  </div>
</div>
@endif
@endsection
@section('sketchfab-collection')
@if(!empty($project['sketchfab_id']))
<div class="container">
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
    <div class="embed-responsive embed-responsive-1by1">
      <iframe title="A 3D model" class="embed-responsive-item"
      src="https://sketchfab.com/models/{{ $project['sketchfab_id']}}/embed?"
      frameborder="0" allow="autoplay; fullscreen; vr" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
    </div>
  </div>
</div>
@endif
@endsection
@endforeach
