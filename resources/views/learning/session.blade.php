@extends('layouts/layout')
@foreach($session['data'] as $page)
  @section('title', $page['title'])
  @section('hero_image', $page['hero_image']['data']['full_url'])
  @section('hero_image_title', $page['hero_image_alt_text'])
  @section('description', $page['meta_description'])
  @section('keywords', $page['meta_keywords'])
    @section('content')
    <h3>Session Description</h3>
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
    @markdown($page['description'])
    <p>
      Contact us on 01223 332904 or <a href="mailto:education@fitzmuseum.cam.ac.uk">email</a>
       to book, or to discuss your needs.
    </p>
    </div>
    <h3>Format of the session</h3>
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
    @markdown($page['format_session'])
    </div>

    @if(isset($page['quote']))
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
    <blockquote class="blockquote">
      @markdown($page['quote'])
    </blockquote>
    </div>
    @endif

    <h3>More about this session</h3>
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
      <ul>
        @if(isset($page['key_stages']) && !empty($page['key_stages']))
        <li>Key stages appropriate:
          @php
          echo implode(', ', $page['key_stages']);
          @endphp
        </li>
        @endif

        @if(isset($page['curriculum_link']) && !empty($page['curriculum_link']))
        <li>Curriculum links:
          @php
          echo implode(', ', $page['curriculum_link']);
          @endphp
        </li>
        @endif

        @if(isset($page['session_type']) && !empty($page['session_type']))
        <li>Session type:
          @php
          echo implode(', ', $page['session_type']);
          @endphp
        </li>
        @endif

        @if(isset($page['type_of_activity']) && !empty($page['type_of_activity']))
        <li>Type of activity:
          @php
          echo implode(', ', $page['type_of_activity']);
          @endphp
        </li>
        @endif
      </ul>
    </div>

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

    @if(!empty($records))
      @section('mlt')
      <div class="container">
        <h3>Other related schools sessions</h3>
        <div class="row">
          @foreach($records as $record)
          <div class="col-md-4 mb-3">
            <div class="card card-body h-100">
              @if(!is_null($record['thumbnail']))
                <img class="img-fluid" src="{{ $record['thumbnail'][0]}}"
                alt="Featured image for the session: {{ $record['title'][0] }}"
                loading="lazy"/>
              @else
                <img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
                alt="The Fitzwilliam Museum's gallery 3 roof" loading="lazy"/>
              @endif
              <div class="container h-100">

                <div class="contents-label mb-3">
                  <h3>
                    <a href="/learning/school-sessions/{{ $record['slug'][0]}}">{{ $record['title'][0] }}</a>
                  </h3>

                </div>
              </div>
              <a href="/learning/school-sessions/{{ $record['slug'][0]}}" class="btn btn-dark">Read more</a>
            </div>

          </div>
          @endforeach
        </div>
      </div>
      @endsection
    @endif
@endforeach
