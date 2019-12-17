<?php
/*
Template Name: Contact (w/ form)
*/
?>
<?php get_header(); ?>

<div id="content" class="clearfix">
	<div class="wrapper-outer">

			<!-- BEGIN FEATURED IMAGE -->
			<div class="featured-image">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
			</div>
			<!-- END FEATURED IMAGE -->
			
			<!-- BEGIN CUSTOM FIELD FOR EMBEDDABLE CONTENT -->
			<?php $featuredembed = get_post_meta($post->ID, 'FeaturedEmbed', true); ?>
			<div class="video-container"><?php echo $featuredembed; ?></div>
			<!-- END CUSTOM FIELD FOR EMBEDDABLE CONTENT -->
			
			<!-- BEGIN SHORTCODE OUTSIDE THE LOOP -->
			<div class="post-shortcode">
				<?php $shortcode = get_post_meta($post->ID, 'Shortcode', true); ?><?php echo do_shortcode($shortcode); ?>
			</div>
			<!-- END SHORTCODE OUTSIDE THE LOOP -->

			<div class="page-wrapper">
			
				<?php while ( have_posts() ) : the_post(); ?>
				
				<!-- BEGIN PAGE TITLE -->
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<!-- END PAGE TITLE -->
				
				<!-- BEGIN PAGE CONTENT -->
				<div class="entry-content"><?php the_content(); ?></div>
				<!-- END PAGE CONTENT -->			
				
				<!-- BEGIN POST NAVIGATION -->
				<div class="link-pages">
				<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'bonfire').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				</div>
				<!-- END POST NAVIGATION -->
				
				<!-- BEGIN EDIT POST LINK -->
				<?php edit_post_link(__('EDIT', 'bonfire')); ?>
				<!-- END EDIT POST LINK -->
				
				<!-- BEGIN CONTACT FORM -->	
				<script type="text/javascript">                                         
					/* <![CDATA[ */
						jQuery(document).ready(function(){ // sends the data filled in the contact form to the php file and shows a message
							jQuery("#contact-form").submit(function(){
								var str = jQuery(this).serialize();
								jQuery.ajax({
								   type: "POST",
								   url: "<?php echo esc_url(get_template_directory_uri()); ?>/contact-send.php",
								   data: str,
								   success: function(msg)
								   {
										jQuery("#formstatus").ajaxComplete(function(event, request, settings){
											if(msg == 'OK'){ // Message Sent? Show the 'Thank You' message and hide the form
												result = '<div class="formstatusok"><?php _e( 'Your message has been sent.<br> Thank you!', 'bonfire' ); ?></div>';
												jQuery("#contactform-wrapper").hide();
											}
											else{
											if(msg == 'ERROR'){ // Problems? Show the 'Error' message
											result = '<div class="formstatuserror"><?php _e( 'Please make sure you have entered:', 'bonfire' ); ?> <br>- <?php _e( ' your message', 'bonfire' ); ?><br>- <?php _e( ' your name', 'bonfire' ); ?><br>- <?php _e( ' a valid email address', 'bonfire' ); ?></div>';
											}
											}
											jQuery(this).html(result);
										});
									}
								
								 });
								return false;
							});
						});
					/* ]]> */
				</script>

				<form id="contact-form" action="javascript:alert('success!');">
				<div id="formstatus"></div>
					<div id="contactform-wrapper">
					<div id="message-wrapper"><textarea name="message" value="Your Message" id="message" placeholder="<?php _e( 'Type your message here...', 'bonfire' ); ?>"></textarea></div>
					<div id="name-wrapper"><input type="text" name="name" value="" id="name" placeholder="<?php _e( 'Name', 'bonfire' ); ?>" /></div>
					<div id="mail-wrapper"><input type="text" name="email" value="" id="mail" placeholder="<?php _e( 'Email', 'bonfire' ); ?>" /></div>
					<div id="cancel-message"></div>
					<input type="submit" name="submit" value="SUBMIT" id="contact-submit" />
					</div>
				</form>

				<script> 
				<!-- BEGIN NAME, EMAIL FIELD FADE-IN -->
				jQuery('#name-wrapper,#mail-wrapper').hide();
				jQuery('#cancel-message').hide();
				jQuery('#formstatus').animate({opacity: 0}, 0);
				
				jQuery('#message').click(function() {
						jQuery('#name-wrapper,#mail-wrapper,#cancel-message').slideDown(200).animate({opacity: 1}, 100);
						jQuery('#message').addClass('message-active');
					});
				
				jQuery('#cancel-message').click(function() {
						jQuery('#name-wrapper,#mail-wrapper,#formstatus').animate({opacity: 0}, 100).slideUp(150);
						jQuery('#cancel-message').animate({opacity: 0}, 0).hide(0);
						jQuery('#message').removeClass('message-active');
					});
					
				jQuery('#contact-submit').click(function() {
						jQuery('#formstatus').show(0).animate({opacity: 1}, 400).animate({opacity: 0.5}, 150).animate({opacity: 1}, 350);
					});
				<!-- END NAME, EMAIL FIELD FADE-IN -->
				
				<!-- BEGIN JUMP TO #footer ON #message CLICK -->
				jQuery('#message').click(function() {
					jQuery(window).scrollTo( '#contact-form', 750 );
				});
				<!-- END JUMP TO #footer ON #message CLICK -->
				
				<!-- BEGIN AUTO-EXPAND TEXTAREA -->
				jQuery(document).ready(function() {
					jQuery( "textarea" ).autogrow();
				});
				<!-- END AUTO-EXPAND TEXTAREA -->
				</script>
				<!-- END CONTACT FORM -->
		
			</div>
			<!-- /.contact-page-wrapper -->
		
		<?php endwhile; ?>
		
	</div>
	<!-- /.wrapper-outer -->
</div>
<!-- /#content -->

<?php get_footer(); ?>