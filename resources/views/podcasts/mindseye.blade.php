@extends('layouts.layout')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")

@foreach($mindseye['data'] as $podcast)
  @section('description', $podcast['meta_description'])
  @section('title', $podcast['title'])


  @section('content')


    <div class="row ">


      <!-- column two -->
      <div class="col-md-7 mt-3">
        <div class="col shadow-sm p-3 mx-auto mb-3">
          <div class="embed-responsive libsyn">
            @include('includes/social/libsyn')
          </div>
        </div>
        <div class="col shadow-sm p-3 mx-auto mb-3">
          {!! $podcast['story'] !!}
        </div>

        @if(!empty($podcast['transcript']))
          <h4>
            Podcast transcript
          </h4>
          <div class="shadow-sm p-3 mx-auto mb-3 mt-3 collections">
            <p>This transcript was generated using Amazon Speech Recognition.</p>
            @php
            $count = count($podcast['transcript']);
            $start = array_slice($podcast['transcript'],0,12);
            if($count > 12) {
              $end = array_slice($podcast['transcript'],12, $count);
            }
            @endphp

            @if($count > 12)
              <a class="btn btn-dark mx-2 mb-2 collapsed" data-toggle="collapse" href="#transcript"
              role="button" aria-expanded="false" aria-controls="transcript">
              <span class="if-collapsed">Show full transcript</span>
              <span class="if-not-collapsed">Hide full transcript</span>
              </a>
              <ol>
                @foreach ($start as $transcript)
                  <li>
                    {{ $transcript['start_time'] }} - {{ $transcript['end_time'] }}: <strong>{{ $transcript['speaker'] }}</strong><br/>
                    {{ $transcript['comment'] }}
                  </li>
                @endforeach
              </ol>
              <hr/>
            <div class="collapse" id="transcript">
            <ol>
              @foreach ($end as $transcript)
                <li>
                  {{ $transcript['start_time'] }} - {{ $transcript['end_time'] }}: <strong>{{ $transcript['speaker'] }}</strong><br/>
                  {{ $transcript['comment'] }}
                </li>
              @endforeach
            </ol>
            </div>
            @else
              <ol>
                @foreach ($podcast['transcript'] as $transcript)
                  <li>
                    {{ $transcript['start_time'] }} - {{ $transcript['end_time'] }}: <strong>{{ $transcript['speaker'] }}</strong><br/>
                    {{ $transcript['comment'] }}
                  </li>
                @endforeach
              </ol>
            @endif

          </div>
        @endif



      </div>
      <!-- End of column two -->

      <!-- Column one -->
      <div class="col-md-5 mb-3">
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
              About the object
            </h4>
            <div class="shadow-sm p-3 mx-auto mb-3 mt-3 collections">

              @include('includes/elements/descriptive')

              @include('includes/elements/lifecycle')

              @include('includes/elements/identification-insta')

            </div>
          @endforeach
        @endif

        @if(!empty($podcast['author_headshot']))
          <div class="col shadow-sm p-3 mx-auto mb-3">
            <figure class="figure">
              <img src="{{ $podcast['author_headshot']['data']['full_url'] }}"
              class="img-fluid"
              alt="{{ $podcast['author_caption'] }}"
              />
              @if(!empty($podcast['author_caption'] ))
                <figcaption class="figure-caption">
                  {{ $podcast['author_caption'] }}
                </figcaption>
              @endif
            </figure>
          </div>
        @endif

        @if(!empty($podcast['author_bio']))
          <div class="col shadow-sm p-3 mx-auto mb-3">
            {!! $podcast['author_bio'] !!}
          </div>
        @endif
      </div>

    </div>
    <!-- End of column one -->

  </div>



@endsection

@if(!empty($suggest))
  @section('mlt')
    <div class="container">
      <h3>Similar podcasts to listen to</h3>
      <div class="row">
        @foreach($suggest as $record)
          <div class="col-md-4 mb-3">
            <div class="card h-100">
              @if(!is_null($record['searchImage']))
                <img class="img-fluid " src="{{ $record['searchImage'][0]}}"
                alt="Highlight image for {{ $record['title'][0] }}" loading="lazy"/>
              @endif
              <div class="card-body ">
                <div class="contents-label mb-3">
                  <h3>
                    <a href="{{ $record['url'][0] }}">{{ $record['title'][0] }}</a>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  @endsection
@endif
@endforeach
