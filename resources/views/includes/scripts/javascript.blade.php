<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="/js/material.min.js"></script>
<!-- Back to top script -->
<script src="/js/backtotop.js"></script>
<!-- lightbox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script>
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
</script>
<!-- Cookie management -->
<script defer type="text/javascript" src="/js/config.js"></script>
<script defer type="text/javascript" src="/js/klaro.js"></script>
<!-- End of body -->

@hasSection('audio-guide')
<script src="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.5.10/plyr.min.js"></script>
<script>
// Change "{}" to your options:
// https://github.com/sampotts/plyr/#options
var controls =
[
    'restart', // Restart playback
    'play', // Play/pause playback
    'progress', // The progress bar and scrubber for playback and buffering
    'current-time', // The current time of playback
    'duration', // The full duration of the media
    'mute', // Toggle mute
    'volume', // Volume control
    'settings', // Settings menu
    'download', // Show a download button with a link to either the current source or a custom URL you specify in your options
];
const player = new Plyr('.player', { controls });

// Expose player so it can be used from the console
window.player = player;
</script>
@endif

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


<script async src="https://www.googletagmanager.com/gtag/js?id={{ env('APP_GOOGLE_ANALYTICS') }}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '{{ env('APP_GOOGLE_ANALYTICS') }}');
</script>
