
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
    <img class="img-fluid" src="https://fitz-cms-images.s3.eu-west-2.amazonaws.com/rodintorsojeune.jpg?key=directus-large-crop"/>
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
    <img class="img-fluid" src="https://fitz-cms-images.s3.eu-west-2.amazonaws.com/mp_square_notype.png?key=directus-large-crop" />
    <div class="container h-100">

<div class="contents-label mb-3">
<h3>
  <a href="https://crowdsourced.micropasts.org">Citizen Science</a>
</h3>
<p>
  Help us with interesting and novel problems for museums
</p>
</div>
</div>
</div>

</div>

<div class="col-md-4 mb-3">
<div class="card card-body h-100">
    <img class="img-fluid" src="https://fitz-cms-images.s3.eu-west-2.amazonaws.com/macclesfield.png"/>
    <div class="container h-100">

<div class="contents-label mb-3">
<h3>
  <a href="https://www.fitzmuseum.cam.ac.uk/illuminated/">Seek Illumination</a>
</h3>
<p>
  Discover our manuscripts
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
