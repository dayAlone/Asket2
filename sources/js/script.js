(function() {
  var calculateLayout, delay, end, galleryOptions, markers, spinOptions;

  galleryOptions = {
    history: false,
    focus: false,
    shareEl: false
  };

  spinOptions = {
    lines: 13,
    length: 21,
    width: 2,
    radius: 24,
    corners: 0,
    rotate: 0,
    direction: 1,
    color: '#fd9127',
    speed: 1,
    trail: 68,
    shadow: false,
    hwaccel: false,
    className: 'spinner',
    zIndex: 2e9,
    top: '50%',
    left: '50%'
  };

  markers = [];

  delay = function(ms, func) {
    return setTimeout(func, ms);
  };

  this.getCaptcha = function() {
    return $.get('/include/captcha.php', function(data) {
      return setCaptcha(data);
    });
  };

  this.setCaptcha = function(code) {
    $('input[name=captcha_sid], input[name=captcha_code]').val(code);
    return $('.captcha').css('background-image', "url(/include/captcha.php?captcha_sid=" + code + ")");
  };

  end = 'transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd';

  this.checkScroll = function() {
    var el;
    el = $(this).elem('content');
    $(this).block().mod('start', $(this).scrollTop() > 0);
    return $(this).block().mod('end', el.outerHeight() <= $(this).scrollTop() + $(this).outerHeight());
  };

  calculateLayout = function() {
    if ($.browser.mobile) {
      $('html').addClass('mobile');
    } else {
      $('html').removeClass('mobile');
    }
    return $('.scroll').each(function(key, el) {
      $(el).mod('ready', $(el).find('.scroll__content').outerHeight() > $(el).find('.scroll__wrap').outerHeight());
      if ($(window).width() >= 768 && !$.browser.mobile) {
        if ($(el).find('.scroll__content').outerHeight() > $(el).find('.scroll__wrap').outerHeight()) {
          if ($(el).find('.scroll__wrap[data-perfect-scrollbar]').length > 0) {
            return $(el).find('.scroll__wrap[data-perfect-scrollbar]').perfectScrollbar('update');
          } else {
            return $(el).find('.scroll__wrap').perfectScrollbar({
              suppressScrollX: true,
              includePadding: true
            });
          }
        }
      }
    });
  };

  this.initMap = function() {
    if ($('[data-map]').length > 0) {
      return $('[data-map]').each(function() {
        var $map, lang;
        $map = $(this);
        lang = $(this).data('lang');
        if (!lang) {
          lang = "ru_RU";
        }
        return $.getScript("http://api-maps.yandex.ru/2.1/?lang=" + lang, function() {
          return ymaps.ready(function() {
            this.map = new ymaps.Map($map.attr('id'), {
              center: $map.data('coords').split(','),
              zoom: $map.data('zoom'),
              controls: ['geolocationControl', 'zoomControl']
            });
            this.mark = new ymaps.Placemark(map.getCenter(), {
              hintContent: $map.data('text')
            }, {
              iconLayout: 'default#image',
              iconImageHref: '/layout/images/pointer.png',
              iconImageSize: [47, 48],
              iconImageOffset: [-23, -48]
            });
            this.map.geoObjects.add(mark);
            return this.map.container.fitToViewport();
          });
        });
      });
    }
  };

  $(document).ready(function() {
    $.BEM = new $.BEM.constructor({
      namePattern: '[a-zA-Z0-9-]+',
      elemPrefix: '__',
      modPrefix: '--',
      modDlmtr: '--'
    });
    initMap();
    $(window).on('resize', _.throttle(calculateLayout, 300));
    $('.scroll__wrap').on('scroll', _.throttle(checkScroll, 100));
    calculateLayout();
    $('.modal').on('shown.bs.modal', function(e) {
      getCaptcha();
      $('.form__action').show().removeClass('hidden');
      $('.form__success').hide().addClass('hidden');
      if ($(this).find('form').length > 0) {
        return $(this).find('form')[0].reset();
      }
    });
    $('#More').on('show.bs.modal', function(e) {
      $('#More .text').html($(e.relatedTarget).data('html'));
      return $('#More .modal__title').text($(e.relatedTarget).parents('.client').elem('name').text());
    });
    $('#Video').on('show.bs.modal', function(e) {
      $('#Video .modal__title').text($(e.relatedTarget).parents('.client').elem('name').text());
      return $('#Video .text').html("<iframe width=\"720\" height=\"405\" src=\"https://www.youtube.com/embed/" + ($(e.relatedTarget).data('video')) + "\" frameborder=\"0\" allowfullscreen></iframe>");
    });
    $('.modal').on('hidden.bs.modal', function(e) {
      return $(this).find('.text').html('');
    });
    $('[role="tab"]').click(function(e) {
      e.preventDefault();
      return $(this).tab('show');
    });
    $('.slider').slick({
      arrows: false,
      autoplay: true,
      speed: 700,
      cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1)',
      dots: true,
      dotsClass: 'slider__dots',
      loop: true
    });
    $('.form__refresh').click(function(e) {
      getCaptcha();
      return e.preventDefault();
    });
    $('.dropdown').elem('trigger').on('mouseenter', function(e) {
      return $(this).block().mod('inactive', false);
    });
    $('.dropdown').elem('item').on('click', function(e) {
      var block, select, selected, trigger;
      block = $(this).block();
      select = block.elem('select');
      trigger = block.elem('trigger');
      selected = select.find("option[value*='" + ($(this).text()) + "']");
      select.find("option:selected").removeAttr('selected');
      trigger.text(selected.text());
      selected.attr('selected', 'selected');
      select[0].selectedIndex = selected.index();
      block.mod('inactive', true);
      delay(2000, function() {
        return block.mod('inactive', false);
      });
      return e.preventDefault();
    });
    $('.form').submit(function(e) {
      var request;
      e.preventDefault();
      request = $(this).serialize();
      return $.post('/include/send.php', request, function(data) {
        data = $.parseJSON(data);
        if (data.status === "ok") {
          $('.form__action').hide().addClass('hidden');
          $('.form__success').show().removeClass('hidden');
          return $('input[name="captcha_word"]').val('');
        } else if (data.status === "error") {
          $('input[name=captcha_word]').addClass('parsley-error');
          return getCaptcha();
        }
      });
    });
    $('a[data-images]').on('click', function(e) {
      var gallery, items;
      items = $(this).data('images');
      console.log(items);
      if (items) {
        gallery = new PhotoSwipe($('.pswp')[0], PhotoSwipeUI_Default, items, galleryOptions);
        gallery.init();
      }
      return e.preventDefault();
    });
    return delay(500, function() {
      var anchor;
      if (location.hash && $('.tabs').length > 0) {
        $("a[href*='" + (location.hash.split('__')[0]) + "']").tab('show');
        anchor = $("a[name='" + (location.hash.split('#')[1]) + "']");
        return anchor.parents('.scroll__wrap').scrollTop(anchor.offset().top);
      }
    });
  });

}).call(this);
