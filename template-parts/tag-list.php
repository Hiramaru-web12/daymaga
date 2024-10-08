<div class="l-tag">
  <div class="l-tag__inner l-inner">
    <div class="p-tag__content">
      <div class="p-tag__title">
        <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M24.5 25L17.5 18M3.5 12.1667C3.5 13.2391 3.71124 14.3011 4.12165 15.2919C4.53206 16.2827 5.13362 17.183 5.89196 17.9414C6.65031 18.6997 7.55059 19.3013 8.54142 19.7117C9.53224 20.1221 10.5942 20.3333 11.6667 20.3333C12.7391 20.3333 13.8011 20.1221 14.7919 19.7117C15.7827 19.3013 16.683 18.6997 17.4414 17.9414C18.1997 17.183 18.8013 16.2827 19.2117 15.2919C19.6221 14.3011 19.8333 13.2391 19.8333 12.1667C19.8333 11.0942 19.6221 10.0322 19.2117 9.04142C18.8013 8.05059 18.1997 7.15031 17.4414 6.39196C16.683 5.63362 15.7827 5.03206 14.7919 4.62165C13.8011 4.21124 12.7391 4 11.6667 4C10.5942 4 9.53224 4.21124 8.54142 4.62165C7.55059 5.03206 6.65031 5.63362 5.89196 6.39196C5.13362 7.15031 4.53206 8.05059 4.12165 9.04142C3.71124 10.0322 3.5 11.0942 3.5 12.1667Z"
            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        キーワードで絞り込む
      </div>

      <?php $post_tags = get_the_tags(); ?>
      <ul class="p-tag-list__wrap">
        <?php
         $tags = get_tags(); // すべてのタグを取得
         foreach ($tags as $tag) : ?>
        <li>
          <a href="<?php echo get_tag_link($tag->term_id); ?>" class="c-tag --hover"
            title="<?php echo esc_attr($tag->name); ?>">
            <?php echo esc_html($tag->name); ?>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>