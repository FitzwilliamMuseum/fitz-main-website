@extends('layouts.ttn-iiif')
@section('title', $label[0]['title'])
@section('content')
    <div id="uv" class="uv"></div>
    <script>
        var urlAdaptor = new UV.IIIFURLAdaptor();
        const data = urlAdaptor.getInitialData({
            manifest: "{{ $label[0]['manifest_url'] }}",
            // embedded: true // needed for codesandbox frame
        });
        uv = UV.init("uv", data);
        urlAdaptor.bindTo(uv);
    </script>

@endsection


