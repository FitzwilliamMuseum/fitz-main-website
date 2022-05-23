@extends('layouts.layout')

@section('title', 'Work for us - Archived Vacancies')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('description', 'An overview of archived job vacancies')
@section('keywords', 'work,museum,jobs')
@section('content')

    @if(!empty($vacancies->total() > 0))
        <div class="row">
            @foreach($vacancies->items()['data'] as $vacancy)
                <x-vacancy :vacancy="$vacancy"></x-vacancy>
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
    {{ $vacancies->appends(request()->except('page'))->setPath(route('vacancy.archive'))->links() }}

@endsection
