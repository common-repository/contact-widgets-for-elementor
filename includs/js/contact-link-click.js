// contact link front

jQuery(document).ready(function( $ ) {
	$(document).on('click','[data-contact-link]',function() {
		var link = $(this).data('contact-link'),
			external = $(this).data('contact-link-external'),
			linkAppend = '<a href="' + link + '" data-contact-link-a style="display:none"></a>';

		if(external == '_blank') {
			linkAppend = '<a href="' + link + '" target="_blank" data-contact-link-a style="display:none"></a>';
		}

		if ($(this).find('[data-contact-link-a]').length == 0) {
			$(this).append(linkAppend);
		}

		var alink = $(this).find('[data-contact-link-a]');
		alink[0].click();	
	});
});