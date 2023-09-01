@extends('layouts.layout')
@section('title', 'Events')
@section('hero_image', env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('description', 'The Fitzwilliam Museum runs a rich programme of events')
@section('keywords', 'events,fitzwilliam')
@section('content')

    {{--

    This alert box was previously used to display contact info, but it could also be used
    to display other information if needed.

    <div class="alert alert-info mb-3 text-center">
        For assistance with booking and ticketing enquiries, please contact us.<br />
        @svg('fas-envelope', ['width' => 20, 'height' => 20]): <a href="mailto:tickets@museums.cam.ac.uk">tickets@museums.cam.ac.uk</a> @svg('fas-phone', ['width' => 20, 'height' => 20]): +44
        (0)1223
        333 230
        <br />
        Available 10:00 - 17:00 Tuesday to Saturday, 12:00 - 17:00 Sunday, closed Monday.
    </div>
    --}}


    <div class="container">
        @php
            use Illuminate\Support\Arr;
            $types = Arr::pluck($productions, 'FacilityDescription');
            $ids = Arr::pluck($productions, 'Facility');
            $tags = array_count_values($types);
            usort($productions, function ($a, $b) {
                return strtotime($a->PerformanceDate) - strtotime($b->PerformanceDate);
            });
        @endphp

        <div class="row">
            <div class="row">
                @foreach ($events['data'] as $type)
                    <x-image-card :altTag="$type['title']" :title="$type['title']" :image="$type['hero_image']" :route="'events.type'" :params="['kid' => $type['event_id']]">
                    </x-image-card>
                @endforeach
            </div>
        </div>
    </div>
@endsection
