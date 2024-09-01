<?php if(paginate_links()) : ?>
<!-- pagination -->
<nav class="l-pagiNav pagination l-inner">
  <div class="nav-links">
    <?php
          echo paginate_links(
           array(
            'end_size' => 1,
            'mid_size' => 1,
            'prev_next' => true,
            'prev_text' => '<img src="' . esc_url(get_template_directory_uri() . '/img/common/prev-arrow.svg') . '" alt="前へ">',
            'next_text' => '<img src="' . esc_url(get_template_directory_uri() . '/img/common/next-arrow.svg') . '" alt="次へ">',
           )
          );
         ?>
  </div>
</nav><!-- /pagination -->
<?php endif; ?>