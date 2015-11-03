var loaderDiv = "<div class='loader'></div>";
(function ($) {
	/** Set the width of the container. Must be calculated */
	var featured = $('.gallery-featured', '.galleries'),
		galleryCount = featured.length,
		galleryItem = $('#gallery-item');

	if($(window).width() >= galleryCount * 160) {
		$('.galleries').css('width', galleryCount * 160);
	}
	else {
		$('.galleries').css('width', $(window).width() - 20);
	}

	$('a.gallery-item__specific').on('click', function () {
		/** Select the items we want */
		var superParent = $(this).parent().parent(),
		    hash = $(this).data('gallery');

		if(superParent.hasClass('active')) {
			featured.removeClass('inactive');
			superParent.removeClass('active');
			galleryItem.empty().hide();
		}
		else {
			featured.not(superParent).removeClass('active').addClass('inactive');
			superParent.removeClass('inactive').addClass('active');

			if (galleryItem.children().length) {
				galleryItem.empty();
			}
			/** Add the loader to show something is going on */
			galleryItem.append(loaderDiv).show().after(function () {
				$(window).trigger('resize.px.parallax')
			});

			/** Get the gallery HTML */
			$.ajax({
				type: 'GET',
				url: '/home/getGallery/'+hash,
				success: function (data) {
					galleryItem.html(data);
					galleryItem.animate({
						scrollTop: galleryItem.top - 70
					}, 700);
					$('.fancybox', '#gallery-item').fancybox({
						padding: [0, 0, 5, 0],
						helpers: {
							title: {
								type: 'inside'
							},
							thumbs: {
								width: 50,
								height: 50
							}
						}
					}).after(function () {
						$(window).trigger('resize.px.parallax');
					});
				}
			});
			_paq.push(['trackEvent', 'Gallery', $(this).attr('title'), hash]);
		}
		$(window).trigger('resize.px.parallax');
	});
})(jQuery);

