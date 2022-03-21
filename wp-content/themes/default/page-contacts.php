<?php
/*
Template Name: Контакты
*/
?>
<?php get_header(); ?>
<div class="speedbar_box">
  <div class="container">
    <?php woocommerce_breadcrumb(); ?>
  </div>
</div>
<div class="content_inner_block">
  <div class="container">
    <div class="title_block">
      <h1>Контактная информация</h1>
      <span>Оформите заявку и мы ответим Вам в кратчайший срок! </span>
    </div>
    <div class="row">
      <div class="cp_box">
        <div class="cp_box_a">
          <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/cp1.png" alt=""></div>
          <div class="title">410038, г.Саратов, 6-ой Соколовогорский пр-д, стр. 1</div>
        </div>
      </div>
      <div class="cp_box">
        <div class="cp_box_a">
          <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/cp5.png" alt=""></div>
          <div class="title">+7 (8452) 39-20-28 <br> +7 (904) 241-74-84</div>
        </div>
      </div>
      <div class="cp_box">
        <div class="cp_box_a">
          <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/cp3.png" alt=""></div>
          <div class="title">ПН-СБ 08.00 - 18.00 <br> ВС 8.00-13.00</div>
        </div>
      </div>
      <div class="cp_box">
        <div class="cp_box_a">
          <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/cp4.png" alt=""></div>
          <div class="title">392028@inbox.ru</div>
        </div>
      </div>
    </div>
    <div class="cp_box_content">
      <div class="contact_box_a">
        <div class="contacts_form_a">
          <?php echo do_shortcode( '[contact-form-7 id="291"]' ); ?>
        </div>
      </div>
      <div class="contact_box_b" id="contacts-map">
        <!-- <script src="https://api-maps.yandex.ru/2.1/?49e72a2c-9371-42b1-b02a-9e115a863c11&lang=ru_RU&" type="text/javascript"></script> -->
        <!-- <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A3d115b0978869b48ae94ea76fee0dc5f7fc4e77ab7c258dd0fc53e0e5fcba726&amp;width=100%25&amp;height=100%&amp;lang=ru_RU&amp;scroll=true"></script> -->
      </div>
    </div>
  </div>
</div>
<?php get_footer('home'); ?>