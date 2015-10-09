(function ($) {
	$('a.gallery-item__specific').on('click', function () {
		var hash = $(this).data('gallery');
		var galleryItem = $('#gallery-item');
		galleryItem.hide(500).html('');
		$.ajax({
			type: 'POST',
			url: '/home/getGallery',
			data: {'gallery': hash},
			success: function (data) {
				galleryItem.html(data).show(500);
				galleryItem.animate({
					scrollTop: galleryItem.top - 70
				}, 700);
				$('#gallery-item .fancybox').fancybox({
					helpers: {
						title: {type: 'inside'},
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
		_paq.push(['trackEvent', 'Gallery', $(this).html(), hash]);
	});
})(jQuery);

