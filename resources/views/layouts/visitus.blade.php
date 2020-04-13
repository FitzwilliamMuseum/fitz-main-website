
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
  @include('includes.share')

  @include('includes.footer')

  @include('includes.javascript')
  @mapscripts
  @include('includes.fullscreen')

</body>
</html>
