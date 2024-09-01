jQuery(function() {
  // ヘッダーロゴの切り替え
  var $header = jQuery('.l-header');
  var $logoTop = jQuery('#js-logo--top');
  var $logoDown = jQuery('#js-logo--down');
  var scrollTrigger = 100; 
  var fadespeed = 200; 

  jQuery(window).scroll(function() {
      if (jQuery(window).scrollTop() > scrollTrigger) {
          if (!$header.hasClass('scrolled')) {
              $header.addClass('scrolled');
              $logoTop.fadeOut(fadespeed, function() {
                  $logoDown.fadeIn(fadespeed);
              });
          }
      } else {
          if ($header.hasClass('scrolled')) {
              $header.removeClass('scrolled');
              $logoDown.fadeOut(fadespeed, function() {
                  $logoTop.fadeIn(fadespeed);
              });
          }
      }
  });

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

  const swiper2 = new Swiper('.p-recommend-swiper', {
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

  const swiper3 = new Swiper('.p-entry-recommend-swiper', {
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
      nextEl: '.p-entry-recommend__button--next',
      prevEl: '.p-entry-recommend__button--prev',
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
  jQuery(".scroll").mousedragscrollable();

// カテゴリータブの切り替え、ウィンドウサイズで表示数を可変
    const $tabs = jQuery('.p-tabs__item');jQuery(document).ready(function($) {
    const $tabs = jQuery('.p-tabs__item');
    const $tabContents = jQuery('.p-tabs__pane');
  
    function adjustCardDisplay() {
      const windowWidth = jQuery(window).width();
      let visibleCards;
  
      if (windowWidth >= 950) {
        visibleCards = 9;
      } else if (windowWidth >= 750) {
        visibleCards = 6;
      } else {
        visibleCards = 6; // 750px未満でも6枚表示
      }
  
      jQuery('.p-top-card__wrap').each(function() {
        jQuery(this).find('.p-top__card').slice(visibleCards).hide(); // 指定枚数を超えたカードを非表示
        jQuery(this).find('.p-top__card').slice(0, visibleCards).show(); // 表示するカードを表示
      });
    }
  
    $tabs.on('click', function() {
      const category = jQuery(this).data('category');
      const tabColor = jQuery(this).css('--tab-color');
  
      $tabs.removeClass('active');
      jQuery(this).addClass('active');
  
      $tabContents.removeClass('active');
      const $activePane = jQuery(`#${category}`);
      $activePane.addClass('active');
  
      // 背景色を更新
      $activePane.find('.p-card-category__wrap').css('background-color', tabColor);
  
      // カードの表示を調整
      adjustCardDisplay();
    });
  
    // 初期表示時の設定
    adjustCardDisplay();
    jQuery('.p-tabs__item.active').trigger('click');
  
    // ウィンドウリサイズ時の処理
    jQuery(window).on('resize', adjustCardDisplay);
  });
  });
