<?php get_header(); ?>

<div id="content" class="clearfix">
	<div class="wrapper-outer">
		<div class="page-wrapper">

				<h1 class="entry-title"><?php _e('Whoops!', 'bonfire'); ?></h1>
				
				<div class="entry-content">
				<?php _e('Looks like you found a page that does not quite exist anymore, or perhaps it never did. But fear not; simply use the menu above to find your way, or...', 'bonfire'); ?>
	
				<br>
				<br>

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php _e('Head to the front page..', 'bonfire'); ?>
				</a>
				</div>

		</div>
		<!-- /.page-wrapper -->
	</div>
	<!-- /.wrapper-outer -->
</div>
<!-- /#content -->

<?php get_footer(); ?>