<div class="container-fluid head parallax position-relative">
  <div class="row w-100 col-md-12 absolute-bottom">
    <div class="col-md-3 ml-3 absolute-bottom">
      <a tabindex="0" class="further-info fa-stack fa-lg mr-4 mb-4"
      role="button" data-toggle="popover"
      data-placement="left" data-content="@yield('hero_image_title')">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-info fa-stack-1x fa-inverse"></i></a>
      <a tabindex="0" class="further-info fa-stack fa-lg mr-4 mb-4"
      role="button" data-toggle="lightbox" data-max-width="80%" data-max-height="80%"
      data-remote="@yield('hero_image')" data-title="@yield('hero_image_title')">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-expand fa-stack-1x fa-inverse"></i>
    </a>
    </div>
  </div>
</div>
<div class="container-fluid bg-black">
  <div class="ml-3 pt-4 pb-4">
    <h1 class="shout" id="doc-main-h1">@yield('title')</h1>
  </div>
</div>
