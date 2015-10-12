var loaderDiv = "<div class='loader'></div>";
(function ($) {
	var galleryCount = $('.gallery-featured').length;
	$('.galleries').css('width', galleryCount * 160);
	$('a.gallery-item__specific').on('click', function () {
		var hash = $(this).data('gallery');
		var galleryItem = $('#gallery-item');
		if(galleryItem.children().length) {
			galleryItem.children().detach();
		}
		galleryItem.append(loaderDiv).show();

		$.ajax({
			type: 'POST',
			url: '/home/getGallery',
			data: {'gallery': hash},
			success: function (data) {
				galleryItem.children().detach();
				galleryItem.html(data);
				galleryItem.animate({
					scrollTop: galleryItem.top - 70
				}, 700);
				$('#gallery-item .fancybox').fancybox({
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
		_paq.push(['trackEvent', 'Gallery', $(this).html(), hash]);
	});
})(jQuery);

