<!-- BEGIN LOADER FADE-OUT AND HTML SLIDE-DOWN -->
jQuery(window).load(function() {	
	'use strict';
		/* hide close button */
		jQuery(".close-pageloader").removeClass('close-pageloader-active');
		/* after 250ms delay, fade out the loading icon */
		setTimeout(function(){
			jQuery(".bonfire-pageloader-icon").addClass('bonfire-pageloader-icon-hide');
		},250);
			
		/* after 500ms delay, restore browser scroll + fade out loader background + slide down page */
		setTimeout(function(){
	
			/* fade out loader */
			jQuery("#bonfire-pageloader").addClass('bonfire-pageloader-fade');
	
			/* slide down html */
			jQuery("html").removeClass('bonfire-html-onload');
	
		},500);	
		
		/* after 1000ms delay, hide (not fade out) loader*/
		setTimeout(function(){
	
			/* hide loader after fading out*/
			jQuery("#bonfire-pageloader, .bonfire-pageloader-icon").addClass('bonfire-pageloader-hide');
	
		},1000);
	
});
<!-- END LOADER FADE-OUT AND HTML SLIDE-DOWN -->

<!-- BEGIN AFTER 6 SECONDS, DISPLAY CLOSE BUTTON -->
setTimeout(function(){
	jQuery(".close-pageloader").addClass('close-pageloader-active');
},6000);
<!-- END AFTER 6 SECONDS, DISPLAY CLOSE BUTTON -->

<!-- BEGIN CLOSE LOADING SCREEN WHEN CLOSE BUTTON CLICKED/TAPPED -->
jQuery('.close-pageloader').on('touchstart click', function(e) {
	'use strict';
		e.preventDefault();
			/* hide close button */
			jQuery(".close-pageloader").removeClass('close-pageloader-active');
			/* after 250ms delay, fade out the loading icon */
			setTimeout(function(){
				jQuery(".bonfire-pageloader-icon").addClass('bonfire-pageloader-icon-hide');
			},250);
				
			/* after 500ms delay, restore browser scroll + fade out loader background + slide down page */
			setTimeout(function(){
		
				/* fade out loader */
				jQuery("#bonfire-pageloader").addClass('bonfire-pageloader-fade');
		
				/* slide down html */
				jQuery("html").removeClass('bonfire-html-onload');
		
			},500);	
			
			/* after 1000ms delay, hide (not fade out) loader*/
			setTimeout(function(){
		
				/* hide loader after fading out*/
				jQuery("#bonfire-pageloader, .bonfire-pageloader-icon").addClass('bonfire-pageloader-hide');
		
			},1000);
});
<!-- END CLOSE LOADING SCREEN WHEN CLOSE BUTTON CLICKED/TAPPED -->