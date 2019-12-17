jQuery('.comment-count').on('touchstart click', function(e) {
	'use strict';
		e.preventDefault();
			jQuery(window).scrollTo( '#comments', 800, {offset:-66} );
});

/* when comment textarea is clicked */
jQuery('#comment').click(function() {
	'use strict';
		jQuery('#commentform-fields').addClass('commentform-fields-active');
		jQuery('#cancel-comment').show(0);
		jQuery(window).scrollTo( '#comment-wrapper', 400, {offset:-66} );
});
/* when 'reply' link is clicked */
jQuery('.comment-reply-link').click(function() {
	'use strict';
		jQuery('#commentform-fields').addClass('commentform-fields-active');
		jQuery('#cancel-comment-reply-link, #cancel-comment').show(0);
		jQuery(window).scrollTo( '#comment-wrapper', 400, {offset:-66} );
});
/* when comment is cancelled */
jQuery('#cancel-comment').click(function() {
	'use strict';
		jQuery('#commentform-fields').removeClass('commentform-fields-active');
		jQuery('#cancel-comment').hide(0);
});
/* when comment reply is cancelled */
jQuery('#cancel-comment-reply-link').click(function() {
	'use strict';
		jQuery('#cancel-comment-reply-link').hide(0);
		jQuery(window).scrollTo( '#comment-wrapper', 400, {offset:-10} );
});