@extends('layouts.layout')
@foreach($pages['data'] as $page)
  @if(!empty($page['hero_image']))
    @section('hero_image', $page['hero_image']['data']['full_url'])
    @section('hero_image_title', $page['hero_image_alt_text'])
  @else
    @section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
    @section('hero_image_title', "The inside of our Founder's entrance")
  @endif
  @section('description', $page['meta_description'])
  @section('keywords', $page['meta_keywords'])

  @section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3">
      @markdown($page['body'])
    </div>

@endforeach

  @if(!empty($ltd['data']))
  <div class="row">
    @foreach($ltd['data'] as $look)
    <div class="col-md-4 mb-3">
      <div class="card h-100">
        <a href="{{ route('ltd-activity', $look['slug']) }}"><img class="img-fluid" src="{{ $look['focus_image']['data']['thumbnails'][4]['url']}}"
        alt="{{ $look['focus_image_alt_text'] }}"
        width="{{ $look['focus_image']['data']['thumbnails'][4]['width'] }}"
        height="{{ $look['focus_image']['data']['thumbnails'][4]['height'] }}"
        loading="lazy"/></a>
        <div class="card-body h-100">
          <div class="contents-label mb-3">
            <h3 class="lead">
              <a href="{{ route('ltd-activity', $look['slug']) }}">{{ $look['title_of_work'] }}</a>
            </h3>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @endif
  @endsection
