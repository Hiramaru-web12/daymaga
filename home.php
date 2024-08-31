<?php get_header(); ?><section class="l-lower-all p-lower-all">
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
  </div>

  <?php get_template_part('template-parts/pagination');?>

</section>

<?php get_template_part('template-parts/tag-list');?>

<?php get_template_part('template-parts/cta');?>

<?php get_footer(); ?>