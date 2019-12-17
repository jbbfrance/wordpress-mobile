<?php get_header(); ?>		

<!-- BEGIN TAG -->
<div class="showing">
	<?php _e( 'Tag:', 'bonfire' ); ?> <?php printf( '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
</div>
<!-- END TAG -->

<div id="content" class="clearfix">
	<div class="wrapper-outer">

	<?php // the loop ?>
	<?php if (have_posts()) : ?>

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