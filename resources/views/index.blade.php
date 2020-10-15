@extends('layouts.home')

@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
@section('hero_image_title','The founder\'s building entrance ceiling')
@section('parallax_home', 'https://content.fitz.ms/fitz-website/assets/10.1.m.15_f7r_3_201811_amt49_mas.jpg')
@section('parallax_two', 'https://content.fitz.ms/fitz-website/assets/10.1.m.15_f7r_3_201811_amt49_mas.jpg')
@section('parallax_three', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/aramesh.jpg')
@section('parallax_four', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/e1a3159c12ca0f5091e3e9e5000ad4d0-landscape.jpg')
@section('parallax_three_lower', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/aramesh.jpg')
@section('description', 'This is the Beta Website for the Fitzwilliam Museum, the University of Cambridge\'s principal museum')
@section('keywords', 'fitzwilliam, museum, cambridge, university, art, design, archaeology')
@section('title', 'The Fitzwilliam Museum')


@section('news')
  @foreach($news['data'] as $project)
  <div class="col-md-4 mb-3">
    <div class="card  h-100">
      @if(!is_null($project['field_image']))
        <a href="{{ route('article', $project['slug']) }}"><img class="img-fluid" src="{{ $project['field_image']['data']['thumbnails'][4]['url']}}"
      alt="{{ $project['field_image_alt_text'] }}" /></a>
      @endif
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3>
            <a href="{{ route('article', $project['slug']) }}">{{ $project['article_title']}}</a>
          </h3>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endsection

@section('fundraising')
<div class="container mt-3">
  <h2>Support us</h2>
<div class="row">
  @foreach($fundraising['data'] as $project)
  <div class="col-md-4 mb-3">
    <div class="card  h-100">
      @if(!is_null($project['hero_image']))
        <a href="{{ $project['url']}}"><img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"
      alt="{{ $project['hero_image_alt_text'] }}" /></a>
      @endif
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3>
            <a href="{{ $project['url']}}">{{ $project['title']}}</a>
          </h3>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
</div>
@endsection


@section('research')
  @foreach($research['data'] as $project)
  <div class="col-md-4 mb-3">
    <div class="card h-100">
        @if(!is_null($project['hero_image']))
          <a href="{{ route('research-project', $project['slug']) }}"><img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"
          alt="{{ $project['hero_image_alt_text'] }}" loading="lazy"
          width="{{ $project['hero_image']['data']['thumbnails'][4]['width'] }}"
          height="{{ $project['hero_image']['data']['thumbnails'][4]['height'] }}" /></a>
        @endif
        <div class="card-body  h-100">
          <div class="contents-label mb-3">
            <h3>
              <a href="{{ route('research-project', $project['slug']) }}">{{ $project['title']}}</a>
            </h3>
          </div>
        </div>
    </div>
  </div>
  @endforeach
@endsection

@section('themes')
  @foreach($objects['data'] as $theme)
  <div class="col-md-4 mb-3">
    <div class="card h-100">
      @if(!is_null($theme['image']))
      <a href="{{ route('highlight', $theme['slug']) }}"><img class="img-fluid" src="{{ $theme['image']['data']['thumbnails'][4]['url']}}"
      alt="{{ $theme['image_alt_text'] }}"
      loading="lazy"
      height="{{ $theme['image']['data']['thumbnails'][4]['height'] }}"
      width="{{ $theme['image']['data']['thumbnails'][4]['width'] }}"/></a>
      @endif
      <div class="card-body  h-100">
        <div class="contents-label mb-3">
          <h3>
            <a href="{{ route('highlight', $theme['slug']) }}">@markdown($theme['title'])</a>
          </h3>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endsection

@section('twitter')
  @include('includes.social.tweets')
@endsection



@section('youtube-list')
  @include('includes.social.youtubelist')
@endsection

@if(!empty($shopify))
  @section('shopify')
  <div class="container">
    <h4>Gifts from the Fitzwilliam Museum shop</h4>
    <div class="row">
      @foreach($shopify as $record)
      <div class="col-md-4 mb-3">
        <div class="card h-100">
          @if(!is_null($record['thumbnail']))
            <div class="results_image">
            <a href="{{ $record['url'][0] }}"><img class="img-fluid results_image__thumbnail" src="{{ $record['thumbnail'][0]}}"
            alt="Featured image for the project: {{ $record['title'][0] }}"
            loading="lazy"/></a>
          </div>
          @else
            <a href="{{ $record['url'][0] }}"><img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
            alt="The Fitzwilliam Museum's gallery 3 roof" loading="lazy"/></a>
          @endif
          <div class="card-body h-100">
            <div class="contents-label mb-3">
              <h3>
                <a href="{{ $record['url'][0]  }}">{{ $record['title'][0] }}</a>
              </h3>
              <p>£{{ number_format((float)$record['price'][0], 2, '.', '') }}</p>

            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  @endsection
@endif
