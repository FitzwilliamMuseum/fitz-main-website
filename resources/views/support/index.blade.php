{{-- SEO --}}
@section('title', $page['title'])
@section('description', $page['meta_description'])
@section('keywords', $page['meta_keywords'])

@include('includes.structure.name-spaces')

@php
    foreach($page['page_components'] as $component) {
        if(!empty($component['related_pages_positioning']) && $component['related_pages_positioning'] == true) {
            $listing_pos = true;
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

<body class="doc-body c_darkmode">
@include('googletagmanager::body')

@include('includes.structure.accessibility')

@include('includes.structure.nav')

@include('support.components.head', ['hero' => true, 'title' => 'Support us'])

    @include('support.components.components-repeater')

    {{-- If a custom position for the page listing hasn't been specified --}}
    @if(!isset($listing_pos))
        @include('support.components.grid')
    @endif

@include('support.components.related')

@include('includes.structure.email-signup')

@include('includes.structure.footer')

@include('includes.scripts.javascript')

</body>

</html>
