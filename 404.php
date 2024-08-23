<?php get_header(); ?>

<section class="l-page404">
  <div class="l-page404__inner p-page404__inner l-inner">
    <div class="p-page404__content">
      <div class="p-page404__wrap">
        <div class="p-page404__logo"><img src="<?php echo get_template_directory_uri(  ); ?>/img/common/logo.png"
            alt="DayMagaロゴ">
        </div>
        <p class="p-page404_message">this page not found</p>
        <p class="p-page404__404">404</p>
      </div>
      <p class="p-page404_text--top">申し訳ございません。お探しのページが存在しません。</p>
      <p class="p-page404_text--bottom">トップページに戻ってコンテンツお探しください。</p>
      <div class="p-page404-button__wrap">
        <button class="c-page404__button">TOPページに戻る</button>
      </div>
    </div>
  </div>
</section>
<?php get_template_part('template-parts/cta');?>
<?php get_footer(); ?>