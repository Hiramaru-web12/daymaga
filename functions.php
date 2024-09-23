<?php 
function my_setup() {
  add_theme_support('post-thumbnails');
  add_theme_support('automatic-feed-links');
  add_theme_support('title-tag');
  add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ));
}
add_action("after_setup_theme", "my_setup");

function my_script_init() {
  wp_enqueue_style( "my", get_template_directory_uri( ) . "/css/style.css", array(), filemtime(get_theme_file_path('css/style.css')), "all");
  wp_enqueue_script("my", get_template_directory_uri() . "/js/script.js", array("jquery"), filemtime(get_theme_file_path('js/script.js')), true);
 }
 add_action("wp_enqueue_scripts", "my_script_init");

 function custom_title_length($title) {
  if (!is_single()) {
    $max = 32;
    if (mb_strlen($title) > $max) {
      return mb_substr($title, 0, $max) . '...';
    }
  }
  return $title;
}
add_filter('the_title', 'custom_title_length');

// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
} 
 ?>