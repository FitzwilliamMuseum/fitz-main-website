@extends('layouts.stories')
@section('title','Stories')
@section('hero_image', env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('description', 'News stories from the Fitzwilliam Museum, Cambridge University')
@section('keywords', 'news,stories,museum,cambridge')
@section('content')
    <div class="row">
        @foreach($news['data'] as $news)
            
        @endforeach
    </div>
    {{ $paginator->appends(request()->except('page'))->links() }}
@endsection
