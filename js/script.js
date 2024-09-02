jQuery(function() {
  // ヘッダーロゴの切り替え
  var $header = jQuery('.l-header');
  var $logoTop = jQuery('#js-logo--top');
  var $logoDown = jQuery('#js-logo--down');
  var $drawerWrap = jQuery('.p-drawer__wrap');
  var $headerSearchSp = jQuery('.p-header__search--sp');
  var scrollTrigger = 100; 
  var fadespeed = 200; 

  jQuery(window).scroll(function() {
      if (jQuery(window).scrollTop() > scrollTrigger) {
          if (!$header.hasClass('scrolled')) {
              $header.addClass('scrolled');
              $drawerWrap.addClass('scrolled');
              $headerSearchSp.addClass('scrolled');
              $logoTop.fadeOut(fadespeed, function() {
                  $logoDown.fadeIn(fadespeed);
              });
          }
      } else {
          if ($header.hasClass('scrolled')) {
              $header.removeClass('scrolled');
              $drawerWrap.removeClass('scrolled');
              $headerSearchSp.removeClass('scrolled');
              $logoDown.fadeOut(fadespeed, function() {
                  $logoTop.fadeIn(fadespeed);
              });
          }
      }
  });

  // ドロワー開閉
   jQuery('.c-drawer__icon').click(function(e){
   e.preventDefault();
   jQuery('.c-drawer__icon, .l-drawer').toggleClass(`is-active`);
    return false
   });

   jQuery('.l-drawer__link a[href^="#"]').click(function(e){
   e.preventDefault();
   jQuery('.c-drawer__icon, .l-drawer').removeClass(`is-active`);
   return false
 });

 // ウィンドウリサイズ時の処理
  jQuery(window).on('resize', function() {
   if (jQuery(window).width() > 1199) { 
    jQuery('.c-drawer__icon, .l-drawer').removeClass('is-active');
  }
});

  // タグの検索機能
  jQuery('#js-search, #js-search--sp, #js-search--drawer').click(function(e) {
    e.preventDefault(); 
        var headerHeight = 100; // ヘッダーの高さを取得
        var targetPosition = jQuery('.l-tag').offset().top - headerHeight; 

    jQuery('.c-drawer__icon, .l-drawer').removeClass('is-active');

    jQuery('html, body').animate({
        scrollTop: targetPosition
    }, 500, 'swing'); 
});

  const swiper1 = new Swiper('.p-fv-swiper', {
    // Optional parameters
    loop: true,
    loopAdditionalSlides: 1,
    centeredSlides: true, 
    
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    speed: 2000,
    centerInsufficientSlides: true,
    grabCursor: true,
    slidesPerView: 'auto',
  
    // Navigation arrows
    navigation: {
      nextEl: '.p-fv-swiper__button--next',
      prevEl: '.p-fv-swiper__button--prev',
    },
  
  });

  const swiper2 = new Swiper('.p-recommend-swiper', {
    // Optional parameters
    spaceBetween: 32,
    grabCursor: true,
    slidesPerView: 'auto',
  
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
    spaceBetween: 32,
    grabCursor: true,
    slidesPerView: 'auto',
  
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

// カテゴリータブの切り替え、ウィンドウサイズで表示数を可変   
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
        visibleCards = 6; 
      }
  
      jQuery('.p-top-card__wrap').each(function() {
        jQuery(this).find('.p-top__card').slice(visibleCards).hide(); 
        // 指定枚数を超えたカードを非表示
        jQuery(this).find('.p-top__card').slice(0, visibleCards).show(); 
        // 表示するカードを表示
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

