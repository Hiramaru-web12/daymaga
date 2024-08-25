jQuery(function(){
  var swiper1 = new Swiper('.p-fv-swiper', {
    // Optional parameters
    loop: true,
    loopAdditionalSlides: 1,
    spaceBetween: 64,
    centeredSlides: true,
    slidesPerView: 1.8,

    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    speed: 2000,
    grabCursor: true,
    breakpoints: {
    0: {
      slidesPerView: 'auto',
      spaceBetween: 16,
    },
    700: {
      slidesPerView: 'auto',
    },
    
  },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  
    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  });

});