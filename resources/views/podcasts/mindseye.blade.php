@extends('layouts.layout')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")

@foreach($mindseye['data'] as $podcast)
  @section('description', $podcast['meta_description'])
  @section('title', $podcast['title'])


  @section('content')


    <div class="row ">


      <!-- column two -->
      <div class="col-md-5 mt-3">
        <div class="col shadow-sm p-3 mx-auto mb-3">
          <div class="embed-responsive embed-responsive-21by9">
            @include('includes/social/libsyn')
          </div>
        </div>
        <div class="col shadow-sm p-3 mx-auto mb-3">
          {!! $podcast['story'] !!}
        </div>
        @if(!empty($podcast['author_headshot']))
        <div class="col shadow-sm p-3 mx-auto mb-3">
          <img src="{{ $podcast['author_headshot']['data']['full_url'] }}" class="img-fluid"/>
        </div>
      @endif

      </div>
      <!-- End of column two -->
      <!-- Column one -->
      <div class="col-md-7 mb-3">
        <div class=" shadow-sm p-3 mb-3 mt-3">
          <figure class="figure">
            <img src="{{ $podcast['hero_image']['data']['full_url'] }}"
            class="img-fluid" alt="{{ $podcast['title'] }}" loading="lazy"
            width="{{ $podcast['hero_image']['width'] }}"
            height="{{ $podcast['hero_image']['height'] }}"
            />
          </figure>


        </div>



          @if(!empty($adlib))
            @foreach($adlib as $record)
              <h4>
                Collections database information
              </h4>
              <div class="shadow-sm p-3 mx-auto mb-3 mt-3 collections">

                @include('includes/elements/descriptive')

                @include('includes/elements/lifecycle')

                @include('includes/elements/identification-insta')

              </div>
            @endforeach
          @endif
      </div>
      <!-- End of column one -->

    </div>



  @endsection
@endforeach
