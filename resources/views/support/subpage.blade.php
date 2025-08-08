{{-- SEO --}}
@section('title', $page['title'])
@section('description', $page['meta_description'])
@section('keywords', $page['meta_keywords'])

@include('includes.structure.name-spaces')

@php

    if (!empty($page['page_components'])) {
        foreach ($page['page_components'] as $component) {
            if (!empty($component['banner_positioning']) && $component['banner_positioning'] == true) {
                $banner_pos = true;
            }
        }
    }

@endphp

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

<body class="doc-body support c_darkmode">


    @include('googletagmanager::body')

    @include('includes.structure.accessibility')

    @include('includes.structure.nav')

    <main id="site-content">

    <div class="sticky-spacer"></div>

    @include('support.components.head')

    @include('support.components.components-repeater')

    {{-- If a custom position for the banner hasn't been specified --}}
    @if (empty($banner_pos))
        @include('support.components.banner')
    @endif

    @include('support.components.related')

    @include('includes.structure.email-signup')

    </main>
    
    @include('includes.structure.footer')

    @include('includes.scripts.javascript')


</body>

</html>
