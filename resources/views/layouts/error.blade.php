<!DOCTYPE html>
<html lang="en" dir="ltr" prefix="content: http://purl.org/rss/1.0/modules/content/  dc: http://purl.org/dc/terms/  foaf: http://xmlns.com/foaf/0.1/  og: http://ogp.me/ns#  rdfs: http://www.w3.org/2000/01/rdf-schema#  schema: http://schema.org/  sioc: http://rdfs.org/sioc/ns#  sioct: http://rdfs.org/sioc/types#  skos: http://www.w3.org/2004/02/skos/core#  xsd: http://www.w3.org/2001/XMLSchema# ">
<head>

    @include('includes.structure.meta')

    @include('includes.css.css')

    @hasSection('map')
      @mapstyles
    @endif

    @include('includes.structure.manifest')
    @include('googletagmanager::head')

</head>

<body class="doc-body">
  @include('googletagmanager::body')

<!-- Screen reader skip to main -->
<a class="sr-only sr-only-focusable doc-skip" href="#doc-main-h1">
    <div class="container">
        <span class="doc-skip-text">Skip to main content</span>
    </div>
</a>

  @include('includes.structure.nav')

  @include('includes.structure.head')

  <div class="container">
        @yield('content')
  </div>


  @include('includes.structure.footer')
  @include('includes.structure.modal')
  @include('includes.scripts.javascript')

  @hasSection('360')
    @include('includes.scripts.photosphere-js')
  @endif

  @hasSection('map')
    @include(includes.scripts.mapjs)
  @endif

  @hasSection('timeline')
    @include('includes.scripts.timeline-js')
  @endif

</body>
</html>
