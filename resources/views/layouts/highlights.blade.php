<? xml version = "1.0" encoding = "utf-8"?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html lang="en" dir="ltr"
      prefix="content: http://purl.org/rss/1.0/modules/content/  dc: http://purl.org/dc/terms/  foaf: http://xmlns.com/foaf/0.1/  og: http://ogp.me/ns#  rdfs: http://www.w3.org/2000/01/rdf-schema#  schema: http://schema.org/  sioc: http://rdfs.org/sioc/ns#  sioct: http://rdfs.org/sioc/types#  skos: http://www.w3.org/2004/02/skos/core#  xsd: http://www.w3.org/2001/XMLSchema# ">
<head>

    @include('includes.structure.meta')

    @include('includes.css.css')

    @hasSection('map')
        @mapstyles
    @endif

    @include('includes.structure.manifest')

    @yield('jsonld')

    <x-feed-links/>

    @include('googletagmanager::head')

</head>
<body class="doc-body bg-pastel">
@include('googletagmanager::body')

@include('includes.structure.accessibility')

@include('includes.structure.nav')

@include('includes.structure.highlight')

@hasSection('timeline')
    @include('includes.css.timeline-css')
@endif

@hasSection('360')
    @include('includes.css.photosphere-css')
@endif

<div class="container mt-3">
    @include('includes.structure.breadcrumb')
</div>
<div class="container-fluid bg-white py-3">
    <div class="container bg-white">
        @yield('press-contact')
        @yield('content')

        @yield('adlib')
        @yield('timeline')
    </div>
</div>


@hasSection('collection-parallax')
    @include('includes.structure.parallax')
@endif

@hasSection('map')
    <div class="container-fluid map-box mb-3">
        @yield('map')
    </div>
@endif
@hasSection('associated_pages')
<div class="container-fluid bg-gbdo">
    @yield('associated_pages')
</div>
@endif

@hasSection('cons-areas')
    @yield('cons-areas')
@endif

@yield('sketchfab-collection')
@yield('sketchfab')
@yield('audio-guide')

<div class="container-fluid bg-gdbo py-3">
    @yield('pharos-pages')
    @yield('highlight')
    @yield('mlt')
</div>
@yield('artistsSimilar')
@yield('shopify')

@include('includes.structure.email-signup')

@include('includes.structure.footer')

@include('includes.structure.modal')

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

@hasSection('360')
    @include('includes.scripts.photosphere-js')
@endif

@hasSection('map')
    @mapscripts
    @include('includes.scripts.mapjs')
@endif

@hasSection('timeline')
    @include('includes.scripts.timeline-js')
@endif

@hasSection('datepicker')
    @yield('datepicker')
@endif
</body>
</html>
