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
  jQuery(".scroll").mousedragscrollable();

// カテゴリータブの切り替え、ウィンドウサイズで表示数を可変
  jQuery(document).ready(function($) {
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
  
      jQuery('.p-card-category__wrap').each(function() {
        jQuery(this).find('.p-card').slice(visibleCards).hide(); // 指定枚数を超えたカードを非表示
        jQuery(this).find('.p-card').slice(0, visibleCards).show(); // 表示するカードを表示
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
  const $tabContents = jQuery('.p-tabs__pane');

  $tabs.on('click', function() {
    const category = jQuery(this).data('category');
    const tabColor = jQuery(this).css('--tab-color');
    
    $tabs.removeClass('active');
    $(this).addClass('active');
    
    $tabContents.removeClass('active');
    const $activePane = jQuery(`#${category}`);
    $activePane.addClass('active');

    // 背景色を更新
    $activePane.find('.p-card-category__wrap').css('background-color', tabColor);
  });

  // 初期表示時の背景色設定
  jQuery('.p-tabs__item.active').trigger('click');
});

// 最大表示枚数をウィンドウサイズによって可変
jQuery(document).ready(function($) {
  const $tabs = $('.p-tabs__item');
  const $tabContents = $('.p-tabs__pane');

  function adjustCardDisplay() {
    const windowWidth = $(window).width();
    let visibleCards;

    if (windowWidth >= 950) {
      visibleCards = 9;
    } else if (windowWidth >= 750) {
      visibleCards = 6;
    } else {
      visibleCards = 6;
    }

    $('.p-card-category__wrap').each(function() {
      $(this).find('.p-card').slice(visibleCards).hide();
      $(this).find('.p-card').slice(0, visibleCards).show();
    });
  }

  $tabs.on('click', function() {
    const category = $(this).data('category');
    const tabColor = $(this).css('--tab-color');
    
    $tabs.removeClass('active');
    $(this).addClass('active');
    
    $tabContents.removeClass('active');
    const $activePane = $(`#${category}`);
    $activePane.addClass('active');

    $activePane.find('.p-card-category__wrap').css('background-color', tabColor);

    adjustCardDisplay();
  });

  // 初期表示時の設定
  adjustCardDisplay();
  $('.p-tabs__item.active').trigger('click');

  // ウィンドウリサイズ時の処理
  $(window).on('resize', adjustCardDisplay);
});
});