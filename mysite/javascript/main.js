(function ($) {
	$('a.scroll, .typography a').entwine({
		onclick: function () {
			var target = $('#' + this.attr('href').split("#")[1]);
			if (target.length) {
				$('html, body').animate({
					scrollTop: target.offset().top - 70
				}, 700);
				return false;
			}
		}
	});
	$('.toggle-nav').entwine({
		onclick: function () {
			this.closest('header').find('ul').slideToggle(500);
			return false;
		}
	});
	$('.section-type-SectionMap .section-inner').entwine({
		onmatch: function () {
			var infoWindowContent = this.find('.section-map-marker-content'),
				infowindow = new google.maps.InfoWindow();
			infowindow.setContent(infoWindowContent.html());
			infoWindowContent.remove();
			var pos = new google.maps.LatLng(this.data('lat'), this.data('lng')),
				map = new google.maps.Map(this.get(0), {
					zoom: 15,
					center: pos,
					//panControl: false,
					//zoomControl: true,
					mapTypeControl: false,
					//scaleControl: false,
					streetViewControl: false,
					//overviewMapControl: false,
					scrollwheel: false,
					//zoomControlOptions: {
					//	style: google.maps.ZoomControlStyle.SMALL,
					//	position: google.maps.ControlPosition.LEFT_BOTTOM
					//},
					styles: [
						{
							"featureType": "administrative",
							"elementType": "labels.text.fill",
							"stylers": [
								{
									"color": "#444444"
								}
							]
						},
						{
							"featureType": "landscape",
							"elementType": "all",
							"stylers": [
								{
									"color": "#f2f2f2"
								}
							]
						},
						{
							"featureType": "poi",
							"elementType": "all",
							"stylers": [
								{
									"visibility": "off"
								}
							]
						},
						{
							"featureType": "poi.park",
							"elementType": "all",
							"stylers": [
								{
									"visibility": "on"
								}
							]
						},
						{
							"featureType": "poi.park",
							"elementType": "geometry.fill",
							"stylers": [
								{
									"color": "#00a881"
								},
								{
									"lightness": "0"
								}
							]
						},
						{
							"featureType": "poi.park",
							"elementType": "labels.text.fill",
							"stylers": [
								{
									"saturation": "-100"
								},
								{
									"lightness": "-100"
								}
							]
						},
						{
							"featureType": "road.highway",
							"elementType": "all",
							"stylers": [
								{
									"visibility": "on"
								}
							]
						},
						{
							"featureType": "road.highway",
							"elementType": "geometry.fill",
							"stylers": [
								{
									"color": "#ffffff"
								}
							]
						},
						{
							"featureType": "road.highway",
							"elementType": "geometry.stroke",
							"stylers": [
								{
									"visibility": "on"
								},
								{
									"color": "#26b7e6"
								}
							]
						},
						{
							"featureType": "road.arterial",
							"elementType": "labels.icon",
							"stylers": [
								{
									"visibility": "off"
								}
							]
						},
						{
							"featureType": "transit",
							"elementType": "all",
							"stylers": [
								{
									"visibility": "off"
								}
							]
						},
						{
							"featureType": "water",
							"elementType": "all",
							"stylers": [
								{
									"color": "#142136"
								},
								{
									"visibility": "on"
								}
							]
						}
					]
				});
			var marker = new google.maps.Marker({
				position: pos,
				map: map,
				title: this.data('title'),
				icon: 'mysite/images/map-pin.png'
			});
			google.maps.event.addListener(marker, 'click', function () {
				infowindow.open(map, marker);
			});
		}
	});
})(jQuery);

$(".tab_content").hide();
if ($('ul.tabs').is(':visible')) {
	var activeTab = $("ul.tabs li.active").data("target");
	$('#' + activeTab).fadeIn();
}
else {
	var activeDrawer = $('.d_active.tab_drawer_heading').data('target');
	$('#' + activeDrawer).fadeIn();
	$.each($('.talk-item:visible'), function () {
		$(this).css('height', $(this).outerHeight() + 50);
		$(this).addClass('has-height');
	});
}


/* if in tab mode */
$("ul.tabs li").click(function () {

	var activeTab = $(this).data("target");
	if (!$(this).hasClass('active')) {
		$(".tab_content").hide();
		$("#" + activeTab).fadeIn();

		$("ul.tabs li").removeClass("active");
		$(this).addClass("active");
		_paq.push(['trackEvent', 'Schedule', 'Pill', $(this).html()]);
		$(".tab_drawer_heading").removeClass("d_active");
		$(".tab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");
	}
});
/* if in drawer mode */
$(".tab_drawer_heading").click(function () {
	$(".tab_content").hide();
	var d_activeTab = $(this).data("target");
	var d_activeheader = $(".tab_drawer_heading");
	$("#" + d_activeTab).show();

	d_activeheader.removeClass("d_active");
	$(this).addClass("d_active");

	$("ul.tabs li").removeClass("active");
	$("ul.tabs li[rel^='" + d_activeTab + "']").addClass("active");
	$.each($('.talk-item:visible').not('.has-height'), function () {
		$(this).css('height', $(this).outerHeight() + 50);
		$(this).addClass('has-height');
	});
	_paq.push(['trackEvent', 'Schedule', 'Drawer', $(this).html()]);
	$('html, body').animate({
		scrollTop: ($('#section-schedule').offset().top)
	}, 1000);
});

(function ($) {
	var _paq = _paq || [];
	$('.scroll', 'header .navigation').on('click', function () {
		_paq.push(['trackEvent', 'Scroll', 'Section', $(this).attr('title')]);
	});
	$('a').not('.scroll').on('click', function () {
		_paq.push(['trackEvent', 'Link', $(this).attr('_target'), $(this).attr('title')]);
	});
	$('form').on('submit', function () {
		_paq.push(['trackEvent', 'Contactform', $('#Form_ContactForm_Receiver').val(), $('#Form_ContactForm_Subject').val()]);
	});
})(jQuery);
