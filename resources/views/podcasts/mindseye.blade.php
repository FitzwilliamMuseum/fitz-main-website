@extends('layouts.layout')
@section('hero_image',env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")

@section('description', $mindseye['meta_description'])
@section('title', $mindseye['title'])


@section('content')
    <div class="row ">
        <!-- column two -->
        <div class="col-md-7 mt-3">
            <div class="col shadow-sm p-3 mx-auto mb-3">
                <div class="libsyn">
                    @include('includes.social.libsyn')
                </div>
            </div>
            @if(!empty($mindseye['author_poem']))
                <div class="col shadow-sm p-3 mx-auto mb-3">
                    {!! $mindseye['author_poem'] !!}
                </div>
            @endif
            @if(!empty($mindseye['author_response']))
                <h3>The artist's response</h3>
                <div class="col shadow-sm p-3 mx-auto mb-3">
                    <figure class="figure">
                        <img class="img-fluid" src="{{ $mindseye['author_response']['data']['thumbnails'][4]['url'] }}"
                             alt="$mindseye['author_response_caption']"/>
                        @if(!empty($mindseye['author_response_caption']))
                            <figcaption class="figure-caption">{{ $mindseye['author_response_caption'] }}</figcaption>
                        @endif
                    </figure>
                </div>
            @endif

            <div class="col shadow-sm p-3 mx-auto mb-3">
                {!! $mindseye['story'] !!}
            </div>

            @if(!empty($mindseye['transcript']))
                <h3>
                    Podcast transcript
                </h3>
                <div class="shadow-sm p-3 mx-auto mb-3 mt-3 collections">
                    <p>
                        <em>
                            This transcript was generated using Amazon Speech Recognition;
                            there maybe errors in this text. Please do point any errors that
                            you find out using the feedback widget at the bottom corner of this page.
                        </em>
                    </p>
                    @php
                        $count = count($mindseye['transcript']);
                        $start = array_slice($mindseye['transcript'],0,12);
                        if($count > 12) {
                          $end = array_slice($mindseye['transcript'],12, $count);
                        }
                    @endphp

                    @if($count > 12)
                        <a class="btn btn-dark mx-2 mb-2 collapsed" data-bs-toggle="collapse" href="#transcript"
                           role="button" aria-expanded="false" aria-controls="transcript">
                            <span class="if-collapsed">Show full transcript</span>
                            <span class="if-not-collapsed">Hide full transcript</span>
                        </a>
                        <ol>
                            @foreach ($start as $transcript)
                                <li>
                                    {{ $transcript['start_time'] }} - {{ $transcript['end_time'] }}<br/>
                                    <span class="badge badge-secondary p-2">{{ $transcript['speaker'] }}</span>
                                    {{ $transcript['comment'] }}
                                </li>
                            @endforeach
                        </ol>
                        <hr/>
                        <div class="collapse" id="transcript">
                            <ol>
                                @foreach ($end as $transcript)
                                    <li>
                                        {{ $transcript['start_time'] }} - {{ $transcript['end_time'] }}<br/>
                                        <span class="badge bg-dark p-2">{{ $transcript['speaker'] }}</span>
                                        {{ $transcript['comment'] }}
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    @else
                        <ol>
                            @foreach ($mindseye['transcript'] as $transcript)
                                <li>
                                    {{ $transcript['start_time'] }} - {{ $transcript['end_time'] }}:
                                    <strong>{{ $transcript['speaker'] }}</strong><br/>
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
            <div class="shadow-sm p-3 mb-3 mt-3">
                <figure class="figure">
                    <img src="{{ $mindseye['hero_image']['data']['full_url'] }}"
                         class="img-fluid" alt="{{ $mindseye['title'] }}" loading="lazy"
                         width="{{ $mindseye['hero_image']['width'] }}"
                         height="{{ $mindseye['hero_image']['height'] }}"
                    />

                </figure>
            </div>

            @if(!empty($adlib))
                @foreach($adlib as $record)
                    <h3>
                        About the object
                    </h3>
                    <div class="shadow-sm p-3 mx-auto mb-3 mt-3 collections">

                        @include('includes.elements.descriptive')

                        @include('includes.elements.lifecycle')

                        @include('includes.elements.identification-insta')

                    </div>
                @endforeach
            @endif

            @if(!empty($mindseye['author_headshot']))
                <div class="col shadow-sm p-3 mx-auto mb-3">
                    <figure class="figure">
                        <img src="{{ $mindseye['author_headshot']['data']['full_url'] }}"
                             class="img-fluid"
                             alt="{{ $mindseye['author_caption'] }}"
                        />
                        @if(!empty($mindseye['author_caption'] ))
                            <figcaption class="figure-caption">
                                {{ $mindseye['author_caption'] }}
                            </figcaption>
                        @endif
                    </figure>
                </div>
            @endif

            @if(!empty($mindseye['author_bio']))
                <div class="col shadow-sm p-3 mx-auto mb-3">
                    {!! $mindseye['author_bio'] !!}
                </div>
            @endif
        </div>

    </div>
    <!-- End of column one -->

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
