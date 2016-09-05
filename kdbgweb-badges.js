jQuery(document).ready(function($){

	$('.kdbgweb-badge').hover(function() {
		$(this).find('.kdbgweb-badge-info').stop(true, true).fadeIn(200);
	}, function() {
		$(this).find('.kdbgweb-badge-info').stop(true, true).fadeOut(200);
	});


	$.post(ajaxurl, {

		action: 'kdbgweb_badges_refresh_profile'

	});

});