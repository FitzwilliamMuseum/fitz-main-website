@php
    $hero = [
        'hero_title' => $exhibition['exhibition_title'],
        'hero_subtitle' => $exhibition['exhibition_title'],
        'start' => $exhibition["exhibition_start_date"],
        'end' => $exhibition["exhibition_end_date"]
    ]

@endphp
@include('includes.structure.name-spaces')

<head>

    @include('includes.structure.meta')

    @include('includes.css.css')

    @hasSection('map')
        @mapstyles
    @endif

    @include('includes.structure.manifest')

    @yield('jsonld')

    <x-feed-links></x-feed-links>

    @include('googletagmanager::head')

</head>

<body class="doc-body c_darkmode">
@include('googletagmanager::body')

@include('includes.structure.accessibility')

<x-exhibition-hero :hero="$hero"></x-exhibition-hero>

<x-exhibition-cta></x-exhibition-cta>



@include('includes.structure.email-signup')

@include('includes.structure.footer')

@include('includes.scripts.javascript')

</body>

</html>


