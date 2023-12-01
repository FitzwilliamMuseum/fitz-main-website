@extends('layouts.layout')
@section('title', 'Access Hockney Press image bank')
@section('description', 'Sign up for press images')
@section('keywords', 'press,release,fitzwilliam')
@foreach($terms['data'] as $term)
@section('hero_image', $term['hero_image']['data']['full_url'])
@endforeach
@section('content')
@foreach($terms['data'] as $term)
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto">
    {!!$term['terms'] !!}
</div>
@endforeach
<div class="col-12 col-max-800 shadow-sm py-3 mx-auto mt-4">
    <div class="col-md-6">
        <form method="GET" class="form" action="https://pages.wordfly.com/fitzwilliammuseum/pages/Subscribe/"
            target="_blank">
            <label for="wordfly-email">Subscribe to our list</label>
            <input type="email" id="wordfly-email" name="email" placeholder="Email Address" required
                class="form-control " />
            <button class="my-2 btn btn-dark">Submit your email</button>
        </form>
    </div>
</div>
@endsection