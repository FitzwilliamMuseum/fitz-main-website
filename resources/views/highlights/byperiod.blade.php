@extends('layouts.layout')
@section('content')
@foreach($period['data'] as $detail)
  @section('title')
   @markdown($detail['title'])
  @endsection
  @if(array_key_exists('meta_description', $detail))
    @section('description', $detail['meta_description'])
  @endif
  @if(array_key_exists('meta_keywords', $detail))
    @section('keywords', $detail['meta_keywords'])
  @endif
  @section('hero_image',$detail['hero_image']['data']['url'])
  @section('hero_image_title', $detail['hero_image_alt_text'])
@endforeach

<div class="col-md-12 shadow-sm p-3 mb-3">
  {!! $detail['introductory_text'] !!}
</div>

  <div class="row">
    @foreach($pharos['data'] as $record)
    <div class="col-md-4 mb-3">
      <div class="card  h-100">
        @if(!is_null($record['image']))
          <a href="/objects-and-artworks/highlights/{{ $record['slug']}}"><img class="img-fluid" src="{{ $record['image']['data']['thumbnails'][4]['url']}}"
          alt="{{ $record['image_alt_text'] }}" loading="lazy"
          width="{{ $record['image']['data']['thumbnails'][4]['width'] }}"
          height="{{ $record['image']['data']['thumbnails'][4]['height'] }}"/></a>
        @endif
        <div class="card-body h-100">
          <div class="contents-label mb-3">
            <h3 class="lead">
              <a href="/objects-and-artworks/highlights/{{ $record['slug']}}">@markdown($record['title'])</a></h3>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
@endsection
