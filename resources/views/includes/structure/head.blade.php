<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid doc-jumbotron head parallax">
  <div class="container">
    <div>
      <div class="col-lg-12 col-xl-12 shadow-sm rounded bg-black p-4">
        <h1 class="shout ">@yield('title')</h1>
        <img src="{{ URL::to('/images/logos/ucamLogo.png') }}"  width="220px" class="img-fluid p-3"/>
        <img src="/images/logos/FV.svg"  width="75px" />
      </div>

    </div>

  </div>

</div>
<a href="#overlay" class="menu fa-stack fa-lg float-right mr-4 mb-4">
  <i class="fa fa-circle fa-stack-2x"></i>
  <i class="fa fa-info fa-stack-1x fa-inverse"></i>
  </a>
<div class="heroCaption" aria-hidden="true">
  @yield('hero_image_title')
</div>
