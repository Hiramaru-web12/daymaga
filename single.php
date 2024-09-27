<?php get_header(); ?>

<section class="l-entry">
  <div class="l-entry__inner l-inner">
    <article class="p-entry">
      <div class="p-entry__header">
        <div class="p-entry__meta">
          <time class="p-entry__published" datetime="<?php the_time('c'); ?>">
            <span>公開日</span>
            <?php the_time('Y/n/j'); ?>
          </time>
        </div>
        <div class="p-entry__category">
          <?php
          $this_category = get_the_category();
          if ($this_category) {
            $this_category_color = get_field('color', 'category_' . $this_category[0]->term_id);
            $this_category_name = $this_category[0]->name;
            echo '<p class="p-fv-card__category" style="' . esc_attr('color:' . $this_category_color . '; border: 1px solid ' . $this_category_color) . ';">' . esc_html($this_category_name) . '</p>';
          }
          ?>
        </div>
        <h1 class="p-entry__title">
          <?php the_title(); ?>
        </h1>
        <?php if (has_post_thumbnail()): ?>
        <div class="p-entry__img">
          <?php the_post_thumbnail(); ?>
        </div>
        <?php else: ?>
        <img src="<?php echo esc_url(get_template_directory_uri() . '/img/noimg.png'); ?>" alt="No Image">
        <?php endif; ?>
      </div>

      <div class="p-entry__body">
        <?php the_content(); ?>
      </div>

      <div class="p-entry__bottom">
        <p>この記事のタグ</p>
        <?php
        $post_tags = get_the_tags();
        if ($post_tags) {
          echo '<div class="p-card-tag__list">';
          foreach ($post_tags as $tag) {
            echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '" class="c-tag p-card-tag">' . esc_html($tag->name) . '</a> ';
          }
          echo '</div>';
        }
        ?>
      </div>
    </article>
  </div>
</section>

<?php get_template_part('template-parts/entry-recommend'); ?>
<?php get_template_part('template-parts/tag-list'); ?>
<?php get_template_part('template-parts/cta'); ?>
<?php get_footer(); ?>