<!DOCTYPE html>
<html lang="ja">

<head prefix="og: https://ogp.me/ns#">
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="icon" href="<?php echo get_template_directory_uri(  ); ?>/img/favicon.svg" sizes="any"
    type="img/svg+xml" />
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(  ); ?>/img/apple-touch-icon.png" />
  <!-- 180x180px -->
  <meta name="viewport" content="width=device-width, initiap-scale=1.0" />
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(  ); ?>/img/favicon.ico" />
  <!-- google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Zen+Maru+Gothic:wght@400;700&display=swap"
    rel="stylesheet">

  <!-- swiper -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <?php wp_head(); ?>
</head>

<body>
  <!-- header -->
  <header class="l-header p-header" id="js-header">
    <div class="l-header__inner">
      <div class="p-header__logo--top ">
        <img src="<?php echo get_template_directory_uri(  ); ?>/img/header/only-top.png"
          alt="ビジネスの未来を切り拓く DayMaga コンサルティングの専門情報メディア">
      </div>
      <div class="p-header__logo--down">
        <img src="<?php echo get_template_directory_uri(  ); ?>/img/header/logo.png" alt="DayMaga">
      </div>
      <div class="p-header__nav">
        <ul class="p-header-nav__inner is-pc">
          <li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('new'))); ?>">新着情報</a></li>
          <li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('tips'))); ?>"> TIPS</a></li>
          <li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('interview'))); ?>">インタビュー</a></li>
          <li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('news'))); ?>">ニュース</a></li>

        </ul>
        <div class="p-header-button__wrap is-pc">
          <button class="c-header__button--left">
            <p class="button-top">コンサルをお探しの企業様</p>
            <p class="button-bottom">まずは無料相談</p>
          </button>
          <button class="c-header__button--right">
            <p class="button-top">コンサルタントの方</p>
            <p class="button-bottom">案件の紹介登録</p>
          </button>
        </div>
        <div class="p-header__search--pc is-pc">
          <img src="<?php echo get_template_directory_uri(  ); ?>/img/header/tabler_search.svg" alt="search">
        </div>
        <!-- drawer -->
        <div class="p-drawer__wrap is-sp">
          <div class="c-drawer__icon l-drawer__icon">
            <div class="c-drawer__bars">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
          <div class="p-header__search--sp ">
            <img src="<?php echo get_template_directory_uri(  ); ?>/img/header/tabler_search.svg" alt="search">
          </div>
        </div>
      </div>
    </div>
    <div class="l-drawer p-drawer is-sp">
      <div class="l-drawer__inner">
        <ul class="p-drawer__nav">
          <li><a href="">新着情報</a></li>
          <li><a href="">TIPS</a></li>
          <li><a href="">インタビュー</a></li>
          <li><a href="">ニュース</a></li>
          <li><a href=""><img src="<?php echo get_template_directory_uri(  ); ?>/img/header/tabler_search.svg"
                alt="search"></a></li>
        </ul>
      </div>
    </div>

    </div>

  </header>