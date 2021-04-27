@extends('layouts/layout')



@foreach($theme['data'] as $th)
  @section('title', $th['title'])
  @section('description', 'A description of the theme related to ' . $th['title'])
  @section('keywords', '')
  @section('hero_image', $th['hero_image']['data']['full_url'])
  @section('hero_image_title', $th['hero_image_alt_text'])
  @section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3">
      {!! $th['introductory_text']!!}
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
                  <h3>
                    <a href="/objects-and-artworks/highlights/{{ $record['slug']}}">@markdown($record['title'])</a></h3>
                  </div>
                </div>

              </div>
            </div>
          @endforeach
        </div>
      @endsection
    @endforeach
    @section('themes')

    @endsection
