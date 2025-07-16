import Splide from '@splidejs/splide'
  let splide = new Splide('#events-listing', {
    perPage: 1,
    focus: 'center',
    updateOnMove: true,
    pagination: false,
    autoplay: false,
    gap: '20px',
    keyboard: true,
    mediaQuery: 'min',
    breakpoints: {
      600: {
        perPage: 4,
        fixedWidth: '25%',
      }
    }
});
  splide.mount();
