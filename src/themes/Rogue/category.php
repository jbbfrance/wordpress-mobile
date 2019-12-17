<?php get_header(); ?>		

<!-- BEGIN CATEGORY -->
<div class="showing">
	<?php _e('Category:', 'bonfire'); ?> <?php printf( '%s', '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
</div>
<!-- END CATEGORY -->

<div id="content" class="clearfix">
	<div class="wrapper-outer">
	
	<?php // the loop ?>
	<?php if (have_posts()) : ?>

			<?php
			$category_description = category_description();
			if ( ! empty( $category_description ) )
			echo '<div class="archive-meta">' . $category_description . '</div>';
	
			/* Run the loop for the category page to output the posts.
			 * If you want to overload this in a child theme then include a file
			 * called loop-category.php and that will be used instead.
			 */
			get_template_part( 'loop', 'category' );
			?>

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