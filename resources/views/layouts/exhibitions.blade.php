@php
    if (!empty($exhibition['page_template'])) {
        $page_template = $exhibition['page_template'];
    }
    $isNewTemplate = request()->get('template') && request()->get('template') == 'new';
@endphp
@include('includes.structure.name-spaces')

<head>

    @include('includes.structure.meta')
    <x-feed-links></x-feed-links>

    @include('includes.css.css')

    @include('includes.structure.manifest')
    @include('googletagmanager::head')

</head>

<body class="doc-body c_darkmode exhibition">
    @include('googletagmanager::body')

    @include('includes.structure.accessibility')
    @include('includes.structure.nav')

    @if (!$isNewTemplate)
        <main id="site-content">
    @endif

    @if (empty($page_template))
        @if (!request()->get('template'))
            @hasSection('banner')
                @yield('banner')
                @include('includes.structure.exhibition-title')
            @else
                @include('includes.structure.head')
            @endif
        @endif
        @if (!request()->get('template'))
            @include('includes.structure.open')
        @endif

        <div class="container mt-3">
            @include('includes.structure.breadcrumb')
        </div>
        @if ($isNewTemplate)
            @yield('exhibitions-landing-2025')
        @else
            <span id="site-content" class="visually-hidden"></span>
            @yield('content')
            @yield('ttn-actions')
            @yield('events-url')
            @yield('exhibition-shopify')
            @yield('exhibitions-files')
            @yield('exhibition-faqs')
            @yield('shopify')
            @yield('exhibitionCaseCards')
            @yield('exhibition-objects')
            @yield('exhibition-labels')
            @yield('exhibitionAudio')
            @yield('excarousel')
            @yield('youtube')
            @yield('curators')
            @yield('research-funders')
            @yield('current')
            @yield('sketchfab')
            @yield('displays')
            @yield('future')
            @yield('archive')
            @yield('galleries')
            @yield('departments')
            @yield('exhibition-thanks')
            @yield('360')
            @yield('mlt')
        @endif
    @else
        @yield('exhibitions-2024')
        @yield('exhibitions-2025')
        @yield('shopify')
    @endif
    @include('includes.structure.email-signup')
    @if (!$isNewTemplate)
        </main>
    @endif
    @include('includes.structure.footer')
    @include('includes.structure.modal')
    @include('includes.scripts.javascript')

    @hasSection('360')
        @include('includes.scripts.photosphere-js')
    @endif
</body>

</html>
