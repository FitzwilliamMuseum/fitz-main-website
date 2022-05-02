<html>

<head>
    <title>@yield('title')</title>
    <style type="text/css">
        html {
            overflow: auto;
        }

        html,
        body,
        div,
        iframe {
            margin: 0px;
            padding: 0px;
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
