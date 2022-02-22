@extends('layouts.layout')

@section('hero_image',env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")

@foreach($directors['data'] as $director)
    @include('includes.elements.page-meta', $data = $director)
    @section('title', $director['display_name'])
@section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
        @if(!is_null($director['hero_image']))
            <figure class="figure">
                <img src="{{ $director['hero_image']['data']['url'] }}"
                     alt="{{$director['hero_image_alt_text']}}"
                     loading="lazy" class="img-fluid"
                />
                <figcaption class="figure-caption text-right">{{$director['hero_image_alt_text']}}</figcaption>
            </figure>
        @endif
        <p>
            Dates of office: {{ $director['date_from'] }}
            @if(!is_null($director['date_to']))
                - {{ $director['date_to'] }}
            @endif
        </p>
        @markdown($director['biography'])
    </div>
@endsection
@endforeach
