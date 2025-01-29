import Splide from '@splidejs/splide'
document.addEventListener( 'DOMContentLoaded', function() {
  let splide = new Splide( '.splide', {
   keyboard: 'true',
   pagination: false,
   focus  : 'center',
   type   : 'loop',
   updateOnMove: true,
   perPage: 3,
    reducedMotion: {
      speed      : 0,
      rewindSpeed: 0,
    },
    mediaQuery: 'min',
    breakpoints: {
      600: {
       height: '100%',
       focus: 'center',
       gap: '30px',
       padding: {
         //Add padding to end of carousel to compensate for last slide
         //right: '20%',
       },
       trimSpace: 'false',
       //autoWidth: 'true',
      }
    }
  });
  splide.mount();
} );