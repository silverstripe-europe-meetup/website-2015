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

// tabbed content
// http://www.entheosweb.com/tutorials/css/tabs.asp
$(".tab_content").hide();
$(".tab_content:first").show();

/* if in tab mode */
$("ul.tabs li").click(function () {

	$(".tab_content").hide();
	var activeTab = $(this).attr("rel");
	$("#" + activeTab).fadeIn();

	$("ul.tabs li").removeClass("active");
	$(this).addClass("active");

	$(".tab_drawer_heading").removeClass("d_active");
	$(".tab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");
});
/* if in drawer mode */
$(".tab_drawer_heading").click(function () {

	$(".tab_content").hide();
	var d_activeTab = $(this).attr("rel");
	$("#" + d_activeTab).fadeIn();

	$(".tab_drawer_heading").removeClass("d_active");
	$(this).addClass("d_active");

	$("ul.tabs li").removeClass("active");
	$("ul.tabs li[rel^='" + d_activeTab + "']").addClass("active");
});


/* Extra class "tab_last"
 to add border to right side
 of last tab */
$('ul.tabs li').last().addClass("tab_last");
