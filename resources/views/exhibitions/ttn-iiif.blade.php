@extends('layouts.ttn-iiif')
@section('title', $label[0]['title'])
@section('content')
    <div id="uv" class="uv"></div>
    <script>
        let uv = UV.init(
            "uv",
            {
                manifestUri: "{{$label[0]['manifest_url']}}",
                configUri: "{{ url('/') }}/config.json",
            },
            new UV.URLDataProvider()
        );

        uv.on("created", function () {
            uv.resize();
        });
    </script>
@endsection


