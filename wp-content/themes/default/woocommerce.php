<?php get_header(); ?>
<div class="speedbar_box">
  <div class="container">
    <?php woocommerce_breadcrumb(); ?>
  </div>
</div>
<div class="content_inner_block">
  <div class="container">
    <div class="title_block not_bottom">
      <h1><?php woocommerce_page_title(); ?></h1>
    </div>
    <div class="inner_block">
      <div class="rightbar desktop_rightbar"><?php get_sidebar('rightcolumn'); ?></div>
	    <div class="overflow_block title_hidden">
		    <div class="row"><?php woocommerce_content(); ?></div>
		    <div class="rightbar table_rightbar"><?php get_sidebar('rightcolumnmobile'); ?></div>
	    </div>
  	</div>
	</div>
</div>
<?php get_footer('home'); ?>