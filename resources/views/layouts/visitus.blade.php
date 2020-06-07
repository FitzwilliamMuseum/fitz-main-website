<!DOCTYPE html>
<html lang="en">
<head>

    @include('includes.structure.meta')

    @include('includes.css.css')

    @mapstyles

    @include('includes.structure.manifest')

</head>
<body class="doc-body">

<!-- Screen reader skip to main -->
<a class="sr-only sr-only-focusable doc-skip" href="#doc-main-h1">
    <div class="container">
        <span class="doc-skip-text">Skip to main content</span>
    </div>
</a>

  @include('includes.structure.nav')

  @include('includes.structure.head')

  @include('includes.structure.beta')

  <div class="container">
    @include('includes.structure.breadcrumb')

  </div>
  <div class="container">
      @yield('opening-hours')
  </div>

  <div class="container-fluid parallax parallax-home mt-3">
  </div>

  <div class="container">
        @yield('content')
  </div>

  <div class="container-fluid map-box">
    @yield('map')
  </div>

  <div class="container mt-3">
    <h2>Floorplans and guides</h2>
    <div class="row">
      <div class="col-md-12 mb-3">
        <div class="card card-body h-100">
          <div class="container h-100">

            <div class="contents-label mb-3">
              @yield('floorplans')
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  @include('includes.elements.directions')

  @yield('associated_pages')

  @include('includes.structure.share')

  @include('includes.structure.footer')
  @include('includes.structure.modal')
  @include('includes.scripts.javascript')
  @mapscripts

</body>
</html>
