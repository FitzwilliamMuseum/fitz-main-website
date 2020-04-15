
<!DOCTYPE html>
<html lang="en">
<head>

    @include('includes.meta')

    @include('includes.css')
    @mapstyles
    @include('includes.manifest')

</head>
<body class="doc-body">

<!-- Screen reader skip to main -->
<a class="sr-only sr-only-focusable doc-skip" href="#doc-main-h1">
    <div class="container">
        <span class="doc-skip-text">Skip to main content</span>
    </div>
</a>

  @include('includes.nav')

  @include('includes.announcement')

  @include('includes.head')

  <div class="container">
    @include('includes.breadcrumb')

  </div>
  <div class="container">
      @yield('opening-hours')
  </div>

  <div class="container-fluid parallax parallax-home">
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

  @include('includes.directions')

  @yield('associated_pages')

  @include('includes.share')

  @include('includes.footer')
  @include('includes.modal')
  @include('includes.javascript')
  @mapscripts
  @include('includes.fullscreen')

</body>
</html>
