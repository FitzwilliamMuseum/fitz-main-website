<!DOCTYPE html>
<html lang="en" dir="ltr" prefix="content: http://purl.org/rss/1.0/modules/content/  dc: http://purl.org/dc/terms/  foaf: http://xmlns.com/foaf/0.1/  og: http://ogp.me/ns#  rdfs: http://www.w3.org/2000/01/rdf-schema#  schema: http://schema.org/  sioc: http://rdfs.org/sioc/ns#  sioct: http://rdfs.org/sioc/types#  skos: http://www.w3.org/2004/02/skos/core#  xsd: http://www.w3.org/2001/XMLSchema# ">
<head>

    @include('includes.structure.meta')
    <x-feed-links />

    @include('includes.css.css')

    @mapstyles

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

  @include('includes.structure.open')

  <div class="container mt-3">
    @include('includes.structure.breadcrumb')
  </div>

  @include('includes.elements.book')

  <div class="container-fluid py-3 bg-dark">
      @yield('content')
  </div>

    @yield('corona')

  <div class="container py-2">
    <h3 class="lead">
      Find us
    </h3>
  </div>

  <div class="container map-box ">
    @yield('map')
  </div>

  @include('includes.elements.directions')

  <div class="container mt-3">
    <h2 class="lead">Floorplans and guides</h2>
    <div class="row">
      <div class="col-md-12 mb-3">
          <div class="container h-100">
            <div class="contents-label mb-3 text-center">
              @yield('floorplans')
            </div>
          </div>
      </div>
    </div>
  </div>


  @yield('associated_pages')
  @include('includes.structure.emailsignup')
  @include('includes.structure.share')
  @include('includes.structure.footer')
  @include('includes.structure.modal')
  @include('includes.scripts.javascript')
  @hasSection('map')
    @mapscripts
    @include('includes.scripts.mapjs')
  @endif

</body>
</html>
