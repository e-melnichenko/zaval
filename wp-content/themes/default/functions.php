<?php
function default_style() {
  wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'default_style' );

function wp_enqueue_woocommerce_style(){
    wp_register_style( 'mytheme-woocommerce', '/wp-content/plugins/woocommerce/assets/css/woocommerce.css' );
    if ( class_exists( 'woocommerce' ) ) {
        wp_enqueue_style( 'mytheme-woocommerce' );
    }
}
add_action( 'wp_enqueue_scripts', 'wp_enqueue_woocommerce_style' );

add_filter('woocommerce_show_page_title', create_function('$result', 'return false;'), 20);

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

function jquery_register() {
  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js' );
  wp_enqueue_script( 'jquery' );
}
add_action('wp_enqueue_scripts', 'jquery_register');

function default_scripts () {
  wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
  wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.min.css' );
  wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.min.css' );
  wp_enqueue_script( 'slickjs', get_template_directory_uri() . '/js/slick.min.js' );
  wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js' );
  wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/owl.carousel.min.js' );
  wp_enqueue_script( 'lib', get_template_directory_uri() . '/js/lib.js' );
  
}
add_action( 'wp_footer', 'default_scripts' );

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

function remove_jquery_migrate( &$scripts){
  if(!is_admin()){
      $scripts->remove( 'jquery');
      $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.2.1' );
  }
}
add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );

add_action( 'after_setup_theme', 'theme_reg_menu' );
function theme_reg_menu() {
  register_nav_menu( 'header-nav', 'Основное меню' );
  register_nav_menu( 'header-nav3', 'Меню в шапке' );
  register_nav_menu( 'header-footer', 'Меню в футере' );
}


add_theme_support( 'post-thumbnails' );
add_image_size( 'news-thumb', 420, 260, true); 

function thumb_image_news() { 
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'news-thumb', true);
echo $thumb_url[0];
}

function thumb_big() { 
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
echo $thumb_url[0];
}

function remove_link_category($cat_url) {
  $cat_url = str_replace('/category', '', $cat_url);
  return $cat_url;
}
add_filter('category_link', 'remove_link_category', 1, 1);


function navigation_template( $template, $class ){
 return '
 <nav class="navigation_block" role="navigation">
  <div class="navigation_links">%3$s</div>
 </nav>
 ';
}
add_filter('navigation_markup_template', 'navigation_template', 10, 2 );

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
add_filter('rest_enabled', '__return_false');
remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 );
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
remove_action( 'auth_cookie_malformed', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_expired', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_username', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_hash', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_valid', 'rest_cookie_collect_status' );
remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );
remove_action( 'init', 'rest_api_init' );
remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
remove_action( 'parse_request', 'rest_api_loaded' );
remove_action( 'rest_api_init', 'wp_oembed_register_route' );
remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
remove_action( 'wp_head', 'wp_resource_hints', 2);



function do_excerpt($string, $word_limit) {
  $words = explode(' ', $string, ($word_limit + 1));
  if (count($words) > $word_limit)
  array_pop($words);
  echo implode(' ', $words).' ...';
}

remove_action('load-update-core.php','wp_update_themes');
add_filter('pre_site_transient_update_themes',create_function('$a', "return null;"));
wp_clear_scheduled_hook('wp_update_themes');

remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
wp_clear_scheduled_hook( 'wp_update_plugins' );

add_filter('pre_site_transient_update_core',create_function('$a', "return null;"));
wp_clear_scheduled_hook('wp_version_check');

show_admin_bar(false);

function remove_stylesheet() {
  wp_dequeue_style('contact-form-7');
}
add_action( 'wp_enqueue_scripts', 'remove_stylesheet', 20 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);


add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="main">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}



add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
 
// Все $fields в этой функции будут пропущены через фильтр
function custom_override_checkout_fields( $fields ) {
$fields['billing']['billing_address_2']['placeholder'] = 'Адрес доставки';

$fields['billing']['billing_last_name']['required'] = false;
$fields['billing']['billing_email']['required'] = false;
$fields['billing']['billing_city']['required'] = false;
$fields['billing']['billing_address_1']['required'] = false;

unset($fields['billing']['billing_company']);
unset($fields['billing']['billing_state']);
unset($fields['billing']['billing_postcode']);
unset($fields['order']['order_comments']);
return $fields;
}

?>