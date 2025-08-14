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
    <script>
        // Include the following lines to define the gtag() function when
        // calling this code prior to your gtag.js or Tag Manager snippet
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        // Call the default command before gtag.js or Tag Manager runs to
        // adjust how the tags operate when they run. Modify the defaults
        // per your business requirements and prior consent granted/denied, e.g.:
        gtag('consent', 'default', {
            'ad_storage': 'denied',
            'ad_user_data': 'denied',
            'ad_personalization': 'denied',
            'analytics_storage': 'denied'
        });

    </script>
</head>
<body class="doc-body c_darkmode">
@include('googletagmanager::body')
    <main id="site-content">
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
