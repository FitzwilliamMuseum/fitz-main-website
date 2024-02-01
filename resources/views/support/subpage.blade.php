{{-- Subpage Template - WIP --}}
@include('includes.structure.name-spaces')

<head>

    @include('includes.structure.meta')

    @include('includes.css.css')
    <link rel="stylesheet" href="{{ URL::asset('css/support.css') }}">

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

        @include('includes.structure.nav')

        @include('includes.structure.email-signup')

        <h1>Subpage under construction - Check back later!</h1>

        @include('includes.structure.footer')

        @include('includes.scripts.javascript')

    </body>

</html>