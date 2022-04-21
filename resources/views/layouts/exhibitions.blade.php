<!DOCTYPE html>
<html lang="en" dir="ltr"
      prefix="content: http://purl.org/rss/1.0/modules/content/  dc: http://purl.org/dc/terms/  foaf: http://xmlns.com/foaf/0.1/  og: http://ogp.me/ns#  rdfs: http://www.w3.org/2000/01/rdf-schema#  schema: http://schema.org/  sioc: http://rdfs.org/sioc/ns#  sioct: http://rdfs.org/sioc/types#  skos: http://www.w3.org/2004/02/skos/core#  xsd: http://www.w3.org/2001/XMLSchema# ">
<head>

    @include('includes.structure.meta')
    <x-feed-links/>

    @include('includes.css.css')

    @include('includes.structure.manifest')
    @include('googletagmanager::head')

</head>
<body class="doc-body bg-pastel">
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

@hasSection('360')
    @include('includes.css.photosphere-css')
@endif

<div class="container mt-3">
    @include('includes.structure.breadcrumb')
</div>
<div class="container mt-3">
    @yield('content')
</div>
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
@include('includes.structure.emailsignup')
@include('includes.structure.footer')
@include('includes.structure.modal')
@include('includes.scripts.javascript')

@hasSection('360')
    @include('includes.scripts.photosphere-js')
@endif

@include('includes.scripts.fullscreen')

</body>
</html>
