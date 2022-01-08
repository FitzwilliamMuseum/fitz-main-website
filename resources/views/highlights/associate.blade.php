@extends('layouts.highlights')
@foreach($pharos['data'] as $object)
  @section('title', $object['title'])
  @section('description', $object['meta_description'])
  @section('keywords', $object['meta_keywords'])
  @if(!empty($object['hero_image']))
    @section('hero_image', $object['hero_image']['data']['url'])
    @section('hero_image_title', $object['hero_image_alt_text'])
  @else
    @section('hero_image',env('CONTENT_STORE') . 'img_20190105_153947.jpg')
    @section('hero_image_title', "The inside of our Founder's entrance")
  @endif

  @section('content')
    @if(!is_null($object['hero_image']))
      <div class="text-center">
      <figure class="figure ">
        <a href="/objects-and-artworks/highlights/context/{{ $object['section'] }}/{{ $object['slug']}}"><img class="img-fluid" src="{{ $object['hero_image']['data']['url']}}"
        alt="{{ $object['hero_image_alt_text'] }}" loading="lazy"
        width="{{ $object['hero_image']['width'] }}"
        height="{{ $object['hero_image']['height'] }}"/></a>
        <figcaption class="text-info figure-caption">{{ $object['hero_image_alt_text'] }}</figcaption>
      </figure>
    </div>
    @endif
  <div class="col-12 shadow-sm p-3 mx-auto mb-3">
    @markdown($object['body'])
  </div>
  @endsection
  @if(!empty($highlights))
    @section('highlight')
      <div class="container">
        <h3>
          Other highlight objects you might like
        </h3>
        <div class="row">
          @foreach($highlights as $record)
            <x-solr-card :result="$record" />
            @endforeach
          </div>
        </div>
      @endsection
    @endif
  @if(!empty($records))
  @section('mlt')
  <div class="container">
    <h3>
      Other pathways and stories you might like
    </h3>
    <div class="row">
      @foreach($records as $record)
      <x-solr-card :result="$record" />

      @endforeach
    </div>
</div>
  @endsection
@endif
@endforeach
