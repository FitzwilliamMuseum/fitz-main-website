@extends('layouts.layout')
@foreach($pages['data'] as $page)
  @section('title', $page['title'])
  @if(!empty($page['hero_image']))
    @section('hero_image', $page['hero_image']['data']['url'])
    @section('hero_image_title', $page['hero_image_alt_text'])
  @else
    @section('hero_image',env('CONTENT_STORE') . 'img_20190105_153947.jpg')
    @section('hero_image_title', "The inside of our Founder's entrance")
  @endif
  @section('description', $page['meta_description'])
  @section('keywords', $page['meta_keywords'])
@endforeach
@section('content')
<div class="col-12 shadow-sm p-3 mx-auto  ">
  @markdown($page['body'])
</div>
@endsection
@section('associated_pages')
  <div class="container">
    <div class="row">

      <div class="col-md-4 mb-3">
        <div class="card card-fitz h-100">
          <a href="{{route('research-profiles')}}">
            <img class="card-img-top" src="https://content.fitz.ms/fitz-website/assets/img_20191219_184304_832.jpeg?key=directus-medium-contain"
            alt="Eye of the minotaur" loading="lazy" />
          </a>
          <div class="card-body h-100">
            <h3>
              <a href="{{route('research-profiles')}}" class="stretched-link">
                Our active researchers
              </a>
            </h3>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <div class="card card-fitz h-100">
          <a href="{{route('opportunities')}}">
            <img class="card-img-top" src="https://content.fitz.ms/fitz-website/assets/IMG_20191022_152807.jpeg?key=directus-medium-crop"
            alt="Jennifer Wexler" loading="lazy" />
          </a>
          <div class="card-body h-100">
            <h3>
              <a href="{{route('opportunities')}}" class="stretched-link">
                Research opportunities
              </a>
            </h3>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <div class="card card-fitz h-100">
          <a href="{{route('research-projects')}}">
            <img class="card-img-top" src="https://content.fitz.ms/fitz-website/assets/XRF analysis of an illuminated mss at the Fitz.jpg?key=directus-medium-crop"
            alt="XRF analysis of a manuscript" loading="lazy" />
          </a>
          <div class="card-body h-100">
            <h3>
              <a href="{{route('research-projects')}}" class="stretched-link">
                Our research work
              </a>
            </h3>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <div class="card card-fitz h-100">
          <a href="{{route('resources')}}">
            <img class="card-img-top" src="https://content.fitz.ms/fitz-website/assets/4.-Dormition-of-the-Virgin-Italy-Venice-c.1420-Master-of-the-Murano-Gradual-active-c.1420-1440.jpg?key=directus-medium-crop"
            alt="A segment of a manuscript" loading="lazy" />
          </a>
          <div class="card-body h-100">
            <h3>
              <a href="{{route('resources')}}">Digital resources</a>
            </h3>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <div class="card card-fitz h-100">
          <a href="{{route('research-affiliates')}}">
            <img class="card-img-top" src="https://content.fitz.ms/fitz-website/assets/25th_november_131_2000x1000.jpg?key=directus-medium-crop"
            alt="A segment of a manuscript" loading="lazy" />
          </a>
          <div class="card-body h-100">
            <h3>
              <a href="{{route('research-affiliates')}}">Affiliated Researchers</a>
            </h3>
          </div>
        </div>
      </div>

    @foreach($associated['data'] as $project)
      <x-image-card
        :image="$project['hero_image']"
        :route="'landing-section'"
        :altTag="$project['hero_image_alt_text']"
        :title="$project['title']"
        :params="[$project['section'],$project['slug']]"></x-image-card>

    @endforeach
  </div>
</div>
@endsection
