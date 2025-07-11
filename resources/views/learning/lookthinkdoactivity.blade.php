@extends('layouts.layout')
@section('title','Look, think, do: ' . $ltd['title_of_work'])
@section('description', 'A Look Think Do page for ' . $ltd['title_of_work'])
@section('keywords', 'look,think,do,activity')
@if(isset($ltd['focus_image']['data']['full_url']))
@section('hero_image', $ltd['focus_image']['data']['url'])
@section('hero_image_title', $ltd['title_of_work'])
@endif

@section('content')
<div class="row ">
    <!-- Column one -->
    <div class="col-md-7 mb-3">
        <div class="shadow-sm p-3 mb-3 mt-3">
            <figure class="figure">
                <img src="{{ $ltd['focus_image']['data']['full_url'] }}" class="img-fluid"
                    alt="{{ $ltd['title_of_work'] }}" loading="lazy" width="{{ $ltd['focus_image']['width'] }}"
                    height="{{ $ltd['focus_image']['height'] }}" />
            </figure>
            <a class="btn btn-dark m-1 p-2" href="{{ $ltd['focus_image']['data']['full_url'] }}" target="_blank"
                download>@svg('fas-download', ['width' => 15, 'height'=> 15]) Download this image</a>
            <a rel="license" href="https://creativecommons.org/licenses/by-nc-sa/4.0/">
                <img alt="Creative Commons Licence" src="{{ asset('/images/logos/by-nc-nd.svg') }}" /></a>
        </div>
        @if(!is_null($ltd['main_text_description']))

        <div class="shadow-sm p-3 mx-auto">
            <h2 class="text-info">
                Description of this object or artwork
            </h2>
            @markdown($ltd['main_text_description'] ?? 'No description provided')
        </div>
        @endif
        @if(!is_null($ltd['object_metadata']))
        <div class="shadow-sm p-3 mx-auto mb-3 mt-3">
            @markdown($ltd['object_metadata'] ?? 'No metadata available')
        </div>
        @endif
        @if(isset($ltd['adlib_id_number']))
        @foreach($adlib as $record)
        @include('includes.elements.iiif')
        @endforeach
        @endif

    </div>
    <!-- End of column one -->

    <!-- column two -->
    <div class="col-md-5 mt-3">

        <div class="col shadow-sm p-3 mx-auto mb-3">
            <h2 class="text-info">
                Look
            </h2>
            {!! $ltd['look_text'] !!}
            @if(isset($ltd['look_answers']))
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#lookanswers">Answers
            </button>
            @endif
        </div>
        <div class="col shadow-sm p-3 mx-auto mb-3">
            <h2 class="text-info">
                Think
            </h2>
            {!! $ltd['think_text'] !!}
            @if(isset($ltd['think_answers']))
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#thinkanswers">Answers
            </button>
            @endif
        </div>

        <div class="col shadow-sm p-3 mx-auto mb-3">
            <h2 class="text-info">
                Do
            </h2>
            {!! $ltd['do_text'] !!}
            @if(isset($ltd['do_answers']))
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#doanswers">Answers
            </button>
            @endif
        </div>

        @if(isset($ltd['adlib_id_number']))
        <div class="col shadow-sm p-3 mx-auto mb-3">
            <h2 class="text-info">
                Collections record
            </h2>
            <p>
                {!! $ltd['adlib_id_number'] !!}
                @foreach($adlib as $record)
                @include('includes.elements.identificationltd')
                @endforeach
            </p>
        </div>

        @if(!empty($ltd['associated_pharos']))
        <h2>
            Highlight record
        </h2>

        <div class="col-md-4 mb-3">
            <div class="card" data-component="card">
                <div class="l-box l-box--no-border card__text">
                    <h3 class="card__heading">
                        <a class="card__link" href="{{ route('highlight', $ltd['associated_pharos'][0]['pharos_id']['slug']) }}">
                            {{ $ltd['associated_pharos'][0]['pharos_id']['title'] }}
                        </a>
                    </h3>
                </div>
                <div class="l-frame l-frame--3-2 card__image">
                    @if(!is_null($ltd['associated_pharos'][0]['pharos_id']['image']))
                        <img src="{{ $ltd['associated_pharos'][0]['pharos_id']['image']['data']['thumbnails'][13]['url'] }}"
                             alt=""
                             loading="lazy" />
                    @else
                        <img src="{{ env('MISSING_IMAGE_URL') }}"
                             alt=""
                             loading="lazy" />
                    @endif
                </div>
            </div>
        </div>
        @endif

        <!-- Sketchfab include -->
        @if(!empty($ltd['sketchfab_id']))
        <h2>3d model</h2>
        <div class="col shadow-sm p-3 mx-auto mb-3">

            <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">
                <div class="ratio ratio-4x3">
                    <iframe title="A 3D model related to {{ $ltd['title_of_work'] }}"
                        src="https://sketchfab.com/models/{{ $ltd['sketchfab_id'] }}/embed?"
                        allow="autoplay; fullscreen; vr" mozallowfullscreen="true"
                        webkitallowfullscreen="true"></iframe>
                </div>
            </div>
        </div>
        @endif
        <!-- End of Sketchfab include -->

        @endif
    </div>
    <!-- End of column two -->
</div>

@if($ltd['padlet_id'])
@include('includes.social.padlet')
@endif

@if($ltd['youtube_id'])
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 ">
    <div class="ratio ratio-16x9">
        <iframe title="A YouTube video related to {{ $ltd['title_of_work'] }}"
            src="https://www.youtube.com/embed/{{ $ltd['youtube_id'] }}" allowfullscreen></iframe>
    </div>
</div>
@endif

@if($ltd['vimeo_id'])
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 ">
    <div class="ratio ratio-16x9">
        <iframe title="A Vimeo video related to {{ $ltd['title_of_work'] }}"
            src="https://player.vimeo.com/video/{{$ltd['vimeo_id']}}" allowfullscreen></iframe>
    </div>
</div>
@endif

@endsection

@if(isset($ltd['look_answers']))
@section('lookanswers')
@include('includes.elements.lookanswers')
@endsection
@endif

@if(isset($ltd['think_answers']))
@section('thinkanswers')
@include('includes.elements.thinkanswers')
@endsection
@endif

@if(isset($ltd['do_answers']))
@section('doanswers')
@include('includes.elements.doanswers')
@endsection
@endif
