{{-- SEO --}}
@section('title', $page['title'])
@section('description', $page['meta_description'])
@section('keywords', $page['meta_keywords'])

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

        @include('includes.structure.nav')

        {{-- <h1>This is the subpage</h1> --}}

        @include('support.components.head')

        @include('support.components.components-repeater')

        @include('support.components.related')

        @include('includes.structure.email-signup')

        @include('includes.structure.footer')

        @include('includes.scripts.javascript')

    </body>

</html>
