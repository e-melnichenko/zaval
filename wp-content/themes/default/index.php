<?php
/*
Template Name: Главная страница
*/
?>
<?php get_header(); ?>
<div class="slideshow">
  <div class="slider">
		<?php if( have_rows('fd1') ): ?>
			<?php while( have_rows('fd1') ): the_row(); 
				$name = get_sub_field('fd2');
				$text = get_sub_field('fd3');
				$button = get_sub_field('fd4');
				$img = get_sub_field('fd5');
			?>
	    <div class="slide_item">
	      <img src="<?php echo $img; ?>" class="slide_item__img" alt="">
	      <div class="slider_content">
	        <div class="container">
	          <div class="slider_info">
	            <h3><?php echo $name; ?></h3>
	            <span><?php echo $text; ?></span>
							<?php
								if ($button == '1'){
									echo '<a class="more effect_btn" href="/">Заказать сейчас</a>';
								} else {
							}
							?>
	          </div>
	        </div>
	      </div>
	    </div>
			<?php endwhile; ?>
		<?php endif; ?>
  </div>
</div>

<div class="services_block background_white">
  <div class="container">
    <div class="title_block not_bottom">
      <h3><b>Пиломатериалы:</b> Доска, Брус, Доска пола, Блок-хаус, Имитация бруса, Вагонка, Погонаж, Фанера, ОСП.</h3>
    </div>
    <div class="row-5 show_four">
      <?php echo do_shortcode( '[product_category category="pilomaterialy" per_page="4"]' ); ?>
    </div>
  </div>
</div>

<div class="services_block texture">
  <div class="container">
    <div class="title_block">
      <h3><b>Лучшие сезонные</b> предложения!</h3>
      <span>Мы рады предоставить вам нашу лучшую продукцию, за которую не будет стыдно, ведь она, проверена годами!</span>
    </div>
    <div class="row-5 show_four">
      <?php echo do_shortcode( '[featured_products orderby="date" order="desc" per_page="4"]' ); ?>
    </div>
  </div>
</div>

<div class="company_block">
  <div class="container">
    <div class="company_box">
      <div class="company_img"><img src="<?php echo get_template_directory_uri(); ?>/img/company.png" alt=""></div>
      <div class="company_text">
        <div class="company_title">
          <h3><?php the_field('fd6'); ?></h3>
          <span><?php the_field('fd7'); ?></span>
        </div>
        <?php the_field('fd8'); ?>
				<?php if ( get_field('fd9') == true ) { ?>
				<a class="more effect_btn" href="/o-nas">Подробнее о нас</a>
				<?php } else { ?>
				<?php } ?>
      </div>
    </div>
  </div>
</div>

<div class="services_block texture">
  <div class="container">
    <div class="title_block not_bottom">
      <h3><b>ДОСКА,</b> БРУС, ИМИТАЦИЯ БРУСА</h3>
    </div>
    <div class="row-5 show_four">
      <?php echo do_shortcode( '[product_category category="pilomaterialy" per_page="4"]' ); ?>
    </div>
  </div>
</div>

<div class="partner_block">
  <div class="container">
    <div class="partner_title">
      <h3><?php the_field('fd10'); ?></h3>
      <span><?php the_field('fd11'); ?></span>
    </div>
    <div class="partner_box">
		<?php 
		$images = get_field('fd12');
		if( $images ): ?>
      <?php foreach( $images as $image ): ?>
          <div class="partner_img_box"><img src="<?php echo $image['sizes']['large']; ?>" alt=""></div>
      <?php endforeach; ?>
		<?php endif; ?>
    </div>
  </div>
</div>

<div class="news_block texture">
  <div class="container">
    <div class="title_block">
      <h3>Статьи</h3>
      <a class="more effect_btn" href="/stati">Показать все</a>
    </div>
    <div class="row">
      <?php query_posts('cat=1&showposts=4'); ?>
      <div class="search-result__list">
        <?php if (have_posts()) : while (have_posts()) : the_post();?>
            <div class="news_box">
              <div class="news">
                <div class="img"><a href="<?php the_permalink(); ?>"><img src="<?php echo thumb_image_news(); ?>" alt="<?php the_title(); ?>"></a></div>
                <div class="content">
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <span><?php do_excerpt(get_the_excerpt(), 10); ?></span>
                  <div class="more"><a href="<?php the_permalink(); ?>">Подробнее</a></div>
                  <div class="time"><i class="fa fa-clock-o"></i> <?php the_time('d M Y'); ?></div>
                </div>
              </div>
            </div>
        <?php endwhile; else: ?>
        <?php endif; ?>
      </div>
      <?php wp_reset_query(); ?>
    </div>
  </div>
</div>

<div class="seo_block">
  <div class="container">
    <div class="seo_text">
    	<?php the_field('fd13'); ?>
    </div>
  </div>
</div>

<?php get_footer('home'); ?>
