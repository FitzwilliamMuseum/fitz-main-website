@extends('layouts.layout')

@foreach($departments['data'] as $dept)
  @section('title', $dept['title'])
  @section('keywords', $dept['meta_keywords'])
  @section('description', $dept['meta_description'])
  @section('hero_image', $dept['hero_image']['data']['full_url'])
  @section('hero_image_title', $dept['hero_image_alt_text'])

  @section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3">
      @markdown($dept['department_description'])
    </div>
  @endsection
  @if(!empty($dept['associated_galleries']))
    @section('galleries')
    <div class="container">
      <h2>Associated Galleries</h2>
      <div class="row">
        @foreach($dept['associated_galleries'] as $gallery)
        <div class="col-md-4 mb-3">
          <div class="card h-100">
            @if(!is_null($gallery['galleries_id']['hero_image']))
            <div class="embed-responsive embed-responsive-4by3">
            <a href="/visit-us/galleries/{{ $gallery['galleries_id']['slug']}}"><img class="img-fluid embed-responsive-item" src="{{ $gallery['galleries_id']['hero_image']['data']['thumbnails'][4]['url']}}"
            alt="{{ $gallery['galleries_id']['hero_image_alt_text'] }}" loading="lazy"
            width="{{ $gallery['galleries_id']['hero_image']['data']['thumbnails'][4]['width'] }}"
            height="{{ $gallery['galleries_id']['hero_image']['data']['thumbnails'][4]['height'] }}"
            /></a>
          </div>
            @endif
            <div class="card-body ">
              <div class="contents-label mb-3">
                <h3>
                  <a href="/visit-us/galleries/{{ $gallery['galleries_id']['slug']}}">{{ $gallery['galleries_id']['gallery_name']}}</a>
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

@section('cons-areas')
  @if($dept['slug'] == 'conservation-and-collections-care')
    @inject('departmentsController', 'App\Http\Controllers\departmentsController')
    @php
    $areas = $departmentsController::areas();
    $blog = $departmentsController::conservationblog();
    @endphp
    @include('includes.structure.areas')
    @include('includes.structure.cons-blog')
  @endif

  @if($dept['slug'] == 'hamilton-kerr-institute')
    @inject('departmentsController', 'App\Http\Controllers\departmentsController')
    @php
    $blog = $departmentsController::hkiblog();
    @endphp
    @include('includes.structure.cons-blog')
  @endif
@endsection
@endforeach
