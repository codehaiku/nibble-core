(function($){
	
	'use strict';

	$('[data-toggle="tooltip"]').tooltip();
	$('.page-item > a').addClass('page-link');

	$('figure.gallery-item').on('mouseover', function(){
		//$(this).children('figcaption.wp-caption').css('top', '5px');
		
		var caption = $(this).find('.wp-caption-text');
		if ( caption.length >= 1 ) {
			console.log('caption found')
			var xCenter = ($(this).outerWidth() - caption.outerWidth())/2;
			var yTop = $(this).height() + 15;
			caption.css({
				top: yTop + 'px',
				left: (xCenter - 2) + 'px'
			});
		}
	});

})(jQuery);