@include('includes.structure.name-spaces')
<head>
    <script src="{{ url('/') }}/umd/UV.js"></script>
    <link rel="stylesheet" type="text/css" href="/uv.css"/>
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
<body class="doc-body c_darkmode">
@include('googletagmanager::body')
    <main>
        <span id="site-content" class="visually-hidden"></span>
        @yield('content')
    </main>
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
