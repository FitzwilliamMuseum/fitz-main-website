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
  @if(!empty($page['associated_learning_files']))
  <h3>Factsheets and related files</h3>
  <div class="row">


    @foreach($page['associated_learning_files'] as $file)
    <div class="col-md-4 mb-3">
      <div class="card card-body h-100">
        <div class="container h-100">
          <div class="contents-label mb-3">
            <h3>
              {{ $file['learning_files_id']['title'] }}
            </h3>
            <ul>
              <li>Resource type: {{ ucfirst($file['learning_files_id']['type']) }}</li>
              <li>File size: @humansize($file['learning_files_id']['file']['filesize'],2)</li>
              @if(isset($file['learning_files_id']['file']['type']))
              <li>File type: PDF</li>
              @endif
            </ul>
          </div>
        </div>
        <a href="{{ $file['learning_files_id']['file']['data']['url'] }}" class="btn btn-dark"><i class="fa fa-download mr-2" aria-hidden="true"></i>  Download file</a>
      </div>
    </div>

    @endforeach
  </div>
  @endif
  @endsection
@endforeach
