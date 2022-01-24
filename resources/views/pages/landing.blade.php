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
    <div class="col-12 shadow-sm p-3 mx-auto  ">
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
  @if(Request::is('learning'))
    @include('includes.elements.schools-project')
  @endif
  <div class="container">
    <div class="row">
      @foreach($associated['data'] as $project)
        <x-image-card :altTag="$project['hero_image_alt_text'] " :title="$project['title']"  :image="$project['hero_image']" :route="'landing-section'" :params="[$project['section'], $project['slug']]" />
      @endforeach
      @if(Request::is('about-us'))
        @inject('pagesController', 'App\Http\Controllers\pagesController')
        @php
          $governance = $pagesController::injectPages('about-us','governance-policies-and-reports');
          $comm = $pagesController::injectPages('commercial-services','commercial-services');
          $depart = $pagesController::injectPages('about-us','departments');
          $coll = $pagesController::injectPages('about-us','collections');
          $press = $pagesController::injectPages('about-us','press-room');
          $jobs = $pagesController::injectPages('about-us','work-for-us');
          $research = $pagesController::injectPages('research','research-and-impact');
        @endphp
        @include('includes.structure.cards', $data = $governance )
        @include('includes.structure.commercial', $data = $comm )
        @include('includes.structure.cards', $data = $depart)
        @include('includes.structure.cards', $data = $coll)
        @include('includes.structure.cards', $data = $press)
        <div class="col-md-4 mb-3">
          <div class="card card-fitz h-100">
            <a href="{{route('about.our.staff')}}">
              <img class="card-img-top" src="https://content.fitz.ms/fitz-website/assets/img_20191219_184304_832.jpeg?key=directus-medium-contain"
              alt="Eye of the minotaur" loading="lazy" />
            </a>
            <div class="card-body h-100">
              <h3>
                <a href="{{route('about.our.staff')}}" class="stretched-link">
                  Our staff
                </a>
              </h3>
            </div>
          </div>
        </div>
        @include('includes.structure.cards', $data = $jobs)
        @include('includes.structure.cards', $data =  $research)
      @endif
      </div>
    </div>
  @endsection
