@extends('layouts.layout')
@foreach($vacancies['data'] as $vacancy)

  @section('title', $vacancy['job_title'])
  @section('description',$vacancy['meta_description'])
  @section('keywords',$vacancy['meta_keywords'])

  @if(!empty($vacancy['hero_image']))
    @section('hero_image', $vacancy['hero_image']['data']['url'])
    @section('hero_image_title', $vacancy['hero_image_alt_text'])
  @else
    @section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
    @section('hero_image_title', "The inside of our Founder's entrance")
  @endif

  @section('content')
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 article" >
    @if(Carbon\Carbon::parse($vacancy['expires'])->isPast())
      @include('includes.structure.jobexpired')
    @endif
    @markdown($vacancy['job_description'])
    <p class="text-info lead">Closing date: <strong>{{  Carbon\Carbon::parse($vacancy['expires'])->format('l dS F Y') }}</strong></p>
    @isset($vacancy['job_pack'])
    <a href="{{ $vacancy['job_pack']['data']['full_url'] }}" class="btn btn-dark" download>
      Download the job pack
    </a>
  @endisset
  </div>
  @endsection
@endforeach
