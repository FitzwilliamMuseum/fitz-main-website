@extends('layouts.layout')

@foreach($pages['data'] as $page)
  @section('title', $page['title'])
  @section('hero_image', $page['hero_image']['data']['full_url'])
  @section('hero_image_title', $page['hero_image_alt_text'])
  @section('meta_description', $page['meta_description'])
  @section('meta_keywords', $page['meta_keywords'])

  {{-- @section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
      @markdown($page['body'])
    </div>
  @endsection --}}
@endforeach

@section('associated_pages')



  <div class="container">

    <div class="row">

      <div class="col-md-4 mb-3">

        <div class="card h-100">
          <a href="{{route('research-profiles')}}"><img class="card-img-top" src="https://content.fitz.ms/fitz-website/assets/img_20191219_184304_832.jpeg?key=directus-medium-contain"
          alt="Eye of the minotaur"
          width="300"
          height="300"
          loading="lazy" /></a>
        <div class="card-body h-100">
          <h3>
            <a href="{{route('research-profiles')}}">Our active researchers</a>
          </h3>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card h-100">
          <a href="{{route('opportunities')}}"><img
            class="card-img-top" src="https://content.fitz.ms/fitz-website/assets/IMG_20191022_152807.jpeg?key=directus-medium-contain"
          alt="Jennifer Wexler"
          width="300"
          height="300"
          loading="lazy" /></a>
        <div class="card-body h-100">
          <h3>
            <a href="{{route('opportunities')}}">Research opportunities</a>
          </h3>
          </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card h-100">
        <a href="{{route('research-projects')}}"><img
          class="card-img-top" src="https://content.fitz.ms/fitz-website/assets/XRF analysis of an illuminated mss at the Fitz.jpg?key=directus-medium-contain"
        alt="XRF analysis of a manuscript"
        width="300"
        height="300"
        loading="lazy" /></a>
      <div class="card-body h-100">
        <h3>
          <a href="{{route('research-projects')}}">Our research work</a>
        </h3>
        </div>
      </div>
  </div>

  <div class="col-md-4 mb-3">
    <div class="card h-100">
      <a href="{{route('resources')}}"><img
        class="card-img-top" src="https://content.fitz.ms/fitz-website/assets/4.-Dormition-of-the-Virgin-Italy-Venice-c.1420-Master-of-the-Murano-Gradual-active-c.1420-1440.jpg?key=directus-large-crop"
      alt="A segment of a manuscript"
      width="300"
      height="300"
      loading="lazy" /></a>
    <div class="card-body h-100">
      <h3>
        <a href="{{route('resources')}}">Digital resources</a>
      </h3>
      </div>
    </div>
</div>

      @foreach($associated['data'] as $project)
      <div class="col-md-4 mb-3">
        <div class="card h-100">
          @if(!is_null($project['hero_image']))
            <a href="{{ $project['section']}}/{{ $project['slug']}}"><img class="card-img-top" src="{{ $project['hero_image']['data']['thumbnails'][3]['url']}}"
            alt="{{ $project['hero_image_alt_text'] }}"
            width="{{ $project['hero_image']['data']['thumbnails'][3]['height'] }}"
            height="{{ $project['hero_image']['data']['thumbnails'][3]['width'] }}"
            loading="lazy" /></a>
          @endif
        <div class="card-body h-100">
          <h3>
            <a href="{{ $project['section']}}/{{ $project['slug']}}">{{ $project['title']}}</a>
          </h3>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
@endsection

@section('research-projects')
<div class="container">
  <h2>Featured research projects</h2>
  <div class="row">

  @foreach($projects['data'] as $project)
  <div class="col-md-4 mb-3">
    <div class="card h-100">
      @if(!is_null($project['hero_image']))
        <a href="{{ route('research-project', $project['slug']) }}"><img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"
        alt="{{ $project['hero_image_alt_text'] }}"
        height="{{ $project['hero_image']['data']['thumbnails'][4]['height'] }}"
        width="{{ $project['hero_image']['data']['thumbnails'][4]['width'] }}"
        loading="lazy"/></a>
      @endif
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3>
            <a href="{{ route('research-project', $project['slug']) }}">{{ $project['title']}}</a>
          </h3>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  </div>
</div>
@endsection
