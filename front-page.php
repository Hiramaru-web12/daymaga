<?php get_header(); ?>

<section class="l-fv p-fv">
  <div class="p-fv-swiper-box">
    <!-- Slider main container -->
    <div class="swiper p-fv-swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper p-fv-swiper-wrap">
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
        <a href="<?php the_permalink(); ?>">
          <div class="swiper-slide p-fv__card">
            <div class="p-card__img">
              <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail(); ?>
              <?php else : ?>
              <img src="<?php echo get_template_directory_uri(); ?>/img/common/noimg.png" alt="画像がありません">
              <?php endif; ?>
              <div class="p-card__body">
                <time class="p-card__time" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
                <h1 class="p-card__title p-fv-card__title"><?php the_title(); ?></h1>
                <?php
                  $this_category = get_the_category();
                  if($this_category) {
                  $this_category_color = get_field( 'color', 'category_' . $this_category[0]->term_id);
                  $this_category_name  = $this_category[0]->name;
                  echo '<p class="p-card__category p-fv-card__category" style= "' . esc_attr(
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
          </div>
        </a>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </div>

      <!-- If we need navigation buttons -->
    </div>
    <div class="p-fv-swiper-button__wrap">
      <div class="swiper-button-prev p-fv-swiper__button--prev"></div>
      <div class="swiper-button-next p-fv-swiper__button--next"></div>
    </div>

  </div>
</section>

<!-- 最新情報 -->
<section class="l-latest p-latest">
  <div class="l-latest__inner l-inner">
    <h1 class="c-section__title p-latest__title"><img
        src="<?php echo get_template_directory_uri(  ); ?>/img/common/logo.png" alt="ロゴ">新着情報</h1>
    <div class="p-card-latest__wrap">
      <?php $latest_query = new WP_Query(
          array(
            'post_type'      => 'post',
            'posts_per_page' => 3
          )
        );
        ?>
      <?php if ($latest_query->have_posts()) : ?>
      <?php while($latest_query->have_posts()) : ?>
      <?php $latest_query->the_post(); ?>
      <div class="p-card">
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
    <div class="p-latest-button__wrap">
      <a href="" class="c-more__button">もっとみる</a>
    </div>
  </div>
</section>

<section class="l-recommend p-recommend">
  <div class="l-recommend__inner">
    <div class="swiper p-recommend-swiper">

      <div class="p-recommend__head">
        <h1 class="c-section__title p-recommend__title"><img
            src="<?php echo get_template_directory_uri(  ); ?>/img/recommend/white-logo.png" alt="ロゴ">おすすめ記事</h1>
        <div class="swiper-button-prev p-recommend__button--prev"><svg width="48" height="49" viewBox="0 0 48 49"
            fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="btn/left" opacity="1.0">
              <circle cx="24" cy="24" r="23" transform="matrix(-1 0 0 1 48 0.100098)" stroke="white" stroke-width="2" />
              <path
                d="M15.2929 24.8072C14.9024 24.4167 14.9024 23.7835 15.2929 23.393L21.6569 17.029C22.0474 16.6385 22.6805 16.6385 23.0711 17.029C23.4616 17.4196 23.4616 18.0527 23.0711 18.4432L17.4142 24.1001L23.0711 29.757C23.4616 30.1475 23.4616 30.7806 23.0711 31.1712C22.6805 31.5617 22.0474 31.5617 21.6569 31.1712L15.2929 24.8072ZM32 25.1001H16V23.1001H32V25.1001Z"
                fill="white" />
            </g>
          </svg></div>
        <div class="swiper-button-next p-recommend__button--next"><svg width="48" height="49" viewBox="0 0 48 49"
            fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="btn/right" opacity="1.0">
              <circle id="Ellipse 34" cx="24" cy="24.1001" r="23" stroke="white" stroke-width="2" />
              <path id="Arrow 1"
                d="M32.7071 24.8072C33.0976 24.4167 33.0976 23.7835 32.7071 23.393L26.3431 17.029C25.9526 16.6385 25.3195 16.6385 24.9289 17.029C24.5384 17.4196 24.5384 18.0527 24.9289 18.4432L30.5858 24.1001L24.9289 29.757C24.5384 30.1475 24.5384 30.7806 24.9289 31.1712C25.3195 31.5617 25.9526 31.5617 26.3431 31.1712L32.7071 24.8072ZM16 25.1001H32V23.1001H16V25.1001Z"
                fill="white" />
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

<section class="l-all p-all">
  <div class="l-all__inner l-inner">
    <h1 class="c-section__title p-all__title">
      <img src="<?php echo get_template_directory_uri(); ?>/img/common/logo.png" alt="ロゴ">すべての記事
    </h1>

    <ul class="p-order__list--sp">
      <li class="active"><a href="">新着順</a></li>
      <li><a href="">人気順</a></li>
    </ul>
    <div class="l-tabs p-tabs">
      <div class="p-tab-list__wrap">
        <ul class="p-tabs__list">
          <?php
          $categories = array(
          'all' => 'すべて',
          'new' => '新着情報',
          'tips' => 'TIPS',
          'interview' => 'インタビュー',
          'news' => 'ニュース'
         );
        foreach ($categories as $slug => $name) :
         if ($slug === 'all') {
          $color = '#629DE2'; // デフォルト色
         } else {
          $category = get_category_by_slug($slug);
         if ($category) {
          $color = get_field('color', 'category_' . $category->term_id);
          $color = $color ? $color : '#629DE2'; // カスタムフィールドが空の場合のデフォルト色
         } else {
          $color = '#629DE2'; // カテゴリーが見つからない場合のデフォルト色
         }
        }
             ?>
          <li class="p-tabs__item <?php echo $slug === 'all' ? 'active' : ''; ?>"
            data-category="<?php echo esc_attr($slug); ?>" style="--tab-color: <?php echo esc_attr($color); ?>;">
            <?php echo esc_html($name); ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <ul class="p-order__list">
          <li class="active"><a href="">新着順</a></li>
          <li><a href="">人気順</a></li>
        </ul>
      </div>
      <div class="p-tabs__content">
        <?php
        foreach ($categories as $slug => $name) :
          $args = array(
            'category_name' => $slug === 'all' ? '' : $slug,
            'posts_per_page' => 9
          );
          $query = new WP_Query($args);
        ?>
        <div class="p-tabs__pane <?php echo $slug === 'all' ? 'active' : ''; ?>" id="<?php echo $slug; ?>">
          <div class="p-card-category__wrap">
            <?php if ($query->have_posts()) : ?>
            <?php while($query->have_posts()) : $query->the_post(); ?>
            <div class="p-card">
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
            <?php else : ?>
            <div class="p-card__block--prepared">
              <p>投稿の準備中です。</p>
            </div>
            <?php endif; ?>
          </div>
        </div>
        <?php wp_reset_postdata(); ?>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="p-all-button__wrap">
      <a href="" class="c-more__button">もっとみる</a>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/tag-list');?>

<?php get_template_part('template-parts/cta');?>

<?php get_footer(); ?>