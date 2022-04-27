<script src="{{ mix('js/app.js') }}"></script>

<script src="/js/backtotop.js"></script>

@hasSection('theme-carousel')
  <script src="/js/carousel-themes.js"></script>
  <script>
  $('.carousel .carousel-item').each(function(){
    var minPerSlide = 3;
    var next = $(this).next();
    if (!next.length) {
      next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (var i=0;i<minPerSlide;i++) {
      next=next.next();
      if (!next.length) {
        next = $(this).siblings(':first');
      }

      next.children(':first-child').clone().appendTo($(this));
    }
  });
</script>
@endif

<!-- Cookie management -->
<script defer type="text/javascript" src="/js/config.js"></script>
<script defer type="text/javascript" src="/js/klaro.js"></script>
<!-- End of body -->

@hasSection('audio-guide')
<script src="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.5.10/plyr.min.js"></script>
<script defer type="text/javascript" src="/js/plyr-controls.js"></script>
@endif

@hasSection('audio-guide')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.5.10/plyr.min.js"></script>
    <script defer type="text/javascript" src="/js/plyr-controls.js"></script>
@endif
@yield('plyr-js')
@hasSection('height-test')
  @yield('height-test')
@endif
<script>
$(function () {
  $('[data-toggle="popover"]').popover()
})
$('.popover-dismiss').popover({
  trigger: 'focus'
})
</script>
<script src="/js/panels.js" type="text/javascript"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id={{ env('APP_GOOGLE_ANALYTICS') }}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '{{ env('APP_GOOGLE_ANALYTICS') }}');
</script>
@hasSection('map')
  @mapscripts
  @include('includes.scripts.mapjs')
@endif
