
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

  @hasSection('timeline')
  @include('includes.timeline-css')
  @endif

  @hasSection('360')
  @include('includes.photosphere-css')
  @endif
  <div class="container">
        @include('includes.breadcrumb')
        @yield('content')
        @yield('timeline')
  </div>
  @hasSection('map')
  <div class="container-fluid map-box mb-3">
    @yield('map')
  </div>


  @endif
        @yield('releases')
        @yield('resources-plans')
        @yield('diy')
        @yield('publications')
        @yield('research-projects')
        @yield('research-funders')
        @yield('themes')
        @yield('collections')
        @yield('departments')
        @yield('galleries')
        @yield('associated_pages')
        @yield('360')
        @yield('sketchfab-collection')

  @include('includes.share')

  @include('includes.footer')
  @include('includes.modal')
  @include('includes.javascript')

  @hasSection('360')
    @include('includes.photosphere-js')
  @endif

  @hasSection('map')
    @mapscripts
  @endif

  @hasSection('timeline')
    @include('includes.timeline-js')
  @endif

</body>
</html>
