function fixHeights() {
	/** Recalculate the height of the items */
	$.each($('.talk-item:visible'), function () {
		$(this).css('height', $(this).outerHeight() + 50);
		$(this).addClass('has-height');
	});
};
if ($('ul.tabs').is(':visible')) {
	var activeTab = $("ul.tabs li.active").data("target");
	$('#' + activeTab).fadeIn().after(function() {
		fixHeights();
	});
}
else {
	var activeDrawer = $('.d_active.tab_drawer_heading').data('target');
	$('#' + activeDrawer).fadeIn().after(function() {
		fixHeights();
	});
}


/* if in tab mode */
$("ul.tabs li").click(function () {
	var activeTab = $(this).data("target");
	if (!$(this).hasClass('active')) {
		$(".tab_content").hide();
		$("#" + activeTab).fadeIn().addClass("d_active").after(function() {
			fixHeights();
		});

		$("ul.tabs li").removeClass("active");
		$(this).addClass("active");
		_paq.push(['trackEvent', 'Schedule', 'Pill', $(this).html()]);
		$(".tab_drawer_heading").removeClass("d_active");
		$(".tab_drawer_heading[rel^='" + activeTab + "']");
		$('html, body').animate({
			scrollTop: ($('#section-schedule').offset().top - 70)
		}, 1000).after(function () {
			$(window).trigger('resize.px.parallax');
		});
	}
});
/* if in drawer mode */
$(".tab_drawer_heading").click(function () {
	$(".tab_content").hide();
	var d_activeTab = $(this).data("target");
	var d_activeheader = $(".tab_drawer_heading");
	$("#" + d_activeTab).show().addClass("active").after(function() {
		fixHeights();
	});

	d_activeheader.removeClass("d_active");
	$(this).addClass("d_active");

	$("ul.tabs li").removeClass("active");
	$("ul.tabs li[rel^='" + d_activeTab + "']");
	_paq.push(['trackEvent', 'Schedule', 'Drawer', $(this).html()]);
	$('html, body').animate({
		scrollTop: ($('#section-schedule').offset().top)
	}, 1000).after(function () {
		$(window).trigger('resize.px.parallax')
	});
});
