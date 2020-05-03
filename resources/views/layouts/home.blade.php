
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

  <div class="container mt-3">
    <h2>Things to do</h2>
    <div class="row">
      <div class="col-md-4 mb-3">
  <div class="card card-body h-100">
    <div class="embed-responsive embed-responsive-4by3">
      <div class="sketchfab-embed-wrapper">
    <iframe title="A 3D model" class="embed-responsive-item" src="https://sketchfab.com/models/dba064e7f177442c9e20f755042bf662/embed?preload=1&amp;ui_controls=1&amp;ui_infos=1&amp;ui_inspector=1&amp;ui_stop=1&amp;ui_watermark=1&amp;ui_watermark_link=1" frameborder="0" allow="autoplay; fullscreen; vr" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
</div>
</div>
    <div class="container h-100">

    <div class="contents-label mb-3">
      <h3>
        <a href="https://sketchfab.com/fitzwilliammuseum">Discover objects in 3D</a>
      </h3>
      <p>
        Interrogate, download, print and create
      </p>
    </div>
  </div>
</div>

</div>

<div class="col-md-4 mb-3">
<div class="card card-body h-100">
    <img class="img-fluid" src="https://crowdsourced.micropasts.org/static/img/MP_SQUARE_notype.png">
    <div class="container h-100">

<div class="contents-label mb-3">
<h3>
  <a href="https://crowdsourced.micropasts.org">Citizen Science</a>
</h3>
<p>
  Help us with interesting and novel problems in museology
</p>
</div>
</div>
</div>

</div>

<div class="col-md-4 mb-3">
<div class="card card-body h-100">
    <img class="img-fluid" src="https://fitz-cms-images.s3.eu-west-2.amazonaws.com/ucm.png" height="225">
    <div class="container h-100">

<div class="contents-label mb-3">
<h3>
  <a href="https://museums.cam.ac.uk">Discover University of Cambridge Museums</a>
</h3>
<p>
  Find inspiration amongst our museums
</p>
</div>
</div>
</div>

</div>

    </div>
  </div>

  <div class="container-fluid parallax second-parallax-home">
  </div>
  <div class="container mt-3">
    <h2>Museum themes</h2>
    <div class="row">
        @yield('themes')
    </div>
  </div>

  <div class="container-fluid carousel-pad">
      @yield('carousel')
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
    <h2>Talk to us</h2>
    @yield('twitter')
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
