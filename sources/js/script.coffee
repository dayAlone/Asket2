galleryOptions =
	history : false
	focus   : false
	shareEl : false

spinOptions =
	lines     : 13
	length    : 21
	width     : 2
	radius    : 24
	corners   : 0
	rotate    : 0
	direction : 1
	color     : '#fd9127'
	speed     : 1
	trail     : 68
	shadow    : false
	hwaccel   : false
	className : 'spinner'
	zIndex    : 2e9
	top       : '50%'
	left      : '50%'

markers = []

delay = (ms, func) -> setTimeout func, ms

@getCaptcha = ()->
	$.get '/include/captcha.php', (data)->
		setCaptcha data

@setCaptcha = (code)->
	$('input[name=captcha_sid], input[name=captcha_code]').val(code)
	$('.captcha').css 'background-image', "url(/include/captcha.php?captcha_sid=#{code})"

end = 'transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd'


@checkScroll = ()->
	el = $(this).elem('content')
	$(this).block().mod 'start', $(this).scrollTop() > 0
	$(this).block().mod 'end', el.outerHeight() <= $(this).scrollTop() + $(this).outerHeight()

calculateLayout = ->
	if $.browser.mobile
		$('html').addClass 'mobile'
	else
		$('html').removeClass 'mobile'

	$('.scroll').each (key, el)->
		$(el).mod 'ready', $(el).find('.scroll__content').outerHeight() > $(el).find('.scroll__wrap').outerHeight()

		if $(window).width() >= 768 && !$.browser.mobile
			if $(el).find('.scroll__content').outerHeight() > $(el).find('.scroll__wrap').outerHeight()
				if $(el).find('.scroll__wrap[data-perfect-scrollbar]').length > 0
					$(el).find('.scroll__wrap[data-perfect-scrollbar]').perfectScrollbar 'update'
				else
					$(el).find('.scroll__wrap').perfectScrollbar({suppressScrollX: true, includePadding: true})
@initMap = ->
	if $('[data-map]').length > 0
		$('[data-map]').each ->
			$map = $(this)
			lang = $(this).data('lang')
			lang = "ru_RU" if !lang
			$.getScript "http://api-maps.yandex.ru/2.1/?lang=#{lang}", ->
				ymaps.ready ()->
					@map = new ymaps.Map $map.attr('id'), {
						center: $map.data('coords').split(',')
						zoom: $map.data('zoom'),
						controls: ['geolocationControl', 'zoomControl']
					}
					@mark = new ymaps.Placemark map.getCenter(), { hintContent: $map.data('text') }, {
						iconLayout: 'default#image',
						iconImageHref: '/layout/images/pointer.png',
						iconImageSize: [47, 48],
						iconImageOffset: [-23, -48]
					}
					@map.geoObjects.add mark
					@map.container.fitToViewport()
$(document).ready ->

	$.BEM = new $.BEM.constructor
		namePattern: '[a-zA-Z0-9-]+',
		elemPrefix: '__'
		modPrefix: '--'
		modDlmtr: '--'

	initMap()

	$(window).on 'resize', _.throttle calculateLayout, 300

	$('.scroll__wrap').on 'scroll', _.throttle(checkScroll, 100)

	calculateLayout()

	$('.modal').on 'shown.bs.modal', (e)->
		getCaptcha()
		$('.form__action').show().removeClass 'hidden'
		$('.form__success').hide().addClass 'hidden'
		if $(this).find('form').length > 0
			$(this).find('form')[0].reset()


	$('#More').on 'show.bs.modal', (e)->
		$('#More .text').html $(e.relatedTarget).data 'html'
		$('#More .modal__title').text $(e.relatedTarget).parents('.client').elem('name').text()


	$('#Video').on 'show.bs.modal', (e)->
		$('#Video .modal__title').text $(e.relatedTarget).parents('.client').elem('name').text()
		$('#Video .text').html "<iframe width=\"720\" height=\"405\" src=\"https://www.youtube.com/embed/#{$(e.relatedTarget).data('video')}\" frameborder=\"0\" allowfullscreen></iframe>"

	$('.modal').on 'hidden.bs.modal', (e)->
		$(this).find('.text').html ''

	$('[role="tab"]').click (e)->
		e.preventDefault()
		$(this).tab('show')

	$('.slider').slick
		arrows: false
		autoplay: true
		speed: 700
		cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1)'
		dots: true
		dotsClass: 'slider__dots'
		loop: true

	$('.form__refresh').click (e)->
		getCaptcha()
		e.preventDefault()


	$('.dropdown').elem('trigger').on 'mouseenter', (e)->
		$(this).block().mod 'inactive', false

	$('.dropdown').elem('item').on 'click', (e)->
		block = $(this).block()
		select = block.elem('select')
		trigger = block.elem('trigger')
		selected = select.find("option[value*='#{$(this).text()}']")

		select.find("option:selected").removeAttr 'selected'

		trigger.text selected.text()
		selected.attr 'selected', 'selected'
		select[0].selectedIndex = selected.index()

		block.mod 'inactive', true
		delay 2000, ->
			block.mod 'inactive', false

		e.preventDefault()

	$('.form').submit (e)->
		e.preventDefault()
		request = $(this).serialize()
		$.post '/include/send.php', request, (data) ->
			data = $.parseJSON(data)
			if data.status == "ok"
				$('.form__action').hide().addClass 'hidden'
				$('.form__success').show().removeClass 'hidden'
				$('input[name="captcha_word"]').val ''
			else if data.status == "error"
				$('input[name=captcha_word]').addClass('parsley-error')
				getCaptcha()

	$('a[data-images]').on 'click', (e)->
		items = $(this).data 'images'
		console.log items
		if items
			gallery = new PhotoSwipe $('.pswp')[0], PhotoSwipeUI_Default, items, galleryOptions
			gallery.init()
		e.preventDefault()

	delay 500, ->
		if location.hash && $('.tabs').length > 0
			$("a[href*='#{location.hash.split('__')[0]}']").tab('show')
			anchor = $("a[name='#{location.hash.split('#')[1]}']")
			anchor.parents('.scroll__wrap').scrollTop anchor.offset().top
