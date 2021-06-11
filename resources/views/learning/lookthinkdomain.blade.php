@extends('layouts/layout')
@section('title', 'Look, Think, Do')
@section('hero_image', 'https://content.fitz.ms/fitz-website/assets/SpringtimeWEB.jpg?key=directus-large-crop')
@section('hero_image_title', 'Springtime by Claude Monet')
@section('description', 'A set of exercises for families and learners to do at home')
@section('keywords', 'schools, monet,millais,art,ramesses III, fitzwilliam')
  @section('content')
  <h2 class="lead">
    Look, Think, Do activities
  </h2>
  <div class="col-12 shadow-sm p-3 mx-auto mb-3">
    <p>
      These activities have been designed as a starting point for looking, talking and doing together.
      We will be adding new entries throughout April and May 2020.
    </p>
    <p>
      The Look and Think activities should take 5 -10 minutes.
    </p>
    <p>
      The Do activities might take longer depending on the task and how creative you are feeling!
    </p>
    <p>
      Answers and suggestions about how to find out more at the bottom of each page.
    </p>
    <p>
      Have fun and don't forget to share your creations using #FitzVirtual #LookThinkDo.
    </p>
    <p>
      <a href="https://drive.google.com/file/d/1vGjaXixzXLJ6J__-EqUE0Ah141eyL1Pk/view">Notes for parents and teachers</a>
    </p>
  </div>
  <div class="row">
    @foreach($ltd['data'] as $look)
    <div class="col-md-4 mb-3">
      <div class="card h-100">
        <a href="{{ route('ltd-activity', $look['slug']) }}"><img class="img-fluid" src="{{ $look['focus_image']['data']['thumbnails'][4]['url']}}"
        alt="{{ $look['focus_image_alt_text'] }}"
        width="{{ $look['focus_image']['data']['thumbnails'][4]['width'] }}"
        height="{{ $look['focus_image']['data']['thumbnails'][4]['height'] }}"
        loading="lazy"/></a>
        <div class="card-body h-100">
          <div class="contents-label mb-3">
            <h3 class="lead">
              <a href="{{ route('ltd-activity', $look['slug']) }}">{{ $look['title_of_work'] }}</a>
            </h3>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @endsection
