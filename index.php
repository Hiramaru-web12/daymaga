<?php get_header(); ?>

<section class="l-fv p-fv">
  <div class="p-fv-swiper-box">
    <!-- Slider main container -->
    <div class="swiper p-fv-swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper p-fv-swiper-wrap">
        <!-- Slides -->
        <?php $pickup_ids = array(19, 21, 1, 14, 16); ?>
        <?php $pickup_query = new WP_Query(
        array(
          'post_type'      => 'post',
          'post__in'       => $pickup_ids,
          'posts_per_page' => 5
        )
      );
      ?>
        <?php if ($pickup_query->have_posts()) : ?>
        <?php while($pickup_query->have_posts()) : ?>
        <?php $pickup_query->the_post(); ?>
        <div class="swiper-slide p-fv__card">
          <a href="<?php the_permalink(); ?>"></a>
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
    <!-- If we need pagination -->
    <div class="swiper-pagination p-fv-swiper__pagination"></div>
  </div>
</section>

<!-- 最新情報 -->
<section class="l-latest p-latest">
  <div class="l-latest__inner l-inner">
    <h1 class="c-section__title p-latest__title"><img
        src="<?php echo get_template_directory_uri(  ); ?>/img/common/logo.png" alt="ロゴ">新着情報</h1>
    <div class="p-latest-card__wrap">
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
        <a href="<?php the_permalink(); ?>"></a>
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
      </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </div>
    <div class="p-latest-button__wrap">
      <a href="" class="c-more__button">もっとみる</a>
    </div>
</section>


<?php get_template_part('template-parts/tag-list');?>

<?php get_template_part('template-parts/cta');?>

<?php get_footer(); ?>