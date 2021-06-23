@extends('layouts.layout')

@foreach($departments['data'] as $dept)
  @section('title', $dept['title'])
  @section('keywords', $dept['meta_keywords'])
  @section('description', $dept['meta_description'])
  @section('hero_image', $dept['hero_image']['data']['url'])
  @section('hero_image_title', $dept['hero_image_alt_text'])

  @section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3">
      @markdown($dept['body'])
    </div>
  @endsection
  @if(Route::currentRouteName() == 'conservation-care')
      @inject('departmentsController', 'App\Http\Controllers\departmentsController')
      @php
      $areas = $departmentsController::areasData($dept['slug']);
      @endphp
      @include('includes.structure.cons-research')
  @endif
@endforeach
