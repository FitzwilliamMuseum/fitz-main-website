
<!DOCTYPE html>
<html lang="en">
<head>

    @include('includes.meta')

    @include('includes.css')
    @hasSection('map')
    @mapstyles
    @endif
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
        @yield('content')
  </div>


  @include('includes.footer')
  @include('includes.modal')
  @include('includes.javascript')

  @hasSection('360')
    @include('includes.photosphere-js')
  @endif

  @hasSection('map')
    @mapscripts
    <script>
    window.addEventListener('LaravelMaps:MapInitialized', function (event) {
   var element = event.detail.element;
   var map = event.detail.map;
   map.scrollWheelZoom.disable();
});

    </script>
  @endif

  @hasSection('timeline')
    @include('includes.timeline-js')
  @endif

</body>
</html>
