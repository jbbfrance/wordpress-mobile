<!-- BEGIN INCLUDE PAGINATION -->
<?php if ( is_single() || is_page() || is_404() ) { ?>
<?php } else { ?>
	<?php get_template_part('includes/pagination'); ?>
<?php } ?>
<!-- END INCLUDE PAGINATION -->


	</div>
	<!-- END body -->

</div>
<!-- END #sitewrap -->

<!-- BEGIN FOOTER -->
<div id="footer">

	<!-- BEGIN WIDGETS -->
	<div class="footer-inner">
		<!-- BEGIN FULL WIDTH WIDGETS --><div class="footer-widgets-1-column"><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widgets') ) : ?><?php endif; ?></div><!-- END FULL WIDTH WIDGETS -->

		<!-- BEGIN TOP OF PAGE BUTTON -->
		<div class="top-of-page">
			<?php _e( 'TOP OF PAGE', 'bonfire' ); ?>
		</div>
		<!-- END TOP OF PAGE BUTTON -->
		
	</div>
	<!-- END WIDGETS -->

</div>
<!-- END FOOTER -->

<!-- wp_footer -->
<?php wp_footer(); ?>
</body>
</html>