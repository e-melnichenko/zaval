<!DOCTYPE html>
<html lang="ru">
<head>
    <title><?php wp_title('—', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header">
  <div class="container">
    <div class="header_content">
      <div class="logo"><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt=""></a></div>
      <div class="contact_head_b">
      	<div class="top_menu">
      		<ul>
            <?php wp_nav_menu( array( 'container' => '', 'items_wrap' => '%3$s', 'theme_location' => 'header-nav3') ); ?>
      		</ul>
    	</div>
        <div class="search_block">
          <form class="search_form" method="get">
            <input type="text" class="search_text" placeholder="Введите ваш запрос" value="<?php echo get_search_query() ?>" name="s" id="s">
            <input type="submit" class="search-button" value="">
          </form>
        </div>
      </div>
      <div class="contact_head">
        <div class="phone"> +7 (8452) 39-20-28</div>
        <div class="phone"> +7 (904) 241-74-84</div>
        <a href="mailto:392028@inbox.ru" class="mail">392028@inbox.ru</a>
      </div>
      <div class="contact_head_a">
        <div class="adress">410038, г.Саратов, 6-ой Соколовогорский пр-д, стр. 1 </div>
        <div class="road modal-link">ПОСМОТРЕТЬ СХЕМУ ПРОЕЗДА. КООРДИНАТЫ GPS:  51.559020, 46.068280</div>
        <div class="time"><i class="fa fa-clock-o"></i> Пн-Сб 08.00 - 18.00 Вс 8.00-15.00</div>
      </div>
    </div>
  </div>
</header>
<div class="overlay">
  <div class="overlay__modal overlay_iframe">
    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A3d115b0978869b48ae94ea76fee0dc5f7fc4e77ab7c258dd0fc53e0e5fcba726&amp;width=100%25&amp;height=100%&amp;lang=ru_RU&amp;scroll=true"></script>
     <button class="overlay__close"><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt=""></button>
  </div>
</div>
<div class="nav_block">
  <div class="categories">
    <nav class="categories-menu">
      <ul class="categories-menu-ul">
        <li><a href="/"><span class="icon-menu no_right"><img src="<?php echo get_template_directory_uri(); ?>/img/i1.png" alt=""></span></a></li>
        <?php wp_nav_menu( array( 'container' => '', 'items_wrap' => '%3$s', 'theme_location' => 'header-nav') ); ?>
      </ul>
    </nav>
  </div>
</div>
<div class="menu_table">
  <div class="container">
    <div class="search_block">
            <form class="search_form" method="get">
              <input name="search_text" type="text" class="search_text" placeholder="Введите название товара для поиска..." autocomplete="off">
              <input type="submit" class="search-button" value="">
            </form>
          </div>
     <button class="js-menu menu_x" type="button">
     <span class="bar"></span>
     </button>
     <nav class="menu_cont">
        <ul>
           <?php wp_nav_menu( array( 'container' => '', 'items_wrap' => '%3$s', 'theme_location' => 'header-nav') ); ?>
        </ul>
     </nav>
  </div>
</div>
<div class="cart_block">
  <div class="icon_cart"><img src="<?php echo get_template_directory_uri(); ?>/img/cart-b.svg" alt=""></div>
  <div class="content_cart">
    Товаров: <?php echo WC()->cart->get_cart_contents_count(); ?>, на сумму: <?php echo WC()->cart->get_cart_subtotal(); ?><br/>
    <a href="/cart">Оформить заказ</a>
  </div>
</div>