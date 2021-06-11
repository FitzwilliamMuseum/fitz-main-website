@extends('layouts.layout')
@section('title', 'Have a conversation with the Fitzwilliam Museum')
@section('hero_image', 'https://api.fitz.ms/mediaLib/pdp/pdp2/PD_59_1950.jpg')
@section('hero_image_alt_text', 'Blake in conversation with John Varley')

@section('content')

  <div class="row">

    <div class="col-md-4 mb-3">
      <div class="card h-100">
        <a href="{{ route('mindeyes') }}"><img class="img-fluid" src="https://fitz-cms-images.s3.eu-west-2.amazonaws.com/imme.jpg"
          alt="In my mind's eye podcasts"

          loading="lazy"/></a>
          <div class="card-body h-100">
            <div class="contents-label mb-3">
              <h3 class="lead">
                In my mind's eye
              </h3>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <div class="card h-100">
          <a href="{{ route('podcasts') }}"><img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/cover-podcasts.jpg?key=directus-large-crop&q=50"
            alt="Podcasts symbol"

            loading="lazy"/></a>
            <div class="card-body h-100">
              <div class="contents-label mb-3">
                <h3 class="lead">
                  Our podcast archive
                </h3>
              </div>
            </div>
          </div>
        </div>

      <div class="col-md-4 mb-3">
        <div class="card h-100">
          <a href="{{ route('instagram') }}"><img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/instacover.png?key=directus-large-crop&q=50"
            alt="Our instagram profile"/></a>
            <div class="card-body h-100">
              <div class="contents-label mb-3">
                <h3 class="lead">
                  <a href="{{ route('instagram') }}">Instagram</a>
                </h3>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3">
          <div class="card h-100">
            <a href="{{ route('instagram') }}"><img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/ejpjb8sxcaa_jdg.jpg?key=directus-large-crop&q=50"
              alt="Our instagram profile"/></a>
              <div class="card-body h-100">
                <div class="contents-label mb-3">
                  <h3 class="lead">
                    <a href="{{ route('twitter') }}">Twitter</a>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



    @endsection
