@include('includes.structure.name-spaces')

<head>

    @include('includes.structure.meta')

    @include('includes.css.css')
    <link rel="stylesheet" href="{{ URL::asset('css/support.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/support-default.css') }}">

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
    <main>


        @if (Request::is('support-us/pay-what-you-wish'))
            @include('support.pages.pay-what-you-wish')
        @endif

        @if (Request::is('support-us/make-a-donation'))
            @include('support.pages.ways-to-donate')
        @endif

        @if (Request::is('support-us/become-a-friend'))
            @include('support.pages.become-a-friend')
        @endif

        @if (Request::is('support-us/corporate-support'))
            @include('support.pages.corporate-support')
        @endif

    </main>

    @include('includes.structure.email-signup')

    @include('includes.structure.footer')

    @include('includes.scripts.javascript')
</body>

</html>
