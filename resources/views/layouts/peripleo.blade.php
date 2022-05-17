<html lang="en">
    <head>
        <title>True to Nature - Peripleo map</title>
        <meta name="description" content="Explore the True to Nature exhibition on a map"/>
        <style>
            html {
                overflow: auto;
            }
            html,
            body,
            div,
            iframe {
                margin: 0;
                padding: 0;
                height: 100%;
                border: none;
            }

            iframe {
                display: block;
                width: 100%;
                border: none;
                overflow-y: auto;
                overflow-x: hidden;
            }
        </style>
        @include('googletagmanager::head')
    </head>
    <body>
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
