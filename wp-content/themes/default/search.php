<?php get_header(); ?>
<div class="speedbar_box">
  <div class="container">
    <?php if(function_exists('bcn_display')) { bcn_display(); } ?>
  </div>
</div>
<div class="content_inner_block">
  <div class="container">
    <div class="title_block not_bottom">
      <h1><?php wp_title('', true, 'right'); ?></h1>
    </div>
    <div class="search-result news">
      <div class="search-result__list">
        <?php if( have_posts() ){ while( have_posts() ){ the_post(); ?>
          <div class="news_box" id="post-<?php the_ID(); ?>">
            <div class="img"><a href="<?php the_permalink(); ?>"><img src="<?php echo thumb_image_news(); ?>" alt="<?php the_title(); ?>"></a></div>
            <div class="content">
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <span><?php do_excerpt(get_the_excerpt(), 10); ?></span>
              <div class="more"><a href="<?php the_permalink(); ?>">Подробнее</a></div>
              <div class="time"><i class="fa fa-clock-o"></i> <?php the_time('d M Y'); ?></div>
            </div>
          </div>
        <?php } ?>
        <?php
        }
        else 
            echo "Записей нет";
        ?>
      </div>

      <div class="navigation_block"><?php the_posts_pagination(); ?></div>
    </div>
  </div>
</div>
<?php get_footer('home'); ?>