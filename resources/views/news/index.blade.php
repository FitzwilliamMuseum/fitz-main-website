@extends('layouts/layout')
@section('title','News stories')
@section('hero_image',env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('description', 'News stories from the Fitzwilliam Museum, Cambridge University')
@section('keywords', 'news,stories,museum,cambridge')

@section('content')
  <div class="row">
    @foreach($news['data'] as $project)
    <div class="col-md-4 mb-3">
      <div class="card h-100">
        @if(!is_null($project['field_image']))
          <a href="{{ route('article', $project['slug']) }}"><img class="img-fluid" src="{{ $project['field_image']['data']['thumbnails'][4]['url'] }}"
          alt="A highlight image for {{ $project['article_title'] }}"
          height="{{ $project['field_image']['data']['thumbnails'][4]['height'] }}"
          width="{{ $project['field_image']['data']['thumbnails'][4]['width'] }}"
          loading="lazy"/></a>
        @else
          <a href="{{ route('article', $project['slug']) }}"><img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
          alt="A stand in image for {{ $project['article_title'] }}"/></a>
        @endif
        <div class="card-body h-100">
          <div class="contents-label mb-3">
            <h3 class="lead">
              <a href="{{ route('article', $project['slug']) }}">{{ $project['article_title'] }}</a>
            </h3>
            <h4 class="text-info lead">
              {{ Carbon\Carbon::parse($project['publication_date'])->format('l j F Y') }}
            </h4>

          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="container mt-1 p-2 text-center">
    <nav aria-label="Page navigation" >
      {{ $paginator->appends(request()->except('page'))->links() }}
    </nav>
  </div>
@endsection
