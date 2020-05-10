@extends('layouts/layout')
@foreach($res['data'] as $page)
@section('title', $page['title'])
@section('hero_image', $page['hero_image']['data']['full_url'])
@section('hero_image_title', $page['hero_image_alt_text'])
@section('description', 'A list of files from the Education department of the Fitzwilliam Museum')
@section('keywords', 'download,resources,painting,greece,rome,egypt,paintings')

  @section('content')
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
    @markdown($page['body'])
  </div>

  <h2>
    Downloadable resources
  </h2>
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
      <ul>
      @foreach($page['associated_learning_files'] as $files)
        <li>
          <a href="{{ $files['learning_files_id']['file']['data']['full_url']}}">{{ $files['learning_files_id']['title'] }}
            @if(!is_null($files['learning_files_id']['keystages'])) - {{ implode(', ', $files['learning_files_id']['keystages']) }} @endif</a>
      </li>
      @endforeach
      </ul>
    </div>
  @endsection
@endforeach
