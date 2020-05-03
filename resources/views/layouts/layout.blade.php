
<!DOCTYPE html>
<html lang="en">
<head>

    @include('includes.structure.meta')

    @include('includes.css.css')

    @hasSection('map')
      @mapstyles
    @endif

    @include('includes.structure.manifest')

</head>
<body class="doc-body">

  @include('includes.structure.accessibility')

  @include('includes.structure.nav')

  @include('includes.structure.announcement')

  @include('includes.structure.head')

  @include('includes.structure.beta')


  @hasSection('timeline')
    @include('includes.css.timeline-css')
  @endif

  @hasSection('360')
    @include('includes.css.photosphere-css')
  @endif

  <div class="container">
    @include('includes.structure.breadcrumb')
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
    @yield('youtube')
    @yield('sketchfab-collection')
    @yield('sketchfab')
    @yield('audio-guide')
    @yield('pharos-pages')
    @yield('mlt')

  @include('includes.structure.share')

  @include('includes.structure.footer')

  @include('includes.structure.modal')

  @hasSection('lookanswers')
    @yield('lookanswers')
  @endif

  @hasSection('thinkanswers')
    @yield('thinkanswers')
  @endif

  @hasSection('doanswers')
    @yield('doanswers')
  @endif

  @include('includes.scripts.javascript')

  @hasSection('360')
    @include('includes.scripts.photosphere-js')
  @endif

  @hasSection('map')
    @mapscripts
    @include('includes.scripts.mapjs')
  @endif

  @hasSection('timeline')
    @include('includes.scripts.timeline-js')
  @endif

</body>
</html>
