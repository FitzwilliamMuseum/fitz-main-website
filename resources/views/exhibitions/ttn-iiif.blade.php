@extends('layouts.ttn-iiif')
@section('title', $label[0]['title'])
@section('content')
    <div id="uv" class="uv"></div>

    <script>
        var uv = UV.init(
            "uv",
            {
                manifestUri: "{{$label[0]['manifest_url']}}",
                configUri: "{{ url('/') }}/config.json",
            },
        );
    </script>

@endsection


