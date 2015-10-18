var loaderDiv = "<div class='loader'></div>";
(function ($) {
	/** Set the width of the container. Must be calculated */
	var featured = $('.gallery-featured', '.galleries'),
		galleryCount = featured.length,
		galleryItem = $('#gallery-item');
	$('.galleries').css('width', galleryCount * 160);

	$('a.gallery-item__specific').not('.active').on('click', function () {
		/** Select the items we want */
		var superParent = $(this).parent().parent(),
		    hash = $(this).data('gallery');

		featured.not(superParent).removeClass('active').addClass('inactive');
		superParent.removeClass('inactive').addClass('active');

		if(galleryItem.children().length) {
			galleryItem.empty();
		}
		/** Add the loader to show something is going on */
		galleryItem.append(loaderDiv).show();

		/** Get the gallery HTML */
		$.ajax({
			type: 'POST',
			url: '/home/getGallery',
			data: {'gallery': hash},
			success: function (data) {
				galleryItem.html(data);
				galleryItem.animate({
					scrollTop: galleryItem.top - 70
				}, 700);
				$('.fancybox', '#gallery-item').fancybox({
					padding: [0, 0, 5, 0],
					helpers	: {
						title	: {
							type: 'inside'
						},
						thumbs	: {
							width	: 50,
							height	: 50
						}
					}
				});
			},
			done: function() {
				$(window).trigger('resize.px.parallax')
			}
		});
		_paq.push(['trackEvent', 'Gallery', $(this).attr('title'), hash]);
	});
})(jQuery);

