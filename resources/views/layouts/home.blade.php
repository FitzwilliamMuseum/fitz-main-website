<!DOCTYPE html>
<html lang="en" dir="ltr" prefix="content: http://purl.org/rss/1.0/modules/content/  dc: http://purl.org/dc/terms/  foaf: http://xmlns.com/foaf/0.1/  og: http://ogp.me/ns#  rdfs: http://www.w3.org/2000/01/rdf-schema#  schema: http://schema.org/  sioc: http://rdfs.org/sioc/ns#  sioct: http://rdfs.org/sioc/types#  skos: http://www.w3.org/2004/02/skos/core#  xsd: http://www.w3.org/2001/XMLSchema# ">
<head>

  @include('includes.structure.meta')
  <x-feed-links />
  @include('includes.css.css')
  @include('includes.structure.manifest')
  @include('googletagmanager::head')

</head>
<body class="doc-body bg-grey">
  @include('googletagmanager::body')
  @include('includes.structure.accessibility')
  @include('includes.structure.nav')
  @if (\Carbon\Carbon::now()->diffInHours('2022-02-14 09:30:00', false) <= 0)
  @include('includes.structure.hockney-header')
  @else
      @include('includes.structure.head')
  @endif
  @include('includes.structure.open')

  @include('includes.structure.steppe')

  @include('includes.structure.exhibitions')

  <div class="container-fluid parallax parallax-home"></div>

  @include('includes.structure.galleries')

  <div class="container-fluid parallax parallax-home"></div>

  @yield('fundraising')
  <div class="container-fluid parallax parallax-home mt-3">
  </div>
  @include('includes.structure.thingstodo')

  <div class="container-fluid parallax second-parallax-home mt-3">
  </div>

  <div class="container mt-3">
    <h2><a href="{{  route('objects') }}">Collections highlights</a></h2>
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
    <h2><a href="{{ route('research') }}">Our research</a></h2>
    <div class="row">
      @yield('research')
    </div>
  </div>

  <div class="container-fluid parallax second-parallax-home">
  </div>

  <div class="container mt-3">
    <h2><a href="{{ route('news') }}">Latest news</a></h2>
    <div class="row">
      @yield('news')
    </div>
  </div>
  <div class="container-fluid parallax second-parallax-home">
  </div>
  <div class="container-fluid bg-gdbo py-3">
    @yield('shopify')
  </div>
  @include('includes.structure.emailsignup')
  @include('includes.structure.footer')
  @include('includes.scripts.javascript')

</body>
</html>
