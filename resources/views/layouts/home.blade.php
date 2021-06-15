<!DOCTYPE html>
<html lang="en" dir="ltr" prefix="content: http://purl.org/rss/1.0/modules/content/  dc: http://purl.org/dc/terms/  foaf: http://xmlns.com/foaf/0.1/  og: http://ogp.me/ns#  rdfs: http://www.w3.org/2000/01/rdf-schema#  schema: http://schema.org/  sioc: http://rdfs.org/sioc/ns#  sioct: http://rdfs.org/sioc/types#  skos: http://www.w3.org/2004/02/skos/core#  xsd: http://www.w3.org/2001/XMLSchema# ">
<head>

  @include('includes.structure.meta')

  @include('includes.css.css')

  @include('includes.structure.manifest')

  @include('googletagmanager::head')

</head>
<body class="doc-body">
  @include('googletagmanager::body')

  @include('includes.structure.accessibility')

  @include('includes.structure.nav')

  @include('includes.structure.head')

  @include('includes.structure.beta')
  @include('includes.structure.open')

  @include('includes.structure.human')

  @yield('productions')


  <div class="container mt-3">
    <h2 class="lead"><a href="{{ route('news') }}">Latest news</a></h2>
    <div class="row">
      @yield('news')
    </div>
  </div>

  <div class="container-fluid parallax second-parallax-home">

  </div>

  @yield('fundraising')
  <div class="container-fluid parallax second-parallax-home mt-3">
  </div>
  @include('includes.structure.thingstodo')

  <div class="container-fluid parallax second-parallax-home mt-3">
  </div>

  <div class="container mt-3">
    <h2 class="lead"><a href="{{  route('objects') }}">Collections highlights</a></h2>
    <div class="row">
      @yield('themes')
    </div>
  </div>
  
  <div class="container-fluid ">
    <div class="negative-padding">
      @include('includes.structure.carousel')
    </div>
  </div>

  <div class="container-fluid parallax second-parallax-home mt-3"></div>

  <div class="container mt-3">
    <h2 class="lead"><a href="{{ route('research') }}">Our research</a></h2>
    <div class="row">
      @yield('research')
    </div>
  </div>

  <div class="container-fluid parallax third-parallax-home">
  </div>



  @yield('shopify')
  @include('includes.structure.emailsignup')

  @include('includes.structure.share')

  @include('includes.structure.footer')
  @include('includes.structure.modal')
  @include('includes.scripts.javascript')

</body>
</html>
