@extends('layouts/layout')
@section('title','News stories')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('description', 'News stories from the Fitzwilliam Museum, Cambridge University')
@section('keywords', 'news,stories,museum,cambridge')

@section('content')
  <div class="row">
    @foreach($news['data'] as $project)
    <div class="col-md-4 mb-3">
      <div class="card card-body h-100">
        @if(!is_null($project['field_image']))
          <img class="img-fluid" src="{{ $project['field_image']['data']['thumbnails'][4]['url'] }}"
          alt="A highlight image for {{ $project['article_title'] }}"
          height="{{ $project['field_image']['data']['thumbnails'][4]['height'] }}"
          width="{{ $project['field_image']['data']['thumbnails'][4]['width'] }}"
          loading="lazy"/>
        @else
          <img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
          alt="A stand in image for {{ $project['article_title'] }}"/>
        @endif
        <div class="container h-100">
          <div class="contents-label mb-3">
            <h3>
              <a href="news/{{ $project['slug'] }}">{{ $project['article_title'] }}</a>
            </h3>
            <h4>
              <small class="text-muted">{{ Carbon\Carbon::parse($project['publication_date'])->format('l dS F Y') }}</small>
            </h4>
            <p class="card-text">
              {{ substr(strip_tags(htmlspecialchars_decode($project['article_body'])),0,200) }}...
            </p>
          </div>
        </div>
        <a href="news/{{ $project['slug']}}" class="btn btn-dark">Read more</a>
      </div>
    </div>
    @endforeach
  </div>
  <nav aria-label="Page navigation">
    {{ $paginator->links() }}
  </nav>
@endsection
