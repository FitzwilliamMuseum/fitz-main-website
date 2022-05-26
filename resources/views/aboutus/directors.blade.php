@extends('layouts.layout')
@section('title', 'Our directors')
@section('hero_image',env('CONTENT_STORE') . '1024px-picture_of_sidney_colvin.jpg')
@section('hero_image_title', 'A portrait of Sidney Colvin')
@section('description', 'A list and timeline of our directors')
@section('keywords', 'directors,timeline,museum,cambridge,fitzwilliam')
@section('content')
    <h2>
        Our directors
    </h2>
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Date from</th>
                    <th scope="col">Date to</th>
                    <th scope="col">Director</th>
                </tr>
                </thead>
                <tbody>
                @foreach($directors['data'] as $director)
                    <tr>
                        <td>{{ $director['date_from'] }}</td>
                        <td>{{ $director['date_to'] }}</td>
                        <td><a href="{{ route('director',[$director['slug']] ) }}">{{ $director['display_name'] }}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


