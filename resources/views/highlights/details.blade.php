@extends('layouts.highlights')
@foreach($pharos['data'] as $record)
  @section('keywords', $record['meta_keywords'])
  @section('description', $record['meta_description'])
  @section('title')
    @php
      $title = markdown($record['title']);
    @endphp
    {{ strip_tags($title) }}
  @endsection
  @section('hero_image', $record['image']['data']['url'])
  @section('hero_image_title', $record['image_alt_text'])
  @section('content')
    <div class="text-center">
      <figure class="figure">
        <img src="{{ $record['image']['data']['url']}}"
        alt="{{ $record['image_alt_text'] }}" class="img-fluid"
        loading="lazy"
        height="{{ $record['image']['height'] }}"
        width="{{ $record['image']['width'] }}"
        />
        <figcaption class="figure-caption text-right">{{$record['image_alt_text']}}</figcaption>
      </figure>
    </div>
    <div class="p-3 mx-auto mb-3">
      @markdown($record['description'])
    </div>

    <h3 class="lead">Themes and periods</h3>
    <div class="col-12 shadow-sm p-3 mx-auto mb-3">

      @if(isset($record['period_assigned']))
        <a href="/objects-and-artworks/highlights/periods/{{ Str::slug($record['period_assigned'],'-') }}" class="btn btn-dark mr-2 mt-2">{{$record['period_assigned']}}</a>
      @endif
      @if(isset($record['themes']))
        @foreach($record['themes'] as $th)
          <a href="/objects-and-artworks/highlights/themes/{{$th}}" class="btn btn-dark mr-2 mt-2">{{str_replace('-',' ',$th)}}</a>
        @endforeach
      @endif
    </div>
  @endsection

  @if(!is_null($record['map']))
    @section('map')
      @map(
        [
          'lat' => $record['map']['lat'],
          'lng' => $record['map']['lng'],
          'zoom' => 6,
          'markers' => [
            ['title' => 'Place of origin',
            'lat' => $record['map']['lat'],
            'lng' => $record['map']['lng'],
            'popup' => 'Place of origin',],
          ],
        ]
        )
      @endsection
    @endif

    @section('youtube')
      @if(!empty($record['youtube_id']))
        <div class="container">
          <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" title="A video from YouTube related to {{ $record['title'] }}"
              src="https://www.youtube.com/embed/{{$record['youtube_id']}}" frameborder="0"
              allowfullscreen></iframe>
            </div>
          </div>
        </div>
      @endif
    @endsection

    @section('sketchfab-collection')
      @if(!empty($record['sketchfab_id']))
        <div class="container">
          <h2 class="lead">3D scan</h2>
          <div class="col-12 shadow-sm p-3 mx-auto mb-3">
            <div class="embed-responsive embed-responsive-4by3">
              <iframe title="A 3D model of {{ $record['title'] }}" class="embed-responsive-item"
              src="https://sketchfab.com/models/{{ $record['sketchfab_id']}}/embed?"
              frameborder="0" allow="autoplay; fullscreen; vr" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
            </div>
          </div>
        </div>
      @endif
    @endsection


    @if(!empty($record['audio_guide']))
      @section('audio-guide')
        @include('includes.elements.audio-guide')
      @endsection
    @endif

    @if(!empty($record['associated_pharos_content']))
      @section('pharos-pages')
        <div class="container">
          <h3 class="lead">Stories, Contexts and Themes</h3>
          <div class="row">
            @foreach($record['associated_pharos_content'] as $pharosassoc)
              <div class="col-md-4 mb-3">
                <div class="card  h-100">
                  @if(!is_null($pharosassoc['pharos_pages_id']['hero_image']))
                    <a href="/objects-and-artworks/highlights/context/{{ $pharosassoc['pharos_pages_id']['section']}}/{{ $pharosassoc['pharos_pages_id']['slug']}}"><img class="img-fluid" src="{{ $pharosassoc['pharos_pages_id']['hero_image']['data']['thumbnails'][4]['url']}}"
                      alt="{{ $pharosassoc['pharos_pages_id']['hero_image_alt_text'] }}"
                      loading="lazy"/></a>
                    @else
                      <img src="https://fitz-cms-images.s3.eu-west-2.amazonaws.com/fvlogo.jpg" class="rounded img-fluid"  />
                    @endif
                    <div class="card-body h-100">
                      <div class="contents-label mb-3">
                        <h3 class="lead"><a href="/objects-and-artworks/highlights/context/{{ $pharosassoc['pharos_pages_id']['section']}}/{{ $pharosassoc['pharos_pages_id']['slug']}}">{{ $pharosassoc['pharos_pages_id']['title']}}</a></h3>
                      </div>
                    </div>
                  </div>

                </div>
              @endforeach
            </div>
          </div>
        @endsection
      @endif

      @if(!empty($records))
        @section('mlt')
          <div class="container">
            <h3 class="lead">Other highlight objects you might like</h3>
            <div class="row">
              @foreach($records as $record)
                <div class="col-md-4 mb-3">
                  <div class="card  h-100">
                    @if(!is_null($record['smallimage']))
                      <a href="{{ $record['url'][0] }}"><img class="img-fluid" src="{{ $record['smallimage'][0]}}"
                        alt="Highlight image for {{ $record['title'][0] }}" loading="lazy"/></a>
                      @endif
                      <div class="card-body h-100">
                        <div class="contents-label mb-3">
                          <h3 class="lead">
                            <a href="{{ $record['url'][0] }}">@markdown($record['title'][0])</a>
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

      @section('adlib')
        @if(!empty($adlib))
          @foreach($adlib as $record)
            <h3 class="lead sr-only">Data from our collections database</h3>
            @include('includes/elements/expander')
            <div id="expand-more" class="collapse">
            <div class="col-12 shadow-sm p-3 mx-auto mb-3">

              @include('includes/elements/descriptive')

              @include('includes/elements/legal')

              @include('includes/elements/lifecycle')

              @include('includes/elements/measurements')

              @include('includes/elements/agents-subjects')

              @include('includes/elements/medium')

              @include('includes/elements/materials')

              @include('includes/elements/techniques')

              @include('includes/elements/inscriptions')

              @include('includes/elements/department')

              @include('includes/elements/identification')

            </div>
          </div>
          @endforeach
        @else
          @foreach($pharos['data'] as $record)

            <div class="col-12 shadow-sm p-3 mx-auto mb-3">
              <h3 class="lead">Further information</h3>
              <ul>
                <li>Collections ID: {{$record['adlib_id']}}</li>
                @if(!is_null($record['place_of_origin']))
                  <li>Place of origin: {{ $record['place_of_origin'] }}</li>
                @endif
                @if(!is_null($record['date']))
                  <li>Date: {{ $record['date'] }}</li>
                @endif
                @if(!is_null($record['maker'] ))
                  <li>Maker: {{ $record['maker'] }}</li>
                @endif
                @if(!is_null($record['material'] ))
                  <li>Material: {{ $record['material'] }}</li>
                @endif
                @if(!is_null($record['map']))
                  <li>Map coordinates: {{ $record['map']['lat'] }}, {{$record['map']['lng']}}</li>
                @endif
              </ul>

            </div>
          @endforeach

        @endif
      @endsection

      @if(!empty($shopify))
        @section('shopify')
          <div class="container py-3">
            <h4 class="lead">Suggested Curating Cambridge products</h4>
            <div class="row">
              @foreach($shopify as $record)
                <div class="col-md-4 mb-3">
                  <div class="card  h-100">
                    @if(!is_null($record['thumbnail']))
                      <div class="results_image">
                      <a href="{{ $record['url'][0] }}"><img class="results_image__thumbnail img-fluid" src="{{ $record['thumbnail'][0]}}"
                        alt="Featured image for the project: {{ $record['title'][0] }}"
                        loading="lazy"/></a>
                      </div>
                      @else
                      <div class="results_image">
                        <a href="{{ $record['url'][0] }}"><img class="results_image__thumbnail img-fluid" src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
                          alt="The Fitzwilliam Museum's gallery 3 roof" loading="lazy"/></a>
                      </div>
                        @endif
                        <div class="card-body h-100">
                          <div class="contents-label mb-3">
                            <h3 class="lead">
                              <a href="{{ $record['url'][0]  }}">{{ $record['title'][0] }}</a>
                            </h3>
                            <p>£{{ number_format((float)$record['price'][0], 2, '.', '') }}</p>

                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            @endsection
          @endif
