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
    @include('includes.scripts.gtagconsent')
    @include('googletagmanager::head')

</head>
    <body class="doc-body c_darkmode">
        @include('googletagmanager::body')

        @include('includes.structure.accessibility')

        @include('includes.structure.nav')

        <main id="site-content">
        @if(Request::is('about-us/terms/hockney'))
            @include('includes.structure.hockney-header')
        @else
            @if(!\Request::is('search*'))
                @include('includes.structure.head')
            @endif
        @endif
            <div class="container mt-3 p-3">
                @include('includes.structure.breadcrumb')
                @yield('press-contact')
                @yield('content')
                @yield('group-visits')
                @yield('adlib')
            </div>
            
            @include('includes.structure.email-signup')
        </main>
        @include('includes.structure.footer')
        @hasSection('lookanswers')
            @yield('lookanswers')
        @endif

        @hasSection('thinkanswers')
            @yield('thinkanswers')
        @endif

        @hasSection('doanswers')
            @yield('doanswers')
        @endif

        @include('includes.scripts.javascript')


    </body>
</html>
