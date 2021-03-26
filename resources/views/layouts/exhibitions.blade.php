<!DOCTYPE html>
<html lang="en" dir="ltr" prefix="content: http://purl.org/rss/1.0/modules/content/  dc: http://purl.org/dc/terms/  foaf: http://xmlns.com/foaf/0.1/  og: http://ogp.me/ns#  rdfs: http://www.w3.org/2000/01/rdf-schema#  schema: http://schema.org/  sioc: http://rdfs.org/sioc/ns#  sioct: http://rdfs.org/sioc/types#  skos: http://www.w3.org/2004/02/skos/core#  xsd: http://www.w3.org/2001/XMLSchema# ">
<head>

    @include('includes.structure.meta')

    @include('includes.css.css')

    @include('includes.structure.manifest')

</head>
<body class="doc-body">

  @include('includes.structure.accessibility')

  @include('includes.structure.nav')


  @include('includes.structure.head')

  @include('includes.structure.beta')
  @include('includes.structure.open')

    @hasSection('360')
      @include('includes.css.photosphere-css')
    @endif

  <div class="container mt-3">
        @include('includes.structure.breadcrumb')
        @yield('content')
  </div>
    @yield('excarousel')
        @yield('curators')
        @yield('research-funders')
        @yield('current')
        @yield('displays')
        @yield('future')
        @yield('archive')
        @yield('galleries')
        @yield('departments')
        @yield('360')
        @yield('mlt')

  @include('includes.structure.share')

  @include('includes.structure.footer')
  @include('includes.structure.modal')
  @include('includes.scripts.javascript')

  @hasSection('360')
    @include('includes.scripts.photosphere-js')
  @endif

  @include('includes.scripts.fullscreen')

</body>
</html>
