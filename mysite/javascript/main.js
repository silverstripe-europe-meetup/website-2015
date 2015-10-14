var _paq = _paq || [];
(function ($) {
	$('a.scroll, .typography a').entwine({
		onclick: function () {
			var hash = this.attr('href').split("#")[1];
			var target = $('#' + hash);
			if (target.length) {
				$('html, body').animate({
					scrollTop: target.offset().top - 70
				}, 700);
				_paq.push(['trackEvent', 'Scroll', 'Section', this.attr('title')]);
				window.location.hash = '#' + hash;
				return false;
			}
			else {
				_paq.push(['trackEvent', 'Link', 'External', this.attr('href')]);
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
				_paq.push(['trackEvent', 'Location', 'Infowindow', 'Open']);
			});
		}
	});
})(jQuery);

/** Quick and dirty Piwik tracking of events */
$('#Form_ContactForm_action_HandleForm').on('click', function (e) {
	e.preventDefault();
	_paq.push(['trackEvent', 'Contactform', $('#Form_ContactForm_Receiver').val(), $('#Form_ContactForm_Subject').val()]);
	setTimeout(function() {
		$('form').submit();
	},100);
});
