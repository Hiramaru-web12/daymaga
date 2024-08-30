<section class="l-recommend p-entry-recommend">
  <div class="l-recommend__inner">
    <div class="swiper p-entry-recommend-swiper">

      <div class="p-recommend__head">
        <h1 class="c-section__title p-entry-recommend__title"><img
            src="<?php echo get_template_directory_uri(  ); ?>/img/common/logo.png" alt="ロゴ">おすすめ記事</h1>
        <div class="swiper-button-prev p-entry-recommend__button--prev"><svg width="48" height="49" viewBox="0 0 48 49"
            fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="btn/left" opacity="1.0">
              <circle cx="24" cy="24" r="23" transform="matrix(-1 0 0 1 48 0.100098)" stroke="#135097"
                stroke-width="2" />
              <path
                d="M15.2929 24.8072C14.9024 24.4167 14.9024 23.7835 15.2929 23.393L21.6569 17.029C22.0474 16.6385 22.6805 16.6385 23.0711 17.029C23.4616 17.4196 23.4616 18.0527 23.0711 18.4432L17.4142 24.1001L23.0711 29.757C23.4616 30.1475 23.4616 30.7806 23.0711 31.1712C22.6805 31.5617 22.0474 31.5617 21.6569 31.1712L15.2929 24.8072ZM32 25.1001H16V23.1001H32V25.1001Z"
                fill="#135097" />
            </g>
          </svg></div>
        <div class="swiper-button-next p-entry-recommend__button--next"><svg width="48" height="49" viewBox="0 0 48 49"
            fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="btn/right" opacity="1.0">
              <circle id="Ellipse 34" cx="24" cy="24.1001" r="23" stroke="#135097" stroke-width="2" />
              <path id="Arrow 1"
                d="M32.7071 24.8072C33.0976 24.4167 33.0976 23.7835 32.7071 23.393L26.3431 17.029C25.9526 16.6385 25.3195 16.6385 24.9289 17.029C24.5384 17.4196 24.5384 18.0527 24.9289 18.4432L30.5858 24.1001L24.9289 29.757C24.5384 30.1475 24.5384 30.7806 24.9289 31.1712C25.3195 31.5617 25.9526 31.5617 26.3431 31.1712L32.7071 24.8072ZM16 25.1001H32V23.1001H16V25.1001Z"
                fill="#135097" />
            </g>
          </svg></div>
      </div>
      <div class="swiper-wrapper p-recommend__wrap">
        <!-- Slides -->
        <?php $pickup_query = new WP_Query(
        array(
          'post_type'      => 'post',
          'posts_per_page' => 5
        )
      );
      ?>
        <?php if ($pickup_query->have_posts()) : ?>
        <?php while($pickup_query->have_posts()) : ?>
        <?php $pickup_query->the_post(); ?>
        <div class="swiper-slide p-recommend__card p-card">
          <a href="<?php the_permalink(); ?>">

            <div class="p-card__img">
              <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail(); ?>
              <?php else : ?>
              <img src="<?php echo get_template_directory_uri(); ?>/img/common/noimg.png" alt="画像がありません">
              <?php endif; ?>
              <div class="p-card__body">
                <time class="p-card__time" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
                <h1 class="p-card__title"><?php the_title(); ?></h1>
                <?php
                $this_category = get_the_category();
                if($this_category) {
                $this_category_color = get_field( 'color', 'category_' . $this_category[0]->term_id); 
                $this_category_name  = $this_category[0]->name;
                echo '<p class="p-card__category" style= "' . esc_attr(
                   'color:' . $this_category_color . '; 
                   border: 1px solid ' . $this_category_color) . ';">' . esc_html( $this_category_name ) . '</p>';
                }?>
              </div>
            </div>
            <?php $post_tags = get_the_tags(); ?>
            <ul class="p-card-tag__list">
              <?php if ($post_tags) : ?>
              <?php foreach($post_tags as $tag) : ?>
              <li class="p-card__tag c-tag"><a
                  href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?></a>
              </li>
              <?php endforeach; ?>
              <?php endif; ?>
            </ul>
          </a>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </div>
      <div class="swiper-scrollbar"></div>
    </div>
  </div>
</section>