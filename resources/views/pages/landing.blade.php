@extends('layouts.layout')
@foreach($pages['data'] as $page)
  @section('title', $page['title'])
  @if(!empty($page['hero_image']))
    @section('hero_image', $page['hero_image']['data']['url'])
    @section('hero_image_title', $page['hero_image_alt_text'])
  @else
    @section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
    @section('hero_image_title', "The inside of our Founder's entrance")
  @endif

  @section('description', $page['meta_description'])
  @section('keywords', $page['meta_keywords'])
  @section('content')

    <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
      @markdown($page['body'])
    </div>
    @if($page['vimeo_id'])
      <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
        @include('includes.social.vimeo')
      </div>
    @endif
  @endsection
@endforeach

@section('associated_pages')
  <div class="container">
    <div class="row">
      @foreach($associated['data'] as $project)
        <div class="col-md-4 mb-3">
          <div class="card h-100">
            @if(!is_null($project['hero_image']))
              <a href="{{ route('landing-section', [$project['section'], $project['slug']]) }}"><img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"
                alt="{{ $project['hero_image_alt_text'] }}"
                width="{{ $project['hero_image']['data']['thumbnails'][4]['height'] }}"
                height="{{ $project['hero_image']['data']['thumbnails'][4]['width'] }}"
                loading="lazy" /></a>
              @endif
              <div class="card-body h-100">
                <h3 class="lead">
                  <a href="{{ route('landing-section', [$project['section'], $project['slug']]) }}">{{ $project['title']}}</a>
                </h3>
              </div>
            </div>
          </div>
        @endforeach
        @if(Request::is('about-us'))
          @inject('pagesController', 'App\Http\Controllers\pagesController')
          @php
          $governance = $pagesController::injectPages('about-us','governance-policies-and-reports');
          $support = $pagesController::injectPages('support-us','support-us');
          $comm = $pagesController::injectPages('about-us','commercial-services');
          $depart = $pagesController::injectPages('about-us','departments');
          $coll = $pagesController::injectPages('about-us','collections');
          $press = $pagesController::injectPages('about-us','press-room');
          $jobs = $pagesController::injectPages('about-us','work-for-us');
          @endphp
          @include('includes.structure.cards', $data = $governance )
          @include('includes.structure.cards', $data = $support )
          @include('includes.structure.cards', $data = $comm )
          @include('includes.structure.cards', $data = $depart)
          @include('includes.structure.cards', $data = $coll)
          @include('includes.structure.cards', $data = $press)
          @include('includes.structure.cards', $data = $jobs)
        @endif
      </div>
    </div>
  @endsection

  @section('twitter')
    @if(!empty($tweets))
      <div class="container">
        <h3 class="lead">
          Our Twitter profile
        </h3>
        @include('includes.social.tweets')
      </div>
    @endif
  @endsection
