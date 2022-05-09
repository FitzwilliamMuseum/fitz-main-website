<html lang="en">
    <head>
        <title>True to Nature - Peripleo map</title>
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
    </body>

</html>
