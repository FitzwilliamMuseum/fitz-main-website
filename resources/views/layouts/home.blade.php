
<!DOCTYPE html>
<html lang="en">
<head>

  @include('includes.structure.meta')

  @include('includes.css.css')

  @include('includes.structure.manifest')
  @include('feed::links')
</head>
<body class="doc-body">

  @include('includes.structure.accessibility')

  @include('includes.structure.nav')

  @include('includes.structure.announcement')

  @include('includes.structure.headHome')

  @include('includes.structure.beta')

  <div class="container-fluid parallax parallax-home text-center">
  </div>

  <div class="container mt-3">
    <h2>What's happening</h2>
    <div class="row">
      @yield('news')
    </div>
  </div>

  <div class="container-fluid parallax second-parallax-home">
  </div>

  @include('includes.structure.thingstodo')

  <div class="container-fluid parallax second-parallax-home">
  </div>

  <div class="container mt-3">
    <h2>Museum themes</h2>
    <div class="row">
      @yield('themes')
    </div>
  </div>

  <div class="container-fluid bg-black">
    <div class="container">
      @include('includes.structure.carousel')
    </div>
  </div>

  <div class="container mt-3">
    <h2>Our world class research</h2>
    <div class="row">
      @yield('research')
    </div>
  </div>

  <div class="container-fluid parallax third-parallax-home mb-3">
  </div>

  <div class="container ">
    <h2>Our Twitter profile</h2>
    @yield('twitter')
  </div>

  <div class="container-fluid parallax third-parallax-home-lower mb-3">
  </div>

  <div class="container ">
    <h2>Our Instagram profile</h2>
    @yield('instagram')
  </div>
  <div class="container-fluid parallax fourth-parallax-home mb-3">
  </div>

  <div class="container ">
    <h2>Watch us</h2>
    @yield('youtube-list')
  </div>

  @include('includes.structure.share')

  @include('includes.structure.footer')
  @include('includes.structure.modal')
  @include('includes.scripts.javascript')
  @include('includes.scripts.fullscreen')

</body>
</html>
