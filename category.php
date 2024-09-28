<?php get_header(); ?>
<section class="l-category p-all">
  <div class="l-category__inner l-inner">
    <?php
    // 現在のカテゴリーを取得
    $current_category = get_queried_object();
    $current_slug = $current_category->slug ?? 'all';
    $current_name = $current_category->name ?? 'すべての記事';
    ?>

    <h1 class="c-section__title p-all__title">
      <img src="<?php echo get_template_directory_uri(); ?>/img/common/logo.png" alt="ロゴ">
      <?php echo esc_html($current_name); ?>の記事
    </h1>

    <div class="l-tabs p-tabs">
      <div class="p-tab-list__wrap">
        <ul class="p-tabs__list">
          <?php
          $category = get_category_by_slug($current_slug);
          if ($category) {
            $color = get_field('color', 'category_' . $category->term_id);
            $color = $color ? $color : '#629DE2'; // カスタムフィールドが空の場合のデフォルト色
          } else {
            $color = '#629DE2'; // カテゴリーが見つからない場合のデフォルト色
          }
          ?>
          <li class="p-tabs__item active" data-category="<?php echo esc_attr($current_slug); ?>"
            style="background-color: <?php echo esc_attr($color); ?>;">
            <?php echo esc_html($current_name); ?>
          </li>
        </ul>
      </div>
      <div class="p-tabs__content">
        <div class="p-tabs__pane active" id="<?php echo esc_attr($current_slug); ?>">
          <div class="p-card-category__wrap" style="background-color: <?php echo esc_attr($color); ?>;">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
              'category_name' => $current_slug === 'all' ? '' : $current_slug,
              'posts_per_page' => 9,
              'paged' => $paged
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
              while($query->have_posts()) : $query->the_post();
            ?>
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
                  <li class="c-tag"><?php echo $tag->name; ?>
                  </li>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </ul>
              </a>
            </div>
            <?php
              endwhile;
            else :
            ?>
            <div class="p-card__block--prepared">
              <p>投稿の準備中です。</p>
            </div>
            <?php
            endif;
            wp_reset_postdata();
            ?>
          </div>
        </div>
      </div>
    </div>

    <?php get_template_part( 'template-parts/pagination'); ?>
  </div>
</section>

<?php get_template_part('template-parts/tag-list');?>

<?php get_template_part('template-parts/cta');?>

<?php get_footer(); ?>