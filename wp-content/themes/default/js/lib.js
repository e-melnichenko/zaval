/* ---------------------------------------------------------------------------
* Accordion
* --------------------------------------------------------------------------- */
(function($){
$(document).ready(function(){

$('#cssmenu li.active').addClass('open').children('ul').show();
  $('#cssmenu li.has-sub>a').on('click', function(){
    $(this).removeAttr('href');
    var element = $(this).parent('li');
    if (element.hasClass('open')) {
      element.removeClass('open');
      element.find('li').removeClass('open');
      element.find('ul').slideUp(200);
    }
    else {
      element.addClass('open');
      element.children('ul').slideDown(200);
      element.siblings('li').children('ul').slideUp(200);
      element.siblings('li').removeClass('open');
      element.siblings('li').find('li').removeClass('open');
      element.siblings('li').find('ul').slideUp(200);
    }
  });

});
})(jQuery);
/* ---------------------------------------------------------------------------
* Modal Window
* --------------------------------------------------------------------------- */
function Modal(settings) {
this.modalLink = $(settings.theLink) || $('.modal-link');
this.overlay = $(settings.theOverlay) || $('.modal-overlay');
this.modalClass = '.' + $(settings.theModal).attr('class') || '.modal-window';
this.modalCloseClass = '.' + $(settings.theCloseButton).attr('class') || '.modal-close';
this.numItems = this.overlay.length;
}

Modal.prototype = {
init: function() {
var self = this;
this.bindHandlers(self);
},

showModal: function(self, link) {
var n = self.modalLink.index(link),
overlay = self.overlay.eq(n),
modal = overlay.find($(self.modalClass));

overlay.fadeIn();
modal.fadeIn();
},

hideModal: function(self, overlay) {
var overlayClose = overlay.find(self.modalCloseClass);

$(document).keyup(function(objEvent) {
if (objEvent.keyCode == 27) {
overlayClose.click();
}
});

overlayClose.on('click', function(e) {
overlay.fadeOut();
overlay.find($(self.modalClass)).fadeOut();
});
},

bindHandlers: function(self) {
$('.modal-link').each(function() {
$(this).on('click', function() {
self.showModal(self, $(this));
});
});

this.overlay.each(function() {
var overlay = $(this);

self.hideModal(self, overlay);
});
}
}

$(document).ready(function() {
var modalSettings = {
theOverlay: $('.overlay'),
theModal: $('.overlay__modal'),
theLink: $('.modal-link'),
theCloseButton: $('.overlay__close')
};

var modal = new Modal(modalSettings);
modal.init();
});
/* ---------------------------------------------------------------------------
* Navigation
* --------------------------------------------------------------------------- */
$(document).ready(function() { 
$('.categories-menu-ul li').hover(function () { 
clearTimeout($.data(this,'timer')); 
$('ul',this).stop(true,true).fadeIn(200); 
}, function () { 
$.data(this,'timer', setTimeout($.proxy(function() { 
$('ul',this).stop(true,true).fadeOut(200); 
}, this), 100)); 
}); 
});
/* ---------------------------------------------------------------------------
* Slider
* --------------------------------------------------------------------------- */
$('.slider').slick({
draggable: true,
arrows: true,
dots: true,
fade: true,
speed: 900,
infinite: true,
cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
autoplay: false,
touchThreshold: 100
})
/* ---------------------------------------------------------------------------
* Carousel
* --------------------------------------------------------------------------- */
$(document).ready(function() {
$(".owl_product").owlCarousel({
items: 4, //10 изображений на 1000px 
itemsDesktop: [1000, 3], //5 изображений на ширину между 1000px и 901px
itemsDesktopSmall: [900, 3], // 3 изображения между 900px и 601px
itemsTablet: [600, 1], //2 изображения между 600 и 0;
itemsMobile: true,
autoPlay: false,
navigation: false,
pagination: true
});
});
/* ---------------------------------------------------------------------------
* Menu
* --------------------------------------------------------------------------- */
/* A simple and scalable hamburger menu using css transitions. */
var isActive = false;

$('.js-menu').on('click', function() {
  if (isActive) {
    $(this).removeClass('active');
    $('body').removeClass('menu-open');
  } else {
    $(this).addClass('active');
    $('body').addClass('menu-open');
  }

  isActive = !isActive;

  $('.sublink').click(function () {
        $(this).toggleClass('active');
        $('.mobile-menu__sublist').slideToggle('600');
        return false;
    });
  $('.sublink_a').click(function () {
        $(this).toggleClass('active');
        $('.mobile-menu__sublist_a').slideToggle('600');
        return false;
    });
  $('.sublink_b').click(function () {
        $(this).toggleClass('active');
        $('.mobile-menu__sublist_b').slideToggle('600');
        return false;
    });
});


