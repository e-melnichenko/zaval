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
    <div class="articles">
      <?
        $page_ID = get_the_ID();
        $page    = get_query_var( 'page' );
        $args    = array(
          'posts_per_page' => 12,
          'paged'          => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1
        );

        if ( is_front_page() ) {
          $args['paged'] = $page;
        }

        

        $custom_query = new WP_Query( $args );
        if ($custom_query->have_posts()) :?>
          <div class="articles__list">
        <?
          while($custom_query->have_posts()) :
            $custom_query->the_post(); 
        ?>
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
        <? endwhile ?>
      </div>
        <?
          $pagination_args = array();
          if ( ! is_front_page() && 0 < intval( $page ) ) {
            $pagination_args['base'] = user_trailingslashit(
              untrailingslashit( get_page_link( $page_ID ) ) . '/page/%#%'
            );
          }
          $GLOBALS['wp_query'] = $custom_query;
          the_posts_pagination( $pagination_args );
        ?>
        <?else :?>
          Записей нет
        <?endif?>
        <?wp_reset_query();?>
    </div>
<?/*
      <?php query_posts('cat=1&posts_per_page=4'); ?>
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
            <?php endwhile; ?>
            <div class="navigation_block"><?php the_posts_pagination(); ?></div>
            <?else: ?>
              Записей нет
              <?php endif; ?>
      </div>
      <?php wp_reset_query(); ?>
    </div>
    */?>
    <?/*
    <div class="row">
        <?php if( have_posts() ){ while( have_posts() ){ the_post(); ?>
          <div class="news_box" id="post-<?php the_ID(); ?>">
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
            <?php } ?>
            <div class="navigation_block"><?php the_posts_pagination(); ?></div>
        <?php
        }
        else 
            echo "Записей нет";
        ?>

        */?>



<?/*
    <?php query_posts('cat=1'); ?>
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
    */?>
  </div>
</div>
<?php get_footer('home'); ?>