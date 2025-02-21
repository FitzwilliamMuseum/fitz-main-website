import Splide from '@splidejs/splide'
document.addEventListener( 'DOMContentLoaded', function() {
  let splide = new Splide( '.splide', {
   keyboard: 'true',
   pagination: false,
   focus  : 'center',
   type   : 'loop',
   updateOnMove: true,
    reducedMotion: {
      speed      : 0,
      rewindSpeed: 0,
    },
    mediaQuery: 'min',
    breakpoints: {
      600: {
      perPage: 3,
       height: '100%',
       focus: 'center',
       gap: '30px',
       fixedWidth: '650px',
       trimSpace: 'false',
      }
    }
  });
  splide.mount();
} );