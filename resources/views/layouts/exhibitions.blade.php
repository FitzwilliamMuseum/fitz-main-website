@include('includes.structure.name-spaces')
<head>

    @include('includes.structure.meta')
    <x-feed-links></x-feed-links>

    @include('includes.css.css')

    @include('includes.structure.manifest')
    @include('googletagmanager::head')

</head>
<body class="doc-body bg-pastel c_darkmode">
@include('googletagmanager::body')

@include('includes.structure.accessibility')
@include('includes.structure.nav')
@if(
  (Request::is('visit-us/exhibitions/hockneys-eye-the-art-and-technology-of-depiction')
  ||
  Request::is('visit-us/exhibitions')
  ))
@include('includes.structure.hockney-header')
@elseif(Request::is('visit-us/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870'))
    @include('includes.structure.ttn-header')

@else
    @include('includes.structure.head')
@endif
@include('includes.structure.open')

<div class="container mt-3">
    @include('includes.structure.breadcrumb')
</div>
    @yield('content')
@yield('ttn-actions')
@yield('tnew-data')
@yield('exhibitions-files')
@yield('shopify')
@yield('exhibitionCaseCards')
@yield('exhibition-labels')
@yield('exhibitionAudio')
@yield('excarousel')

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
@include('includes.structure.email-signup')
@include('includes.structure.footer')
@include('includes.structure.modal')
@include('includes.scripts.javascript')

@hasSection('360')
    @include('includes.scripts.photosphere-js')
@endif
</body>
</html>
