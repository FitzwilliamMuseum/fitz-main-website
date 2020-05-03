<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid doc-jumbotron head parallax">
  <div class="container">
    <div>
      <div class="col-lg-12 col-xl-12 shadow-sm rounded bg-black p-4">
        <h1 class="shout ">@yield('title')</h1>
        <div id="fullscreen-btn"><p class="text-left white"><a href="#"
          class="share-click" data-toggle="modal"
          data-target="#exampleModalCenter"><i class="fas fa-expand
          fa-inverse mr-3" ></i>  @yield('hero_image_title')</a></span>
          <br />
          <img src="{{ URL::to('/images/logos/ucamLogo.png') }}"  width="220px" class="img-fluid p-3"/>
        </div>
      </div>

    </div>
  </div>
</div>
