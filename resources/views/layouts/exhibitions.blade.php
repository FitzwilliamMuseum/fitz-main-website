
<!DOCTYPE html>
<html lang="en">
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

    @hasSection('360')
      @include('includes.css.photosphere-css')
    @endif

  <div class="container">
        @include('includes.structure.breadcrumb')
        @yield('content')
  </div>
        @yield('curators')

        @yield('current')
        @yield('displays')
        @yield('future')
        @yield('archive')
        @yield('galleries')
        @yield('departments')

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
