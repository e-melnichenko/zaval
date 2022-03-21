<?php wp_footer(); ?>
<script>
    new WOW().init();
</script>
<div class="contacts_block">
  <div class="container">
    <div class="contacts_box">
      <div class="c_box_a" id="main-map">
        <script src="https://api-maps.yandex.ru/2.1/?49e72a2c-9371-42b1-b02a-9e115a863c11&lang=ru_RU&" type="text/javascript"></script>
            <!-- <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A3d115b0978869b48ae94ea76fee0dc5f7fc4e77ab7c258dd0fc53e0e5fcba726&amp;width=100%25&amp;height=100%&amp;lang=ru_RU&amp;scroll=true"></script> -->
      </div>
      <div class="c_box_b">
        <div class="title_block">
          <h3>Возникли вопросы?</h3>
          <div class="title_block_a">Звоните! Ответим!</div>
        </div>
        <div class="contact_phone"><a href="tel:+78452392028">+7 (8452) 39-20-28</a></div>
        <div class="contact_phone mbottom"><a href="tel:+79042417484">+7 (904) 241-74-84</a></div>
        <div class="contact_info">
          <i><img src="<?php echo get_template_directory_uri(); ?>/img/c3.png" alt=""></i>
          <div class="content"><b>Адрес:</b> <span> г.Саратов, 6-ой Соколовогорский<br> пр-д, стр. 1</span>
          </div>
        </div>
        <div class="contact_info">  
          <i class="fa fa-clock-o"></i>  
          <div class="content"> Пн-Сб 08.00 - 18.00 Вс 8.00-15.00</div>
        </div>
        <div class="contact_info">
          <i><img src="<?php echo get_template_directory_uri(); ?>/img/c4.png" alt=""></i>
          <div class="content"><b>Почта:</b> <span> 392028@inbox.ru</span></div>
        </div>
        <!-- <div class="contact_more modal-link">Оставить заявку</div> -->
        <div class="overlay">
        <div class="overlay__modal">
          <div class="form_modal">
            <h4>Задать вопрос</h4>
            <?php echo do_shortcode( '[contact-form-7 id="288"]' ); ?>
          </div>
          <button class="overlay__close"><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt=""></button>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
<footer class="footer">
  <div class="container">
    <div class="footer_inner">
      <!-- <ul class="footer_nav">
        <li><a href="/product-category/pilomaterialy"><span class="icon-menu"><img src="<?php echo get_template_directory_uri(); ?>/img/ii2.png" alt=""></span>Пиломатериалы</a></li>
        <li><a href="/product-category/fanera-i-osb"><span class="icon-menu"><img src="<?php echo get_template_directory_uri(); ?>/img/ii3.png" alt=""></span>Фанера и OSB</a></li>
        <li><a href="/product-category/teploizolyaciya"><span class="icon-menu"><img src="<?php echo get_template_directory_uri(); ?>/img/ii14.png" alt=""></span>Теплоизоляция</a></li>
        <li><a href="/product-category/soputstvuyushhie"><span class="icon-menu"><img src="<?php echo get_template_directory_uri(); ?>/img/ii16.png" alt=""></span>Сопутствующие</a></li>
        <li><a href="/product-category/stolyarnye-izdeliya"><span class="icon-menu"><img src="<?php echo get_template_directory_uri(); ?>/img/ii5.png" alt=""></span>Столярные изделия</a></li>
        <li><a href="/product-category/vsyo-dlya-bani"><span class="icon-menu"><img src="<?php echo get_template_directory_uri(); ?>/img/ii13.png" alt=""></span>Все для бани</a></li>
      </ul> -->
      <div class="footer_content">
        <div class="logo">
          <a href="/">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="">
          </a>
          <div class="footer_copy">
            © <?php echo date("Y"); ?> <a target="_blank" href="/">Пиломатериалы в Саратове</a>
          </div>
        </div>
        <div class="footer_dop_menu">
          <ul>
            <?php wp_nav_menu( array( 'container' => '', 'items_wrap' => '%3$s', 'theme_location' => 'header-nav3') ); ?>
          </ul>
        </div>
        <div class="contact_head">
          <a href="tel:+78452392028" class="phone">+7 (8452) 39-20-28</a>
          <a href="tel:+79042417484" class="phone"> +7 (904) 241-74-84</a>
          <a href="mailto:392028@inbox.ru" class="mail">392028@inbox.ru</a>
        </div>
        <!-- <div class="contact_head_a">
          <div class="adress">410038, г.Саратов, 6-ой Соколовогорский пр-д, стр. 1 </div>
          <div class="road modal-link">Просмотреть схему проезда</div>
          <div class="time"><i class="fa fa-clock-o"></i> Пн-Сб 08.00 - 18.00 Вс 8.00-15.00</div>
        </div> -->
      </div>
    </div>
  </div>
</footer>
<div class="overlay">
  <div class="overlay__modal overlay_iframe">
    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A3d115b0978869b48ae94ea76fee0dc5f7fc4e77ab7c258dd0fc53e0e5fcba726&amp;width=100%25&amp;height=100%&amp;lang=ru_RU&amp;scroll=true"></script>
     <button class="overlay__close"><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt=""></button>
  </div>
</div>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter50398681 = new Ya.Metrika2({
                    id:50398681,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/tag.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks2");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/50398681" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>