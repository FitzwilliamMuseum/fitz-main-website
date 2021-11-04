@extends('layouts.layout')

@section('title', 'Work for us - Archived Vacancies')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('description', 'An overview of archived job vacancies')
@section('keywords', 'work,museum,jobs')
@section('content')

  {{-- @dd($vacancies['data']) --}}
  @if(!empty($vacancies['data']))
    <div class="row">
      @foreach($vacancies['data'] as $vacancy)
      <div class="col-md-4 mb-3">
        <div class="card  card-fitz h-100">
          @if(!is_null($vacancy['hero_image']))
            <a href="{{ route('vacancy', $vacancy['slug'])}}"><img class="img-fluid"
              src="{{ $vacancy['hero_image']['data']['thumbnails'][4]['url']}}"
            alt="A highlight image for {{ $vacancy['hero_image_alt_text'] }}"
            height="{{ $vacancy['hero_image']['data']['thumbnails'][4]['height'] }}"
            width="{{ $vacancy['hero_image']['data']['thumbnails'][4]['width'] }}"
            loading="lazy"/></a>
          @endif
          @if(Carbon\Carbon::parse($vacancy['expires'])->isPast())
            @include('includes.structure.jobexpired')
          @endif
          <div class="card-body h-100">
            <div class="contents-label mb-3">
              <h3 class="lead">
                <a href="{{ route('vacancy', $vacancy['slug'])}}">{{ $vacancy['job_title']}}</a>
              </h3>
              <p class="text-info">Closing Date: {{ Carbon\Carbon::parse($vacancy['expires'])->format('l dS F Y') }}</p>
              @if(isset($vacancy['salary_range']))
                <p class="text-danger">£ {{ $vacancy['salary_range'] }}</p>
              @endif

            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  @else
    <div class="col-12 shadow-sm p-3 mx-auto mb-3">
      <p>
        We do not have any vacancies in our archive at the moment.
        Thank you for your interest.
      </p>
    </div>
  @endif
@endsection
