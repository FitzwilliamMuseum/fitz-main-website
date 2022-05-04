<!DOCTYPE html>
<html lang="en" dir="ltr"
      prefix="content: https://purl.org/rss/1.0/modules/content/  dc: https://purl.org/dc/terms/  foaf: https://xmlns.com/foaf/0.1/  og: https://ogp.me/ns#  rdfs: https://www.w3.org/2000/01/rdf-schema#  schema: https://schema.org/  sioc: https://rdfs.org/sioc/ns#  sioct: https://rdfs.org/sioc/types#  skos: https://www.w3.org/2004/02/skos/core#  xsd: https://www.w3.org/2001/XMLSchema# ">
<head>
    <script src="{{ url('/') }}/uv-assets/js/bundle.js"></script>
    <script src="{{ url('/') }}/uv-dist-umd/UV.js"></script>
    <link rel="stylesheet" type="text/css" href="/uv.css"/>
    <script src="https://unpkg.com/resize-observer-polyfill@1.5.1/dist/ResizeObserver.js"></script>
     @include('googletagmanager::head')
    <title>@yield('title')</title>
    <style>
        body {
            margin: 0;
        }
        #uv {
            width: 100vw;
            height: 100vh;
        }
    </style>
</head>
<body class="doc-body">
@include('googletagmanager::body')
@yield('content')
<script async src="https://www.googletagmanager.com/gtag/js?id={{ env('APP_GOOGLE_ANALYTICS') }}"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', '{{ env('APP_GOOGLE_ANALYTICS') }}');
</script>
</body>

</html>
