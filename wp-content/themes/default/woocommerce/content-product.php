<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="services_box_inner">
  <div class="services">
    <div class="img"><a href="<?php the_permalink() ?>"><img src="<?php echo thumb_big(); ?>" alt=""></a></div>
    <div class="content">
      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h3>
      <div class="add_price"></div>
      <a href="?add-to-cart=<?php echo $id; ?>" class="add_cart">В корзину</i></a>
      <div class="summ"><?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?></div>
    </div>
  </div>
</div>