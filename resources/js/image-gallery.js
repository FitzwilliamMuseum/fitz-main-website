import Splide from '@splidejs/splide'
  console.log('Loaded image-gallery js')
  let splide = new Splide('.splide', {
    type: 'loop',
    perPage: 1,
    focus: 'center',
    updateOnMove: true,
    pagination: false,
    autoplay: false,
    keyboard: true,
    padding: {
        right: '25%',
        left: '5%',
    },
    fixedWidth: '100%',
    mediaQuery: 'min',
    breakpoints: {
      600: {
        perPage: 3,
        fixedWidth: '55%',
        padding: {
            left: '3.2%',
            right: '18.5%'
        }
      }
    }
});
  function updateSlideScale() {
    const slides = document.querySelectorAll('.splide__slide');
    slides.forEach(slide => {
      slide.style.transform = 'scale(0.7)';
    });

    const activeSlide = splide.Components.Elements.slides[splide.index];
    if (activeSlide) {
      activeSlide.style.transform = 'scale(1)';
    }
  }

  splide.on('mounted moved', updateSlideScale);
  splide.mount();
