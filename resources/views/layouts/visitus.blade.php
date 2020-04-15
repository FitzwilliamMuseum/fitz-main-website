
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
      <div class="col-md-4 mb-3">
        <div class="card card-body h-100">
          <img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/CM.YG_.1401-R_2008_dc1.jpg?key=directus-large-crop">
          <div class="container h-100">

            <div class="contents-label mb-3">
              <h3>
                <a href="news/article/look-think-do">Look Think Do</a>
              </h3>
            </div>
          </div>
          <a href="news/article/look-think-do" class="btn btn-dark">Read more</a>
        </div>

      </div>
      <div class="col-md-4 mb-3">
        <div class="card card-body h-100">
          <img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/dionysus.jpg?key=directus-large-crop">
          <div class="container h-100">

            <div class="contents-label mb-3">
              <h3>
                <a href="news/article/coming-soon-fitzvirtual">Coming soon: #fitzvirtual</a>
              </h3>
            </div>
          </div>
          <a href="news/article/coming-soon-fitzvirtual" class="btn btn-dark">Read more</a>
        </div>

      </div>
      <div class="col-md-4 mb-3">
        <div class="card card-body h-100">
          <img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/coronavirus-gianniskorentzelos.jpg?key=directus-large-crop">
          <div class="container h-100">

            <div class="contents-label mb-3">
              <h3>
                <a href="news/article/The-Fitzwilliam-Museum-and-Coronavirus-(COVID-19)-–-updated-17-March-2020">The Fitzwilliam Museum and Coronavirus (COVID-19) – updated 17 March 2020</a>
              </h3>
            </div>
          </div>
          <a href="news/article/The-Fitzwilliam-Museum-and-Coronavirus-(COVID-19)-–-updated-17-March-2020" class="btn btn-dark">Read more</a>
        </div>

      </div>
    </div>
  </div>

  <div class="container mb-3">
    <h2>Directions to us</h2>
    <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Collapsible Group Item #1
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Collapsible Group Item #2
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
  </div>

  @yield('associated_pages')

  @include('includes.share')

  @include('includes.footer')
  @include('includes.modal')
  @include('includes.javascript')
  @mapscripts
  @include('includes.fullscreen')

</body>
</html>
