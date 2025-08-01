@extends('layouts.layout')
@section('title', $resource['title'])
@section('hero_image', $resource['hero_image']['data']['url'])
@section('hero_image_title', $resource['hero_image_alt_text'])
@section('description', 'A list of files from the Education department of the Fitzwilliam Museum')
@section('keywords', 'download,resources,painting,greece,rome,egypt,paintings')

@section('content')
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 ">
    @markdown($resource['body'])
</div>

<h2>
    Downloadable resources
</h2>
@if(!empty($resource['associated_learning_files']))
<div class="row">
    @foreach($resource['associated_learning_files'] as $file)
    <div class="col-md-4 mb-3">
        <div class="card" data-component="card">
            <div class="l-box l-box--no-border card__text">
                <h3 class="card__heading">
                    {{ $file['learning_files_id']['title'] ?? 'Error'}}
                </h3>
                <ul>
                    <li>
                        Resource type: {{ ucfirst($file['learning_files_id']['type'] ?? $file['id']) }}
                    </li>
                    <li>
                        File size: @humansize($file['learning_files_id']['file']['filesize'],2)
                    </li>
                    @if(isset($file['learning_files_id']['file']['type']))
                    <li>
                        File type: PDF
                    </li>
                    @endif
                </ul>
                <div class="mt-3">
                    <a href="{{ $file['learning_files_id']['file']['data']['url'] }}" class="btn btn-dark">
                        <i class="fa fa-download mr-2" aria-hidden="true"></i> Download file
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
@endsection
