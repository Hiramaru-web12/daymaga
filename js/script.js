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
      nextEl: '.p-fv-swiper__button--next',
      prevEl: '.p-fv-swiper__button--prev',
    },
  
  });

  const swiper = new Swiper('.p-recommend-swiper', {
    // Optional parameters
    loop: true,
    loopAdditionalSlides: 1,
    spaceBetween: 32,
  
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.p-recommend__button--next',
      prevEl: '.p-recommend__button--prev',
    },
  
    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  });

  // スクロールのドラッグ有効化
jQuery.prototype.mousedragscrollable = function () {
  let target;
  jQuery(this).each(function (i, e) {
    jQuery(e).mousedown(function (event) {
      event.preventDefault();
      target = jQuery(e);
      jQuery(e).data({
        down: true,
        move: false,
        x: event.clientX,
        y: event.clientY,
        scrollleft: jQuery(e).scrollLeft(),
        scrolltop: jQuery(e).scrollTop(),
      });
      return false;
    });
    jQuery(e).click(function (event) {
      if ($(e).data("move")) {
        return false;
      }
    });
  });
  jQuery(document)
    .mousemove(function (event) {
      if ($(target).data("down")) {
        event.preventDefault();
        let move_x = jQuery(target).data("x") - event.clientX;
        let move_y = jQuery(target).data("y") - event.clientY;
        if (move_x !== 0 || move_y !== 0) {
          $(target).data("move", true);
        } else {
          return;
        }
        jQuery(target).scrollLeft(jQuery(target).data("scrollleft") + move_x);
        jQuery(target).scrollTop(jQuery(target).data("scrolltop") + move_y);
        return false;
      }
    })
    .mouseup(function (event) {
      jQuery(target).data("down", false);
      return false;
    });
};
$(".scroll").mousedragscrollable();

});