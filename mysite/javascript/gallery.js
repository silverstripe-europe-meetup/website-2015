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
			}
		});
		_paq.push(['trackEvent', 'Gallery', $(this).html(), hash]);
	});
})(jQuery);

