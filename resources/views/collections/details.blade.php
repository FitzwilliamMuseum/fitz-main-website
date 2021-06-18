@extends('layouts.layout')
@foreach($collection['data'] as $coll)
  @section('keywords', $coll['meta_keywords'])
  @section('description', $coll['meta_description'])
  @section('title', $coll['collection_name'])
  @section('hero_image', $coll['hero_image']['data']['thumbnails'][10]['url'])
  @section('hero_image_title', $coll['hero_image_alt_text'])
@section('content')
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
    {!! $coll['collection_description'] !!}
  </div>
  @section('collections')
  @isset($coll['object_id_numbers'])
    @inject('collectionsController', 'App\Http\Controllers\collectionsController')
    @php
    $records = $collectionsController::getObjects($coll['object_id_numbers']);
    // @dd($records);
    @endphp
    @if(!empty($records))
      <div class="container">
      <h3 class="lead">
        Related objects
      </h3>
      <div class="row">
        @foreach($records as $record)
        @php
        $pris = Arr::pluck($record['_source']['identifier'],'priref');
        $pris = array_filter($pris);
        $pris= Arr::flatten($pris);
        @endphp

        <div class="col-md-4 mb-3">
          <div class="card h-100">
            <div class="results_image">
              @if(array_key_exists('multimedia', $record['_source']))
                <a href="{{ env('COLLECTION_URL') }}/id/object/{{ $pris[0] }}"><img class="results_image__thumbnail" src="{{ env('COLLECTION_URL') }}/imagestore/{{ $record['_source']['multimedia'][0]['processed']['preview']['location'] }}"
                  loading="lazy" alt="An image of {{ ucfirst($record['_source']['summary_title']) }}"
                  /></a>
                @else
                  <a href="{{ env('COLLECTION_URL') }}/id/object/{{ $pris[0] }}"><img class="results_image__thumbnail" src="https://content.fitz.ms/fitz-website/assets/no-image-available.png?key=directus-medium-crop"
                    alt="A stand in image for {{ ucfirst($record['_source']['summary_title']) }}}"/></a>
                  @endif
                </div>
                <div class="card-body ">
                  <div class="contents-label mb-3">
                    <h3 class="lead ">
                      @if(array_key_exists('title',$record['_source'] ))
                        <a href="{{ env('COLLECTION_URL') }}/id/object/{{ $pris[0] }}">{{ ucfirst($record['_source']['title'][0]['value']) }}</a>
                      @else
                        <a href="{{ env('COLLECTION_URL') }}/id/object/{{ $pris[0] }}">{{ ucfirst($record['_source']['summary_title']) }}</a>
                      @endif            </h3>
                      <p class="text-info">{{ $record['_source']['identifier'][0]['accession_number'] }}</p>

                    </div>
                  </div>
                </div>
              </div>
          @endforeach
        </div>
      </div>
      @endif
  @endisset
@endsection

  @if(!empty($coll['associated_departments']))
    @section('departments')
      <div class="container">
        <h2 class="lead">Associated departments</h2>
        <div class="row">
          @foreach($coll['associated_departments'] as $gallery)
          <div class="col-md-4 mb-3">
            <div class="card h-100">
              @if(!is_null($gallery['departments_id']['hero_image']))
              <div class="embed-responsive embed-responsive-4by3">
                <a href="{{ route('department', $gallery['departments_id']['slug']) }}"><img class="img-fluid embed-responsive-item" src="{{ $gallery['departments_id']['hero_image']['data']['thumbnails'][4]['url']}}"
                width="{{ $gallery['departments_id']['hero_image']['data']['thumbnails'][4]['width']}}"
                height="{{ $gallery['departments_id']['hero_image']['data']['thumbnails'][4]['height']}}"
                alt="{{ $gallery['departments_id']['hero_image_alt_text'] }}" loading="lazy"/></a>
              </div>
              @endif
              <div class="card-body">
                <div class="contents-label mb-3">
                  <h3 class="lead">
                    <a href="{{ route('department', $gallery['departments_id']['slug']) }}">{{ $gallery['departments_id']['title']}}</a>
                  </h3>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    @endsection
  @endif

  @if(!empty($coll['associated_galleries']))
    @section('galleries')
    <div class="container">
      <h2 class="lead">Associated Galleries</h2>
      <div class="row">
        @foreach($coll['associated_galleries'] as $gallery)
        <div class="col-md-4 mb-3">
          <div class="card">
            @if(!is_null($gallery['galleries_id']['hero_image']))
            <div class="embed-responsive embed-responsive-4by3">
            <a href="{{ route('gallery', $gallery['galleries_id']['slug']) }}"><img class="embed-responsive-item img-fluid" src="{{ $gallery['galleries_id']['hero_image']['data']['thumbnails'][4]['url'] }}"
            width="{{ $gallery['galleries_id']['hero_image']['data']['thumbnails'][4]['width'] }}"
            height="{{ $gallery['galleries_id']['hero_image']['data']['thumbnails'][4]['height'] }}"
            alt="{{ $gallery['galleries_id']['hero_image_alt_text'] }}" loading="lazy"
            /></a>
            </div>
            @endif
            <div class="card-body  h-100">
              <div class="contents-label mb-3">
                <h3 class="lead">
                  <a href="{{ route('gallery', $gallery['galleries_id']['slug']) }}">{{ $gallery['galleries_id']['gallery_name']}}</a>
                </h3>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @endsection
  @endif
@endsection

@if(!empty($coll['curators']))
  @section('curators')
    <div class="container">
      <h3 class="lead">Associated staff</h3>
      <div class="row">
        @foreach($coll['curators'] as $curator)
          <div class="col-md-3 mb-3">
            <div class="card h-100">
              @if(!is_null($curator['staff_profiles_id']['profile_image']))
                <div class="embed-responsive embed-responsive-1by1">
                  <a href="{{ route('research-profile', $curator['staff_profiles_id']['slug']) }}"><img
                    class="img-fluid embed-responsive-item" src="{{ $curator['staff_profiles_id']['profile_image']['data']['thumbnails'][2]['url']}}"
                    loading="lazy"
                    alt="{{ $curator['staff_profiles_id']['profile_image_alt_text'] }}"
                    height="{{ $curator['staff_profiles_id']['profile_image']['data']['thumbnails'][2]['height'] }}"
                    width="{{ $curator['staff_profiles_id']['profile_image']['data']['thumbnails'][2]['width'] }}"
                    /></a>
                  </div>
                @else
                  <a href="{{ route('research-profile', $curator['staff_profiles_id']['slug']) }}"><img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
                  alt="A stand in image "/></a>
                @endif
                <div class="card-body">
                  <div class="contents-label mb-3">
                    <h3 class="lead">
                      <a href="{{ route('research-profile', $curator['staff_profiles_id']['slug']) }}">{{ $curator['staff_profiles_id']['display_name']}}</a>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @endsection
  @endif
@endforeach
