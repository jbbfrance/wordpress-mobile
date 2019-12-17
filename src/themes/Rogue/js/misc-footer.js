<!-- BEGIN SHARE LINKS -->
jQuery('.share-button-text-wrapper').on('touchstart click', function(e) {
'use strict';
	e.preventDefault();
		if(jQuery('.share-links-wrapper').hasClass('share-links-wrapper-active'))
		{
			/* hide links */
			jQuery('.share-links-wrapper').removeClass('share-links-wrapper-active');
			/* enable hover tooltip */
			jQuery('.share-tooltip-text').removeClass('share-tooltip-text-inactive');
		} else {
			/* show links */
			jQuery('.share-links-wrapper').addClass('share-links-wrapper-active');
			/* disable hover tooltip */
			jQuery('.share-tooltip-text').addClass('share-tooltip-text-inactive');
		}
});
<!-- END SHARE LINKS -->

<!-- BEGIN TOP OF PAGE LINK -->
jQuery('.top-of-page').on('touchstart click', function(e) {
	'use strict';
		e.preventDefault();
			jQuery(window).scrollTo( '#sitewrap', 800, {offset:-67} );
});
<!-- END TOP OF PAGE LINK -->