<!-- footer -->
<footer class="l-footer p-footer">
  <div class="l-footer__inner l-inner">
    <div class="p-footer__content">
      <div class="p-footer__logo">
        <img src="<?php echo get_template_directory_uri(  );?>/img/footer/logo-white.png" alt="DayMaga">
      </div>
      <div class="p-footer-nav__wrap">
        <ul class="p-footer__nav p-footer__nav--right">
          <li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('new'))); ?>">新着情報</a></li>
          <li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('tips'))); ?>">TIPS</a></li>
          <li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('interview'))); ?>">インタビュー</a></li>
          <li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('news'))); ?>">ニュース</a></li>
        </ul>

        <ul class="p-footer__nav p-footer__nav--right">
          <li><a href="#">DayMagaについて</a></li>
          <li><a href="#">運営会社</a></li>
          <li><a href="#">サイト利用規約</a></li>
        </ul>
      </div>
    </div>
    <div class="p-footer-copyright__wrap">
      <p class="p-footer-copyright"><small lang="en">©︎2024 Daytra Consul</small></p>
      <p class="p-footer__text">このサイトはCrown Cat株式会社様のご協力のもと作成したコーディング用の練習課題です。実在の人物・団体とは関係ありません。</p>
    </div>
  </div>

</footer>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<?php wp_footer(); ?>
</body>

</html>