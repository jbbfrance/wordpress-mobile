<?php get_header(); ?>		

<!-- BEGIN AUTHOR -->
<div class="showing">
	<?php _e( 'Posts by:', 'bonfire' ); ?> <span><?php printf( "" . get_the_author() . "" ); ?></span>
</div>
<!-- END AUTHOR -->

<div id="content" class="clearfix">
	<div class="wrapper-outer">

	<?php // the loop ?>
	<?php if (have_posts()) : ?>

			<?php if ( have_posts() ) the_post(); ?>
			
			<?php rewind_posts(); ?>
		
	<?php while (have_posts()) : the_post(); ?>
	
	<!-- BEGIN LOOP -->
	<?php get_template_part( 'includes/loop'); ?>
	<!-- END LOOP -->

	<?php endwhile; ?>

	<?php endif; ?>			

	</div>
	<!-- /.wrapper-outer -->

</div>
<!-- /#content -->

<?php get_footer(); ?>