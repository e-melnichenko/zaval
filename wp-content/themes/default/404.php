<?php get_header(); ?>
<div class="speedbar_box">
  <div class="container">
    <?php woocommerce_breadcrumb(); ?>
  </div>
</div>
<div class="content_inner_block">
  <div class="container">
    <div class="inner_block">
      <?/*
      <div class="rightbar desktop_rightbar">
        <h3>Рекомендуемые новости</h3>
        <?php query_posts('cat=1&showposts=4'); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post();?>
          <div class="recomended_box">
            <div class="recomended">
              <div class="img"><a href="<?php the_permalink(); ?>"><img src="<?php echo thumb_image_news(); ?>" alt="<?php the_title(); ?>"></a></div>
              <div class="content">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <span><?php do_excerpt(get_the_excerpt(), 10); ?></span>
                <div class="time"><i class="fa fa-clock-o"></i> <?php the_time('d M Y'); ?></div>
                <div class="more"><a href="<?php the_permalink(); ?>">Подробнее</a></div>
              </div>
            </div>
          </div>
        <?php endwhile; else: ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
        <div class="rightbar desktop_rightbar"><?php get_sidebar('rightcolumn'); ?></div>
      </div>
      */?>
      <div class="full_content">
        <h1 class="full_title">Ошибка 404</h1>
        <div class="fullstory">
          <div class="fullstory_text">
            Такой страницы не существует!
          </div>
        </div>
      </div>
      <?/*
      <div class="rightbar table_rightbar">
        <h3>Рекомендуемые новости</h3>
        <div class="row">
        <?php query_posts('cat=1&showposts=4'); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post();?>
          <div class="recomended_box">
            <div class="recomended">
              <div class="img"><a href="<?php the_permalink(); ?>"><img src="<?php echo thumb_image_news(); ?>" alt="<?php the_title(); ?>"></a></div>
              <div class="content">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <span><?php do_excerpt(get_the_excerpt(), 10); ?></span>
                <div class="time"><i class="fa fa-clock-o"></i> <?php the_time('d M Y'); ?></div>
                <div class="more"><a href="<?php the_permalink(); ?>">Подробнее</a></div>
              </div>
            </div>
          </div>
        <?php endwhile; else: ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
        </div>
      </div>
      */?>
    </div>
  </div>
</div>
<?php get_footer('home'); ?>